<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Invitation;
use App\Models\Design;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    private $fileRules = 'required|image|file|max:2048';
    private $textRules = 'required|max:255';
    private $timeRules = 'required|date_format:H:i';
    private $dateRules = 'required|date';
    private $imageFolder = 'img/invitation';

    public function __construct()
    {
        $this->middleware(['verified', 'auth'])->except(['show', 'create']);
        // $this->middleware([])
        // ->only([]);
        // ->except([]);
    }

    public function index()
    {
        return 'default invitation/read invitation';
    }

    public function create()
    {
        $slug = null;
        if (isset($_GET['slug'])) {
            $slug = $_GET['slug'];
        }
        $designs = Design::all();
        if (isset($slug)) {
            $design = Design::where('slug', $slug)->get()->first();
            return view('/invitation/create', compact('designs', 'design'));
        }
        return view('/invitation/create', compact('designs'));
    }

    public function store(Request $request)
    {
        $rules = [
            'cover_image' => $this->fileRules,
            'groom_image' => $this->fileRules,
            'bride_image' => $this->fileRules,
            'groom_name' => $this->textRules,
            'groom_fullname' => $this->textRules,
            'groom_info' => 'required',
            'bride_name' => $this->textRules,
            'bride_fullname' => $this->textRules,
            'bride_info' => 'required',
            'wedding_date' => $this->dateRules,
            'wedding_time_start' => $this->timeRules,
            'wedding_time_end' => $this->timeRules,
            'wedding_address' => $this->textRules,
            'wedding_venue' => $this->textRules,
            'reception_date' => $this->dateRules,
            'reception_time_start' => $this->timeRules,
            'reception_time_end' => $this->timeRules,
            'reception_address' => $this->textRules,
            'reception_venue' => $this->textRules,
            'embed_maps' => 'required',
            'design_id' => 'required',
            // 'price_id' => 'required',
            // 'audio' => 'required',
        ];

        $validateData = $request->validate($rules);
        $validateData['embed_maps'] = $request->embed_maps;
        $validateData['slug'] = $this->checkSlug([
            'bride_name' => $validateData['bride_name'],
            'groom_name' => $validateData['groom_name'],
        ]);
        $validateData['audio'] = 'wedding audio1.mp3';

        $validateData['cover_image'] = $request->file('cover_image')
            ->store(
                $this->imageFolder,
                ['disk' => 'directly_to_public']
            );
        $validateData['groom_image'] = $request->file('groom_image')
            ->store(
                $this->imageFolder,
                ['disk' => 'directly_to_public']
            );
        $validateData['bride_image'] = $request->file('bride_image')
            ->store(
                $this->imageFolder,
                ['disk' => 'directly_to_public']
            );

        $validateData['user_id'] = $request->user()->id;
        $validateData['price_id'] = 1;

        Invitation::create($validateData);

        return redirect('/dashboard/invitation')->with('message', 'New invitation has been created');
    }

    // guest
    public function show(Invitation $invitation)
    {
        $designSlug = Design::where('id', $invitation->design_id)->get()->first()->slug;
        $result = [];
        preg_match('/src="([^"]+)"/', $invitation->embed_maps, $result);
        $invitation->embed_maps = $result[1];

        return view('designs/' . $designSlug . '/code_design', compact('invitation'));
    }

    // only invitee owner & admin
    public function edit(Invitation $invitation)
    {
        $this->checkOwnerOrAdmin($invitation);
        $designs = Design::all();
        return view('invitation/edit', compact('invitation', 'designs'));
    }

    // only invitee owner & admin
    public function update(Request $request, Invitation $invitation)
    {
        $this->checkOwnerOrAdmin($invitation);
        $rules = [
            'cover_image' => $this->fileRules,
            'groom_image' => $this->fileRules,
            'bride_image' => $this->fileRules,
            'groom_name' => $this->textRules,
            'groom_fullname' => $this->textRules,
            'groom_info' => 'required',
            'bride_name' => $this->textRules,
            'bride_fullname' => $this->textRules,
            'bride_info' => 'required',
            'wedding_date' => $this->dateRules,
            'wedding_time_start' => $this->timeRules,
            'wedding_time_end' => $this->timeRules,
            'wedding_address' => $this->textRules,
            'wedding_venue' => $this->textRules,
            'reception_date' => $this->dateRules,
            'reception_time_start' => $this->timeRules,
            'reception_time_end' => $this->timeRules,
            'reception_address' => $this->textRules,
            'reception_venue' => $this->textRules,
            'embed_maps' => 'required',
            'design_id' => 'required',
            // 'price_id' => 'required',
            // 'audio' => 'required',
        ];

        $validateData = $request->validate($rules);

        if ($request->cover_image) {
            $validateData['cover_image'] = $request->file('cover_image')
                ->store(
                    $this->imageFolder,
                    ['disk' => 'directly_to_public']
                );
        }
        if ($request->bride_image) {
            $validateData['bride_image'] = $request->file('bride_image')
                ->store(
                    $this->imageFolder,
                    ['disk' => 'directly_to_public']
                );
        }
        if ($request->groom_image) {
            $validateData['groom_image'] = $request->file('groom_image')
                ->store(
                    $this->imageFolder,
                    ['disk' => 'directly_to_public']
                );
        }
        $invitation->update($validateData);

        return 'upload updated data to database';
    }

    // only invitee owner & admin
    public function destroy(Invitation $invitation)
    {
        Helper::checkOwnerOrAdminInvitation($invitation);
        $invitation->delete();
        return redirect()->back()->with('message', 'data has been deleted');
    }

    public function checkSlug($names)
    {
        $name = $names['groom_name'] . '-' . $names['bride_name'];
        return SlugService::createSlug(Invitation::class, 'slug', $name);
    }
}

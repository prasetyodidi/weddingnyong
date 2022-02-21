<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Models\Design;
use App\Http\Requests\UpdateInvitationRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request as HttpRequest;

require('/laragon/www/online-invitation/app/Models/simple_html_dom.php');
// require('App/Models/simple_html_dom.php');

class InvitationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['verified', 'auth'])->except(['show', 'create']);
        // $this->middleware([])
        // ->only([]);
        // ->except([]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // show all invitation
    // only admin
    public function index()
    {
        return 'default invitation/read invitation';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // user
    // must verify, auth
    public function create()
    {
        $slug = null;
        if (isset($_GET['slug'])) {
            $slug = $_GET['slug'];
        }
        $designs = Design::all();
        $design = null;
        if (isset($slug)) {
            $design = Design::where('slug', $slug)->get()->first();
            return view('/invitation/create', compact('designs', 'design'));
        }
        return view('/invitation/create', compact('designs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInvitationRequest  $request
     * @return \Illuminate\Http\Response
     */
    // user
    // must verify, auth
    public function store(HttpRequest $request)
    {
        $rules = [
            'cover_image' => 'required|image|file|max:2048',
            'groom_image' => 'required|image|file|max:2048',
            'bride_image' => 'required|image|file|max:2048',
            'groom_name' => 'required|max:255',
            'groom_fullname' => 'required|max:255',
            'groom_info' => 'required',
            'bride_name' => 'required|max:255',
            'bride_fullname' => 'required|max:255',
            'bride_info' => 'required',
            'wedding_date' => 'required|date',
            'wedding_time_start' => 'required|date_format:H:i',
            'wedding_time_end' => 'required|date_format:H:i',
            'wedding_address' => 'required|max:255',
            'wedding_venue' => 'required|max:255',
            'reception_date' => 'required|date',
            'reception_time_start' => 'required|date_format:H:i',
            'reception_time_end' => 'required|date_format:H:i',
            'reception_address' => 'required|max:255',
            'reception_venue' => 'required|max:255',
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

        $validateData['cover_image'] = $request->file('cover_image')->store('img/invitation', ['disk' => 'directly_to_public']);
        $validateData['groom_image'] = $request->file('groom_image')->store('img/invitation', ['disk' => 'directly_to_public']);
        $validateData['bride_image'] = $request->file('bride_image')->store('img/invitation', ['disk' => 'directly_to_public']);

        $validateData['user_id'] = auth()->user()->id;
        $validateData['price_id'] = 1;

        Invitation::create($validateData);

        return redirect('/dashboard/invitation')->with('message', 'New invitation has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    // guest
    public function show(Invitation $invitation)
    {
        $invitation_id = $invitation->id;
        $designSlug = Design::where('id', $invitation->design_id)->get()->first()->slug;
        $html = str_get_html($invitation->embed_maps);
        $invitation->embed_maps = $html->find('iframe')[0]->src;

        return view('designs/' . $designSlug . '/code_design', compact('invitation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    // only invitee owner & admin
    public function edit(Invitation $invitation)
    {
        $designs = Design::all();
        return view('invitation/edit', compact('invitation', 'designs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInvitationRequest  $request
     * @param  \App\Models\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    // only invitee owner & admin
    public function update(HttpRequest $request, Invitation $invitation)
    {
        $rules = [
            'cover_image' => 'image|file|max:2048',
            'groom_image' => 'image|file|max:2048',
            'bride_image' => 'image|file|max:2048',
            'groom_name' => 'required|max:255',
            'groom_fullname' => 'required|max:255',
            'groom_info' => 'required',
            'bride_name' => 'required|max:255',
            'bride_fullname' => 'required|max:255',
            'bride_info' => 'required',
            'wedding_date' => 'required|date',
            'wedding_time_start' => 'required|date_format:H:i',
            'wedding_time_end' => 'required|date_format:H:i',
            'wedding_address' => 'required|max:255',
            'wedding_venue' => 'required|max:255',
            'reception_date' => 'required|date',
            'reception_time_start' => 'required|date_format:H:i',
            'reception_time_end' => 'required|date_format:H:i',
            'reception_address' => 'required|max:255',
            'reception_venue' => 'required|max:255',
            'embed_maps' => 'required',
            'design_id' => 'required',
            // 'price_id' => 'required',
            // 'audio' => 'required',
        ];

        $validateData = $request->validate($rules);

        if ($request->cover_image) {
            $validateData['cover_image'] = $request->file('cover_image')->store('img/invitation', ['disk' => 'directly_to_public']);
        }
        if ($request->bride_image) {
            $validateData['bride_image'] = $request->file('bride_image')->store('img/invitation', ['disk' => 'directly_to_public']);
        }
        if ($request->groom_image) {
            $validateData['groom_image'] = $request->file('groom_image')->store('img/invitation', ['disk' => 'directly_to_public']);
        }
        $invitation->update($validateData);

        return 'upload updated data to database';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    // only invitee owner & admin
    public function destroy(Invitation $invitation)
    {
        return 'remove data from database';
        $invitation->delete();
        return route('dashboard.invitation');
    }

    public function checkSlug($names)
    {
        $name = $names['groom_name'] . '-' . $names['bride_name'];
        $slug = SlugService::createSlug(Invitation::class, 'slug', $name);
        return $slug;
    }
}

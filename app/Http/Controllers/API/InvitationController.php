<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use App\Models\Price;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class InvitationController extends Controller
{
    public function test(Request $request)
    {
        $request->validate([
            'invitation_id' => ['required']
        ]);
        $invitation = Invitation::where('id', $request->invitation_id)->get()->first();

        return response()->json([
            'message' => 'success',
            'invitation id' => $request->invitation_id,
            'invitation' => $invitation
        ], 200);
    }

    public function updateTypeOfPrice(Request $request, Invitation $invitation)
    {
        $request->validate([
            'price_id' => ['required']
        ]);

        $price = Price::where('id', $request->price_id)->get()->first();
        if (!isset($price)) {
            return response()->json([
                'message' => 'not found',
            ], 404);
        }

        $data = [
            'price_id' => $request->price_id
        ];
        $invitation->update($data);

        return response()->json([
            'message' => 'success',
            'invitation' => $invitation
        ], 200);
    }

    public function updateActiveStatus(Invitation $invitation)
    {
        if (isset($invitation->active)) {
            $active = null;
        } else {
            $active = Carbon::now()->toDateTimeString();
        }

        $invitation->update([
            'active' => $active
        ]);

        return response()->json([
            'message' => 'success',
            'invitation' => $invitation
        ], 200);
    }

    public function create(Request $request)
    {
        // user_id, otomatis mengecek user yg sedang login
        // design_id
        // price_id
        // active, jika price_id == 0 atau gratis otomatis active. lainnya perlu pembayaran lalu diaktifkan oleh admin
        // slug
        // cover_image
        // groom_name
        // groom_fullname
        // groom_info
        // groom_image
        // bride_name
        // bride_fullname
        // bride_info
        // bride_image
        // wedding_date
        // wedding_time_start
        // wedding_time_end
        // wedding_address
        // reception_date
        // reception_time_start
        // reception_time_end
        // reception_address
        // embed_maps

        $request->validate([
            'design_id' => ['required'],
            'price_id' => ['required'],
            // 'slug' => ['required', 'max:255'],
            'cover_image' => ['required', 'image', 'file', 'max:1024'],
            'groom_name' => ['required', 'max:255'],
            'groom_fullname' => ['required', 'max:255'],
            'groom_info' => ['required', 'max:255'],
            'groom_image' => ['required', 'image', 'file', 'max:1024'],
            'bride_name' => ['required', 'max:255'],
            'bride_fullname' => ['required', 'max:255'],
            'bride_info' => ['required', 'max:255'],
            'bride_image' => ['required', 'image', 'file', 'max:1024'],
            'wedding_date' => ['required'],
            'wedding_time_start' => ['required'],
            'wedding_time_end' => ['required'],
            'wedding_address' => ['required', 'max:255'],
            'reception_date' => ['required'],
            'reception_time_start' => ['required'],
            'reception_time_end' => ['required'],
            'reception_address' => ['required', 'max:255'],
            'embed_maps' => ['required'],
        ]);

        $request->user_id = Auth::user()->id;
        if ($request->price_id == 0) {
            $active = Carbon::now()->toDateTimeString();
        } else {
            $active = null;
        }

        $data = [
            'user_id' => $request->user_id,
            'active' => $active,
            'design_id' => $request->design_id,
            'price_id' => $request->price_id,
            'slug' => $this->checkSlug([
                'groom_name' => $request->groom_name,
                'bride_name' => $request->bride_name
            ]),
            // 'cover_image' => $request->cover_image,
            'groom_name' => $request->groom_name,
            'groom_fullname' => $request->groom_fullname,
            'groom_info' => $request->groom_info,
            // 'groom_image' => $request->groom_image,
            'bride_name' => $request->bride_name,
            'bride_fullname' => $request->bride_fullname,
            'bride_info' => $request->bride_info,
            // 'bride_image' => $request->bride_image,
            'wedding_date' => $request->wedding_date,
            'wedding_time_start' => $request->wedding_time_start,
            'wedding_time_end' => $request->wedding_time_end,
            'wedding_address' => $request->wedding_address,
            'reception_date' => $request->reception_date,
            'reception_time_start' => $request->reception_time_start,
            'reception_time_end' => $request->reception_time_end,
            'reception_address' => $request->reception_address,
            'embed_maps' => $request->embed_maps,
        ];

        $data['cover_image'] = $request->file('cover_image')->store('invitation-images', ['disk' => 'public']);
        $data['groom_image'] = $request->file('groom_image')->store('invitation-images', ['disk' => 'public']);
        $data['bride_image'] = $request->file('bride_image')->store('invitation-images', ['disk' => 'public']);

        return response()->json([
            'message' => 'success',
            'invitation' => $data
        ], 200);
    }

    public function getAllInvitation(Request $request)
    {
        $invitations = Invitation::all();

        return response()->json([
            'message' => 'success',
            'invitations' => $invitations
        ], 200);
    }

    public function getInvitationByUser(Request $request)
    {
        $user = Auth::user();
        $invitations = Invitation::where('user_id', $user->id)->get();

        return response()->json([
            'message' => 'success',
            'invitations' => $invitations
        ], 200);
    }

    public function getInvitationByUserId(Request $request, $user_id)
    {
        $invitations = Invitation::where('user_id', $user_id)->get();

        return response()->json([
            'message' => 'success',
            'invitations' => $invitations
        ], 200);
    }

    public function getInvitationBySlug(Request $request, $slug)
    {
        $invitation = Invitation::where('slug', $slug)->get()->first();

        return response()->json([
            'message' => 'success',
            'invitations' => $invitation
        ], 200);
    }

    private function checkSlug($names)
    {
        $name = $names['groom_name'] . '-' . $names['bride_name'];
        $slug = SlugService::createSlug(Invitation::class, 'slug', $name);
        return $slug;
    }
}

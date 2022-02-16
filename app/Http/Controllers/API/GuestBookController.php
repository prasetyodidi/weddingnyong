<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Guest_book;
use App\Models\Invitation;
use Illuminate\Http\Request;

class GuestBookController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'invitation_id' => 'required',
            'name' => ['required'],
            'message' => ['required'],
            'confirmation' => ['required', 'boolean']
        ]);

        $data = [
            'invitation_id' => $request->invitation_id,
            'name' => $request->name,
            'message' => $request->message,
            'confirmation' => $request->confirmation
        ];

        Guest_book::create($data);

        return response()->json([
            'message' => 'success',
            'guest book' => $data
        ], 200);
    }

    public function getByUser($user_id)
    {
        $invitations = Invitation::where('user_id', $user_id)->get();

        $guestBooks = [];
        foreach ($invitations as $invitation) {
            $guestBooks[$invitation->slug] = Guest_book::where('invitation_id', $invitation->id)->get();
        }

        return response()->json([
            'message' => 'success',
            'gues books' => $guestBooks
        ], 200);
    }

    public function getByInvitation($invitation_slug)
    {
        $invitation_id = Invitation::where('slug', $invitation_slug)->get()->first()->id;
        $guestBooks = Guest_book::where('invitation_id', $invitation_id)->get();

        return response()->json([
            'message' => 'success',
            'gues books' => $guestBooks
        ], 200);
    }

    public function delete(Request $request, $id)
    {
        $guestBook = Guest_book::where('id', $id)->get()->first();
        $user = $request->user();
        $invitation = Invitation::where('id', $guestBook->invitation_id)->get()->first();
        // response invitation not found
        // end response
        if ($user->role_id < 1 && $user->id != $invitation->user_id) {
            abort(403, "This access is blocked");
        }
        $deleted = Guest_book::where('id', $id)->get()->first();
        Guest_book::where('id', $id)->delete();

        return response()->json([
            'message' => 'success',
            'guest book' => $deleted
        ], 200);
    }
}

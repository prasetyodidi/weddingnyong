<?php

namespace App\Http\Controllers\API;

use App\Models\Invitation;
use Illuminate\Http\Request;
use App\Models\Attendee_list;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AttendeeListController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'invitation_id' => ['required'],
            'name' => ['required'],
            'address' => ['required'],
        ]);

        $data = [
            'invitation_id' => $request->invitation_id,
            'name' => $request->name,
            'address' => $request->address,
        ];

        $attendeeList = Attendee_list::create($data);

        return response()->json([
            'message' => 'success',
            'attendee list' => $attendeeList
        ], 200);
    }

    public function getByUser($user_id)
    {
        $invitations = Invitation::where('user_id', $user_id)->get();

        $attendeeList = [];
        foreach ($invitations as $invitation) {
            $attendeeList[$invitation->slug] = Attendee_list::where('invitation_id', $invitation->id)->get();
        }

        return response()->json([
            'message' => 'success',
            'attendee list' => $attendeeList
        ], 200);
    }

    public function getByInvitation($invitation_slug)
    {
        $invitation_id = Invitation::where('slug', $invitation_slug)->get()->first()->id;
        $guestBooks = Attendee_list::where('invitation_id', $invitation_id)->get();

        return response()->json([
            'message' => 'success',
            'attendee list' => $guestBooks
        ], 200);
    }

    public function delete(Request $request, $id)
    {
        $attendeeList = Attendee_list::where('id', $id)->get()->first();
        $user = $request->user();
        $invitation = Invitation::where('id', $attendeeList->invitation_id)->get()->first();
        // response invitation not found
        // end response
        if ($user->role_id < 1 && $user->id != $invitation->user_id) {
            abort(403, "This access is blocked");
        }
        $deleted = Attendee_list::where('id', $id)->get()->first();
        Attendee_list::where('id', $id)->delete();

        return response()->json([
            'message' => 'success',
            'attendee list' => $deleted
        ], 200);
    }
}

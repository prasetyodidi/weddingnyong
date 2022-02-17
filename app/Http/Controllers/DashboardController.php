<?php

namespace App\Http\Controllers;

use App\Models\Attendee_list;
use App\Models\Guest_book;
use App\Models\Invitation;
use App\Models\User;
use App\Models\Design;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard/index');
    }

    public function invitations()
    {
        $user = auth()->user();

        $data = [];
        if ($user['role_id'] >= 1) {
            $data['invitations'] = Invitation::with(['price', 'user', 'guestBooks'])->latest()->get();
            // $data['invitations'] = Invitation::all();
        } else {
            $data['invitations'] = Invitation::with('guestBooks')->where('user_id', $user->id)->with(['price'])->get();
        }

        return view('dashboard/invitation', $data);
    }

    public function guestBooks()
    {
        $invitations = Guest_book::getGuestBookInfoInDashboard();
        $invitationsJs = [];
        for ($i = 0; $i < count($invitations); $i++) {
            $guestBooks = [];
            for ($j = 0; $j < count($invitations[$i]->guestBooks); $j++) {
                $guestBooks[$j] = [
                    'id' => $invitations[$i]->guestBooks[$j]->id,
                    'invitation_id' => $invitations[$i]->guestBooks[$j]->invitation_id,
                    'name' => $invitations[$i]->guestBooks[$j]->name,
                    'message' => $invitations[$i]->guestBooks[$j]->message,
                    'confirmation' => $invitations[$i]->guestBooks[$j]->confirmation,
                    'created_at' => $invitations[$i]->guestBooks[$j]->created_at->toDateString(),
                    'updated_at' => $invitations[$i]->guestBooks[$j]->updated_at->toDateString(),
                ];
            }
            $invitationsJs[$i] = [
                'invitation_slug' => $invitations[$i]->slug,
                'guest_book' => $guestBooks
            ];
        }

        $invitationsJson = json_encode($invitationsJs);

        return view('dashboard/guest-book', compact('invitations', 'invitationsJs', 'invitationsJson'));
    }

    public function attendeeList()
    {
        $user = auth()->user();

        $invitations = Attendee_list::getAttendeeListInfoInDashboard();
        $invitationsJs = [];
        for ($i = 0; $i < count($invitations); $i++) {
            $attendeeLists = [];
            for ($j = 0; $j < count($invitations[$i]->attendeeLists); $j++) {
                $attendeeLists[$j] = [
                    'id' => $invitations[$i]->attendeeLists[$j]->id,
                    'invitation_id' => $invitations[$i]->attendeeLists[$j]->invitation_id,
                    'name' => $invitations[$i]->attendeeLists[$j]->name,
                    'address' => preg_replace("/'/i", " ", $invitations[$i]->attendeeLists[$j]->address),
                    'created_at' => $invitations[$i]->attendeeLists[$j]->created_at->toDateString(),
                    'updated_at' => $invitations[$i]->attendeeLists[$j]->updated_at->toDateString(),
                ];
            }
            $invitationsJs[$i] = [
                'invitation_slug' => $invitations[$i]->slug,
                'attendee_list' => $attendeeLists
            ];
        }

        $invitationsJson = json_encode($invitationsJs);
        // dd($invitationsJs);

        return view('dashboard/attendee-list', compact('invitations', 'invitationsJson', 'invitationsJs'));
    }

    public function users()
    {
        $data['users'] = User::getUserInfoInDashboardAdmin();
        // dd($data);

        return view('dashboard/user', $data);
    }

    public function design()
    {
        $designs = Design::latest()->paginate(3);
        return view('dashboard/design', compact('designs'));
    }
}

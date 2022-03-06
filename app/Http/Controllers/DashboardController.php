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
            $data['invitations'] = Invitation::with(['price', 'user', 'guestBooks'])->latest()->paginate(5);
        } else {
            $data['invitations'] = Invitation::with(['price', 'guestBooks'])->where('user_id', $user->id)->paginate(5);
        }

        return view('dashboard/invitation', $data);
    }

    public function guestBooks(Request $request)
    {
        $user = auth()->user();
        $invitations = [];
        if ($user->role_id == 1) {
            $invitations = Invitation::latest()->get();
        } else {
            $invitations = Invitation::getInvitationByuser(auth()->user()->id);
        }
        $invitation = [];
        $guestBooks = [];
        $invitation_slug = $request->invitation_slug;
        if (isset($invitation_slug)) {
            $invitation = Invitation::getInvitationBySlug($invitation_slug);
            $guestBooks = Guest_book::getGuestBookByInvitation($invitation['id']);
        } else {
            $invitation = $invitations[0];
            $guestBooks = Guest_book::getGuestBookByInvitation($invitation->id);
        }

        return view('dashboard/guest-book', compact('invitations', 'invitation', 'guestBooks'));
    }

    public function attendeeList(Request $request)
    {
        $user = auth()->user();
        $invitations = [];
        if ($user->role_id == 1) {
            $invitations = Invitation::latest()->get();
        } else {
            $invitations = Invitation::getInvitationByuser(auth()->user()->id);
        }
        $invitation = [];
        $attendeeLists = [];
        $invitation_slug = $request->invitation_slug;
        if (isset($invitation_slug)) {
            $invitation = Invitation::getInvitationBySlug($invitation_slug);
            $attendeeLists = Attendee_list::getGuestBookByInvitation($invitation['id']);
        } else {
            $invitation = $invitations[0];
            $attendeeLists = Attendee_list::getGuestBookByInvitation($invitation->id);
        }

        return view('dashboard/attendee-list', compact('invitations', 'invitation', 'attendeeLists'));
    }

    public function users()
    {
        $data['users'] = User::getUserInfoInDashboardAdmin();

        return view('dashboard/user', $data);
    }

    public function design()
    {
        $designs = Design::latest()->paginate(3);
        return view('dashboard/design', compact('designs'));
    }

    public function profile()
    {
        $user = auth()->user();

        return view('dashboard.profile', compact('user'));
    }
}

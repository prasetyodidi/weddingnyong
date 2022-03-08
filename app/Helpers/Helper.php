<?php

namespace App\Helpers;

use App\Models\Attendee_list;
use App\Models\Guest_book;
use App\Models\Invitation;

class Helper
{

    public static function checkOwnerOrAdminInvitation(Invitation $invitation)
    {
        if (auth()->user()->id != $invitation['user_id'] && !auth()->user()->role_id > 0) {
            abort(403, 'This access is blocked' . auth()->user()->role_id);
        }
    }


    public static function checkOwnerOrAdminGuestBook(Guest_book $guestBook)
    {
        $invitation = Invitation::getInvitationById($guestBook['invitation_id']);
        if (auth()->user()->id != $invitation['user_id'] && !auth()->user()->role_id > 0) {
            abort(403, 'This access is blocked' . auth()->user()->role_id);
        }
    }

    public static function checkOwnerOrAdminAttendeeList(Attendee_list $attendeeList)
    {
        $invitation = Invitation::getInvitationById($attendeeList['invitation_id']);
        if (auth()->user()->id != $invitation['user_id'] && !auth()->user()->role_id > 0) {
            abort(403, 'This access is blocked' . auth()->user()->role_id);
        }
    }

    // public static function checkOwnerOrAdmin($object)
    // {
    //     $type = get_class($object);
    //     $invitation = '';
    //     $types = [
    //         'APP\MODELS\GUEST_BOOK',
    //         'APP\MODELS\INVITATION'
    //     ];
    //     $condition = in_array($type, $types);
    //     if ($condition != true) {
    //         // abort(403, 'This access is blocked ' . '.' . $type . '.');
    //         abort(403, 'This access is blocked ' . '.' . $type . '.' . '.' . $condition . '.');
    //     }
    //     // if ($type == 'APP\MODELS\GUEST_BOOK') {
    //     //     $invitation = Invitation::getInvitationById($object['invitation_id']);
    //     // } else if ($type == 'Attendee_list') {
    //     //     $invitation = Invitation::getInvitationById($object['invitation_id']);
    //     // } else if ($type == 'APP\MODELS\INVITATION') {
    //     //     $invitation = $object;
    //     // } else {
    //     //     abort(403, 'This access is blocked ' . '.' . $type . '.' . '.' . $type . '.');
    //     // }
    //     if (auth()->user()->id != $invitation['user_id'] && !auth()->user()->role_id > 0) {
    //         abort(403, 'This access is blocked' . auth()->user()->role_id);
    //     }
    // }
}

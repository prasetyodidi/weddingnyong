<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendee_list extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Invitation()
    {
        return $this->belongsTo(Invitation::class);
    }

    public static function getAttendeeListInfoInDashboard()
    {
        $user = auth()->user();
        $rsInvitations = [];
        if ($user->role_id == 0) {
            $rsInvitations = Invitation::where('user_id', $user->id)->with('attendeeLists')->get();
        } else {
            $rsInvitations = Invitation::with('attendeeLists')->get();
        }

        return $rsInvitations;
    }
}

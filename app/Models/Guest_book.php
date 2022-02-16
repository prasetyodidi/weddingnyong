<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest_book extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function invitation()
    {
        return $this->belongsTo(Invitation::class);
    }

    public static function getGuestBookInfoInDashboard()
    {
        $user = auth()->user();
        $rsInvitations = [];
        if ($user->role_id == 0) {
            $rsInvitations = Invitation::where('user_id', $user->id)->with('guestBooks')->get();
        } else {
            $rsInvitations = Invitation::with('attendeeLists')->get();
        }

        return $rsInvitations;
    }
}

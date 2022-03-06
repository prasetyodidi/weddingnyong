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

    public static function getGuestBookByInvitation($invitation_id)
    {
        return Attendee_list::where('invitation_id', $invitation_id)->latest()->get();
    }
}

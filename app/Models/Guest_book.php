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

    public static function getGuestBookByInvitation($invitation_id)
    {
        return Guest_book::where('invitation_id', $invitation_id)->latest()->get();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Invitation extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function design()
    {
        return $this->belongsTo(Design::class);
    }

    public function price()
    {
        return $this->belongsTo(Price::class);
    }

    public function guestBooks()
    {
        return $this->hasMany(Guest_book::class);
    }

    public function attendeeLists()
    {
        return $this->hasMany(Attendee_list::class);
    }

    public static function getInvitationByuser($userId)
    {
        return Invitation::where('user_id', $userId)->latest()->get();
    }

    public static function getInvitationBySlug($invitation_slug)
    {
        return Invitation::where('slug', $invitation_slug)->get()->first();
    }

    public static function getUserIdOfInvitationById($invitationId)
    {
        return Invitation::where('id', $invitationId)->get()->first()['user_id'];
    }

    public static function getInvitationIdBySlug($invitation_slug)
    {
        $result = Invitation::where('slug', $invitation_slug)->get()->first();
        if (isset($result)) {
            return $result['id'];
        } else {
            return -1;
        }
    }
}

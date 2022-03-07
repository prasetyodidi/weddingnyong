<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public static function getUserInfoInDashboardAdmin()
    {
        $users = [];
        if (auth()->user()->role_id == 1) {
            $result = User::where('role_id', 0)->with('invitations')->get();
            for ($i = 0; $i < count($result); $i++) {
                $users[$i] = [
                    'id' => $result[$i]->name,
                    'name' => $result[$i]->name,
                    'email' => $result[$i]->email,
                    'address' => $result[$i]->address,
                    'total_invitations' => count($result[$i]->invitations)
                ];
            }
        }

        return $users;
    }

    public static function getUserByInvitationId($invitationId)
    {
        $userId = Invitation::getUserIdOfInvitationById($invitationId);
        return User::where('id', $userId)->get()->first();
    }

    public static function getUserRsvp($invitationId)
    {
        $userId = Invitation::getUserIdOfInvitationById($invitationId);
        return User::where('id', $userId)->get()->first()['rsvp_email'];
    }
}

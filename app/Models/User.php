<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens as PassportHasApiTokens;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use PassportHasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'title',
        'firebase_token'
    ];

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
        'password' => 'hashed',
    ];

    public function user_details(): HasOne
    {
        return $this->hasOne(UserDetails::class, 'user_id');
    }

    public function remove_user_details($id)
    {
        return $this->hasOne(UserDetails::class, 'user_id')->where('user_id', $id)->where('deleted_at', '=', null)->update(['deleted_at' => date("Y-m-d H:i:s")]);
    }

    public function circle(): HasOne
    {
        return $this->hasOne(Circles::class, 'user_id');
    }

    public function user_remove_circle($id)
    {
        return $this->hasOne(Circles::class, 'user_id')->where('user_id', $id)->where('deleted_at', '=', null)->update(['deleted_at' => date("Y-m-d H:i:s")]);
    }

    public function draw_numbers(): HasMany
    {
        return $this->hasMany(DrawNumbers::class, 'user_id', 'id');
    }

    public function user_remove_draw_numbers($id)
    {
        return $this->hasMany(DrawNumbers::class, 'user_id', 'id')->where('user_id', $id)->where('deleted_at', '=', null)->update(['deleted_at' => date("Y-m-d H:i:s")]);
    }

    public function saved_numbers(): HasMany
    {
        return $this->hasMany(SavedNumbers::class, 'user_id', 'id');
    }

    public function user_remove_saved_numbers($id)
    {
        return $this->hasMany(SavedNumbers::class, 'user_id', 'id')->where('user_id', $id)->where('deleted_at', '=', null)->update(['deleted_at' => date("Y-m-d H:i:s")]);
    }

    public function user_request(): HasMany
    {
        return $this->hasMany(UserRequest::class, 'user_request_id');
    }

    public function group_members(): HasMany
    {
        return $this->hasMany(GroupMembers::class, 'user_id');
    }

    public function user_remove_group_members($id)
    {
        return $this->hasMany(GroupMembers::class, 'user_id')->where('user_id', $id)->update(['deleted_at' => date('Y-m-d H:i:s')]);
    }

    public function winner(): HasMany
    {
        return $this->hasMany(Winners::class, 'user_id');
    }

    public function user_remove_winner($id)
    {
        return $this->hasMany(Winners::class, 'user_id')->where('user_id', $id)->where('deleted_at', '=', null)->update(['deleted_at' => date("Y-m-d H:i:s")]);
    }

    public function notifications_to(): HasMany
    {
        return $this->hasMany(Notifications::class, 'to_user', 'id');
    }

    public function notifications_from(): HasMany
    {
        return $this->hasMany(Notifications::class, 'from_user', 'id');
    }

    public function deleteUser($id)
    {
        $user = User::where('id', $id)->first();
        // dd($id);
        $userSoftDeleted = User::where('id', $id)->update(['deleted_at' => date('Y-m-d H:i:s')]);
        $user->remove_user_details($id);
        $user->user_remove_circle($id);
        $user->user_remove_draw_numbers($id);
        $user->user_remove_group_members($id);
        $user->user_remove_saved_numbers($id);
        $user->user_remove_winner($id);
        // $user->user_remove_group_members($id);
    }

    public function otp(): HasOne
    {
        return $this->hasOne(OTP::class, 'user_id');
    }
}

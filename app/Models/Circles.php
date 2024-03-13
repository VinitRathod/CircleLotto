<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Circles extends Model
{
    use HasFactory;

    protected $table = "tbl_circles";
    protected $guarded = [];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function draw_numbers(): HasMany
    {
        return $this->hasMany(DrawNumbers::class, 'circle_id', 'id');
    }

    public function circle_remove_draw_numbers($id)
    {
        return $this->hasMany(DrawNumbers::class, 'circle_id', 'id')->where('circle_id', $id)->where('deleted_at', '=', null)->update(['deleted_at' => date("Y-m-d H:i:s")]);
    }

    public function circle_request(): HasMany
    {
        return $this->hasMany(UserRequest::class, 'circle_id');
    }

    public function group_members(): HasMany
    {
        return $this->hasMany(GroupMembers::class, 'circle_id');
    }

    public function circle_remove_group_members($id)
    {
        return $this->hasMany(GroupMembers::class, 'circle_id')->where('circle_id', $id)->where('deleted_at', '=', null)->update(['deleted_at' => date("Y-m-d H:i:s")]);
    }

    public function winner(): HasOne
    {
        return $this->hasOne(Winners::class, 'circle_id');
    }

    public function deleteCircle($id)
    {
        $circle = Circles::where('id', $id)->first();
        $circleSoftDeleted = Circles::where('id', $id)->update(['deleted_at' => date("Y-m-d H:i:s")]);

        $circle->circle_remove_draw_numbers($id);
        $circle->circle_remove_group_members($id);
    }
}

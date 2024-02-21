<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GroupMembers extends Model
{
    use HasFactory;

    protected $table = "tbl_group_members";
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function circle(): BelongsTo
    {
        return $this->belongsTo(Circles::class, 'circle_id');
    }

    // public function deleteUser($id)
    // {
    //     dd("$id");
    // }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserRequest extends Model
{
    use HasFactory;

    protected $table = "tbl_user_request";
    protected $guarded = [];

    public function circle(): BelongsTo
    {
        return $this->belongsTo(Circles::class, 'circle_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_request_id');
    }
}

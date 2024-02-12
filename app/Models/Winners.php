<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Winners extends Model
{
    use HasFactory;
    protected $table = "tbl_winners";
    protected $guarded = [];

    protected $casts = [
        'user_number' => 'array'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function circle(): BelongsTo
    {
        return $this->belongsTo(Circles::class, 'circle_id');
    }
}

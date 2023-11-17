<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DrawNumbers extends Model
{
    use HasFactory;

    protected $table = 'draw_numbers';
    protected $guarded = [];

    protected $casts = [
        'numbers' => 'array',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function circle(): BelongsTo
    {
        return $this->belongsTo(Circles::class, 'circle_id', 'id');
    }
}

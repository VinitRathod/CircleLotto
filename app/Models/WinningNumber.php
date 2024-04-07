<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WinningNumber extends Model
{
    use HasFactory;

    protected $table = "tbl_winning_number";
    protected $guarded = [];

    protected $casts = [
        'winning_number' => 'array'
    ];

    public function draw_numbers(): HasMany
    {
        return $this->hasMany(DrawNumbers::class, 'winning_number_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Notifications extends Model
{
    use HasFactory;

    protected $table = 'tbl_notifications';
    protected $guarded = [];

    protected $casts = [
        'error' => 'array',
    ];

    public function to_user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'to_user', 'id');
    }

    public function from_user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'from_user', 'id');
    }
}

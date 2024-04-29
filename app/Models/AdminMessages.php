<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdminMessages extends Model
{
    use HasFactory;

    protected $table = "tbl_admin_messages";
    protected $guarded = [];

    public function admin_user(): BelongsTo
    {
        return $this->belongsTo(AdminUsers::class, 'from_admin_user', 'id');
    }

    public function to_user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'to_user', 'id');
    }
}

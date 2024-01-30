<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;

class AdminUsers extends Authenticable
{
    use HasFactory;

    protected $table = "tbl_admin_user";
    protected $guarded = [];
}

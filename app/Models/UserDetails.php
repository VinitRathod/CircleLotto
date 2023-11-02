<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Log;

class UserDetails extends Model
{
    use HasFactory;

    protected $table = "tbl_user_details";

    protected $guarded = [];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public static function insert(User $user, array $data){
        try{
            $user->user_details()->create($data);
            return true;
        }catch(Exception $e){
            Log::error($e->getMessage());
            $user->delete();
            return false;
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Follower extends Model
{
    public const UPDATED_AT = null;

    protected $fillable = ['users_id', 'follower_id'];

    public  function user()
    {
        return $this->belongsTo(User::class , 'users_id');
    }
    public  function follower()
    {
        return $this->belongsTo(User::class , 'users_id');
    }
}

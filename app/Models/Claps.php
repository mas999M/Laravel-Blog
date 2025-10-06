<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Claps extends Model
{

    public const UPDATED_AT = null;
    protected $fillable = ['posts_id' , 'users_id'];

    public function post()
    {
        return $this->belongsTo(Post::class , 'posts_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class , 'users_id');
    }
}

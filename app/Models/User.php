<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'username',
        'image',
        'bio',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function claps()
    {
        return $this->hasMany(Claps::class , 'users_id');
    }

    public function posts()
    {
        return $this->hasmany(Post::class , 'users_id');
    }

    public function following()
    {
        return $this->belongsToMany(User::class , 'followers','follower_id' , 'users_id');
    }
    public function followers()
    {
        return $this->belongsToMany(User::class , 'followers','users_id' , 'follower_id');
    }
    public function isFollowedBy(User $user)
    {
      return  $this->followers()->where('follower_id' , $user->id)->exists();
    }
    public function hasClapped(Post $post)
    {
        return $post->claps()->where('users_id' , $this->id)->exists();
    }


    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function imageUrl()
    {
        if($this->image){
            return Storage::url($this->image);
        }

        return null;
    }

}

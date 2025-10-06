<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
//        'image',
        'title' ,
        'slug',
        'content',
        'users_id',
        'categories_id',
        'published_at',
    ];

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->width(400);
    }

    public function claps()
    {
        return $this->hasMany(Claps::class , 'posts_id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class , 'users_id');
    }
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class , 'categories_id');
    }
    public function readTime($wordsPerMinute = 100)
    {
        $wordCount = str_word_count(strip_tags($this->content));
        $minutes = ceil($wordCount / $wordsPerMinute);

        return max(1 , $minutes);
    }

    public function imageUrl()
    {
       if($this->image){
           return Storage::url($this->image);
       }
       return null;
    }
}


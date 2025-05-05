<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Story extends Model
{
    protected $fillable = [
        'title',
        'content',
        'image_path',
        'is_featured',
        'author_id',
        'published_at'
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_featured' => 'boolean'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getImageUrlAttribute()
    {
        return $this->image_path 
            ? Storage::url($this->image_path)
            : asset('images/default-story.png');
    }

    public function getExcerptAttribute($length = 150)
    {
        return Str::limit(strip_tags($this->content), $length);
    }

    protected static function booted()
    {
        static::creating(function ($story) {
            $story->slug = Str::slug($story->title);
            $story->author_id = auth()->id();
        });

        static::updating(function ($story) {
            $story->slug = Str::slug($story->title);
        });

        static::deleting(function ($story) {
            if ($story->image_path) {
                Storage::delete($story->image_path);
            }
        });
    }
}
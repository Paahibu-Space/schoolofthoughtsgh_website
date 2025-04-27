<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'content',
        'image_path',
        'is_featured',
        'published_at'
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_featured' => 'boolean'
    ];

    public function getImageUrlAttribute()
    {
        return $this->image_path 
            ? Storage::url($this->image_path)
            : asset('images/default-blog.png');
    }

    public function getExcerptAttribute($length = 150)
    {
        return Str::limit(strip_tags($this->content), $length);
    }

    protected static function booted()
    {
        static::creating(function ($blog) {
            $blog->slug = Str::slug($blog->title);
        });

        static::updating(function ($blog) {
            $blog->slug = Str::slug($blog->title);
        });

        static::deleting(function ($blog) {
            if ($blog->image_path) {
                Storage::delete($blog->image_path);
            }
        });
    }
}
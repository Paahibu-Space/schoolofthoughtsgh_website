<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Partner extends Model
{
    protected $fillable = ['name', 'image_path'];
    
    /**
     * Get the full URL for the partner image
     */
    public function getImageUrlAttribute()
    {
        return $this->image_path 
            ? Storage::url($this->image_path)
            : asset('images/default-partner.png');
    }
    
    /**
     * Delete the image file when partner is deleted
     */
    protected static function booted()
    {
        static::deleting(function ($partner) {
            if ($partner->image_path) {
                Storage::delete($partner->image_path);
            }
        });
    }
}
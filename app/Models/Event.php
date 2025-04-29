<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events'; // Optional, but good practice

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'location',
        'image',
        'is_featured'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_featured' => 'boolean',
    ];

    public function scopeUpcoming(Builder $query)
    {
        return $query->where('start_date', '>=', Carbon::now());
    }

    public function scopePast(Builder $query)
    {
        return $query->where('end_date', '<', Carbon::now());
    }

    public function galleryImages()
    {
        return $this->hasMany(GalleryImage::class);
    }
}

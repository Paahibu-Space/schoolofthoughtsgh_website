<?php
// app/Models/GalleryImage.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    use HasFactory;

    protected $casts = [
        'is_featured' => 'boolean',
    ];
    
    protected $fillable = [
        'event_id',
        'title',
        'description',
        'image_path',
        'is_featured',
        'display_order',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    
}
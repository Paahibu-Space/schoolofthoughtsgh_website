<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Speaker extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_id',
        'name',
        'role',
        'specialty',
        'image',
    ];

    /**
     * Get the event that this speaker is associated with.
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    
}

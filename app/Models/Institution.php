<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Institution extends Model
{
    protected $fillable = ['name', 'image', 'description', 'website'];
    
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/'.$this->image) : asset('images/default-institution.png');
    }
}
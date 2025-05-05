<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class NewsletterSubscription extends Model
{
    protected $fillable = ['email', 'is_active'];

    protected static function booted()
    {
        static::creating(function ($subscription) {
            $subscription->token = Str::random(32);
        });
    }

    public function markAsVerified()
    {
        $this->update([
            'verified_at' => now(),
            'is_active' => true
        ]);
    }
}
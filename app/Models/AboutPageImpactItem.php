<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class AboutPageImpactItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_setting_id',
        'icon',
        'count',
        'title',
        'order',
        'is_active',
    ];

    /**
     * Get the page setting that owns this impact item.
     */
    public function pageSetting()
    {
        return $this->belongsTo(PageSetting::class);
    }
}

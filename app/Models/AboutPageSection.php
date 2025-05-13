<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class AboutPageSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_setting_id',
        'section_type',
        'content',
        'image',
    ];

    /**
     * Get the page setting that owns this section.
     */
    public function pageSetting()
    {
        return $this->belongsTo(PageSetting::class);
    }
}

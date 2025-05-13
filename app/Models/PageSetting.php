<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class PageSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_name',
        'title',
        'breadcrumb_image',
    ];

    /**
     * Get the about page sections for this page setting.
     */
    public function aboutSections()
    {
        return $this->hasMany(AboutPageSection::class);
    }

    /**
     * Get the impact items for this page setting.
     */
    public function impactItems()
    {
        return $this->hasMany(AboutPageImpactItem::class);
    }

    /**
     * Get general section content.
     */
    public function getGeneralSection()
    {
        return $this->aboutSections()->where('section_type', 'general')->first();
    }

    /**
     * Get mission section.
     */
    public function getMissionSection()
    {
        return $this->aboutSections()->where('section_type', 'mission')->first();
    }

    /**
     * Get vision section.
     */
    public function getVisionSection()
    {
        return $this->aboutSections()->where('section_type', 'vision')->first();
    }
}

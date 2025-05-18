<?php

namespace App\Helpers;

use App\Models\PageSetting;
use App\Models\AboutPageSection;
use App\Models\AboutPageImpactItem;

class PageSettingsHelper
{
    /**
     * Get About page settings and all related data.
     *
     * @return array
     */
    public static function getAboutPageData()
    {
        // Get the about page settings
        $pageSetting = PageSetting::where('page_name', 'about')->first();
        
        if (!$pageSetting) {
            return null;
        }
        
        // Get sections
        $generalSection = AboutPageSection::where('page_setting_id', $pageSetting->id)
            ->where('section_type', 'general')
            ->first();
            
        $missionSection = AboutPageSection::where('page_setting_id', $pageSetting->id)
            ->where('section_type', 'mission')
            ->first();
            
        $visionSection = AboutPageSection::where('page_setting_id', $pageSetting->id)
            ->where('section_type', 'vision')
            ->first();
        
            
        return [
            'title' => $pageSetting->title,
            'breadcrumb_image' => $pageSetting->breadcrumb_image,
            'general' => $generalSection ? $generalSection->content : null,
            'mission' => [
                'content' => $missionSection ? $missionSection->content : null,
                'image' => $missionSection ? $missionSection->image : null,
            ],
            'vision' => [
                'content' => $visionSection ? $visionSection->content : null,
                'image' => $visionSection ? $visionSection->image : null,
            ],
        ];
    }
}
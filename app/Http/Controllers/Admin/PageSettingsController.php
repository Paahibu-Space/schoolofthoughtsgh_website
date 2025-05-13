<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageSetting;
use App\Models\AboutPageSection;
use App\Models\AboutPageImpactItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageSettingsController extends Controller
{
    /**
     * Show the about page settings form.
     *
     * @return \Illuminate\Http\Response
     */
    public function aboutPage()
    {
        // Get or create about page settings
        $pageSetting = PageSetting::firstOrCreate(
            ['page_name' => 'about'],
            ['title' => 'About Us']
        );

        // Get or create page sections
        $generalSection = AboutPageSection::firstOrCreate(
            [
                'page_setting_id' => $pageSetting->id,
                'section_type' => 'general'
            ],
            ['content' => '']
        );

        $missionSection = AboutPageSection::firstOrCreate(
            [
                'page_setting_id' => $pageSetting->id,
                'section_type' => 'mission'
            ],
            ['content' => '', 'image' => null]
        );

        $visionSection = AboutPageSection::firstOrCreate(
            [
                'page_setting_id' => $pageSetting->id,
                'section_type' => 'vision'
            ],
            ['content' => '', 'image' => null]
        );

        // Get impact items
        $impactItems = AboutPageImpactItem::where('page_setting_id', $pageSetting->id)
            ->orderBy('order')
            ->get();

        return view('admin.settings.about', compact(
            'pageSetting',
            'generalSection',
            'missionSection',
            'visionSection',
            'impactItems'
        ));
    }

    /**
     * Update about page settings.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateAboutPage(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'breadcrumb_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'general_content' => 'required|string',
            'mission_content' => 'required|string',
            'mission_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'vision_content' => 'required|string',
            'vision_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Get or create about page settings
        $pageSetting = PageSetting::firstOrCreate(['page_name' => 'about']);
        $pageSetting->title = $request->title;

        // Handle breadcrumb image upload
        if ($request->hasFile('breadcrumb_image')) {
            // Delete old image if exists
            if ($pageSetting->breadcrumb_image) {
                Storage::delete('public/' . $pageSetting->breadcrumb_image);
            }
            
            $breadcrumbImage = $request->file('breadcrumb_image');
            $breadcrumbImagePath = $breadcrumbImage->store('page_settings/about', 'public');
            $pageSetting->breadcrumb_image = $breadcrumbImagePath;
        }
        
        $pageSetting->save();

        // Update general section
        $generalSection = AboutPageSection::updateOrCreate(
            [
                'page_setting_id' => $pageSetting->id,
                'section_type' => 'general'
            ],
            ['content' => $request->general_content]
        );

        // Update mission section
        $missionSection = AboutPageSection::updateOrCreate(
            [
                'page_setting_id' => $pageSetting->id,
                'section_type' => 'mission'
            ],
            ['content' => $request->mission_content]
        );

        // Handle mission image upload
        if ($request->hasFile('mission_image')) {
            // Delete old image if exists
            if ($missionSection->image) {
                Storage::delete('public/' . $missionSection->image);
            }
            
            $missionImage = $request->file('mission_image');
            $missionImagePath = $missionImage->store('page_settings/about', 'public');
            $missionSection->image = $missionImagePath;
            $missionSection->save();
        }

        // Update vision section
        $visionSection = AboutPageSection::updateOrCreate(
            [
                'page_setting_id' => $pageSetting->id,
                'section_type' => 'vision'
            ],
            ['content' => $request->vision_content]
        );

        // Handle vision image upload
        if ($request->hasFile('vision_image')) {
            // Delete old image if exists
            if ($visionSection->image) {
                Storage::delete('public/' . $visionSection->image);
            }
            
            $visionImage = $request->file('vision_image');
            $visionImagePath = $visionImage->store('page_settings/about', 'public');
            $visionSection->image = $visionImagePath;
            $visionSection->save();
        }

        return redirect()->route('admin.settings.about')
            ->with('success', 'About page settings updated successfully.');
    }

    /**
     * Store a new impact item.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeImpactItem(Request $request)
    {
        $request->validate([
            'icon' => 'required|string|max:255',
            'count' => 'required|integer',
            'title' => 'required|string|max:255',
        ]);

        $pageSetting = PageSetting::where('page_name', 'about')->firstOrFail();
        
        // Get the highest order
        $maxOrder = AboutPageImpactItem::where('page_setting_id', $pageSetting->id)
            ->max('order') ?? 0;

        AboutPageImpactItem::create([
            'page_setting_id' => $pageSetting->id,
            'icon' => $request->icon,
            'count' => $request->count,
            'title' => $request->title,
            'order' => $maxOrder + 1,
            'is_active' => true,
        ]);

        return redirect()->route('admin.settings.about')
            ->with('success', 'Impact item added successfully.');
    }

    /**
     * Update an impact item.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateImpactItem(Request $request, $id)
    {
        $request->validate([
            'icon' => 'required|string|max:255',
            'count' => 'required|integer',
            'title' => 'required|string|max:255',
            'is_active' => 'nullable|boolean',
        ]);

        $impactItem = AboutPageImpactItem::findOrFail($id);
        
        $impactItem->update([
            'icon' => $request->icon,
            'count' => $request->count,
            'title' => $request->title,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.settings.about')
            ->with('success', 'Impact item updated successfully.');
    }

    /**
     * Delete an impact item.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteImpactItem($id)
    {
        $impactItem = AboutPageImpactItem::findOrFail($id);
        $impactItem->delete();

        return redirect()->route('admin.settings.about')
            ->with('success', 'Impact item deleted successfully.');
    }

    /**
     * Update the order of impact items.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateImpactItemsOrder(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*' => 'integer|exists:about_page_impact_items,id',
        ]);

        $itemsOrder = $request->items;
        
        foreach ($itemsOrder as $index => $itemId) {
            AboutPageImpactItem::where('id', $itemId)->update(['order' => $index]);
        }

        return response()->json(['success' => true]);
    }
}
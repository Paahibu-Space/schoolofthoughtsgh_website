<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\WebsiteSetting;

class WebsiteSettingsController extends Controller
{
    public function index()
    {
        // Get all current settings
        $settings = [
            'business_name' => WebsiteSetting::getValue('business_name'),
            'business_email' => WebsiteSetting::getValue('business_email'),
            'business_phone' => WebsiteSetting::getValue('business_phone'),
            'business_address' => WebsiteSetting::getValue('business_address'),
            'whatsapp_number' => WebsiteSetting::getValue('whatsapp_number'),
            'facebook_url' => WebsiteSetting::getValue('facebook_url'),
            'twitter_url' => WebsiteSetting::getValue('twitter_url'),
            'instagram_url' => WebsiteSetting::getValue('instagram_url'),
            'linkedin_url' => WebsiteSetting::getValue('linkedin_url'),
            'youtube_url' => WebsiteSetting::getValue('youtube_url'),
            'logo' => WebsiteSetting::getValue('logo'),
            'favicon' => WebsiteSetting::getValue('favicon'),
            'about_us' => WebsiteSetting::getValue('about_us'),
            'privacy_policy' => WebsiteSetting::getValue('privacy_policy'),
            'terms_conditions' => WebsiteSetting::getValue('terms_conditions'),
        ];

        return view('admin.settings.website-settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'business_name' => 'required|string|max:255',
            'business_email' => 'required|email',
            'business_phone' => 'required|string|max:20',
            'business_address' => 'required|string',
            'whatsapp_number' => 'nullable|string|max:20',
            'facebook_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'favicon' => 'nullable|image|mimes:ico,png|max:512',
            'about_us' => 'nullable|string',
            'privacy_policy' => 'nullable|string',
            'terms_conditions' => 'nullable|string',
        ]);

        // Handle file uploads
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('settings', 'public');
            WebsiteSetting::setValue('logo', $path);
        }

        if ($request->hasFile('favicon')) {
            $path = $request->file('favicon')->store('settings', 'public');
            WebsiteSetting::setValue('favicon', $path);
        }

        // Update text settings
        $textSettings = [
            'business_name', 'business_email', 'business_phone', 'business_address',
            'whatsapp_number', 'facebook_url', 'twitter_url', 'instagram_url',
            'linkedin_url', 'youtube_url', 'about_us', 'privacy_policy', 'terms_conditions'
        ];

        foreach ($textSettings as $setting) {
            WebsiteSetting::setValue($setting, $validated[$setting]);
        }

        return redirect()->route('admin.settings.website-settings.index')
            ->with('success', 'Settings updated successfully');
    }
}
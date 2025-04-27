<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PartnerController extends Controller
{
    /**
     * Display a listing of the partners.
     *
     * @return \Illuminate\View\View
     */
    
    public function index()
    {
        $partners = Partner::latest()->paginate(10);
        
        return view('admin.partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new partner.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.partners.create');
    }

    /**
     * Store a newly created partner in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    

    /**
     * Display the specified partner.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\View\View
     */
    public function show(Partner $partner)
    {
        return view('admin.partners.show', compact('partner'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Store the image
    $imagePath = $request->file('image')->store('partners', 'public');

    Partner::create([
        'name' => $validated['name'],
        'image_path' => $imagePath
    ]);

    return redirect()->route('admin.partners.index')
                    ->with('success', 'Partner created successfully.');
}

public function update(Request $request, Partner $partner)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Update image if provided
    if ($request->hasFile('image')) {
        // Delete old image
        if ($partner->image_path) {
            Storage::disk('public')->delete($partner->image_path);
        }
        
        $imagePath = $request->file('image')->store('partners', 'public');
        $validated['image_path'] = $imagePath;
    }

    $partner->update($validated);

    return redirect()->route('admin.partners.index')
                    ->with('success', 'Partner updated successfully.');
}
    /**
     * Show the form for editing the specified partner.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\View\View
     */
    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    /**
     * Update the specified partner in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\RedirectResponse
     */
    

    /**
     * Remove the specified partner from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Partner $partner)
    {
        try {
            // Delete associated image
            if ($partner->image) {
                Storage::disk('public')->delete($partner->image);
            }

            $partner->delete();

            return redirect()->route('admin.partners.index')
                            ->with('success', 'Partner deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error deleting partner: ' . $e->getMessage());
        }
    }

    /**
     * Generate a unique slug for the partner.
     *
     * @param  string  $name
     * @return string
     */
    protected function generateSlug($name)
    {
        $slug = Str::slug($name);
        $count = Partner::where('slug', 'like', "{$slug}%")->count();
        
        return $count ? "{$slug}-{$count}" : $slug;
    }
}
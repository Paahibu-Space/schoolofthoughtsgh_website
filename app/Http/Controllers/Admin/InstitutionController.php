<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class InstitutionController extends Controller
{
    public function index()
    {
        $institutions = Institution::latest()->paginate(10);
        return view('admin.institutions.index', compact('institutions'));
    }

    public function create()
    {
        return view('admin.institutions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'website' => 'nullable|url',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('institutions', 'public');
        }

        Institution::create($validated);

        return redirect()->route('admin.institutions.index')
            ->with('success', 'Institution created successfully');
    }

    public function show(Institution $institution)
    {
        return view('admin.institutions.show', compact('institution'));
    }

    public function edit(Institution $institution)
    {
        return view('admin.institutions.edit', compact('institution'));
    }

    public function update(Request $request, Institution $institution)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'website' => 'nullable|url',
            'remove_image' => 'nullable|boolean',
        ]);
    
        // Handle image removal
        if ($request->has('remove_image') && $request->remove_image) {
            if ($institution->image) {
                Storage::disk('public')->delete($institution->image);
                $validated['image'] = null;
            }
        }
    
        // Handle new image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($institution->image) {
                Storage::disk('public')->delete($institution->image);
            }
            $validated['image'] = $request->file('image')->store('institutions', 'public');
        }
    
        $institution->update($validated);
    
        return redirect()->route('admin.institutions.index')
            ->with('success', 'Institution updated successfully');
    }

    public function destroy(Institution $institution)
    {
        if ($institution->image) {
            Storage::disk('public')->delete($institution->image);
        }
        
        $institution->delete();

        return redirect()->route('admin.institutions.index')
            ->with('success', 'Institution deleted successfully');
    }
}
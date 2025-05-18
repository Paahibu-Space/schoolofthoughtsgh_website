<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::with('author')->latest()->paginate(10);
        return view('admin.stories.index', compact('stories'));
    }

    public function create()
    {
        return view('admin.stories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_featured' => 'boolean',
            'published_at' => 'nullable|date'
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('stories', 'public');
        }

        Story::create($validated);

        return redirect()->route('admin.stories.index')
                        ->with('success', 'Story created successfully.');
    }

    public function show(Story $story)
    {
        return view('admin.stories.show', compact('story'));
    }

    public function edit(Story $story)
    {
        return view('admin.stories.edit', compact('story'));
    }

    public function update(Request $request, Story $story)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_featured' => 'boolean',
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('image')) {
            if ($story->image_path) {
                Storage::delete($story->image_path);
            }
            $validated['image_path'] = $request->file('image')->store('stories', 'public');
        }

        $story->update($validated);

        return redirect()->route('admin.stories.index')
                        ->with('success', 'Story updated successfully.');
    }

    public function destroy(Story $story)
    {
        if ($story->image_path) {
            Storage::delete($story->image_path);
        }

        $story->delete();

        return redirect()->route('admin.stories.index')
                        ->with('success', 'Story deleted successfully.');
    }
}
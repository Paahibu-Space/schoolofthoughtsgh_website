<?php
// app/Http/Controllers/Admin/EventController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Speaker;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->query('filter', 'all');

        $events = match ($filter) {
            'upcoming' => Event::upcoming()->latest('start_date')->paginate(10),
            'past' => Event::past()->latest('end_date')->paginate(10),
            default => Event::latest('start_date')->paginate(10),
        };

        return view('admin.events.index', compact('events', 'filter'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'location' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'is_featured' => 'boolean',
            'speakers' => 'nullable|array',
            'speakers.*.name' => 'required|string|max:255',
            'speakers.*.role' => 'nullable|string|max:255',
            'speakers.*.specialty' => 'nullable|string|max:255',
            'speakers.*.image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('events', 'public');
        }

        $event = Event::create($validated);

        // Handle speakers
        if ($request->has('speakers')) {
            foreach ($request->speakers as $speakerData) {
                if (isset($speakerData['name']) && !empty($speakerData['name'])) {
                    $speaker = new Speaker([
                        'name' => $speakerData['name'],
                        'role' => $speakerData['role'] ?? null,
                        'specialty' => $speakerData['specialty'] ?? null,
                    ]);

                    // Handle speaker image
                    if (isset($speakerData['image']) && $speakerData['image'] instanceof \Illuminate\Http\UploadedFile) {
                        $imagePath = $speakerData['image']->store('speakers', 'public');
                        $speaker->image = $imagePath;
                    }

                    $event->speakers()->save($speaker);
                }
            }
        }

        return redirect()->route('admin.events.index')
            ->with('success', 'Event created successfully.');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'location' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'is_featured' => 'boolean',
            'speakers' => 'nullable|array',
            'speakers.*.id' => 'nullable|exists:speakers,id',
            'speakers.*.name' => 'required|string|max:255',
            'speakers.*.role' => 'nullable|string|max:255',
            'speakers.*.specialty' => 'nullable|string|max:255',
            'speakers.*.image' => 'nullable|image|max:2048',
            'speakers.*.existing_image' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }
            $validated['image'] = $request->file('image')->store('events', 'public');
        }

        $event->update($validated);

        // Get existing speaker IDs to track which ones to keep
        $existingSpeakerIds = $event->speakers->pluck('id')->toArray();
        $updatedSpeakerIds = [];

        // Handle speakers
        if ($request->has('speakers')) {
            foreach ($request->speakers as $speakerData) {
                if (isset($speakerData['name']) && !empty($speakerData['name'])) {
                    // Update existing speaker
                    if (isset($speakerData['id'])) {
                        $speaker = Speaker::find($speakerData['id']);
                        $updatedSpeakerIds[] = $speaker->id;

                        $speaker->name = $speakerData['name'];
                        $speaker->role = $speakerData['role'] ?? null;
                        $speaker->specialty = $speakerData['specialty'] ?? null;

                        // Handle speaker image
                        if (isset($speakerData['image']) && $speakerData['image'] instanceof \Illuminate\Http\UploadedFile) {
                            // Delete old image if it exists
                            if ($speaker->image) {
                                Storage::disk('public')->delete($speaker->image);
                            }

                            $imagePath = $speakerData['image']->store('speakers', 'public');
                            $speaker->image = $imagePath;
                        }

                        $speaker->save();
                    }
                    // Create new speaker
                    else {
                        $speaker = new Speaker([
                            'name' => $speakerData['name'],
                            'role' => $speakerData['role'] ?? null,
                            'specialty' => $speakerData['specialty'] ?? null,
                        ]);

                        // Handle speaker image
                        if (isset($speakerData['image']) && $speakerData['image'] instanceof \Illuminate\Http\UploadedFile) {
                            $imagePath = $speakerData['image']->store('speakers', 'public');
                            $speaker->image = $imagePath;
                        }

                        $event->speakers()->save($speaker);
                        $updatedSpeakerIds[] = $speaker->id;
                    }
                }
            }
        }

        // Delete speakers that weren't included in the update
        $speakersToDelete = array_diff($existingSpeakerIds, $updatedSpeakerIds);

        foreach ($speakersToDelete as $speakerId) {
            $speaker = Speaker::find($speakerId);

            // Delete speaker image if it exists
            if ($speaker && $speaker->image) {
                Storage::disk('public')->delete($speaker->image);
            }

            // Delete the speaker
            if ($speaker) {
                $speaker->delete();
            }
        }

        return redirect()->route('admin.events.index')
            ->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        if ($event->image) {
            Storage::disk('public')->delete($event->image);
        }

        $event->delete();

        return redirect()->route('admin.events.index')
            ->with('success', 'Event deleted successfully.');
    }

    public function show(Event $event)
    {
        $event->load('speakers');
        return view('admin.events.show', compact('event'));
    }
}

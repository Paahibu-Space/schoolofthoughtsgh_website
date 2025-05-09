<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    public function index()
    {
        $teamMembers = TeamMember::orderBy('display_order')->get();
        return view('admin.team.index', compact('teamMembers'));
    }
    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|max:1024',
            'linkedin_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
            'github_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'display_order' => 'integer',
            'is_active' => 'boolean'
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('team-members', 'public');
            $validated['photo'] = $path;
        }

        TeamMember::create($validated);

        return redirect()->route('admin.team.index')
            ->with('success', 'Team member added successfully.');
    }

    public function edit(TeamMember $teamMember)
    {
        if (!$teamMember->exists) {
            abort(404, 'Team member not found');
        }
        return view('admin.team.edit', compact('teamMember'));
    }
    public function update(Request $request, TeamMember $teamMember)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|max:1024',
            'linkedin_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
            'github_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'display_order' => 'integer',
            'is_active' => 'boolean'
        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($teamMember->photo) {
                Storage::disk('public')->delete($teamMember->photo);
            }
            
            $path = $request->file('photo')->store('team-members', 'public');
            $validated['photo'] = $path;
        }

        $teamMember->update($validated);

        return redirect()->route('admin.team.index')
            ->with('success', 'Team member updated successfully.');
    }
    public function destroy(TeamMember $teamMember)
    {
        // Delete photo if exists
        if ($teamMember->photo) {
            Storage::disk('public')->delete($teamMember->photo);
        }
        
        $teamMember->delete();

        return redirect()->route('admin.team.index')
            ->with('success', 'Team member deleted successfully.');
    }

    /**
     * Update team members display order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateOrder(Request $request)
    {
        $validated = $request->validate([
            'order' => 'required|array',
            'order.*' => 'integer|exists:team_members,id'
        ]);

        foreach ($validated['order'] as $index => $id) {
            TeamMember::where('id', $id)->update(['display_order' => $index]);
        }

        return response()->json(['success' => true]);
    }
}
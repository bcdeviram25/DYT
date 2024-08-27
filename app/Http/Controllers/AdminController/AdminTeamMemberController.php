<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class AdminTeamMemberController extends Controller
{
    //

    public function index()
    {
        $teamMembers = Team::all();
        return view('admin.team_members.index', compact('teamMembers'));
    }

    public function create()
    {
        return view('admin.team_members.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'address' => 'required|string',
            'image' => 'required|image|max:1024',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('team_members'), $imageName);

        Team::create([
            'name' => $validated['name'],
            'position' => $validated['position'],
            'address' => $validated['address'],
            'image' => $imageName,
        ]);

        return redirect()->route('admin.team_members.index')->with('success', 'Team member created successfully.');
    }

    public function edit(Team $teamMember)
    {
        return view('admin.team_members.edit', compact('teamMember'));
    }

    public function update(Request $request, Team $teamMember)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'address' => 'required|string',
            'image' => 'nullable|image|max:1024',
        ]);

        if ($request->hasFile('image')) {
            // Upload the new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('team_members'), $imageName);
            $teamMember->image = $imageName;
        }

        $teamMember->update([
            'name' => $validated['name'],
            'position' => $validated['position'],
            'address' => $validated['address'],
        ]);

        return redirect()->route('admin.team_members.index')->with('success', 'Team member updated successfully.');
    }

    public function destroy(Team $teamMember)
    {
        // Delete the team member from the database
        $teamMember->delete();

        return redirect()->route('admin.team_members.index')->with('success', 'Team member deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ProjectCards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // added

class ProjectCardsController extends Controller
{
    // List all project cards
    public function index(ProjectCards $projectCards)
    {
        Log::info('ProjectCardsController.index called');
        return view('club_150.project_card.index', compact('projectCards'));
    }
    public function club150Index(ProjectCards $projectCards)
    {
        Log::info('ProjectCardsController.club150Index called');
        return view('club_150.index', compact('projectCards'));
    }

    // Create a new project card
    public function store(Request $request)
    {
        Log::info('ProjectCardsController.store called');
        $validated = $request->validate([
            'title' => 'required|string',
            'image' => 'nullable|file|mimes:jpg,jpeg,png,svg',
            'description' => 'nullable|string',
            'status' => 'nullable|string',
            'position' => 'nullable|integer',
            'completion_percentage' => 'nullable|string',
            'project_timeline' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('project_cards', 'public');
        }

        $card = ProjectCards::create($validated);
        $card->update(['project_id' => $card->id]);

        // Redirect so the index route re-queries a fresh collection
        return redirect()->route('projectCards');
    }

    // Show a specific project card by id
    public function show($id)
    {
        Log::info('ProjectCardsController.show called', ['id' => $id]);
        $projectCard = ProjectCards::findOrFail($id);
        // return response()->json($projectCard);
        return view('club_150.index', compact('projectCard'));
    }

    // New edit method to pass the project card to the view
    public function edit($id)
    {
        Log::info('ProjectCardsController.edit called', ['id' => $id]);
        $projectCard = ProjectCards::findOrFail($id);
        return view('club_150.project_card.edit', compact('projectCard'));
    }

    // Update a specific project card by id
    public function update(Request $request, $id)
    {
        Log::info('ProjectCardsController.update called', ['id' => $id]);
        $projectCard = ProjectCards::findOrFail($id);

        $validated = $request->validate([
            'project_id' => 'sometimes|required|integer',
            'title' => 'sometimes|required|string',
            'image' => 'nullable|file|mimes:jpg,jpeg,png,svg',
            'description' => 'nullable|string',
            'status' => 'nullable|string',
            'position' => 'nullable|integer',
            'completion_percentage' => 'nullable|string',
            'project_timeline' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('project_cards', 'public');
        }

        $projectCard->update($validated);

        // Redirect so the index route re-queries a fresh collection
        return redirect()->route('projectCards');
    }

    // Delete a specific project card by id
    public function destroy($id)
    {
        Log::info('ProjectCardsController.destroy called', ['id' => $id]);
        $projectCard = ProjectCards::findOrFail($id);
        $projectCard->delete();

        // Redirect so the index route re-queries a fresh collection
        return redirect()->route('projectCards');
    }
}

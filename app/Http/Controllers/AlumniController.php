<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AlumniController extends Controller
{
    //
    public function index()
    {
        $alumnis = Alumni::all();
        // Group Year of Graduation
        $years = [];
        foreach ($alumnis as $alumni) {
            $year = $alumni->class_of;
            if (!in_array($year, $years)) {
                $years[] = $year;
            }
        }
        // Title and Description grouped together with date number
        $grouped = [];
        foreach ($alumnis as $alumni) {
            $year = $alumni->class_of;
            $grouped[$year][] = $alumni;
        }
        // Shorten Bio
        $short_bio = [];
        foreach ($alumnis as $alumni) {
            $bio = $alumni->bio;
            $short_bio[$bio] = substr($bio, 0, 100);
        }

        return view('alumni.alumni_admin.index', compact('alumnis', 'grouped', 'years', 'short_bio'));
    }

    public function create()
    {
        $users = Auth::user();

        // If user is authenticated, redirect to alumni create page
        if (Auth::check()) {
            return view('alumni.alumni_admin.create', compact('users'));
        }
        // If user is not authenticated, redirect to register page
        return view('dashboard');
    }

    public function edit($id)
    {
        $users = Auth::user();
        $alumni = Alumni::find($id);

        // Check if alumni record exists
        // if (!$alumni) {
        //     return redirect()->route('alumni.create')->with('error', 'Alumni record not found.');
        // }

        // If user is authenticated and has a alumni profile, redirect to alumni edit page
        if (Auth::check() && $alumni->user_id === Auth::user()->id) {
            return view('alumni.alumni_admin.edit', compact('alumni', 'users'));
        } else {
            return redirect()->route('alumni.create')->with('error', 'You are not authorized to edit this alumni record.');
        }
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name'        => 'required|string|max:255',
            'last_name'         => 'required|string|max:255',
            'email'             => 'required|email',
            'phone'             => 'required|string|max:255',
            'class_of'          => 'required|integer|between:1875,2025',
            'id_number'         => 'required|string|max:255',
            'current_employer'  => 'required|string|max:255',
            'current_position'  => 'required|string|max:255',
            'current_location'  => 'required|string|max:255',
            'bio'               => 'required|string',
            'profile_picture'   => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:8048',
        ]);

        $data['user_id'] = Auth::user()->id;

        if ($request->hasFile('profile_picture')) {
            $data['profile_picture'] = $request->file('profile_picture')->store('alumni', 'public');
        }
        Alumni::create($data);

        return redirect()->route('alumni.index');
    }

    public function update(Request $request, $id)
    {
        $alumniProfile = Alumni::findOrFail($id);

        $validated = $request->validate([
            'first_name'        => 'required|string|max:255',
            'last_name'         => 'required|string|max:255',
            'email'             => 'required|email',
            'phone'             => 'required|string|max:255',
            'class_of'          => 'required|integer|between:1875,2025',
            'id_number'         => 'required|string|max:255',
            'current_employer'  => 'required|string|max:255',
            'current_position'  => 'required|string|max:255',
            'current_location'  => 'required|string|max:255',
            'bio'               => 'required|string',
            'profile_picture'   => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:8048',
        ]);

        try {
            if ($request->hasFile('profile_picture')) {
                $validated['profile_picture'] = $request->file('profile_picture')->store('alumni', 'public');
            }
            $alumniProfile->update($validated);
            return redirect()->route('alumni.index');
        } catch (\Exception $e) {
            Log::error('Error updating alumni profile', ['exception' => $e]);
            return back()->withErrors('An error occurred while updating the profile.');
        }
    }

    public function destroy($id)
    {
        Alumni::find($id)->delete();
        return redirect()->route('alumni.index');
    }
}

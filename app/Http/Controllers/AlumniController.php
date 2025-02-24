<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('alumni.alumni_admin.create', compact('users'));
    }

    public function edit($id)
    {
        $users = Auth::user();
        $alumni = Alumni::find($id);
        return view('alumni.alumni_admin.edit', compact('alumni', 'users'));
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
            'profile_picture'   => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:8048',
        ]);
        if ($request->hasFile('profile_picture')) {
            $validated['profile_picture'] = $request->file('profile_picture')->store('alumni', 'public');
        }
        dd($validated);
        $alumniProfile->update($validated);

        return redirect()->route('alumni.index');
    }

    public function destroy($id)
    {
        Alumni::find($id)->delete();
        return redirect()->route('alumni.index');
    }
}

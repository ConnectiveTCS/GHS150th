<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

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
        return view('alumni.index', compact('alumnis', 'grouped', 'years'));
    }

    public function create()
    {
        return view('alumni.create');
    }

    public function edit($id)
    {
        $alumni = Alumni::find($id);
        return view('alumni.edit', compact('alumni'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id'           => 'required',
            'first_name'        => 'required|string|max:255',
            'last_name'         => 'required|string|max:255',
            'email'             => 'required|email',
            'phone'             => 'required|string|max:255',
            'class_of'          => 'required|year',
            'id_number'         => 'required|string|max:255',
            'current_employer'  => 'required|string|max:255',
            'current_position'  => 'required|string|max:255',
            'current_location'  => 'required|string|max:255',
            'bio'               => 'required|string',
            'profile_picture'   => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:8048',
        ]);
        if ($request->hasFile('profile_picture')) {
            $data['profile_picture'] = $request->file('profile_picture')->store('alumni', 'public');
        }
        Alumni::create($data);
        
        return redirect()->route('alumni.index');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'user_id'           => 'required',
            'first_name'        => 'required|string|max:255',
            'last_name'         => 'required|string|max:255',
            'email'             => 'required|email',
            'phone'             => 'required|string|max:255',
            'class_of'          => 'required|year',
            'id_number'         => 'required|string|max:255',
            'current_employer'  => 'required|string|max:255',
            'current_position'  => 'required|string|max:255',
            'current_location'  => 'required|string|max:255',
            'bio'               => 'required|string',
            'profile_picture'   => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:8048',
        ]);
        if ($request->hasFile('profile_picture')) {
            $data['profile_picture'] = $request->file('profile_picture')->store('alumni', 'public');
        }
        Alumni::find($id)->update($data);
        
        return redirect()->route('alumni.index');
    }

    public function destroy($id)
    {
        Alumni::find($id)->delete();
        return redirect()->route('alumni.index');
    }
}

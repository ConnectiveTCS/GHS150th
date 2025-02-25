<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // added

class EventsController extends Controller
{
    // Display a listing of events.
    public function index()
    {
        Log::info('EventsController.index called');
        $events = Events::all();
        return view('events.index', compact('events'));
    }

    public function programme()
    {
        Log::info('EventsController.programme called');
        $events = Events::all();
        $months = [];
        foreach ($events as $event) {
            $month = date('F', strtotime($event->event_date));
            if (!in_array($month, $months)) {
                $months[] = $month;
            }
        }
        // Title and Description grouped together with date number
        $grouped = [];
        foreach ($events as $event) {
            $month = date('F', strtotime($event->event_date));
            $day = date('j', strtotime($event->event_date));
            $grouped[$month][$day][] = $event;
        }
        return view('programme.index', compact('events', 'grouped', 'months'));
    }

    // Show the form for creating a new event.
    public function create()
    {
        Log::info('EventsController.create called');
        return view('events.create');
    }

    // Store a newly created event in storage.
    public function store(Request $request)
    {
        Log::info('EventsController.store called');
        $data = $request->validate([
            'event_name'        => 'required|string|max:255',
            'event_description' => 'nullable|string',
            'event_date'        => 'required|date',
            'event_location'    => 'nullable|string|max:255',
            'event_image'       => 'image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);
        if ($request->hasFile('event_image')) {
            $data['event_image'] = $request->file('event_image')->store('events', 'public');
        }
        Events::create($data);
        // dd($data);
        return redirect()->route('events.index');
    }

    // Display the specified event.
    public function show(Events $event)
    {
        Log::info('EventsController.show called', ['event_id' => $event->id]);
        return view('events.show', compact('event'));
    }

    // Show the form for editing the specified event.
    public function edit(Events $event)
    {
        Log::info('EventsController.edit called', ['event_id' => $event->id]);
        return view('events.edit', compact('event'));
    }

    // Update the specified event in storage.
    public function update(Request $request, Events $event)
    {
        Log::info('EventsController.update called', ['event_id' => $event->id]);
        $data = $request->validate([
            'event_name'        => 'required|string|max:255',
            'event_description' => 'nullable|string',
            'event_date'        => 'required|date',
            'event_location'    => 'nullable|string|max:255',
            'event_image'       => 'image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);
        if ($request->hasFile('event_image')) {
            $data['event_image'] = $request->file('event_image')->store('events', 'public');
        }
        $event->update($data);
        return redirect()->route('events.index');
    }

    // Remove the specified event from storage.
    public function destroy(Events $event)
    {
        Log::info('EventsController.destroy called', ['event_id' => $event->id]);
        $event->delete();
        return redirect()->route('events.index');
    }
}

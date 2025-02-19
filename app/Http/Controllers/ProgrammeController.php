<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // updated import for barryvdh/laravel-dompdf

class ProgrammeController extends Controller
{
    // ...existing code...

    public function downloadPdf()
    {
        // Fetch your events data as needed.
        $events = Events::all(); // adjust query as necessary
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

        // Load the PDF view with events data.
        $pdf = Pdf::loadView('programme.pdf', compact('events', 'grouped', 'months'));

        return $pdf->download('programme.pdf');
    }

    // ...existing code...
}

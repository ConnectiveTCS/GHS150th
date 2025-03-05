<?php

use App\Http\Controllers\AlumniController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\ProjectCardsController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


// Public Access

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Club 150
Route::get('/club_150', function () {
    $projectCards = \App\Models\ProjectCards::all();
    return view('club_150.index', compact('projectCards'));
});
// Programme
Route::get('/programme', [EventsController::class, 'index'])->name('programme');
Route::get('/programme/pdf', [ProgrammeController::class, 'downloadPdf'])->name('programme.pdf');
Route::get('/pdftest', function () {
    $events = \App\Models\Events::all();
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
    return view('programme.pdf', compact('events', 'grouped', 'months'));
});
// Pillar Project
Route::get('/pillar_project', function () {
    return view('pillar_project.index');
});
// Alumni
Route::get('/alumnis', function () {
    return view('alumni.index');
});

// Alumni Profile
Route::resource('/alumni', App\Http\Controllers\AlumniController::class)->except(['destroy']);

// Reservations
Route::get('/reservations/create', [ReservationController::class, 'create'])->name('reservations.create');

// Update the POST route to add a name
Route::post('/reserve', [ReservationController::class, 'store'])->name('reservations.store');

Route::get('/reservations/{id}/edit', [ReservationController::class, 'edit']);
Route::put('/reservations/{id}', [ReservationController::class, 'update']);

// Engrave
Route::resource('/engrave', App\Http\Controllers\EngraveController::class)->except(['destroy']);

// SharStory
Route::resource('/sharstory', App\Http\Controllers\SharStoryController::class)->except(['destroy']);

// Admin Access

Route::middleware('auth')->group(function () {
    // Profile CRUD routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Project Cards CRUD routes
    Route::resource('/project-cards', ProjectCardsController::class)->middleware('can:admin-access');
    Route::get('/create', function () {
        return view('club_150.project_card.create');
    })->middleware('can:admin-access');
    Route::get('/projects', function () {
        $projectCards = \App\Models\ProjectCards::all();
        return view('club_150.project_card.index', compact('projectCards'));
    })->name('projectCards')->middleware('can:admin-access');

    // Reservations CRUD routes
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index')->middleware('can:admin-access');
    Route::get('/reservations/{id}', [ReservationController::class, 'show'])->name('reservations.show')->middleware('can:admin-access');
    Route::get('/reservations/{id}/edit', [ReservationController::class, 'edit'])->name('reservations.edit')->middleware('can:admin-access');
    Route::put('/reservations/{id}', [ReservationController::class, 'update'])->name('reservations.update')->middleware('can:admin-access');
    Route::delete('/reservations/{id}', [ReservationController::class, 'destroy'])->name('reservations.destroy')->middleware('can:admin-access');

    // Alumni CRUD routes
    Route::resource('/alumni', App\Http\Controllers\AlumniController::class)->except('create', 'store', 'edit', 'update')->middleware('can:admin-access');

    // Events CRUD routes
    Route::resource('/events', App\Http\Controllers\EventsController::class)->middleware('can:admin-access');
    // Add the missing route for events.indexAdmin
    Route::get('/events/admin/index', [EventsController::class, 'indexAdmin'])->name('events.indexAdmin')->middleware('can:admin-access');

    // Engrave CRUD routes
    Route::resource('/engrave', App\Http\Controllers\EngraveController::class)->except('create', 'store', 'edit', 'update')->middleware('can:admin-access');

    // SharStory CRUD routes
    Route::resource('/sharstory', App\Http\Controllers\SharStoryController::class)->except('create', 'store', 'edit', 'update')->middleware('can:admin-access');
});

require __DIR__ . '/auth.php';

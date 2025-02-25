<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // added

class DashboardController extends Controller
{
    public function index()
    {
        Log::info('DashboardController.index called');
        $user = Auth::user();
        // Get or create alumni record for the current user
        $alumni = Alumni::firstOrCreate(['user_id' => $user->id]);

        return view('dashboard', compact('alumni'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Log::info('DashboardController.create called');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Log::info('DashboardController.store called');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Log::info('DashboardController.show called', ['id' => $id]);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        Log::info('DashboardController.edit called', ['id' => $id]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Log::info('DashboardController.update called', ['id' => $id]);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Log::info('DashboardController.destroy called', ['id' => $id]);
        //
    }
}

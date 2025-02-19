<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    //
    public function index()
    {
        $reservations = Reservation::all();

        return view('reservations.index', compact('reservations'));
    }

    public function show($id)
    {
        $reservation = Reservation::find($id);
        return view('reservations.show', compact('reservation'));
    }

    public function create()
    {
        //
        return view('reservations.create');
    }

    public function edit($id)
    {
        $reservation = Reservation::find($id);
        return view('reservations.edit', compact('reservation'));
    }

    public function store(Request $request)
    {
        $reservation = new Reservation();
        $reservation->first_name = $request->first_name;
        $reservation->last_name = $request->last_name;
        $reservation->email = $request->email;
        $reservation->phone = $request->phone;
        $reservation->is_attending = $request->is_attending;
        $reservation->is_paid = $request->is_paid;
        // Set the authenticated user's id for the reservation
        // $reservation->user_id = Auth::user()->id;
        $reservation->save();

        return redirect('/');
    }

    public function update(Request $request, $id)
    {
        $reservation = Reservation::find($id);
        $reservation->first_name = $request->first_name;
        $reservation->last_name = $request->last_name;
        $reservation->email = $request->email;
        $reservation->phone = $request->phone;
        $reservation->is_attending = $request->is_attending;
        $reservation->is_paid = $request->is_paid;
        $reservation->save();
        return redirect()->route('reservations.index');
    }

    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();
        return response()->json(['message' => 'Reservation deleted']);
    }
}

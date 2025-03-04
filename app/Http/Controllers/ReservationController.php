<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserReservationMail;
use App\Mail\AdminReservationMail;

class ReservationController extends Controller
{
    public function index()
    {
        Log::info('ReservationController.index called');
        $reservations = Reservation::all();

        return view('reservations.index', compact('reservations'));
    }

    public function show($id)
    {
        Log::info('ReservationController.show called', ['id' => $id]);
        $reservation = Reservation::find($id);
        return view('reservations.show', compact('reservation'));
    }

    public function create()
    {
        Log::info('ReservationController.create called');
        return view('reservations.create');
    }

    public function edit($id)
    {
        Log::info('ReservationController.edit called', ['id' => $id]);
        $reservation = Reservation::find($id);
        return view('reservations.edit', compact('reservation'));
    }

    public function store(Request $request)
    {
        Log::info('ReservationController.store called');
        $reservation = new Reservation();
        $reservation->first_name = $request->first_name;
        $reservation->last_name = $request->last_name;
        $reservation->email = $request->email;
        $reservation->phone = $request->phone;
        $reservation->is_attending = $request->is_attending;
        $reservation->is_paid = $request->is_paid;
        $reservation->class_of = $request->class_of;
        // Set the authenticated user's id for the reservation
        // $reservation->user_id = Auth::user()->id;
        $reservation->save();

        // Send email to user
        Mail::to($reservation->email)->send(new UserReservationMail($reservation));

        // Send email to admin
        Mail::to('oqa@qtghs.co.za')->send(new AdminReservationMail($reservation));
        // Mail::to('kylem.mcpherson@outlook.com')->send(new AdminReservationMail($reservation));

        return redirect('/');
    }

    public function update(Request $request, $id)
    {
        Log::info('ReservationController.update called', ['id' => $id]);
        $reservation = Reservation::find($id);
        $reservation->first_name = $request->first_name;
        $reservation->last_name = $request->last_name;
        $reservation->email = $request->email;
        $reservation->phone = $request->phone;
        $reservation->is_attending = $request->is_attending;
        $reservation->is_paid = $request->is_paid;
        $reservation->class_of = $request->class_of;
        $reservation->save();
        return redirect()->route('reservations.index');
    }

    public function destroy($id)
    {
        Log::info('ReservationController.destroy called', ['id' => $id]);
        $reservation = Reservation::find($id);
        $reservation->delete();
        return response()->json(['message' => 'Reservation deleted']);
    }
}

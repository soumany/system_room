<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;



class ReservationController extends Controller
{
    public function create(Room $room)
    {
        return view('reservations.create', compact('room'));
    }

    public function store(Request $request, Room $room)
    {
        $request->validate([
            'reservation_date' => 'required|date',
        ]);

        $reservation = new Reservation([
            'room_id' => $room->id,
            'user_id' => Auth::id(),
            'reservation_date' => $request->reservation_date,
        ]);

        $reservation->save();

        // Send email notification to Admin
        Mail::to('admin@example.com')->send(new \App\Mail\ReservationNotification($reservation));

        return redirect()->route('rooms.index')->with('success', 'Reservation created successfully.');
    }

    public function index()
    {
        $reservations = Reservation::all();
        return view('reservations.index', compact('reservations'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $reservation->status = $request->status;
        $reservation->save();

        // Send email notification to User
        Mail::to($reservation->user->email)->send(new \App\Mail\ReservationStatusUpdate($reservation));

        return redirect()->route('reservations.index')->with('success', 'Reservation updated successfully.');
    }
}


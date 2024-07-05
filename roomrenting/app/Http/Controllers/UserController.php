<?php

namespace App\Http\Controllers;

use App\Mail\BookingMail;
use App\Models\CreateRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingResponseMail;

class UserController extends Controller
{
    public function show(string $id)
    {
        $room = CreateRoom::findOrFail($id);
        return view('user.show', compact('room'));
    }

    public function index()
    {
        $rooms = CreateRoom::all(); // Fetch all rooms from the database
        return view('user.index', compact('rooms')); // Return the view with rooms data
    }

    public function book($id)
    {
        $room = CreateRoom::find($id);
        $user = auth()->guard('user')->user();

        // Send booking email to admin
        Mail::to('soumany06@gmail.com')->send(new BookingMail($room, $user));

        return redirect()->route('user.show', $id)->with('success', 'Booking request sent!');
    }

    public function handleBookingResponse(Request $request)
{
    $room = CreateRoom::findOrFail($request->id);
    $userEmail = 'tobteng003@gmail.com'; // Replace with the fixed user email address

    $response = $request->response;

    // Send response email to user
    Mail::to($userEmail)->send(new BookingResponseMail($room, $response));

    return redirect()->route('dashboard')->with('success', "Booking {$response}ed!");
}
}

<?php

namespace App\Http\Controllers;

use App\Mail\BookingMail;
use App\Models\CreateRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function book(Request $request, string $id)
    {
        $room = CreateRoom::findOrFail($id);
        $user = $request->user(); // assuming the user is authenticated

        // Send booking email to admin
        Mail::to('soumany06@gmail.com')->send(new BookingMail($room, $user));

        return redirect()->route('user.show', $id)->with('success', 'Booking request sent!');
    }

    public function handleBookingResponse(Request $request)
    {
        $room = CreateRoom::findOrFail($request->id);
        $user = $room->user; // Assuming the room model has a relationship with the user

        $response = $request->response;
        $subject = $response == 'accept' ? 'Booking Accepted' : 'Booking Rejected';

        // Send response email to user
        Mail::raw("Your booking request for room \"{$room->title}\" has been {$response}ed.", function ($message) use ($user, $subject) {
            $message->to($user->email)
                    ->subject($subject);
        });
        
        return redirect()->route('dashboard')->with('success', "Booking {$response}ed!");
    }
}

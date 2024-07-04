<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreateRoom;

class UserController extends Controller
{
    public function index()
    {
        $rooms = CreateRoom::orderBy('created_at', 'DESC')->get();
        return view('user.index', compact('rooms'));
    }

    public function show(string $id)
    {
        $room = CreateRoom::findOrFail($id);
        return view('user.show', compact('room'));
    }
}

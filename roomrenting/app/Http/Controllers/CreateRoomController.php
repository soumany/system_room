<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreateRoom;

class CreateRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = CreateRoom::orderBy('created_at', 'DESC')->get();
        return response()->json($rooms);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createroom.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation (optional, but recommended)
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'product_code' => 'required|string|max:255|unique:createroom',
            'description' => 'required|string',
        ]);

        // Create new room
        CreateRoom::create($request->all());

        // Return response
        return response()->json(['message' => 'Room added successfully'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = CreateRoom::findOrFail($id);

        return view('createroom.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = CreateRoom::findOrFail($id);

        return view('createroom.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = CreateRoom::findOrFail($id);

        $product->update($request->all());

        return redirect()->route('createroom')->with('success', 'Room updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = CreateRoom::findOrFail($id);

        $product->delete();

        return redirect()->route('createroom')->with('success', 'Room deleted successfully');
    }

    public function getAllRooms()
    {
        $rooms = CreateRoom::all();
        return response()->json($rooms);
    }
}

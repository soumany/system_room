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
        $product = CreateRoom::orderBy('created_at', 'DESC')->get();
  
        return view('createroom.index', compact('product'));
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
        {
            CreateRoom::create($request->all());
     
            return redirect()->route('createroom')->with('success', 'Room added successfully');
        }
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

   
}

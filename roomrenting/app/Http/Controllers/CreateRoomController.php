<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreateRoom;
use Illuminate\Support\Facades\Storage; 
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
    $request->validate([
        'title' => 'required',
        'product_code' => 'required',
        'description' => 'required',
        'price' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $data = $request->all();

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store('room_images', 'public');
        $data['image_url'] = Storage::url($path);
    }

    CreateRoom::create($data);

    return redirect()->route('createroom')->with('success', 'Room created successfully');
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
    
public function update(Request $request, $id)
{
    $room = CreateRoom::findOrFail($id);

    $request->validate([
        'title' => 'required',
        'product_code' => 'required',
        'description' => 'required',
        'price' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $data = $request->all();

    if ($request->hasFile('image')) {
        // Delete the old image if exists
        if ($room->image_url) {
            $oldImagePath = str_replace('/storage', '', $room->image_url);
            Storage::disk('public')->delete($oldImagePath);
        }

        $path = $request->file('image')->store('room_images', 'public');
        $data['image_url'] = Storage::url($path);
    }

    $room->update($data);

    return redirect()->route('createroom.index')->with('success', 'Room updated successfully');
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

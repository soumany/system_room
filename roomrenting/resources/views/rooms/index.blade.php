@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Rooms</h1>
    <a href="{{ route('rooms.create') }}" class="btn btn-primary">Add Room</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Capacity</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rooms as $room)
            <tr>
                <td>{{ $room->name }}</td>
                <td>{{ $room->capacity }}</td>
                <td>{{ $room->price }}</td>
                <td>
                    <a href="{{ route('reservations.create', $room) }}" class="btn btn-success">Reserve</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

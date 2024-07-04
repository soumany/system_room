@extends('layouts.user')

@section('title', 'Room Details')

@section('contents')
    <h1 class="mb-0">{{ $room->title }}</h1>
    <hr />
    <div>
        <h5>Price: {{ $room->price }}</h5>
        <p>{{ $room->description }}</p>
    </div>
    <a href="{{ route('user.index') }}" class="btn btn-primary">Back to Rooms</a>
    <a href="{{ route('user.index') }}" class="btn btn-primary">Booking</a>
@endsection

@extends('layouts.user')

@section('title', 'Room Details')

@section('contents')
<div class="container mt-4">
    <h1 class="mb-3">{{ $room->title }}</h1>
    <hr />
    <div class="mb-4">
        @if($room->image_url)
        <img src="{{ $room->image_url }}" class="card-img-top" alt="{{ $room->title }}">
        @else
        <img src="default-image-path.jpg" class="card-img-top" alt="Default Image">
        @endif
        <h5>Price: {{ $room->price }}</h5>
        <p>{{ $room->description }}</p>
    </div>
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('user.index') }}" class="btn btn-secondary">Back to Rooms</a>
        <form action="{{ route('user.book', $room->id) }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-success">Book Now</button>
        </form>
    </div>
</div>
@endsection
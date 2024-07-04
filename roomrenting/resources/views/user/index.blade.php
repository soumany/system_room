@extends('layouts.app')

@section('title', 'Available Rooms')

@section('contents')
    <h1 class="mb-0">Available Rooms</h1>
    <hr />
    <div class="row">
        @if($rooms->count() > 0)
            @foreach($rooms as $room)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $room->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Price: {{ $room->price }}</h6>
                            <p class="card-text">{{ $room->description }}</p>
                            <a href="{{ route('user.show', $room->id) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>No rooms available.</p>
        @endif
    </div>
@endsection

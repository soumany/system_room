@extends('layouts.user')

@section('title', 'Available Rooms')

@section('contents')
    <h1 class="mb-0">Available Rooms</h1>
    <hr />
    <div class="row">
        @if($rooms->count() > 0)
            @foreach($rooms as $room)
                <div class="col-sm-6 col-md-4 col-lg-3 mb-3"> <!-- Adjust column width to control spacing -->
                    <div class="card" style="width: 100%;"> <!-- Adjust card width as needed -->
                        @if($room->image_url)
                            <img src="{{ $room->image_url }}" class="card-img-top" alt="{{ $room->title }}">
                        @else
                            <img src="default-image-path.jpg" class="card-img-top" alt="Default Image">
                        @endif
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

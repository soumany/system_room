@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Reserve Room: {{ $room->name }}</h1>
    <form method="POST" action="{{ route('reservations.store', $room) }}">
        @csrf
        <div class="mb-3">
            <label for="reservation_date" class="form-label">Reservation Date</label>
            <input type="date" class="form-control" id="reservation_date" name="reservation_date" required>
        </div>
        <button type="submit" class="btn btn-primary">Reserve</button>
    </form>
</div>
@endsection

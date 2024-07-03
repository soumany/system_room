@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Reservations</h1>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Room</th>
                <th>User</th>
                <th>Reservation Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
            <tr>
                <td>{{ $reservation->room->name }}</td>
                <td>{{ $reservation->user->name }}</td>
                <td>{{ $reservation->reservation_date }}</td>
                <td>{{ $reservation->status }}</td>
                <td>
                    <form method="POST" action="{{ route('reservations.update', $reservation) }}">
                        @csrf
                        @method

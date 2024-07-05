<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Request</title>
    <style>
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            font-size: 16px;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-success {
            background-color: #28a745;
        }
        .btn-danger {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <h3>New Booking Request</h3>
    <p>A new booking request has been made by {{ $user->name }} for the room "{{ $room->title }}".</p>
    <p>Details:</p>
    <ul>
        <li>Price: {{ $room->price }}</li>
        <li>Description: {{ $room->description }}</li>
    </ul>
    <p>
        <a href="{{ route('booking.response', ['id' => $room->id, 'response' => 'accept']) }}" class="btn btn-success">Accept</a>
        <a href="{{ route('booking.response', ['id' => $room->id, 'response' => 'reject']) }}" class="btn btn-danger">Reject</a>
    </p>
</body>
</html>

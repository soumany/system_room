<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Status Update</title>
</head>
<body>
    <h2>Reservation Status Update</h2>
    <p>Hello {{ $reservation->user->name }},</p>
    <p>Your reservation status has been updated:</p>
    
    <ul>
        <li><strong>Room:</strong> {{ $reservation->room->name }}</li>
        <li><strong>Reservation Date:</strong> {{ $reservation->reservation_date }}</li>
        <li><strong>Status:</strong> {{ $reservation->status }}</li>
    </ul>

    <p>Thank you!</p>
</body>
</html>

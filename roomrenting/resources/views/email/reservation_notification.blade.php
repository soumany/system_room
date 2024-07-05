<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Reservation</title>
</head>
<body>
    <h2>New Reservation</h2>
    <p>Hello Admin,</p>
    <p>A new reservation has been made:</p>
    
    <ul>
        <li><strong>Room:</strong> {{ $reservation->room->name }}</li>
        <li><strong>User:</strong> {{ $reservation->user->name }}</li>
        <li><strong>Reservation Date:</strong> {{ $reservation->reservation_date }}</li>
    </ul>

    <p>Thank you!</p>
</body>
</html>

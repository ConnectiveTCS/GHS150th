<!DOCTYPE html>
<html>

<head>
    <title>New Reservation</title>
</head>

<body>
    <p>Hi Admin,</p>

    <p>A user submitted their booking for the Banquet.</p>

    <p>User details:</p>
    <p>Name: {{ $reservation->first_name }} {{ $reservation->last_name }}<br>
        Email: {{ $reservation->email }}<br>
        Phone Number: {{ $reservation->phone }}<br>
        Year Group: {{ $reservation->class_of }}<br>
        Is Attending: {{ $reservation->is_attending ? 'Yes' : 'No' }}</p>

    <p>Kind Regards,<br>
        GHS 150th Web Admin</p>
</body>

</html>

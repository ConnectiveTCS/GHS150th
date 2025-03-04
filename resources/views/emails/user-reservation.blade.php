<!DOCTYPE html>
<html>

<head>
    <title>Reservation Confirmation</title>
</head>

<body>
    <p>Hi {{ $reservation->first_name }} {{ $reservation->last_name }},</p>

    <p>Thank you for RSVP'ing for the Banquet.</p>

    <p>Your details:</p>
    <p>Name: {{ $reservation->first_name }} {{ $reservation->last_name }}<br>
        Email: {{ $reservation->email }}<br>
        Phone Number: {{ $reservation->phone }}<br>
        Year Group: {{ $reservation->class_of }}<br>
        Is Attending: {{ $reservation->is_attending ? 'Yes' : 'No' }}</p>

    <p>If you need to update these settings please email: oqa@qtghs.co.za.</p>

    <p>Kind Regards,<br>
        GHS 150th</p>
</body>

</html>

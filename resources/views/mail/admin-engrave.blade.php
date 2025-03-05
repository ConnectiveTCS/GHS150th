<!DOCTYPE html>
<html>

<head>
    <title>New Engrave Submitted</title>
</head>

<body>
    <p>Hi Admin,</p>

    <p>A user submitted a new request for an engraving.</p>

    <p>User details:</p>
    <p>Name:{{ $engrave->name }}<br>
        Email: {{ $engrave->email }}<br>
        Phone Number: {{ $engrave->phone }}<br>
        Message: {{ $engrave->message }}</p>

    <p>Kind Regards,<br>
        GHS 150th Web Admin</p>
</body>

</html>

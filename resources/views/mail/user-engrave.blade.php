<!DOCTYPE html>
<html>

<head>
    <title>New Engrave Submitted</title>
</head>

<body>
    <p>Hi {{ $engrave->name }},</p>

    <p>
        Thank you for submitting your request for an engraving. We will get back to you shortly.
    </p>

    <p>Your details:</p>
    <p>Name:{{ $engrave->name }}<br>
        Email: {{ $engrave->email }}<br>
        Phone Number: {{ $engrave->phone }}<br>
        Message: {{ $engrave->message }}</p>

    <p>Kind Regards,<br>
        GHS 150th</p>
</body>

</html>

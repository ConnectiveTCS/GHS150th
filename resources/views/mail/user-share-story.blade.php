<!DOCTYPE html>
<html>

<head>
    <title>New Share Story Submitted</title>
</head>

<body>
    <p>Hi {{ $sharestory->name }},</p>

    <p>
        Thank you for submitting your story.
    </p>

    <p>Your details:</p>
    <p>Name:{{ $sharestory->name }}<br>
        Email: {{ $sharestory->email }}<br>
        Phone Number: {{ $sharestory->phone }}<br>
        Message: {{ $sharestory->message }}</p>

    <p>Kind Regards,<br>
        GHS 150th</p>
</body>

</html>

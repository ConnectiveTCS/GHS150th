<!DOCTYPE html>
<html>

<head>
    <title>New Share Story Submission</title>
</head>

<body>
    <p>Hi Admin,</p>

    <p>A user submitted a new story.</p>

    <p>User details:</p>
    <p>Name: {{ $sharestory->name }}<br>
        Email: {{ $sharestory->email }}<br>
        Phone Number: {{ $sharestory->phone }}<br>
        Message: {{ $sharestory->message }}</p>

    <p>Kind Regards,<br>
        GHS 150th Web Admin</p>
</body>

</html>

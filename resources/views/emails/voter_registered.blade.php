<!DOCTYPE html>
<html>
<head>
    <title>Voter Registration Confirmation</title>
</head>
<body>
    <p>Dear {{ $voter->first_name }},</p>

    <p>Thank you for registering in the Voter ID Registration System.</p>

    <p>Your Voter ID is: <strong>{{ $voter->id }}</strong></p>

    <p>Below are your details:</p>
    <ul>
        <li>Name: {{ $voter->first_name }} {{ $voter->last_name }}</li>
        <li>Date of Birth: {{ $voter->dob }}</li>
        <li>Email: {{ $voter->email }}</li>
        <li>Mobile: {{ $voter->mobile }}</li>
        <li>Address: {{ $voter->address }}</li>
        <li>Taluk: {{ $voter->taluk }}</li>
        <li>District: {{ $voter->district }}</li>
        <li>State: {{ $voter->state }}</li>
    </ul>

    <p>Regards,<br>Voter ID Registration Team</p>
</body>
</html>

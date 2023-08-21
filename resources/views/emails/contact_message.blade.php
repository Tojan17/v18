<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Message</title>
</head>

<body>

    <h1>Dear Admin</h1>
    <p>There Is New Message With This Data</p>
    <p><b>Name:</b>{{ $data['name'] }}</p>
    <p><b>Email:</b>{{ $data['email'] }}</p>
    <p><b>Phone:</b>{{ $data['phone'] }}</p>
    <p><b>Message:</b>{{ $data['message'] }}</p>
    <br>
    <p>best wishes!</p>



</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Email</title>
</head>
<body> 
    <h2><strong>Your Inquiry Regarding {{ $data['subject'] }}</strong></h2>
    <p><strong></strong>{{ $data['message'] }}<strong></strong></p>
    <p>{!! $data['reply'] !!}</p>
    
</body>
</html>
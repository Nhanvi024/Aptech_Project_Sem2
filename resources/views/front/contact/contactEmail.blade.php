<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Contact Email</title>
</head>

<body>
	<h2><strong>Your Inquiry Regarding {{ $data["subject"] }}</strong></h2>
	<p>Dear <span>{{ $data["name"] }}</span>,</p>
	<p>Thank your for reaching out to Fruitkha, we have received your message and we are more than happy to assist you.
	</p>
	<br>

	<p>First, this is the message we have received from you:</p>
	<p><strong></strong>{{ $data["message"] }}<strong></strong></p>
	<br>

	<p>Our answer: </p>
	<p>{!! $data["reply"] !!}</p>
	<br>

	<p>If you have any other questions, feel free to respond to this email.</p>
	<p>Thank you,</p>
	<p>Fruitkha.</p>
</body>

</html>

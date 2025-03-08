<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FruitKha</title>
</head>

<body>
	<h1>{{ $details["title"] }}</h1>
	<p>
		Dear <span>{{ $details["name"] }}</span>,
	</p>
	<p>
		You are registering a FruitKha Account with this email address <span>{{ $details["email"] }}</span>.
	</p>
	<hr>
	<p>Please click the following link to verify your email address.
	</p>
	<p>http://127.0.0.1:8000/verifyingemail/{{ $details["email"] }}/{{ $details["verificationLink"] }}</p>
	<p>
		If it was not you to require this verification code, someone may have used your mailbox without permission or tried to
		steal your account. To protect your account security, please do not share your verification code with others.
	</p>
	<hr>
	<p>
		This email is sent automatically, please do not reply directly.
	</p>
</body>
</html>

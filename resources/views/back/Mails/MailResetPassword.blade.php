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
	<hr>

	<p>
		A request has been recieved to change the password for your FruitKha account.
	</p>
	<p>
		Your email: <a href="">{{ $details["email"] }}</a>
	</p>
	<hr>

	<p>
		To reset your password, please click the link below:
	</p>
	<p>
		http://127.0.0.1:8000/resetpassword/{{ $details["email"] }}/{{ $details["token_login"] }}/{{ $details["token_password"] }}
	</p>
	<p>
		If this was a mistake, please ignore the email and nothing will happen.
	</p>
	<p>
		<strong>Important:</strong> This email may contain sensitive information. Please do not forward it to unauthorized
		parties.
	</p>
	<hr>
	<p>
		This email is sent automatically, please do not reply directly.
	</p>
</body>

</html>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
	</head>
	<body>
		<h1> Password Reset</h1>
		To reset your password, complet this form:
		{{	URL:rout('user/reset', compact('token')) }}
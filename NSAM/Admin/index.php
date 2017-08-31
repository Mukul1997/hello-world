<?php 
 require 'validation/validate.php';
?>
<html lang="en-US">

<head>
	<link rel="shortcut icon" type="image/png" href="img/Nitte-Logo.png">
	<meta charset="utf-8">
	<title>Admin Login</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/fontawesome.css">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Varela+Round">
	<script type="text/javascript" src="js/log.js"></script>
</head>

<body id="view">
	<div class="container-fluid img-responsive" id="login">
		<h2><span class="fontawesome-lock"></span>Admin Login</h2>
		<form action="#" method="POST" onsubmit="clear()">
			<fieldset>
				<legend>&nbsp;</legend>
				<p><label for="email">Username</label></p>    
				<p><input type="text" id="email" name="user" placeholder="Enter username" required></p>
				<p><label for="password">Password</label></p>
				<p><input type="password" id="password" name="pass" placeholder="Enter password" required></p>
				<p><input type="submit" value="Log In" name="login"></p>
			</fieldset>
		</form>
	</div>
	<script src="js/bstrap_jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

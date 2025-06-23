<html>
	<head>
		<title>Main Login Page</title>
	</head>
	<body>

<?php
// Check if session is not registered, redirect back to main page. 
// Put this code in first line of web page. 
session_start();

if(!isset($_SESSION['username'])){
	header("location:main_login.php");
}

?>

Login Successful



	</body>
</html>
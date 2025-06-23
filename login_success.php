<html>
	<head>
		<title>Main Login Page</title>
	</head>
	<body>

<?php
// Check if session is not registered, redirect back to main page. 
// Put this code in first line of web page. 
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

require 'config.php';
$g_page = 'index';  // Set to appropriate page
require 'header.php';
require 'menu.php';

?>

Login Successful



	</body>
</html>
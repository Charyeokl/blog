<html>
	<head>
		<title>Main Logout Page</title>
	</head>
	<body>

<?php 
// Put this code in first line of web page. 
session_start();
session_destroy();

echo "Session Username is ".$_SESSION['username'];
?>




	</body>
</html>
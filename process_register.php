<html>
	<head>
		<title>Main Register Page</title>
	</head>
	<body>

		<?php

		ob_start();
		$host="localhost"; // Host name
		$username="bloguser"; // Mysql username
		$password="bloguser"; // Mysql password
		$db_name="blog"; // Database name
		$tbl_name="members"; // Table name

		$mysqli = new mysqli($host, $username, $password, $db_name);

		/* check connection */
		if ($mysqli->connect_errno) {
			printf("Connect failed: %s\n", $mysqli->connect_error);
			exit();
		}
		$myusername=$_POST['myusername'];
		$mypassword=$_POST['mypassword'];

		// To protect MySQL injection (more detail about MySQL injection)
		$cleanusername = $myusername;
		$cleanpassword = $mypassword;

		// salting adds uniqueness to each entry.
		$salt=uniqid() ;
		$salted_password=$salt.$cleanpassword;
		$encrypted_password = hash("sha512", $salted_password); 

		$sql="insert into $tbl_name (username,password,salt) values ('$cleanusername','$encrypted_password','$salt')";
		if (!$mysqli->query($sql)) {
			echo "INSERT failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		else
		{
			echo "Registered";
		}
		printf("SQL statement is $sql");
		ob_end_flush();
		?>




	</body>
</html>

<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: index.php");
    exit;
}
?>
<html>
	<head>
		<title>Main Register Page</title>
	</head>
	<body>

		<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
			<tr>
				<form name="form1" method="post" action="process_register.php">
					<td>
						<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
							<tr>
								<td colspan="3"><strong>Member Register </strong></td>
							</tr>
							<tr>
								<td width="78">Username</td>
								<td width="6">:</td>
								<td width="294"><input name="myusername" type="text" id="myusername"></td>
							</tr>
							<tr>
								<td>Password</td>
								<td>:</td>
								<td><input name="mypassword" type="text" id="mypassword"></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td><input type="submit" name="Submit" value="Register"></td>
							</tr>
						</table>
					</td>
				</form>
			</tr>
		</table>


	</body>
</html>
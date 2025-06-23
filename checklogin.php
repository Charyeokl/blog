[file name]: checklogin.php
[change description]: Set loggedin session variable and improve security
[new content]:
<?php
ob_start();
session_start(); // Ensure session is started

$host="localhost";
$username="bloguser";
$password="bloguser";
$db_name="blog";
$tbl_name="members";
$mysqli = new mysqli($host, $username, $password, $db_name);

/* check connection */
if ($mysqli->connect_errno) {
    die("Connect failed: " . $mysqli->connect_error);
}

$myusername = $_POST['myusername'];
$mypassword = $_POST['mypassword'];

// Use prepared statement to prevent SQL injection
$stmt = $mysqli->prepare("SELECT id, password FROM $tbl_name WHERE username = ? LIMIT 1");
$stmt->bind_param("s", $myusername);
$stmt->execute();
$result = $stmt->get_result();

$login_success = false;
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $returnedpassword = $row['password'];
    
    // Compare passwords (plain text comparison as in original)
    if ($mypassword == $returnedpassword) {
        $login_success = true;
        $_SESSION['user_id'] = $row['id'];
    }
}

if ($login_success) {
    // Set session variables needed for menu system
    $_SESSION['username'] = $myusername;
    $_SESSION['loggedin'] = true;
    
    header("Location: login_success.php");
    exit;
} else {
    // Show error with basic styling
    echo '<div style="color:red;text-align:center;margin-top:50px;">';
    echo 'Wrong Username or Password';
    echo '</div>';
}

$stmt->close();
$mysqli->close();
ob_end_flush();
?>
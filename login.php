[file name]: login.php
[change description]: Add form handling, session management, and error display
[new content]:
<?php
// Start session
session_start();

// Redirect if already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: index.php");
    exit;
}

require 'config.php';
require 'database.php';

// Initialize variables
$error = '';
$username = '';

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Submit'])) {
    $username = trim($_POST['myusername']);
    $password = trim($_POST['mypassword']);
    
    // Validate credentials
    $user = validate_user($username, $password);
    
    if ($user) {
        // Set session variables
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_id'] = $user['id'];
        
        // Redirect to success page
        header("Location: login_success.php");
        exit;
    } else {
        $error = "Invalid username or password";
    }
}

$g_title = BLOG_NAME . ' - Login';
$g_page = 'login';
require 'header.php';
require 'menu.php';
?>

<div id="content">
    <h2>Member Login</h2>
    
    <?php if ($error): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    
    <form name="form1" method="post" action="login.php">
        <table>
            <tr>
                <td>Username:</td>
                <td><input name="myusername" type="text" id="myusername" value="<?= htmlspecialchars($username) ?>"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input name="mypassword" type="password" id="mypassword"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="Submit" value="Login"></td>
            </tr>
        </table>
    </form>
</div>

<?php require 'footer.php'; ?>
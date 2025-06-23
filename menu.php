[file name]: menu.php
[change description]: Add Logout, Register, and Privacy Policy tabs with conditional visibility
[new content]:
<?php
if (!isset($g_page)) {
    $g_page = '';
}

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$loggedin = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
?>

<ul id="menu">
    <li><a href="index.php" <?= ($g_page == 'index') ? "class='active'" : '' ?>>Home</a></li>
    <li><a href="create.php" <?= ($g_page == 'create') ? "class='active'" : '' ?>>New Post</a></li>
    
    <?php if (!$loggedin): ?>
        <li><a href="login.php" <?= ($g_page == 'login') ? "class='active'" : '' ?>>Login</a></li>
        <li><a href="register.php" <?= ($g_page == 'register') ? "class='active'" : '' ?>>Register User</a></li>
    <?php endif; ?>
    
    <?php if ($loggedin): ?>
        <li><a href="logout.php" <?= ($g_page == 'logout') ? "class='active'" : '' ?>>Logout</a></li>
    <?php endif; ?>
    
    <li><a href="privacy_policy.php" <?= ($g_page == 'privacy') ? "class='active'" : '' ?>>Privacy Policy</a></li>
</ul> <!-- END div id="menu" -->
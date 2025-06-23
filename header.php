<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($g_title)) {
    $g_title = 'My Blog';
}

if (!isset($g_page)) {
    $g_page = '';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $g_title ?></title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1><a href="index.php"><?= $g_title ?></a></h1>
        </div> <!-- END div id="header" -->
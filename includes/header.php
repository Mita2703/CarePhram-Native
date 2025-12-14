<?php include __DIR__ . "/../config/db.php"; ?>
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /carepharm/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>CarePharm</title>
    <link rel="stylesheet" href="/carepharm/css/style.css">
</head>
<body>

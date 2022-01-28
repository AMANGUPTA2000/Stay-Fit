<?php
session_start();

unset($_SESSION['idTokenString']);
unset($_SESSION['idTokenString']);

$_SESSION['status'] = "Logged Out Successfully.";
header('Location: get-started.php');
?>
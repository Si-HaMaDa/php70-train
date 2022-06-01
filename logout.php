<?php
session_start();

$_SESSION['is_login'] = false;
$_SESSION['user_id'] = '';
$_SESSION['user_email'] = '';
$_SESSION['login_time'] = date('Y-m-d');

header('location: login.php');

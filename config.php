<?php

session_start();

define('DB_TYPE', "mysql");
define('DB_HOST', "localhost");
define('DB_USER_NAME', "root");
define('DB_PASSWORD', "root");
define('DB_NAME', "php70");

try {
    $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER_NAME, DB_PASSWORD);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "<h1>Connection failed: " . $e->getMessage() . '</h1>';
}

// Helper Functions
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

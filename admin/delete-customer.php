<?php

require '../config.php';

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

try {
    $id = (int) test_input($_GET['id']);
    $stmt = $conn->prepare("DELETE FROM customers WHERE id=$id");
    $stmt->execute();
    header('location: /admin/customers.php');
} catch (PDOException $e) {
    echo "<h1>Query Error: " . $e->getMessage() . "</h1>";
}

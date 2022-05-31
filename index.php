<?php

require 'config.php';

try {

    // $conn->exec("INSERT INTO MyGuests (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')");

    $stmt = $conn->prepare("SELECT * FROM MyGuests order By firstname limit 10");
    $stmt->execute();
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $MyGuests = $stmt->fetchAll();

    // $MyGuests = $conn->query("SELECT * FROM MyGuests")->fetchAll();

    foreach ($MyGuests as $MyGuest) {
        echo $MyGuest['firstname'] . '<br>';
    }
} catch (PDOException $e) {
    echo "Query Error: " . $e->getMessage();
}


echo "<br>Rest of the script!";


$data = '+----+-----------+----------+-------------------+---------------------+
| id | firstname | lastname | email             | reg_date            |
+----+-----------+----------+-------------------+---------------------+
|  1 | Ahmed     | Noor     | new@gmail.com     | 2022-05-30 19:33:20 |
|  2 | John      | Doe      | john@example.com  | 2022-05-30 19:24:14 |
|  4 | John      | Doe      | john@example.com  | 2022-05-30 19:34:42 |
|  5 | Mary      | Moe      | mary@example.com  | 2022-05-30 19:34:42 |
|  6 | Julie     | Dooley   | julie@example.com | 2022-05-30 19:34:42 |
|  7 | John      | Doe      | john@example.com  | 2022-05-30 19:36:07 |
|  8 | Mary      | Moe      | mary@example.com  | 2022-05-30 19:36:07 |
|  9 | Julie     | Dooley   | julie@example.com | 2022-05-30 19:36:07 |
| 10 | John      | Doe      | john@example.com  | 2022-05-30 19:37:25 |
| 11 | Mary      | Moe      | mary@example.com  | 2022-05-30 19:37:25 |
| 12 | Julie     | Dooley   | julie@example.com | 2022-05-30 19:37:25 |
| 13 | John      | Doe      | john@example.com  | 2022-05-30 19:37:54 |
| 14 | John      | Doe      | john@example.com  | 2022-05-30 19:38:37 |
| 15 | John      | Doe      | john@example.com  | 2022-05-30 19:39:12 |
+----+-----------+----------+-------------------+---------------------+
14 rows in set (0.00 sec)
';

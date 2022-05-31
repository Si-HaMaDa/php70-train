<?php

$conn = new PDO("mysql:host=localhost;dbname=php70", 'root', 'root');


// $conn->query("INSERT INTO MyGuests (firstname, lastname, email) VALUES ('Nasr', 'Nady', 'john@example.com')");


$MyGuests = $conn->query("SELECT * FROM MyGuests")->fetchAll();

// echo '<pre>';
// var_dump($MyGuests);
foreach ($MyGuests as $MyGuest) {
    echo $MyGuest['firstname'] . '<br>';
}

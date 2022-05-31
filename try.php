<?php
/* 
try {
    require 'to1.php';
    echo '<br>';
    var_dump('From Try!'); // 1
} catch (\Throwable $ex) {
    echo '<pre>';
    var_dump($ex->getMessage());
    var_dump('Error Catched!'); // 2
} finally {
    echo '<br>';
    var_dump('From Finally!'); // 3
}

echo '<br>';
echo '<br>';
var_dump('Hello Wolrd'); // 4
 */


//create function with an exception
function checkNum($number)
{
    if ($number > 1) {
        throw new Exception("Value must be 1 or below");
        echo 'Error!';
    }
    echo 'Done!';
}

try {
    //trigger exception
    checkNum(2);
} catch (\Throwable $th) {
    var_dump('Please insert a number less than 1');
}

echo '<br>';
var_dump('Hello Wolrd'); // 4
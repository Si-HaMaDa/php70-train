<?php
///// PHP - Objects ////////////////////////////////////////////////////////////////
/* $car = (object) [
    'name' => 'Volvo',
    'Model' => 'ee',
    'move' => function () {
        return 'Moving...';
    }
];

$car1 = (object) [
    'name' => 'Me',
    'move' => function () {
        return 'Moving...';
    }
];

$car3 = (object) [
    'name' => 'BMW',
    'move' => function () {
        return 'Moving...';
    }
];

var_dump($car);

echo '<br>';

echo $car->name;

echo '<br>';

$result = $car->move;
var_dump($result()); */


//// PHP OOP - Classes and Objects /////////////////////////////////////////////////
/* class Car
{
    public $name = 'BMW';
    public $model = 'ES';
    public $speed = 100;
    public $color = '';

    public function intro()
    {
        return "This car is $this->name and it's model is $this->model and it's speed is $this->speed";
    }

    public function move()
    {
        return 'Moving...';
        return $this->intro();
    }
}

$car1 = new Car();
$car1->model = 'NEW';
$car1->speed = 200;
var_dump($car1->intro());

echo '<br>';

$car2 = new Car();
var_dump($car2->intro());
echo '<br>'; */

///// PHP OOP Constructor - Destructor /////////////////////////////////////////////
/* class Car
{
    public $name;
    public $model;
    public $speed;
    public $color;

    public function __construct($n, $m, $s, $c)
    {
        // echo 'Construct';
        $this->name = $n;
        $this->model = $m;
        $this->speed = $s;
        $this->color = $c;
    }

    function set_name($name)
    {
        $this->name = $name;
    }

    public function intro()
    {
        echo 'Intro';
        return "This car is $this->name and it's model is $this->model and it's speed is $this->speed";
    }

    public function move()
    {
        echo 'Move';
        return 'Moving...';
        return $this->intro();
    }

    public function __destruct()
    {
        echo "The Car is {$this->name} and the color is {$this->color}.<br>";
    }
}

$bmw = new Car('BMW', 'ES', 100, 'Red');
// $bmw->name = 'BMW';
// $bmw->set_name('BMW');
// $bmw->model = 'ES';

// echo $bmw->intro();
var_dump($bmw);

echo '<br>';

$volvo = new Car('Volvo', 'E1', 100, 'White');

var_dump($volvo);

echo '<br>'; */

///// PHP OOP - Access Modifiers ///////////////////////////////////////////////////
class User
{
    public $name;
    protected $phone;
    private $password;

    public function __construct($n, $p)
    {
        $this->name = $n;
        $this->phone = $p;
    }

    public function set_password($val)
    {
        if (strlen($val) < 6 || strlen($val) > 10) {
            return 'false';
        } else {
            $this->password = $val;
            return 'true';
        }
    }

    protected function get_password()
    {
        return '*********';
    }

    public function get_phone()
    {
        return substr($this->phone, -3, 3);
    }
}

$nour = new User('Nour', '0123456789');
echo $nour->name; // OK
echo '<br>';
// $nour->phone = '01111111111'; // ERROR
// $nour->password = '01111111111'; // ERROR
echo $nour->get_phone();
echo '<br>';

// echo $nour->password; //ERROR
// echo $nour->get_password(); //ERROR
echo $nour->set_password('123');
echo '<br>';

var_dump($nour);
echo '<br>';

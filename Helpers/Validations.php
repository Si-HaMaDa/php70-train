<?php

// namespace Helpers;

class Validations
{
    public $value;
    public $error = false;
    public $messages = [];

    public function __construct($value)
    {
        $this->value = $value;
        $this->value = trim($this->value);
        $this->value = stripslashes($this->value);
        $this->value = htmlspecialchars($this->value);
    }

    public function isIsset()
    {
        if (!isset($this->value)) {
            $this->error = true;
            $this->messages[] = "Value is not set!";
        }
        return $this;
    }

    public function notEmpty()
    {
        if (empty($this->value)) {
            $this->error = true;
            $this->messages[] = "Value is Empty!";
        }
        return $this;
    }

    public function isName()
    {
        if (!preg_match("/^[a-zA-Z-' ]*$/", $this->value)) {
            $this->error = true;
            $this->messages[] = "Only letters and white space allowed!";
        }
        return $this;
    }

    public function isEmail()
    {
        if (!filter_var($this->value, FILTER_VALIDATE_EMAIL)) {
            $this->error = true;
            $this->messages[] = "Invalid Email!";
        }
        return $this;
    }

    public function isInteger()
    {
        if (!filter_var($this->value, FILTER_VALIDATE_INT)) {
            $this->error = true;
            $this->messages[] = "Value is not Integer!";
        }
        return $this;
    }

    public function min($number = 6)
    {
        if (strlen($this->value) < $number) {
            $this->error = true;
            $this->messages[] = "Value must be More than $number!";
        }
        return $this;
    }

    public function max($number = 225)
    {
        if (strlen($this->value) > $number) {
            $this->error = true;
            $this->messages[] = "Value must be Less than $number!";
        }
        return $this;
    }

    public function isFile()
    {
        $check = getimagesize($this->value);
        if ($check == false) {
            $this->error = true;
            $this->messages[] = "File is not an image.";
        }
        return $this;
    }

    // TODO:: image validation

    public function checkErrors()
    {
        return $this->error;
    }
}

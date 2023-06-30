<?php

class LoginUser extends Login
{
    //this are properties taken from the class, add class to the variables just to be clear jer
    private $class_email;
    private $class_password;

    //this $name, $username and so on is the data taken from the user jer
    public function __construct($email, $password)
    {
        $this->class_email = $email;
        $this->class_password = $password;
    }

    public function LoginUserIfValidationIsCorrect()
    {
        $this->getUser($this->class_email, $this->class_password);
    }
}

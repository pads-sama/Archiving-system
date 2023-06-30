<?php

if (isset($_POST["register"])) {
    $name = $_POST['name'];
    $usertype = 'user';
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    include '../config/db_connection.php';
    include '../classes/register_class.php';
    include '../controller/register_controller.php';

    $registerNew = new RegisterNewUser($name, $usertype, $email, $password, $confirmPassword);

    $registerNew->SignupUserIfValidationIsCorrect();

    echo "<script>alert('Account Created. Go to Login'); window.location.href = '../user/userHome';</script>";
}

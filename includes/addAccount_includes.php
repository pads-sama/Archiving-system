<?php

if (isset($_POST["add-user"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $usertype = $_POST['usertype'];

    include '../config/db_connection.php';
    include '../classes/addAccount_class.php';
    include '../controller/addAccount_controller.php';

    $registerNew = new addAccountCont($name, $usertype, $email, $password, $confirmPassword,);

    $registerNew->addAccountAfterValidation();

    echo "<script>alert('Account Created. Go to Login'); window.location.href = '../admin/adminHome';</script>";
}

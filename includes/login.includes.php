<?php
session_start();

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    include '../config/db_connection.php';
    include '../classes/login_class.php';
    include '../controller/login_controller.php';

    $registerNew = new LoginUser($email, $password);

    $registerNew->LoginUserIfValidationIsCorrect();

    if (isset($_SESSION['user_id'])) {
        $usertype = $_SESSION['usertype'];

        if ($usertype === 'admin') {
            header("Location: ../admin/adminHome");
            exit();
        } elseif ($usertype === 'user') {
            header("Location: ../user/userHome");
            exit();
        } else {
            header("Location: ../pages/login");
            exit();
        }
    } else {
        header("Location: ../pages/login");
        exit();
    }
}
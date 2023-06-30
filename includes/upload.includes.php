<?php

if (isset($_POST['upload'])) {

    $title = htmlspecialchars($_POST['title']);
    $author = htmlspecialchars($_POST['author']);
    $year = htmlspecialchars($_POST['year']);
    $course = htmlspecialchars($_POST['course']);
    $description = htmlspecialchars($_POST['description']);
    $filename = $_FILES['file']['tmp_name'];
    $file = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];

    include '../config/db_connection.php';
    include '../classes/upload_class.php';
    include '../controller/upload_controller.php';

    $uploadClass = new uploadFileClass();
    $final_path = $uploadClass->uploadFile($file, $filename);

    $upload = new UploadFileCont($title, $author, $year, $course, $description, $file, $file_size, $final_path);
    $upload->insertUploadToDatabase();

    echo "<script>alert('Upload successful!'); window.location.href = '../user/userHome';</script>";
}
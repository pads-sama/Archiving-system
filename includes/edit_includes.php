<?php
include '../config/db_connection.php';

if (isset($_POST['reset'])) {
    $oldpassword = htmlspecialchars($_POST['oldpassword']);
    $newpassword = htmlspecialchars($_POST['newpassword']);
    $con_newpassword = htmlspecialchars($_POST['con-newpassword']);

    if (!empty($oldpassword) || !empty($newpassword) || !empty($con_newpassword)) {
        if ($newpassword !== $con_newpassword) {
        } else {
            echo "<script>alert('Fill out all fields!'); window.location.href = '../user/userMyUploads';</script>";
        }
    } else {
        echo "<script>alert('Fill out all fields!'); window.location.href = '../user/userMyUploads';</script>";
    }
}

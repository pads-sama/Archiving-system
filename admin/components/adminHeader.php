<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../pages/login");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.slim.js" integrity="sha256-dWvV84T6BhzO4vG6gWhsWVKVoa4lVmLnpBOZh/CAHU4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/bcc8dbc5ae.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../asset/css/admin/admin.layout.css">
    <link rel="stylesheet" href="../asset/css/admin/admin.sidebar.css">
    <link rel="stylesheet" href="../asset/css/admin/admin.maincontent.css">
    <link rel="stylesheet" href="../asset/css/admin/admin.bodycontent.css">
    <link rel="stylesheet" href="../asset/css/admin/adminUpload.css">
    <title>Admin</title>
</head>
<style>
    html,
    body {
        margin: 0;
        padding: 0;
        font-family: 'Roboto', sans-serif;

    }
</style>

<body>
    <div class="admin-layout">
        <div class="side-bar-menu">
            <?php include 'components/sidebar.php' ?>
        </div>
        <div class="main-content">
            <div class="main-contents">
                <?php include 'components/maincontent.php' ?>
                <div class="content-body">
                    <div class="body-header-container">
<?php

include '../config/db_connection.php';

$id = $_GET['id'];

$selConn = new DatabaseConnection();
$connSel = $selConn->dbConnection();
$sel = $connSel->prepare("SELECT status FROM uploads WHERE id = ?");
$sel->execute(array($id));
$res = $sel->fetch(PDO::FETCH_ASSOC);

$updateStatus = ($res['status'] == '0') ? '1' : '0';
$update = "UPDATE uploads SET status = '$updateStatus' WHERE id =$id";
$connSel->exec($update); // execute the update query
header("Location: manageUploads.php");
exit();

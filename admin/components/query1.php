<?php
session_start();
include '../../config/db_connection.php';

$sel = new DatabaseConnection();
$newSel = $sel->dbConnection();
$select =  $newSel->query("SELECT * FROM user");
$userInfo = $select->fetchAll(PDO::FETCH_ASSOC);


header('Content-Type: application/json');
echo json_encode($userInfo);

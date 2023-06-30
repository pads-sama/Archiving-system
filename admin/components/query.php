<?php
session_start();
include '../../config/db_connection.php';

$user_id = $_SESSION['user_id'];
$sel = new DatabaseConnection();
$newSel = $sel->dbConnection();
$select = $newSel->prepare("SELECT id, title, uploadedby, uploaded_at, file_name FROM uploads WHERE uploader_id = ?");
$select->execute([$user_id]);

$data = array();
while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;
}

header('Content-Type: application/json');
echo json_encode($data);

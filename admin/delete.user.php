<?php
include '../config/db_connection.php';

if (isset($_GET['id'])) {
    $dbConn = new DatabaseConnection();
    $Conn = $dbConn->dbConnection();
    $sel = $Conn->prepare("SELECT * FROM user WHERE id = ?");
    $sel->execute(array($_GET['id']));

    if ($sel->rowCount() > 0) {
        $row = $sel->fetch(PDO::FETCH_ASSOC);

        $deleteRow = $Conn->prepare("DELETE FROM user WHERE id = ?");
        $deleteRow->execute(array($_GET['id']));

        echo "<script>alert('DELETED SUCCESSFULLY!'); window.location.href = '../admin/manageUser';</script>";
    } else {
        echo json_encode(array('success' => false));
    }
} else {
    echo json_encode(array('success' => false, 'message' => 'No file path found for id ' . $_GET['id']));
}

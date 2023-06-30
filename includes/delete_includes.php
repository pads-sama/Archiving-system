    <?php
    include '../config/db_connection.php';

    if (isset($_GET['id'])) {
        $dbConn = new DatabaseConnection();
        $Conn = $dbConn->dbConnection();
        $sel = $Conn->prepare("SELECT * FROM uploads WHERE id = ?");
        $sel->execute(array($_GET['id']));

        if ($sel->rowCount() > 0) {
            $row = $sel->fetch(PDO::FETCH_ASSOC);
            $filePath = $row['file_path'];

            if (unlink($filePath)) {
                $deleteRow = $Conn->prepare("DELETE FROM uploads WHERE id = ?");
                $deleteRow->execute(array($_GET['id']));

                echo "<script>alert('DELETED SUCCESSFULLY!'); window.location.href = '../user/userHome';</script>";
            }
        } else {
            echo "No file path found for id " . $_GET['id'];
        }
    } else {
        echo "ID NOTSET ";
    }

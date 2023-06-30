<?php
include '../config/db_connection.php';
if (isset($_POST['file_id'])) {
    $id = $_POST['file_id'];
    $output = "";

    $newConnModal = new DatabaseConnection();
    $newModalConn = $newConnModal->dbConnection();
    $select = $newModalConn->prepare("SELECT * FROM uploads WHERE id = ?");
    $select->execute(array($id));
    if ($select->rowCount() > 0) {


        $output .= '
<div class="container table mt-3">
    <table class="table table-striped">';
        while ($row = $select->fetch()) {
            $output .= '
        <tr>
            <td width="30%"><strong>Title</strong></td>
            <td width="70%">' . $row["title"] . '</td>
        </tr>
        <tr>
            <td width="30%"><strong>Uploader</strong></td>
            <td width="70%">' . $row["uploadedby"] . '</td>
        </tr>
        <tr>
            <td width="30%"><strong>Year</strong></td>
            <td width="70%">' . $row["year"] . '</td>
        </tr>
        <tr>
            <td width="30%"><strong>Description</strong></td>
            <td width="70%">' . $row["description"] . '</td>
        </tr>
        <tr>
            <td width="30%"><strong>File </strong></td>
            <td width="70%"><a href="' . $row["file_path"] . '">' . $row["file_name"] . '</a></td>
        </tr>
        ';
        }
        $output .= "
    </table>
</div>";
        echo $output;
    }
}

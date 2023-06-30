<?php

include '../includes/Header.php';
include '../includes/NavBar.php';
include '../config/db_connection.php';



if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $newConn = new DatabaseConnection();
    $ConnNew = $newConn->dbConnection();

    $getFile = $ConnNew->prepare('SELECT * FROM uploads WHERE id = ?');
    $getFile->execute(array($id));

    if ($getFile->rowCount() > 0) {
        while ($row = $getFile->fetch(PDO::FETCH_ASSOC)) {
?>
            <title><?= $row['title'] ?></title>
            <div class="container">
                <div class="container shadow pt-5 pb-5">
                    <div class="content p-4">
                        <h2 class="text-center"><?= $row['title'] ?></h2> <br>
                        <h5 class="text-center"><?= $row['year'] ?></h5>
                        <div class="text-center">
                            Researchers: <br>
                            <?= $row['author']; ?>
                        </div>
                        <div class="text-center">
                            Uploaded by: <br>
                            <?= $row['uploadedby']; ?>
                            <br>
                            <?= $row['description'] ?>
                        </div>
                        <div class="shadow-sm">
                            <object data="<?= $row['file_path'] ?>" type="application/pdf" width="100%" height="800">
                                <p>Oops! Your browser doesn't support PDFs. <a href="example.pdf">Click here to download the PDF file.</a></p>
                            </object>
                        </div>
                    </div>
                </div>
            </div>

<?php
        }
    }
} else {
    echo "error";
}
?>
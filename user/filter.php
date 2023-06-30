<?php
include '../config/db_connection.php';

$dbConn = new DatabaseConnection();
$Conn = $dbConn->dbConnection();
$searchValue = $_POST['searchValue'];
$sel = $Conn->query("SELECT * FROM uploads WHERE title LIKE '%$searchValue%' OR description LIKE '%$searchValue%' OR author LIKE '%$searchValue%'");

if ($sel->rowCount() > 0) {

    echo '<div class="bg-light">
    <ul class="list-group">';
    while ($row = $sel->fetch(PDO::FETCH_ASSOC)) {
        $description = $row['description'];
        if (strlen($description) > 100) {
            $description = substr($description, 0, 200) . '...';
        }
        echo '<li>
        <a class="list-group-item list-group-item-action" aria-current="true" href="Project.php?id=' . $row['id'] . '">
        <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">' . $row['title'] . '</h5>
        <small>' . $row['year'] . '</small>
        </div>
        <small>' . $row['author'] . ' et al.</small>
        <p class="mb-1">' . $description . '</p>
        </a>
        </li>';
    }
    echo '</ul">
    <h5 class="text-center p-3">End of Result</h5>
    </div>
    ';
} else {
    echo "<ul class='list-group text-center'>
        <li class='list-group-item' >
        <img src='../asset/images/noresult.webp' alt='icon' style='width: 400px'>
        </li>
    </ul>";
}

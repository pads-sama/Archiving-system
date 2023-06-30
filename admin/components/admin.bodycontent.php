<?php
include '../config/db_connection.php';

$newconnectiondb = new DatabaseConnection();
$dbnewconnection = $newconnectiondb->dbConnection();

$select = $dbnewconnection->query('SELECT COUNT(*) AS count FROM uploads');
$selected = $dbnewconnection->query('SELECT COUNT(*) AS count FROM user');

?>

<div class="body-header-title">
    <h4>Dashboard</h4>
</div>
<div class="body-content-main">
    <div id="notificationBox" class="notificationBox-container">
        <div id="dashboard-tab" class="maincontent-container content">
            <div class="first-container">
                <div class="totalUploads-container">
                    <div class="iconTotal-container">
                        <i class="fa-solid fa-file-circle-exclamation"></i>
                    </div>
                    <?php if ($select->rowCount() > 0) {
                        while ($row = $select->fetch()) { ?>

                            <p class="total-desc">
                                Total number of <br> <span class="numbers"><?= $row['count']; ?>/</span> Uploads
                            </p>
                </div> <?php }
                    } ?>
        <div class="totalUser-container">
            <div class="iconTotal-container">
                <i class="fa-solid fa-users"></i>
            </div>
            <?php if ($selected->rowCount() > 0) {
                while ($rows = $selected->fetch()) { ?>
                    <p class="total-desc">
                        Total number of <br> <span class="numbers"><?= $rows['count']; ?>/</span> User
                    </p>
        </div>
<?php }
            } ?>
            </div>
        </div>
    </div>
</div>
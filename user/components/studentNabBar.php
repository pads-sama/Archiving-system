<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-0">
    <div class="container-fluid">
        <a class="navbar-brand m-0" href="#">
            <img class="m-0" src="../asset/images/tcasw.png" alt="web-logo" width="200">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto d-flex justify-content-start align-items-center m-0 p-0">
                <li class="nav-item">
                    <a class="nav-link text-uppercase active" aria-current="page" href="userHome.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="./updateProject.php">Projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="about.php">About us</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-uppercase dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle fs-3"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li class=""><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#userProfileModal" href=""><i class="bi bi-person-circle"></i>&nbsp;Profile</a></li>
                        <!-- <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i>&nbsp;Settings</a></li> -->
                        <li><a class="dropdown-item" href="../includes/logout_includes.php"><i class="bi bi-box-arrow-right"></i>&nbsp;Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- navbar end -->
<!-- sidebar -->
<!-- <div class="sidebar-nav">
    <div class="sidebar-content">
        ffff
    </div>
</div> -->
<!-- sidebar end -->
<!-- modal -->
<?php

include '../config/db_connection.php';
$user_id = $_SESSION['user_id'];
$dataconn = new DatabaseConnection();
$Conn = $dataconn->dbConnection();
$sel = $Conn->prepare("SELECT * FROM user WHERE id = ?");
$sel->execute(array($user_id));
while ($row = $sel->fetch()) { ?>

    <div class="modal fade" id="userProfileModal" tabindex="-1" aria-labelledby="userProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userProfileModalLabel">Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="inputName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="inputName" value="<?php echo $row['name']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="inputEmail" placeholder="<?php echo $row['email']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="inputPhone" class="form-label">Usertype</label>
                            <input type="tel" class="form-control" id="inputPhone" placeholder="<?php echo $row['usertype']; ?>" readonly>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
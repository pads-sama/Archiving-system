<?php
// include 'include/landing.includes.php';
include '../config/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['id'])) {
        header("Location: userHome");
        exit;
    }
    $id = $_GET['id'];

    $newConnModal = new DatabaseConnection();
    $newModalConn = $newConnModal->dbConnection();
    $select = $newModalConn->prepare("SELECT * FROM uploads WHERE id = ?");
    $select->execute(array($id));
    $row = $select->fetchAll(PDO::FETCH_ASSOC);

    if (!$row) {
        header("Location: userHome");
        exit;
    }

    $title = $row['title'];
    $author = $row['author'];
    $year = $row['year'];
    $description = $row['description'];
    $file = $row['file_path'];
} else {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];
    $description = $_POST['description'];

    if ($_FILES['file']['size'] > 0) {
        $filename = $_FILES['file']['name'];
        $size = $_FILES['file']['size'];
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        if ($ext == 'pdf' ||  $ext == 'zip' || $ext == 'docx' || $ext == 'xlsx' || $ext == 'pptx') {
            $file_Destination = '../uploads/' . $filename;
            if (move_uploaded_file($_FILES['file']['tmp_name'], $file_Destination)) {
                $insert = "UPDATE uploads SET title = '$title', author='" . $_SESSION['User_name'] . "', year = '$year', file= '$filename', description='$description', size ='$size', status='0', uploader_id ='" . $_SESSION['s_id'] . "', file_path='$file_Destination' WHERE id = '$id'";
                $res = mysqli_query($conn, $insert);
                if ($res == true) {
                    header("Location: myfile.ajax.php");
                    echo "<script src='https://code.jquery.com/jquery-3.6.1.js'>alert('SELECT A VALID FILE');</script>";
                } else {
                    echo 'ERROR ';
                    exit;
                }
            } else {
                echo 'UPLOAD ERROR';
                exit;
            }
        } else {
            echo 'INVALID FILE FORMAT';
            exit;
        }
    } else {
        echo "<script src='https://code.jquery.com/jquery-3.6.1.js'>alert('SELECT A VALID FILE');</script>";
        exit;
    }
}
?>



<div class="container-lg bg-light py-3 px-3 shadow-sm" style=" border-radius:6px; border-left:3px solid #06345c; margin-top:5rem;">
    <form action="" method="POST" enctype="multipart/form-data" style="margin-top:5rem;">
        <input type="hidden" name='id' value='<?php echo $id ?>' ;>
        <div class="uploadInput_field_container">
            <label for="title">Title:</label>
            <input type="text" name="title" class="title" required placeholder="Enter Title">
        </div>
        <div class="uploadInput_field_container">
            <label for="author">Author:</label>
            <input type="text" name="author" class="author" required placeholder="Enter Author">
        </div>
        <div class="uploadInput_field_container">
            <label for="Year">Year:</label>
            <input type="number" name="year" class="Year" required placeholder="Enter Year">
        </div>
        <div class="uploadInput_field_container">
            <label for="course">Choose Course:</label>
            <select name="course" id="course" required>
                <option value="" disabled selected>Choose Course</option>
                <option value="bsit">Bachelor of Science in Information Techology</option>
                <option value="bscs">Bachelor of Science in Computer Science</option>
            </select>
        </div>
        <div class="uploadInput_field_container">
            <label for="description">Description:</label>
            <input type="text" name="description" class="description" required placeholder="Enter Description">
        </div>
        <div class="uploadInput_field_container">
            <label for="file">PDF File:</label>
            <input type="file" name="file" class="file" required>
        </div>
        <div>
            <center><button id="upload" type="submit" class="btn btn-info shadow-lg mb-2" name="upload" style="width:50%;">Update</button></center>
            <center><button type="button" class="btn btn-danger" onclick="location.href='myfile.ajax.php'">Cancel</button></center>
        </div>
    </form>
</div>
<?php
include '../includes/Header.php';
include '../includes/NavBar.php';
include '../config/db_connection.php';

// if (!isset($_SESSION['user_id'])) {
//     header("Location: ../pages/login");
//     exit();
// }
?>

<div class="cont">
    <br>
    <hr>
    <div>
        <h1>this is where the uploaded file of user</h1>
    </div>
    <!-- this is form for folder upload -->
    <h3>Folder Upload here</h3>
    <form method="POST" action="../includes/folder_includes.php" enctype="multipart/form-data">
        <input type="file" name="folder" webkitdirectory directory multiple>
        <button type="submit" name="folder">Upload</button>
    </form>]
    <br>
    <hr>
    <br>
    <!-- this is form for folder upload end here -->
    <!-- this is form for upload. ililipat ini sa modal jer -->
    <form method="post" action="../includes/upload.includes.php" id="fileupload" enctype="multipart/form-data">
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
            <button type="submit" name="upload">Upload</button>
        </div>
    </form>
    <!-- form end here -->

    <!-- display uploaded file here -->
    <div class="display_uploaded_container">
        <table>
            <thead>
                <tr>
                    <th scope="col">Title | &nbsp</th>
                    <th scope="col">Author |&nbsp</th>
                    <th scope="col">Uploader | &nbsp</th>
                    <th scope="col">File Name | &nbsp</th>
                    <th scope="col">File Size | &nbsp</th>
                    <th scope="col">Date of Upload | &nbsp</th>
                    <th scope="col">Action &nbsp</th>
                </tr>
            </thead>
            <?php
            $dbConn = new DatabaseConnection();
            $Conn = $dbConn->dbConnection();
            $sel = $Conn->prepare("SELECT * FROM uploads WHERE uploadedby =?");
            $sel->execute(array($_SESSION['user_name']));

            if ($sel->rowCount() > 0) {
                while ($row = $sel->fetch()) { ?>
                    <tbody>
                        <tr>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['author']; ?></td>
                            <td><?php
                                if ($row['uploadedby'] === $_SESSION['user_name']) {
                                    echo "You";
                                } ?>
                            </td>
                            <td><?php echo $row['file_name']; ?></td>
                            <td><?php echo $row['file_size']; ?></td>
                            <td><?php echo $row['uploaded_at']; ?></td>
                            <td>
                                <a href="../includes/delete_includes.php?id=<?php echo $row['id']; ?>">delete</a>
                                <a href="<?php echo $row['file_path']; ?>">view</a>
                                <a id="getId" href="../includes/edit_includes.php?<?php echo $row['id']; ?>">edit</a>
                            </td>
                        </tr>
                    </tbody>

            <?php }
            }
            ?>
        </table>
    </div>
    <!-- display uploaded file ends here -->
</div>


<?php
include '../includes/Footer.php'
?>
<?php
include '../includes/Header.php';
include 'components/studentNabBar.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: ../pages/login");
    exit();
}

?>
<link rel="stylesheet" href="sidebar.css">

<title>My uploads</title>
<div class="container-sm">
    <div class="upload-container">
        <div class="page-title mt-4">
            <h4>My Uploads</h4>
            <hr>
        </div>
        <div class="page-table">
            <button class="uplaod-button-user" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class=" bi bi-plus"></i>Add File</button>
            <table class="table table-bordered">
                <tbody>
                    <thead>
                        <th>Title</th>
                        <th>Uploader</th>
                        <th>Date</th>
                        <th>File Name</th>
                        <th>Status</th>
                        <th>Action</th>
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
                        <td> <?php
                                $title = $row['title'];
                                $limit = 30; // limit the character display to 50

                                if (strlen($title) > $limit) {
                                    $title_short = substr($title, 0, $limit) . '...';
                                    echo '<span title="' . htmlspecialchars($title) . '">' . htmlspecialchars($title_short) . '</span>';
                                } else {
                                    echo htmlspecialchars($title);
                                }
                                ?></td>
                        <td><?php
                            if ($row['uploadedby'] === $_SESSION['user_name']) {
                                echo "You";
                            } ?>
                        </td>
                        <td><?php $uploaded_at = $row['uploaded_at'];
                            $formatted_date = date('F j, Y', strtotime($uploaded_at));
                            echo htmlspecialchars($formatted_date); ?></td>
                        <td><?php echo $row['file_name']; ?></td>
                        <td>
                            <?php
                            switch ($row['status']) {
                                case '1':
                                    echo "<span class='badge bg-success badge-pill'>Published</span>";
                                    break;
                                case '0':
                                    echo "<span class='badge bg-secondary badge-pill'>Not Publish</span>";
                                    break;
                            }
                            ?>
                        </td>
                        <td>
                            <i class="bi bi-three-dots-vertical " id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="cursor:pointer;"></i>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <!-- <li class="" data-bs-toggle="modal" data-bs-target="#edit"> <a href="" id="getid" style="text-decoration:none; color:black">&nbsp;<i class="bi bi-pencil"></i>&nbsp;Edit</a></li> -->

                                <li><button class="view btn btn-transparent dropdown-item" id="<?php echo $row['id']; ?>">&nbsp;<i class="bi bi-envelope-open"></i>&nbsp;View</button></li>
                                <li>&nbsp; &nbsp;<a href="../includes/delete_includes.php?id=<?php echo $row['id']; ?>" style="text-decoration:none; color:red;">&nbsp;<i class="bi bi-trash"></i>&nbsp;Delete</a></li>
                            </ul>
                        </td>
                    </tr>
                </tbody>

        <?php }
                    }
        ?> </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <?php include '../includes/ModalUpload_form.php' ?>
            </div>
        </div>
    </div>
</div>
<!-- view modal -->
<div class="modal fade" id='viewmodal' data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">File Info</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="folmodal_body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<style>
    .uplaod-button-user {
        background-color: darkblue;
        border: none;
        color: white;
        padding: 3px 15px;
        outline: none;
        border-radius: 5px;
        margin: 5px 0;
        display: flex;
        justify-content: flex-end;
    }
</style>
<script src="side.js"></script>
<script>
    $(document).ready(function() {
        $('.view').click(function() {
            file_id = $(this).attr('id')
            $.ajax({
                url: "view.modal.php",
                method: "post",
                data: {
                    file_id: file_id
                },
                success: function(result) {
                    $(".folmodal_body").html(result);
                }
            });
            $('#viewmodal').modal("show");
        })
    });
</script>
<!-- <script>
    $('#openmodal').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: 'get_modal_content.php',
            type: 'POST',
            data: {
                id: 123
            },
            success: function(response) {
                $('#edit .modal-body').html(response);
                $('#edit').modal('show');
            },
            error: function() {
                console.log('Error: AJAX request failed');
            }
        });
    });
</script> -->
<?php
include '../includes/Footer.php'
?>
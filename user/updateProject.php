<?php
include '../includes/Header.php';
include 'components/studentNabBar.php';


if (!isset($_SESSION['user_id'])) {
    header("Location: ../pages/login");
    exit();
}
?>
<title>Projects</title>
<div class="search-body-container">
    <div class="container">
        <div class="title-page">
            <h3 class="text-center text-warning fw-bold mt-5 fs-2">Theses and Capstone Digital Archiving System</h3>
            <p class="text-center text-white fs-5">Type the title or name of author to search project</p>
        </div>
        <br>
        <input type="text" name="search" id="search" placeholder="search here..." class="form-control shadow" autocomplete="off">
        <div class="overflow-auto" id="results"></div>
    </div>
</div>

<style>
    body {
        background-image: url('../asset/images/project.avif');
        background-size: cover;
        background-repeat: no-repeat;
    }

    .search-body-container {
        height: calc(100vh - 60px);
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .search-container {
        width: 80%;
        padding: 50px;
    }

    .form-control {
        height: 40px;
        border-radius: 25px;
    }

    #results {
        height: 55vh;
    }
</style>

<script>
    $(document).ready(function() {
        $('#search').keyup(function() {
            let searchValue = $(this).val();
            if (searchValue !== "") {
                $.ajax({
                    type: 'POST',
                    url: './filter.php',
                    data: {
                        searchValue: searchValue
                    },
                    success: function(data) {
                        $("#results").html(data);
                    }
                });
            } else {
                $('#results').html('');
            }
        })
    })
</script>
<?php
include '../includes/Footer.php'
?>
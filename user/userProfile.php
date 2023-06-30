<?php
include '../includes/Header.php';
include '../includes/NavBar.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../pages/login");
    exit();
}
?>
<div class="settings-container">
    <div>
        <?php include './components/userSideBar.php' ?>
    </div>
    <div class="container-sm user-profile-container">
        <div>
            <h4>Profile Settings</h4>
        </div>
        <hr>
        <div class="profile_picture">
            <i class="fa-solid fa-user"></i>
        </div>
        <div>
            <div class="user_name">Name:
                <strong><?php echo $_SESSION['user_name'] ?></strong>

            </div>
            <div class="user_email">Email:
                <strong><?php echo $_SESSION['email'] ?></strong>
            </div>
        </div>
        <hr>
        <div>
            <h4>Password Reset</h5>
                <form action="../includes/edit_includes.php">
                    <div class="input-cont">
                        <label for="oldPass">Enter Old Password</label><br>
                        <input type="password" id="oldPass" name='oldpassword' class="input-field" required> <br>
                        <label for="newPassword" name='newpassword'>Enter New Password</label><br>
                        <input type="password" id="newPassword" class="input-field" required><br>
                        <label for="RenewPassword">Reenter New Password</label><br>
                        <input type="password" id="RenewPassword" name='con-newpassword' class="input-field" required>
                    </div>
                    <div class="input-cont">
                        <button type="submit" class="reset" name="reset">Reset</button>
                    </div>
                </form>

        </div>
    </div>
</div>


<script>
    function cancel() {
        console.log("hs")

        let edit = document.getElementById('edit');
        edit.setAttribute("readonly", "");
    }

    function edit() {
        let edit = document.getElementById('edit');
        edit.removeAttribute('readonly');
    }
</script>

<?php
include '../includes/Footer.php'
?>
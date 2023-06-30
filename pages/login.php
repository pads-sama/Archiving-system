<?php
include '../includes/Header.php';
include '../includes/NavBar.php';
?>
<title>Login</title>
<div class="loginBackground"></div>
<div class="main_form_container">
    <div class="register-form_container">
        <div class="form_icon_container">
            <div class="icon_container">
                <i class="fa-regular fa-circle-user"></i>
            </div>
        </div>
        <div class=logo_main>
            <div class=images_logo_container>
                <img src="../asset/images/tcas.png" alt="" width=250 height=75 />
            </div>
        </div>
        <form action="../includes/login.includes.php" method="post">
            <div class="input-field-container">
                <input type="text" name="email" id="email" class="input-field" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required placeholder="Enter a valid email address">
            </div>
            <div class="input-field-container">
                <input type="password" name="password" id="password" class="input-field" required placeholder="Enter a password">
            </div>
            <div class="button_container">
                <button type="submit" name="login" class="login_button">Login</button>
            </div>
        </form>
        <div>
            <a href="../pages/register" class=button_create_account style="margin-top: 20px;">
                <button class=creat_account>Create Account</button>
            </a>
        </div>
    </div>
</div>


<?php
include '../includes/Footer.php';
?>
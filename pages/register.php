<?php
include '../includes/Header.php';
include '../includes/NavBar.php';
?>
<title>Register</title>
<div class=register_bg></div>
<div class="register-form-container">
    <div class="reg_input_field">
        <div class=logo_main>
            <div class=images_logo_container>
                <img src="../asset/images/tcas.png" alt="" width=250 height=75 />
            </div>
        </div>
        <form id="registerForm" action="../includes/register_includes.php" method="post">
            <div class="input_field_container">
                <input type="text" name="name" id="name" class="input-field" minlength="3" maxlength="100" required placeholder="Enter your complete name">
            </div>
            <div class="input_field_container">
                <input type="email" name="email" id="email" class="input-field" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required placeholder="Enter a valid email address">
            </div>
            <div class="input_field_container">
                <input type="password" name="password" id="password" class="input-field" minlength="3" maxlength="100" required placeholder="Enter password">
            </div>
            <div class="input_field_container">
                <input type="password" name="confirmPassword" id="confirmPassword" class="input-field" minlength="3" maxlength="100" required placeholder="Retype your password">
            </div>
            <div class="button_container">
                <button type="submit" id="register" name="register" class="register_button">Register</button>
            </div>
        </form>
        <p class=redirect_to_login>Already have an account?</p>
        <div>
            <a href="/login" class=button_redirect_login>
                <button class=login>Go to Login</button>
            </a>
        </div>
    </div>

</div>
<?php
include '../includes/Footer.php'
?>
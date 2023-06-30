<?php
session_start();
unset($_SESSION['user_id']);
session_destroy();

Header("Location: ../pages/login");
exit();

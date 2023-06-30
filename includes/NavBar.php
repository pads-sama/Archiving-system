<?php

if (isset($_SESSION['user_id'])) {
    $navbar = "";

    $navbar .= '
    <nav class="navbar navbar-expand-lg">
    <div class="container-lg">
        <a class="navbar-brand" href="#">
            <img class="webLogo" src="../asset/images/tcasw.png" alt="weblogo">
        </a>
        <button class="toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <i class="fa-solid fa-bars"></i> </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../pages/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/project">projects</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../pages/about">about us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>';
    echo $navbar;
} else {
    $navbarguest = "";

    $navbarguest .= '
    <nav class="navbar navbar-expand-lg">
        <div class="container-lg">
            <a class="navbar-brand" href="#">
                <img class="webLogo" src="../asset/images/tcasw.png" alt="weblogo">
            </a>
            <button class="toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <i class="fa-solid fa-bars"></i> </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/updatedProject">projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/about">about us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/login">login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/register"><button class="reg_btn">register</button></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>';

    echo  $navbarguest;
}

?>

<style>
    .navbar {
        background-color: #1c065c;
        padding: 0;
    }

    .toggler {
        outline: none;
        color: white;
        font-size: 1.6em;
        border: none;
        display: none;
        background-color: transparent;
    }

    .webLogo {
        width: 200px;
        height: 50px;
    }

    .navbar-nav {
        display: flex;
        gap: 20px;
    }

    .nav-link {
        color: white;
        text-transform: uppercase;
        font-weight: 500;
    }

    .nav-link:focus {
        outline: white;
        color: white;
    }

    .nav-link:hover {
        color: white;
    }

    .reg_btn {
        background: transparent;
        border: 1px solid white;
        height: 30px;
        width: 100px;
        text-transform: uppercase;
        border-radius: 25px;
        color: white;
        transition: 0.2s ease all;
        color: white;
        font-weight: 500;
    }

    .profile {
        border: 1px solid white;
        width: 150px;
        height: fit-content;
        background: transparent;
        color: white;
    }

    .reg_btn:hover {
        background: white;
        color: black;
    }

    @media(max-width:985px) {
        .toggler {
            display: block;
        }
    }
</style>
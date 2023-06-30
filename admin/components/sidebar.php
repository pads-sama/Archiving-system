<div class="side-bar-content">
    <div class="side-content">
        <div class="logo-container">
            <img src="../asset/images/tcas.png" alt="weblogo" width="250">
        </div>
        <div class="upload-menu">
            <button id="upl-btn" class="upload-button"><span><i class="fa-sharp fa-light fa-plus"></i></span><span class="new">New</span></button>
            <ul id="menu" class="dropdown-menu-container">
                <li class="dropdown-menu-list" id="upload-modal">
                    <span> <i class="fa-solid fa-file-arrow-up"></i></span>
                    <span> &nbsp Upload file</span>
                </li>
                <!-- <li class="dropdown-menu-list">
                    <span><i class="fa-solid fa-upload"></i></span>
                    <span> &nbspUpload folder</span>
                </li> -->
                <li class="dropdown-menu-list" id="dropdown-menu-list">
                    <span> <i class="fa-solid fa-user-plus"></i></span>
                    <span>New User</span>
                </li>
            </ul>
        </div>

        <ul class="menu-list-items">
            <li class="menu-list">
                <a class="menu-link" href="adminHome">
                    <span><i class="fa-solid fa-border-all"></i></span>
                    <span>&nbspDashboard</span>
                </a>
            </li>
            <li class="menu-list">
                <a class=" menu-link" href="./adminUpload">
                    <span><i class="fa-sharp fa-solid fa-file"></i></span>
                    <span>&nbsp My Upload</span>
                </a>
            </li>
            <li class="menu-list">
                <a class="menu-link" href="./manageUploads">
                    <span><i class="fa-solid fa-cloud-arrow-up"></i></span>
                    <span>Manage Uploads</span>
                </a>
            </li>
            <li class="menu-list">
                <a class="menu-link" href="./manageUser">
                    <span><i class="fa-solid fa-users-gear"></i></span>
                    <span>&nbspManage User</span>
                </a>
            </li>
            <!-- <li class="menu-list">
                <a class="menu-link" href="./adminSettings">
                    <span><i class="fa-solid fa-gear"></i></span>
                    <span>&nbspSettings</span>
                </a>
            </li> -->
        </ul>
    </div>
    <div class="side-footer">
        <p>Copyright © 2023, All rights reserved.</p>
    </div>
</div>
<script src="../asset/js/modal.js"></script>
<script>
    $(document).ready(function() {
        const uplBtn = $('#upl-btn');
        const dropdownMenu = $('#menu');

        uplBtn.click(function(e) {
            e.stopPropagation();
            dropdownMenu.toggleClass("show-menu");
        });
        dropdownMenu.on('click', function(e) {
            e.stopPropagation
        });
        $(document).on('click', function(e) {
            if (dropdownMenu.hasClass('show-menu')) {
                dropdownMenu.removeClass('show-menu')
            }
        });


        $("#upload-modal").click(function() {
            $("#admin-upload-modal").show();
        });
        $("#close-modal").click(function() {
            $("#admin-upload-modal").hide();
        });
        $(window).click(function(event) {
            if (event.target == $('#admin-upload-modal')[0]) {
                $('#admin-upload-modal').hide();
            }
        });

    })
</script>
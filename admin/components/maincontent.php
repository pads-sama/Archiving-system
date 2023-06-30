<div class="main-content-header">
    <div class="header-search">
        <!-- <span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
        <span><input id="search" class="search" type="text" placeholder="Search"></span>
        <span class="clear-icon fa-solid fa-xmark"></span> -->
    </div>
    <div class="icons-container">
        <div class="user-notif-icon">
            <div class="bell-icon"><i class="fa-solid fa-bell"></i> </div>
            <div class="prof-image"><img src="../asset/images/prof.png" alt="" width="45"></div>
        </div>
        <div class="user-info-dropdown">
            <div class="user-dropdown">
                <div class="userD">
                    <div>
                        <img src="../asset/images/prof.png" alt="" width="65">
                    </div>
                    <div>
                        <p class="drop-name"><?php echo $_SESSION['user_name']; ?></p>
                        <p class="drop-email"><?php echo $_SESSION['email']; ?></p>
                        <button class="drop-btn">
                            Manage Account
                        </button>
                    </div>
                </div>
                <div class="add-account-container" id="dropdown-menu-list">
                    <div class="icon-add-acc">
                        <i class="fa-solid fa-user-plus"></i>
                    </div>
                    <div>Add another Account</div>
                </div>
                <div class="logout-container">
                    <div class="icon-logout-acc">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    </div>
                    <div> <a class="logout-admin" href="../includes/logout_includes.php">Logout</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        const uplBtn = $('.prof-image');
        const dropdownItem = $('.user-info-dropdown');

        uplBtn.click(function(e) {
            e.stopPropagation();
            dropdownItem.toggleClass("open-dropdown");
        });
        dropdownItem.on('click', function(e) {
            e.stopPropagation
        });
        $(document).on('click', function(e) {
            if (dropdownItem.hasClass('open-dropdown')) {
                dropdownItem.removeClass('open-dropdown')
            }
        });

    })
</script>
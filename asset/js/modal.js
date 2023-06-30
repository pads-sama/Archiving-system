 $(document).ready(function()
{
    $("#dropdown-menu-list").click(function() {
            $("#admin-modal").show();
        });
        $("#close-modal").click(function() {
            $("#admin-modal").hide();
        });
        $(window).click(function(event) {
            if (event.target == $('#admin-modal')[0]) {
                $('#admin-modal').hide();
            }
        });
  
});
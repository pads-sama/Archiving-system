<?php
include 'components/adminHeader.php';
?>
<div class="adminUpload">
    <h4>Manage Uploads</h4>
</div>
<div class="container-sm pt-3 admin-upload-content">
    <div class="container-sm table-uploads">
        <table class="table table-striped" id="upload-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Uploader</th>
                    <th>Date of Upload</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>

        </table>
    </div>
</div>
<style>
    .action {
        cursor: pointer;
        width: 30px;
        height: 30px;
        display: grid;
        place-content: center;
        border-radius: 50px;
        transition: .2s ease all;
        margin: 0;
    }

    .action:hover {
        background-color: rgb(212, 219, 222);
    }

    .dropdown-action {
        position: absolute;
        background-color: white;
        border-radius: 9px;
        width: 200px;
        height: 120px;
        right: 0;
        padding: 0;
        margin: 0;
        display: none;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .dropdown-action.show-action {
        display: grid;
        flex-direction: column;
        padding: 0;
        margin: 0;
        z-index: 99;
    }

    .action-list-menu {
        padding: 0;
    }

    .action-list {
        list-style: none;
        width: 100%;
        height: 34px;
    }

    .action-list:hover {
        background-color: rgb(212, 219, 222);
    }

    .action-link {
        padding: 5px;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        padding-left: 20px;
        text-decoration: none;
        color: black;
        gap: 10px;
    }
</style>
<script>
    $(document).ready(function() {
        $.ajax({
            url: "components/query2.php",
            dataType: "json",
            success: function(data) {
                var columns = [{
                        title: "Title",
                        data: "title",
                        render: function(data, type, row) {
                            if (type === 'display' && data.length > 10) {
                                return '<span title="' + data + '">' + data.substr(0, 10) + '...</span>';
                            } else {
                                return data;
                            }
                        }
                    },
                    {
                        title: "Uploader",
                        data: "uploadedby"
                    },
                    {
                        title: "Date of Upload",
                        data: "uploaded_at",
                        render: function(data) {
                            var date = new Date(data);
                            var options = {
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric'
                            };
                            return date.toLocaleDateString('en-US', options);
                        }
                    },
                    {
                        title: "Status",
                        data: "status",
                        render: function(data, type, row) {
                            if (data === 0) {
                                return "<span class='badge bg-secondary badge-pill'>Not Published</span>";
                            } else if (data === 1) {
                                return "<span class='badge bg-success badge-pill'>Published</span>";
                            } else {
                                return data;
                            }
                        }
                    },

                    {
                        title: "",
                        data: function(row) {
                            return `
                            <i id='action-dropdown' class="fa-solid fa-ellipsis-vertical action"></i>
                            <div id='dropdown-action' class="dropdown-action">
                                <div class="dropdown-action-item">
                                    <div>
                                        <ul class='action-list-menu'>
                                           <li  class='action-list'>
                                                <a class='action-link' href="unpublish.php?id=${row.id}"><i class="bi bi-send-check-fill"></i>Publish/Unpublish</a>
                                           </li>
                                            <li class='action-list'>
                                                <a class='action-link' href="delete2.php?id=${row.id}"> <i class="fa-solid fa-trash-can action-icon"></i>Delete</a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>`;
                        },
                        dataSrc: "id"
                    }
                ];
                var tableData = [];
                $.each(data, function(index, row) {
                    var rowData = {
                        file_path: row.file_path,
                        status: row.status,
                        id: row.id,
                        title: row.title,
                        uploadedby: row.uploadedby,
                        uploaded_at: row.uploaded_at,
                        file_size: row.file_size,
                    };
                    tableData.push(rowData);
                });

                var table = $('#upload-table').DataTable({
                    "pageLength": 6,
                    lengthChange: false,
                    data: tableData,
                    columns: columns,

                });
                const actionDropdown = $('.action');
                const dropdownAction = $('.dropdown-action');

                actionDropdown.click(function(e) {
                    e.stopPropagation();
                    $(this).next(dropdownAction).toggleClass("show-action");
                });

                dropdownAction.on('click', function(e) {
                    e.stopPropagation()
                });

                $(document).on('click', function(e) {
                    if (dropdownAction.hasClass('show-action')) {
                        dropdownAction.removeClass('show-action')
                    }
                });

            }

        });

    });
</script>
<?php
include 'components/adminFooter.php';
?>
<?php
session_start();
include '../config/db_connection.php';

if (isset($_POST['folder'])) {

    $allowedExt = array('zip', 'rar', 'pdf', 'docx');

    $folders = $_POST['folder'];

    if (isset($folders) && (is_array($folders) || is_object($folders))) {
        foreach ($folders as $folder) {
            $folder_name = $_FILES['folder']["name"];
            $folder_size = $_FILES['folder']["size"];
            $ext = pathinfo($folder_name, PATHINFO_EXTENSION);

            if (!in_array($ext, $allowedExt)) {
                echo "<script>alert('upload failed! file extension is not allowed'); window.location.href = '../user/userMyUploads';</script>";
                exit();
            }

            $folderPath = '../uploads/';
            $userId = $_SESSION['user_id'];
            $folder_name = $userId . "-" . basename($folder_name, ".$ext");
            $folderFinal_path = $folderPath . $folder_name;

            $i = 1;
            while (file_exists($folderFinal_path)) {
                $folderFinal_path = $folderPath . $folder_name . $i;
                $i++;
            }
            mkdir($folderFinal_path);
            if (!is_dir($folderFinal_path)) {
                echo "Failed to create directory: " . $folderFinal_path;
                exit();
            }
        }
    } else {
        echo "<script>alert('upload failed! '); window.location.href = '../user/userMyUploads';</script>";
        exit();
    }
    if (is_array($folders) || is_object($folders)) {
        foreach (glob("$folder/*") as $file) {
            if (is_file($file)) {
                $fileName = basename($file);
                $fileSize = filesize($file);
                $fileExt = mime_content_type($file);
                $savePath = "$folderFinal_path/$fileName";
                move_uploaded_file($file, $savePath);

                $newdbConn = new DatabaseConnection();
                $new_dbConn = $newdbConn->dbConnection();
                $selectFolder = $new_dbConn->prepare("SELECT id FROM folders WHERE name = ?");
                $selectFolder->execute(array($folder_name));
                $res = $selectFolder->fetch(PDO::FETCH_ASSOC);
                $folderId = $res['id'];

                $insertFile = $new_dbConn->prepare("INSERT INTO `folder_files`(`name`, `file_size`, `file_path`, `folder_id`, `user_id`, `updated_at`) VALUES (?,?,?,?,?,?, NOW()");
                $insertFile->execute(array($fileName, $fileSize, $savePath, $folderId, $user_id));
            }
            $inderFolder = $new_dbConn->prepare("INSERT INTO `folders`(`user_id`, `name`, `folder_path`, `folder_size`, `updated_at`) VALUES (?,?,?,?, NOW())");
            $insertFolder->execute(array($user_id, $folder_name, $folderFinal_path, $folder_size));
        }
    }
}

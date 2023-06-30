    <?php

    session_start();
    class uploadFileClass extends DatabaseConnection
    {
        public function uploadFile($file, $filename)
        {
            $valid_extensions = array(
                // 'jpeg' => 'image/jpeg', balik na lang pagtigrequire
                // 'jpg' => 'image/jpeg', 
                // 'png' => 'image/png', 
                // 'gif' => 'image/gif', 
                // 'bmp' => 'image/bmp', 
                'pdf' => 'application/pdf',
                'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'ppt' => 'application/vnd.ms-powerpoint'
            );
            $mime_type = mime_content_type($filename);

            if (!in_array($mime_type, $valid_extensions)) {
                echo 'Invalid file type.';
                exit;
            }

            $path = '../uploads/';
            $final_extension = array_search($mime_type, $valid_extensions);
            $final_file = random_int(1000, 1000000) . '.' . $final_extension;
            $final_path = $path . strtolower($final_file);
            move_uploaded_file($_FILES['file']['tmp_name'], $final_path);
            return $final_path;
        }

        protected function insertUpload($title, $author, $year, $course, $description,  $file_size, $file, $final_path)
        {
            $stmt = $this->dbConnection()->prepare("INSERT INTO `uploads`(`title`, `author`, `uploadedby`, `year`, `course`, `description`, `file_name`, `file_size`, `file_path`, `uploaded_at`) VALUES (?,?,?,?,?,?,?,?,?, NOW())");

            if (!$stmt->execute(array($title, $author, $_SESSION['user_name'], $year, $course, $description, $file, $file_size, $final_path))) {
                $stmt = null;
            }
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $stmt = null;
        }
    }

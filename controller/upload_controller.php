<?php

use LDAP\Result;

class UploadFileCont extends uploadFileClass
{
    private $class_title;
    private $class_author;
    private $class_year;
    private $class_course;
    private $class_description;
    private $class_file_size;
    private $class_file;
    private $class_final_path;

    public function __construct($title, $author, $year, $course, $description, $file_size, $file, $final_path)
    {
        $this->class_title = $title;
        $this->class_author = $author;
        $this->class_year = $year;
        $this->class_course = $course;
        $this->class_description = $description;
        $this->class_file_size = $file_size;
        $this->class_file = $file;
        $this->class_final_path = $final_path;
    }

    public function insertUploadToDatabase()
    {
        if ($this->checkForEmptyInput() === false) {
            header("Location: ../user/userMyUploads?error");
            exit();
        }
        $this->insertUpload($this->class_title, $this->class_author,  $this->class_year, $this->class_course, $this->class_description, $this->class_file, $this->class_file_size, $this->class_final_path);
    }

    private function checkForEmptyInput()
    {
        if (empty($this->class_title) || !empty($this->class_author) || !empty($this->class_year) || !empty($this->class_course) || !empty($this->class_description) || !empty($this->class_file)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
}

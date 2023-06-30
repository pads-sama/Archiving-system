<?php

class addAccountClass extends DatabaseConnection
{
    protected function InsertUserToDatabase($name, $usertype, $email, $password)
    {
        $statement = $this->dbConnection()->prepare('INSERT INTO user (`name`, `usertype`, `email`, `password`, `created_at`, `updated_at`) VALUES (?, ?, ?, ?, NOW(), NOW());');

        $hashedPassword = password_hash($password, PASSWORD_ARGON2ID);

        if (!$statement->execute(array($name, $usertype, $email, $hashedPassword))) {
            $statement = null;
        }
        $user = $statement->fetchAll(PDO::FETCH_ASSOC);

        $statement = null;
    }

    protected function VerifyUserIfExist($class_email)
    {
        $statement = $this->dbConnection()->prepare("SELECT email FROM user WHERE email = ?");

        if (!$statement->execute([$class_email])) {
            $statement = null;
            echo "<script>alert('Email Already Taken'); window.location.href = '../user/userMyUploads';</script>";
        }

        if ($statement->rowCount() > 0) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}

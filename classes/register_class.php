<?php

class Register extends DatabaseConnection
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

    protected function CheckUserIfExist($class_email)
    {
        $statement = $this->dbConnection()->prepare("SELECT email FROM user WHERE email = ?");

        if (!$statement->execute([$class_email])) {
            $statement = null;
            header("Location: ../pages/register?emailTaken");
            exit();
        }

        if ($statement->rowCount() > 0) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}

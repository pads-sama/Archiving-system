<?php

class Login extends DatabaseConnection
{
    protected function getUser($email, $password)
    {
        $statement = $this->dbConnection()->prepare("SELECT password FROM user WHERE email = ? OR password = ?;");

        if (!$statement->execute(array($email, $password))) {
            $statement = null;
            header("Location: ../pages/login?queryfailed");
            exit();
        }

        if ($statement->rowCount() === 0) {
            $statement = null;
            header("Location: ../pages/login?userdoesnotexists");
            exit();
        }

        $passwordThatIsHashed = $statement->fetchAll(PDO::FETCH_ASSOC);
        $CompareHashPasswordToInputPassword = password_verify($password, $passwordThatIsHashed[0]['password']);

        if ($CompareHashPasswordToInputPassword === false) {
            $statement = null;
            header("Location: ../pages/login?incorrectpassword");
            exit();
        } else if ($CompareHashPasswordToInputPassword === true) {
            $statement = $this->dbConnection()->prepare("SELECT * FROM user WHERE email = ? AND password = ?;");

            if (!$statement->execute(array($email, $passwordThatIsHashed[0]['password']))) {
                $statement = null;
                header("Location: ../pages/login?queryfailed");
                exit();
            }

            if ($statement->rowCount() === 0) {
                $statement = null;
                header("Location: ../pages/login?error");
                exit();
            }
            $user = $statement->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION['user_id'] = $user[0]['id'];
            $_SESSION['user_name'] = $user[0]['name'];
            $_SESSION['usertype'] = $user[0]['usertype'];
            $_SESSION['email'] = $user[0]['email'];


            $statement = null;
        }
        $statement = null;
    }
}

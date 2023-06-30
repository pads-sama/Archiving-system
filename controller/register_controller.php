    <?php

    class RegisterNewUser extends Register
    {
        private $class_name;
        private $class_usertype;
        private $class_email;
        private $class_password;
        private $class_confirm_password;

        public function __construct($name, $usertype, $email, $password, $confirmPassword)
        {
            $this->class_name = $name;
            $this->class_usertype = $usertype;
            $this->class_email = $email;
            $this->class_password = $password;
            $this->class_confirm_password = $confirmPassword;
        }

        public function SignupUserIfValidationIsCorrect()
        {
            if ($this->checkIfPasswordMatchConfirmPassword() === false) {
                header("Location: ../pages/register?passwordnotmatch");
                exit();
            }
            if ($this->checkIfUserAlreadyExistInDatabase() === false) {
                header("Location: ../pages/register?emailtaken");
                exit();
            }

            $this->InsertUserToDatabase($this->class_name, $this->class_usertype, $this->class_email, $this->class_password);
        }

        private function checkIfPasswordMatchConfirmPassword()
        {
            if ($this->class_password !== $this->class_confirm_password) {
                $result = false;
            } else {
                $result = true;
            }
            return $result;
        }

        private function checkIfUserAlreadyExistInDatabase()
        {
            if (!$this->CheckUserIfExist($this->class_email)) {
                $result = false;
            } else {
                $result = true;
            }
            return $result;
        }
    }

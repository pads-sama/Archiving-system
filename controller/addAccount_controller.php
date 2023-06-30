    <?php

    class addAccountCont extends addAccountClass
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

        public function addAccountAfterValidation()
        {
            if ($this->verifyIfPasswordMatchConfirmPassword() === false) {
                echo "<script>alert('Password not matched'); window.location.href = '../admin/adminHome';</script>";
            }
            if ($this->verifyIfUserAlreadyExistInDatabase() === false) {
                echo "<script>alert('Email already taken'); window.location.href = '../admin/adminHome';</script>";
            }

            $this->InsertUserToDatabase($this->class_name, $this->class_usertype, $this->class_email, $this->class_password);
        }

        private function verifyIfPasswordMatchConfirmPassword()
        {
            if ($this->class_password !== $this->class_confirm_password) {
                $result = false;
            } else {
                $result = true;
            }
            return $result;
        }

        private function verifyIfUserAlreadyExistInDatabase()
        {
            if (!$this->VerifyUserIfExist($this->class_email)) {
                $result = false;
            } else {
                $result = true;
            }
            return $result;
        }
    }

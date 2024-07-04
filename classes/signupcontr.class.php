<?php

    class SignupContr extends Signup{
        private $name;
        private $email;
        private $uid;
        private $pwd;
        private $pwdRepeat;

        public function __construct($name, $email, $uid, $pwd, $pwdRepeat) {
            $this->name = $name;
            $this->email = $email;
            $this->uid = $uid;
            $this->pwd = $pwd;
            $this->pwdRepeat = $pwdRepeat;
        }

        public function signupUser() {
            if($this->emptyInput() == false) {
                header("location: /membersystem/member_join.php?error=emptyinput");
                exit();
            }

            if($this->invalidUid() == false) {
                header("location: /membersystem/member_join.php?error=invaliduid");
                exit();
            }

            if($this->invalidEmail() == false) {
                header("location: /membersystem/member_join.php?error=invalidemail");
                exit();
            }

            if($this->pwdMatch() == false) {
                header("location: /membersystem/member_join.php?error=pwddontmatch");
                exit();
            }

            if($this->uidExists() == false) {
                header("location: /membersystem/member_join.php?error=uidtaken");
                exit();
            }

            $this->setUser($this->name, $this->email, $this->uid, $this->pwd);

        }

        private function emptyInput() {
            $result;
            if(empty($this->name) || empty($this->uid) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email)) {
                $result = false;
            }
            else {
                $result = true;
            }
            return $result;
        }

        

        private function invalidUid() {
            $result;
            if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)) {
                $result = false;
            }
            else {
                $result = true;
            }
            return $result;
        }

        private function invalidEmail() {
            $result;
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $result = false;
            }
            else {
                $result = true;
            }
            return $result;
        }

        private function pwdMatch() {
            $result;
            if ($this->pwd !== $this->pwdRepeat) {
                $result = false;
            }
            else{
                $result = true;
            }
            return $result;
        }

        private function uidExists() {
            $result;
            if (!$this->checkUser($this->uid, $this->email)){
                $result = false;
            }
            else{
                $result = true;
            }
            return $result;
        }

    }

?>
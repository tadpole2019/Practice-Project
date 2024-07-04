<?php
    class LoginContr extends Login{
        private $uid;
        private $pwd;
        private $validCode;

        public function __construct($uid, $pwd, $validCode) {
            $this->uid = $uid;
            $this->pwd = $pwd;
            $this->validCode = $validCode;
        }

        public function loginUser() {
            if($this->emptyInput() == false) {
                header("location: /membersystem/index.php?error=emptyinput");
                exit();
            }

            if($this->checkValidCode() == false) {
                header("location: /membersystem/index.php?error=validCodeError");
                exit();
            }

            $this->getUser($this->uid, $this->pwd);
        }

        private function emptyInput() {
            $result;
            if(empty($this->uid) || empty($this->pwd) || empty($this->validCode)) {
                $result = false;
            }
            else {
                $result = true;
            }
            return $result;
        }

        public function checkValidCode() {
            $result;

            session_start();

            if (strval($this->validCode) !== $_SESSION["validcode"]) {
                $result = false;
            }
            else{
                $result = true;
            }
            return $result;
        }

    }

?>
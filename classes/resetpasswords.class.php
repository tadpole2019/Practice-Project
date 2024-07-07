<?php
    class ResetPasswords{
        private $resetModel;
        private $userModel;
        private $mail;

        public function __construct(){
            $this->resetModel = new ResetPassword;
            $this->userModel = new User;
            
        }
    }
?>
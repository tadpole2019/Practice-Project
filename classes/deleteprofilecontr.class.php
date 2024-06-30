<?php
    class DeleteProfileContr extends DeleteProfile {
        private $uid;

        public function __construct ($uid) {
            $this->uid = $uid;
        }

        public function deleteProfileInfo () {
            $this->unsetProfileInfo($this->uid);
        }
    }

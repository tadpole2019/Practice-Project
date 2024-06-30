<?php

    class UpdateProfileContr extends UpdateProfile {
        private $about;
        private $title;
        private $content;
        private $uid;
        public function __construct ($about, $title, $content, $uid) {
            $this->about = $about;
            $this->title = $title;
            $this->content = $content;
            $this->uid = $uid;
        }

        public function updateProfileInfo () {
            $this->resetProfileInfo($this->about, $this->title, $this->content, $this->uid);
        }
    }
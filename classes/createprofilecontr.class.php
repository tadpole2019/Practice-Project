<?php
    class CreateProfileContr extends CreateProfile {
        private $uid;
        private $about;
        private $title;
        private $content;

        public function __construct ($uid, $about, $title, $content) {
            $this->uid = $uid;
            $this->about = $about;
            $this->title = $title;
            $this->content = $content;
        }

        public function createProfileInfo () {
            $this->setProfileInfo($this->about, $this->title, $this->content, $this->uid);
        }

        public function profileExists () {
            $result;
            if (!$this->checkProfile($this->uid)) {
                $result = false;
            }
            else{
                $result = true;
            }
            return $result;
        }

    }

?>
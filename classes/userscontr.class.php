<?php

class UsersContr extends Users {
    // private $uid;
    // private $about;
    // private $title;
    // private $content;

    // public function __construct ($uid, $about, $title, $content) {
    //     $this->uid = $uid;
    //     $this->about = $about;
    //     $this->title = $title;
    //     $this->content = $content;
    // }
    
    // public function createUser ($name, $email, $username, $pwd) {
    //     $this->setUser($name, $email, $username, $pwd);
    // }

    public function createProfileInfo ($about, $title, $content, $users_id) {
        $this->setProfileInfo($about, $title, $content, $users_id);
    }

    public function doDeleteProfileInfo ($users_id) {
        $this->deleteProfileInfo($users_id);
    }
}


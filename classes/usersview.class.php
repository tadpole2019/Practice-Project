<?php

class UsersView extends Users {
    public function showUser($users_id) {
        $results = $this->getUser($users_id);
        return $results;
    }

    public function showAllUsers() {
        $results = $this->getAllUsers();
        return $results;
    }

}
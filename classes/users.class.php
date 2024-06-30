<?php
    class Users extends Dbh {

        protected function getUser($users_id) {
            $sql = "SELECT * FROM `member_profiles` WHERE `users_id`=?;";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$users_id]);

            $results = $stmt->fetch();
            return $results;
        }

        protected function getAllUsers() {
            $sql = "SELECT `member_data`.`id`, `member_data`.`name`, `member_data`.`email`, `member_data`.`uid`, `member_profiles`.`profiles_about`, `member_profiles`.`profiles_introtitle`, `member_profiles`.`profiles_introtext`
            FROM `member_data` LEFT JOIN `member_profiles`
            ON `member_data`.`id` = `member_profiles`.`users_id`;";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            $results = $stmt->fetchAll();
            return $results;
        }

        protected function setUser($name, $email, $username, $pwd){
            $sql = "INSERT INTO `member_data` (`uid`, `name`, `email`, `pwd`) VALUES (?, ?, ?, ?);";
            $stmt = $this->connect()->prepare($sql);
            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
            $stmt->execute([$username, $name, $email, $hashedPwd]);
        }



    }

?>
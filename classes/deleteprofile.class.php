<?php

    class DeleteProfile extends Dbh {
        protected function unsetProfileInfo($users_id){
            $sql = "DELETE FROM `member_profiles` WHERE `users_id`=?;";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$users_id]);
        }
    }

<?php
    class UpdateProfile extends Dbh {
        protected function resetProfileInfo($about, $title, $content, $users_id){
            $sql = "UPDATE `member_profiles` SET `profiles_about`=?, `profiles_introtitle`=?, `profiles_introtext`=? WHERE `users_id`=?;";
    
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$about, $title, $content, $users_id]);
        }
    }
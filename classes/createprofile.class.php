<?php
    class CreateProfile extends Dbh {
        protected function setProfileInfo($about, $title, $content, $users_id){
            $sql = "INSERT INTO `member_profiles` (`profiles_about`, `profiles_introtitle`, `profiles_introtext`, `users_id`) VALUES (?, ?, ?, ?);";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$about, $title, $content, $users_id]);
        }

        protected function checkProfile ($users_id) {
            $sql = "SELECT * FROM `member_profiles` WHERE `users_id` = ?;";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$users_id]);

            if (!$stmt->execute([$users_id])) {
                $stmt = null;
                header("location: /membersystem/member_join.php?error=stmtfailed");
                exit();
            }

            $resultCheck;

            if ($stmt->rowCount() > 0) {
                $resultCheck = true;
            } else {
                $resultCheck = false;
            }

            return $resultCheck;
        }

    }

?>
<?php
    class Signup extends Dbh {

        protected function checkUser($uid, $email) {
            $sql = "SELECT * FROM `member_data` WHERE `uid` = ? OR `email` = ?;";
            $stmt = $this->connect()->prepare($sql);

            if(!$stmt->execute([$uid, $email])){
                $stmt = null;
                header("location: /membersystem/member_join.php?error=stmtfailed");
                exit();
            }

            $resultCheck;

            if($stmt->rowCount() > 0) {
                $resultCheck = false;
            }
            else {
                $resultCheck = true;
            }

            return $resultCheck;
        }



        protected function setUser($name, $email, $username, $pwd) {
            $sql = "INSERT INTO `member_data` (`uid`, `name`, `email`, `pwd`) VALUES (?, ?, ?, ?);";
            $stmt = $this->connect()->prepare($sql);
            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
            $stmt->execute([$username, $name, $email, $hashedPwd]);
        }
    }

?>
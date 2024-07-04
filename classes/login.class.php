<?php
    class Login extends Dbh{

        protected function getUser($uid, $pwd){
            $sql = "SELECT * FROM `member_data` WHERE `uid` = ? OR `email` = ?";
            $stmt = $this->connect()->prepare($sql);

            if(!$stmt->execute([$uid, $uid])) {
                $stmt = null;
                header("location: /membersystem/index.php?error=stmtfailed");
                exit();
            }
            
            if($stmt->rowCount() == 0){
                $stmt = null;
                header("location: /membersystem/index.php?error=usernotfound");
                exit();
            }

            $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $checkPwd = password_verify($pwd, $pwdHashed[0]["pwd"]);

            if($checkPwd == false){
                $stmt = null;
                header("location: /membersystem/index.php?error=wrongpassword");
                exit();
            }
            elseif($checkPwd == true) {
                $sql = "SELECT * FROM `member_data` WHERE `uid` = ? OR `email` = ? AND `pwd` = ?;";
                $stmt = $this->connect()->prepare($sql);
                if(!$stmt->execute([$uid, $uid, $pwdHashed[0]["pwd"]])){
                    $stmt = null;
                    header("location: /membersystem/index.php?error=stmtfailed");
                    exit();
                }

                if($stmt->rowCount() == 0){
                    $stmt = null;
                    header("location: /membersystem/index.php?error=usernotfound");
                    exit();
                }

                $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $_SESSION["userid"] = $user[0]["id"];
                $_SESSION["useruid"] = $user[0]["uid"];
            }

            $stmt = null;

        }

        
    }

?>
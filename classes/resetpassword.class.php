<?php

class ResetPassword extends Dbh{
    protected function checkUser($uid, $email) {
        $sql = "SELECT * FROM `member_data` WHERE `uid` = ? OR `email` = ?;";
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute([$uid, $email])){
            $stmt = null;
            header("location: /membersystem/change_password.php?error=stmtfailed");
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

    protected function deleteEmail($email) {
        $sql = "DELETE FROM `pwd_reset` WHERE `pwd_reset_email` = ?;";
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute([$email])){
            $stmt = null;
            return false;
        }else {
            return true;
        }
    }

    protected function isertToken($email, $selector, $hashedToken, $expires){
        $sql = "INSERT INTO `pwd_reset` (`pwd_reset_email`, `pwd_reset_selector`, `pwd_reset_token`, `pwd_reset_expires`) VALUES (?, ?, ?, ?);";

        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute([$email, $selector, $hashedToken, $expires])){
            $stmt = null;
            return false;
        }else{
            return true;
        }
    }

    protected function findToken($selector, $currentDate){
        $sql = "SELECT * FROM `pwd_reset` WHERE `pwd_reset_selector` = ? AND `pwd_reset_expires` >= ?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$selector, $currentDate]);
        $row = $stmt->Fetch();
        if($stmt->rowCount() > 0){
            return $row;
        }
        else {
            return false;
        }
    }

    protected function updatePassword($newPwd, $tokenEmail){
        $sql = "UPDATE `member_data` SET `pwd` = ? WHERE `email` = ?;";
        $stmt = $this->connect()->prepare($sql);
        $newPwdHash = password_hash($newPwd, PASSWORD_DEFAULT);
        $stmt->execute([$newPwdHash, $tokenEmail]);
    }


}
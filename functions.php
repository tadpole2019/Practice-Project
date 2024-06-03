<?php
    function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat){
        $result;
        if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function invalidUid($username) {
        $result;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function invalidEmail($email) {
        $result;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function pwdMatch($pwd, $pwdRepeat) {
        $result;
        if ($pwd !== $pwdRepeat) {
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function uidExists($conn, $username, $email) {
        $sql = "SELECT * FROM `member_data` WHERE `uid` = ? OR `email` = ?;";

        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute([$username, $email]);

            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            header("location: ../membersystem/member_join.php?error=stmtfailed");
            exit();
        }
    }

    function createUser($conn, $name, $email, $username, $pwd) {
        $sql = "INSERT INTO `member_data` (`uid`, `name`, `email`, `pwd`) VALUES (?, ?, ?, ?);";
        try {
            $stmt = $conn->prepare($sql);
            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
            $stmt->execute([$username, $name, $email, $hashedPwd]);

            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }

            header("location: ../membersystem/member_join.php?error=none");

        } catch (PDOException $e) {
            header("location: ../membersystem/member_join.php?error=stmtfailed");
            exit();
        }
    }
?>
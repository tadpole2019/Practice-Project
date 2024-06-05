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
            $fetch = $stmt->fetch();

            if ($stmt->rowCount() > 0) {
                return $fetch;
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

    function emptyInputLogin($username, $pwd){
        $result;
        if (empty($username) || empty($pwd)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function loginUser($conn, $username, $pwd) {
        $uidExists = uidExists($conn, $username, $username);

        if ($uidExists === false) {
            header("location: ../membersystem/index.php?error=wronglogin");
            exit();
        }

        $pwdHashed = $uidExists["pwd"];
        $checkPwd = password_verify($pwd, $pwdHashed);

        if ($checkPwd === false) {
            header("location: ../membersystem/index.php?error=wronglogin");
            exit();
        }
        else if ($checkPwd === true) {
            session_start();
            $_SESSION["userid"] = $uidExists["id"];
            $_SESSION["useruid"] = $uidExists["uid"];

            header("location: ../membersystem/member_center.php");
            exit();
        }
    }

    function profileExists($conn, $users_id) {
        $sql = "SELECT * FROM `member_profiles` WHERE `users_id` = ?;";

        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute([$users_id]);
            $fetch = $stmt->fetch();

            if ($stmt->rowCount() > 0) {
                return $fetch;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            header("location: ../membersystem/member_join.php?error=profileNotFound");
            exit();
        }
    }

    function setProfileInfo($conn, $about, $title, $content, $users_id){

        try{
            $sql = "INSERT INTO `member_profiles` (`profiles_about`, `profiles_introtitle`, `profiles_introtext`, `users_id`) VALUES (?, ?, ?, ?);";

            $result = $conn->prepare($sql);
            $result->execute([$about, $title, $content, $users_id]);
        }catch(PDOException $e) {
            header("location: ../membersystem/member_center.php?error=setfailed");
            exit();
        }
    }

    function updateProfileInfo($conn, $about, $title, $content, $users_id){

        try{
            $sql = "UPDATE `member_profiles` SET `profiles_about`=?, `profiles_introtitle`=?, `profiles_introtext`=? WHERE `users_id`=?;";

            $result = $conn->prepare($sql);
            $result->execute([$about, $title, $content, $users_id]);
        }catch(PDOException $e) {

            header("location: ../membersystem/member_center.php?error=updatefailed");
            exit();
        }
    }

    function deleteProfileInfo($conn, $users_id) {
        try{
            $sql = "DELETE FROM `member_profiles` WHERE `users_id`=?;";
            $result = $conn->prepare($sql);
            $result->execute([$users_id]);

            header("location: ../membersystem/member_center.php");
            exit();

        }catch(PDOException $e) {
            header("location: ../membersystem/member_center.php?error=deletefailed");
            exit();
        }
    }
?>
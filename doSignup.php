<?php
    if (isset($_POST["submit"])) {

        $name = $_POST["name"];
        $email = $_POST["email"];
        $username = $_POST["uid"];
        $pwd = $_POST["password"];
        $pwdRepeat = $_POST["pwdrepeat"];

        require_once("connMySQL.php");
        require_once("functions.php");

        if (emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false) {
            header("location: ../membersystem/member_join.php?error=emptyinput");
            exit();
        }

        if (invalidUid($username) !== false) {
            header("location: ../membersystem/member_join.php?error=invaliduid");
            exit();
        }

        if (invalidEmail($email) !== false) {
            header("location: ../membersystem/member_join.php?error=invalidemail");
            exit();
        }
        
        if (pwdMatch($pwd, $pwdRepeat) !== false) {
            header("location: ../membersystem/member_join.php?error=passwordsdontmatch");
            exit();
        }

        if (uidExists($conn, $username, $email) !== false) {
            header("location: ../membersystem/member_join.php?error=usernametaken");
            exit();
        }

        createUser($conn, $name, $email, $username, $pwd);
        header("location: ../membersystem/index.php?error=none");
    }
    else {
        header("location: ../membersystem/member_join.php");
    }

?>
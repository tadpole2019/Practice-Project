<?php
    if (isset($_POST["delete"])) {

        require_once("connMySQL.php");
        require_once("functions.php");

        session_start();

        $users_id = $_SESSION["userid"];

        deleteProfileInfo($conn, $users_id);

        header("location: ../membersystem/member_center.php");
    } else {
        header("location: ../membersystem/member_center.php?error=deletefailed");
    }

?>
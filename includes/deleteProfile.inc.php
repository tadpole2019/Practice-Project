<?php
    if (isset($_POST["delete"])) {

        include 'class-autoload2.inc.php';

        session_start();

        $users_id = $_SESSION["userid"];

        $deleteProfileInfo = new DeleteProfileContr($users_id);
        $deleteProfileInfo->deleteProfileInfo();
        // deleteProfileInfo($conn, $users_id);

        header("location: /membersystem/member_center.php");
    } else {
        header("location: /membersystem/member_center.php?error=deletefailed");
    }

?>
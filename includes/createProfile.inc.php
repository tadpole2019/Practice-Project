<?php
    if (isset($_POST["submit"])) {
        include 'class-autoload2.inc.php';
        // include_once "../classes/dbh.class.php";
        // include_once "../classes/users.class.php";
        // include_once "../classes/userscontr.class.php";
        session_start();

        $users_id = $_SESSION["userid"];
        $about = $_POST["profiles_about"];
        $title = $_POST["profiles_introtitle"];
        $content = $_POST["profiles_introtext"];

        $createProfileInfo = new CreateProfileContr($users_id, $about, $title, $content);
        $createProfileInfo->createProfileInfo();
        header("location: /membersystem/member_center.php");
    } else {
        header("location: /membersystem/member_center.php?error=setfailed");
    }
?>
<?php
    if(isset($_POST["update"])) {

        include 'class-autoload2.inc.php';

        session_start();

        $users_id = $_SESSION["userid"];
        $about = $_POST["profiles_about"];
        $title = $_POST["profiles_introtitle"];
        $content = $_POST["profiles_introtext"];

        $updateprofile = new UpdateProfileContr($about, $title, $content, $users_id);
        $updateprofile->updateProfileInfo();
        // updateProfileInfo($conn, $about, $title, $content, $users_id);
        header("location: /membersystem/member_center.php");
    } else {
        header("location: /membersystem/member_center.php?error=updatefailed");
    }
?>
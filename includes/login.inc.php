<?php
    if(isset($_POST["submit"])){

        $username = $_POST["userid"];
        $pwd = $_POST["password"];
        $validcode = $_POST["validcode"];

        include 'class-autoload2.inc.php';

        $login = new LoginContr($username, $pwd, $validcode);

        //running error handler
        $login->loginUser();
        // header("location: /membersystem/index.php?error=none");
        echo "登入成功!";
        header("Refresh:1; url= /membersystem/member_center.php?error=none", true, 303);
    }

?>
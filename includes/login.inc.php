<?php
    if(isset($_POST["submit"])){

        $username = $_POST["userid"];
        $pwd = $_POST["password"];

        include 'class-autoload2.inc.php';

        $login = new LoginContr($username, $pwd);

        //running error handler
        
        $login->loginUser();
        header("location: /membersystem/index.php?error=none");
    }

?>
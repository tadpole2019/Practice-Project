<?php
    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $username = $_POST["uid"];
        $pwd = $_POST["password"];
        $pwdRepeat = $_POST["pwdrepeat"];

        include 'class-autoload2.inc.php';

        // include_once '../classes/signup.class.php';

        $signup = new SignupContr($name, $email, $username, $pwd, $pwdRepeat);

        //running error handler
        
        $signup->signupUser();
        header("location: /membersystem/index.php?error=none");
    }

?>
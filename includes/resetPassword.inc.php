<?php
        include 'class-autoload2.inc.php';
?>
<?php

    if(isset($_POST['submit'])){
        $selector = $_POST['selector'];
        $validator = $_POST['validator'];
        $password = $_POST['password'];
        $pwdRepeat = $_POST['pwdrepeat'];

        $url ='http://localhost/membersystem/create-new-password.php?selector='.$selector.'&validator='.$validator;

        $resetPassword = new ResetPasswordContr($password, $password, $pwdRepeat);
        $resetPassword->resetPassword($selector, $validator);

    }
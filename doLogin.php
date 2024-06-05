<?php
if (isset($_POST["submit"])) {
    $username = $_POST["userid"];
    $pwd = $_POST["password"];

    require_once("connMySQL.php");
    require_once("functions.php");

    if (emptyInputLogin($username, $pwd) !== false) {
        header("location: ../membersystem/index.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $pwd);
}
else {
    header("location: ../membersystem/index.php");
    exit();
}

?>
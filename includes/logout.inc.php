<?php

session_start();
session_unset();
session_destroy();

setcookie("token", "", time() - 3600, "/", "", true, true);


header("Refresh:1; url= /membersystem/index.php", true, 303);
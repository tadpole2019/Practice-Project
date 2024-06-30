<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <div class="wrapper">
            <ul class="nav-item">
                <li><a href="member_list.php">看看誰加入會員</a></li>
                <?php 
                    if (isset($_SESSION["useruid"])) {
                        echo "<li><a href='member_center.php'>帳戶資訊</a></li>";
                        echo "<li><a href='includes/logout.inc.php'>登出</a></li>";
                    }
                    else {
                        echo "<li><a href='member_join.php'>註冊帳戶</a></li>";
                        echo "<li><a href='index.php'>登入</a></li>";
                    }
                ?>
            </ul>
        </div>
    </nav>
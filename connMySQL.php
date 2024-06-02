<?php
    $db_host = "localhost";
    $db_username = "admin";
    $db_password = "111111";
    $db_name = "member_system";

    //錯誤處理
    try{
        $db_link = new PDO("mysql:host={$db_host};dbname={$db_name};charset=utf8", $db_username, $db_password);
    }catch(PDOException $e){
        print "資料庫連結失敗，訊息:{$e->getMessage()}<br/>";
        die();
    }
?>
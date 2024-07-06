<?php 
    include_once("header.php");
    require 'vendor/autoload.php';
    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;

    $key = 'Nn8XDFLBAEbapZF5TLGsAuLhzqJsAx5qQfHY6KcAfvDHZJrQ5MZzHrBrg4kjDUAspL7NA4sDrRTvi8xTM3hShftbH9uF93WoXSt6KakWsCAqj2Api8fAJqm2R9Ak3nir';

    if (isset($_COOKIE['token'])) {
        $decoded = JWT::decode($token, new Key($key, 'HS256'));
    }
?>
    <div class="title">
        <h2>帳戶登入</h2>
    </div>
    <div class="login">
        <form action="includes/login.inc.php" method="post">
            <div class="form-item">
                <label for="userid">帳號</label>
                <input name="userid" type="text" placeholder="請輸入電子郵件或是帳戶名稱">
            </div>
            <div class="form-item">
                <label for="password">密碼</label>
                <input name="password" type="text" placeholder="請輸入密碼">
            </div>
            <div class="form-item">
                <label for="validcode">請輸入驗證碼</label>
                <input name="validcode" type="text" placeholder="請輸入驗證碼">
            </div>
            <img src="includes/validCode.inc.php" style="width:100px;height:25px" alt="" id="code" />
            <a href="javascript: changeCode()">看不清楚，換一張</a>
            <div class="login-btn">
                <button type="submit" name="submit">登入</button>
                <a href="change_password.php">忘記密碼</a>
            </div>
        </form>
    </div>
    <div style="text-align:center;color:red">
        <?php
            if (isset($_GET["error"])) {

                switch($_GET["error"]) {
                    case "emptyinput":
                        echo "<p>請填寫表格!</p>";
                        break;
                    case "validCodeError":
                        echo "<p>驗證碼錯誤!</p>";
                        break;
                    case "wronglogin":
                        echo "<p>帳號或密碼錯誤!</p>";
                        break;
                    case "none":
                        echo "<p>註冊成功!</p>";
                        break;
                }
                // if ($_GET["error"] == "emptyinput") {
                //     echo "<p>請填寫表格!</p>";
                // }
                // else if ($_GET["error"] == "validCodeError") {
                //     echo "<p>驗證碼錯誤!</p>";
                // }
                // else if ($_GET["error"] == "wronglogin") {
                //     echo "<p>帳號或密碼錯誤!</p>";
                // }
                // else if ($_GET["error"] == "none") {
                //     echo "<p>登入成功!</p>";
                // }
            }
        ?>
    </div>
<?php 
    include_once("footer.php");
?>
<script>
    function changeCode() {
        document.getElementById("code").src = "includes/validCode.inc.php?"+Math.random();
    }
</script>
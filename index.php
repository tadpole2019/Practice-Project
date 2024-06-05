<?php 
    include_once("header.php");
?>
    <div class="title">
        <h2>帳戶登入</h2>
    </div>
    <div class="login">
        <form action="doLogin.php" method="post">
            <div class="form-item">
                <label for="userid">帳號</label>
                <input name="userid" type="text" placeholder="請輸入電子郵件或是帳戶名稱">
            </div>
            <div class="form-item">
                <label for="password">密碼</label>
                <input name="password" type="text" placeholder="請輸入密碼">
            </div>
            <div class="login-btn">
                <button type="submit" name="submit">登入</button>
                <button>忘記密碼</button>
            </div>
        </form>
    </div>
    <div style="text-align:center;color:red">
                <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyinput") {
                            echo "<p>請填寫表格!</p>";
                        }
                        else if ($_GET["error"] == "wronglogin") {
                            echo "<p>帳號或密碼錯誤!</p>";
                        }
                    }
                ?>
    </div>
<?php 
    include_once("footer.php");
?>
<?php 
    include_once("header.php");
?>
    <div class="title">
        <h2>註冊帳戶</h2>
    </div>

    <div class="signup">
        <form action="doSignup.php" method="post">
            <div class="form-item">
                <label for="name">姓名</label>
                <input type="text" id="name" name="name" placeholder="請輸入您的姓名">
            </div>
            <div class="form-item">
                <label for="email">個人信箱</label>
                <input type="text" id="email" name="email" placeholder="請輸入您的信箱">
            </div>
            <div class="form-item">
                <label for="uid">帳戶名稱</label>
                <input type="text" id="uid" name="uid" placeholder="請輸入您的帳戶名稱">
            </div>
            <div class="form-item">
                <label for="password">密碼</label>
                <input type="text" id="password" name="password" placeholder="請輸入您的密碼">
            </div>
            <div class="form-item">
                <label for="pwdrepeat">確認密碼</label>
                <input type="text" id="pwdrepeat" name="pwdrepeat" placeholder="請再次輸入您的密碼">
            </div>
            <div class="signup-btn">
                <button type="submit" name="submit">註冊</button>
            </div>
            <div style="text-align:center;color:red">
                <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "emptyinput") {
                            echo "<p>請填寫表格!</p>";
                        }
                        else if ($_GET["error"] == "invaliduid") {
                            echo "<p>請填寫英數大小寫的使用者名稱</p>";
                        }
                        else if ($_GET["error"] == "invalidemail") {
                            echo "<p>請填寫正確且沒使用的郵箱地址!</p>";
                        }
                        else if ($_GET["error"] == "passwordsdontmatch") {
                            echo "<p>再次填寫密碼不相同!</p>";
                        }
                        else if ($_GET["error"] == "usernametaken") {
                            echo "<p>名稱已被其他人使用!</p>";
                        }
                        else if ($_GET["error"] == "none") {
                            echo "<p>註冊成功!</p>";
                        }
                    }
                ?>
            </div>
        </form>



    </div>



<?php 
    include_once("footer.php");
?>
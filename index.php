<?php 
    include_once("header.php");
?>
    <div class="login">
        <form action="" method="post">
            <div class="form-item">
                <label for="email">帳號</label>
                <input name="email" type="text" placeholder="請輸入電子郵件">
            </div>
            <div class="form-item">
                <label for="password">密碼</label>
                <input name="password" type="text" placeholder="請輸入密碼">
            </div>
            <div class="login-btn">
                <button type="submit">登入</button>
                <button>忘記密碼</button>
            </div>
        </form>
    </div>
<?php 
    include_once("footer.php");
?>
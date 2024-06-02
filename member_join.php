<?php 
    include_once("header.php");
?>
    <div class="signup">
        <h2>Sign Up</h2>
        <form action="doSignup.php" method="post">
            <div>
                <label for="name">姓名</label>
                <input type="text" name="name" placeholder="請輸入您的姓名">
            </div>
            <div>
                <label for="email">個人信箱</label>
                <input type="text" name="email" placeholder="請輸入您的信箱">
            </div>
            <div>
                <label for="uid">帳戶名稱</label>
                <input type="text" name="uid" placeholder="請輸入您的帳戶名稱">
            </div>
            <div>
                <label for="password">個人信箱</label>
                <input type="text" name="password" placeholder="請輸入您的信箱">
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
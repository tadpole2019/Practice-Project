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
        </form>
    </div>

<?php 
    include_once("footer.php");
?>
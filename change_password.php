<?php 
    include_once("header.php");

?>
    <div class="title">
        <h2>更改密碼</h2>
    </div>

    <div class="signup">
        <form action="includes/sendEmail.inc.php" method="post">
            <div class="form-item">
                <label for="email">個人信箱</label>
                <input type="email" id="email" name="email" placeholder="請輸入您的信箱">
            </div>
            <div class="signup-btn">
                <button type="submit" name="submit">寄出電子郵件</button>
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
            case "invalidemail":
                echo "<p>電子郵件格式錯誤!</p>";
                break;
            case "unknownemail":
                echo "<p>電子信箱未註冊!</p>";
                break;
        }
    }
    ?>
    </div>
<?php 
    include_once("footer.php");
?>
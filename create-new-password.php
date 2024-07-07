<?php
    if(empty($_GET['selector']) || empty($_GET['validator'])){
        echo '請依循正規管道進入此頁面!';
    }
    else {
        $selector = $_GET['selector'];
        $validator = $_GET['validator'];

        if(ctype_xdigit($selector) && ctype_xdigit($validator)) {

?>

<?php 
    include_once("header.php");
?>

<?php  ?>
    <div class="title">
        <h2>更改密碼</h2>
    </div>

    <div class="signup">
        <form action="includes/resetPassword.inc.php" method="post">
            <div class="form-item">
                <input type="hidden" name="type" value="reset">
                <input type="hidden" name="selector" value="<?php echo $selector ?>">
                <input type="hidden" name="validator" value="<?php echo $validator ?>">
                <label for="password">新密碼</label>
                <input type="password" id="password" name="password" placeholder="請輸入您的新密碼">
                <label for="pwdrepeat">重複新密碼</label>
                <input type="pwdrepeat" id="pwdrepeat" name="pwdrepeat" placeholder="請重複輸入您的新密碼">
            </div>
            <div class="signup-btn">
                <button type="submit" name="submit">更改密碼</button>
            </div>
        </form>
    </div>
    <div style="text-align:center;color:red">
    <?php
    if (isset($_GET["error"])) {

        switch($_GET["error"]) {
            case "emptypassword":
                echo "<p>請填寫表格!</p>";
                break;
            case "passwordnotmatch":
                echo "<p>密碼與重複密碼不一樣!</p>";
                break;
        }
    }
    ?>
    </div>

<?php
        }
        else {
            echo '請依循正規管道進入此頁面!';
        }
    }
?>

<?php 
    include_once("footer.php");
?>
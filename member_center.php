<?php 
    include_once("header.php");
    include_once("functions.php");
?>
    <div class="title">
        <h2>會員中心</h2>
    </div>
    <div style="text-align:center;font-size:18px">
    <?php 
        echo "<p>嗨!" . $_SESSION["useruid"] . ".</p>";
    ?>
    </div>
    <?php 
        $users_id = $_SESSION["userid"];
        $profileExists = profileExists($conn, $users_id);
        if ($profileExists === false) : ?>
            <div class="title">
                <h2>沒有 會員編號<?= $users_id ?> 的資料!</h2>
            </div>
            <div class="signup">
                <form action="doAddProfile.php" method="post">
                    <div class="form-item">
                        <label for="profiles_about">關於我:</label>
                        <input type="text" name="profiles_about" id="profiles_about">
                    </div>
                    <div class="form-item">
                        <label for="profiles_introtitle">介紹主題:</label>
                        <input type="text" name="profiles_introtitle" id="profiles_introtitle">
                    </div>
                    <div class="form-item">
                        <label for="profiles_introtext">介紹內容:</label>
                        <textarea name="profiles_introtext" id="profiles_introtext" rows="5" cols="23"></textarea>
                    </div>
                    <div class="signup-btn">
                        <button type="submit" name="submit">新增資料</button>
                    </div>
                </form>
            </div>
            `;
    <?php else : ?>
    <?php 
        $sql = "SELECT * FROM `member_profiles` WHERE `users_id`=?;";
        $result = $conn->prepare($sql);
        $result->execute([$users_id]);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        
    ?>
        <table style="margin:auto">
            <tr>
                <th>關於我:</th>
                <td><?= $row["profiles_about"] ?></td>
            </tr>
            <tr>
                <th>介紹主題:</th>
                <td><?= $row["profiles_introtitle"] ?></td>
            </tr>
            <tr>
                <th>介紹內容:</th>
                <td><?= $row["profiles_introtext"] ?></td>
            </tr>
        </table>
        <form action="doDeleteProfile.php" method="post">
            <div class="delete-btn">
                <button type="delete" name="delete">刪除資料</button>
            </div>
        </form>
        <div class="signup">
        <form action="doUpdateProfile.php" method="post">
            <div class="form-item">
                <label for="profiles_about">關於我:</label>
                <input type="text" name="profiles_about" id="profiles_about">
            </div>
            <div class="form-item">
                <label for="profiles_introtitle">介紹主題:</label>
                <input type="text" name="profiles_introtitle" id="profiles_introtitle">
            </div>
            <div class="form-item">
                <label for="profiles_introtext">介紹內容:</label>
                <textarea name="profiles_introtext" id="profiles_introtext" rows="5" cols="23"></textarea>
            </div>
            <div class="signup-btn">
                <button type="update" name="update">修改資料</button>
            </div>
        </form>
    </div>
    <?php endif; ?>

<?php 
    include_once("footer.php");
?>
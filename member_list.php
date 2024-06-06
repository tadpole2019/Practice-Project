<?php 
    include_once("header.php");
?>

<?php
    $sql = "SELECT `member_data`.`id`, `member_data`.`name`, `member_data`.`email`, `member_data`.`uid`, `member_profiles`.`profiles_about`, `member_profiles`.`profiles_introtitle`, `member_profiles`.`profiles_introtext`
    FROM `member_data` LEFT JOIN `member_profiles`
    ON `member_data`.`id` = `member_profiles`.`users_id`;";
    $result = $conn->prepare($sql);
    $result->execute();
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
?>
    <div class="title">
        <h2>會員顯示</h2>
    </div>

    
<?php
    // echo "<pre>";
    //     print_r($rows);
    // echo "</pre>";
?>

<div>
    <table style="margin:auto;">
        <thead>
        <tr>
            <th>會員編號</th>
            <th>姓名</th>
            <th>電子郵箱</th>
            <th>帳號</th>
            <th>關於我</th>
            <th>介紹主題</th>
            <th>介紹內容</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($rows as $row) : ?>
        <tr>
            <td><?= $row["id"] ?></td>
            <td><?= $row["name"] ?></td>
            <td><?= $row["email"] ?></td>
            <td><?= $row["uid"] ?></td>
            <td><?= $row["profiles_about"] ?></td>
            <td><?= $row["profiles_introtitle"] ?></td>
            <td><?= $row["profiles_introtext"] ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>



<?php 
    include_once("footer.php");
?>
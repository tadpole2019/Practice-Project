<?php 
    include_once("header.php");
?>

<?php
    $sql = "SELECT `id`, `name`, `email`, `uid` FROM `member_data`;";
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
        </tr>
        </thead>
        <tbody>
        <?php foreach ($rows as $row) : ?>
        <tr>
            <td><?= $row["id"] ?></td>
            <td><?= $row["name"] ?></td>
            <td><?= $row["email"] ?></td>
            <td><?= $row["uid"] ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>



<?php 
    include_once("footer.php");
?>
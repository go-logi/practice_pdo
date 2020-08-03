<?php

$dbname = "test";

$dsn = "mysql:host=db;dbname={$dbname};";
$dbuser = "root";
$dbpassword = "secret";

try {
    $db = new PDO($dsn, $dbuser, $dbpassword);
    $sql = "SELECT * FROM user";

    $statement = $db -> query($sql);
    $row_count = $statement->rowCount();
    while($row = $statement->fetch()){
        $rows[] = $row;
    }
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>nameテーブル表示</title>
    <meta charset="utf-8">
</head>
<body>
<h1>nameテーブル表示</h1>

レコード件数：<?php echo $row_count; ?>

<table border='1'>
    <tr>
        <td>id</td>
        <td>name</td>
        <td>email</td>
    </tr>

    <?php
    foreach($rows as $row){
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo htmlspecialchars($row['name'],ENT_QUOTES,'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($row['email'],ENT_QUOTES,'UTF-8'); ?></td>
        </tr>
        <?php
    }
    ?>

</table>

</body>
</html>
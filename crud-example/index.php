<?php
    require('Components/config.php');
    $query = "SELECT * FROM subjects where visible=1 order by position";
    $result = mysqli_query($connection, $query);
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>widget_cms</title>
    <meta http-equiv="Content-Type" content="text/html;
    charset=utf-8">
</head>
<body>
    <ul>
        <?php if($editmode) { ?>
            <li>
                <a href="databases_create.php">Lisa uus</a>
            </li>
        <?php } ?>
        <?php
        while ($subject = mysqli_fetch_assoc($result)) { ?>
            <li>
                <?php echo $subject['menu_name']; ?>
                <?php if($editmode) { ?>
                <a href="databases_update.php?id=<?php echo $subject['id']; ?>">Muuda</a>
                <a href="databases_delete.php?id=<?php echo $subject['id']; ?>">Kustuta</a>
                <?php } ?>
            </li>
        <?php } ?>
    </ul>
</body>
</html>
<?php mysqli_free_result($result); ?>
<?php mysqli_close($connection);  ?>
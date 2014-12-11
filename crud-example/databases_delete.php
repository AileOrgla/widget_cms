<?php
if (!isset($_GET['id']) or $_GET != 0) {
    header('location: index.php');
}
require('Components/config.php');
$id = $_GET['id'];

$query = "DELETE FROM subjects where id= {$id}";
$result = mysqli_query($connection, $query);


?>
<!DOCTYPE HTML>
<html>
<head>
    <title>widget_cms</title>
    <meta http-equiv="Content-Type" content="text/html;
    charset=utf-8">
    <meta http-equiv="refresh" content="2; url=index.php/">
    <style>
        .notice {
            color:green;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
<ul>
    <?php if ($result && mysqli_affected_rows($connection)) { ?>
        <p class="notice"><?php echo "Rida kustutatud"; ?></p>
        <?php } else { ?>
        <p class="error"><?php echo "Sellist rida andmebaasis ei ole"; ?></p>
    <?php } ?>
</ul>
</body>
</html>
<?php mysqli_close($connection);  ?>



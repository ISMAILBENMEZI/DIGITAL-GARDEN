<?php
if(!isset($_SESSION['username']))
{
    header("location: includes/auth.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="public/output.css" rel="stylesheet">
</head>

<body>
    <?php
    $page = "dashboard";
    require_once "includes/header.php";
    ?>

    <?php require_once "includes/footer.php" ?>
</body>

</html>
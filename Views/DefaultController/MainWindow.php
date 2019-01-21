<?php
session_start();
?>

<!DOCTYPE html>
<html>
<?php include(dirname(__DIR__).'/head.html') ?>

<title> Strona główna </title>
<body>

<div id="container">
    <?php include(dirname(__DIR__).'/logo.html') ?>
    <?php include(dirname(__DIR__).'/menu.html') ?>
    <?php include(dirname(__DIR__).'/topbar.html') ?>

    <div id="content" style="text-align: center">
        <?php echo "<p>witaj ".$_SESSION['userName'].'![ <a href="logOut.php">Log Out!</a> ]</p>';?>
    </div>
    <?php include(dirname(__DIR__).'/footer.html') ?>
</div>

</body>
</html>



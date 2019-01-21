<?php
//session_start();
//?>

<!DOCTYPE html>
<html>
<?php include(dirname(__DIR__) . '/head.html') ?>

<title> Logowanie </title>
<body>

<div id="container">
    <?php include(dirname(__DIR__) . '/logo.html') ?>
    <?php include(dirname(__DIR__) . '/menu.html') ?>
    <?php include(dirname(__DIR__) . '/topbar.html') ?>

    <div id="content" style="text-align: center">
        <form action="?page=login" method="POST" >
<!--            <input name="email" placeholder="email" required/><br /><br />-->
<!--            <input name="password" placeholder="password" type="password" required/><br /><br />-->
<!--            <input type="submit" value="Sign in" class="btn btn-dark"/>-->
            <div class="form-group row">
                <label for="inputEmail" class="col-sm-1 col-form-label">
                    <i class="material-icons md-48">person</i>
                </label>
                <div class="col-sm-11">
                    <input class="form-control" id="inputEmail" name="email" placeholder="login" required/>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-1 col-form-label ma">
                    <i class="material-icons md-48">vpn_key</i>
                </label>
                <div class="col-sm-11">
                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="password" type="password" required/>
                </div>
            </div>
            <?php
            if(isset($_SESSION['error_login']))
            {
                echo '<div class="error">'.$_SESSION['error_login'].'</div>';
                unset($_SESSION['error_login']);
            }
            ?>
            <input type="submit" value="Sign in" class="btn btn-primary btn-lg float-center" /><br><br>
            <input type="button" value="Register!" class="btn btn-secondary btn-sm float-center" onclick="href='?page=register'" />
        </form>
    </div>
    <?php include(dirname(__DIR__) . '/footer.html') ?>
</div>
</body>
</html>
<?php
session_start();
?>

<!DOCTYPE html>
<html>
<body>

<h1>LOGIN</h1>

<?php

if(isset($message)): ?>
    <?php foreach($message as $item): ?>
        <div><?= $item ?></div>
    <?php endforeach; ?>
<?php endif; ?>

<form action="" method="POST">
    <input name="email" placeholder="email" required/>
    <input name="password" placeholder="password" type="password" required/>
    <input type="submit" value="Sign in"/>
</form>

<?php
require_once "../../Database.php";
    echo "<br><a href='register.php'>Register!</a>";

if(isset($_SESSION['enabled'])  && $_SESSION['enabled']==true)
{
    echo "<script> location.href='MainWindow.php'; </script>";
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $polaczenie = new Database();
    $pdo = $polaczenie->connect();

    $email = $_POST['email'];

    $email = htmlentities($email, ENT_QUOTES, "UTF-8");

    $sql = "SELECT * FROM users where login='$email'";

    if($rezultat = @$pdo->query("SELECT * FROM users where login='$email'"))
    {
        $ilu_userow = $rezultat->rowCount();
        if($ilu_userow>0)
        {
            foreach( $rezultat as $row )
            {
                if(password_verify($_POST['password'], $row['password']))
                {
                    $_SESSION['enabled']=true;
                    $_SESSION['userName']=$row['login'];
                    //$rezultat->free_result();
                    //echo "userow: ".$ilu_userow."\n";
                    echo "<script> location.href='MainWindow.php'; </script>";
                    exit;
                    $rezultat->closeCursor();
                }else{
                    echo '<br><span style="color:red">Invalid username or password</span>';
                }
            }
        }
        else{
             echo '<br><span style="color:red">Invalid username or password</span>';
        }
    }
}
?>
</body>
</html>
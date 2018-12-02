<!DOCTYPE html>
<html>
<body>

<h1>LOGIN</h1>

<?php if(isset($message)): ?>
    <?php foreach($message as $item): ?>
        <div><?= $item ?></div>
    <?php endforeach; ?>
<?php endif; ?>

<form action="?page=login" method="POST">
    <input name="email" placeholder="email" required/>
    <input name="password" placeholder="password" type="password" required/>
    <input type="submit" value="Sign in"/>
</form>

<?php
require_once "../../Database.php";

$polaczenie = new Database();
$pdo = $polaczenie->connect();

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users where login='$email' AND password='$password'";

if($rezultat = @$pdo->query($sql))
{
    $ilu_userow = $rezultat->rowCount();
    if($ilu_userow>0)
    {
        //$wiersz = $rezultat->fetch_assoc();
        $user = $q['login'];

        //$rezultat->free_result();
        echo "userek: ".$user."\n";
    }
}

$q = $pdo->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);
echo $_POST['email'];
echo $_POST['password'];
?>
<?php while ($r = $q->fetch()): ?>
<tr>
    <td><?php echo htmlspecialchars($r['login']) ?></td>
    <td><?php echo htmlspecialchars($r['email']); ?></td>
    <td><?php echo htmlspecialchars($r['password']); ?></td>
</tr>
<?php endwhile; ?>






</body>
</html>
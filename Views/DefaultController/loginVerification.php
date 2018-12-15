<?php
require_once "../../Database.php";

$polaczenie = new Database();
$pdo = $polaczenie->connect();


if($pdo->err)
$email = $_POST['email'];
$password = $_POST['password'];
$password_hash = password_hash($password, PASSWORD_DEFAULT);

$sql = "SELECT * FROM user where login='$email' AND password='$password'";

//if($rezultat = @$pdo->query($sql))
//{
//    $ilu_userow = $rezultat->rowCount();
//    if($ilu_userow>0)
//    {
//        //$wiersz = $rezultat->fetch_assoc();
//        $user = $q['login'];
//
//        //$rezultat->free_result();
//        echo "userek: ".$user."\n";
//    }
//}

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
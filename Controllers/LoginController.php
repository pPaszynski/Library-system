<?php
//session_start();
require_once "AppController.php";
require_once "E:\CodeProjects\PHP\LibrarySystemv1\LibrarySystem\Database.php";

class LoginController extends AppController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $text = 'Hello there 👋';

        $this->render('index', ['text' => $text]);
    }

    public function login()
    {
        if(!isset($_SESSION["enabled"]))
        {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $polaczenie = new Database();
                $pdo = $polaczenie->connect();

                $email = $_POST['email'];

                $email = htmlentities($email, ENT_QUOTES, "UTF-8");

                $sql = "SELECT * FROM users where login='$email'";

                if ($rezultat = @$pdo->query("SELECT * FROM users where login='$email'")) {
                    $ilu_userow = $rezultat->rowCount();
                    if ($ilu_userow > 0) {
                        foreach ($rezultat as $row) {
                            if (password_verify($_POST['password'], $row['password'])) {
                                $_SESSION['enabled'] = true;
                                $_SESSION['userID']= $row['id_user'];
                                $_SESSION['login'] = $row['login'];
                                $_SESSION['roleID'] = $row['id_role'];
                                //$rezultat->free_result();
                                //echo "userow: ".$ilu_userow."\n";
                                //echo "<script> location.href='MainWindow.php'; </script>";
                                //$this->header('Location: '.'?page=home');
                                $this->redirect($row['id_role']);
                                exit;
                                $rezultat->closeCursor();
                            } else {
                                $_SESSION['error_login']="Invalid username or password";
                                //echo '<br><span style="color:red">Invalid username or password</span>';
                                $this->render('login');
                            }
                        }
                    } else {
                        $_SESSION['error_login']="Invalid username or password";
                        $this->render('login');
                    }
                }else{
                    $_SESSION['error_login']="Invalid username or password";
                    $this->render('login');
                }
            }
            $this->render('login');
        }else{
            $this->redirect($_SESSION['roleID']);
        }

    }

    function redirect(int $idRole) : void
    {
        if($idRole == 1)
        {
            header('Location: '.'?page=admin');
        }
        else if($idRole == 2)
        {
            header('Location: '.'?page=employe');
        }
        else if($idRole == 3)
        {
            header('Location: '.'?page=home');
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();

        $this->render('index', ['text' => 'You have been successfully logged out!']);
    }
}

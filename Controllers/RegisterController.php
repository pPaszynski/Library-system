<?php
//session_start();
require_once "AppController.php";
require_once "E:\CodeProjects\PHP\LibrarySystemv1\LibrarySystem\Database.php";

class RegisterController extends AppController
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

    public function register()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST")
        //if(isset($_POST['nick']))
        {
            $registerStatus = true;
            $nick = $_POST['nick'];

            //nick validate
            if(empty($nick))
            {
                $registerStatus = false;
                $_SESSION['error_nick']="Nick field is empty";
            }
            else if(!$this->checkAvailabilityLoginEmail($nick))
            {
                $registerStatus = false;
                $_SESSION['error_nick']="User with this nickname already exists";
            }
            else if((strlen($nick)<4) || (strlen($nick)>20))
            {
                $registerStatus = false;
                $_SESSION['error_nick']="Nickname should be between 4 and 20 letters long";
            }
            else if(ctype_alnum($nick)==false)
            {
                $registerStatus = false;
                $_SESSION['error_nick']="Nickname characters error";
            }

            //email validate
            if(empty($_POST['email']))
            {
                $registerStatus = false;
                $_SESSION['error_email']="Email field is empty";
            }else if(!$this->checkAvailabilityLoginEmail($_POST['email']))
            {
                $registerStatus = false;
                $_SESSION['error_email']="User with this email already exists";
            }
            else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $registerStatus = false;
                $_SESSION['error_email'] = "Invalid email";
            }   else
            {
                $email = $_POST['email'];
            }

            //password validate
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];

            if(empty($password1))
            {
                $registerStatus = false;
                $_SESSION['error_password']="Password field is empty";
            }
            else if($password1 != $password2)
            {
                $registerStatus = false;
                $_SESSION['error_password']="The passwords are different";
            }
            else if((strlen($password1)<4) || (strlen($password1)>20))
            {
                $registerStatus = false;
                $_SESSION['error_password'] = "Password should be between 4 and 20 letters long";
            }   else
            {
                $passwordHash = password_hash($password1, PASSWORD_DEFAULT);
            }

            //regulations validate
            if(!isset($_POST['regulations']))
            {
                $registerStatus = false;
                $_SESSION['error_regulations'] = "You must confirm the regulations";
            }

            //captcha validate
            $secretCode = "6LeuKIAUAAAAAFGQ_4K_ksl6dxwYpAuBHh01Kiv3";
            $check = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretCode.'&response='.$_POST['g-recaptcha-response']);
            $answer = json_decode($check);
            echo $answer->success;
            if($answer->success==false)
            {
                $registerStatus = false;
                $_SESSION['error_recaptcha'] = "You must confirm the captcha";
            }

            //register
            if($registerStatus == true)
            {
                if($this->saveUser($email, $nick, $passwordHash))
                {
                    echo "<script> 
                          alert('Registration is successful');
                          location.href='?page=login'; 
                          </script>";
                    exit;
                }
            }else
            {
                $this->render('register');
            }
        }
        $this->render('register');
    }

    public function logout()
    {
        session_unset();
        session_destroy();

        $this->render('index', ['text' => 'You have been successfully logged out!']);
    }

    function saveUser($email, $nick, $password)
    {
        $polaczenie = new Database();
        $pdo = $polaczenie->connect();

        $sql = "INSERT INTO users VALUES (NULL, '', '3', '$email', '$nick', '$password', '0', '1')";

        $count = $pdo->exec($sql);

        if($count > 0){
            return true;
        } else{
            return false;
        }
    }
    function checkAvailabilityLoginEmail($string)
    {
        $polaczenie = new Database();
        $pdo = $polaczenie->connect();

        $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);

        $sql = "SELECT * FROM users WHERE login = '$string' OR email = '$string'";

        $result = $pdo->query($sql);

        //$count = $result->rowCount();


        if($row = $result->fetch()) {
            return false;
        }else
        {
            return true;
        }
    }
}

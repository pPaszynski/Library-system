<?php
//session_start();
require_once "AppController.php";
require_once "E:\CodeProjects\PHP\LibrarySystemv1\LibrarySystem\Database.php";

class HomeController extends AppController
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

    public function home()
    {
        if (isset($_SESSION["enabled"]))
        {
            if($_SESSION['roleID'] == 3)
            {
                $this->render('home');
            }else{
                header('Location: '.'?page=login');
            }
        }
        else{
            header('Location: '.'?page=login');
        }
    }
}

<?php
//session_start();
require_once "AppController.php";
require_once "E:\CodeProjects\PHP\LibrarySystemv1\LibrarySystem\Database.php";

class AdminController extends AppController
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

    public function admin()
    {
        if(isset($_SESSION["enabled"])){
            if($_SESSION['roleID'] == 1)
                $this->render('admin');
        }else{
            header('Location: '.'?page=login');
        }
    }

}

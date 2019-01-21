<?php
//session_start();
require_once "AppController.php";
require_once "E:\CodeProjects\PHP\LibrarySystemv1\LibrarySystem\Database.php";

class EmployeController extends AppController
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

    public function employe()
    {
        if(isset($_SESSION["enabled"])){
            if($_SESSION['roleID'] == 2)
            {
                $this->render('employe');
            }
        }else
            {
                header('Location: ' . '?page=login');
            }
    }

}

<?php
//session_start();
require_once "AppController.php";
require_once "E:\CodeProjects\PHP\LibrarySystemv1\LibrarySystem\Database.php";

class ReaderController extends AppController
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

    public function reader()
    {
        if(isset($_SESSION["enabled"])){
            $this->render('reader');
        }else{
            header('Location: '.'?page=login');
        }

    }

}

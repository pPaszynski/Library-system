<?php

require_once 'Controllers/HomeController.php';
require_once 'Controllers/LoginController.php';
require_once 'Controllers/RegisterController.php';
require_once 'Controllers/ReaderController.php';
require_once 'Controllers/EmployeController.php';
require_once 'Controllers/AdminController.php';
require_once 'Controllers/DefaultController.php';



class Routing
{
    public $routes = [];

    public function __construct()
    {
        $this->routes = [
            'home' => [
                'controller' => 'HomeController',
                'action' => 'home'
            ],
            'login' => [
                'controller' => 'LoginController',
                'action' => 'login'
            ],
            'register' => [
                'controller' => 'RegisterController',
                'action' => 'register'
            ],

            'logout' => [
                'controller' => 'DefaultController',
                'action' => 'logout'
            ],

            'reader' => [
                'controller' => 'ReaderController',
                'action' => 'reader'
            ],
            'employe' => [
                'controller' => 'EmployeController',
                'action' => 'employe'
            ],
            'admin' => [
                'controller' => 'AdminController',
                'action' => 'admin'
            ],
            'obibiotece' => [
                'controller' => 'DefaultController',
                'action' => 'obibliotece'
            ]
        ];
    }

    public function run()
    {
        $page = isset($_GET['page'])
        && isset($this->routes[$_GET['page']]) ? $_GET['page'] : 'login';

        if ($this->routes[$page]) {
            $class = $this->routes[$page]['controller'];
            $action = $this->routes[$page]['action'];

            $object = new $class;
            $object->$action();
        }
    }

}
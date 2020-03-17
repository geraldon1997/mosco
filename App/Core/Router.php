<?php
namespace App\Core;

use App\Config\Config;
use App\Lib\Helper;
use App\Controller\Page\Home;

class Router
{
    protected static $controller;
    protected static $action;

    public static function route($url)
    {
        Config::load(Config::conf());

        //controller
        if (isset($url[0]) && $url[0] != '') {
            self::$controller = ucwords($url[0]);
        } else {
            self::$controller = Config::get('DEFAULT.page');
        }
        array_shift($url);

        //action
        if (isset($url[0]) && $url[0] != '') {
            self::$action =  $url[0].'Action';
        } else {
            self::$action = Config::get('ACTION.index');
        }

        
        //check if class and methods exist
        if (file_exists(Config::get('PATH.controller').self::$controller.'.php')) {
            echo "class exists<br>";
            echo "class ".self::$controller."<br>";
            echo "Method ".self::$action."<br>";
            $controller = 'App\Controller\Page\\'.self::$controller;
            $controllerClass = new $controller();
            if (method_exists($controllerClass, self::$action)) {
                echo "exists";
            } else {
                echo "doesnt exists";
            }
        } else {
            echo "no it doesn't exist";
        }
    }
}

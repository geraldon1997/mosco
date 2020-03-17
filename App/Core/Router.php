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
            self::$controller = Config::get('DEFAULT.controller');
        }
        array_shift($url);

        //action
        if (isset($url[0]) && $url[0] != '') {
            self::$action = $url[0].'Action';
        } else {
            self::$action = Config::get('ACTION.index');
        }
        array_shift($url);

        $params = $url;
        
        //check if class and methods exist
        if (file_exists(Config::get('PATH.controller').self::$controller.'.php')) {
            echo "class exists";
            if (function_exists(self::$action)) {
                echo "exists";
            } else {
                echo "doesnt exists";
            }
        } else {
            echo "no it doesn't exist";
        }
    }
}

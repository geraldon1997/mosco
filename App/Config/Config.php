<?php
namespace App\Config;

class Config
{
    protected static $file;
    protected static $data;
    protected static $default;

    public static function conf()
    {
        return "conf.php";
    }

    public static function load($file)
    {
        self::$file = require_once $file;
    }

    public static function get($key, $default = null)
    {
        self::$default = $default;
        $segments = explode('.', $key);
        self::$data = self::$file;

        foreach ($segments as $segment) {
            if (isset(self::$data[$segment])) {
                self::$data = self::$data[$segment];
            } else {
                self::$data = self::$default;
                break;
            }
        }
        return self::$data;
    }
}

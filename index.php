<?php
require_once 'vendor/autoload.php';

use App\Core\Router;
use App\Config\Config;

$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : [];

Router::route($url);

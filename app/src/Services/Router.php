<?php

namespace App\Src\Services;

class Router
{
    private static $list = [];

    public static function page($uri, $pageTitle, $lang = null)
    {
        self::$list[] = [
            'uri' => $uri,
            'page' => $pageTitle,
            'lang' => $lang,
            'post' => false
        ];
    }

    public static function post($uri, $class, $method)
    {
        self::$list[] = [
            'uri' => $uri,
            'class' => $class,
            'method' => $method,
            'post' => true
        ];
    }

    public static function enable()
    {
        $url = $_SERVER['REQUEST_URI'];
        $path = parse_url($url, PHP_URL_PATH);

        foreach (self::$list as $route) {
            if ($route['uri'] === $path) {
                if ($route['post'] === true && $_SERVER['REQUEST_METHOD'] === 'POST') {
                    $action = new $route['class'];
                    $method = $route['method'];
                    $action->$method($_POST);
                    die();
                } else {
                    if(isset($route['lang'])){
                        $localization = require_once "../lang/" . $route['lang'] . "/" . $route['page'] . ".php";
                    }
                    require_once "../views/pages/" . $route['page'] . ".php";
                    die();
                }
            }
        }

        self::error('404');
    }

    private static function error($error)
    {
        require_once "../views/errors/" . $error . ".php";
        die();
    }

    private static function redirect($uri)
    {
        header('Location: ' . $uri);
    }
}

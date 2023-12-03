<?php

namespace App\Src\Services;

class Router
{
    private static $list = [];
    public static function page($uri, $pageTitle)
    {
        self::$list[] = [
            'uri' => $uri,
            'page' => $pageTitle,
        ];
    }
    public static function enable()
    {
        $url = $_SERVER['REQUEST_URI'];
        $path = parse_url($url, PHP_URL_PATH);

        foreach (self::$list as $route) {
            if ($route['uri'] === $path) {
                require_once "../views/pages/" . $route['page'] . ".php";
                die();
            }
        }

        self::notFoundPage();
    }

    private static function notFoundPage()
    {
        require_once "../views/errors/404.php";
        die();
    }
}

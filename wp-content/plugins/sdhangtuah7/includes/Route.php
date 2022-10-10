<?php

class Route
{
    private static $urlNamespace = 'perpustakaan';

    public static function post(string $routePath, $object, ?string $callbackFunction)
    {
        register_rest_route(self::$urlNamespace, '/' . $routePath, array(
            'methods' => 'POST',
            'callback' => array($object, $callbackFunction),
        ));
    }

    public static function get(string $routePath, $object, ?string $callbackFunction)
    {
        register_rest_route(self::$urlNamespace, '/' . $routePath, array(
            'methods' => 'GET',
            'callback' => array($object, $callbackFunction),
        ));
    }
}
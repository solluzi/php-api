<?php
namespace Controller;

use util\validation\DataValidate;

abstract class HandlerRequestMethods extends DataValidate
{
    public function __construct()
    {
        # code...
    }

    public function __clone()
    {
        // do nothing
    }

    public function get($key, $default = "")
    {
        if (!empty($_GET[$key])) {
            return $_GET[$key];
        }
        return $default;
    }

    public function post($key, $default = "")
    {
        if (!empty($_POST[$key])) {
            return $_POST[$key];
        }
        return $default;
    }

    public function server($key, $default = "")
    {
        if (!empty($_SERVER[$key])) {
            return $_SERVER[$key];
        }
        return $default;
    }
}

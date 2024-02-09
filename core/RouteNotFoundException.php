<?php

namespace Core;

class RouteNotFoundException extends \Exception
{
    public function __construct()
    {
        require_once './app/Error/404.php';
    }
}

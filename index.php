<?php
session_start();
require_once "vendor/autoload.php";
require_once "bootstrap.php";
require_once "app/Core/AppServiceProvider.php";

use App\routes;

$routes = new routes();

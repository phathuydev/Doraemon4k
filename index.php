<?php
session_start();
require_once "vendor/autoload.php";
require_once "bootstrap.php";

use App\routes;

$routes = new routes();

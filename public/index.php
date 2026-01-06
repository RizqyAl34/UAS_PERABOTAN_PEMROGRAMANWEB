<?php
session_start();

define('BASE_URL', '/perabot/public');

require_once '../app/core/Database.php';
require_once '../app/core/Controller.php';
require_once '../app/core/Auth.php';

$url = $_GET['url'] ?? 'auth/login';
$url = explode('/', trim($url, '/'));

$controllerName = ucfirst($url[0]) . 'Controller';
$method = $url[1] ?? 'login';

$controllerFile = "../app/controllers/$controllerName.php";

if (!file_exists($controllerFile)) {
    die("Controller $controllerName tidak ditemukan");
}

require_once $controllerFile;
$controller = new $controllerName;

$params = array_slice($url, 2);

if (!method_exists($controller, $method)) {
    die("Method $method tidak ditemukan");
}

call_user_func_array([$controller, $method], $params);

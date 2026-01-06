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

// Ambil parameter dari URL (mulai dari index ke-2 dan seterusnya)
// Contoh: /order/proses/12 -> '12' adalah parameter
$params = array_slice($url, 2);

if (!method_exists($controller, $method)) {
    die("Method $method tidak ditemukan");
}

// Ganti call_user_func menjadi call_user_func_array
// Ini akan mengirimkan $params sebagai argumen ke fungsi controller
call_user_func_array([$controller, $method], $params);

<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\Dev\Core\Router;

try{
    $url = $_GET['url'] ?? trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    $router = new Router();
    $router->dispatch($url);
} catch (\Exception $e){
    // // $error = new HttpResponseError();
    // $error->notServer($e);
    echo 'erro';
}
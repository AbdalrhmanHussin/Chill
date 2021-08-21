<?php

use app\Http\Controller;
use app\View\View;
use web\Config\Route;
use web\DataBase\sqlManager;
use web\Error\error;
use web\src\Requests\Request;


require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../routes/web.php';
require __DIR__ . '/../web/helper.php';
require __DIR__ . '/../app/View/View.php';

Dotenv\Dotenv::createImmutable(__DIR__)->load();
$include = 'file include';

$sql = new sqlManager;

dd($sql->select(['id','name']));

$router = new Route(new Request);
$router->resolve(new error);



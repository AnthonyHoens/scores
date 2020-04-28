<?php
session_start();

require ('vendor/autoload.php');

require('./configs/config.php');

$route = require ('./utils/router.php');

$controllerName = 'Controllers\\'.$route['controller'];

$controller = new $controllerName();


$data = call_user_func([$controller,$route['callback']]);

extract($data, EXTR_OVERWRITE);

require($view);

$_SESSION['errors'] = [];
$_SESSION['old'] = [];
<?php
define('DB_PATH', $_SERVER['DOCUMENT_ROOT'].'/data/scores.sqlite');
define('TODAY', \Carbon\Carbon::now('Europe/Brussels')
    ->locale('fr_BE')
    ->isoformat('dd DD MMMM YYYY'));

$data = [];
$view = './views/view.php';
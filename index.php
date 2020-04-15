<?php

use function Controllers\Match\store as storeMatch;
use function Controllers\Team\store as storeTeam;

require ('vendor/autoload.php');

require('./configs/config.php');
require('./utils/dbaccess.php');
require('./utils/standings.php');

require('./models/team.php');
require('./models/match.php');
require('controllers/match.php');
require('controllers/team.php');
require('controllers/page.php');


$pdo = getConnection();

$data : [];

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && isset($_POST['resource'])) {
        if ($_POST['action'] === 'store' && $_POST['resource'] === 'match') {
            storeMatch($pdo);
        } elseif ($_POST['action'] === 'store' && $_POST['resource'] === 'team') {
            storeTeam($pdo);
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(!isset($_GET['action']) && !isset($_GET['resource'])) {
    $data = dashboard($pdo);
    }
} else {
    header('Location: index.php');
    exit();
}

require('vue.php');

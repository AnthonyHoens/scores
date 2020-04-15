<?php
namespace Controllers\Team;

use function Models\Team\save;

require('./models/team.php');

function store(\PDO $pdo)
{
    $name = $_POST['name'];
    $slug = $_POST['slug'];

    save($pdo, compact('name', 'slug'));

    header('Location: index.php');
    exit();
}

function create()
{
    $view = './views/team/create.php';
    return compact('view');
}

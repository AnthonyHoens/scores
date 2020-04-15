<?php

namespace Controllers\Team;

use function Models\Team\save as saveTeam;

function store(\PDO $pdo)
{
    $name = $_POST['name'];
    $slug = $_POST['slug'];

    saveTeam($pdo, compact('name', 'slug'));

    header('Location: index.php');
    exit();
}

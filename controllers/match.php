<?php
namespace Controllers\Match;

use function Models\Match\save;

require('./models/match.php');

function store(\PDO $pdo)
{
    $matchDate = $_POST['match-date'];
    $homeTeam = $_POST['home-team'];
    $awayTeam = $_POST['away-team'];
    $homeTeamGoals = $_POST['home-team-goals'];
    $awayTeamGoals = $_POST['away-team-goals'];

    $match = [
        'date' => $matchDate,
        'home-team' => $homeTeam,
        'home-team-goals' => $homeTeamGoals,
        'away-team-goals' => $awayTeamGoals,
        'away-team' => $awayTeam
    ];

    save($pdo, $match);
    header('Location: index.php');
    exit();
}

function create() {
    $view = './views/match/create.php';
    return compact('view');
}
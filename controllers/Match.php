<?php
namespace Controllers;

use Models\Team;

class Match
{
    function store()
    {
        $matchModel = new \Models\Match();
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

        $matchModel->save($match);
        header('Location: index.php');
        exit();
    }

    function create(): array
    {
        $teamModel = new Team();
        $teams = $teamModel->all();
        $view = './views/match/create.php';
        return compact('view', 'teams');
    }
}



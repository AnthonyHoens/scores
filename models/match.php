<?php
namespace Match;

function all(\PDO $connection): array
{
    $matches =
    $matchesRequest = 'SELECT * FROM matches ORDER BY date';
    $pdoSt = $connection->query($matchesRequest);

    return $pdoSt->fetchAll();
}

function find(\PDO $connection, string $id): \stdClass
{
    $matchRequest = 'SELECT * FROM matches WHERE id = :id';
    $pdoSt = $connection->prepare($matchRequest);
    $pdoSt->execute([':id' => $id]);

    return $pdoSt->fetch();
}

function allWithTeams(\PDO $connection): array
{
    $matchesInfoRequest = 'SELECT  * FROM matches JOIN participations p on matches.id = p.match_id JOIN teams t on p.team_id = t.id ORDER BY matches.id, is_home;';
    $pdoSt = $connection->query($matchesInfoRequest);

    return $pdoSt->fetchAll();
}

function allWithTeamsGrouped(array $allWithTeams): array
{
    $matchesWithTeams = [];
    $m = null;
    foreach ($allWithTeams as $match) {
        if(!$match->is_home) {
            $m = new \stdClass();
            $d = new \DateTime();
            $d->setTimestamp((int)$match->date / 1000);
            $m->match_date = $d;
            $m->away_team = $match->name;
            $m->away_team_goals = $match->goals;

        } else {
            $m->home_team = $match->name;
            $m->home_team_goals = $match->goals;
            $matchesWithTeams[] = $m;
        }
    }

    return $matchesWithTeams;
}
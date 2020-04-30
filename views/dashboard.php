<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Premier League 2020</title>
</head>
<body>
<div>
    <a href="index.php">Premier League 2020</a>
</div>
<?php if(isset($_SESSION['user'])): ?>
    <?php include('./views/partials/navigation.php'); ?>
<?php else: ?>
<?php include('./views/partials/admin-links.php')?>
<?php endif; ?>
<?php if(count($standings)): ?>
<h1>
    Classement du championnat
</h1>
<div>
    <table>
        <thead>
        <tr>
            <td></td>
            <th scope="col">Team</th>
            <th scope="col">Games</th>
            <th scope="col">Points</th>
            <th scope="col">Wins</th>
            <th scope="col">Losses</th>
            <th scope="col">Draws</th>
            <th scope="col">GF</th>
            <th scope="col">GA</th>
            <th scope="col">GD</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1; ?>
        <?php foreach ($standings as $team => $teamStats): ?>
            <tr>
                <td><?= $i++; ?></td>
                <th scope="row"><?= $team ?></th>
                <td><?= $teamStats['games']; ?></td>
                <td><?= $teamStats['points']; ?></td>
                <td><?= $teamStats['wins']; ?></td>
                <td><?= $teamStats['losses']; ?></td>
                <td><?= $teamStats['draws']; ?></td>
                <td><?= $teamStats['GF']; ?></td>
                <td><?= $teamStats['GA']; ?></td>
                <td><?= $teamStats['GD']; ?></td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
</div>
<?php endif; ?>
<section>
    <h2>Matchs joués au <?= TODAY ?></h2>
    <?php if(count($matches)): ?>
    <table>
        <thead>
        <tr>
            <th>Date</th>
            <th>Équipe visitée</th>
            <th>Goals de l'équipe visitée</th>
            <th>Goals de l'équipe visiteuse</th>
            <th>Équipe visiteuse</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($matches as $match): ?>
            <tr>
                <td><?= ($match->match_date)->format('M l jS, Y') ?></td>
                <td><?= $match->home_team ?></td>
                <td><?= $match->home_team_goals ?></td>
                <td><?= $match->away_team_goals ?></td>
                <td><?= $match->away_team ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
    <p>Aucun match n'a été joué à ce jour</p>
    <?php endif; ?>
</section>
</body>
</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <a href="index.php">Premier League 2020</a>
    </div>
    <h1>Création d'une équipe</h1>
    <form action="index.php" method="post">
        <div>
            <label for="name">Entrez le nom de l'équipe</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="slug">Entrez un slug(3 lettres, ni plus, ni moins)</label>
            <input type="text" id="slug" name="slug" required>
        </div>

        <input type="hidden" name="action" value="store">
        <input type="hidden" name="resource" value="team">
        <input type="submit" value="Enregistrer cette équipe">
    </form>
</body>
</html>
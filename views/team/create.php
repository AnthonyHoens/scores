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
            <input type="text" id="name" name="name" value="<?= isset($_SESSION['old'])?$_SESSION['old']['name']:'' ?>">
        </div>
        <?php if(isset($_SESSION['errors']['name'])): ?>
            <div>
                <p><?= $_SESSION['errors']['name'] ?></p>
            </div>
        <?php endif; ?>
        <div>
            <label for="slug">Entrez un slug(3 lettres, ni plus, ni moins)</label>
            <input type="text" id="slug" name="slug" value="<?= isset($_SESSION['old'])?$_SESSION['old']['slug']:'' ?>">
        </div>
        <?php if(isset($_SESSION['errors']['slug'])): ?>
            <div>
                <p><?= $_SESSION['errors']['slug'] ?></p>
            </div>
        <?php endif; ?>

        <input type="hidden" name="action" value="store">
        <input type="hidden" name="resource" value="team">
        <input type="submit" value="Enregistrer cette équipe">
    </form>
</body>
</html>
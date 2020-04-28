<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connection à l'administration</title>
</head>
<body>
    <div>
        <a href="index.php">Premier League 2020</a>
    </div>
    <h1>Connection à l'administration</h1>
    <form action="index.php" method="post">
        <div>
            <label for="email">Entrez votre e-mail</label>
            <input type="text" id="email" name="email" value="<?= isset($_SESSION['old'])?$_SESSION['old']['email']:'' ?>">
        </div>
        <?php if(isset($_SESSION['errors']['email'])): ?>
            <div>
                <p><?= $_SESSION['errors']['email'] ?></p>
            </div>
        <?php endif; ?>
        <div>
            <label for="password">Entrez votre mot de passe (au moins 8 lettres et 1 majuscule et 1 chiffre)</label>
            <input type="text" id="password" name="slug" value="<?= isset($_SESSION['old'])?$_SESSION['old']['password']:'' ?>">
        </div>
        <?php if(isset($_SESSION['errors']['password'])): ?>
            <div>
                <p><?= $_SESSION['errors']['password'] ?></p>
            </div>
        <?php endif; ?>

        <input type="hidden" name="action" value="check">
        <input type="hidden" name="resource" value="login">
        <input type="submit" value="M'identifier">
    </form>
</body>
</html>
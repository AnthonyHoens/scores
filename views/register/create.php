<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Création du compte d'administration</title>
</head>
    <body>
    <div>
        <a href="index.php">Premier League 2020</a>
    </div>
    <h1>Création du compte d'administration</h1>
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
        <label for="name">Entrez votre nom</label>
        <input type="text" id="name" name="name" value="<?= isset($_SESSION['old'])?$_SESSION['old']['email']:'' ?>">
        </div>
        <?php if(isset($_SESSION['errors']['name'])): ?>
            <div>
                <p><?= $_SESSION['errors']['name'] ?></p>
            </div>
        <?php endif; ?>
        <div>
            <label for="password">Créez un mot de passe (au moins 8 lettres et 1 majuscule et 1 chiffre)</label>
            <input type="password" id="password" name="password" value="<?= isset($_SESSION['old'])?$_SESSION['old']['password']:'' ?>">
        </div>
        <?php if(isset($_SESSION['errors']['password'])): ?>
            <div>
                <p><?= $_SESSION['errors']['password'] ?></p>
            </div>
        <?php endif; ?>
        <div>
            <label for="confirm_password">Répétez votre mot de passe</label>
            <input type="password" id="confirm_password" name="confirm_password" value="<?= isset($_SESSION['old'])?$_SESSION['old']['confirm_password']:'' ?>">
        </div>
        <?php if(isset($_SESSION['errors']['confirm_password'])): ?>
            <div>
                <p><?= $_SESSION['errors']['confirm_password'] ?></p>
            </div>
        <?php endif; ?>

        <input type="hidden" name="action" value="store">
        <input type="hidden" name="resource" value="user">
        <input type="submit" value="M'enregistrer">
    </form>
</body>
</html>

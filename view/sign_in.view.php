<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../view/design/style.css">
        <link rel="icon" href="../view/design/images/favicon.png">
        <title>EF - Créer un compte</title>
    </head>
    <body>
        <?php include("menu.view.php") ?>

        <form class="login" action="sign_in.ctrl.php" method="post">
            <legend>Créer un compte</legend>
            <span class="error"><?= $error ?></span>
            <div class="form_item">
                <label for="id">Identifiant</label>
                <input id="id" type="text" name="id" required>
            </div>
            <div class="form_item">
                <label for="pw">Mot de passe</label>
                <input id="pw" type="password" name="pw" required>
            </div>
            <div class="form_item">
                <label for="pwc">Confirmer le mot de passe</label>
                <input id="pwc" type="password" name="pwc" required>
            </div>
            <input type="submit" name="submit" value="Valider">
        </form>

        <?php include("footer.view.php") ?>
    </body>
</html>

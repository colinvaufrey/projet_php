<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../view/design/style.css">
        <link rel="icon" href="../view/design/images/favicon.png">
        <title>EF - Se connecter</title>
    </head>
    <body>
        <?php include("menu.view.php") ?>

        <form class="login" action="login.ctrl.php" method="post">
            <legend>Se connecter</legend>
            <span class="error"><?= $error ?></span>
            <div class="form_item">
                <label for="id">Identifiant</label>
                <input id="id" type="text" name="id">
            </div>
            <div class="form_item">
                <label for="pw">Mot de passe</label>
                <input id="pw" type="password" name="pw">
            </div>
            <input type="submit" name="submit" value="Valider">

            <p>Vous n'avez pas encore de compte ? <a href="../controler/sign_in.ctrl.php">En créer un</a></p>
        </form>

        <?php include("footer.view.php") ?>
    </body>
</html>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./design/style.css">
        <title>EF - Se connecter</title>
    </head>
    <body>
        <?php include("menu.view.php") ?>

        <article class="main">
            <section>
                <form class="login" action="login.ctrl.php" method="post">
                    <legend>Se connecter</legend>
                    <div class="form_item">
                        <label for="id">Identifiant</label>
                        <input id="id" type="text" name="id">
                    </div>
                    <div class="form_item">
                        <label for="pw">Mot de passe</label>
                        <input id="pw" type="password" name="pw">
                    </div>
                    <input type="submit" name="submit" value="Valider">
                </form>
            </section
        </article>
    </body>
</html>

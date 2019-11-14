<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../view/design/style.css">
        <link rel="icon" href="../view/design/images/favicon.png">
        <title>ÊtreFruits</title>
    </head>
    <body>
        <?php include("menu.view.php");
        if(isset($_GET[paiement])){
            echo "<article>Merci de votre achat ! Au plaisir de vous revoir bientôt au pays des fruits !</article>";
        } ?>

        <article class="main">
            <section>
                <h2>Etre Fruits, ça donne la pêche !</h2>
                <h3>Vous aussi, ayez la banane !</h3>
                <h4>Venez vous fendre la poire !</h4>
                <h5>Ici, personne ne vous casse les noisettes !</h5>
            </section>
        </article>

        <?php include("footer.view.php") ?>
    </body>
</html>

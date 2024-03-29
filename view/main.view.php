<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../view/design/style.css">
        <link rel="icon" href="../view/design/images/favicon.png">
        <title>ÊtreFruits</title>
    </head>
    <body>
        <?php include("menu.view.php");?>

        <?php
        // Ne s'affiche que si l'utilisateur vient de cliquer sur Vaider et Payer dans le panier (ou s'il s'amuse avec les URL !)
        if ($paid) {
        ?>
        <article class="paid">
            <p>Merci de votre achat, au plaisir de vous revoir bientôt au pays des fruits !</p>
        </article>
        <?php
        }
        ?>

        <article class="main">
            <h2>Être Fruits, ça donne la pêche !</h2>
            <section>
                <h3>Vous aussi, ayez la banane !</h3>
                <h4>Venez vous fendre la poire !</h4>
                <h5>Ici, personne ne vous casse les noisettes !</h5>
            </section>
            <h2>Voici quelques-uns de nos produits phares</h2>
            <section class="listeArticles">
                <?php foreach ($produits as $prod): ?>
                    <a href="../controler/product.ctrl.php?ref=<?= $prod->ref ?>">
                        <div class="produit">
                            <p> <?= $prod->title ?> </p>
                            <div class="imgcontainer">
                                <img src="<?= $prod->img ?>" alt="Image de <?= $prod->title ?>">
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </section>
        </article>

        <?php include("footer.view.php") ?>
    </body>
</html>

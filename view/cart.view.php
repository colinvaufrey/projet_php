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
        if (!$products){
            echo "<article>Une erreur est survenue, veuillez retourner sur la page principale et réessayer</article>";
        } else {
        ?>
        <article class="Panier">
            <!--
            public $username;
            public $reProduct;
            public $quantity;
            -->
            <?php
                for($i = 0; $i < count($products); $i++) {
                    $quantity = $quantities[$i];
                    $p = $products[$i];
            ?>

            <section>
                <!-- Image, Nom, Quantité, Prix -->
                <img src="<?= $p->img ?>" alt="Image de <?= $p->title ?>">
                <h2><?= $p->title ?></h2>
                <p>Quantité choisie : <?= $quantity ?></p>
                <h3><?= $p->prix ?>€</h3>
            </section>
            <?php } ?>

        </article>

        <?php
            if (count($products) == 0) {
                echo "<article>Votre panier est actuellement vide, si c'est une erreur, veuillez réessayer de le remplir</article>";
            }
        ?>

        <?php } include("footer.view.php") ?>
    </body>
</html>

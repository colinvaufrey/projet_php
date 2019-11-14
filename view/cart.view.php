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
                <input id="<?= $p->ref ?>_quant" type="number" min="1" max="<?= $p->stock ?>" value="<?= $quantity ?>" onchange="updateLink(<?= $p->ref ?>, this.value)">
                <a id="<?= $p->ref ?>_updateCartLink">Modifier la quantité</a>
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

        <script type="text/javascript">

            function updateLink(ref, quantity) {
                let linkToEdit = document.getElementById(ref + "_addCartLink");
                let newURL = "../controler/add_to_cart.ctrl.php?ref=" + ref + "&quantity=" + quantity;
                linkToEdit.href = newURL;
            }
        </script>
    </body>
</html>

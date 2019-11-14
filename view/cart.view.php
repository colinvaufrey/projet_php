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
                <h3><?= number_format($p->prix * $quantity, 2) ?>€</h3>
                <form class="updateForm" action="../controler/add_to_cart.ctrl.php" method="get">
                    <input type="hidden" name="ref" value="<?= $p->ref ?>">
                    <input type="hidden" name="force_update" value="true">
                    <input type="number" name="quantity" min="0" max="<?= $p->stock ?>" value="<?= $quantity ?>">
                    <input type="submit" name="submit" value="Modifier la quantité">
                </form>
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
                let linkToEdit = document.getElementById(ref + "_updateCartLink");
                let newURL = "../controler/add_to_cart.ctrl.php?force_update=true&ref=" + ref + "&quantity=" + quantity;
                linkToEdit.href = newURL;
            }
        </script>
    </body>
</html>

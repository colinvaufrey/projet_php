<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../view/design/style.css">
        <link rel="icon" href="../view/design/images/favicon.png">
        <title>EF - Mon panier</title>
    </head>
    <body>
        <?php
            include("menu.view.php");

            if (!$products){
                echo "<article>Votre panier est vide, revenez quand vous aurez choisi vos délicieux mets !</article>";
            } else {
        ?>

            <article class="panier">
                <h2>Votre panier</h2>
                <?php
                    $total = 0;
                    // On affiche tous les produits dans le panier
                    for($i = 0; $i < count($products); $i++) {
                        $quantity = $quantities[$i];
                        $p = $products[$i];
                        $total += ($p->prix * $quantity);
                ?>

                    <section>
                        <!-- Image, Nom, Quantité, Prix -->
                        <img src="<?= $p->img ?>" alt="Image de <?= $p->title ?>">
                        <div class="infosProd">
                            <h2><?= $p->title ?></h2>
                            <p>Quantité choisie : <?= $quantity ?></p>
                            <h3><?= number_format($p->prix * $quantity, 2) ?>€</h3>
                        </div>
                        <form class="updateForm" action="../controler/add_to_cart.ctrl.php" method="post">
                            <input type="hidden" name="ref" value="<?= $p->ref ?>">
                            <input type="hidden" name="force_update" value="true">
                            <label for="quant">Quantité</label>
                            <input id="quant" type="number" name="quantity" min="0" max="<?= $p->stock ?>" value="<?= $quantity ?>">
                            <input type="submit" name="submit" value="Modifier la quantité">
                        </form>
                    </section>
                <?php } ?>

                <section>
                    <p class="prixTotal">Total des prix : <?= number_format($total, 2)?> €</p>
                    <form class="" action="../controler/empty_cart.ctrl.php" method="post">
                        <input type="submit" name="submit" value="Valider et payer">
                    </form>
                </section>

            </article>

        <?php
            }

            include("footer.view.php")
        ?>
    </body>
</html>

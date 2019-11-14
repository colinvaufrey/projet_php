<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../view/design/style.css">
        <link rel="icon" href="../view/design/images/favicon.png">
        <title>ÊtreFruits</title>
    </head>
    <body>
        <?php
        include("menu.view.php");

        if ($produit == "erreur") {
            echo "<article>Une erreur est survenue, veuillez retourner sur la page principale et réessayer</article>";
        } else {
        ?>
        <article class="produitArticle">
            <section class="image">
                <img src="<?= $produit->img ?>" alt="Image de <?= $produit->title ?>">
            </section>
            <section class="desc">
                <h2><?= $produit->title ?></h2>
                <p><?= $produit->description ?></p>
                <p>
                Couleur : <?= $produit->color ?><br>
                Origine : <?= $produit->origin ?><br>
                Stock : <?= $produit->stock ?><br>
                </p>
            </section>
            <section class="prixEtBouton">
                <?php
                    if ($itemInCart) {
                        echo "<p>Vous en avez $itemInCart->quantity dans votre panier</p>";
                    }

                ?>
                <h3><?= number_format($produit->prix, 2) ?>€</h3>
                <?php
                    if (!$isLogged) {
                        echo "Vous devez être connecté pour ajouter des produits à votre panier.";
                    } elseif ($produit->stock == 0) {
                        echo "Impossible d'ajouter ce produit au panier, à court de stock.";
                    } elseif ($itemInCart && ($itemInCart->quantity == $produit->stock)) {
                        echo "Impossible d'ajouter ce produit au panier, tout le stock restant est déjà dans votre panier.";
                    } else {
                ?>
                <form class="addCart" action="../controler/add_to_cart.ctrl.php" method="post">
                    <input type="hidden" name="ref" value="<?= $produit->ref ?>">
                    <input type="number" min="1" max="<?= $itemInCart ? $produit->stock - $itemInCart->quantity : $produit->stock ?>" name="quantity" value="<?= ($produit->stock == 0) ? 0 : 1 ?>">
                    <input type="submit" name="submit" value="Ajouter au panier">
                </form>
                <?php
                    }
                ?>
            </section>
        </article>

        <?php } include("footer.view.php") ?>
    </body>
</html>

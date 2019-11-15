<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../view/design/style.css">
        <link rel="icon" href="../view/design/images/favicon.png">
        <title>EF - Trier les produits</title>
    </head>
    <body>
        <?php include("menu.view.php") ?>

        <article class="main">
            <h2>Trier les résultats par couleur ou origine</h2>
            <div class="sorterContainer">
                <form class="origin" action="../controler/sort.ctrl.php" method="get">
                    <select class="listeDer" name="origin">
                        <option value="France">France</option>
                        <option value="Espagne">Espagne</option>
                        <option value="Tchernobyl">Tchernobyl</option>
                    </select>
                    <input type="submit" name="submit" value="Trier par origine">
                </form>
                <form class="color" action="../controler/sort.ctrl.php" method="get">
                    <select class="listeDer" name="color">
                        <option value="Rouge">Rouge</option>
                        <option value="Orange">Orange</option>
                        <option value="Jaune">Jaune</option>
                    </select>
                    <input type="submit" name="submit" value="Trier par couleur">
                </form>
            </div>
            <!-- On affiche tous les articles correspondant à la requête (tous ceux en stock si non spécifié) -->
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

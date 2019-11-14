<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../view/design/style.css">
        <link rel="icon" href="../view/design/images/favicon.png">
        <title>EF - Catalogue</title>
    </head>
    <body>
        <?php include("menu.view.php") ?>

        <article class="main">
            <section class="listeArticles">
                <!-- Affichage de tous les produits -->
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

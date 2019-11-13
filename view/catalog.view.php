<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../view/design/style.css">
        <link rel="icon" href="../view/design/images/favicon.png">
        <title>ÊtreFruits</title>
    </head>
    <body>
        <?php include("menu.view.php") ?>

        <article class="main">
            <section class="listeArticles">
                <?php foreach ($produits as $prod): ?>
<<<<<<< HEAD
                    <a href="product.ctrl.php?ref=<?= $prod->ref ?>">
=======
                    <a href="../controler/product.ctrl.php?ref=<?= $prod->ref ?>">
>>>>>>> 3c676812e80d66db122a16c0f5fcbad267098ef0
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

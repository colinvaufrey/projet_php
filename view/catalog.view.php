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
                    <a href="#">
                        <div class="produit">
                            <p> <?= $prod->title ?> </p>
                            <img src="<?= $prod->img ?>" alt="Image de <?= $prod->title ?>">
                        </div>
                    </a>
                <?php endforeach; ?>
            </section>
        </article>

        <?php include("footer.view.php") ?>
    </body>
</html>

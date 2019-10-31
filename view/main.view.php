<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="design/style.css">
        <link rel="icon" href="design/images/favicon.png">
        <title>ÊtreFruits</title>
    </head>
    <body>
        <?php include("menu.view.php") ?>

        <article class="main">
            <section>
                <?php foreach ($produits as $prod): ?>
                    <div class="produit">
                        <p> <?= $prod->title ?> </p>
                    </div>
                <?php endforeach; ?>
            </section>
        </article>

        <?php include("footer.view.php") ?>
    </body>
</html>

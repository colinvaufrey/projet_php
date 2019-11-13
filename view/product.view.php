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
        if($produit == "erreur"){
            echo "<p>Une erreur est survenue, veuillez retourner sur la page principale et réessayer</p>";
        } else {
        ?>
        <article class="main">
            <section>
                <article class="image">
                    <img src="<?= $produit->img ?>" alt="Image de <?= $produit->title ?>">
                </article>
                <article class="titre, description, caractéristiques">
                    <h2><?= $produit->title ?></h2>
                    <p><?= $produit->description ?></p>
                    <p>
                    Couleur : <?= $produit->color ?><br>
                    Origine : <?= $produit->origin ?><br>
                    Stock : <?= $produit->stock ?><br>
                    </p>
                </article>
                <article class="prix et bouton"><h3>
                    <?= $produit->prix ?>€</h3>
                    <a href="">Ajouter au Panier</a>
                </article>
            </section>
        </article>

        <?php } include("footer.view.php") ?>
    </body>
</html>

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
            echo "<article>Une erreur est survenue, veuillez retourner sur la page principale et réessayer</article>";
        } else {
        ?>
        <article class="produitArticle">
            <section>
                <article class="image">
                    <img src="<?= $produit->img ?>" alt="Image de <?= $produit->title ?>">
                </article>
                <article class="titreDescriptionCaractéristiques">
                    <h2><?= $produit->title ?></h2>
                    <p><?= $produit->decription ?></p>
                    <p>
                    Couleur : <?= $produit->color ?><br>
                    Origine : <?= $produit->origin ?><br>
                    Stock : <?= $produit->stock ?><br>
                    </p>
                </article>
                <article class="prixEtBouton"><h3>
                    <?= $produit->prix ?>€</h3>
                    <a href="">Ajouter au Panier</a>
                </article>
            </section>
        </article>

        <?php } include("footer.view.php") ?>
    </body>
</html>

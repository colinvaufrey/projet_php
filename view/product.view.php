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
                    <p><?= $produit->description ?></p>
                    <p>
                    Couleur : <?= $produit->color ?><br>
                    Origine : <?= $produit->origin ?><br>
                    Stock : <?= $produit->stock ?><br>
                    </p>
                </article>
                <article class="prixEtBouton">
                    <h3><?= $produit->prix ?>€</h3>
                    <input id="quant" type="number" min="1" max="<?= $produit->stock ?>" name="quanity" value="1" onchange="updateLink(this.value)">
                    <a id="addCartLink" href="../controler/add_to_cart.ctrl.php?ref=<?= $produit->ref ?>&quantity=1">Ajouter au Panier</a>
                </article>
            </section>
        </article>

        <?php } include("footer.view.php") ?>

        <script type="text/javascript">
            var ref = <?= $produit->ref ?>

            updateLink(document.getElementById("quant").value);

            function updateLink(quantity) {
                let linkToEdit = document.getElementById("addCartLink");
                let newURL = "../controler/add_to_cart.ctrl.php?ref=" + ref + "&quantity=" + quantity;
                linkToEdit.href = newURL;
            }
        </script>
    </body>
</html>

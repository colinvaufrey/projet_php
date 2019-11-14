<?php
    include_once("../model/CartItem.class.php");
    include_once("../model/Users.class.php");
    include_once("../model/UsersDAO.class.php");
    include_once("../model/ProductsDAO.class.php");
    include_once("../model/Products.class.php");

    session_start();

    $dao = new UsersDAO();

    // Si l'utilisateur est bien connecté
    if (isset($_SESSION["user"])) {
        // On vide son panier et on recharge sa session pour voir les modifs
        $dao->removeAllUserCartItem($_SESSION["user"]->getUsername());
        $_SESSION["user"] = $dao->get($_SESSION["user"]->getUsername());
    }

    // On le renvoie sur main avec un message pour confirmer le paiement
    header("Location: ../controler/main.ctrl.php?paid=true");
?>

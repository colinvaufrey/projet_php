<?php
    include_once("../model/CartItem.class.php");
    include_once("../model/Users.class.php");
    include_once("../model/UsersDAO.class.php");
    include_once("../model/ProductsDAO.class.php");
    include_once("../model/Products.class.php");

    session_start();

    $dao = new UsersDAO();
    $pDao = new ProductsDAO();

    // On teste si les paramètres nécessaires sont bien passés en paramètres
    if (isset($_POST["ref"]) && isset($_POST["quantity"]) && isset($_SESSION["user"])) {
        // On vérifie que l'objet de référence ref existe bien et on le récupère
        $prod = $pDao->get($_POST["ref"]);

        if ($prod && $_POST["quantity"] >= 0) {
            // Si force_update est défini, on sait qu'on n'ajoutera pas une quantité
            // de produits au panier mais qu'on remplacera totalement cette quantité
            if (isset($_POST["force_update"])) {
                $forceUpdate = $_POST["force_update"];
            } else {
                $forceUpdate = false;
            }

            $itemInCart = $dao->getCartItem($_POST["ref"], $_SESSION["user"]->getUsername());
            if ($forceUpdate) {
                if ($_POST["quantity"] == 0) {
                    // On supprime le produit du panier si la quantité est mise à 0
                    $dao->removeCartItem($_POST["ref"], $_SESSION["user"]->getUsername());
                } elseif ($_POST["quantity"] <= $prod->stock) {
                    // Autrement on remplace la quantité
                    $dao->updateCartItemQuantity($_POST["ref"], $_SESSION["user"]->getUsername(), $_POST["quantity"]);
                }
            } elseif ($itemInCart) {
                // Si l'objet est déjà dans le panier et que la quantité est
                // valide par rapport aux stocks on ajoute juste la quantité à celle du panier
                if ($itemInCart->quantity + $_POST["quantity"] <= $prod->stock) {
                    $dao->updateCartItemQuantity($_POST["ref"], $_SESSION["user"]->getUsername(), $itemInCart->quantity + $_POST["quantity"]);
                }
            } elseif ($_POST["quantity"] != 0) {
                // Si l'objet n'est pas déjà dans le panier on l'ajoute directement
                // avec la quantité spécifiée
                if ($_POST["quantity"] <= $prod->stock) {
                    $dao->addCartItem($_POST["ref"], $_SESSION["user"]->getUsername(), $_POST["quantity"]);
                }
            }
            // On recharge la session pour recharger myCart dans Users
            $_SESSION["user"] = $dao->get($_SESSION["user"]->getUsername());
        }
    }

    // On redirige sur la page panier
    header("Location: ../controler/cart.ctrl.php");
?>

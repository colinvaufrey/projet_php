<?php
    include_once("../model/CartItem.class.php");
    include_once("../model/Users.class.php");
    include_once("../model/UsersDAO.class.php");

    session_start();

    $dao = new UsersDAO();

    if (isset($_GET["ref"]) && isset($_GET["quantity"]) && isset($_SESSION["user"])) {
        $dao->addCartItem($_GET["ref"], $_SESSION["user"]->getUsername(), $_GET["quantity"]);
    }

    header("Location: ../controler/cart.ctrl.php");
?>

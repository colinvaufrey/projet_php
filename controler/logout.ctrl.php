<?php
    include_once("../framework/View.class.php");
    include_once("../model/Users.class.php");

    session_start();

    // On vide les paramètres de session pour déconnecter l'utilisateur
    session_unset();

    // On renvoie l'utilisateur sur la page main
    header("Location: ../controler/main.ctrl.php");
?>

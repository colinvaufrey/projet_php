<?php
    // Inclusion du framework
    include_once("../framework/View.class.php");

    include_once("../model/Users.class.php");

    session_start();

    session_unset();

    header("Location: ../controler/main.ctrl.php");
?>

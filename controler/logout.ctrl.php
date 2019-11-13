<?php
    // Inclusion du framework
    include_once("../framework/View.class.php");

    include_once("../model/Users.class.php");

    session_start();

    session_unset();

    ////////////////////////////////////////////////////////////////////////////
    // Construction de la vue
    ////////////////////////////////////////////////////////////////////////////

    $view = new View();
    $view->display("main.view.php");
?>

<?php
    // Inclusion du framework
    include_once("../framework/View.class.php");

    //session_start();

    //unset($_SESSION["user"]);

    //session_abort();

    ////////////////////////////////////////////////////////////////////////////
    // Construction de la vue
    ////////////////////////////////////////////////////////////////////////////

    $view = new View();
    $view->display("main.view.php");
?>

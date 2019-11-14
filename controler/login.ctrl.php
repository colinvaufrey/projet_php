<?php
    include_once("../framework/View.class.php");
    include_once("../model/CartItem.class.php");
    include_once("../model/Users.class.php");
    include_once("../model/UsersDAO.class.php");

    session_start();

    $dao = new UsersDAO();

    $isLogged = false;
    $error = "";

    // On teste si les paramètres sont bien passés
    if (isset($_POST['id']) && isset($_POST['pw'])) {
        $name = $_POST['id'];
        $pass = $_POST['pw'];

        // On cherche à savoir s'il existe bien un utilisateur de ce nom et on
        // le récupère si oui
        $account = $dao->get($name);
        // On teste si l'utilisateur existe
        if ($account) {
            // Si oui on vérifie la validité du MDP
            if (password_verify($pass, $account->getPassword())) {
                // On connecte l'utilisateur
                $_SESSION["user"] = $account;
                $isLogged = true;
            } else {
                // L'utilisateur existe mais le MDP n'est pas bon
                $error = "Le mot de passe ne correspond pas à l'identifiant";
            }
        } else {
            $error = "L'utilisateur n'existe pas";
        }
    }

    ////////////////////////////////////////////////////////////////////////////
    // Construction de la vue
    ////////////////////////////////////////////////////////////////////////////
    $view = new View();

    // Passe les paramètres à la vue
    $view->assign("error", $error);

    // Charge la vue
    if ($isLogged) {
        // Si l'utilisateur s'est bien connecté on l'envoie sur main
        header("Location: ../controler/main.ctrl.php");
    } else {
        // Si erreur il y a eu on renvoie l'utilisateur sur la même page, avec le message d'erreur
        $view->display("login.view.php");
    }
?>

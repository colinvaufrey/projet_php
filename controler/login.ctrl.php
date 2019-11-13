<?php
    // Partie principale

    // Inclusion du framework
    include_once("../framework/View.class.php");

    // Inclusion du modèle
    include_once("../model/CartItem.class.php");

    include_once("../model/Users.class.php");
    include_once("../model/UsersDAO.class.php");
    
    session_start();

    // Creation de l'unique objet DAO
    $dao = new UsersDAO();
    $isLogged = false;
    $error = "";

    if (isset($_POST['id']) && isset($_POST['pw'])) {
        $name = $_POST['id'];
        $pass = $_POST['pw'];

        $account = $dao->get($name);
        if ($account) {
            if (password_verify($pass, $account->getPassword())) {
                $_SESSION["user"] = $account;
                $isLogged = true;
            } else {
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
        header("Location: ../controler/main.ctrl.php");
    } else {
        $view->display("login.view.php");
    }
?>

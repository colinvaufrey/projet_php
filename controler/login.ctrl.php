<?php
    // Partie principale

    // Inclusion du framework
    include_once("../framework/View.class.php");

    // Inclusion du modèle
    include_once("../model/CartItem.class.php");

    include_once("../model/Users.class.php");
    include_once("../model/UsersDAO.class.php");

    // Creation de l'unique objet DAO
    $dao = new UsersDAO();

    $error = "";

    if (isset($_POST['id']) && isset($_POST['pw'])) {
        $name = $_POST['id'];
        $pass = $_POST['pw'];

        $account = $dao->get($name);
        if ($account) {
            if (password_verify($pass, $account->getPassword())) {
                session_start();
                $error = "Connexion réussie";
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
    $view->display("login.view.php");
?>

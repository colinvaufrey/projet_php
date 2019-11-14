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

    if (isset($_POST['id']) && isset($_POST['pw']) && isset($_POST['pwc'])) {
        $name = $_POST['id'];
        $pass = $_POST['pw'];
        $passConf = $_POST['pwc'];

        $account = $dao->get($name);
        if (!$account) {
            if ($pass == $passConf) {
                $user = new Users;
                $user->username = $name;
                $user->password = password_hash($pass, PASSWORD_BCRYPT);
                $dao->addUser($user->getUsername(), $user->getPassword());
                $_SESSION["user"] = $user;
                $isLogged = true;
            } else {
                $error = "Les deux mots de passe entrés étaient différents, veuillez réessayer";
            }
        } else {
            $error = "Le nom d'utilisateur entré existe déjà, veuillez réessayer avec un autre identifiant";
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
        $view->display("sign_in.view.php");
    }
?>

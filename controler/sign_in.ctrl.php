<?php
    include_once("../framework/View.class.php");
    include_once("../model/CartItem.class.php");
    include_once("../model/Users.class.php");
    include_once("../model/UsersDAO.class.php");

    session_start();

    $dao = new UsersDAO();

    $isLogged = false;
    $error = "";

    // Si tous les paramètres sont bien passés
    if (isset($_POST['id']) && isset($_POST['pw']) && isset($_POST['pwc'])) {
        $name = $_POST['id'];
        $pass = $_POST['pw'];
        $passConf = $_POST['pwc'];

        $account = $dao->get($name);

        // On teste tous les cas d'erreur
        if (!$account) {
            if (!(trim($name) == "")) {
                if ($pass == $passConf) {
                    // Connexion réussie, on crée le compte et on connecte l'utilisateur
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
                $error = "Le nom d'utilisateur entré n'est pas valide, entrez au moins un caractère visible";
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
        // Si on a bien créé le compte on est redirigé sur main
        header("Location: ../controler/main.ctrl.php");
    } else {
        // Si une erreur a été trouvée, on recharge la page avec l'erreur
        $view->display("sign_in.view.php");
    }
?>

<a href="../"><h1>ÊtreFruits</h1></a>
<div class="navbars">
    <?php
        $isLogged = false;

        // Si l'utilisateur est connecté
        if (isset($_SESSION["user"])) {
            $username = $_SESSION["user"]->getUsername();
            $isLogged = true;
        }
    ?>

    <nav>
        <ul>
            <a href="../"><li>Page Principale</li></a>
            <a href="../controler/catalog.ctrl.php"><li>Catalogue</li></a>
            <a href="../controler/sort.ctrl.php"><li>Par catégories</li></a>
        </ul>
    </nav>
    <nav>
        <ul>
            <?php
                // La barre de navigation varie en fonction de si l'on est connecté ou non
                if ($isLogged) {
                    echo '<a href="../controler/cart.ctrl.php" class="login"><li>Panier de '.$username.'</li></a>';
                    echo '<a href="../controler/logout.ctrl.php"><li>Se déconnecter</li></a>';
                } else {
                    echo '<a href="../controler/login.ctrl.php"><li>Se connecter</li></a>';
                }
            ?>
        </ul>
    </nav>
</div>

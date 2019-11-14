<a href="../"><h1>ÊtreFruits</h1></a>
<div class="navbars">
    <?php
        $isLogged = false;

        if (isset($_SESSION["user"])) {
            $username = $_SESSION["user"]->getUsername();
            $isLogged = true;
        }
    ?>
    <nav>
        <ul>
            <a href="../"><li>Page Principale</li></a>
            <a href="../controler/catalog.ctrl.php"><li>Catalogue</li></a>
        </ul>
    </nav>
    <nav>
        <ul>
            <?php
                if ($isLogged) {
                    echo '<a href="../controler/cart.ctrl.php" class="login"><li>'.$username.'<span> Mon panier</span></li></a>';
                    echo '<a href="../controler/logout.ctrl.php"><li>Se déconnecter</li></a>';
                } else {
                    echo '<a href="../controler/login.ctrl.php"><li>Se connecter</li></a>';
                }
            ?>
        </ul>
    </nav>
</div>

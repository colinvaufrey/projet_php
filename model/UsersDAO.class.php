<?php
    class UsersDAO {
        private $db;
        // Contructeur chargé d'ouvrir la base de données
        function __construct() {
            $database = 'sqlite:../data/db/database.db';
            try{
                $this->db = new PDO($database);
            }
            catch(\Exception $e) {
                echo $e . "\n";
                echo "erreur de connexion à la base de données \n";
            }
        }

        function get(string $username) {
            /* Exécute une requête préparée en en liant une variable PHP */
            $sql = 'SELECT * FROM Users WHERE username = ?'; // requête
            $sth = $this->db->prepare($sql); // début de la préparation
            $sth->bindParam(1, $username, PDO::PARAM_STR, 20); // sécurisation du paramètre attendu (ici une string de 20 caractères)
            $sth->execute(); // exécution
            $Users = $sth->fetchAll(PDO::FETCH_CLASS, "Users"); // fabriquation d'un objet de la classe Users (rendu sous forme de tableau)

            if (count($Users) != 0) {
                $User = $Users[0];

                //Récupération panier

                /* Exécute une requête préparée en en liant une variable PHP */
                $sql = 'SELECT * FROM CartItem WHERE username = ?'; // requête
                $sth = $this->db->prepare($sql); // début de la préparation
                $sth->bindParam(1, $username, PDO::PARAM_STR, 20); // sécurisation du paramètre attendu (ici une string de 20 caractères)
                $sth->execute(); // exécution
                $User->myCart = $sth->fetchAll(PDO::FETCH_CLASS, "CartItem"); // stockage dans User->myCart d'un tableau de CartItem (son panier)

                if (!$User->myCart) {
                    $User->myCart = array();
                }
            } else {
                $User = false;
            }

            return $User;
        }

        function addUser(string $username, string $password) {
            $sql = 'INSERT INTO Users(username, password) VALUES (?, ?)';
            $sth = $this->db->prepare($sql);
            $sth->bindParam(1, $username, PDO::PARAM_STR, 20);
            $sth->bindParam(2, $password, PDO::PARAM_STR, 20);
            $sth->execute();
        }

        function getCartItem(int $refProduct, string $username) {
            /* Exécute une requête préparée en en liant des variables PHP */
            $sql = 'SELECT * FROM CartItem WHERE username = ? AND refProduct = ?'; // requête
            $sth = $this->db->prepare($sql); // début de la préparation
            $sth->bindParam(1, $username, PDO::PARAM_STR, 20); // sécurisation du paramètre 1 attendu (ici une string de 20 caractères)
            $sth->bindParam(2, $refProduct, PDO::PARAM_INT); // sécurisation du paramètre 2 attendu (ici un int)
            $sth->execute(); // exécution
            $CartItem = $sth->fetchAll(PDO::FETCH_CLASS, "CartItem"); // retourne un élément de type CartItem (sous forme d'un tableau)

            if (count($CartItem) != 0) {
                $res = $CartItem[0];
            } else {
                $res = false;
            }

            return $res;
        }

        function addCartItem(int $refProduct, string $username, int $quantity) {
            if (!$this->getCartItem($refProduct, $username)) {
                /* Exécute une requête préparée en en liant des variables PHP */
                $sql = 'INSERT INTO CartItem (refProduct, username, quantity) VALUES (?, ?, ?)'; // requête
                $sth = $this->db->prepare($sql); // début de la préparation
                $sth->bindParam(1, $refProduct, PDO::PARAM_INT); // sécurisation du paramètre 1 attendu (ici un int)
                $sth->bindParam(2, $username, PDO::PARAM_STR, 20); // sécurisation du paramètre 2 attendu (ici une string de 20 caractères)
                $sth->bindParam(3, $quantity, PDO::PARAM_INT); // sécurisation du paramètre 2 attendu (ici une string de 20 caractères)
                $sth->execute();
            }
        }

        function updateCartItemQuantity(int $refProduct, string $username, int $quantity) {
            if ($this->getCartItem($refProduct, $username)) {
                /* Exécute une requête préparée en en liant des variables PHP */
                $sql = 'UPDATE CartItem SET quantity = ? WHERE username = ? AND refProduct = ?'; // requête (double ou simple quotes ?)
                $sth = $this->db->prepare($sql); // début de la préparation
                $sth->bindParam(1, $quantity, PDO::PARAM_INT);
                $sth->bindParam(2, $username, PDO::PARAM_STR, 20); // sécurisation du paramètre 1 attendu (ici une string de 20 caractères)
                $sth->bindParam(3, $refProduct, PDO::PARAM_INT); // sécurisation du paramètre 2 attendu (ici un int)
                $sth->execute(); // exécution
            }
        }

        function removeCartItem(int $refProduct, string $username) {
            if ($this->getCartItem($refProduct, $username)) {
                $sql = 'DELETE FROM CartItem WHERE username= ? AND refProduct = ?'; // requête (double ou simple quotes ?)
                $sth = $this->db->prepare($sql); // début de la préparation
                $sth->bindParam(1, $username, PDO::PARAM_STR, 20); // sécurisation du paramètre 1 attendu (ici une string de 20 caractères)
                $sth->bindParam(2, $refProduct, PDO::PARAM_INT); // sécurisation du paramètre 2 attendu (ici un int)
                $sth->execute(); // exécution
            }
        }

        function removeAllUserCartItem(string $username) {
            $sql = 'DELETE FROM CartItem WHERE username= ?'; // requête (double ou simple quotes ?)
            $sth = $this->db->prepare($sql); // début de la préparation
            $sth->bindParam(1, $username, PDO::PARAM_STR, 20); // sécurisation du paramètre 1 attendu (ici une string de 20 caractères)
            $sth->execute(); // exécution
        }
    }
?>

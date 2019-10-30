<?php
    class UsersDAO{
        private $db;
        // Contructeur chargé d'ouvrir la base de données
        function __construct(){
            $database = 'sqlite:../data/db/database.db';
            try{
                $this->db = new PDO($database);
            }
            catch(\Exception $e){
                echo $e . "\n";
                echo "erreur de connexion à la base de données \n";
            }
        }
        function get(string $username):Users{
            //prepare (puis execute) au lieu de query

            // A TESTER //
            /* Exécute une requête préparée en en liant une variable PHP */
            $sql = 'SELECT * FROM Users WHERE username = ?'; // requête
            $sth = $this->db->prepare($sql); // début de la préparation
            $sth->bindParam(1, $username, PDO::PARAM_STR, 20); // sécurisation du paramètre attendu (ici une string de 20 caractères)
            $sth->execute(); // exécution
            $Users = $sth->fetchAll(PDO::FETCH_CLASS,"Users"); // fabriquation d'un objet de la classe Users (rendu sous forme de tableau)
            //          //

            $User = $Users[0];

            //récupération panier
            //prepare (puis execute) au lieu de query

            // A TESTER //
            /* Exécute une requête préparée en en liant une variable PHP */
            $sql = 'SELECT * FROM CartItem WHERE username = ?'; // requête
            $sth = $this->db->prepare($sql); // début de la préparation
            $sth->bindParam(1, $username, PDO::PARAM_STR, 20); // sécurisation du paramètre attendu (ici une string de 20 caractères)
            $sth->execute(); // exécution
            $User->myCart = $sth->fetchAll(PDO::FETCH_CLASS,"CartItem"); // stockage dans User->myCart d'un tableau de CartItem (son panier)
            //          //

            return $User;
        }
        function getCartItem(int $refProduct, string $username):CartItem{

            // A TESTER //
            /* Exécute une requête préparée en en liant des variables PHP */
            $sql = 'SELECT * FROM CartItem WHERE username = ? AND refProduct = ?'; // requête
            $sth = $this->db->prepare($sql); // début de la préparation
            $sth->bindParam(1, $username, PDO::PARAM_STR, 20); // sécurisation du paramètre 1 attendu (ici une string de 20 caractères)
            $sth->bindParam(2, $refProduct, PDO::PARAM_INT); // sécurisation du paramètre 2 attendu (ici un int)
            $sth->execute(); // exécution
            $CartItem = $sth->fetchAll(PDO::FETCH_CLASS,"CartItem"); // retourne un élément de type CartItem (sous forme d'un tableau)
            //          //

            return $CartItem[0];
        }
        function addCartItem(int $refProduct, string $username){
            if(get($refProduct,$username) == null){

                // A TESTER //
                /* Exécute une requête préparée en en liant des variables PHP */
                $sql = "INSERT INTO CartItem (refProduct, username, quantity) VALUES ('?', '?', '1')"; // requête (double ou simple quotes ?)
                $sth = $this->db->prepare($sql); // début de la préparation
                $sth->bindParam(1, $refProduct, PDO::PARAM_INT); // sécurisation du paramètre 1 attendu (ici un int)
                $sth->bindParam(2, $username, PDO::PARAM_STR, 20); // sécurisation du paramètre 2 attendu (ici une string de 20 caractères)
                $sth->execute(); // exécution
                //          //

            } else {

                // A TESTER //
                /* Exécute une requête préparée en en liant des variables PHP */
                $sql = 'UPDATE CartItem SET quantity = quantity + 1 WHERE username='?'AND refProduct='?''; // requête (double ou simple quotes ?)
                $sth = $this->db->prepare($sql); // début de la préparation
                $sth->bindParam(1, $username, PDO::PARAM_STR, 20); // sécurisation du paramètre 1 attendu (ici une string de 20 caractères)
                $sth->bindParam(2, $refProduct, PDO::PARAM_INT); // sécurisation du paramètre 2 attendu (ici un int)
                $sth->execute(); // exécution
                //          //
                
            }
        }
        function removeCartItem(int $refProduct, string $username){
            if(get($refProduct,$username) != null){

                // A TESTER //
                /* Exécute une requête préparée en en liant des variables PHP */
                $sql = 'DELETE FROM CartItem WHERE username='?'AND refProduct='?''; // requête (double ou simple quotes ?)
                $sth = $this->db->prepare($sql); // début de la préparation
                $sth->bindParam(1, $username, PDO::PARAM_STR, 20); // sécurisation du paramètre 1 attendu (ici une string de 20 caractères)
                $sth->bindParam(2, $refProduct, PDO::PARAM_INT); // sécurisation du paramètre 2 attendu (ici un int)
                $sth->execute(); // exécution
                //          //

            }
        }
    }
?>

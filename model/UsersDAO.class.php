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
            $Users = $sth->fetchAll(PDO::FETCH_CLASS,"Users"); // stockage dans Users
            //          //

            $User = $Users[0];

            //récupération panier

            // A TESTER //
            $res = $this->db->query("SELECT * FROM CartItem WHERE username='$username'"); // $res prends la valeur du contenu du panier de l'utilisateur
            $User->myCart = $res->fetchAll(PDO::FETCH_CLASS,"CartItem"); // fetchAll transforme $res en tableau, et ce tableau est stocké dans l'attribut myCart
            //          //
            
            return $User;
        }
        function getCartItem(int $refProduct, string $username):CartItem{
            $res = $this->db->query("SELECT * FROM CartItem WHERE username='$username'AND refProduct='$refProduct'");
            $CartItem = $res->fetchAll(PDO::FETCH_CLASS,"CartItem");
            return $CartItem[0];
        }
        function addCartItem(int $refProduct, string $username){
            if(get($refProduct,$username) == null){
                $this->db->query("INSERT INTO CartItem (refProduct, username, quantity) VALUES ('$refProduct', '$username', '1')");
            } else {
                $this->db->query("UPDATE CartItem SET quantity = quantity + 1 WHERE username='$username'AND refProduct='$refProduct'");
            }
        }
        function removeCartItem(int $refProduct, string $username){
            if(get($refProduct,$username) != null){
                $this->db->query("DELETE FROM CartItem WHERE username='$username'AND refProduct='$refProduct'");
            }
        }
    }
?>

<?php
    class CartItemDAO{
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
        function get(int $refProduct, string $username):CartItem{
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
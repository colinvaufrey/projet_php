<?php
    class ProductsDAO{
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
        function get(int $ref):Cart{
            $res = $this->db->query("SELECT * FROM Cart WHERE ref='$ref'");
            $Cart = $res->fetchAll(PDO::FETCH_CLASS,"Cart");
            return $Cart[0];
        }
    }
?>
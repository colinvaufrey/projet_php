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
        function get(int $ref):Products{
            $res = $this->db->query("SELECT * FROM Products WHERE ref='$ref'");
            $Products = $res->fetchAll(PDO::FETCH_CLASS,"Products");
            return $Products[0];
        }
    }
?>
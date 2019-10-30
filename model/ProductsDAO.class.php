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

            // A TESTER //
            /* Exécute une requête préparée en en liant une variable PHP */
            $sql = 'SELECT * FROM Products WHERE ref='?''; // requête (double ou simple quotes ?)
            $sth = $this->db->prepare($sql); // début de la préparation
            $sth->bindParam(1, $ref, PDO::PARAM_INT); // sécurisation du paramètre attendu (ici un int)
            $sth->execute(); // exécution
            $Products = $sth->fetchAll(PDO::FETCH_CLASS,"Products"); // retourne un élément de type Product (sous forme d'un tableau)
            //          //

            return $Products[0];
        }
    }
?>

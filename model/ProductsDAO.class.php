<?php
<<<<<<< HEAD
    class ProductsDAO {

        private $db;

        // Contructeur chargé d'ouvrir la base de données
        function __construct() {
            $database = "sqlite:../data/db/database.db";
            try{
                $this->db = new PDO($database);
            }
            catch(\Exception $e) {
                echo $e . "\n";
                echo "erreur de connexion à la base de données \n";
            }
=======
class ProductsDAO {

    private $db;

    // Contructeur chargé d'ouvrir la base de données
    function __construct() {
        $database = 'sqlite:../data/db/database.db';
        try {
            $this->db = new PDO($database);
        }
        catch (\Exception $e) {
            echo $e . "\n";
            echo "Erreur de connexion à la base de données\n";
>>>>>>> 43d7407fed8b76c7ab49c9c195045dbbd5f28165
        }
    }

    function get(int $ref) : Products {

        // A TESTER //
        /* Exécute une requête préparée en en liant une variable PHP */
        $sql = 'SELECT * FROM Products WHERE ref = ?'; // requête (double ou simple quotes ?)
        $sth = $this->db->prepare($sql); // début de la préparation
        $sth->bindParam(1, $ref, PDO::PARAM_INT); // sécurisation du paramètre attendu (ici un int)
        $sth->execute(); // exécution
        $Products = $sth->fetchAll(PDO::FETCH_CLASS, "Products"); // retourne un élément de type Product (sous forme d'un tableau)

        return $Products[0];
    }

    function getAll() : array {

        // A TESTER //
        /* Exécute une requête préparée en en liant une variable PHP */
        $sql = 'SELECT * FROM Products'; // requête
        $sth = $this->db->prepare($sql); // début de la préparation
        $sth->bindParam(1, $ref, PDO::PARAM_INT); // sécurisation du paramètre attendu (ici un int)
        $sth->execute(); // exécution
        $Products = $sth->fetchAll(PDO::FETCH_CLASS, "Products"); // retourne un élément de type Product (sous forme d'un tableau)

        return $Products;
    }

    function getProductsInStock() : array {
        $res = $this->db->query("SELECT * FROM Products WHERE stock > 0");
        $ProductsInStock = $res->fetchAll(PDO::FETCH_CLASS, "Products"); // retourne un tableau de Product
        return $ProductsInStock;
    }

    function getProductsByOrigin(string $origin) : array {

        // A TESTER //
        /* Exécute une requête préparée en en liant une variable PHP */
        $sql = 'SELECT * FROM Products WHERE origin = ?'; // requête (double ou simple quotes ?)
        $sth = $this->db->prepare($sql); // début de la préparation
        $sth->bindParam(1, $origin, PDO::PARAM_STR, 15); // sécurisation du paramètre attendu (ici une string de 15 caractères)
        $sth->execute(); // exécution
        $ProductsFromOrigin = $sth->fetchAll(PDO::FETCH_CLASS, "Products"); // retourne un tableau de Product

        return $ProductsFromOrigin;
    }

    function getProductsByColor(string $color) : array {

        // A TESTER //
        /* Exécute une requête préparée en en liant une variable PHP */
        $sql = 'SELECT * FROM Products WHERE 0 < (SELECT INSTR(UPPER(color), UPPER(?)))'; // requête (double ou simple quotes ?) INSTR renvoie la position de la chaine cherchée et 0 s'il ne la trouve pas (casse ignorée grâce à UPPER)
        $sth = $this->db->prepare($sql); // début de la préparation
        $sth->bindParam(1, $color, PDO::PARAM_STR, 10); // sécurisation du paramètre attendu (ici une string de 10 caractères)
        $sth->execute(); // exécution
        $ProductsByColor = $sth->fetchAll(PDO::FETCH_CLASS, "Products"); // retourne un tableau de Product

        return $ProductsByColor;
    }

    function getProductsByPrice(float $min, float $max) : array {

        // A TESTER //
        /* Exécute une requête préparée en en liant des variables PHP */
        (string)$min;   // PDO::PARAM_FLOAT n'existant pas
        (string)$max;   // on utilisera PDO::PARAM_STR (dixit les forums faut faire comme ça)
        $sql = 'SELECT * FROM Products WHERE prix >= ? AND ref IN (SELECT ref FROM Products WHERE prix <= ?)'; // requête (double ou simple quotes ?)
        $sth = $this->db->prepare($sql); // début de la préparation
        $sth->bindParam(1, $min, PDO::PARAM_STR, 5); // sécurisation du paramètre attendu (ici une string représentant un float de 5 chiffres max)
        $sth->bindParam(2, $max, PDO::PARAM_STR, 5); // sécurisation du paramètre attendu (ici une string représentant un float de 5 chiffres max)
        $sth->execute(); // exécution
        $ProductsByTheirPrices = $sth->fetchAll(PDO::FETCH_CLASS, "Products"); // retourne un tableau de Product

        return $ProductsByTheirPrices;
    }

    function getProductsByTitle(string $title) : array {

        // A TESTER //
        /* Exécute une requête préparée en en liant une variable PHP */
        $sql = 'SELECT * FROM Products WHERE 0 < (SELECT INSTR(UPPER(title), UPPER(?)))'; // requête (double ou simple quotes ?) INSTR renvoie la position de la chaine cherchée et 0 s'il ne la trouve pas (casse ignorée grâce à UPPER)
        $sth = $this->db->prepare($sql); // début de la préparation
        $sth->bindParam(1, $title, PDO::PARAM_STR, 30); // sécurisation du paramètre attendu (ici une string de 30 caractères)
        $sth->execute(); // exécution
        $ProductsByTheirTitle = $sth->fetchAll(PDO::FETCH_CLASS, "Products"); // retourne un tableau de Product

        return $ProductsByTheirTitle;
    }
}
?>

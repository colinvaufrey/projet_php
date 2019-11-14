<?php
class ProductsDAO {

    private $db;

    // Contructeur chargé d'ouvrir la base de données
    function __construct() {
        $database = "sqlite:../data/db/database.db";
        try {
            $this->db = new PDO($database);
        }
        catch (\Exception $e) {
            echo $e . "\n";
            echo "Erreur de connexion à la base de données\n";
        }
    }

    function get(int $ref) {
        /* Exécute une requête préparée en en liant une variable PHP */
        $sql = 'SELECT * FROM Products WHERE ref = ?'; // requête (double ou simple quotes ?)
        $sth = $this->db->prepare($sql); // début de la préparation
        $sth->bindParam(1, $ref, PDO::PARAM_INT); // sécurisation du paramètre attendu (ici un int)
        $sth->execute(); // exécution
        $Products = $sth->fetchAll(PDO::FETCH_CLASS, "Products"); // retourne un élément de type Product (sous forme d'un tableau)

        if (count($Products) == 0) {
            $Products = false;
        } else {
            $Products = $Products[0];
        }

        return $Products;
    }

    function getAll() {
        /* Exécute une requête préparée en en liant une variable PHP */
        $sql = 'SELECT * FROM Products'; // requête
        $sth = $this->db->prepare($sql); // début de la préparation
        $sth->execute(); // exécution
        $Products = $sth->fetchAll(PDO::FETCH_CLASS, "Products"); // retourne tous les éléments de type Product (sous forme d'un tableau)

        if (count($Products) == 0) {
            $Product = false;
        }

        return $Products;
    }

    function getProductsInStock() {
        $res = $this->db->query("SELECT * FROM Products WHERE stock > 0");
        $ProductsInStock = $res->fetchAll(PDO::FETCH_CLASS, "Products"); // retourne un tableau de Product

        if (count($ProductsInStock) == 0) {
            $ProductsInStock = false;
        }

        return $ProductsInStock;
    }

    function getProductsByOrigin(string $origin) {
        /* Exécute une requête préparée en en liant une variable PHP */
        $sql = 'SELECT * FROM Products WHERE origin = ?'; // requête (double ou simple quotes ?)
        $sth = $this->db->prepare($sql); // début de la préparation
        $sth->bindParam(1, $origin, PDO::PARAM_STR, 15); // sécurisation du paramètre attendu (ici une string de 15 caractères)
        $sth->execute(); // exécution
        $ProductsFromOrigin = $sth->fetchAll(PDO::FETCH_CLASS, "Products"); // retourne un tableau de Product

        if (count($ProductsFromOrigin) == 0) {
            $ProductsFromOrigin = false;
        }

        return $ProductsFromOrigin;
    }

    function getProductsByColor(string $color) {
        /* Exécute une requête préparée en en liant une variable PHP */
        $sql = 'SELECT * FROM Products WHERE 0 < (SELECT INSTR(UPPER(color), UPPER(?)))'; // requête (double ou simple quotes ?) INSTR renvoie la position de la chaine cherchée et 0 s'il ne la trouve pas (casse ignorée grâce à UPPER)
        $sth = $this->db->prepare($sql); // début de la préparation
        $sth->bindParam(1, $color, PDO::PARAM_STR, 10); // sécurisation du paramètre attendu (ici une string de 10 caractères)
        $sth->execute(); // exécution
        $ProductsByColor = $sth->fetchAll(PDO::FETCH_CLASS, "Products"); // retourne un tableau de Product

        if (count($ProductsByColor) == 0) {
            $ProductsByColor = false;
        }

        return $ProductsByColor;
    }
}
?>

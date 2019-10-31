<?php

// Classe minimaliste pour normaliser l'usage d'une vue
// Il faut passer les valeurs à la vue comme des attributs de
// l'objet vue. C'est possible grâce aux modification dynamique du langage
// Les paramètres de la vue sont des attributs de $this
// mais sont visibles directement comme une variable locale
// C'est correcte d'utiliser $this dans la vue mais ce n'est pas nécéssaire
class View {
  private $path = ""; // Chemin vers le fichier de la vue

  // Constructeur d'une vue
  function __construct(string $path="") {
    $this->path = $path;
  }
  // Pour rendre plus joli le lancement de la vue
  function show(string $path="") {

    // prend l'attribut path de la vue si le paramètre est vide
    $p = $path ? $path : $this->path;

    // Ce test permet de donner le nom du fichier de la vue, sans indiquer le chemin
    // Sauf si on indique le chemin en relatif ou absolue
    if ($p[0] != '.' && $p[0] != '/') {
      // Ajoute le chemin relatif
      $p = "../view/".$p;
    }

    // Tous les attributs de l'objet sont dupliqués en des variables
    // locales à la fonction show. Cela simplifie l'expression des
    // valeurs de la vue. Il faut simplement utiliser <?= $variable

    // Parcourt tous les attributs de la vue
    foreach ($this as $key => $value) {
      // La notation $$ dédigne une variable de le nom est dans une autre variable
      $$key = $this->$key;
    }

    // Inclusion de la vue
    // Comme cette inclusion est dans la portée de la méthode show alors
    // seules les variables locales à show sont visibles.
    include($p);
  }
}
?>

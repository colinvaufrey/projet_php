<?php
    class Products {
        public $ref;
        public $title;
        public $img;
        public $description;
        public $prix;
        public $color;
        public $origin;
        public $stock;
        function __construct(int $ref){
            $this->ref = $ref;
        }
    }
?>
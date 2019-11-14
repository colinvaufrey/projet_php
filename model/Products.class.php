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

        public function __construct() {
        }

        public function getRef() {
            return $this->ref;
        }

        public function getTitle() {
            return $this->title;
        }

        public function getImage() {
            return $this->img;
        }

        public function getDescription() {
            return $this->description;
        }

        public function getPrice() {
            return $this->prix;
        }

        public function getColor() {
            return $this->origin;
        }

        public function getStock() {
            return $this->title;
        }
    }
?>

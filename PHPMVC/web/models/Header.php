<?php 
    class Header{
        private $id;
        private $phone;
        private $image;
        private $description;

        public function __construct($id, $phone, $image,$description){
            $this->id = $id;
            $this->phone = $phone;
            $this->image = $image;
            $this->description = $description;
        }
        public function getPhone() { 
            return $this->phone;
        }
        public function setPhone($phone){
            $this->phone = $phone;
        }
        public function getDescription() {
            return $this->description;
        }
        public function setDescription($description){
            $this->description = $description;
        }
        public function getImage() { 
            return $this->image;
        }
        public function setImage($image){
            $this->image = $image;
        }
    }

?>
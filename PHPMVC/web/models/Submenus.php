<?php 
class Submenus {
    private $id;
    private $menu_id;
    private $name;
    private $link;

    public function __construct($id, $menu_id, $name, $link){
        $this->id = $id;
        $this->menu_id = $menu_id;
        $this->name = $name;
        $this->link = $link;
    }
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getMenuid(){
        return $this->menu_id;
    }
    public function setMenuid($menu_id){
        $this->menu_id = $menu_id;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name) {
       $this->name = $name;
    }
    public function getLink(){
        return $this->link;
    }
    public function setLink($link){
        $this->link = $link;
    }

}


?>
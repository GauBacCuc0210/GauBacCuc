<?php 
class Position{
    private $id;
    private $position;
    private $salary;

    public function __construct( $id, $position, $salary ){
        $this->id = $id;
        $this->position = $position;
        $this->salary = $salary;
    }

    public function getPosition(){
        return $this->position;
    }
    public function getSalary(){
        return $this->salary;
    }
    public function setPosition($position){
        $this->position = $position;
    }
    public function setSalary($salary){
        $this->salary = $salary;
    }

}


?>
<?php

namespace mvc\Models;

use mvc\Core\Model;

class CarsModel extends Model{

    protected $id;
    protected $brand;
    protected $type;

    public function getId(){
        return $this->id;
    }

    public function getBrand(){
        return $this->brand;
    }

    public function getType(){
        return $this->type;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setBrand($brand){
        $this->brand = $brand;
    }

    public function setType($type){
        $this->type = $type;
    }
}
<?php

namespace mvc\Models;

use mvc\Models\CarResourceModel;

class CarRepository
{

    protected $CarRes;

    public function __construct()
    {
        $this->CarRes = new CarResourceModel;
    }

    public function getAll()
    {
        return $this->CarRes->getAll();
    }

    public function get($id){
        return $this->CarRes->get($id);
    }

    public function delete($id){
        return $this->CarRes->delete($id);
    }

    public function add($model){
        return $this->CarRes->save($model);
    }

    public function update($model){
        return $this->CarRes->save($model);
    }
}

<?php

namespace mvc\Controllers;

use mvc\Core\Controller;
use mvc\Models\CarRepository;
use mvc\Models\CarsModel;

class CarsController extends Controller
{

    protected $Rep;

    public function __construct()
    {
        $this->Rep = new CarRepository;
    }

    public function index()
    {
        $d['cars'] = $this->Rep->getAll();
        $this->set($d);
        $this->render("index");
    }

    public function create(){
        extract($_POST);
        if (isset($brand)) {
            $car = new CarsModel();
            $car->setBrand($brand);
            $car->setType($type);
            if ($this->Rep->add($car)) {
                header("Location: " . WEBROOT . "cars/index");
            }
        }
        $this->render("create");
    }

    public function edit($id)
    {
        //Check submit data
        extract($_POST);
        if (isset($brand)) {
            $car = new CarsModel();
            $car->setId($id);
            $car->setBrand($brand);
            $car->setType($type);
            if ($this->Rep->update($car)) {
                header("Location: " . WEBROOT . "cars/index");
            }
        }
        $d['car'] = $this->Rep->get($id);
        $this->set($d);
        $this->render("edit");
    }

    public function delete($id){
        if ($this->Rep->delete($id)) {
            header("Location: " . WEBROOT . "cars/index");
        }
    }
}

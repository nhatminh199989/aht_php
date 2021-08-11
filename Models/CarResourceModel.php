<?php

namespace mvc\Models;

use mvc\Core\ResourceModel;
use mvc\Models\CarsModel;

class CarResourceModel extends ResourceModel
{
    public function __construct()
    {
        parent::_init("cars","id",new CarsModel);
    }
}

<?php

namespace mvc\Models;

use mvc\Models\TaskResourceModel;

class TaskRepository
{
    protected $taskRes;
    public function __construct()
    {
        $this->taskRes = new TaskResourceModel();
    }

    public function getAll(){
        return $this->taskRes->getAll();
    }

    public function get($id){
        return $this->taskRes->get($id);
    }

    public function delete($model){
        return $this->taskRes->delete($model);
    }

    public function add($model){
        return $this->taskRes->save($model);
    }

    public function update($model){
        return $this->taskRes->save($model);
    }
}

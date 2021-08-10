<?php

namespace mvc\Controllers;

use mvc\Core\Controller;
use mvc\Models\TaskModel;
use mvc\Models\TaskRepository;

class TasksController extends Controller
{
    private $Repo;

    public function __construct()
    {
        $this->Repo = new TaskRepository();
    }

    public function index()
    {
        $tasks = new TaskModel();
        $d['tasks'] = $this->Repo->getAll($tasks);
        $this->set($d);
        $this->render("index");
    }

    public function create()
    {
        $task = new TaskModel();
        extract($_POST);
        if (isset($title)) {
            $task->setTitle($title);
            $task->setDescription($description);

            if ($this->Repo->update($task)) {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->render("create");
    }

    public function edit($id)
    {
        $task = new TaskModel();
        extract($_POST);
        $d["task"] = $this->Repo->get($id);

        if (isset($title)) {
            $task->setId($id);
            $task->setTitle($title);
            $task->setDescription($description);

            if ($this->Repo->update($task)) {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    public function delete($id)
    {
        $task = new TaskModel();
        $task->setId($id);
        if ($this->Repo->delete($task)) {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}

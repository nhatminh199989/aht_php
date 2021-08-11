<?php

namespace mvc\Core;

use mvc\Config\Database;
use PDO;

class ResourceModel implements ResourceModelInterface
{

    private $table;
    private $id;
    private $model;

    public function _init($table, $id, $model)
    {
        $this->table = $table;
        $this->id = $id;
        $this->model = $model;
    }

    public function save($model)
    {
        //get model data
        $properties = $model->getProperties();

        //get model id
        $checkID = $model->getId();

        if ($checkID == null) {
            unset($properties['id']);
            //join array elements with string 
            $values = implode(', ', array_keys($properties));
            $column = implode(', :', array_keys($properties));
            $sql = "INSERT INTO {$this->table} (" . $values . ") VALUES ( :" . $column . ")";
            $req = Database::getBdd()->prepare($sql);
            return $req->execute($properties);
        }

        if ($checkID != null) {
            $columns = [];
            foreach (array_keys($properties) as $key => $values) {
                if ($values != 'id') {
                    $columns[] =  $values . ' = :' . $values;
                }
            }
            $column = implode(', ', $columns);
            $sql = "UPDATE {$this->table} SET " . $column . " WHERE id = :id";
            $req = Database::getBdd()->prepare($sql);
            return $req->execute($properties);
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} where id =:id";
        $req = Database::getBdd()->prepare($sql);
        return $req->execute([':id' => $id]);
    }

    public function get($id)
    {
        $sql = "SELECT * FROM {$this->table} where id =:id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute([':id' => $id]);
        return $req->fetchObject();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->table}";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_OBJ);
    }
}

<?php

include_once 'api/models/modelRoles.php';
include_once 'api/database/db.php';

class controllerRoles
{
    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new modelRoles();
    }

    public function Register($data = [])
    {
        $data = $this->model->Register($data);
        return $data;
    }

    public function List()
    {
        $data = $this->model->List();
        return $data;
    }

    public function ListById($id = "")
    {
        $data = $this->model->ListById($id);
        return $data;
    }



    public function DeleteById($id = "")
    {
        $data = $this->model->DeleteById($id);
        return $data;
    }

    public function UpdateById($data = [])
    {
        $data = $this->model->UpdateById($data);
        return $data;
    }
}
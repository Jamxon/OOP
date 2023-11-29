<?php

namespace models;

use components\Constant;
use MongoDB\Driver\Exception\Exception;
use vendor\myFrame\Model;
use PDO;
class Category extends Model
{

    public function tableName()
    {
        return "category";
    }

    public function save($name){
            $sql = "insert into category (title) values (:name)";
            $state = $this->db->prepare($sql);
            $state->bindParam(":name", $name);
            $state->execute();
    }
    public function update($id, $name)
    {
        $sql = "update category set title = :title where id = :id";
        $state = $this->db->prepare($sql);
        $state->bindParam(":id", $id, PDO::PARAM_INT);
        $state->bindParam(":title", $name);
        $state->execute();
    }
    public  function delete($id)
    {
        $input_data = json_decode(file_get_contents('php://input'), true);
        if (isset($input_data['categoryID'])){
            $categoryID = $input_data['categoryID'];
        }
        $sql = "delete from category where id = :id";
        $state = $this->db->prepare($sql);
        $state->bindParam(":id", $id);
        $state->execute();
    }
}
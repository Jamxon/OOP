<?php

namespace vendor\myFrame;


use components\Constant;
use PDO;
class Model
{
    public $tableName;
    public $db;
    public $page;
    public function __construct()
    {
        $req = new Request();
        $this->page = $req->page;
        $this->tableName = $this->tableName();
        $conn = new Connection();
        $this->db = $conn->getConnection();
    }
    public function tableName(){
        return "user";
    }
    public function getList($with_limit = false)
    {
        $offset = ($this->page - 1) * Constant::LIMIT;
        if ($with_limit){
            $sql = "select * from {$this->tableName} order by id desc";
            $state = $this->db->prepare($sql);
        }else{
            $sql = "select * from {$this->tableName} order by id desc limit :offset, :limit";
            $state = $this->db->prepare($sql);
            $state->bindValue(':offset',$offset, PDO::PARAM_INT);
            $state->bindValue(':limit',Constant::LIMIT, PDO::PARAM_INT);
        }
        $state->execute();
        $categories = $state->fetchAll(PDO::FETCH_OBJ);
        return $categories;
    }
    public function getPagination()
    {
        $sql = "select * from {$this->tableName}";
        $state = $this->db->prepare($sql);
        $state->execute();
        $total_rows = $state->rowCount();
        return ceil($total_rows / Constant::LIMIT);
    }
    public function getRowById($id)
    {
        $sql = "select * from {$this->tableName} where id = :id";
        $state = $this->db->prepare($sql);
        $state->bindValue(':id', $id, PDO::PARAM_INT);
        $state->execute();
        $category = $state->fetch(PDO::FETCH_OBJ);
        return $category;
    }
    function getOne( $id)
    {
        $sql = "select * from {$this->tableName} where id = :id";
        $state = $this->db->prepare($sql);
        $state->bindParam(":id", $id);
        $state->execute();
        $total_rows = $state->fetch(PDO::FETCH_OBJ);
        return $total_rows;
    }
}
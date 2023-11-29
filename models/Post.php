<?php

namespace models;
use vendor\myFrame\Model;
use PDO;
class Post extends Model
{
    public function tableName()
    {
        return "post";
    }
    public function save($title,$content,$category_id,$author_id,$nashr_id){
        $sql = "insert into post (title,content,category_id,author_id,nashr_id)
values (:title,:content,:category_id,:author_id,:nashr_id)";
        $state = $this->db->prepare($sql);
        $state->bindParam(":title", $title);
        $state->bindParam(":content", $content);
        $state->bindParam(":category_id", $category_id);
        $state->bindParam(":author_id", $author_id);
        $state->bindParam(":nashr_id", $nashr_id);
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
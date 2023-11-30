<?php

namespace models;
use AllowDynamicProperties;
use mysql_xdevapi\Exception;
use vendor\myFrame\Model;
use PDO;
#[AllowDynamicProperties] class Post extends Model
{
    public function tableName()
    {
        return "post";
    }
    public function save($title,$content,$category_id,$author_id,$nashr_id,$img): void
    {
        $tmpName = $_FILES['img']['tmp_name'];
        $name = $_FILES['img']['name'];
        $path = "images/".$name;
        move_uploaded_file($tmpName, $path);
        $sql = "insert into post (title,content,category_id,author_id,image,nashr_id)
values (:title,:content,:category_id,:author_id,:img,:nashr_id)";
        $state = $this->db->prepare($sql);
        $state->bindParam(":title", $title);
        $state->bindParam(":content", $content);
        $state->bindParam(":category_id", $category_id);
        $state->bindParam(":author_id", $author_id);
        $state->bindParam(":nashr_id", $nashr_id);
        $state->bindParam(':img',$name);
        $state->execute();

    }
    public function update($id, $title, $content, $category_id, $author_id, $nashr,$image)
    {
        $sql = "update post set title = :title, content = :content,
                category_id = :category_id, author_id = :author_id,
                image = :image,
                nashr_id = :nashr where id = :id";
        $state = $this->db->prepare($sql);
        $state->bindParam(":title", $title);
        $state->bindParam(":content", $content);
        $state->bindParam(":category_id", $category_id);
        $state->bindParam(":author_id", $author_id);
        $state->bindParam(":nashr", $nashr);
        $state->bindParam(":image", $image);
        $state->bindParam(":id", $id);
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
<?php

namespace controllers;

use models\Category;
use models\Post;
use vendor\myFrame\Controller;

class PostController extends Controller
{
    public function list()
    {
        $post = new Post();
        $result = $post->getList();
        $pageCount = $post->getPagination();
        $this->load("post.list", [
            'list' => $result,
            'pageCount' => $pageCount
        ]);
    }
    public function add()
    {
        if (isset($_POST['post_add'])){
            $post = new Post();
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category_id = $_POST['cat_id'];
            $author_id = $_POST['author_id'];
            $nashr_id = $_POST['nashr_id'];
            $tmpName = $_FILES['img']['tmp_name'];
            $name = $_FILES['img']['name'];
            $path = "images/".$name;
            move_uploaded_file($tmpName, $path);
            $post->save($title,$content,$category_id,$author_id,$nashr_id,$name);
            header("Location: /post/list");
        }
        $this->load("post.add");
    }
    public function update($id){
        $post = new Post();
        if (isset($_POST['post_update'])){
            $id = $_POST['id'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category_id = $_POST['category_id'];
            $author_id = $_POST['author_id'];
            $image = $_FILES['img']['name'];
            $nashr = $_POST['nashr_id'];
            $post->update($id, $title, $content, $category_id, $author_id,$nashr,$image);
            header("Location: /post/list");
            exit();
        }
        $result = $post->getRowById($id);
        $this->load("post.update", [
            'post' => $result
        ]);
    }
}
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
        if (isset($_POST['cat_add'])){
            $name = $_POST['name'];
            $category = new Category();
            $category->save($name);
            header("Location: /category/list");
        }
        $this->load("post.add");
    }
}
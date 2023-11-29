<?php

namespace controllers;

use models\Category;
use vendor\myFrame\Controller;
use vendor\myFrame\Views;
use vendor\myFrame\Connection;

class CategoryController extends Controller
{


    public function list()
    {
        $category = new Category();
        $result = $category->getList();
        $pageCount = $category->getPagination();
        $this->load("category.list", [
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
        $this->load("category.add");
    }
    public function update($id){
        $category = new Category();
        if (isset($_POST['cat_update'])){
            $category->update($id, $_POST['name']);
            header("Location: /category/list");
            exit();
        }
        $result = $category->getRowById($id);
        $this->load("category.update", [
            'category' => $result
        ]);
    }
    public function delete($id){
        $category = new Category();
        $category->delete($id);
        echo "Deleted";
    }
}
<?php

namespace controllers;

use vendor\myFrame\Controller;
class SiteController extends Controller
{
    public function hello(){
        echo "Hello";
    }

    public function update($id)
    {
        echo "SiteController::update ".$id;
    }
    public function index()
    {
        $this->load("default.index");
    }
    public function about()
    {
        echo "SiteController::about";
    }
    public function contact()
    {
        echo "SiteController::contact";
    }


}
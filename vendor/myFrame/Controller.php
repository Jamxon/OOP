<?php

namespace vendor\myFrame;

class Controller
{
    public Views $view;
    public function __construct()
    {
        $this->view = new Views();
    }
    public function load($path, $data = []){
        $this->view->load($path, $data);
    }
}
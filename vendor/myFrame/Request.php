<?php

namespace vendor\myFrame;

class Request
{
    public $page = 1;

    public function __construct()
    {
        if (isset($_GET['page'])){
            $this->page = $_GET['page'];
        }
    }
}
<?php

namespace vendor\myFrame;

class Views
{
    public function load($path, $data = [])
    {
        $path = str_replace(".", "/", $path);
        $path = "views/" . $path . ".php";
        extract($data);
        if (file_exists($path)) {
            extract($data);
            include "views/layout/main.php";
            include $path;
            include "views/layout/footer.php";
        } else {
            echo "File not found!";
        }
    }
}
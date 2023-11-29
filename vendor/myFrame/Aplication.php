<?php

namespace vendor\myFrame;

class Aplication
{
    public $defaultController = "SiteController";
    public $defaultMethod = "index";
    public function run()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $data = explode('/',trim($uri,'/'));
        if ($uri === "" || $uri === "/" || $uri === "/index.php"){
            $className = "controllers\\".$this->defaultController;
            $methodName = $this->defaultMethod;
        }else {
            $index = 0;
            if($data[0] !== "index.php")
                $index = 1;

            if (isset($data[1 - $index]))
                $className = ucfirst($data[1 - $index]) . "Controller";
            else
                $className = "SiteController";
            $className = "controllers\\" . $className;
            if (isset($data[2 - $index]))
                $methodName = $data[2 - $index];
            else
                $methodName = "index";
            if (strpos($data[2 - $index], '?')) {
                $params = explode('?', $data[2 - $index]);
                $methodName = $params[1 - $index];
            }
//            if (!class_exists($className)) {
//                echo "404";
//                return;
//            }
//            if (!method_exists($className, $methodName)) {
//                echo "404";
//                return;
//            }
            if (isset($data[3 - $index])) {
                $id = $data[3 - $index];
            }
        }
        $obj = new $className();
        if (isset($id)){
            $obj->{$methodName}($id);
            return;
        }else{
            $obj->{$methodName}();
        }
    }
}
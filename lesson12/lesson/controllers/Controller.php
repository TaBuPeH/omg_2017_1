<?php

class Controller
{
 
    protected function render($view)
    {
        // views/Articles/index
        $path = realpath(dirname(__FILE__));
        $className = str_replace('Controller', '', get_class($this));
        $path .= "/../views/".$className."/".$view.".php";
    
        require_once($path);
    }
}

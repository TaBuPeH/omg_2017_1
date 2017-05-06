<?php


$path =  realpath(dirname(__FILE__));
require_once($path . '/../models/model.php');
require_once($path . '/Controller.php');

class ArticlesController extends Controller
{
    public function index()
    {
        $model = new Model('articles');

        $result = $model->getAll();

    
        $this->render(__FUNCTION__);
    }
}

<?php 
namespace Project\Core;

Class Controller {

    public function model($model) {

        $baseDirectory = dirname(__DIR__, 2);
        require_once $baseDirectory.'/src/models/' . $model . '.php';
        echo $baseDirectory.'/src/models/' . $model . '.php';
        return new $model;
    }

    public function view($view, $data=[]) {

        $baseDirectory = dirname(__DIR__, 2);
        require_once $baseDirectory.'/src/views/' . $view . '.php';
    }
    
}


?>
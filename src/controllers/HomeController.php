<?php 
namespace Project\Controllers;

use Project\Core\Controller;

class HomeController extends Controller {
    public function index() {
      
        $data=[
            'name'=>'John',
            'age'=>30
        ];

        $this->view('home', $data);
    }
}


?>
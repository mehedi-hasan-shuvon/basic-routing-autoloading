<?php 
namespace Project\Controllers;


class UserController {
    public function show($params) {
        $userId = $params['id'];
        echo "User ID: $userId";
    }
}



?>
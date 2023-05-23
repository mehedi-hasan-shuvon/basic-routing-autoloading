<?php 
namespace Project\Controllers;


    class ProductController {
        public function edit($params) {
            $productId = $params['id'];
            echo "Product ID: $productId";
        }
    }


?>
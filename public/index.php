<?php 
require_once '../autoload.php';


use Project\Routes\HomeRoutes;



header("Access-Control-Allow-Origin: http://localhost:8888");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");


new HomeRoutes();




?>
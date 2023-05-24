<?php 
namespace Project\Controllers;

use Project\Core\Controller;

use Project\Models\User as UserModel;

class HomeController extends Controller {

    public function __construct(){
        $this->userModel = new UserModel();
    }

    public function index() {
      
        $userList= $this->userModel->getUsers();

        $cityList= $this->userModel->getCities();



        $data=[
            'title'=>'Home Page',
            'userList'=>$userList,
            'cityList'=>$cityList
        ];



        $this->view('home', $data);
    }

    public function goToUpdate($params){

        // get data from json post request
        $data = json_decode(file_get_contents("php://input"));

        $userId = $params['id'];



        $userInfo=$this->userModel->specificUser($userId);

        //get city list
        $cityList= $this->userModel->getCities();
        $data=[
            'title'=>'Update Page',
            'userInfo'=>$userInfo,
            'cityList'=>$cityList
        ];

      
        //get user data from database


       
        // close the home page and go to update page
        $this->view('update', $data);
      
    }


    public function fetchUser(){
        $userList= $this->userModel->getUsers();
        
        print_r($userList);

        return $userList;
    }

    public function fetchCity(){
        $cityList= $this->userModel->getCities();

        return $cityList;
    }


    public function addUser(){
        
        // get data from json post request
        $data = json_decode(file_get_contents("php://input"));

        // make array from data

        $data=(array)$data;

       
        

        $result=$this->userModel->createUser($data);
        
        if($result){
            return json_encode(array('message'=>'User Created', 'status'=>'200'));
        }else{
            return json_encode(array('message'=>'User Not Created'));
        }
    }

    public function updateUser(){
        // get data from json post request
        $data = json_decode(file_get_contents("php://input"));

        // make array from data

        $data=(array)$data;

        $userId=$data['id'];

        $result=$this->userModel->updateUser($data,$userId);
        
        if($result){
            return json_encode(array('message'=>'User Updated', 'status'=>'200'));
        }else{
            return json_encode(array('message'=>'User Not Updated'));
        }
    }


    public function deleteUser(){
        // get data from json post request
        $data = json_decode(file_get_contents("php://input"));

        // make array from data

        $data=(array)$data;

        $userId=$data['id'];

        $result=$this->userModel->deleteUser($userId);
        
        if($result){
            return json_encode(array('message'=>'User Deleted', 'status'=>'200'));
        }else{
            return json_encode(array('message'=>'User Not Deleted'));
        }
    }
}


?>
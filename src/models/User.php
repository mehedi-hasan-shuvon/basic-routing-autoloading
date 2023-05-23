<?php  

namespace Project\Models;

use Project\Core\Database;

class User{

    private $db;

    private $join;

    private $colName;

    public function __construct(){
        $this->db = new Database;
        $this->join= "citytb ON students.city=citytb.cid";
        $this->colName='students.id,students.student_name,students.age,citytb.cname';
    }

    public function getUsers(){
        $this->db->select('students','*',$this->join,null,'id',null);
        $result=$this->db->getResult();
        $result=json_encode($result);
        // echo $result;
        return $result;
    }

    public function getCities(){
        $this->db->select('citytb','*');
        $result=$this->db->getResult();
        $result=json_encode($result);
        // echo $result;
        return $result;
    }

    //create user
    public function createUser($data){
       
        $this->db->insert('students',$data);
        $result=$this->db->getResult();
        
        return $result;
    }

    //delete user
    public function deleteUser($userId){
       
        $where="id=".$userId;
        $this->db->delete('students',$where);
        $result=$this->db->getResult();
        return $result;
    }


    public function specificUser($userId){
        $where="id=".$userId;
        $this->db->select('students','*',$this->join,$where,null,null);
        $result=$this->db->getResult();
        // $result=json_encode($result);
        return $result;
    }

    public function updateUser($data,$userId){
        $where="id=".$userId;
        $this->db->update('students',$data,$where);
        $result=$this->db->getResult();
        return $result;
    }




}


?>
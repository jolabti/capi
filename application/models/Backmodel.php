<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Backmodel extends CI_Model {

     public function showUser(){

               return $this->db->get("courseapi_user")->result();

     }  
     
     public function showKategori(){

               return $this->db->get("course_kategori")->result();

     }

     public function showProduct(){
          $this->db->join('course_kategori', 'course_product.kategori_fk = course_kategori.kategori_id');           
          return $this->db->get('course_product')->result();       
     }

     public function addTransaction($data=array()){

          $this->db->insert("course_transaction",$data);

     }

     public function modelLogin($email ="", $password = ""){
          
          $this->db->where("user_email", $email); 
          $this->db->where("user_password", $password);         
          
          return $this->db->get("courseapi_user")->row();

                     

     }

     public function modelTransaction($data=array()){

          $this->db->insert("course_transaction", $data);
          
     }

     public function modelShowTransactionbyUser($idUser){
   
          $this->db->join('course_product', 'course_product.product_id = course_transaction.product_fk');          
          $this->db->join('course_kategori', 'course_kategori.kategori_id = course_product.kategori_fk');           
          $this->db->join('courseapi_user', 'courseapi_user.user_id = course_transaction.user_fk');          
                
          $this->db->where('course_transaction.user_fk', $idUser);           
          return $this->db->get('course_transaction')->result();       
         
     }
}

/* End of file ModelName.php */


?>
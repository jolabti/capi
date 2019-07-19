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
}

/* End of file ModelName.php */


?>
<?php
//use Restserver\Libraries\REST_Controller;
require APPPATH . 'libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Welcome extends REST_Controller {

	 
 
	public function index_get()
	{
		$data = array("message" => "course api activated"); 
		$this->set_response($data, REST_Controller::HTTP_OK);
	}

	public function users_get(){
		
		$data = $this->backmodel->showUser();
		$this->set_response($data, REST_Controller::HTTP_OK);
		 
	}
	
	public function kategori_get(){
		
		$data = $this->backmodel->showKategori();
		$this->set_response($data, REST_Controller::HTTP_OK);
		 
	}
	
	public function products_get(){
		
		$data = $this->backmodel->showProduct();
		$this->set_response($data, REST_Controller::HTTP_OK);
		 
	}
	public function addcourse_post(){


		$message = array();	 

		$data = array(

					"transaction_id" =>"",
					"product_fk" =>$this->input->post("trx_product_fk"),
					"user_fk" =>$this->input->post("trx_user_fk"),
					"transaction_qty" =>$this->input->post("trx_qty"),
					"transaction_date" =>$this->input->post("trx_date"),
					"transaction_amount" =>$this->input->post("trx_amount")
		);
		

		$this->db->trans_start();

		$this->backmodel->addTransaction($data);
 
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
	 
			$this->db->trans_rollback();

			$message = array(
				"message" => "failed to request product"				
			); 
			
 		} 
		else
		{
			$message = array(
				"message" => "success"				
			); 
			
			$this->db->trans_commit();
 		}

 		$this->set_response($message, REST_Controller::HTTP_OK);
		

	}

	 
	
}

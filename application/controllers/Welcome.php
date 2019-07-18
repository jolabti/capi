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

	 
	
}

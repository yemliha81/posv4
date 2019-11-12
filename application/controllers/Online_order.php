<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Online_order extends CI_Controller {
	
	public function index()
	{		
		//debug($data['cats']);
		$this->load->view('online_order_view', $data);
		
	}
	
	public function posopos($order_code){
		
		if($order_code != ''){
			
			$this->load->view('order_view', $data);
			
		}
		
	}
	
	public function table($table_id, $db){ 
		$this->session->set_userdata('db', $db);
		//debug($_SESSION);
		$data['cats'] = $this->db->select('*')
			->where('type', '1')
			->order_by('sort', 'ASC')
			->get("menu_cats_table")->result_array(); 

		
		//debug($data['cats']);
		$data['table'] = $this->db->select('*')
			->where('table_id', $table_id)
			->get($db'.tables_table')->row_array();
		
		
		
		$this->load->view('online_order_view', $data); 
	}
	

}

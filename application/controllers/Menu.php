<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
	
	public function index($page_id)
	{
		
		$data['page'] = $this->db->select('*')
			->where('page_id', $page_id)
			->get('pages_table')->row_array();
		
		$this->load->view('page_view', $data);
		
	}
	

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	
	public function page_detail($page_id)
	{
		
		$data['page'] = $this->db->select('*')
			->where('page_id', $page_id)
			->get('pages_table')->row_array();
		
		$this->load->view('page_view', $data);
		
	}
	

}

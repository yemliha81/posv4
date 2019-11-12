<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
	
	public function index()
	{
		
		$data['gallery'] = $this->db->select('*')
			->order_by('img_id', 'DESC')
			->get('gallery_table')->result_array();
		
		$this->load->view('gallery_view', $data);
		
	}
	

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$data = $this->assist->data;
		
		$data['banners'] = $this->db->select('*')
			->get('slides_table')->result_array();
		
		$data['gallery'] = $this->db->select('*')
			->where('publish', '1')
			->get('gallery_table')->result_array();
		
		$data['products'] = $this->db->select('*')
			->order_by('pro_id', 'ASC')
			//->limit(6)
			->get('products_table')->result_array();
		
		$this->load->view('welcome_view', $data);
	}
	

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class How_much extends CI_Controller {
	
	public function index()
	{
		
		$data['cats'] = $this->db->select('*')
			->where('up_cat', '1')
			->get('cats_table')->result_array();
		
		foreach($data['cats'] as $key => $val){
			$data['cats'][$key]['products'] = $this->db->select('*')
				->join('products_table', 'product_cats_table.pro_id = products_table.pro_id', 'left')
				->where('cat_id', $val['cat_id'])
				->get('product_cats_table')->result_array();
		}
		//debug($data['cats']);
		
		
		$this->load->view('how_much_view', $data);
		
	}
	

}

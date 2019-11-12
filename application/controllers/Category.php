<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function cat_list()
	{
		
		$data['cats'] = $this->db->select('*')
			->where('up_cat', '1')
			->get('cats_table')->result_array();
		
		$this->load->view('categories_view', $data);
	}
	
	public function cat_page($cat_id)
	{
		
		$data['price_info'] = $this->db->select('*')
			->where('id', '1')
			->get('pro_price_show')->row_array();
		
		$data['cats'] = $this->db->select('*')
			->where('up_cat', '1')
			->get('cats_table')->result_array();
		
		$data['catid'] = $cat_id;
		$data['sub_cats'] = $this->db->select('*')
			->join('cats_table', 'sub_cats_table.sub_cat_id = cats_table.cat_id', 'left')
			->where('sub_cats_table.cat_id', $cat_id)
			->get('sub_cats_table')->result_array();
		
		$cat = $this->db->select('*')
				->join('cats_table', 'sub_cats_table.cat_id = cats_table.cat_id', 'left')
				->where('sub_cat_id', $cat_id)
				->get('sub_cats_table')->row_array();
			
		if(!empty($cat)){
			$data['cat_name'] = $cat['cat_name'];
			$data['cat_id'] = $cat['cat_id'];
		}else{
			$data['cat_name'] = "";
			$data['cat_id'] = "";
		}
		
		
		$data['cat'] = $this->db->select('*')
			->where('cat_id', $cat_id)
			->get('cats_table')->row_array();
		
		if(!empty($data['sub_cats'])){
			$this->load->view('sub_categories_view', $data);
		}else{
			
			$page = $_GET['p'];
		
			$limit = 9;
			$start_row = (($page - 1)*$limit);
			
			if($start_row < 0){
				$start_row = 0;
			}
			
			
			
			$data['products'] = $this->db->select('*')
				->join('products_table', 'product_cats_table.pro_id = products_table.pro_id', 'left')
				->where('product_cats_table.cat_id', $cat_id)
				->limit($limit,$start_row)
				->get('product_cats_table')->result_array();
			
			$total = count($data['products']);
			
			$data['pages'] = round(($total / $limit),0) + 1;
			
			//debug($data['products']);
			
			$this->load->view('cat_products_view', $data);
			
		}
		
	}
	
	public function xyz(){
		
		/* $list2 = $this->db->select('pro_id')
			->group_by('pro_id')
			->get('product_cats_table')->result_array();
		
		foreach($list2 as $key => $val){
			$pr[$key] = $this->db->select('pro_id')
				->where('pro_id', $val['pro_id'])
				->get('products_table')->row_array();
			
			if(empty($pr[$key])){
				$new[] = $val['pro_id'];
			}
			
		}
		foreach($new as $key => $val){
			$this->db->delete('product_cats_table', array('pro_id' => $val));
		} */
		die("done");
		debug($new);
		
	}
	

}

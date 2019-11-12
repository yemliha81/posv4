<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function detail($pro_id)
	{
		$data['price_info'] = $this->db->select('*')
			->where('id', '1')
			->get('pro_price_show')->row_array();
			
		$data['product'] = $this->db->select('*')
			->where('pro_id', $pro_id)
			->get('products_table')->row_array();
		
		$cat = $this->db->select('*')
			->join('cats_table', 'product_cats_table.cat_id = cats_table.cat_id', 'left')
			->where('pro_id', $pro_id)
			->get('product_cats_table')->row_array();
		
		if(!empty($cat)){
			$data['cat_name'] = $cat['cat_name'];
			$data['cat_id'] = $cat['cat_id'];
		}else{
			$data['cat_name'] = "";
			$data['cat_id'] = "";
		}
		
		$data['imgs'] = $this->db->select('*')
			->where('pro_id', $pro_id)
			->get('products_imgs_table')->result_array();
		
		
		
		$this->load->view('pro_details_view', $data);
	}
	
	public function search(){
		$post = $this->input->post();
		
		//debug($post);
		
		$term = $post['term'];
		
		$list1 = $this->db->select('*')
			->like('pro_name', $term, 'both')
			->limit(10)
			->get('products_table')->result_array();
		
		$list2 = $this->db->select('*')
			->like('pro_description', $term, 'both')
			->limit(10)
			->get('products_table')->result_array();
		
		$list3 = $this->db->select('*')
			->like('search_desc', $term, 'both')
			->limit(10)
			->get('products_table')->result_array();
			
			
		foreach($list1 as $key => $val){
			foreach($list2 as $kk => $vv){
				if($val['pro_id'] == $vv['pro_id']){
					unset($list2[$kk]);
				}
			}
		}
		
		
		
		foreach($list1 as $key => $val){
			foreach($list3 as $kk => $vv){
				if($val['pro_id'] == $vv['pro_id']){
					unset($list3[$kk]);
				}
			}
		}
		
		$l1 = array_merge($list1,$list2);
		$l2 = array_merge($list1,$list3);
		
		foreach($l1 as $key => $val){
			foreach($l2 as $kk => $vv){
				if($val['pro_id'] == $vv['pro_id']){
					unset($l2[$kk]);
				}
			}
		}
		
		$data['list'] = array_merge($l1,$l2);
		
		
		$this->load->view('search_results_view', $data);
		
	}
	
	public function change_desc(){
		
		$list = $this->db->select('pro_id, search_desc')
			->get('products_table')->result_array();
		
		
		
		/* foreach($list as $key => $val){
			$s[$key] = str_replace('&nbsp;','',strip_tags($val['search_desc']));
			$list[$key]['new_desc'] = $s[$key];
			
			$whr[$key]['pro_id'] = $val['pro_id'];
			$upd[$key]['search_desc'] = $s[$key];
			
			$this->db->update('products_table', $upd[$key], $whr[$key]);
			
			
		} */
		debug($list);
	}
	

}

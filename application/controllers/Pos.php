<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pos extends CI_Controller {
	
	public function index()
	{
		
		$this->load->view('pos_view');
	
	}
	
	public function proUpdate(){
		$list = $this->db->select('pro_id, pro_name')
			->like('pro_name', 'cc', 'both')
			->get('products_table2')->result_array();
		
		foreach($list as $key => $val){
			$list[$key]['new_name'] = str_replace("cc","cl",$val['pro_name']);
			
			$this->db->update('products_table2', array('pro_name' => $list[$key]['new_name']), array('pro_id' => $val['pro_id']));
			
		}
		die("done");
		debug($list);
	}
	
	public function proUpdate2(){
		$list = $this->db->select('pro_id, pro_name')
			->like('pro_name', ' SEK', 'both')
			->get('products_table2')->result_array();
		//debug($list);
		foreach($list as $key => $val){
			$list[$key]['new_name'] = str_replace(" SEK"," TEK",$val['pro_name']);
			
			$this->db->update('products_table2', array('pro_name' => $list[$key]['new_name']), array('pro_id' => $val['pro_id']));
			
		}
		die("done");
		debug($list);
	}
	
}
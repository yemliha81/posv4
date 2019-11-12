<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	
	public function __construct() {    
        parent::__construct();  
	
		$this->load->library('session');
	
		//debug($this->session->all_userdata());
        
    }
	
	public function index(){ 
		$data['settings'] = $this->db->select('store_name')
			->where('id', '1')
			->get('settings_table')->row_array();
		
		$this->load->view("login_select_view",$data);
	}
	
	public function login_select(){ 
		$data['settings'] = $this->db->select('store_name')
			->where('id', '1')
			->get('settings_table')->row_array();
		//debug($data);
	
		$this->load->view("login_select_view",$data);
	}
	
	public function login_select_post(){
		$post = $this->input->post();
		//debug($post);
		$check = $this->db->select('*')
			->where('password', $post['pass'])
			->get('users_table')->row_array();
		
		if(!empty( $check )){
			
			
			
			$arr['logged_in'] = '1';
			$arr['user_type_id'] = $check['user_type_id'];
			$arr['user_id'] = $check['user_id'];
			$arr['user_name'] = $check['user_name'];
			
			$auth = $this->db->select('auth_id')
				->where('user_type_id', $check['user_type_id'])
				->get('user_auth_table')->result_array();
			$arr['auth_list'] = $auth;
			$_SESSION['user_name'] = $check['user_name'];
			$_SESSION['user_id'] = $arr['user_id'];
			$_SESSION['auth_list'] = $auth;
			$_SESSION['user_type_id'] = $check['user_type_id'];
			
			$this->session->set_userdata('logged_in', '1');
			
			//debug($this->session->all_userdata());
			
			echo 'success';
		}else{
			echo 'error';
		}
		
	}
	
	

}

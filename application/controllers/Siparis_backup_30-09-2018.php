<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siparis extends CI_Controller {
	
	public function __construct() {    
        parent::__construct();  
		
      if($_SESSION['logged_in'] != '1'){
		redirect(LOGIN_PAGE);
	  }
        
    }
	
	public function user_login_post(){
		$post = $this->input->post();
		
		//debug($_SESSION);
		
		$check = $this->db->select('*')
			->where('user_type_id', $post['user_type_id'])
			->where('password', $post['password'])
			->get('users_table')->row_array();
		//debug($check);
		if(empty($check)){
			$data['user_types'] = $this->db->select('*')
				->get('user_types_table')->result_array();
			$data['status'] = 'fail';
			$this->load->view('user_login_view', $data);
		}else{
			
			unset($_SESSION['user_auth_list']);
			
			$user = $check;
			$_SESSION['logged_in'] = '1';
			$_SESSION['user_type_id'] = $user['user_type_id'];
			
			//debug($_SESSION);
			
			redirect(MAIN_BOARD);
			
		}
		
	}
	
	public function main_board(){
		
		/* $auth_list = $this->db->select('*')
			->where('user_type_id', $_SESSION['user_type_id'])
			->get('user_auth_table')->result_array();
		//debug($auth_list);
		foreach($auth_list as $key => $val){
			$_SESSION['user_auth_list'][$val['auth_id']] = '1';
		} */
		$SES = $this->session->all_userdata();
		//debug($SES);
		
		$this->load->view('main_board_view', $data);
		
	}
	
	public function settings(){
		
		$this->load->view('settings_view', $data);
		
	}
	
	public function web_settings(){
		$data['mm'] = '22';
		$this->load->view('web_settings_view', $data);
		
	}
	
	public function user_settings(){
		$data['user_types'] = $this->db->select('*')
			->get('user_types_table')->result_array();
		
		$data['payment_types'] = $this->db->select('*')
			->get('payment_types_table')->result_array();
		
		$data['payment_types2'] = $this->db->select('*')
			->where('status', '1')
			->get('payment_types_table')->result_array();
		
		foreach( $data['payment_types2'] as $key => $val ){
			$data['payment_types2'][$key]['sub_payments'] = $this->db->select('*')
				->where('payment_id', $val['payment_id'])
				->get('payment_subtypes_table')->result_array();
		}
		
		$data['authentications'] = $this->db->select('*')
			->get('user_authentication_table')->result_array();	
		
		$data['settings'] = $this->db->select('*')
			->where('id', '1')
			->get('settings_table')->row_array();

		$data['kitchen_time'] = $data['settings']['kitchen_time'] / 60;
		
		$data['user_list'] = $this->db->select('*')
			->get('users_table')->result_array();
		$data['mm'] = '14';
		$data['mt'] = '14';
		$data['mt2'] = '14_1';
		$this->load->view('user_settings_view', $data);
		
	}
	
	public function user_settings2(){
		$data['user_types'] = $this->db->select('*')
			->get('user_types_table')->result_array();
		
		$data['authentications'] = $this->db->select('*')
			->get('user_authentication_table')->result_array();	
		
		$data['settings'] = $this->db->select('*')
			->where('id', '1')
			->get('settings_table')->row_array();

		$data['kitchen_time'] = $data['settings']['kitchen_time'] / 60;
		
		$data['user_list'] = $this->db->select('*')
			->get('users_table')->result_array();
		$data['mm'] = '14';
		$data['mt'] = '14';
		$data['mt2'] = '14_2';
		$this->load->view('user_settings_view2', $data);
		
	}
	
	public function user_settings3(){
		$data['user_types'] = $this->db->select('*')
			->get('user_types_table')->result_array();
		
		$data['authentications'] = $this->db->select('*')
			->get('user_authentication_table')->result_array();	
		
		$data['settings'] = $this->db->select('*')
			->where('id', '1')
			->get('settings_table')->row_array();

		$data['kitchen_time'] = $data['settings']['kitchen_time'] / 60;
		
		$data['user_list'] = $this->db->select('*')
			->get('users_table')->result_array();
		$data['mm'] = '14';
		$data['mt'] = '14';
		$data['mt2'] = '14_3';
		$this->load->view('user_settings_view3', $data);
		
	}
	
	public function get_user_info($uid){
		$data['user_info'] = $this->db->select('*')
			->where('user_id', $uid)
			->get('users_table')->row_array();
		$data['user_types'] = $this->db->select('*')
			->get('user_types_table')->result_array();
		$this->load->view('update_user_view', $data);
	}
	
	public function adisyon_post(){
		$post = $this->input->post();
		//debug($post);
		
		$settings = $this->db->select('*')
			->where('id', '1')
			->get('settings_table')->row_array();
		
		
		$upd['adisyon_header'] = $post['adisyon_header'];
		$upd['adisyon_footer'] = $post['adisyon_footer'];
	
		if(empty($settings)){
			$this->db->insert('settings_table', $upd);
		}else{
			$this->db->update('settings_table', $upd, array('id' => 1));
		}
	
			 
		if($this->db->affected_rows() > 0){
			echo 'ok'; 
		}else{
			echo 'error';
		}
	}
	
	public function update_user_post(){
		$post = $this->input->post();
			
			$check = $this->db->select('*')
				->where('password', $post['password'])
				->where('user_id !=', $post['user_id'])
				->get('users_table')->row_array();
			
			if(empty($check)){
				$whr['user_id'] = $post['user_id'];
				$upd['user_name'] = $post['user_name'];
				$upd['user_type_id'] = $post['user_type_id'];
				$upd['password'] = $post['password'];
					$this->db->update('users_table', $upd, $whr);
				
				if($this->db->affected_rows() > 0){
					echo 'success';
				}else{
					echo 'error';
				}
				
			}else{
				echo 'Lütfen farklı bir şifre seçiniz!';
			}
		
	}
	
	public function add_user_post(){
		$post = $this->input->post();
		
		if( ($post['user_name'] != '') AND ($post['password'] != '') ){
			
			$check = $this->db->select('*')
				->where('password', $post['password'])
				->get('users_table')->row_array();
			
			if(empty($check)){
				$ins['user_name'] = $post['user_name'];
				$ins['user_type_id'] = $post['user_type_id'];
				$ins['password'] = $post['password'];
				$ins['user_insert_time'] = time();
					$this->db->insert('users_table', $ins);
				
				if($this->db->affected_rows() > 0){
					$_SESSION['success'] = 'İşlem Başarılı!';
					redirect($_SERVER['HTTP_REFERER']);
				}else{
					$_SESSION['error'] = 'Hata oluştu!';
					redirect($_SERVER['HTTP_REFERER']);
				}
				
			}else{
				$_SESSION['error'] = 'Hata oluştu!';
				redirect($_SERVER['HTTP_REFERER']);
			}
			
			
		}
		
	}
	
	public function update_settings(){
		
		$data['settings'] = $this->db->select('*')
			->where('id', '1')
			->get('settings_table')->row_array();
		$this->load->view('update_settings_view', $data);
		
	}
	
	public function update_footer(){
		
		$data['settings'] = $this->db->select('*')
			->where('id', '1')
			->get('footer_settings_table')->row_array();
		$this->load->view('update_settings_view2', $data);
		
	}
	
	public function update_footer_post(){
		
		$post = $this->input->post();
		
		$settings = $this->db->select('*')
			->where('id', '1')
			->get('footer_settings_table')->row_array();
		
		$upd['address'] = $post['address'];
		$upd['phone'] = $post['phone'];
		$upd['phone2'] = $post['phone2'];
		$upd['email'] = $post['email'];
		$upd['workHours'] = $post['workHours'];
	
		if(empty($settings)){
			$this->db->insert('footer_settings_table', $upd);
		}else{
			$this->db->update('footer_settings_table', $upd, array('id' => 1));
		}
	
			 
		if($this->db->affected_rows() > 0){
			redirect($_SERVER['HTTP_REFERER']); 
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
		
	}
	
	public function update_settings_post(){
		$post = $this->input->post();
		
		$settings = $this->db->select('*')
			->where('id', '1')
			->get('settings_table')->row_array();
		
		$upd['store_name'] = $post['store_name'];
		$upd['address'] = $post['address'];
		$upd['phone'] = $post['phone'];
		$upd['email'] = $post['email'];
		$upd['pin_code'] = $post['pin_code'];
		$upd['last_update'] = date('d-m-Y H:i:s', time());
	
		if(empty($settings)){
			$this->db->insert('settings_table', $upd);
		}else{
			$this->db->update('settings_table', $upd, array('id' => 1));
		}
	
			 
		if($this->db->affected_rows() > 0){
			redirect($_SERVER['HTTP_REFERER']); 
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
		//debug($post);
	}
	
	public function pin_code_post(){
		$post = $this->input->post();
		
		$settings = $this->db->select('*')
			->where('id', '1')
			->get('settings_table')->row_array();
		
		
		$upd['pin_code'] = $post['pin_code'];
		$upd['last_update'] = date('d-m-Y H:i:s', time());
	
		if(empty($settings)){
			$this->db->insert('settings_table', $upd);
		}else{
			$this->db->update('settings_table', $upd, array('id' => 1));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function kitchen_time_post(){
		$post = $this->input->post();
		
		$settings = $this->db->select('*')
			->where('id', '1')
			->get('settings_table')->row_array();
		
		
		$upd['kitchen_time'] = $post['kitchen_time'] * 60;
		$upd['last_update'] = date('d-m-Y H:i:s', time());
	
		if(empty($settings)){
			$this->db->insert('settings_table', $upd);
		}else{
			$this->db->update('settings_table', $upd, array('id' => 1));
		}
	
			 
		if($this->db->affected_rows() > 0){
			redirect($_SERVER['HTTP_REFERER']); 
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
		//debug($post);
	}
	
	public function lock_time_post(){
		$post = $this->input->post();
		
		$settings = $this->db->select('*')
			->where('id', '1')
			->get('settings_table')->row_array();
		
		
		$upd['lock_time'] = $post['lock_time'];
		$upd['last_update'] = date('d-m-Y H:i:s', time());
	
		if(empty($settings)){
			$this->db->insert('settings_table', $upd);
		}else{
			$this->db->update('settings_table', $upd, array('id' => 1));
		}
	
			 
		if($this->db->affected_rows() > 0){
			echo 'success';
		}else{
			echo 'error';
		}
		//debug($post);
	}
	
	public function lock_screen_post(){
		$post = $this->input->post();
		
		$settings = $this->db->select('*')
			->where('id', '1')
			->get('settings_table')->row_array();
		
		
		$upd['lockScreen'] = $post['lockScreen'];
		$upd['last_update'] = date('d-m-Y H:i:s', time());
	
		if(empty($settings)){
			$this->db->insert('settings_table', $upd);
		}else{
			$this->db->update('settings_table', $upd, array('id' => 1));
		}
	
			 
		if($this->db->affected_rows() > 0){
			$new_settings = $this->db->select('*')
				->where('id', '1')
				->get('settings_table')->row_array();
			echo $new_settings['lockScreen'];
		}else{
			echo 'error';
		}
		//debug($post);
	}
	
	public function check_lock_screen(){
		$settings = $this->db->select('*')
			->where('id', '1')
			->get('settings_table')->row_array();
		
		echo json_encode($settings); die();
		
	}
	
	public function payment_type_post(){
		$post = $this->input->post();
		
		$settings = $this->db->select('*')
			->where('id', '1')
			->get('settings_table')->row_array();
		
		if(!empty($post['cash'])){
			$cash = 1;
		}else{
			$cash = 0;
		}
		if(!empty($post['cc'])){
			$cc = 1;
		}else{
			$cc = 0;
		}
		if(!empty($post['open'])){
			$open = 1;
		}else{
			$open = 0;
		}
		if(!empty($post['meal'])){
			$meal = 1;
		}else{
			$meal = 0;
		}
		
		$upd['cash'] = $cash;
		$upd['cc'] = $cc;
		$upd['open'] = $open;
		$upd['meal'] = $meal;
		$upd['last_update'] = date('d-m-Y H:i:s', time());
	
		if(empty($settings)){
			$this->db->insert('settings_table', $upd);
		}else{
			$this->db->update('settings_table', $upd, array('id' => 1));
		}
	
			 
		if($this->db->affected_rows() > 0){
			redirect($_SERVER['HTTP_REFERER']); 
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
		//debug($post);
	}
	
	public function cash_process(){
		$data['mm'] = '13';
		$data['mt'] = '13_1';
		$this->load->view('cash_process_view', $data);
	}
	
	public function cash_preview(){
		
		$data['closed_days'] = $this->db->select('*')
			->limit(5)
			->order_by('day_id', 'DESC')
			->where('day_end_time > 0')
			->get('days_table')->result_array();
		$data['open_day'] = $this->db->select('*')
			->where('day_end_time', '0')
			->get('days_table')->row_array();
		//debug($data['open_day']);
		if(!empty($data['open_day'])){
			$data['payments'] = $this->db->select('*')
			->where('payment_time >=', $data['open_day']['day_start_time'])
			->where('payment_time <=', time())
			->get('order_payments_table')->result_array();
		}
		
		
		//debug($data['payments']);
		
		$this->load->view('cash_preview_view', $data);
	}
	
	public function day_details($day_id){
		
		$data['day'] = $this->db->select('*')
			->where('day_id', $day_id)
			->get('days_table')->row_array();
		
		$data['payments'] = $this->db->select('*')
			->where('payment_time >=', $data['day']['day_start_time'])
			->where('payment_time <=', $data['day']['day_end_time'])
			->get('order_payments_table')->result_array();
		//debug($data);
		
		$this->load->view('day_details_view', $data);
	}
	
	public function open_day_details($day_id){
		
		$data['day'] = $this->db->select('*')
			->where('day_id', $day_id)
			->get('days_table')->row_array();
		
		$fdate = $data['day']['day_start_time'];
		$ldate = time();
		
		$data['payments'] = $this->db->select('*')
			->where('payment_time >=', $data['day']['day_start_time'])
			->get('order_payments_table')->result_array();
		
		
		$data['titleText'] = date('d/m/Y H:i', $fdate).' - '.date('d/m/Y H:i', $ldate).' Tarihleri Arası Adisyon Raporları';
		$data['list'] = $this->db->select('*')
			->join('tables_table', 'orders_table.table_id = tables_table.table_id', 'left')
			->where('order_insert_time >= ', $fdate)
			->where('order_insert_time <= ', $ldate)
			->get('orders_table')->result_array();
		//debug($data['list']);
		foreach($data['list'] as $key => $val){
			$data['list'][$key]['details'] = $this->db->select('*')
				->where('order_id', $val['order_id'])
				->get('order_details_table')->result_array();
			$data['list'][$key]['cash'] = $this->db->select_sum('paid_price')
				->where('payment_type', 'cash')
				->where('order_id', $val['order_id'])
				->get('order_payments_table')->row_array();
			$data['list'][$key]['credit'] = $this->db->select_sum('paid_price')
				->where('payment_type', 'credit')
				->where('order_id', $val['order_id'])
				->get('order_payments_table')->row_array();
			$data['list'][$key]['open'] = $this->db->select_sum('paid_price')
				->where('payment_type', 'open')
				->where('order_id', $val['order_id'])
				->get('order_payments_table')->row_array();
			$data['list'][$key]['discount'] = $this->db->select_sum('paid_price')
				->where('payment_type', 'discount')
				->where('order_id', $val['order_id'])
				->get('order_payments_table')->row_array();
			$data['list'][$key]['mealCard'] = $this->db->select_sum('paid_price')
				->where('payment_type', 'mealCard')
				->where('order_id', $val['order_id'])
				->get('order_payments_table')->row_array();
		}
		
		//debug($data['list']);
		
		
		
		$data['orders'] = $this->db->select('order_id')
			->where('order_insert_time >=', $fdate)
			->where('order_insert_time <=', $ldate)
			->get('orders_table')->result_array();
		
		foreach($data['orders'] as $key => $val){
			$data['orders'][$key]['details'] = $this->db->select('order_details_table.pro_id, total_price, cat_id')
				->join('menu_cat_product_table', 'order_details_table.pro_id = menu_cat_product_table.pro_id', 'left')
				->where('order_id', $val['order_id'])
				->get('order_details_table')->result_array(); 
			foreach($data['orders'][$key]['details'] as $kk => $vv){
				$new[] = $vv;
			}
		}
		
		foreach($new as $key => $value){
		   $newarray[$value['cat_id']][$key] = $value;
		}

		foreach($newarray as $key => $val){
			$data['list2'][$key] = $this->db->select('cat_id, cat_name')
				->where('cat_id', $key)
				->get('menu_cats_table')->row_array();
			foreach($val as $kk => $vv){
				$data['list2'][$key]['total'] += $vv['total_price'];
			}
			 
		}
		
		function compareOrder($a, $b)
		{
		  return $b['total'] - $a['total'];
		}
		usort($data['list2'], 'compareOrder');
		
		//debug($data['list2']);
		
		$this->load->view('day_details_view', $data);
	}
	
	public function month_details($fdate, $ldate){
		
		//$post = $this->input->post();
		
		//if(!empty($post)){
			//die("1");
			//$fdate = strtotime($fdate);
			//$ldate = strtotime($ldate);
		/* }else{
			//die("2");
			$fdate = strtotime(date('01-m-Y', time()));
			$ldate = time();
		} */
		
		
		
		$data['day']['day_start_time'] = $fdate;
		
		$data['payments'] = $this->db->select('*')
			->where('payment_time >=', $fdate)
			->where('payment_time <=', $ldate)
			->get('order_payments_table')->result_array();
		
		$data['credit_subPayments'] = $this->db->select('payment_subname, sub_p_id')
			->join('payment_subtypes_table', 'order_payments_table.sub_p_id = payment_subtypes_table.payment_sub_id', 'left')
			->where('payment_type', 'credit')
			->where('sub_p_id > 0')
			->group_by('sub_p_id')
			->where('payment_time >=', $fdate)
			->where('payment_time <=', $ldate)
			->get('order_payments_table')->result_array();
		
		foreach($data['credit_subPayments'] as $key => $val){
			$data['credit_subPayments'][$key]['total'] = $this->db->select_sum('paid_price')
				->where('sub_p_id', $val['sub_p_id'])
				->get('order_payments_table')->row_array();
		}
		
		
		$data['mealcard_subPayments'] = $this->db->select('payment_subname, sub_p_id')
			->join('payment_subtypes_table', 'order_payments_table.sub_p_id = payment_subtypes_table.payment_sub_id', 'left')
			->where('payment_type', 'mealcard')
			->where('sub_p_id > 0')
			->group_by('sub_p_id')
			->where('payment_time >=', $fdate)
			->where('payment_time <=', $ldate)
			->get('order_payments_table')->result_array();
		
		foreach($data['mealcard_subPayments'] as $key => $val){
			$data['mealcard_subPayments'][$key]['total'] = $this->db->select_sum('paid_price')
				->where('sub_p_id', $val['sub_p_id'])
				->get('order_payments_table')->row_array();
		}
		
		
		$data['titleText'] = date('d/m/Y H:i', $fdate).' - '.date('d/m/Y H:i', $ldate).' Tarihleri Arası Adisyon Raporları';
		$data['list'] = $this->db->select('*')
			->join('tables_table', 'orders_table.table_id = tables_table.table_id', 'left')
			->where('order_insert_time >= ', $fdate)
			->where('order_insert_time <= ', $ldate)
			->get('orders_table')->result_array();
		//debug($data['list']);
		foreach($data['list'] as $key => $val){
			$data['list'][$key]['details'] = $this->db->select('*')
				->join('porsions_table', 'order_details_table.porsion_id = porsions_table.id', 'left')
				->where('order_id', $val['order_id'])
				->get('order_details_table')->result_array();
			
			foreach( $data['list'][$key]['details'] as $kk => $vv ){
				if($vv['description'] == 'İptal'){
					$data['iptal'] += ($vv['porsion_price'] * $vv['qty']);
				}
				if($vv['description'] == 'İkram'){
					$data['ikram'] += ($vv['porsion_price'] * $vv['qty']);
				}
			}
			
			$data['list'][$key]['cash'] = $this->db->select_sum('paid_price')
				->where('payment_type', 'cash')
				->where('order_id', $val['order_id'])
				->get('order_payments_table')->row_array();
			
			$data['list'][$key]['credit'] = $this->db->select_sum('paid_price')
				->where('payment_type', 'credit')
				->where('order_id', $val['order_id'])
				->get('order_payments_table')->row_array();
			
			$data['list'][$key]['open'] = $this->db->select_sum('paid_price')
				->where('payment_type', 'open')
				->where('order_id', $val['order_id'])
				->get('order_payments_table')->row_array();
			$data['list'][$key]['discount'] = $this->db->select_sum('paid_price')
				->where('payment_type', 'discount')
				->where('order_id', $val['order_id'])
				->get('order_payments_table')->row_array();
			$data['list'][$key]['mealCard'] = $this->db->select_sum('paid_price')
				->where('payment_type', 'mealCard')
				->where('order_id', $val['order_id'])
				->get('order_payments_table')->row_array();
		}
		
		//debug($data);
		
		
		
		$data['orders'] = $this->db->select('order_id')
			->where('order_insert_time >=', $fdate)
			->where('order_insert_time <=', $ldate)
			->get('orders_table')->result_array();
		
		foreach($data['orders'] as $key => $val){
			$data['orders'][$key]['details'] = $this->db->select('order_details_table.pro_id, total_price, cat_id')
				->join('menu_cat_product_table', 'order_details_table.pro_id = menu_cat_product_table.pro_id', 'left')
				->where('order_id', $val['order_id'])
				->get('order_details_table')->result_array(); 
			foreach($data['orders'][$key]['details'] as $kk => $vv){
				$new[] = $vv;
			}
		}
		
		foreach($new as $key => $value){
		   $newarray[$value['cat_id']][$key] = $value;
		}

		foreach($newarray as $key => $val){
			$data['list2'][$key] = $this->db->select('cat_id, cat_name')
				->where('cat_id', $key)
				->get('menu_cats_table')->row_array();
			foreach($val as $kk => $vv){
				$data['list2'][$key]['total'] += $vv['total_price'];
			}
			 
		}
		
		function compareOrder($a, $b)
		{
		  return $b['total'] - $a['total'];
		}
		usort($data['list2'], 'compareOrder');
		
		$data['mm'] = '16';
		$data['mt'] = '16';
		$data['mt2'] = '16_3';
		
		$data['most'] = $this->db->select('products_table2.pro_name, order_details_table.pro_id, count(*) as c')
		->join('products_table2', 'order_details_table.pro_id = products_table2.pro_id')
		->group_by('order_details_table.pro_id')
		->order_by('c', 'DESC')
		->limit(10)
		->get('order_details_table')->result_array();
		
		//debug($data['list2']);
		
		$this->load->view('month_details_view', $data);
	}
	
	public function make_payment_post(){
		$post = $this->input->post();
		
		$amount = str_replace(",",".",$post['paymentAmount']);
		$desc = $post['desc'];
		
		$ins['order_id'] = '0';
		$ins['paid_price'] = -$amount;
		$ins['payment_type'] = 'out';
		$ins['payment_time'] = time();
		$ins['payment_description'] = $desc;
			$this->db->insert('order_payments_table', $ins);
		
		
		if($this->db->affected_rows() > 0){
			echo 'success'; die();
		}else{
			echo 'error'; die();
		}
		
	}
	
	public function day_process(){
		$data['last_day'] = $this->db->select('*')
			->where('day_end_time', '0')
			->get('days_table')->row_array();
		
		$this->load->view('day_process_view', $data);
	}
	
	public function day_start(){
		$check = $this->db->select('*')
			->where('day_end_time', '0')
			->get('days_table')->row_array();
		
		if(empty($check)){
			$ins['day_start_time'] = time();
				$this->db->insert('days_table', $ins);
			
			if($this->db->affected_rows() > 0){
				echo 'success';
			}
		}else{
			echo 'Daha önce gün başı yapılmıştır!';
		
		}
		
	}
	
	public function day_end(){
		$check = $this->db->select('*')
			->where('day_end_time', '0')
			->get('days_table')->row_array();
		//debug($check);
		if(!empty($check)){
			
			$open_tables = $this->db->select('table_id')
				->where('is_busy', '1')
				->get('tables_table')->result_array();
			
			if(empty($open_tables)){
				//$upd['day_end_time'] = time();
					//$this->db->update('days_table', $upd, array('day_id' => $check['day_id']));
				
				
					$data['title'] = 'Başarılı!';
					$data['status'] = 'success';
					$data['msg'] = 'Gün sonu yapılmıştır!';
					$data['link'] = OPEN_DAY_DETAIL_PAGE.$check['day_id'];
					
					echo json_encode($data);
				
			}else{
				//$this->session->set_flashdata('error', 'GÜN SONU YAPMADAN ÖNCE LÜTFEN AÇIK OLAN MASALARI KAPATINIZ!');
				//redirect( $_SERVER['HTTP_REFERER'] );
				$data['title'] = 'Oops...';
				$data['status'] = 'error';
				$data['msg'] = 'Gün sonu yapabilmek için, açık olan masaları kapatmanız gerekmektedir.';
				echo json_encode($data);
			}
			
			
			
		}else{
			$data['title'] = 'Oops...';
			$data['status'] = 'error';
			$data['msg'] = 'Gün sonu yapabilmek için, ilk olarak gün başı yapmanız gerekmektedir.';
			echo json_encode($data);
		}
		
	}

	public function day_end_post($day_id){
		
		
		$open_tables = $this->db->select('table_id')
			->where('is_busy', '1')
			->get('tables_table')->result_array();
		
		if(empty($open_tables)){
			$whr['day_id'] = $day_id;
			$upd['day_end_time'] = time();
			$this->db->update('days_table', $upd, $whr);
			
			if($this->db->affected_rows() > 0){
				echo 'success'; die();
			}
		}else{
			echo 'Açık Masalar bulunmaktadır! Gün sonu yapamazsınız.';
		}
			
		
	}
	
	public function tables(){
		
		$check = $this->db->select('*')
			->where('day_end_time', '0')
			->get('days_table')->row_array();
		
		if(empty($check)){
			
			echo 'error';
			die();
			
		}
		$data['zones'] = $this->db->select('*')
			->get('zones_table')->result_array();
		
		$data['tables'] = $this->db->select('*')
				->order_by('table_id', 'ASC')
				->where('status', '0')
				->where('table_zone > 0')
				->get('tables_table')->result_array();
		
		foreach($data['tables'] as $kk => $vv){
				$data['tables'][$kk]['total'] = $this->db->select('*')
					->where('table_id', $vv['table_id'])
					->order_by('order_id', 'DESC')
					->limit(1)
					->get('orders_table')->row_array();
			}
		
		foreach($data['zones'] as $key => $val){
			$data['zones'][$key]['tables'] = $this->db->select('*')
				->where('table_zone', $val['zone_id'])
				->order_by('table_id', 'ASC')
				->get('tables_table')->result_array();
			
			foreach($data['zones'][$key]['tables'] as $kk => $vv){
				$data['zones'][$key]['tables'][$kk]['total'] = $this->db->select('*')
					->where('table_id', $vv['table_id'])
					->order_by('order_id', 'DESC')
					->limit(1)
					->get('orders_table')->row_array();
			}
		
		}
		
		$this->load->view('tables_view', $data);
	}
	
	public function tables_mobile(){
		
		$check = $this->db->select('*')
			->where('day_end_time', '0')
			->get('days_table')->row_array();
		
		if(empty($check)){
			$this->session->set_flashdata('error', 'GÜN BAŞI YAPMANIZ GEREKMEKTEDİR');
			redirect( $_SERVER['HTTP_REFERER'] );
			
		}
		$data['zones'] = $this->db->select('*')
			->get('zones_table')->result_array();
		
		$data['tables'] = $this->db->select('*')
				->order_by('table_id', 'ASC')
				->where('status', '0')
				->where('table_zone > 0')
				->get('tables_table')->result_array();
		
		foreach($data['tables'] as $kk => $vv){
				$data['tables'][$kk]['total'] = $this->db->select('*')
					->where('table_id', $vv['table_id'])
					->order_by('order_id', 'DESC')
					->limit(1)
					->get('orders_table')->row_array();
			}
		
		foreach($data['zones'] as $key => $val){
			$data['zones'][$key]['tables'] = $this->db->select('*')
				->where('table_zone', $val['zone_id'])
				->order_by('table_id', 'ASC')
				->get('tables_table')->result_array();
			
			foreach($data['zones'][$key]['tables'] as $kk => $vv){
				$data['zones'][$key]['tables'][$kk]['total'] = $this->db->select('*')
					->where('table_id', $vv['table_id'])
					->order_by('order_id', 'DESC')
					->limit(1)
					->get('orders_table')->row_array();
			}
		
		}
		
		$this->load->view('tables_view', $data);
	}
	
	public function tables2(){
		
		$check = $this->db->select('*')
			->where('day_end_time', '0')
			->get('days_table')->row_array();
		
		if(empty($check)){
			$this->session->set_flashdata('error', 'GÜN BAŞI YAPMANIZ GEREKMEKTEDİR');
			redirect( $_SERVER['HTTP_REFERER'] );
			
		}
		$data['zones'] = $this->db->select('*')
			->get('zones_table')->result_array();
		
		$data['tables'] = $this->db->select('*')
				->order_by('table_id', 'ASC')
				->where('status', '0')
				->get('tables_table')->result_array();
		
		foreach($data['tables'] as $kk => $vv){
				$data['tables'][$kk]['total'] = $this->db->select('*')
					->where('table_id', $vv['table_id'])
					->order_by('order_id', 'DESC')
					->limit(1)
					->get('orders_table')->row_array();
			}
		
		foreach($data['zones'] as $key => $val){
			$data['zones'][$key]['tables'] = $this->db->select('*')
				->where('table_zone', $val['zone_id'])
				->order_by('table_id', 'ASC')
				->get('tables_table')->result_array();
			
			foreach($data['zones'][$key]['tables'] as $kk => $vv){
				$data['zones'][$key]['tables'][$kk]['total'] = $this->db->select('*')
					->where('table_id', $vv['table_id'])
					->order_by('order_id', 'DESC')
					->limit(1)
					->get('orders_table')->row_array();
			}
		
		}
		
		$this->load->view('tables_view2', $data);
	}
	
	public function zones_list(){
		$data['list'] = $this->db->select('*')
			->get('zones_table')->result_array();
		foreach($data['list'] as $key => $val){
			$data['list'][$key]['num'] = $this->db->select('table_id,table_zone')
				->where('table_zone', $val['zone_id'])
				->get('tables_table')->num_rows();
		}
		$data['tables_list'] = $this->db->select('*')
			->order_by('table_id', 'ASC')
			->get('tables_table')->result_array();
		//debug($data);
	$this->load->view('zones_list_view', $data);
	
	}
	
	public function add_zone(){
		$data['list'] = $this->db->select('*')
			->get('zones_table')->result_array();
		
		$this->load->view('add_zone_view', $data);
	}
	
	public function add_zone_post(){
		$post = $this->input->post();
		if($post['zone_name'] != ''){
				$ins['zone_name'] = $post['zone_name'];
					$this->db->insert('zones_table', $ins);
			
		}
		
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', 'İŞLEM BAŞARILI!');
			redirect( $_SERVER['HTTP_REFERER'] );
		}else{
			$this->session->set_flashdata('error', 'İŞLEM HATALI!');
			redirect( $_SERVER['HTTP_REFERER'] );
		}
	}
	
	public function update_zone($zone_id){
		$data['zone'] = $this->db->select('*')
			->where('zone_id', $zone_id)
			->get('zones_table')->row_array();
		$data['list'] = $this->db->select('*')
			->get('zones_table')->result_array();
		$this->load->view('update_zone_view', $data);
	}
	
	public function update_zone_post(){
		$post = $this->input->post();
		//debug($post);
		if($post['zone_name'] != ''){
				$upd['zone_name'] = $post['zone_name'];
					$this->db->update('zones_table', $upd, array('zone_id' => $post['zone_id']));
			
		}
		
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', 'İŞLEM BAŞARILI!');
			redirect( $_SERVER['HTTP_REFERER'] );
		}else{
			$this->session->set_flashdata('error', 'İŞLEM HATALI!');
			redirect( $_SERVER['HTTP_REFERER'] );
		}
	}
	
	public function delete_zone($zone_id){
		$this->db->delete('zones_table', array('zone_id' => $zone_id ));
		if($this->db->affected_rows() > 0){
			echo 'success'; die();
		}
	}
	
	public function tables_list(){
		$data['list'] = $this->db->select('*')
			->order_by('table_id', 'ASC')
			->get('tables_table')->result_array();
		$this->load->view('tables_list_view', $data);
	}
	
	public function zone_tables_list($zone_id){
		
		$data['zone'] = $this->db->select('zone_id, zone_name')
			->where('zone_id', $zone_id)
			->get('zones_table')->row_array();
		$data['title'] = $data['zone']['zone_name'];
		
		$data['zone_list'] = $this->db->select('*')
			->get('zones_table')->result_array();
		
		$data['list'] = $this->db->select('*')
			->order_by('table_id', 'ASC')
			->where('table_zone', $zone_id)
			->get('tables_table')->result_array();
		$this->load->view('zone_tables_list_view', $data);
	}
	
	public function add_table(){
		$data['list'] = $this->db->select('*')
			->get('zones_table')->result_array();
		$this->load->view('add_table_view', $data);
	}
	
	public function add_table_post(){
		$post = $this->input->post();
		//debug($post);
		$post['table_qty'] = $post['table_qty']-1;
		$zone = $this->db->select('*')
			->where('zone_id', $post['zone_id'])
			->get('zones_table')->row_array();
		$tables = $this->db->select('*')
			->where('table_zone', $zone['zone_id'])
			->get('tables_table')->num_rows();
		$c = $tables+1;
		$t = $post['table_qty']+$c;
		if($post['zone_id'] != ''){
			if($post['table_qty'] > 0){
				for($i=$c; $i <= $t; $i++){
					if($i < 10){$zero = '0';} else{$zero = '';}
					$ins['table_name'] = $zone['zone_name'].' - '.$zero.$i;
					$ins['table_zone'] = $post['zone_id'];
						$this->db->insert('tables_table', $ins);
				}
			}
		}
		
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', 'İŞLEM BAŞARILI!');
			redirect( $_SERVER['HTTP_REFERER'] );
		}else{
			$this->session->set_flashdata('error', 'İŞLEM HATALI!');
			redirect( $_SERVER['HTTP_REFERER'] );
		}
		
	}
	
	public function update_table($table_id){
		$data['table'] = $this->db->select('*')
			->where('table_id', $table_id)
			->get('tables_table')->row_array();
		$data['list'] = $this->db->select('*')
			->get('zones_table')->result_array();
		$this->load->view('update_table_view', $data);
	}
	
	public function update_table_post(){
		$post = $this->input->post();
		//debug($post);
		$whr['table_id'] = $post['table_id'];
		if($post['zone_id'] != ''){
			if($post['table_name'] != ''){
				$upd['table_name'] = $post['table_name'];
				$upd['table_zone'] = $post['zone_id'];
					$this->db->update('tables_table', $upd, $whr);
			}
		}
		
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('success', 'İŞLEM BAŞARILI!');
			redirect( $_SERVER['HTTP_REFERER'] );
		}else{
			$this->session->set_flashdata('error', 'İŞLEM HATALI!');
			redirect( $_SERVER['HTTP_REFERER'] );
		}
	}
	
	public function delete_table($table_id){
		//$this->db->update('tables_table', array('status' => '0' ), array('table_id' => $table_id));
		$this->db->delete('tables_table', array('table_id' => $table_id));
		if($this->db->affected_rows() > 0){
			echo 'success'; die();
		}
	}
	
	public function get_rest_price($order_id){
		$order = $this->db->select('*')
			->where('order_id', $order_id)
			->get('orders_table')->row_array();
		//debug($order);
		echo json_encode($order);
	}
	
	public function table($table_id){
		//$this->output->enable_profiler(TRUE);
		
		$data['cats'] = $this->db->select('*')
			->where('type', '1')
			->order_by('sort', 'ASC')
			->get('menu_cats_table')->result_array(); 

		
		//debug($data['cats']);
		$data['table'] = $this->db->select('*')
			->where('table_id', $table_id)
			->get('tables_table')->row_array();
		
		if($data['table']['is_busy'] == '1'){
			$data['last_order'] = $this->db->select('*')
				->where('table_id', $table_id)
				->order_by('order_id', 'DESC')
				->limit(1)
				->get('orders_table')->row_array();
			
			$data['payments'] = $this->db->select('*')
				->where('order_id', $data['last_order']['order_id'])
				->where('payment_type !=', 'discount')
				->get('order_payments_table')->result_array();
			$data['discounts'] = $this->db->select('*')
				->where('order_id', $data['last_order']['order_id'])
				->where('payment_type', 'discount')
				->get('order_payments_table')->result_array();
			
		}
		//debug($data['last_order']);
		if($data['last_order']['customer_id'] > 0){
			$data['customer'] = $this->db->select('*')
				->where('customer_id', $data['last_order']['customer_id'])
				->get('customers_table')->row_array();
		}
		
		$data['order_details'] = $this->db->select('*')
			->where('order_id', $data['last_order']['order_id'])
			->order_by('id', 'ASC')
			->get('order_details_table')->result_array();
		
		$data['tables'] = $this->db->select('*')
			->where('is_busy', '1')
			->where('table_id != ', $table_id)
			->order_by('table_id', 'ASC')
			->get('tables_table')->result_array();
		
		$data['empty_tables'] = $this->db->select('*')
			->where('is_busy', '0')
			->order_by('table_id', 'ASC')
			->get('tables_table')->result_array();
		
		$data['payment_types'] = $this->db->select('*')
			->get('payment_types_table')->result_array();
		
		foreach($data['payment_types'] as $key => $val){
			$data['payment_types'][$key]['sub_payment_types'] = $this->db->select('*')
				->where('payment_id', $val['payment_id'])
				->get('payment_subtypes_table')->result_array();
		}
		
		
		$data['settings'] = $this->db->select('*')
			->where('id', '1')
			->get('settings_table')->row_array();
		
		$this->load->view('order_view', $data); 
	}
	
	public function pack_order_list(){
		$data['pack_tables'] = $this->db->select('*')
			->where('status', '2')
			->limit(20)
			->order_by('table_id', 'DESC')
			->get('tables_table')->result_array();
		foreach($data['pack_tables'] as $key => $val){
			$data['pack_tables'][$key]['order'] = $this->db->select('*')
				->where('table_id', $val['table_id'])
				->get('orders_table')->row_array();
			/* $data['pack_tables'][$key]['order']['details'] = $this->db->select('*')
				->where('order_id', $val['order_id'])
				->get('order_details_table')->result_array(); */
		}
		$this->load->view('pack_order_list_view', $data);
	}
	
	public function new_pack_order(){
		$ins['table_name'] = 'Sipariş';
		$ins['table_zone'] = '0';
		$ins['status'] = '2';
			$this->db->insert('tables_table', $ins);
		
		$table_id = $this->db->insert_id();
		
		if($table_id > 0){
			echo $table_id; die();
		}else{
			echo 'error'; die();
		}
		
	}
	
	
	
	public function table2($table_id){
		//$this->output->enable_profiler(TRUE);
		
		$data['cats'] = $this->db->select('*')
			->where('type', '1')
			->order_by('sort', 'ASC')
			->get('menu_cats_table')->result_array(); 

		
		//debug($data['cats']);
		$data['table'] = $this->db->select('*')
			->where('table_id', $table_id)
			->get('tables_table')->row_array();
		
		if($data['table']['is_busy'] == '1'){
			$data['last_order'] = $this->db->select('*')
				->where('table_id', $table_id)
				->order_by('order_id', 'DESC')
				->limit(1)
				->get('orders_table')->row_array();
			
			$data['payments'] = $this->db->select('*')
				->where('order_id', $data['last_order']['order_id'])
				->where('payment_type !=', 'discount')
				->get('order_payments_table')->result_array();
			$data['discounts'] = $this->db->select('*')
				->where('order_id', $data['last_order']['order_id'])
				->where('payment_type', 'discount')
				->get('order_payments_table')->result_array();
			
		}
		//debug($data['last_order']);
		if($data['last_order']['customer_id'] > 0){
			$data['customer'] = $this->db->select('*')
				->where('customer_id', $data['last_order']['customer_id'])
				->get('customers_table')->row_array();
		}
		
		$data['order_details'] = $this->db->select('*')
			->where('order_id', $data['last_order']['order_id'])
			->get('order_details_table')->result_array();
		
		$data['tables'] = $this->db->select('*')
			->where('is_busy', '1')
			->where('table_id != ', $table_id)
			->order_by('table_id', 'ASC')
			->get('tables_table')->result_array();
		
		$data['empty_tables'] = $this->db->select('*')
			->where('is_busy', '0')
			->order_by('table_id', 'ASC')
			->get('tables_table')->result_array();
		
		$this->load->view('order_view2', $data); 
	}
	
	public function get_payments($order_id){
		$data['order'] = $this->db->select('paid_price, rest_price')
			->where('order_id', $order_id)
			->get('orders_table')->row_array();
		$data['order']['payments'] = $this->db->select('paid_price, payment_type')
			->where('order_id', $order_id)
			->get('order_payments_table')->result_array(); 
		echo json_encode($data['order']);
		
	}
	
	public function siparis_post(){
		$post = $this->input->post();
		//debug($post);
		
		
		if(!empty($post['pro_id'])){
			
			if(!empty($post['order_id'])){
				
				$upd['total_price'] = array_sum($post['total']);
				$upd['rest_price'] = array_sum($post['total']) - $post['paid_price'];
				$upd['ready'] = '0';
				
					$this->db->update('orders_table', $upd, array('order_id' => $post['order_id']));
				$order_id = $post['order_id'];
				
				$updx['user_id'] = $post['user_id'];
				$updx['table_id'] = $post['table_id'];
				$updx['order_id'] = $post['order_id'];
				$updx['process_type'] = 'update_order';
				$updx['process_time'] = time();
				$updx['process_data'] = json_encode($post);
					$this->db->insert('user_logs_table', $updx);
				
				
			}else{
				$ins['table_id'] = $post['table_id'];
				$ins['total_price'] = array_sum($post['total']);
				$ins['rest_price'] = array_sum($post['total']);
				$ins['order_insert_time'] = time();
			
					$this->db->insert('orders_table', $ins);
				$order_id = $this->db->insert_id();
				
				$insx['user_id'] = $post['user_id'];
				$insx['table_id'] = $post['table_id'];
				$insx['order_id'] = $order_id;
				$insx['process_type'] = 'new_order';
				$insx['process_time'] = time();
				$insx['process_data'] = json_encode($post);
					$this->db->insert('user_logs_table', $insx);
				
			}

			$this->db->delete('order_details_table', array('order_id' => $order_id));
			
				foreach($post['pro_id'] as $key => $val){
					$ins2['order_id'] = $order_id;
					$ins2['pro_id'] = $post['pro_id'][$key];
					$ins2['porsion_id'] = $post['porsion_id'][$key];
					$ins2['pro_name'] = $post['pro_name'][$key];
					$ins2['description'] = $post['desc'][$key];
					$ins2['qty'] = $post['qty'][$key];
					$ins2['price'] = $post['price'][$key];
					$ins2['total_price'] = $post['total'][$key];
					$ins2['printed'] = $post['printed'][$key];
						$this->db->insert('order_details_table', $ins2);
				}
			
			
		}
			$upd3['is_busy'] = '1';
				$this->db->update('tables_table', $upd3, array('table_id' => $post['table_id']));
			
		//redirect($_SERVER['HTTP_REFERER']);
		redirect(TABLES_PAGE);
		
	}
	
	public function save_order_post(){
		$post = $this->input->post();
		//debug($post);
		
		
		if(!empty($post['pro_id'])){
			
			if(!empty($post['order_id'])){
				
				$upd['total_price'] = array_sum($post['total']);
				$upd['rest_price'] = array_sum($post['total']) - $post['paid_price'];
				$upd['ready'] = '0';
				
					$this->db->update('orders_table', $upd, array('order_id' => $post['order_id']));
				$order_id = $post['order_id'];
				
			}else{
				$ins['table_id'] = $post['table_id'];
				$ins['total_price'] = array_sum($post['total']);
				$ins['rest_price'] = array_sum($post['total']);
				$ins['order_insert_time'] = time();
					$this->db->insert('orders_table', $ins);
				$order_id = $this->db->insert_id();
			}

			$this->db->delete('order_details_table', array('order_id' => $order_id));
			
				foreach($post['pro_id'] as $key => $val){
					$ins2['order_id'] = $order_id;
					$ins2['pro_id'] = $post['pro_id'][$key];
					$ins2['porsion_id'] = $post['porsion_id'][$key];
					$ins2['pro_name'] = $post['pro_name'][$key];
					$ins2['description'] = $post['desc'][$key];
					$ins2['qty'] = $post['qty'][$key];
					$ins2['price'] = $post['price'][$key];
					$ins2['total_price'] = $post['total'][$key];
					$ins2['printed'] = $post['printed'][$key];
						$this->db->insert('order_details_table', $ins2);
				}
			if($this->db->affected_rows() > 0){
				$inserted = '1';
			}
			
		}
			$upd3['is_busy'] = '1';
				$this->db->update('tables_table', $upd3, array('table_id' => $post['table_id']));
			
		
		
		if($inserted == '1'){
			$_SESSION['kitchen'] = '1';
			//redirect($_SERVER['HTTP_REFERER']);
			echo 'success';
		}

	}
	
	public function del_pro_perm(){
		$post = $this->input->post();
		//debug($post);
		if(!empty($post['pro_id'])){
			$this->db->delete('products_table2', array('pro_id' => $post['pro_id']) );
			$this->db->delete('product_cats_table2 ', array('pro_id' => $post['pro_id']) );
			$this->db->delete('products_price_table', array('pro_id' => $post['pro_id']) );
			$this->db->delete('products_porsion_table', array('pro_id' => $post['pro_id']) );
		}
		
		
			echo 'success'; die();
		
		
		
	}

	public function payment_post(){
		$post = $this->input->post();
		//debug($post);
		
		$order = $this->db->select('*')
			->where('order_id', $post['order_id'])
			->get('orders_table')->row_array();
		
		if($order['rest_price'] >= $post['amount']){
			$upd['paid_price'] = ($order['paid_price'] + $post['amount']);
			$upd['rest_price'] = ( $order['rest_price'] - $post['amount'] );
				$this->db->update('orders_table', $upd, array('table_id' => $order['table_id']));
			
			if($this->db->affected_rows() > 0){ 
				
				$ins['order_id'] = $post['order_id'];
				if($post['customer_id'] != ''){
					$ins['customer_id'] = $post['customer_id'];
				}
				$ins['paid_price'] = $post['amount'];
				$ins['payment_type'] = $post['payment_type'];
				$ins['sub_p_id'] = $post['sub_p_id'];
				$ins['payment_time'] = time();
					$this->db->insert('order_payments_table', $ins);
				
				if(!empty($this->session->userdata('user_id'))){
					$insx['user_id'] = $this->session->userdata('user_id');
				}
				
				
				$insx['table_id'] = $post['table_id'];
				$insx['order_id'] = $post['order_id'];
				$insx['process_type'] = 'payment';
				$insx['process_time'] = time();
				$insx['process_data'] = json_encode($post);
					$this->db->insert('user_logs_table', $insx);
				
				/* if($upd['rest_price'] == '0'){
					$this->db->update('tables_table', array('is_busy' => '0'), array('table_id' => $order['table_id']));
				} */
				
				echo 'success';
			}
			
		}else{
			echo 'Toplam tutardan daha fazla ödeyemezsiniz!';
		}
		
	}
	
	public function seo_names(){
		$list = $this->db->select('*')
			->get('customers_table')->result_array();
		
		foreach($list as $key => $val){
			$whr['customer_id'] = $val['customer_id'];
			$upd['seo_full_name'] = tr_seo_converter($val['full_name']);
			$this->db->update('customers_table', $upd, $whr);
			
		}
		die("done");
	}
	
	public function add_customer_to_order(){
		$post = $this->input->post();
		//debug($post);
		
		$order_id = $post['order_id'];
		
		if($order_id != ''){
			if(empty($post['customer_id'])){
				
				if($post['phone'] != ''){
					$check = $this->db->select('*')
						->where('phone', $post['phone'])
						->get('customers_table')->row_array();
				}
				
				if(empty($check)){
					
					/* $name_check = $this->db->select('*')
						->where('seo_full_name', tr_seo_converter($post['full_name']))
						->get('customers_table')->row_array(); */
					
						$ins['full_name'] = $post['full_name'];
						$ins['seo_full_name'] = tr_seo_converter($post['full_name']);
						$ins['phone'] = $post['phone'];
						$ins['address'] = $post['address'];
						$ins['email'] = $post['email'];
						$ins['insert_time'] = time();
							$this->db->insert('customers_table', $ins);
						if($this->db->affected_rows() > 0){
							$customer_id = $this->db->insert_id();
						}
					
					
				}else{
					echo 'phone_error'; die();
				}
				
			}else{
				$customer_id = $post['customer_id'];
			}
				$this->db->update('orders_table', array('customer_id' => $customer_id), array('order_id' => $order_id));
			
			if($this->db->affected_rows() > 0){
				echo 'success'; die();
			}else{
				echo 'same_customer'; die();
			}
		}else{
			echo 'empty_table'; die();
		}
		
		
		
	}
	
	public function update_customer_order(){
		$post = $this->input->post();
		//debug($post);
		
		$order_id = $post['order_id'];
		$customer_id = $post['customer_id'];
		
		if( ($order_id > 0) AND ($customer_id > 0 ) ){
			
			$this->db->update('orders_table', array('customer_id' => $customer_id), array('order_id' => $order_id));
			
			if($this->db->affected_rows() > 0){
				echo 'success'; die();
			}else{
				echo 'same_customer'; die();
			}
		}else{
			echo 'empty_table'; die();
		}
		
		
		
	}
	
	public function search_customers(){
		
		$post = $this->input->post();
		//debug($post);
		
		if(!empty($post['name'])){
			$data['name_results'] = $this->db->select('*')
				->like('full_name', $post['name'], 'both')
				->limit(5)
				->get('customers_table')->result_array();
			
			$data['phone_results'] = $this->db->select('*')
				->like('phone', $post['name'], 'both')
				->limit(5)
				->get('customers_table')->result_array();

		}

		$data['results'] = array_merge($data['name_results'],$data['phone_results']);

		if(!empty($data['results'])){
			$results = json_encode($data['results']);
			echo $results;
		}else{
			echo 'noresults'; die();
		}

	}
	
	public function add_note_to_order(){
		$post = $this->input->post();
		//debug($post);
		
		$note = $post['note'];
		$order_id = $post['order_id'];
			$this->db->update('orders_table', array('order_note' => $note), array('order_id' => $order_id));
		
		if($this->db->affected_rows() > 0){
			echo 'success'; die();
		}else{
			echo 'error'; die();
		}
		
	}
	
	public function close_table(){
		$post = $this->input->post();
		
		$table_id = $post['table_id'];
		$order_id = $post['order_id'];
		
		$products = $this->db->select('pro_id,qty,porsion_id')
			->where('order_id', $order_id)
			->get('order_details_table')->result_array();
		//debug($products);
		foreach($products as $key => $val){
			$products[$key]['recipe'] = $this->db->select('*')
				->where('porsion_id', $val['porsion_id'])
				->get('recipes_table')->result_array();
			
			if(!empty($products[$key]['recipe'])){
				foreach($products[$key]['recipe'] as $kk => $vv){
					$ins['order_id'] = $order_id;
					$ins['porsion_id'] = $vv['porsion_id'];
					$ins['pro_id'] = $vv['c_pro_id'];
					$ins['qty'] = ($val['qty'] * $vv['qty']);
					$ins['unit'] = $vv['unit'];
					$ins['insert_time'] = time();
						$this->db->insert('sales_table', $ins);
				}
			}else{
				$ins['order_id'] = $order_id;
				$ins['pro_id'] = $val['pro_id'];
				$ins['qty'] = $val['qty'];
				$ins['unit'] = 'adet';
				$ins['insert_time'] = time();
					$this->db->insert('sales_table', $ins);
			}
			
		}
		
		foreach($products as $key => $val){
			$pro[$key] = $this->db->select('stock')
				->where('pro_id', $val['pro_id'])
				->get('products_table2')->row_array();
			
			$newStock[$key] = $pro[$key]['stock'] - $val['qty'];
			$this->db->update('products_table2', array('stock' => $newStock[$key]), array('pro_id' => $val['pro_id']));
		}
			
			$upd1['ready'] = '1';
				$this->db->update('orders_table', $upd1, array('order_id' => $order_id));
			
			$upd['is_busy'] = '0';
				$this->db->update('tables_table', $upd, array('table_id' => $table_id));
		
		if($this->db->affected_rows() > 0){
			
			if(!empty($this->session->userdata('user_id'))){
				$insx['user_id'] = $this->session->userdata('user_id');
			}
			$insx['table_id'] = $post['table_id'];
			$insx['order_id'] = $order_id;
			$insx['process_type'] = 'close_table';
			$insx['process_time'] = time();
			$insx['process_data'] = json_encode($post);
				$this->db->insert('user_logs_table', $insx);
			
			echo 'success'; die();
		}else{
			echo 'Error Code:80034 Occured!'; die();
		}
		
	}
	
	public function kitchen(){
		
		$SES = $this->session->all_userdata();
		
		//debug($SES);
		
		$data['orders'] = $this->db->select('*')
			->join('tables_table', 'orders_table.table_id = tables_table.table_id', 'left')
			->where('ready', '0')
			->get('orders_table')->result_array();
		
		
		
		foreach($data['orders'] as $key => $val){
			$data['orders'][$key]['order_details'] = $this->db->select('*')
				->where('order_id', $val['order_id'])
				->where('ready', '0')
				->get('order_details_table')->result_array();
		}
		
		$this->load->view('kitchen_view', $data);
		
		
	}
	
	public function complete_1(){
		$post = $this->input->post();
		//debug($post);
		if(!empty($post['id'])){
			$this->db->update('order_details_table', array('ready' => '1'), array('id' => $post['id']));
		}
		
		if($this->db->affected_rows() > 0){
			
			$check = $this->db->select('order_id, id')
			->where('ready', '0')
			->where('order_id', $post['order_id'])
			->get('order_details_table')->result_array();
		
			if(empty($check)){
				$this->db->update('orders_table', array('ready' => '1'), array('order_id' => $post['order_id']));
			}
			
			echo 'success';
		}else{
			echo 'error';
		}
	}
	
	public function complete_all(){
		$post = $this->input->post();
		//debug($post);
		if(!empty($post['order_id'])){
			$this->db->update('orders_table', array('ready' => '1'), array('order_id' => $post['order_id']));
			$this->db->update('order_details_table', array('ready' => '1'), array('order_id' => $post['order_id']));
		}
		
		if($this->db->affected_rows() > 0){
			echo 'success';
		}else{
			echo 'error';
		}
	}
	
	public function reload_orders(){
		
		$data['kitchen'] = $this->db->select('kitchen_time')
			->where('id', '1')
			->get('settings_table')->row_array();
		
		$data['orders'] = $this->db->select('*')
			->join('tables_table', 'orders_table.table_id = tables_table.table_id', 'left')
			->where('ready', '0')
			->get('orders_table')->result_array();
		
		$data['lastOrder'] = $this->db->select('order_id')
			->order_by('order_id', 'DESC')
			->limit(1)
			->get('orders_table')->row_array();
		
		if($data['kitchen']['kitchen_time'] > 0){
			foreach($data['orders'] as $key => $val){
				$close_time = time() - ( $data['kitchen']['kitchen_time'] );
				//debug($close_time); //1524384553 <= 1524168981
				if($val['order_insert_time'] <= $close_time ){
					$this->db->update('orders_table', array('ready' => '1'), array('order_id' => $val['order_id']));
					$this->db->update('order_details_table', array('ready' => '1'), array('order_id' => $val['order_id']));
				}
			}
		}
		
		foreach($data['orders'] as $key => $val){
			$data['orders'][$key]['order_details'] = $this->db->select('*')
				->where('order_id', $val['order_id'])
				->where('ready', '0')
				->get('order_details_table')->result_array();
		}
		
		$this->load->view('kitchen_orders_view', $data);
	}
	
	public function products(){
		$data['cats'] = $this->db->select('*')
			->get('cats_table2')->result_array();
		
		if(empty($data['cats'])){
			$ins['cat_name'] = 'Örnek Grup'; 
			$ins['cat_seo_name'] = tr_seo_converter($ins['cat_name']); 
			$ins['cat_insert_time'] = time(); 
			$this->db->insert('cats_table2', $ins);
		}
		
		$data['cats'] = $this->db->select('*')
			->get('cats_table2')->result_array();
		
		$data['products'] = $this->db->select('*')
			->join('products_table2', 'product_cats_table2.pro_id = products_table2.pro_id', 'left')
			->order_by('products_table2.pro_id', 'ASC')
			->get('product_cats_table2')->result_array();
		foreach($data['products'] as $kk => $vv){
			$data['products'][$kk]['porsions'] = $this->db->select('*')
				->where('pro_id', $vv['pro_id'])
				->get('products_porsion_table')->result_array();
		}
		
		/* foreach($data['cats'] as $key => $val){
			$data['cats'][$key]['products'] = $this->db->select('*')
				->join('products_table2', 'product_cats_table2.pro_id = products_table2.pro_id', 'left')
				->where('cat_id', $val['cat_id'])
				->order_by('products_table2.pro_id', 'ASC')
				->get('product_cats_table2')->result_array();
			foreach($data['cats'][$key]['products'] as $kk => $vv){
				$data['cats'][$key]['products'][$kk]['porsions'] = $this->db->select('*')
					->where('pro_id', $vv['pro_id'])
					->get('products_porsion_table')->result_array();
			}
				
		} */
		
		foreach($data['cats'] as $key => $val){
			$data['cats'][$key]['pro_count'] = $this->db->select('pro_id')
				->where('cat_id', $val['cat_id'])
				->get('product_cats_table2')->num_rows();
		}
		
		$this->load->view('products_view', $data);
		
		
	}
	
	public function cat_products($cat_id){
		$data['cat'] = $this->db->select('*')
			->where('cat_id', $cat_id)
			->get('cats_table2')->row_array();
		
		$data['products'] = $this->db->select('*')
				->join('products_table2', 'product_cats_table2.pro_id = products_table2.pro_id', 'left')
				->where('cat_id', $cat_id)
				->order_by('products_table2.pro_id', 'ASC')
				->get('product_cats_table2')->result_array();
		foreach($data['products'] as $key => $val){
			$data['products'][$key]['porsions'] = $this->db->select('*')
				->where('pro_id', $val['pro_id'])
				->get('products_porsion_table')->result_array();
		}
		//debug($data['products']);
		$this->load->view('cat_products_view',$data);
		
	}
	
	public function all_products(){
		
		$data['products'] = $this->db->select('*')
			->order_by('products_table2.pro_id', 'DESC')
			->get('products_table2')->result_array();
			
		$this->load->view('product_list_view', $data);

	}
	
	/* public function delete_pro($pro_id){
		$this->db->delete('products_table2', array('pro_id' => $pro_id));
		$this->db->delete('product_cats_table2', array('pro_id' => $pro_id));
		$this->db->delete('products_price_table', array('pro_id' => $pro_id));
	} */
	
	public function update_prices(){
		$data['products'] = $this->db->select('pro_id, pro_name')
			->order_by('pro_name', 'ASC')
			->get('products_table2')->result_array();
		
		foreach($data['products'] as $key => $val){
			$data['products'][$key]['options'] = $this->db->select('option_ids, option_price, option_name')
				->join('products_options_table', 'products_price_table.option_ids = products_options_table.option_id', 'left')
				->where('pro_id', $val['pro_id'])
				->get('products_price_table')->result_array();
		}
		//debug($data['products']);
		$data['options'] = $this->db->select('*')
			->get('products_options_table')->result_array();
		$this->load->view('update_prices_view',$data);
	}
	
	public function update_prices_post(){
		$post = $this->input->post();
		//debug($post);
		
		foreach($post['pro'] as $key => $val){
			
			foreach($val['option'] as $kk => $vv){
				if($vv['option_price'] != ''){
					
					$check = $this->db->select('*')
						->where('pro_id', $val['pro_id'])
						->where('option_ids', $vv['option_id'])
						->get('products_price_table')->row_array();
					
					if(!empty($check)){
						$whr['pro_id'] = $val['pro_id'];
						$whr['option_ids'] = $vv['option_id'];
							$this->db->update('products_price_table', array('option_price' => $vv['option_price'], 'last_update' => time() ), $whr);
					}else{
						$ins[$key.$kk]['pro_id'] = $val['pro_id'];
						$ins[$key.$kk]['option_ids'] = $vv['option_id'];
						$ins[$key.$kk]['option_price'] = $vv['option_price'];
						$ins[$key.$kk]['last_update'] = time();
						$this->db->insert('products_price_table', $ins[$key.$kk]);
					}
					
					
				}
			}
			
		}
		
		if( $this->db->affected_rows() > 0 ){
			$this->session->set_flashdata('success', 'İŞLEM BAŞARILI!');
			redirect( $_SERVER['HTTP_REFERER'] );  
		}
		
	}
	
	public function update_product($pro_id){
		
		$data['product'] = $this->db->select('*')
			->where('pro_id', $pro_id)
			->get('products_table2')->row_array();
		$this->load->view('update_product_view',$data);
	}
	
	public function add_product_post(){
		$post = $this->input->post();
		$cat_id = $post['cat_id'];
		//debug($post);
		//$ins['onSale'] = $post['onSale'];
		//$ins['keepStock'] = $post['keepStock'];
		
		$pro_seo_name = tr_seo_converter($post['pro_name']);
		
		$check = $this->db->select('pro_seo_name')
			->where('pro_seo_name', $pro_seo_name)
			->get('products_table2')->row_array();
		
		if(!empty($check)){
			$this->session->set_userdata('error', 'Bu isimle daha önce ürün eklenmiştir!');
			redirect($_SERVER['HTTP_REFERER']);
		}
		
		$ins['pro_name'] = $post['pro_name'];
		$ins['pro_bg'] = $post['pro_bg'];
		$ins['kdv'] = $post['kdv'];
		//$ins['pro_code'] = $post['pro_code'];
		$ins['pro_seo_name'] = tr_seo_converter($post['pro_name']);
		//$ins['pro_description'] = $post['pro_description'];
			$this->db->insert('products_table2', $ins);
		
		$pro_id = $this->db->insert_id();
		
		if(!empty($cat_id)){
			$ins2['pro_id'] = $pro_id;
			$ins2['cat_id'] = $post['cat_id'];
				$this->db->insert('product_cats_table2', $ins2);
		}
		
		if(!empty($post['porsions'])){
			foreach($post['porsions'] as $key => $val){
				$ins[$key]['porsion_name'] = $val;
				//$ins[$key]['porsion_price'] = $post['porsion_price'][$key];
				$ins[$key]['pro_id'] = $pro_id;
					$this->db->insert('porsions_table', $ins[$key]);
			}
		}
		
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function del_porsion($id){
		if($id > 0){
			$this->db->delete('porsions_table', array('id' => $id));
			
			if($this->db->affected_rows() > 0){
				$this->db->delete('recipes_table', array('porsion_id' => $id));
				echo 'success'; 
				die();
			}else{
				echo 'error'; die();
			}
		}
	}
	
	public function del_recipe_product($id){
		if($id > 0){
			$this->db->delete('recipes_table', array('id' => $id));
			
			if($this->db->affected_rows() > 0){
				echo 'success'; 
				die();
			}else{
				echo 'error'; die();
			}
		}
	}
	
	public function add_product_post2(){
		$post = $this->input->post();
		$cat_id = $post['cat_id'];
		if(!empty($post['onSale'])){ $ins['onSale'] = $post['onSale']; }
		if(!empty($post['keepStock'])){ $ins['keepStock'] = $post['keepStock']; }
		if(!empty($post['pro_bg'])){ $ins['pro_bg'] = $post['pro_bg']; }
		
		$ins['proType'] = $post['proType'];
		$ins['pro_name'] = $post['pro_name'];
		$ins['kdv'] = $post['kdv'];
		//$ins['pro_code'] = $post['pro_code'];
		$ins['pro_seo_name'] = tr_seo_converter($post['pro_name']);
		//$ins['pro_description'] = $post['pro_description'];
			$this->db->insert('products_table2', $ins);
		
		$pro_id = $this->db->insert_id();
		
		if(!empty($post['cat_id']))	{
			$ins2['pro_id'] = $pro_id;
				$ins2['cat_id'] = $post['cat_id'];
				$this->db->insert('product_cats_table2', $ins2);
		}

		if($pro_id > 0){
			$pro = $this->db->select('pro_name, pro_id')
				->where('pro_id', $pro_id)
				->get('products_table2')->row_array();
			$pro['msg'] = 'success';
			echo json_encode($pro);
		}else{
			$pro['msg'] = 'error';
			echo json_encode($pro);
		}
		
			
		//redirect($_SERVER['HTTP_REFERER']);
	}

	public function srch_pro(){
		$post = $this->input->post();
		$term = $post['term'];
		
		$data['list'] = $this->db->select('pro_id,pro_name, unitTypes')
			->like('pro_name', $term, 'after')
			->limit(5)
			->get('products_table2')->result_array();
		//debug($data['list']);
		if(!empty($data['list'])){
			foreach($data['list'] as $key => $val){
				$data['list'][$key]['options'] = $this->db->select('id,porsion_name')
					->where('pro_id', $val['pro_id'])
					->get('porsions_table')->result_array();
			}
		}
		//debug($data['list']);
		$this->load->view('srch_results_view', $data);
		
	}
	
	public function srch_pro2(){
		$post = $this->input->post();
		$term = $post['term'];
		
		$data['list'] = $this->db->select('pro_id,pro_name')
			->like('pro_name', $term, 'both')
			->limit(5)
			->get('products_table2')->result_array();
		
		
		
		//debug($data['list']);
		$this->load->view('srch_results_view2', $data);
		
	}
	
	public function update_product_post(){
		
		include( DOC_ROOT.'resize/SimpleImage.php' );
		
		$post = $this->input->post();
		$pro_id = $post['pro_id'];
		//debug($post);
		
		if($pro_id > 0){
			//debug($_FILES);
			if(!empty($_FILES['pro_img']['name'])){
				//die("111");
				
					
					$img_name = uniqid().'.jpg';
					
						$from_file = $_FILES['pro_img']['tmp_name'];
						
						if(file_exists($from_file)){
							$to_file = DOC_ROOT.'img/products/'.$img_name;
							//debug($to_file);
							$this->save_file($from_file, $to_file);
						}
						
						
						
					
				
				
				if(!empty($img_name)){
					$upd['pro_img'] = $img_name;
				}
				
				
			}
		}
		
		$whr['pro_id'] = $pro_id;
		$upd['onSale'] = $post['onSale'];
		$upd['keepStock'] = $post['keepStock'];
		$upd['pro_name'] = $post['pro_name'];
		$upd['pro_bg'] = $post['pro_bg'];
		$upd['kdv'] = $post['kdv'];
		$upd['qty2'] = $post['qty2'];
		$upd['unitT'] = $post['unitT'];
		$upd['unitTypes'] = $post['unitTypes'];
		$upd['pro_code'] = $post['pro_code'];
		$upd['pro_seo_name'] = tr_seo_converter($post['pro_name']);
		$upd['pro_description'] = $post['pro_description'];
			$this->db->update('products_table2', $upd, $whr);
		
		//if(!empty($post['porsions'][0])){
			foreach($post['porsions'] as $key => $val){
				
				if(!empty($post['porsion_id'][$key])){
					$whr[$key]['id'] = $post['porsion_id'][$key];
					$upd[$key]['porsion_name'] = $val;
						$this->db->update('porsions_table', $upd[$key], $whr[$key]);
				}else{
					$ins[$key]['porsion_name'] = $val;
					$ins[$key]['pro_id'] = $pro_id;
						$this->db->insert('porsions_table', $ins[$key]);
				}
				
				
			}
		//}
		
		if(!empty($post['recipe'])){
			foreach($post['recipe'] as $key => $val){
				$this->db->delete('recipes_table', array('porsion_id' => $key));
				foreach($val['pro'] as $kk => $vv){
					$ins11['porsion_id'] = $key;
					$ins11['c_pro_id'] = $val['pro_id'][$kk];
					
					
					if($val['unit'][$kk] == 'cl'){
						$val['unit'][$kk] = 'lt';
						$val['qty'][$kk] = ($val['qty'][$kk] / 100);
					}
					
					if($val['unit'][$kk] == 'gr'){
						$val['unit'][$kk] = 'kg';
						$val['qty'][$kk] = ($val['qty'][$kk] / 1000);
					}
					
					$ins11['qty'] = $val['qty'][$kk];
					$ins11['unit'] = $val['unit'][$kk];
					//$ins11['loss'] = $val['loss'][$kk];
						$this->db->insert('recipes_table', $ins11);
					
					$this->db->update('products_table2', array('unitTypes' => $ins11['unit']), array('pro_id' => $ins11['c_pro_id']));
					
				}
			}
		}
		
		$cat_id = $post['cat_id'];
		
		$this->db->delete('product_cats_table2', array('pro_id' => $pro_id));
		$this->db->insert('product_cats_table2', array('pro_id' => $pro_id, 'cat_id' => $cat_id));

		
		
		
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function update_cat_post(){
		$post = $this->input->post();
		$cat_id = $post['cat_id'];
		$catName = $post['catName'];
			$this->db->update('cats_table2', array( 'cat_name' => $catName ), array('cat_id' => $cat_id));
		if( $this->db->affected_rows() > 0 ){
			$this->session->set_flashdata('success', 'İŞLEM BAŞARILI!');
			redirect( $_SERVER['HTTP_REFERER'] );  
		}
	}
	
	public function add_cat_post(){
		$post = $this->input->post();
		$cat_id = $post['cat_id'];
		$catName = $post['catName'];
			$this->db->insert('cats_table2', array( 'cat_name' => $catName ));
		if( $this->db->affected_rows() > 0 ){
			$this->session->set_flashdata('success', 'İŞLEM BAŞARILI!');
			redirect( $_SERVER['HTTP_REFERER'] );  
		}
	}
	
	public function delete_cat($cat_id){
		$this->db->delete('cats_table2', array('cat_id' => $cat_id ));
		if($this->db->affected_rows() > 0){
			echo 'success'; die();
		}
	}
	
	public function remove_pro(){
		$post = $this->input->post();  
		$cat_id = $post['cat_id'];
		$pro_id = $post['pro_id'];
		
		$check_orders = $this->db->select('pro_id')
			->where('pro_id', $pro_id)
			->get('order_details_table')->num_rows();
		$check_purchase = $this->db->select('pro_id')
			->where('pro_id', $pro_id)
			->get('purchase_details_table')->num_rows();
		
		if( ($check_orders == 0) AND ($check_purchase == 0) ){
			$this->db->delete('products_table2', array('pro_id' => $pro_id));
			$this->db->delete('product_cats_table2', array('pro_id' => $pro_id));
			
			if( $this->db->affected_rows() > 0 ){
				echo 'success';				
			}else{
				echo 'error';
			}
			
			
		}else{
			echo 'error';
		}
		
		
	}
	
	/*OPTION FUNCTIONS */
	
	public function option_groups_list(){
		$data['og_list'] = $this->db->select('*')
			->get('products_option_groups_table')->result_array();
		
		$this->load->view('option_group_list_view',$data);
	}
	
	public function add_option_group(){
		$this->load->view('add_option_group_view');
	}
	
	public function add_option_group_post(){
		$post = $this->input->post();
		
		$ins['og_name'] = $post['og_name'];
		$ins['og_insert_time'] = time();
			$this->db->insert('products_option_groups_table', $ins);
		redirect(OPTION_GROUPS_LIST); 
	}
	
	public function update_option_group($og_id){
		$data['group'] = $this->db->select('*')
			->where('og_id', $og_id)
			->get('products_option_groups_table')->row_array();
		$this->load->view('update_option_group_view',$data);
	}
	
	public function update_option_group_post(){
		$post = $this->input->post();
		$og_id = $post['og_id'];
	
		$whr['og_id'] = $og_id;
		$upd['og_name'] = $post['og_name'];
		$upd['og_last_update'] = time();
			$this->db->update('products_option_groups_table', $upd, $whr);
		redirect(OPTION_GROUPS_LIST);
	}
	
	public function delete_option_group($og_id){
		$this->db->delete('products_option_groups_table', array('og_id' => $og_id));
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function add_option_to_group($og_id){
		$data['og'] = $this->db->select('*')
			->where('og_id', $og_id)
			->get('products_option_groups_table')->row_array();
		
		$data['og_options'] = $this->db->select('*')
			->where('og_id', $og_id)
			->get('products_options_table')->result_array();
		
		$this->load->view('add_option_to_group_view',$data);
	}
	
	public function add_option_to_group_post(){
		$post = $this->input->post();
		//debug($post);
		$ins['og_id'] = $post['og_id'];
		$ins['option_name'] = $post['option_name'];
			$this->db->insert('products_options_table', $ins);
		redirect($_SERVER['HTTP_REFERER']); 
	}
	
	public function update_option($option_id){
		$data['option'] = $this->db->select('*')
			->where('option_id', $option_id)
			->get('products_options_table')->row_array();
		
		$this->load->view('update_option_view',$data);
	}
	
	public function update_option_post(){
		$post = $this->input->post();
		$option_id = $post['option_id'];
	
		$whr['option_id'] = $option_id;
		$upd['option_name'] = $post['option_name'];
			$this->db->update('products_options_table', $upd, $whr);
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function delete_option($option_id){
		$this->db->delete('products_options_table', array('option_id' => $option_id));
		$this->db->delete('products_price_table', array('option_ids' => $option_id));
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function add_option_to_product($pro_id){
		$data['product'] = $this->db->select('pro_id, pro_name')
			->where('pro_id', $pro_id)
			->get('products_table2')->row_array();
		
		$data['option_groups'] = $this->db->select('*')
			->get('products_option_groups_table')->result_array();
		
		foreach($data['option_groups'] as $key => $val){
			$data['option_groups'][$key]['options'] = $this->db->select('*')
				->where('og_id', $val['og_id'])
				->get('products_options_table')->result_array();
		}
		
		$data['pro_options'] = $this->db->select('*')
			->where('pro_id', $pro_id)
			->get('products_price_table')->result_array();
		
		foreach($data['pro_options'] as $key => $val){
			$option_ids = explode(",", $val['option_ids']);
			foreach($option_ids as $kk => $vv){
				$option[$kk] = $this->db->select('option_name, option_id')
					->where('option_id', $vv)
					->get('products_options_table')->row_array();
				$name[$kk] = $option[$kk]['option_name'];
			}
			$data['pro_options'][$key]['option_name'] = implode(" - ",$name);
				
		}
		
		//debug($data['pro_options']);
		
		$this->load->view('add_option_to_product_view', $data);
		
	}
	
	public function add_option_to_product_post(){
		$post = $this->input->post();
		//debug($post);
		
		$ins['pro_id'] = $post['pro_id'];
		$ins['option_ids'] = implode(",",$post['option_id']);
		$ins['option_price'] = $post['option_price'];
		//$ins['default'] = $post['default'];
			$this->db->insert('products_price_table',$ins);
		
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function delete_option_from_product($id){
		$this->db->delete('products_price_table', array('id' => $id));
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	/*OPTION FUNCTIONS */
	
	public function customers(){
		$data['customers'] = $this->db->select('*')
			->order_by('full_name', 'ASC')
			->get('customers_table')->result_array();
		foreach($data['customers'] as $key => $val){
			$data['customers'][$key]['debts'] = $this->db->select('*')
				->where('customer_id', $val['customer_id'])
				->where('payment_type', 'open')
				->get('order_payments_table')->result_array();
			$data['customers'][$key]['payments'] = $this->db->select('*')
				->where('customer_id', $val['customer_id'])
				->where('payment_type', 'payment')
				->get('order_payments_table')->result_array();
			
			foreach($data['customers'][$key]['debts'] as $kk => $vv){ 
				$data['customers'][$key]['debt'] += $vv['paid_price'];
			}
			foreach($data['customers'][$key]['payments'] as $kk => $vv){ 
				$data['customers'][$key]['paid'] += $vv['paid_price'];
			}
			$data['customers'][$key]['rest'] = $data['customers'][$key]['debt'] - $data['customers'][$key]['paid'];
		}
		
			
		
		
		//debug($data);
		$this->load->view('customers_view', $data);
		
	}
	
	public function customers_debt(){
		$data['customers'] = $this->db->select('*')
			->order_by('full_name', 'ASC')
			->get('customers_table')->result_array();
		foreach($data['customers'] as $key => $val){
			$data['customers'][$key]['debts'] = $this->db->select('*')
				->where('customer_id', $val['customer_id'])
				->where('payment_type', 'open')
				//->where('rest > 0')
				->get('order_payments_table')->result_array();
			$data['customers'][$key]['payments'] = $this->db->select('*')
				->where('customer_id', $val['customer_id'])
				->where('payment_type', 'payment')
				->get('order_payments_table')->result_array();
			
			foreach($data['customers'][$key]['debts'] as $kk => $vv){ 
				$data['customers'][$key]['debt'] += $vv['paid_price'];
			}
			foreach($data['customers'][$key]['payments'] as $kk => $vv){ 
				$data['customers'][$key]['paid'] += $vv['paid_price'];
			}
			$data['customers'][$key]['rest'] = $data['customers'][$key]['debt'] - $data['customers'][$key]['paid'];
			if($data['customers'][$key]['rest'] == '0'){
				unset($data['customers'][$key]);
			}
		}
		
			
		
		
		//debug($data);
		$this->load->view('customers_view', $data);
		
	}
	
	public function customer_details($customer_id){
		$data['customer'] = $this->db->select('*')
			->where('customer_id', $customer_id)
			->get('customers_table')->row_array();
		
		$data['debts'] = $this->db->select('*')
			->where('customer_id', $customer_id)
			->where('payment_type', 'open')
			->get('order_payments_table')->result_array();
		
		$data['payments'] = $this->db->select('*')
			->where('customer_id', $customer_id)
			//->where('payment_type', 'payment')
			->get('order_payments_table')->result_array();
		
		
		
		$data['orders'] = $this->db->select('*')
			->join('tables_table', 'orders_table.table_id = tables_table.table_id', 'left')
			->where('customer_id', $customer_id)
			->order_by('order_id', 'DESC')
			->get('orders_table')->result_array();
		
		
		
		foreach($data['orders'] as $key => $val){
			$data['orders'][$key]['details'] = $this->db->select('*')
				->where('order_id', $val['order_id'])
				->get('order_details_table')->result_array();
			$data['orders'][$key]['payments'] = $this->db->select('*')
				->where('order_id', $val['order_id'])
				->get('order_payments_table')->result_array();
			
			$data['orders'][$key]['payment_time'] = $val['order_insert_time']; 
			
		}
		
		$data['merged'] = array_merge($data['orders'],$data['payments']);
		
		$date = array();
		foreach ($data['merged'] as $key => $row)
		{
			$date[$key] = $row['payment_time'];
		}
		array_multisort($date, SORT_DESC, $data['merged']);
		
		//debug($data['merged']);
		
		$this->load->view('customer_details_view', $data);
		
	}
	
	public function pay_post(){
		$post = $this->input->post();
		$ins['customer_id'] = $post['customer_id'];
		$ins['payment_type'] = 'payment';
		$ins['p_type'] = $post['ptype'];
		$ins['paid_price'] = $post['paid'];
		$ins['payment_time'] = time();
			$this->db->insert('order_payments_table', $ins);
		
		if( $this->db->affected_rows() > 0 ){
			$this->session->set_flashdata('success', 'İŞLEM BAŞARILI!');
			redirect( $_SERVER['HTTP_REFERER'] );  
		}
		
	}
	
	public function get_pro($pro_id){
		$data['cat'] = $this->db->select('product_cats_table2.cat_id,cat_name')
			->join('cats_table2', 'product_cats_table2.cat_id = cats_table2.cat_id', 'left')
			->where('pro_id', $pro_id)
			->get('product_cats_table2')->row_array();
		$data['cats'] = $this->db->select('cat_id,cat_name')
			->get('cats_table2')->result_array();
		//debug($data);
		$data['product'] = $this->db->select('*')
			->where('pro_id', $pro_id)
			->get('products_table2')->row_array();
		$data['pro_options'] = $this->db->select('*')
			->where('pro_id', $pro_id)
			->get('porsions_table')->result_array();
		foreach($data['pro_options'] as $key => $val){
			$data['pro_options'][$key]['recipe'] = $this->db->select('recipes_table.id,porsion_id,c_pro_id,qty,unit,loss, pro_name')
				->join('products_table2', 'recipes_table.c_pro_id = products_table2.pro_id', 'left')
				->where('porsion_id', $val['id'])
				->get('recipes_table')->result_array();
		}
		
		$data['check'] = $this->db->select('pro_id')
			->where('pro_id', $pro_id)
			->get('purchase_details_table')->row_array();
		$data['check2'] = $this->db->select('c_pro_id')
			->where('c_pro_id', $pro_id)
			->get('recipes_table')->row_array();
		$data['check3'] = $this->db->select('pro_id')
			->where('pro_id', $pro_id)
			->get('order_details_table')->row_array();
		
		if(!empty($data['check']) OR !empty($data['check2']) OR !empty($data['check3']) ){
			$data['check'] = 1;
		}
		
	//debug($data);
			
		$this->load->view('update_product_view',$data);
	}
	
	public function add_pro($cat_id){
		/* $data['product'] = $this->db->select('*')
			->where('pro_id', $pro_id)
			->get('products_table2')->row_array(); */
		/* $data['options'] = $this->db->select('*')
			->get('products_options_table')->result_array();
		$data['pro_options'] = $this->db->select('*')
			->join('products_options_table', 'products_price_table.option_ids = products_options_table.option_id', 'left')
			->where('pro_id', $pro_id)
			->get('products_price_table')->result_array(); */
	//debug($data);
		$data['cat_id'] = $cat_id;	
		$this->load->view('add_product_view',$data);
	}
	
	public function pro_opt_post(){
		$post = $this->input->post();
		//debug($post);
		
		foreach($post['option_price'] as $key => $val){
			if($val != ''){
				$check = $this->db->select('*')
					->where('pro_id', $post['pro_id'])
					->where('option_ids', $post['option_ids'][$key])
					->get('products_price_table')->row_array();
				
				if(empty($check)){
					$ins['pro_id'] = $post['pro_id'];
					$ins['option_ids'] = $post['option_ids'][$key];
					$ins['option_price'] = $val;
						$this->db->insert('products_price_table', $ins);
				}else{
					$whr['id'] = $check['id'];
					$upd['pro_id'] = $post['pro_id'];
					$upd['option_ids'] = $post['option_ids'][$key];
					$upd['option_price'] = $val;
						$this->db->update('products_price_table', $upd, $whr);
				}
					
			}
		}
		
		echo 'success'; die();
		
	}
	
	public function del_opt($id, $pro_id){
		
		$check = $this->db->select('*')
			->where('pro_id', $pro_id)
			->where('id', $id)
			->get('products_price_table')->row_array();
		
		if(!empty($check)){
			$this->db->delete('products_price_table', array('id' => $id));
		
			if($this->db->affected_rows() > 0){
				echo 'success'; die();
			}
		}
		
	}
	
	public function add_pro_to_cat(){
		$post = $this->input->post();
		//debug($post);
		
		if($post['pro_name'] != ''){
			$ins['pro_name'] = $post['pro_name'];
			$ins['pro_seo_name'] = tr_seo_converter($post['pro_name']);
			$ins['pro_insert_time'] = time();
				$this->db->insert('products_table2', $ins);
			
			$pro_id = $this->db->insert_id();
			
			$ins2['pro_id'] = $pro_id;
			$ins2['cat_id'] = $post['cat_id'];
				$this->db->insert('product_cats_table2', $ins2);
			
			$this->session->set_flashdata('success', '	ÜRÜN EKLEME BAŞARILI!');
			redirect( $_SERVER['HTTP_REFERER'] );	
		}
		
		
	}

	public function purchase(){
		
		$data['companies'] = $this->db->select('*')
			->get('companies_table')->result_array();
			
		$data['depos'] = $this->db->select('*')
			->get('depos_table')->result_array();
			
		$data['products'] = $this->db->select('*')
			->limit(10)
			->get('products_table2')->result_array();	
		
		$data['cats'] = $this->db->select('*')
			->get('cats_table2')->result_array();
		
		$data['mm'] = '2';
		$data['mt'] = '3';
		$data['mt2'] = '2_1';
		
		$this->load->view('purchase_view', $data);
	}
	
	public function search_companies(){
		$post = $this->input->post();
		$term = $post['term'];
		$data['list'] = $this->db->select('*')
			->like('company_name', $term, 'both')
			->get('companies_table')->result_array();
		$this->load->view('companies_result_view', $data);
	}
	
	public function search_depos(){
		$post = $this->input->post();
		$term = $post['term'];
		$data['list'] = $this->db->select('*')
			->like('depo_name', $term, 'both')
			->get('depos_table')->result_array();
		$this->load->view('depos_result_view', $data);
	}
	
	public function purchase_post(){
		
		$post = $this->input->post();
		//debug($post);
		$ins['company_id'] = $post['company_id'];
		$ins['depo_id'] = $post['depo_id'];
		$ins['total_price'] = $post['total1'];
		$ins['total_tax'] = $post['tax1'];
		$ins['last_total'] = $post['total2'];
		$ins['description'] = $post['description'];
		$ins['date1'] = $post['date1'];
		//$ins['date2'] = $post['date2'];
		//$ins['isPaid'] = $post['isPaid'];
		//$ins['cashType'] = $post['cashType'];
		$ins['purchase_insert_time'] = time();	
			$this->db->insert('purchase_table', $ins);
		
		$purchase_id = $this->db->insert_id();
		
		$amount = $post['total2'];
		$desc = $post['description'];
		
		$ins2['order_id'] = '0';
		$ins2['paid_price'] = -$amount;
		$ins2['payment_type'] = 'out';
		$ins2['p_type'] = $post['cashType'];
		$ins2['payment_time'] = time();
		$ins2['payment_description'] = $desc;
			$this->db->insert('order_payments_table', $ins2);
		
		
		if($this->db->affected_rows() > 0){
			
			
			
			foreach($post['pro_id'] as $key => $val){
				$ins[$key]['depo_id'] = $post['depo_id'];
				$ins[$key]['pro_id'] = $val;
				$ins[$key]['purchase_id'] = $purchase_id;
				
				if($post['unit'][$key] == 'cl'){
					$post['unit'][$key] = 'Lt';
					$post['qty'][$key] = ($post['qty'][$key] / 100);
				}
				
				if($post['unit'][$key] == 'gr'){
					$post['unit'][$key] = 'kg';
					$post['qty'][$key] = ($post['qty'][$key] / 1000);
				}
				
				$ins[$key]['unit'] = $post['unit'][$key];
				$ins[$key]['qty'] = $post['qty'][$key];
				$ins[$key]['purchase_price'] = $post['purchase_price'][$key];
				$ins[$key]['tax'] = $post['tax'][$key];
				$ins[$key]['total_price'] = $post['total_price'][$key];
				$ins[$key]['row_insert_time'] = time();
					$this->db->insert('purchase_details_table', $ins[$key]);
				
				$pro[$key] = $this->db->select('stock')
					->where('pro_id', $val)
					->get('products_table2')->row_array();
				
				
				
				$newStock[$key] = $post['qty'][$key] + $pro[$key]['stock'];
					$this->db->update('products_table2', array('stock' => $newStock[$key]), array('pro_id' => $val));
					
					$chck[$key] = $this->db->select('unitTypes')
						->where('pro_id', $val)
						->get('products_table2')->row_array();
					
					if($chck[$key]['unitTypes'] == ''){
						$this->db->update('products_table2', array('unitTypes' => $post['unit'][$key]), array('pro_id' => $val));
					}
					
				
			}
			
			
			$_SESSION['process']['status'] = 'success';
			$_SESSION['process']['msg'] = 'KAYIT BAŞARILI!';
			redirect( $_SERVER['HTTP_REFERER'] );	
		}
	}
	
	public function companies(){
		$data['companies'] = $this->db->select('*')
			->get('companies_table')->result_array();
		$data['mm'] = '2';
		$data['mt'] = '4';
		$data['mt2'] = '2_1';
		$this->load->view('companies_view', $data);
	}
	
	public function company_details($company_id){
		$data['company'] = $this->db->select('*')
			->where('company_id', $company_id)
			->get('companies_table')->row_array();
		
		$data['purchases'] = $this->db->select('*')
			->where('company_id', $company_id)
			->get('purchase_table')->result_array();
		
		foreach($data['purchases'] as $key => $val){
			$data['purchases'][$key]['payment_time'] = $val['purchase_insert_time'];
		}
		
		$data['payments'] = $this->db->select('*')
			->where('company_id', $company_id)
			->get('purchase_payments_table')->result_array();
		
		
		
		//debug($data['records']);
		
		foreach($data['purchases'] as $key => $val){
			$data['purchases'][$key]['details'] = $this->db->select('*')
				->join('products_table2', 'purchase_details_table.pro_id = products_table2.pro_id', 'left')
				->where('purchase_id', $val['purchase_id'])
				->get('purchase_details_table')->result_array();
		}
		
		$data['records'] = array_merge( $data['purchases'], $data['payments'] );
		
		$date = array();
		foreach ($data['records'] as $key => $row)
		{
			$date[$key] = $row['payment_time'];
		}
		array_multisort($date, SORT_DESC, $data['records']);
		
		$this->load->view('company_details_view', $data);
	}
	
	public function add_company_post(){
		$post = $this->input->post();
		//debug($post);
		$ins['company_name'] = $post['company_name'];
		$ins['company_address'] = $post['company_address'];
		$ins['company_mail'] = $post['company_mail'];
		$ins['company_phone'] = $post['company_phone'];
		$ins['company_insert_time'] = time();
			$this->db->insert('companies_table', $ins);
		
		$compId = $this->db->insert_id();
		
		if($this->db->affected_rows() > 0){
			$response['msg'] = 'success';
			$response['company_name'] = $post['company_name'];
			$response['company_id'] = $compId;
			
			redirect($_SERVER['HTTP_REFERER']);
			
		}else{
			$response['msg'] = 'error';
		}
		//echo json_encode($response);
	}
	
	public function update_company_post(){
		$post = $this->input->post();
		//debug($post);
		$ins['company_name'] = $post['company_name'];
		$ins['company_address'] = $post['company_address'];
		$ins['company_mail'] = $post['company_mail'];
		$ins['company_phone'] = $post['company_phone'];
		$whr['company_id'] = $post['company_id'];
			$this->db->update('companies_table', $ins, $whr);
		
		redirect($_SERVER['HTTP_REFERER']);
	
	}
	
	public function company_payment_post(){
		$post = $this->input->post();
		//debug($post);
		$ins['company_id'] = $post['company_id'];
		$ins['amount'] = $post['amount'];
		$ins['payment_time'] = time();
			$this->db->insert('purchase_payments_table', $ins);
		
		redirect($_SERVER['HTTP_REFERER']);
	
	}
	
	public function depos(){
		$data['depos'] = $this->db->select('*')
			->get('depos_table')->result_array();
		$this->load->view('depos_view', $data);
	}
	
	public function depo_details($depo_id){
		$data['purchases'] = $this->db->select('*')
			->where('depo_id', $depo_id)
			->get('purchase_table')->result_array();
		
		foreach($data['purchases'] as $key => $val){
			$data['purchases'][$key]['details'] = $this->db->select('*')
				->where('purchase_id', $val['purchase_id'])
				->get('purchase_details_table')->result_array();
		}
		
		$this->load->view('depo_details_view', $data);
	}
	
	public function stock_details($depo_id){
		
		$data['details'] = $this->db->select('pro_name, products_table2.pro_id')
			->join('products_table2', 'purchase_details_table.pro_id = products_table2.pro_id', 'left')
			->where('depo_id', $depo_id)
			->group_by('products_table2.pro_id')
			->get('purchase_details_table')->result_array();
		//debug($data['details']);
		$data['depo'] = $this->db->select('*')
			->where('depo_id', $depo_id)
			->get('depos_table')->row_array();
		
		foreach($data['details'] as $key => $val){
			$data['details'][$key]['stocks'] = $this->db->select('qty,unit')
				->where('pro_id', $val['pro_id'])
				->get('purchase_details_table')->result_array();
			
			foreach($data['details'][$key]['stocks'] as $kk => $vv){
				$data['details'][$key]['stock']['qty'] += $vv['qty'];
			}
			$data['details'][$key]['stock']['unit'] = $data['details'][$key]['stocks'][0]['unit'];
		}
		
		foreach($data['details'] as $key => $val){
			$data['details'][$key]['sales'] = $this->db->select_sum('qty')
				->where('pro_id', $val['pro_id'])
				->get('sales_table')->row_array();
		}
		//debug($data['details']);
		$this->load->view('stock_details_view', $data);
	}
	
	public function update_depo_post(){
		$post = $this->input->post();
		//debug($post);
		
		$whr['depo_id'] = $post['depo_id'];
		$upd['depo_name'] = $post['depo_name'];
			$this->db->update('depos_table', $upd, $whr);
		
		if($this->db->affected_rows() > 0){
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	
	public function delete_depo($depo_id){
		
		$check = $this->db->select('*')
			->where('depo_id', $depo_id)
			->get('purchase_details_table')->num_rows();
		
		if($check > 0){
			echo 'Depoya kayıtlı satın alma işlemleri mevcuttur. Silinemez!';
		}else{
				$whr['depo_id'] = $depo_id;
				$this->db->delete('depos_table', $whr);
				
				if($this->db->affected_rows() > 0){
				echo 'Depo Silindi!';
			}
			
		}
		
		
	}
	
	public function add_depo_post(){
		$post = $this->input->post();
		//debug($post);
		$check = $this->db->select('*')
			->where('depo_name', $post['depo_name'])
			->get('depos_table')->row_array();
		
		if(empty($check)){
			$ins['depo_name'] = $post['depo_name'];
				$this->db->insert('depos_table', $ins);
			$depoId = $this->db->insert_id();
			
			if($this->db->affected_rows() > 0){
				$response['msg'] = 'success';
				$response['depo_name'] = $post['depo_name'];
				$response['depo_id'] = $depoId;
					
			}else{
				$response['msg'] = 'error';
			}
			
		}else{
			$response['msg'] = 'same_name_error';
		}
		
		echo json_encode($response);
		
	}
	
	public function reports(){
		
		$data['open_day'] = $this->db->select('*')
			->where('day_end_time', '0')
			->get('days_table')->row_array();
		//debug($data['open_day']);
		if(!empty($data['open_day'])){
			$data['payments'] = $this->db->select('*')
			->where('payment_time >=', $data['open_day']['day_start_time'])
			->where('payment_time <=', time())
			->get('order_payments_table')->result_array();
		}
		
		//debug($data['payments']);
		
		$list = $this->db->select('*')
			->limit(2)
			->get('order_details_table')->result_array();
		//debug($list);
		$data['most'] = $this->db->select('products_table2.pro_name, order_details_table.pro_id, count(*) as c')
		->join('products_table2', 'order_details_table.pro_id = products_table2.pro_id')
		->group_by('order_details_table.pro_id')
		->order_by('c', 'DESC')
		->limit(10)
		->get('order_details_table')->result_array();
		
		$data['mm'] = '16';
		$data['mt'] = '16';
		
		$this->load->view('reports_view',$data);
	}
	
	public function reports_post(){
		//$this->output->enable_profiler(TRUE);
		$post = $this->input->post();
		//debug($post);
		
		$fdate =str_replace("/","-", explode(" - ", $post['dates'])[0]);
		$ldate =str_replace("/","-", explode(" - ", $post['dates'])[1]);
		
		
		
		$fdate = strtotime($fdate.' 00:00');
		$ldate = strtotime($ldate.' 23:59');
		
		$type = $post['type'];
		
		if($type == 'order'){
			$this->get_adisyon_reports($fdate, $ldate);
		}
		if($type == 'cats'){
			$this->get_category_reports($fdate, $ldate);
		}
		if($type == 'analyse'){
			$this->get_analyse_reports($fdate, $ldate);
		}
		if($type == 'days'){
			$this->get_day_reports($fdate, $ldate);
		}
		if($type == 'stock'){
			$this->get_stock_reports($fdate, $ldate);
		}
		if($type == 'month'){
			$this->month_details($fdate, $ldate);
		}
	}
	
	public function get_stock_reports(){
		$data['depos'] = $this->db->select('*')
			->get('depos_table')->result_array();
		$this->load->view('stock_reports_view',$data);
	}
	
	public function stock_report_details($depo_id){
		
		$data['details'] = $this->db->select('pro_name, products_table2.pro_id')
			->join('products_table2', 'purchase_details_table.pro_id = products_table2.pro_id', 'left')
			->where('depo_id', $depo_id)
			->group_by('products_table2.pro_id')
			->get('purchase_details_table')->result_array();
		$data['depo'] = $this->db->select('*')
			->where('depo_id', $depo_id)
			->get('depos_table')->row_array();
		
		foreach($data['details'] as $key => $val){
			$data['details'][$key]['stocks'] = $this->db->select('qty,unit')
				->where('pro_id', $val['pro_id'])
				->get('purchase_details_table')->result_array();
			
			foreach($data['details'][$key]['stocks'] as $kk => $vv){
				$data['details'][$key]['stock']['qty'] += $vv['qty'];
			}
			$data['details'][$key]['stock']['unit'] = $data['details'][$key]['stocks'][0]['unit'];
		}
		
		foreach($data['details'] as $key => $val){
			$data['details'][$key]['sales'] = $this->db->select_sum('qty')
				->where('pro_id', $val['pro_id'])
				->get('sales_table')->row_array();
		}
		$this->load->view('stock_report_details_view',$data);
	}
	
	public function get_day_reports($fdate, $ldate){
		
		$data['titleText'] = date('d/m/Y', $fdate).' - '.date('d/m/Y', $ldate).' Tarihleri Arası Gün Sonu Raporları';
		//echo $fdate.' - '.$ldate;
		$data['days'] = $this->db->select('*')
			->order_by('day_id', 'DESC')
			->where('day_start_time >=', $fdate)
			//->where('day_end_time >=', $ldate)
			->get('days_table')->result_array();
		
		$this->load->view('day_reports_view',$data);
		
	}
	
	public function get_analyse_reports($fdate, $ldate){
		
		if(empty($fdate) OR empty($ldate)){
			$fdate = time();
			$ldate = time() + 86400 ;
		}
		
		$data['titleText'] = date('d/m/Y', $fdate).' - '.date('d/m/Y', $ldate).' Tarihleri Arası Analiz Raporları';
		
		$data['open_day'] = $this->db->select('*')
			->where('day_end_time', '0')
			->get('days_table')->row_array();
		//debug($data['open_day']);
		$data['payments'] = $this->db->select('*')
			->where('payment_time >=', $fdate)
			->where('payment_time <=', $ldate)
			->get('order_payments_table')->result_array();
		//debug($data['payments']);
		
		$data['list'] = $this->db->select('order_id')
			->where('order_insert_time >= ', $fdate)
			->where('order_insert_time <= ', $ldate)
			->get('orders_table')->num_rows();
		
		$data['most'] = $this->db->select('order_insert_time, products_table2.pro_name, order_details_table.pro_id, count(*) as c')
		->join('products_table2', 'order_details_table.pro_id = products_table2.pro_id')
		->join('orders_table', 'order_details_table.order_id = orders_table.order_id')
		->group_by('order_details_table.pro_id')
		->order_by('c', 'DESC')
		->where('order_insert_time >=', $fdate)
		->where('order_insert_time <=', $ldate)
		->limit(10)
		->get('order_details_table')->result_array();
		
		$this->load->view('analyse_reports_view',$data);
		
	}
	
	public function get_category_reports($fdate, $ldate){
		
		$data['titleText'] = date('d/m/Y', $fdate).' - '.date('d/m/Y', $ldate).' Tarihleri Arası Ürün Satış Raporu';
		
		$data['products'] = $this->db->select('order_insert_time,table_name,price,qty,description, products_table2.pro_name, cat_name, order_details_table.pro_id, count(*) as c')
		->join('products_table2', 'order_details_table.pro_id = products_table2.pro_id')
		->join('orders_table', 'order_details_table.order_id = orders_table.order_id')
		->join('menu_cat_product_table', 'order_details_table.pro_id = menu_cat_product_table.pro_id')
		->join('menu_cats_table', 'menu_cat_product_table.cat_id = menu_cats_table.cat_id')
		->join('tables_table', 'orders_table.table_id = tables_table.table_id')
		->group_by('order_details_table.pro_id')
		->order_by('c', 'DESC')
		->where('order_insert_time >=', $fdate)
		->where('order_insert_time <=', $ldate)
		//->limit(10)
		->get('order_details_table')->result_array();
		
		
		$data['orders'] = $this->db->select('orders_table.order_id')
			//->join('tables_table', 'orders_table.table_id = tables_table.table_id', 'left')
			//->join('zones_table', 'tables_table.table_zone = zones_table.zone_id', 'left')
			->where('order_insert_time >=', $fdate)
			->where('order_insert_time <=', $ldate)
			->get('orders_table')->result_array();
		//debug($data);
		foreach($data['orders'] as $key => $val){
			$data['orders'][$key]['details'] = $this->db->select('order_details_table.pro_id,pro_name, total_price, cat_id')
				->join('menu_cat_product_table', 'order_details_table.pro_id = menu_cat_product_table.pro_id', 'left')
				->where('order_id', $val['order_id'])
				->get('order_details_table')->result_array(); 
			foreach($data['orders'][$key]['details'] as $kk => $vv){
				$new[] = $vv;
			}
		}
		//debug($data); 
		foreach($new as $key => $value){
		   $newarray[$value['cat_id']][$key] = $value;
		}

		foreach($newarray as $key => $val){
			$data['list'][$key] = $this->db->select('cat_id, cat_name')
				->where('cat_id', $key)
				->get('menu_cats_table')->row_array();
			foreach($val as $kk => $vv){
				$data['list'][$key]['total'] += $vv['total_price'];
			}
			 
		}
		
		//debug($data['list']);
		
		$this->load->view('cat_reports_view',$data);
		
	}
	
	public function get_adisyon_reports(){
		$post = $this->input->post();
		
		if(!empty($post['dates'])){
			$datesSplit = explode(" - ", $post['dates']);
			
			$fdate = strtotime(str_replace("/", ".", $datesSplit[0]));
			$ldate = strtotime(str_replace("/", ".", $datesSplit[1]));
			
			//debug($fdate);
			
		}else{
			$fdate = strtotime($post['fDate']);
			$ldate = strtotime($post['lDate']);
		}
		
		
		
		$data['titleText'] = date('d/m/Y H:i', $fdate).' - '.date('d/m/Y H:i', $ldate).' Tarihleri Arası Adisyon Detayları';
		$data['list'] = $this->db->select('*')
			->join('tables_table', 'orders_table.table_id = tables_table.table_id', 'left')
			->where('order_insert_time >= ', $fdate)
			->where('order_insert_time <= ', $ldate)
			->get('orders_table')->result_array();
		
		foreach($data['list'] as $key => $val){
			$data['list'][$key]['cash'] = $this->db->select_sum('paid_price')
				->where('payment_type', 'cash')
				->where('order_id', $val['order_id'])
				->get('order_payments_table')->row_array();
			$data['list'][$key]['credit'] = $this->db->select_sum('paid_price')
				->where('payment_type', 'credit')
				->where('order_id', $val['order_id'])
				->get('order_payments_table')->row_array();
			$data['list'][$key]['open'] = $this->db->select_sum('paid_price')
				->where('payment_type', 'open')
				->where('order_id', $val['order_id'])
				->get('order_payments_table')->row_array();
			$data['list'][$key]['discount'] = $this->db->select_sum('paid_price')
				->where('payment_type', 'discount')
				->where('order_id', $val['order_id'])
				->get('order_payments_table')->row_array();
		}
		
		
		
		
		
		$data['orders'] = $this->db->select('order_id')
			->where('order_insert_time >=', $fdate)
			->where('order_insert_time <=', $ldate)
			->get('orders_table')->result_array();
		
		foreach($data['orders'] as $key => $val){
			$data['orders'][$key]['details'] = $this->db->select('order_details_table.pro_id, total_price, cat_id')
				->join('menu_cat_product_table', 'order_details_table.pro_id = menu_cat_product_table.pro_id', 'left')
				->where('order_id', $val['order_id'])
				->get('order_details_table')->result_array(); 
			foreach($data['orders'][$key]['details'] as $kk => $vv){
				$new[] = $vv;
			}
		}
		
		foreach($new as $key => $value){
		   $newarray[$value['cat_id']][$key] = $value;
		}

		foreach($newarray as $key => $val){
			$data['list2'][$key] = $this->db->select('cat_id, cat_name')
				->where('cat_id', $key)
				->get('menu_cats_table')->row_array();
			foreach($val as $kk => $vv){
				$data['list2'][$key]['total'] += $vv['total_price'];
			}
			 
		}
		 
		$this->load->view('adisyon_reports_view',$data);
	}
	
	public function get_order_details(){
		$post = $this->input->post();
		$data['settings'] = $this->db->select('*')
			->where('id', 1)
			->get('settings_table')->row_array();
		$data['details'] = $this->db->select('*')
			->where('order_id', $post['order_id'])
			->get('order_details_table')->result_array();
		$data['list'] = $data['details'];
		$data['details']['ord'] = $this->db->select('*')
			->join('tables_table', 'orders_table.table_id = tables_table.table_id', 'left')
			->where('order_id', $post['order_id'])
			->get('orders_table')->row_array();
		$this->load->view('order_details_view', $data);
	}
	
	public function menu_categories(){
		/* $data['cats'] = $this->db->select('cat_name, cat_id')
			->get('menu_cats_table')->result_array(); */
		
		$data['cats'] = $this->db->select('*')
			->order_by('sort', 'ASC')
			->where('type', '1')
			->get('menu_cats_table')->result_array();
		
		/* foreach($data['cats'] as $key => $val){
			$data['cats'][$key]['products'] = $this->db->select('cat_id, products_table2.pro_id, pro_name')
				->join('products_table2', 'menu_cat_product_table.pro_id = products_table2.pro_id', 'left')
				->where('cat_id', $val['cat_id'])
				->get('menu_cat_product_table')->result_array();
		} */
		$this->load->view('menu_categories_view', $data);
	}
	
	public function get_menus(){
		$data['menu_list'] = $this->db->select('*')
			->order_by('menu_name', 'ASC')
			->get('menu_table')->result_array();
		if(!empty($data['menu_list'])){
			$data['msg'] = 'success';
			echo json_encode($data);
		}else{
			$data['msg'] = 'error';
			echo json_encode($data);
		}
	}
	
	public function sort_cats(){
		$post = $this->input->post();
		//debug($post);
		
		$catList = explode(", ",$post['catList']);
		
		
		foreach($catList as $key => $val){
			$this->db->update('menu_cats_table', array('sort' => $key), array('cat_id' => $val));
		}
		
		if( $this->db->affected_rows() > 0 ){
			echo 'success';
		}
		
		
		
	}
	
	public function sort_products(){
		$post = $this->input->post();
		//debug($post);
		
		$proList = explode(", ",$post['proList']);
		//debug($proList);
		
		foreach($proList as $key => $val){
			$this->db->update('products_table2', array('sort' => $key), array('pro_id' => $val));
		}
		
		if( $this->db->affected_rows() > 0 ){
			echo 'success';
		}
		echo 'success';
		
		
	}
	
	public function get_menu_cats(){
		$data['cat_list'] = $this->db->select('*')
			->order_by('sort', 'ASC')
			->where('type', '1')
			->get('menu_cats_table')->result_array();
		if(!empty($data['cat_list'])){
			$data['msg'] = 'success';
			echo json_encode($data);
		}else{
			$data['msg'] = 'error';
			echo json_encode($data);
		}
	}
	
	public function get_menu_cats2($menu_id){
		
		$data['menu'] = $this->db->select('*')
			->where('menu_id', $menu_id)
			->get('menu_table')->row_array();
		
		$data['cat_list'] = $this->db->select('*')
			->join('menu_cats_table', 'menu_and_cats_table.cat_id = menu_cats_table.cat_id', 'left')
			->where('menu_id', $menu_id)
			->get('menu_and_cats_table')->result_array(); 
		$data['all_cats'] = $this->db->select('*')
			->get('menu_cats_table')->result_array();
		
		foreach($data['all_cats'] as $key => $val){
			foreach($data['cat_list'] as $kk => $vv){
				if($val['cat_id'] == $vv['cat_id']){
					$data['all_cats'][$key]['sel'] = 'selected';
				}
			}
		}

		$data['menu_id'] = $menu_id;

		$this->load->view("menuCatsView", $data);
		
	}
	
	public function get_menu_cats3($menu_id){
		
		$data['menu'] = $this->db->select('*')
			->where('menu_id', $menu_id)
			->get('menu_table')->row_array();
		
		$data['cat_list'] = $this->db->select('*')
			->join('menu_cats_table', 'menu_and_cats_table.cat_id = menu_cats_table.cat_id', 'left')
			->where('menu_id', $menu_id)
			->get('menu_and_cats_table')->result_array();
		
		$data['menu_id'] = $menu_id;
		//debug($data);
		$this->load->view("menuCats2View", $data);
		
	}
	
	public function add_cats_to_menu_post(){
		$post = $this->input->post();
		//debug($post);
		
			$this->db->delete('menu_and_cats_table', array('menu_id' => $post['menu_id']));
			if(!empty($post['catids'])){
				foreach($post['catids'] as $key => $val){
					$ins[$key]['cat_id'] = $val;
					$ins[$key]['menu_id'] = $post['menu_id'];
						$this->db->insert('menu_and_cats_table', $ins[$key]);
				}
			}
		
		if($this->db->affected_rows() > 0){
			echo 'success'; die();
		}else{
			echo 'error'; die();
		}
		
	}
	
	public function add_products_to_cat_post(){
		$post = $this->input->post();
		//debug($post);
		
			$this->db->delete('menu_cat_product_table', array('cat_id' => $post['cat_id']));
			if(!empty($post['proids'])){
				foreach($post['proids'] as $key => $val){
					$ins[$key]['cat_id'] = $post['cat_id'];
					$ins[$key]['pro_id'] = $val;
						$this->db->insert('menu_cat_product_table', $ins[$key]);
				}
			}
		
		if($this->db->affected_rows() > 0){
			echo 'success'; die();
		}else{
			echo 'error'; die();
		}
		
	}
	
	public function add_multi_pro_post(){
		$post = $this->input->post();
		$proList = preg_split("/\\r\\n|\\r|\\n/", $post['pro_names']);
		//debug($proList);
		if(!empty($proList)){
			
				foreach($proList as $key => $val){
					
					$pro_seo_name = tr_seo_converter($val);
		
					$check = $this->db->select('pro_name')
						->where('pro_name', $val)
						->get('products_table2')->row_array();
					
					if(empty($check)){
							$ins['pro_name'] = $val;
							$ins['pro_seo_name'] = tr_seo_converter($val);
						$this->db->insert('products_table2', $ins);
					
					$proNames .= $ins['pro_name'].',';
					
					$pro_id = $this->db->insert_id();
						
						$ins2['pro_id'] = $pro_id;
						$ins2['cat_id'] = $post['cat_id'];
							$this->db->insert('product_cats_table2', $ins2);
						
						$ins3['pro_id'] = $pro_id;
						//$ins3['porsion_name'] = 'Adet';
						$ins3['porsion_price'] = '0.00';
							$this->db->insert('porsions_table', $ins3);
					}else{
						$sameNames .= $check['pro_name'].',';
					}
					
				}
				
			
		}
		
		if($this->db->affected_rows() > 0){
			
			echo $proNames.' isimli ürünler eklenmiştir.';
			
			if(!empty($sameNames)){
				echo $sameNames.' isimleriyle daha önce ürün eklenmiştir!';
			}
			
			
		}else{
			echo 'Ürün eklenirken Hata oluştu!';
			//redirect($_SERVER['HTTP_REFERER']);
		}
		
	}
	
	public function cat_sort(){
		$post = $this->input->post();
		//debug($post);
		$cat_id = $post['cat_id'];
		$sort = $post['sort'];
			$update = $this->db->update('menu_cats_table', array('sort' => $sort), array('cat_id' => $cat_id));
			if($update != FALSE){
				echo 'ok';
			}
	}
	
	public function pro_sort(){
		$post = $this->input->post();
		//debug($post);
		$pro_id = $post['pro_id'];
		$sort = $post['sort'];
			$update = $this->db->update('products_table2', array('sort' => $sort), array('pro_id' => $pro_id));
			if($update != FALSE){
				echo 'ok';
			}
	}
	
	public function get_cat_or_products($cat_id){
		$data['sub_cat_list'] = $this->db->select('*')
			->join('menu_cats_table', 'menu_sub_cats_table.sub_cat_id = menu_cats_table.cat_id', 'left')
			->where('menu_sub_cats_table.cat_id', $cat_id)
			->order_by('menu_cats_table.sort', 'ASC')
			->get('menu_sub_cats_table')->result_array();
		
		if(!empty($data['sub_cat_list'])){
			$data['cat_msg'] = 'success';
			
		}else{
			$data['pro_list'] = $this->db->select('pro_name, products_table2.pro_id, cat_id, pro_bg')
				->join('products_table2', 'menu_cat_product_table.pro_id = products_table2.pro_id', 'left')
				->where('menu_cat_product_table.cat_id', $cat_id)
				->order_by('products_table2.sort', 'ASC')
				->get('menu_cat_product_table')->result_array();
			
			foreach($data['pro_list'] as $key => $val){
				$data['pro_list'][$key]['options'] = $this->db->select('*')
					->where('pro_id', $val['pro_id'])
					->get('porsions_table')->result_array();
				if(count($data['pro_list'][$key]['options']) == '1'){
					
					if($data['pro_list'][$key]['options'][0]['porsion_name'] == 'Kg'){
						$data['pro_list'][$key]['one'] = 'kg';
						$data['pro_list'][$key]['opt'] = $data['pro_list'][$key]['options'][0];
					}else{
						$data['pro_list'][$key]['one'] = '1';
						$data['pro_list'][$key]['opt'] = $data['pro_list'][$key]['options'][0];
					}
					
				}
			}
				
			if(!empty($data['pro_list'])){
				$data['pro_msg'] = 'success';
				
			}else{
				$data['pro_msg'] = 'error';
			}
				
		}
		
		echo json_encode($data);
			
	}
	
	public function get_menu_sub_cats($cat_id){
		$data['sub_cat_list'] = $this->db->select('*')
			->join('menu_cats_table', 'menu_sub_cats_table.sub_cat_id = menu_cats_table.cat_id', 'left')
			->where('menu_sub_cats_table.cat_id', $cat_id)
			->get('menu_sub_cats_table')->result_array();
		if(!empty($data['sub_cat_list'])){
			$data['msg'] = 'success';
			echo json_encode($data);
		}else{
			$data['msg'] = 'error';
			echo json_encode($data);
		}
	}
	
	public function get_menu_products($cat_id){
		
		$data['cat'] = $this->db->select('*')
			->where('cat_id', $cat_id)
			->get('menu_cats_table')->row_array();
		
		$data['all_products'] = $this->db->select('pro_name, pro_id')
			->get('products_table2')->result_array();
		
		$data['active_products'] = $this->db->select('pro_id')
			->get('menu_cat_product_table')->result_array();
		
		foreach($data['all_products'] as $key => $val){
			foreach($data['active_products'] as $kk => $vv){
				if($val['pro_id'] == $vv['pro_id']){
					unset($data['all_products'][$key]);
				}
			}
		}
		
		
		foreach($data['all_products'] as $key => $val){
			$check[$key] = $this->db->select('*')
				->where(array('cat_id' => $cat_id, 'pro_id' => $val['pro_id']))
				->get('menu_cat_product_table')->row_array();
			if(!empty($check[$key])){
				$data['all_products'][$key]['sel'] = 'selected';
			}else{
				$data['all_products'][$key]['sel'] = '';
			}
		}
		
		$this->load->view('catProductsView', $data);
		
	}
	
	public function get_products22($cat_id){
		
		$data['pro_list'] = $this->db->select('pro_name, products_table2.pro_id, cat_id')
			->join('products_table2', 'menu_cat_product_table.pro_id = products_table2.pro_id', 'left')
			->where('menu_cat_product_table.cat_id', $cat_id)
			->get('menu_cat_product_table')->result_array();
		
		foreach($data['pro_list'] as $key => $val){
			$data['pro_list'][$key]['porsions'] = $this->db->select('*')
				->where('pro_id', $val['pro_id'])
				->get('porsions_table')->result_array();
			if(!empty($data['pro_list'][$key]['porsions'])){
				$data['pro_list'][$key]['pors'] = 'success';
			}
		}
		
		if(!empty($data['pro_list'])){
			$data['msg'] = 'success';
			
		}else{
			$data['msg'] = 'error';
		}
		echo json_encode($data);
		
		
	}
	
	public function add_menu_cat_post(){
		$post = $this->input->post();
		//debug($post);
		$ins['cat_name'] = $post['cat_name'];
		//$ins['cat_color'] = $post['cat_color'];
		$ins['type'] = 1;
			$this->db->insert('menu_cats_table', $ins);
		
		if($this->db->affected_rows() > 0){
			echo 'success'; die();
		}else{
			echo 'error'; die();
		}
		
	}
	
	public function add_menu_post(){ 
		$post = $this->input->post();
		//debug($post);
		$ins['menu_name'] = $post['menu_name'];
			$this->db->insert('menu_table', $ins);
		
		if($this->db->affected_rows() > 0){
			echo 'success'; die();
		}else{
			echo 'error'; die();
		}
		
	}
	
	public function del_menu_cat(){
		$post = $this->input->post();
		$cat_id = $post['cat_id'];
		
		$check = $this->db->select('*')
			->where('cat_id', $cat_id)
			->get('menu_cat_product_table')->result_array();
		
		if(!empty($check)){
			echo 'hasproducts'; die();
		}
		
		//debug($post);
		$whr = array('cat_id' => $cat_id);
		
		$this->db->delete('menu_cats_table', $whr);
		$this->db->delete('menu_sub_cats_table', $whr);
		$this->db->delete('menu_sub_cats_table', array('sub_cat_id' => $cat_id));
		$this->db->delete('menu_cat_product_table', $whr);
		
		echo 'success'; die();
		
	}
	
	public function add_menu_sub_cat_post(){
		$post = $this->input->post();
		//debug($post);
		$ins1['cat_name'] = $post['sub_cat_name'];
		$ins1['type'] = $post['type']+1;
			$this->db->insert('menu_cats_table', $ins1);
		
		$sub_cat_id = $this->db->insert_id();
		
		$ins['cat_id'] = $post['cat_id'];
		$ins['sub_cat_id'] = $sub_cat_id;
		
		$check = $this->db->select('*')
			->where(array('cat_id' => $post['cat_id'], 'sub_cat_id' => $sub_cat_id))
			->get('menu_sub_cats_table')->num_rows();
		if($check < 1){
			$this->db->insert('menu_sub_cats_table', $ins);
		}

		if($this->db->affected_rows() > 0){
			echo 'success'; die();
		}else{
			echo 'error'; die();
		}
		
	}
	
	public function add_menu_pro_post(){
		$post = $this->input->post();
		
		$ins['cat_id'] = $post['cat_id'];
		$ins['pro_id'] = $post['pro_id'];
		
		$check = $this->db->select('*')
			->where(array('cat_id' => $post['cat_id'], 'pro_id' => $post['pro_id']))
			->get('menu_cat_product_table')->num_rows();
		if($check < 1){
			$this->db->insert('menu_cat_product_table', $ins);
		}

		if($this->db->affected_rows() > 0){
			echo 'success'; die();
		}else{
			echo 'error'; die();
		}
		
	}
	
	public function remove_menu_sub_cat_post(){
		$post = $this->input->post();
		
		$id = $post['id'];
		
		if($id > 0){
			$this->db->delete('menu_sub_cats_table', array('id' => $id));
		}

		if($this->db->affected_rows() > 0){
			echo 'success'; die();
		}else{
			echo 'error'; die();
		}
		
	}
	
	public function price_list(){
		
		$data['pro_list'] = $this->db->select('pro_id, pro_name')
			->get('products_table2')->result_array();
		
		$this->load->view('price_list_view', $data);
		
	}
	
	public function get_pro_options($pro_id){
		
		$data['options'] = $this->db->select('pro_id, option_ids, option_price, option_name')
			->join('products_options_table', 'products_price_table.option_ids = products_options_table.option_id')
			->where('pro_id', $pro_id)
			->get('products_price_table')->result_array();
		
		if(!empty($data['options'])){
			$data['msg'] = 'success';
			echo json_encode($data);
		}else{
			$data['msg'] = 'error';
		}
		
		
	}
	
	public function price_form_post(){
		$post = $this->input->post();
		
		//debug($post);
		
		if(!empty($post)){
			foreach($post['option_id'] as $key => $val){
				$whr[$key]['option_ids'] = $val;
				$whr[$key]['pro_id'] = $post['pro_id'][$key];
				$upd[$key]['option_price'] = $post['option_price'][$key];
					$this->db->update('products_price_table', $upd[$key], $whr[$key]);
			}
		}
		
		$this->session->set_flashdata('success', 'İŞLEM BAŞARILI!');
			redirect( $_SERVER['HTTP_REFERER'] );
		
	}
	
	public function price_update_post(){
		$post = $this->input->post();
		
		//debug($post);
		
		
		
		if(!empty($post)){
			$this->db->update('price_lists_table', array('isActive' => '0'));
			$this->db->insert('price_lists_table', array('list_insert_time' => time(), 'isActive' => 1));
			
			$list_id = $this->db->insert_id();
			
			if($list_id > 0){
				
				foreach($post['porsion_id'] as $key => $val){
					
					$ins[$key]['list_id'] = $list_id;
					$ins[$key]['pro_id'] = $post['pro_id'][$key];
					$ins[$key]['porsion_id'] = $key;
					$ins[$key]['porsion_price'] = $val;
					$ins[$key]['insert_time'] = time();
						$this->db->insert('price_list_details', $ins[$key]);
						//die("test");
				}
				
				foreach($post['porsion_id'] as $key => $val){
					$whr[$key]['id'] = $key;
					$upd[$key]['porsion_price'] = $val;
						$this->db->update('porsions_table', $upd[$key], $whr[$key]);
				}
			}
			
		}
		
		$this->session->set_flashdata('success', 'İŞLEM BAŞARILI!');
			redirect( $_SERVER['HTTP_REFERER'] );
		
	}
	
	/*New functions*/
	public function g_sub_cats($cat_id){
		//debug("testtt");
		$data['sub_cat_list'] = $this->db->select('*')
			->join('menu_cats_table', 'menu_sub_cats_table.sub_cat_id = menu_cats_table.cat_id', 'left')
			->where('menu_sub_cats_table.cat_id', $cat_id)
			->get('menu_sub_cats_table')->result_array();
		$this->load->view('g_sub_cats_view', $data);
	}
	
	public function g_products($cat_id){
		//debug("testtt");
		$data['pro_list'] = $this->db->select('products_table2.pro_id, pro_name, products_table2.sort, pro_bg, cat_id')
			->join('products_table2', 'menu_cat_product_table.pro_id = products_table2.pro_id', 'left')
			->where('menu_cat_product_table.cat_id', $cat_id)
			->order_by('products_table2.sort', 'ASC')
			->get('menu_cat_product_table')->result_array();
		
		foreach($data['pro_list'] as $key => $val){
			$data['pro_list'][$key]['porsions'] = $this->db->select('*')
				->where('pro_id', $val['pro_id'])
				->get('porsions_table')->result_array();
		}
	//debug($data);
		$this->load->view('g_products_view', $data);
	}
	/*New functions*/

	public function order_printed(){
		$post = $this->input->post();
		//debug($post);
		$order_id = $post['order_id'];
		$this->db->update('order_details_table', array('printed' => '1'), array('order_id' => $order_id));
	}
	
	public function merge_tables($t1, $t2){
		$post = $this->input->post();
		$t1 = $post['table_id_1'];
		$t2 = $post['table_id_2'];
		$table1 = $this->db->select('is_busy')
			->where('table_id', $t1)
			->where('is_busy', '1')
			->get('tables_table')->row_array();
		$table2 = $this->db->select('is_busy')
			->where('table_id', $t2)
			->where('is_busy', '1')
			->get('tables_table')->row_array();
		
		if( (!empty($table1)) AND (!empty($table2)) ){
			$data['last_order_1'] = $this->db->select('order_id, total_price, paid_price, rest_price')
				->where('table_id', $t1)
				->order_by('order_id', 'DESC')
				->limit(1)
				->get('orders_table')->row_array();
			$order_id_1 = $data['last_order_1']['order_id'];
			
			$data['last_order_2'] = $this->db->select('order_id, total_price, paid_price, rest_price')
					->where('table_id', $t2)
					->order_by('order_id', 'DESC')
					->limit(1)
					->get('orders_table')->row_array();
			$order_id_2 = $data['last_order_2']['order_id'];
			
			$change = $this->db->update('order_details_table', array('order_id' => $order_id_1), array('order_id' => $order_id_2));
			$changePayments = $this->db->update('order_payments_table', array('order_id' => $order_id_1), array('order_id' => $order_id_2));
			
			if($change != FALSE){
				
				$upd['total_price'] = $data['last_order_1']['total_price'] + $data['last_order_2']['total_price'];
				$upd['paid_price'] = $data['last_order_1']['paid_price'] + $data['last_order_2']['paid_price'];
				$upd['rest_price'] = $data['last_order_1']['rest_price'] + $data['last_order_2']['rest_price'];
				$whr['order_id'] = $order_id_1;
				$updOrder = $this->db->update('orders_table', $upd, $whr);
				
				
				
				$tableNotBusy = $this->db->update('tables_table', array('is_busy' => '0'), array('table_id' => $t2));
				
				if($tableNotBusy != FALSE){
					
					redirect( TABLES_PAGE );  
					
				}else{
					echo 'error2';
				}
				
			}else{
				echo 'error1';
			}
		}else{
			echo 'error4';
		}
		
	}
	
	public function pro_bg_color(){
		$post = $this->input->post();
		//debug($post);
		$upd['pro_bg'] = $post['color'];
		$whr['pro_id'] = $post['pro_id'];
			$this->db->update('products_table2', $upd, $whr);
		if($this->db->affected_rows() > 0){
			echo 'success';
		}
	}
	
	public function cat_bg_color(){
		$post = $this->input->post();
		//debug($post);
		$upd['cat_bg'] = $post['color'];
		$whr['cat_id'] = $post['cat_id'];
			$this->db->update('menu_cats_table', $upd, $whr);
		if($this->db->affected_rows() > 0){
			echo 'success';
		}
	}
	
	public function change_table(){
		$post = $this->input->post();
		$t1 = $post['table_id_1'];
		$t2 = $post['table_id_2'];
		
		$data['last_order_2'] = $this->db->select('order_id, table_id')
				->where('table_id', $t2)
				->order_by('order_id', 'DESC')
				->limit(1)
				->get('orders_table')->row_array();
		$order_id_2 = $data['last_order_2']['order_id'];
		
		$change = $this->db->update('orders_table', array('table_id' => $t1), array('order_id' => $order_id_2));
		
		if($change != FALSE){
			
			$tableNotBusy = $this->db->update('tables_table', array('is_busy' => '0'), array('table_id' => $t2));
			$tableBusy = $this->db->update('tables_table', array('is_busy' => '1'), array('table_id' => $t1));
			
			if(($tableNotBusy != FALSE) AND ($tableBusy != FALSE) ){
				
				redirect( TABLES_PAGE );  
				
			}else{
				echo 'error22';
			}
			
		}else{
			echo 'error11';
		}
		
		
		
	}
	
	public function user_login(){
		//debug($_SESSION);
		$data['user_types'] = $this->db->select('*')
			->get('user_types_table')->result_array();
		$this->load->view('user_login_view', $data);
	}
	
	public function users(){
		$data['users'] = $this->db->select('*')
			->order_by('user_id', 'DESC')
			->get('users_table')->result_array();
		$this->load->view('users_view', $data);
	}
	
	public function users_auth(){
		
		$data['user_types'] = $this->db->select('*')
			->get('user_types_table')->result_array();
		
		$data['authentications'] = $this->db->select('*')
			->get('user_authentication_table')->result_array();
		
		$this->load->view('users_auth_view', $data);
		//debug($data);
	}
	
	public function get_user_auth_list($ut_id){
		$list = $this->db->select('*')
			->where('user_type_id', $ut_id)
			->get('user_auth_table')->result_array();
		echo json_encode($list);
	}
	
	public function user_auth_post($ut_id){
		$post = $this->input->post();
		
		if($post['ut_id'] > '0'){
			if(!empty($post['auth_id'])){
				$this->db->delete('user_auth_table', array('user_type_id' => $post['ut_id']));
				foreach($post['auth_id'] as $key => $val){
					$this->db->insert('user_auth_table', array('user_type_id' => $post['ut_id'], 'auth_id' => $val));
				}
			}
		}
		if($this->db->affected_rows() > 0){
			echo 'success'; die();
		}
	}
	
	public function check_user(){
		
		$post = $this->input->post();
		$pin = $post['pin'];
		
		$check = $this->db->select('*')
			->where('password', $pin)
			->get('users_table')->row_array();
		
		if(!empty($check)){
			echo json_encode($check); die();
		}else{
			$data['user_id'] = 'error';
			echo json_encode($data); die();
		}
		
	}
	
	public function check_auth(){
		
		$post = $this->input->post();
		$pin = $post['pin'];
		
		$check = $this->db->select('*')
			->where('password', $pin)
			->get('users_table')->row_array();
		
		if(!empty($check)){
			
			$authList = $this->db->select('*')
				->where('user_type_id', $check['user_type_id'])
				->get('user_auth_table')->result_array();
			$data['status'] = 'ok';
			$data['user_id'] = $check['user_id'];
			
			$data['authList'] = $authList;
			
			$this->session->set_userdata('authList', $authList);
			$this->session->set_userdata('user_id', $check['user_id']);
			
			echo json_encode($data); die();
		}else{
			$data['status'] = 'fail';
			echo json_encode($data); die(); 
		}
		
	}
	
	public function person_post(){
		$post = $this->input->post();
		//debug($post);
		$whr['order_id'] = $post['order_id'];
		$upd['person'] = $post['person'];
		$this->db->update('orders_table', $upd, $whr);
		redirect( $_SERVER['HTTP_REFERER'] );
	}
	
	public function cc_update_post(){ 
		$post = $this->input->post();
		$catName = $post['ccName'];
		$catId = $post['ccId'];
		//debug($post);	
			$whr['cat_id'] = $catId;
			$upd['cat_name'] = $catName;
				$this->db->update('menu_cats_table', $upd, $whr);
			
			if($this->db->affected_rows() > 0){
				echo 'ok'; die();
			}
			
	}
	
	public function get_payment_types($pid){
		$data['sub_payment_types'] = $this->db->select('*')
			->where('payment_id', $pid)
			->get('payment_subtypes_table')->result_array();
		
		$this->load->view('sub_payment_types_view', $data);
		
	}
	
	public function add_subpayment_post(){
		$post = $this->input->post();
		//debug($post);
		$ins['payment_id'] = $post['payment_id'];
		$ins['payment_subname'] = $post['payment_subname'];
			$this->db->insert("payment_subtypes_table", $ins);
		
		if($this->db->affected_rows() > 0){
			echo 'success';
		}
		
	}
	
	public function update_subpayment_post(){
		$post = $this->input->post();
		//debug($post);
		$whr['payment_sub_id'] = $post["sp_id"];
		$upd['payment_subname'] = $post['sp_name'];
			$this->db->update("payment_subtypes_table", $upd, $whr);
		
		if($this->db->affected_rows() > 0){
			echo 'success';
		}else{
			echo 'error';
		}
		
	}
	
	public function delete_subpayment($spid){
		
		$whr['payment_sub_id'] = $spid;
			$this->db->delete("payment_subtypes_table", $whr);
		
		if($this->db->affected_rows() > 0){
			echo 'success';
		}else{
			echo 'error';
		}
		
	}
	
	public function support_post(){
		$post = $this->input->post();
		//debug($post);
			
			$sender = 'info@bulutkasa.com';
			$pass = 'gdgTdd76*-*';
			$receiver = 'info@bulutkasa.com';
			$subject = 'Pos Geri Bildirim Mesajı';
			$body = '<div style="background:#efefef; padding:10px;">
						<div><span>Kullanıcı Adı : </span><span>'.$_SESSION["uname"].'</span></div>
						<div><span>Konu : </span><span>'.$post["subject"].''.$ins["last_name"].'</span></div>
						<div><span>Mesaj : </span><span>'.$post["textMsg"].'</span></div>
					</div>';
			
			
			$mailSend = $this->mail($sender, $pass, $receiver, $subject, $body);
		
			if($mailSend != FALSE){
				redirect(MAIN_BOARD);
			}
	
	
	}
	
	public function mail($sender_mail, $sender_pass, $receiver_mail, $subject, $body){
		
		//--FIRST DECLARATIONS----
        $data = $this->assist->data;
		//echo $body; die();
		//debug($data['SES']);
		$smtp_host = 'ssl://smtp.yandex.com';
		$port = 465;
		
		//debug($mail_info);
		
		//mail gönderimi--------------
		$ci = get_instance();
		$ci->load->library('email');
		$config['protocol'] = "smtp";
		$config['smtp_host'] = $smtp_host;
		$config['smtp_port'] = $port;
		$config['smtp_user'] = $sender_mail; 
		$config['smtp_pass'] = $sender_pass;
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";

		$ci->email->initialize($config);

		$ci->email->from($sender_mail, 'Bulut Kasa'); 
		$ci->email->to($receiver_mail);
		//$ci->email->bcc($bcc);
		$ci->email->subject($subject);
		$ci->email->message($body);
		$send = $ci->email->send();
		
		if($send){
			return TRUE;
		}else{
			return FALSE;
		}
	
	}
	
	public function save_file($from_file, $to_file){
		
		
		try {
			  // Create a new SimpleImage object
			  $image = new \claviska\SimpleImage();

			  // Magic! âœ¨
			  $image
				->fromFile($from_file)
				->autoOrient()   							
				//->thumbnail($width, $height, 'center')				
				->toFile($to_file, 'image/jpeg', 100); 
				
				//die("sdfsd");

			  // And much more! ğŸ’ª
			} catch(Exception $err) {
			  // Handle errors
			  echo $err->getMessage();
			}
	}
	
	public function resize_function($from_file, $to_file, $width, $height){
		
		
		try {
			  // Create a new SimpleImage object
			  $image = new \claviska\SimpleImage();

			  // Magic! âœ¨
			  $image
				->fromFile($from_file)                     // load image.jpg
				->autoOrient()   							// adjust orientation based on exif data
				->thumbnail($width, $height, 'center')				
				//->resize(320, 200)                          // resize to 320x200 pixels
				//->flip('x')                                 // flip horizontally
				//->colorize('DarkBlue')                      // tint dark blue
				//->border('black', 10)                       // add a 10 pixel black border
				//->overlay('watermark.png', 'bottom right')  // add a watermark image
				->toFile($to_file, 'image/jpeg', 100);      // convert to PNG and save a copy to new-image.png
				//->toScreen();                               // output to the screen

			  // And much more! ğŸ’ª
			} catch(Exception $err) {
			  // Handle errors
			  echo $err->getMessage();
			}
	}
	
	
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siparis extends CI_Controller {
	
	public function __construct() {    
        parent::__construct();  
	
	$this->load->library('session');
	
		//debug($this->session->all_userdata());
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
	
	public function settings_main(){
		//$data['mt'] = '14';
		//$data['mm'] = '14';
		$this->load->view('settings_main_view', $data);
	}
	
	public function user_settings(){
		$data['user_types'] = $this->db->select('*')
			->get('user_types_table')->result_array();
		
		$data['payment_types'] = $this->db->select('*')
			->get('payment_types_table')->result_array();
		
		$data['printers'] = $this->db->select('*')
			->get('aaa_printers_table')->result_array();
		
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
			->where('status !=','5')
			->get('users_table')->result_array();
		$data['mm'] = '14';
		$data['mt'] = '14';
		$data['mt2'] = '14_2';
		$this->load->view('user_settings_view2', $data);
		
	}
	
	public function archived_users(){
		$data['user_types'] = $this->db->select('*')
			->get('user_types_table')->result_array();
		
		$data['authentications'] = $this->db->select('*')
			->get('user_authentication_table')->result_array();	
		
		$data['settings'] = $this->db->select('*')
			->where('id', '1')
			->get('settings_table')->row_array();

		$data['user_list'] = $this->db->select('*')
			->where('status','5')
			->get('users_table')->result_array();
		$data['mm'] = '14';
		$data['mt'] = '14';
		$data['mt2'] = '14_2';
		$this->load->view('archived_users_view', $data);
		
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
	
	public function archive_user($uid){
		
		$this->db->update('users_table', array('status' => '5'), array('user_id' => $uid));
		if($this->db->affected_rows() > 0){
			echo 'success';
		}
	}
	
	public function unarchive_user($uid){
		
		$this->db->update('users_table', array('status' => '0'), array('user_id' => $uid));
		if($this->db->affected_rows() > 0){
			echo 'success';
		}
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
					redirect($_SERVER['HTTP_REFERER']);
				}else{
					redirect($_SERVER['HTTP_REFERER']);
				}
			}else{
				$_SESSION['pass_error'] = '<b>Bu şifre ile daha önce kayıt yapılmıştır. <br /><br /> Lütfen farklı bir şifre ile kayıt yapınız!</b>';
				redirect($_SERVER['HTTP_REFERER']);
			}	
			
		
	}
	
	public function add_user_post(){
		$post = $this->input->post();
		//debug($post);
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
				$_SESSION['pass_error'] = '<b>Bu şifre ile daha önce kayıt yapılmıştır. <br /><br /> Lütfen farklı bir şifre ile kayıt yapınız!</b>';
				redirect($_SERVER['HTTP_REFERER']);
			}
			
			
		}
		
	}
	
	public function update_settings(){
		
		$data['settings'] = $this->db->select('*')
			->where('id', '1')
			->get('settings_table')->row_array();
		
		$data['mm'] = '14';
		$data['mt'] = '14';
		$data['mt2'] = '14_31';
		
		$this->load->view('update_settings_view', $data);
		
	}
	
	public function branch_list(){
		
		$data['branches'] = $this->db->select('*')
			->get('branches_table')->result_array();
		
		$data['mm'] = '14';
		$data['mt'] = '14';
		$data['mt2'] = '14_32';
		
		$this->load->view('branch_list_view', $data);
		
	}
	
	public function branch_details_page($br_id){
		
		$data['branch'] = $this->db->select('*')
			->where('branch_id', $br_id)
			->get('branches_table')->row_array();
		
		$data['mm'] = '14';
		$data['mt2'] = '14_32';
		
		$this->load->view('branch_update_view', $data);
		
	}
	
	public function update_branch_post(){
		$post = $this->input->post();
		//debug($post);
		$whr['branch_id'] = $post['branch_id'];
		$upd['br_name'] = $post['br_name'];
		$upd['br_address'] = $post['br_address'];
		$upd['br_city'] = $post['br_city'];
		$upd['br_town'] = $post['br_town'];
		$upd['br_phone'] = $post['br_phone'];
		$upd['br_whatsapp'] = $post['br_whatsapp'];
		$upd['br_email'] = $post['br_email'];
		if($post['br_pass'] != ''){
			$upd['br_pass'] = $post['br_pass'];
		}
		if(!empty($post['open'])){
			$upd['open'] = '1';
		}else{
			$upd['open'] = '0';
		}
		$upd['br_latitude'] = $post['br_latitude'];
		$upd['br_longitude'] = $post['br_longitude'];
		$upd['br_openinghour'] = $post['br_openinghour'];
		$upd['br_closehour'] = $post['br_closehour'];
			$this->db->update('branches_table', $upd, $whr);
		
		if($this->db->affected_rows() > 0){
			echo 'success';
		}else{
			echo 'error';
		}
		
	}
	
	public function update_settings2(){
		
		$data['settings'] = $this->db->select('*')
			->where('id', '1')
			->get('settings_table')->row_array();
		
		$data['mm'] = '22';
		$data['mt2'] = '22_3';
		
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
	
	public function update_about_us(){
		
		$data['page'] = $this->db->select('*')
			->where('id', '1')
			->get('about_us_table')->row_array();
		$data['mm'] = '22';
		$data['mt2'] = '22_4';
		$this->load->view('update_about_us_view', $data);
		
	}
	
	public function update_slides(){
		
		$data['mm'] = '22';
		$data['mt2'] = '22_5';
		$this->load->view('update_slides_view', $data);
		
	}
	
	public function update_gallery(){
		
		$data['mm'] = '22';
		$data['mt2'] = '22_6';
		$this->load->view('update_gallery_view', $data);
		
	}
	
	public function reservation(){
		
		$data['mm'] = '17';
		$data['mt'] = '17';
		$data['mt2'] = '17_1';
		
		$data['list'] = $this->db->select('id,reservation_date')
			//->join('customers_table', 'reservations_table.user_id = customers_table.customer_id', 'left')
			->group_by('reservation_date')
			->get('reservations_table')->result_array();
		
		
	
		
		foreach( $data['list'] as $key => $val ){
			$data['list'][$key]['onayli'] = $this->db->select('id,reservation_date')
				->where('reservation_date', $val['reservation_date'])
				->where('status', '0')
				->get('reservations_table')->num_rows();
			$data['list'][$key]['beklemede'] = $this->db->select('id,reservation_date')
				->where('reservation_date', $val['reservation_date'])
				->where('status = 5  OR status = 4 ')
				->get('reservations_table')->num_rows();
			$data['list'][$key]['person'] = $this->db->select_sum('total_person')
				->where('reservation_date', $val['reservation_date'])
				->where('status', '0')
				->get('reservations_table')->row_array();
		}
		
		//debug($data['list']);
		
		
		
		$this->load->view('reservation_view', $data);
		
	}
	
	public function reservation_list(){
		
		$data['mm'] = '17';
		$data['mt'] = '17';
		$data['mt2'] = '17_2';
		
		$data['list'] = $this->db->select('*')
			->join('customers_table', 'reservations_table.user_id = customers_table.customer_id', 'left')
			->where('date_int > ', strtotime(date("d-m-Y",(time() - 86400))) )
			->get('reservations_table')->result_array();
		
		$this->load->view('reservation_list_view', $data);
		
	}
	
	public function reservation_old_list(){
		
		$data['mm'] = '17';
		$data['mt'] = '17';
		$data['mt2'] = '17_3';
		
		$data['list'] = $this->db->select('*')
			->join('customers_table', 'reservations_table.user_id = customers_table.customer_id', 'left')
			->where('date_int < ', strtotime(date("d-m-Y",(time()))) )
			->get('reservations_table')->result_array();
		
		$this->load->view('reservation_list_view', $data);
		
	}
	
	public function reservation_detail($id){
		$data['mm'] = '17';
		$data['mt'] = '17';
		$data['details'] = $this->db->select('*')
			->join('customers_table', 'reservations_table.user_id = customers_table.customer_id', 'left')
			->where('id', $id)
			->get('reservations_table')->row_array();
		//debug($data);
		$this->load->view('reservation_detail_view', $data);
	}
	
	public function reservation_day_list($date){
		$data['mm'] = '17';
		$data['mt'] = '17';
		$data['list'] = $this->db->select('*')
			->join('customers_table', 'reservations_table.user_id = customers_table.customer_id', 'left')
			->where('reservation_date', $date)
			->get('reservations_table')->result_array();
		$data['list2'] = $this->db->select('*')
			->join('customers_table', 'reservations_table.user_id = customers_table.customer_id', 'left')
			->where('reservation_date', $date)
			->order_by('reservation_hour', 'ASC')
			->get('reservations_table')->result_array();
		$data['date'] = $date;
		
		$data['printers'] = $this->db->select('*')
			->get('aaa_printers_table')->result_array();
		
		$this->load->view('reservation_day_list_view', $data);
	}
	
	public function delete_reservation($id){
		if($id > 0){
			
			$this->db->delete('reservations_table', array('id' => $id));
			
			if( $this->db->affected_rows() > 0 ){
				
				redirect( RESERVATION );
				
			}
			
		}
		
	}
	
	public function cancel_reservation($id){
		
		if($id > 0){
			
			$this->db->update('reservations_table', array('status' => '3'), array('id' => $id));
			
			if( $this->db->affected_rows() > 0 ){
				
				redirect( $_SERVER['HTTP_REFERER'] );
				
			}
			
		}
		
	}
	
	public function approve_reservation($id){
		
		if($id > 0){
			
			$this->db->update('reservations_table', array('status' => '1'), array('id' => $id));
			
			if( $this->db->affected_rows() > 0 ){
				
				redirect( $_SERVER['HTTP_REFERER'] );
				
			}
			
		}
		
	}
	
	public function approve2_reservation($id){
		
		if($id > 0){
			
			$this->db->update('reservations_table', array('status' => '0'), array('id' => $id));
			
			if( $this->db->affected_rows() > 0 ){
				
				redirect( $_SERVER['HTTP_REFERER'] );
				
			}
			
		}
		
	}
	
	public function update_reservation_post(){
		
		$post = $this->input->post();
		//debug($post);
		
		$whr['id'] = $post['id'];
		$upd['reservation_date'] = $post['reservation_date'];
		$upd['date_int'] = strtotime($post['reservation_date']);
		$upd['reservation_hour'] = $post['reservation_hour'];
		$upd['total_person'] = $post['total_person'];
		$upd['note'] = $post['note'];
		
			$this->db->update('reservations_table', $upd, $whr);
		
		redirect( $_SERVER['HTTP_REFERER'] );
	}
	
	public function update_about_us_post(){
		
		$post = $this->input->post();
		//debug($post);
		$settings = $this->db->select('*')
			->where('id', '1')
			->get('about_us_table')->row_array();
		
		$upd['page_title'] = $post['page_title'];
		$upd['page_content'] = $post['page_content'];
	
		if(empty($settings)){
			$this->db->insert('about_us_table', $upd);
		}else{
			$this->db->update('about_us_table', $upd, array('id' => 1));
		}
	
			 
		if($this->db->affected_rows() > 0){
			redirect($_SERVER['HTTP_REFERER']); 
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}
		
	}
	public function update_order_settings(){
		
		$data['settings'] = $this->db->select('*')
			->where('id', '1')
			->get('order_codes_table')->row_array();
		$data['mt'] = '15_15';
		
		$data['orders'] = $this->db->select('*')
			->join('customers_table', 'orders_table.customer_id = customers_table.customer_id', 'left')
			->join('branches_table', 'orders_table.branch_id = branches_table.branch_id', 'left')
			->where('orderType > 0')
			->order_by('order_id', 'DESC')
			->get('orders_table')->result_array();
		
		$this->load->view('update_order_settings', $data);
		
	}
	
	public function update_order_status(){
		$post = $this->input->post();
		//debug($post);
		$upd['status'] = $post['status'];
		$whr['order_id'] = $post['order_id'];
			$this->db->update("orders_table", $upd, $whr);
		if($this->db->affected_rows() > 0){
			echo 'success';
		}else{
			echo 'error';
		}
	}
	
	public function online_order_details($order_id){
		$data['order'] = $this->db->select('*')
			->where('order_id', $order_id)
			->get('orders_table')->row_array();
		$data['order_details'] = $this->db->select('*')
			->where('order_id', $order_id)
			->get('order_details_table')->result_array();
		
		$data['address'] = $this->db->select('*')
			->join("city", "customer_addresses_table.city_id = city.CityID", "left")
			->join("town", "customer_addresses_table.town_id = town.TownID", "left")
			->join("district", "customer_addresses_table.district_id = district.DistrictID", "left")
			->where('id', $data['order']['address_id'])
			->get('customer_addresses_table')->row_array();
		
		$data['customer'] = $this->db->select('*')
			->where('customer_id', $data['order']['customer_id'])
			->get('customers_table')->row_array();
		
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
		
		$data['payment'] = $this->db->select('*')
			->where('order_id', $order_id)
			->get('order_payments_table')->row_array();
		
		$this->load->view('online_order_details_view', $data);
		
	}
	
	public function update_order_settings_post(){
		$post = $this->input->post();
		
		$upd['code_text'] = $post['code_text'];
		
		$settings = $this->db->select('*')
			->where('id', '1')
			->get('order_codes_table')->row_array();
		
		if(empty($settings)){
			$this->db->insert('order_codes_table', $upd);
		}else{
			$this->db->update('order_codes_table', $upd, array('id' => 1));
		}
		
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('msg', 'success');
			redirect( $_SERVER['HTTP_REFERER'] );
		}else{
			$this->session->set_flashdata('msg', 'error');
			redirect( $_SERVER['HTTP_REFERER'] );
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
		$upd['whatsapp'] = $post['whatsapp'];
		$upd['web'] = $post['web'];
		$upd['facebook'] = $post['facebook'];
		$upd['instagram'] = $post['instagram'];
		$upd['twitter'] = $post['twitter'];
		$upd['workhours'] = $post['workhours'];
		$upd['google_map'] = $post['google_map'];
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
		
		$data['stngs'] = $this->db->select('store_name, address')
			->where('id', '1')
			->get('settings_table')->row_array();
		
		$fdate = $data['day']['day_start_time'];
		//debug(date("d-m-Y H:i:s",$fdate));
		$ldate = time();
		
		$data['payments'] = $this->db->select('*')
			->where('payment_time >=', $data['day']['day_start_time'])
			->get('order_payments_table')->result_array();
		//debug($data);
		
		if(!empty($data['payments'])){
		
		$data['printers'] = $this->db->select('*')
			->get('aaa_printers_table')->result_array();
		
		$data['titleText'] = date('d/m/Y H:i', $fdate).' - '.date('d/m/Y H:i', $ldate).' Tarihleri Arası Adisyon Raporları';
		$data['list'] = $this->db->select('*')
			->join('tables_table', 'orders_table.table_id = tables_table.table_id', 'left')
			->where('order_insert_time >= ', $fdate)
			->where('order_insert_time <= ', $ldate)
			->get('orders_table')->result_array();
		
		foreach($data['list'] as $key => $val){
			$idlist[] = $val['order_id'];
		}
		
			$idL = implode(",", $idlist);
		
		
		$data['proList'] = $this->db->select('*, COUNT(porsion_id) AS count')
				->join('porsions_table', 'order_details_table.porsion_id = porsions_table.id', 'left')
				->where("order_id IN (".$idL.")")
				->group_by('porsion_id')
				->get('order_details_table')->result_array();
		
		//debug($data['proList']);
		foreach( $data['list'] as $key => $val ){
			
			$data['list'][$key]['people'] = $this->db->select_sum('person')
				->where('order_id', $val['order_id'])
				->get('orders_table')->row_array();
			
			$data['list'][$key]['order_details'] = $this->db->select('porsion_id, pro_id, description, qty')
				->where('order_id', $val['order_id'])
				->get('order_details_table')->result_array();
			
			//$ordid = $val['order_id'];
			
			//$qry[$key] = 	"SELECT COUNT(DISTINCT porsion_id) as countx FROM order_details_table  WHERE order_id = $ordid GROUP BY porsion_id ";
			
			$data['list'][$key]['details'] = $this->db->select('*, COUNT(porsion_id) AS count')
				->join('porsions_table', 'order_details_table.porsion_id = porsions_table.id', 'left')
				->where('order_id', $val['order_id'])
				->group_by('porsion_id')
				->get('order_details_table')->result_array();
			
			$data['groupedProducts'][] = $data['list'][$key]['details'];
			
			foreach( $data['list'][$key]['details'] as $kk => $vv ){
				if($vv['description'] == 'İptal'){
					$data['iptal'] += ($vv['porsion_price'] * $vv['qty']);
				}
				if($vv['description'] == 'İkram'){
					$data['ikram'] += ($vv['porsion_price'] * $vv['qty']);
				}
			}
		}

		

		foreach($data['list'] as $key => $val){
			$data['list'][$key]['details'] = $this->db->select('*')
				->where('order_id', $val['order_id'])
				->get('orders_table')->result_array();
			$data['list'][$key]['cash'] = $this->db->select_sum('paid_price')
				->where('payment_type', 'cash')
				->where('order_id', $val['order_id'])
				->get('order_payments_table')->row_array();
			$data['list'][$key]['credit'] = $this->db->select_sum('paid_price')
				->where('payment_type', 'credit')
				->where('order_id', $val['order_id'])
				->get('order_payments_table')->row_array();
			$data['list'][$key]['open'] = $this->db->select_sum('paid_price')
				->where('payment_type', 'openPay')
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
		$data['credit_subPayments'] = $this->db->select('*')
			->join('payment_subtypes_table', 'order_payments_table.sub_p_id = payment_subtypes_table.payment_sub_id', 'left')
			->where('payment_type', 'credit')
			->where('sub_p_id > 0')
			->group_by('sub_p_id')
			->where('payment_time >=', $fdate)
			->where('payment_time <=', $ldate)
			->get('order_payments_table')->result_array();
		//debug($data['credit_subPayments']);
		foreach($data['credit_subPayments'] as $key => $val){
			$data['credit_subPayments'][$key]['total'] = $this->db->select_sum('paid_price')
				->where('sub_p_id', $val['sub_p_id'])
				->where('payment_time >=', $fdate)
				->where('payment_time <=', $ldate)
				->get('order_payments_table')->row_array();
		}
		//debug($data['credit_subPayments']);
		
		$data['mealcard_subPayments'] = $this->db->select('*')
			->join('payment_subtypes_table', 'order_payments_table.sub_p_id = payment_subtypes_table.payment_sub_id', 'left')
			->where('payment_type', 'mealCard')
			->where('sub_p_id > 0')
			->group_by('sub_p_id')
			->where('payment_time >=', $fdate)
			->where('payment_time <=', $ldate)
			->get('order_payments_table')->result_array();
		
		foreach($data['mealcard_subPayments'] as $key => $val){
			$data['mealcard_subPayments'][$key]['total'] = $this->db->select_sum('paid_price')
				->where('sub_p_id', $val['sub_p_id'])
				->where('payment_time >=', $fdate)
				->where('payment_time <=', $ldate)
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
		
		//debug($data['list2']);
		
		$this->load->view('day_details_view', $data);
		
		}else{
			$this->load->view('day_details_view', $data);
		}
		
		
	}
	
	public function month_details($fdate, $ldate){
		
		$data['day']['day_start_time'] = $fdate;
		
		$data['payments'] = $this->db->select('*')
			->where('payment_time >=', $fdate)
			->where('payment_time <=', $ldate)
			->get('order_payments_table')->result_array();
		$data['printers'] = $this->db->select('*')
			->get('aaa_printers_table')->result_array();
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
			->where('payment_type', 'mealCard')
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
			
			$data['list'][$key]['people'] = $this->db->select_sum('person')
				->where('order_id', $val['order_id'])
				->get('orders_table')->row_array();
			
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
				->where('payment_type', 'openPay')
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
				$data['title'] = '';
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
			if($vv['is_busy'] > 0){
				$data['tables'][$kk]['total'] = $this->db->select('*')
					->where('order_id', $vv['activeOrderId'])
					->get('orders_table')->row_array();
			}
		}
		
		//debug($data['tables']);
		
		foreach($data['zones'] as $key => $val){
			$data['zones'][$key]['tables'] = $this->db->select('*')
				->where('table_zone', $val['zone_id'])
				->order_by('table_id', 'ASC')
				->get('tables_table')->result_array();
			
			foreach($data['zones'][$key]['tables'] as $kk => $vv){
				$data['zones'][$key]['tables'][$kk]['total'] = $this->db->select('*')
					->where('order_id', $vv['activeOrderId'])
					->get('orders_table')->row_array();
			}
		
		}
		
		$this->load->view('tables_view', $data);
	}
	
	public function check_ready(){
		$data['tables'] = $this->db->select('*')
				->where('table_zone > 0')
				->get('tables_table')->result_array();
		
		foreach($data['tables'] as $key => $val){
			if($val['is_busy'] > 0){
				$data['tables'][$key]['order'] = $this->db->select('order_id')
					->where('order_id', $val['activeOrderId'])
					->get('orders_table')->row_array();
			}
			$data['tables'][$key]['order']['ready'] = $this->db->select('id,ready')
				->where('order_id',$data['tables'][$key]['order']['order_id'])
				->where('ready', '1')
				->get('order_details_table')->num_rows();
			if($val['is_busy'] > 0){
				$data['tables'][$key]['total'] = $this->db->select('rest_price')
					->where('order_id', $val['activeOrderId'])
					->get('orders_table')->row_array();
			}
		}
		
		//debug($data['tables']);
		echo json_encode($data['tables']);
		
	}
	
	public function prrr(){
		$list = $this->db->select('pro_id,porsion_name, porsion_price')
			->where('pro_id IN ( 167,157,169,168,180,179,161,184,162,170,182 )')
			->get('porsions_table')->result_array();
		/*167,157,169,168,180,179,161,184,162,170,182*/
		
		foreach($list as $key => $val){
			
			$list[$key]['porsion_name'] = 'Tam';
			$list[$key]['porsion_price'] = $val['porsion_price'];
			
			$list[$key]['porsion_2'] = 'Yarım';
			$list[$key]['porsion_2_price'] = (($val['porsion_price'])/2) + 2;
			
			$list[$key]['porsion_3'] = '1.5';
			$list[$key]['porsion_3_price'] = ((($val['porsion_price'])/2)*3) + 2;
			
			$list[$key]['porsion_4'] = 'Duble';
			$list[$key]['porsion_4_price'] = ((($val['porsion_price']))*2);
			
			$whr[$key]['pro_id'] = $val['pro_id'];
			$upd[$key]['porsion_name'] = 'Tam';
			$upd[$key]['sort'] = 2;
			$this->db->update('porsions_table', $upd[$key], $whr[$key]);
			
			$ins2[$key]['pro_id'] = $val['pro_id'];
			$ins2[$key]['porsion_name'] = 'Yarım';
			$ins2[$key]['porsion_price'] = $list[$key]['porsion_2_price'];
			$ins2[$key]['sort'] = 1;
			$this->db->insert('porsions_table',$ins2[$key]);
			
			$ins3[$key]['pro_id'] = $val['pro_id'];
			$ins3[$key]['porsion_name'] = '1.5';
			$ins3[$key]['porsion_price'] = $list[$key]['porsion_3_price'];
			$ins3[$key]['sort'] = 3;
			$this->db->insert('porsions_table',$ins3[$key]);
			
			$ins4[$key]['pro_id'] = $val['pro_id'];
			$ins4[$key]['porsion_name'] = 'Duble';
			$ins4[$key]['porsion_price'] = $list[$key]['porsion_4_price'];
			$ins4[$key]['sort'] = 4;
			$this->db->insert('porsions_table',$ins4[$key]);
			
		}
		die("done");  
		debug($list);
	}
	
	public function get_ready_order_rows(){
		$post = $this->input->post();
		
		$table = $this->db->select('table_id')
			->where('order_id', $post['order_id'])
			->get('orders_table')->row_array();
		
		$data['table'] = $this->db->select('table_name')
			->where('table_id', $table['table_id'])
			->get('tables_table')->row_array();
		
		$data['order_rows'] = $this->db->select('*')
				->where('order_id', $post['order_id'])
				->where('ready', '1')
				->where('description != ', 'İptal')
				->get('order_details_table')->result_array();

		$this->load->view("ready_orders_view", $data);
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
		$data['mm'] = '14';
		$data['mt'] = '14';
		$data['mt2'] = '14_22';
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
		$data['printers'] = $this->db->select('*')
			->get('aaa_printers_table')->result_array();
		
		//debug($data['cats']);
		$data['table'] = $this->db->select('*')
			->where('table_id', $table_id)
			->get('tables_table')->row_array();
		
		if($data['table']['is_busy'] > 0){
			
			
			$data['payments'] = $this->db->select('*')
				->where('order_id', $data['table']['activeOrderId'])
				->where('payment_type !=', 'discount')
				->get('order_payments_table')->result_array();
			$data['discounts'] = $this->db->select('*')
				->where('order_id', $data['table']['activeOrderId'])
				->where('payment_type', 'discount')
				->get('order_payments_table')->result_array();
			
			
			$this->update_order_price($data['table']['activeOrderId']);
			
			$data['last_order'] = $this->db->select('*')
				->where('order_id', $data['table']['activeOrderId'])
				->get('orders_table')->row_array();
			
			
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
			->where('is_busy > 0')
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
				->where('status', '1')
				->get('payment_subtypes_table')->result_array();
		}
		
		
		$data['settings'] = $this->db->select('*')
			->where('id', '1')
			->get('settings_table')->row_array();
		
		$this->load->view('order_view', $data); 
	}
	
	public function send_to_printer(){
		$post = $this->input->post();
		//debug($post);
		
		$pr = $this->db->select('*')
			->where('printer_ip', $post['printer'])
			->get('aaa_printers_table')->row_array();
		
		$settings = $this->db->select('*')
			->where('id', '1')
			->get('settings_table')->row_array();
		
		
		
		$arr['restaurant_name'] = $_SESSION['store_name'];
		$arr['printer_ip'] = $post['printer'];
		$arr['print_type'] = 'receipt';
		$arr['order_id'] = $post['order_id'];
		$arr['table_name'] = $post['table_name'];
		$arr['user_name'] = $_SESSION['user_name'];
		
		$order = $this->db->select('total_price, discount_price,extra_price, paid_price, rest_price, order_insert_time, table_id')
			->where('order_id', $post['order_id'])
			->get('orders_table')->row_array();
		
		$arr['total_price'] = $order['total_price'];
		$arr['discount_price'] = $order['discount_price'];
		$arr['extra_price'] = $order['extra_price'];
		$arr['paid_price'] = $order['paid_price'];
		$arr['rest_price'] = $order['rest_price'];
		$arr['order_insert_time'] = date("d.m.Y H:i",$order['order_insert_time']);
		
		
		$arr['order_details'] = $this->db->select('pro_name, qty, price, description')
			->where('order_id', $post['order_id'])
			->order_by('id', 'ASC')
			->get('order_details_table')->result_array(); 
		
		//debug($order);
		$json = json_encode($arr, JSON_UNESCAPED_UNICODE);
		
		
		$ins['htmlBody'] .= '<div style="font-weight:bold;">';
		$ins['htmlBody'] .= '<div class="cnt""><b>'.$settings['adisyon_header'].'</b></div>';
		$ins['htmlBody'] .= '<div class="cnt" style="font-size:45px;"><b>'.$arr['restaurant_name'].'</b></div>';
		$ins['htmlBody'] .= '<div class="cnt" style="font-size:26px;">Masa : '.$arr['table_name'].'</div>';
		$ins['htmlBody'] .= '<div class="cnt">Garson : '.$arr['user_name'].'</div>';
		$ins['htmlBody'] .= '<div class="cnt">'.$arr['order_insert_time'].'</div> <br /><br />';
		
		foreach( $arr['order_details'] as $key => $val ){
			
			if($val['description'] != 'İptal'){
			
			if($val['description'] == 'FD'){
				$ddesc[$key] = '';
			}else{
				$ddesc[$key] = $val['description'];
			}
				$ins['htmlBody'] .= '<div style="font-size:25px;">
										<div class="w60">'.$val['pro_name'].' '.$ddesc[$key].'</div>
										<div class="w20 cnt">'.$val['qty'].'</div>
										<div class="w20 text-right">'.number_format(($val['qty'] * $val['price']),2).'</div>
										<div class="clr"></div>
									</div>';
			}
			
		}
		
		$ins['htmlBody'] .= '<br />';
		if( ($arr['extra_price'] > 0) ){
			$ins['htmlBody'] .= '<div class="">
									<div class="w40"><b>'.$settings['extra_name'].'</b></div>
									<div class="w60 text-right">'.$arr['extra_price'].' TL</div>
									<div class="clr"></div>
								</div>';
		}
		if( ($arr['discount_price'] > 0) OR ($arr['paid_price'] > 0) ){
			$ins['htmlBody'] .= '<div class="">
									<div class="w40"><b>Toplam</b></div>
									<div class="w60 text-right">'.$arr['total_price'].' TL</div>
									<div class="clr"></div>
								</div>';
		}
		
		if( ($arr['paid_price'] - $arr['discount_price']) > 0){
			$ins['htmlBody'] .= '<div class="">
										<div class="w60"><b>Ödenen</b></div>
										<div class="w40 text-right">'.number_format($arr['paid_price']-$arr['discount_price'],2).' TL</div>
										<div class="clr"></div>
									</div>';
		}
		if( ($arr['discount_price']) > 0){
			$ins['htmlBody'] .= '<div class="">
										<div class="w60"><b>İndirim</b></div>
										<div class="w40 text-right">'.$arr['discount_price'].' TL</div>
										<div class="clr"></div>
									</div>';
		}
		//if( ($arr['discount_price'] > 0) OR ($arr['paid_price'] > 0) ){
		$ins['htmlBody'] .= '<div class="fBig">
									<div class="w50" style="font-size:40px;white-space:nowrap;"><b>G. Toplam</b></div>
									<div class="w50 text-right" style="font-size:40px;white-space:nowrap;">'.$arr['rest_price'].' TL</div>
									<div class="clr"></div>
								</div>';
		//}
		$ins['htmlBody'] .= '<br />';
		$ins['htmlBody'] .= '<br />';
		$ins['htmlBody'] .= '<div class="cnt""><b>'.$settings['adisyon_footer'].'</b></div>';
		$ins['htmlBody'] .= '</div><br /><br /><div style="border-bottom:1px solid #000;"></div>';
		
		$ins['printerName'] = $post['printer'];
		$ins['printer_type'] = $pr['printer_type'];
		$ins['jsonArray'] = $json;
		$ins['insertTime'] = time();
		$ins['imgName'] = date('d-m-Y-His', time()).uniqid().'.png';
		
		$this->db->insert('aaa_print_table', $ins);
		
		if($this->db->affected_rows() > 0){
			if(empty($post['rePrint'])){
				$this->db->update('tables_table', array('is_busy' => '2'), array('table_id' => $order['table_id']));
			}
			echo 'success';
		}else{
			echo 'error';
		}
		
		
	}
	
	public function send_to_printer_report(){
		
		$post = $this->input->post();
		
		$ins['htmlBody'] = $post['htmlBody'];
		$ins['printerName'] = $post['printer'];
		
		$ins['insertTime'] = time();
		$ins['imgName'] = date('d-m-Y-His', time()).uniqid().'.png';
		
		$this->db->insert('aaa_print_table', $ins);
		
		if($this->db->affected_rows() > 0){
			echo 'success';
		}else{
			echo 'error';
		}
		
		
	}
	
	public function phone_order(){
		//$this->output->enable_profiler(TRUE);
		
		$data['cats'] = $this->db->select('*')
			->where('type', '1')
			->order_by('sort', 'ASC')
			->get('menu_cats_table')->result_array(); 
		
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
		$data['table']['table_id'] = '0';
		$data['phone_order'] = '1';
		$this->load->view('order_view', $data); 
	}
	
	public function close_order(){
		$post = $this->input->post();
		//debug($post);
		
		$ins['order_id'] = $post['order_id'];
		$ins['customer_id'] = $post['cust_id'];
		$ins['paid_price'] = $post['total_price'];
		
		$ins['payment_type'] = $post['payment_type'];
		
		if(($post['payment_type'] == 'credit') OR ( $post['payment_type'] == 'mealCard' ))
		{
			$ins['sub_p_id'] = $post['sub_p_id'];
		}
		
		
		$ins['payment_time'] = time();
			$this->db->insert('order_payments_table', $ins);
		
		if($this->db->affected_rows() > 0){
			echo 'success';
		}else{
			echo 'error';
		}
		
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
	
	public function getReadyStatus($order_id){
		$data['order_details'] = $this->db->select('id,ready')
			->where('order_id', $order_id)
			->get('order_details_table')->result_array();
		
		echo json_encode($data['order_details']);
		
	}
	
	public function getTableName($table_id){
		
		$table = $this->db->select('table_name')
			->where('table_id', $table_id)
			->get('tables_table')->row_array();
		
		return $table['table_name'];
		
	}
	
	public function siparis_post(){
		$post = $this->input->post();
		//debug($post);
		$stngs = $this->db->select('store_name, address')
			->where('id', '1')
			->get('settings_table')->row_array();
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
					
					if($post['printed'][$key] == '0'){
						$kitch[$key] = $this->findKitchen($post['pro_id'][$key]);
						if($kitch[$key] != 0){
							$kitchenId = $kitch[$key]['kitchen_ip'];
							$kitchen[$kitchenId][$key]['pro_id'] = $post['pro_id'][$key];
							$kitchen[$kitchenId][$key]['pro_name'] = $post['pro_name'][$key].' '.$post['desc2'][$key];
							$kitchen[$kitchenId][$key]['qty'] = $post['qty'][$key];
						}
						
					}
					
					if($post['row_id'][$key] == 'undefined'){
						$insx['user_id'] = $post['user_id'];
						$insx['order_id'] = $order_id;
						$insx['process'] = 'pro_insert';
						$insx['first_price'] = $post['price'][$key];
						$insx['pro_id'] = $post['pro_id'][$key];
						$insx['porsion_id'] = $post['porsion_id'][$key];
						$insx['qty'] = $post['qty'][$key];
						$insx['insert_time'] = time();
							$this->db->insert('user_log_report', $insx);						
					}
					
					
					$ins2['order_id'] = $order_id;
					$ins2['pro_id'] = $post['pro_id'][$key];
					$ins2['porsion_id'] = $post['porsion_id'][$key];
					$ins2['pro_name'] = $post['pro_name'][$key];
					$ins2['description'] = $post['desc'][$key];
					$ins2['description2'] = $post['desc2'][$key];
					$ins2['qty'] = $post['qty'][$key];
					$ins2['price'] = $post['price'][$key];
					$ins2['total_price'] = $post['total'][$key];
					$ins2['printed'] = '1';//$post['printed'][$key];
					$ins2['ready'] = $post['ready'][$key];
						$this->db->insert('order_details_table', $ins2);
				}
				
				
				
				if(!empty($kitchen)){
					
				//$this->db->truncate("aaa_print_table");	
				
					foreach( $kitchen as $key => $val ){
						
						
						$ins[$key]['printerName'] = $key; 
						
						$ins[$key]['htmlBody'] .= '<div class="text-center" style="font-size:40px;"><b>Masa: <span class="f50">'.$this->getTableName($post['table_id']).'</span></b></div>';
						$ins[$key]['htmlBody'] .= '<div class="text-center" style="font-size:26px;"><b>Tarih : '.date('d.m.Y H:i', time()).'</b></div>';
						$ins[$key]['htmlBody'] .= '<div class="text-center" style="font-size:26px;"><b>Garson  : '.$_SESSION['user_name'].'</b></div>';
						//$ins[$key]['htmlBody'] .= '<div class="text-left bb"><b>Müş. Say. :</b></div>';
						$ins[$key]['htmlBody'] .= '<div class="text-center"><b>'.$kitch['kitchen_name'].'</b></div>';
						$ins[$key]['htmlBody'] .= '<div style="padding-bottom:60px; border-bottom:1px solid #000;">';
						$ins[$key]['htmlBody'] .= '<div class="tr bb"><div class="w90"><b>Ürün</b></div><div class="w10 text-right"><b>Adet</b></div><div class="clr"></div></div>';
						foreach($val as $vv){$ins[$key]['htmlBody'] .= '<div class="tr f30 roww1"><div class="w90"><b>'.$vv['pro_name'].'</b></div><div class="w10 text-right"><b>'.$vv['qty'].'</b></div><div class="w33"></div><div class="clr"></div></div>';}
						$ins[$key]['htmlBody'] .= '<div class="clr"></div>';
						$ins[$key]['htmlBody'] .= '</div>';
						
					$pro[$key]['restaurant_name'] = $stngs['store_name'];
					$pro[$key]['printer_ip'] = 	$key;
					$pro[$key]['print_type'] = 	'kitchen';
					$pro[$key]['time'] = date('d.m.Y H:i', time());
					$pro[$key]['kitchen_name'] = $kitch['kitchen_name'];
					
					foreach($val as $kk => $vv){
						$pro[$key]['products'][$kk]['pro_name'] = $vv['pro_name'];
						$pro[$key]['products'][$kk]['qty'] = $vv['qty'];
					} 
						$ins[$key]['jsonArray'] =  json_encode($pro[$key], JSON_UNESCAPED_UNICODE);
						$ins[$key]['imgName'] = date('d-m-Y-His', time()).uniqid().'.png';
						$ins[$key]['insertTime'] = time();
							$this->db->insert('aaa_print_table',$ins[$key]);
						
					}
				}
				
		}
			$upd3['is_busy'] = '1';
			$upd3['activeOrderId'] = $order_id;
				$this->db->update('tables_table', $upd3, array('table_id' => $post['table_id']));
			
			
			
		
		if($post['isFree'] > 0){
			redirect($_SERVER['HTTP_REFERER']);
		}else{
			redirect(TABLES_PAGE);
		}
		
		
		//
		
	}
	
	public function cancel_print(){
		$post = $this->input->post();
		//debug($post);
		/* $stngs = $this->db->select('store_name, address')
			->where('id', '1')
			->get('settings_table')->row_array(); */
		
		$id = $post['id'];
		
		$product = $this->db->select('pro_id, pro_name, qty, price,order_id,id')
			->where('id', $id)
			->get('order_details_table')->row_array();
		
		$pro_id = $product['pro_id'];
		
		$report_log['user_id'] = $_SESSION['user_id'];
		$report_log['order_id'] = $product['order_id'];
		$report_log['process'] = $post['process'];
		$report_log['description'] = $post['description'];
		$report_log['first_price'] = ($product['price']*$product['qty']);
		$report_log['last_price'] = $post['last_price'];
		$report_log['pro_id'] = $pro_id;
		$report_log['qty'] = $product['qty'];
		$report_log['insert_time'] = time();
			$this->db->insert('user_log_report',$report_log);
		
		
		$kitch = $this->findKitchen($pro_id);
			if($kitch != 0){
				$kitchenId = $kitch['kitchen_ip'];
				$kitchen[$kitchenId]['pro_id'] = $product['pro_id'];
				$kitchen[$kitchenId]['pro_name'] = $product['pro_name'];
				$kitchen[$kitchenId]['qty'] = $product['qty'];
			}
			
		//debug($kitchen);	
		if(!empty($kitchen)){
				
			//$this->db->truncate("aaa_print_table");	
			
				foreach( $kitchen as $key => $val ){
					
					$ins[$key]['printerName'] = $key; 
					
					$ins[$key]['htmlBody'] .= '<div class="text-center" style="font-size:40px;"><b>Masa: <span class="f50">'.$this->getTableName($post['table_id']).'</span></b></div>';
					$ins[$key]['htmlBody'] .= '<div class="text-center" style="font-size:26px;"><b>Tarih : '.date('d.m.Y H:i', time()).'</b></div>';
					$ins[$key]['htmlBody'] .= '<div class="text-center" style="font-size:26px;"><b>Garson  : '.$_SESSION['user_name'].'</b></div>';
					//$ins[$key]['htmlBody'] .= '<div class="text-left bb"><b>Müş. Say. :</b></div>';
					$ins[$key]['htmlBody'] .= '<div class="text-center"><b>'.$kitch['kitchen_name'].'</b></div>';
					$ins[$key]['htmlBody'] .= '<div style="padding-bottom:60px; border-bottom:1px solid #000;">';
					$ins[$key]['htmlBody'] .= '<div class="tr bb"><div class="w90"><b>Ürün</b></div><div class="w10 text-right"><b>Adet</b></div><div class="clr"></div></div>';
					$ins[$key]['htmlBody'] .= '<div class="tr f30 roww1"><div class="w70"><b>'.$val['pro_name'].'</b></div><div class="w30 text-right"><b>'.$val['qty'].' İPTAL</b></div><div class="w33"></div><div class="clr"></div></div>';
					$ins[$key]['htmlBody'] .= '<div class="clr"></div>';
					$ins[$key]['htmlBody'] .= '</div>';
					
					$ins[$key]['imgName'] = date('d-m-Y-His', time()).uniqid().'.png';
					$ins[$key]['insertTime'] = time();
						$this->db->insert('aaa_print_table',$ins[$key]);
						
						
						if($this->db->affected_rows() > 0){
							echo 'success';
						}else{
							echo 'error';
						}
						
					
				}
			}
			
			
			
			
			
	}
	
	public function update_note(){
		$post = $this->input->post();
		//debug($post);
		$stngs = $this->db->select('store_name, address')
			->where('id', '1')
			->get('settings_table')->row_array();
		
		$id = $post['id'];
		
		$product = $this->db->select('pro_id, pro_name, qty')
			->where('id', $id)
			->get('order_details_table')->row_array();
		
		$pro_id = $product['pro_id'];
		
		$kitch = $this->findKitchen($pro_id);
			if($kitch != 0){
				$kitchenId = $kitch['kitchen_ip'];
				$kitchen[$kitchenId]['pro_id'] = $product['pro_id'];
				$kitchen[$kitchenId]['pro_name'] = $product['pro_name'];
				$kitchen[$kitchenId]['qty'] = $product['qty'];
				$kitchen[$kitchenId]['desc2'] = $post['desc2'];
			}
			
		//debug($kitchen);	
		if(!empty($kitchen)){
				
			//$this->db->truncate("aaa_print_table");	
			
				foreach( $kitchen as $key => $val ){
					
					$ins[$key]['printerName'] = $key; 
					
					$ins[$key]['htmlBody'] .= '<div class="text-center" style="font-size:40px;"><b><span class="f50">Güncelleme Fişi</span></b></div>';
					$ins[$key]['htmlBody'] .= '<div class="text-center" style="font-size:40px;"><b>Masa: <span class="f50">'.$this->getTableName($post['table_id']).'</span></b></div>';
					$ins[$key]['htmlBody'] .= '<div class="text-center" style="font-size:26px;"><b>Tarih : '.date('d.m.Y H:i', time()).'</b></div>';
					$ins[$key]['htmlBody'] .= '<div class="text-center" style="font-size:26px;"><b>Garson  : '.$_SESSION['user_name'].'</b></div>';
					//$ins[$key]['htmlBody'] .= '<div class="text-left bb"><b>Müş. Say. :</b></div>';
					$ins[$key]['htmlBody'] .= '<div class="text-center"><b>'.$kitch['kitchen_name'].'</b></div>';
					$ins[$key]['htmlBody'] .= '<div style="padding-bottom:60px; border-bottom:1px solid #000;">';
					$ins[$key]['htmlBody'] .= '<div class="tr bb"><div class="w90"><b>Ürün</b></div><div class="w10 text-right"><b>Adet</b></div><div class="clr"></div></div>';
					$ins[$key]['htmlBody'] .= '<div class="tr f30 roww1"><div class="w70"><b>'.$val['pro_name'].' - '.$val['desc2'].'</b></div><div class="w30 text-right"><b>'.$val['qty'].' </b></div><div class="w33"></div><div class="clr"></div></div>';
					$ins[$key]['htmlBody'] .= '<div class="clr"></div>';
					$ins[$key]['htmlBody'] .= '</div>';
					
					$ins[$key]['imgName'] = date('d-m-Y-His', time()).uniqid().'.png';
					$ins[$key]['insertTime'] = time();
						$this->db->insert('aaa_print_table',$ins[$key]);
						
						
						if($this->db->affected_rows() > 0){
							echo 'success';
						}else{
							echo 'error';
						}
						
				}
			}
			
	}
	
	public function findKitchen($pro_id){
		
		$cat = $this->db->select('*')
			->join("kitchen_cats_table", "menu_cat_product_table.cat_id = kitchen_cats_table.cat_id", "left")
			->where('menu_cat_product_table.pro_id', $pro_id)
			->get("menu_cat_product_table")->row_array();
		//debug($cat);
	
		$kitchen = $this->db->select('kitchen_ip,kitchen_name')
			->where('kitchen_id', $cat['kitchen_id'])
			->get('kitchens_table')->row_array();
		if(!empty($kitchen)){
			return $kitchen;
		}else{
			return 0;
		}
	}
	
	public function phone_order_post(){
		$post = $this->input->post();
		
		if(!empty($post['pro_id'])){
			
				$ins['customer_id'] = $post['customer_id'];
				$ins['payment_type'] = $post['payment_type'];
				$ins['orderType'] = '2';
				$ins['address_id'] = $post['address_id'];
				$ins['status'] = '1';
				$ins['total_price'] = array_sum($post['total']);
				$ins['rest_price'] = array_sum($post['total']);
				$ins['order_insert_time'] = time();
			
					$this->db->insert('orders_table', $ins);
					
				$order_id = $this->db->insert_id();
				
				
				$cust = $this->db->select('full_name, customer_id')
					->where('customer_id', $post['customer_id'])
					->get('customers_table')->row_array();
				
				/* $insx['user_id'] = $post['user_id'];
				$insx['table_id'] = $post['table_id'];
				$insx['order_id'] = $order_id;
				$insx['process_type'] = 'new_order';
				$insx['process_time'] = time();
				$insx['process_data'] = json_encode($post);
					$this->db->insert('user_logs_table', $insx); */
				
			
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
					
					if($post['printed'][$key] == '0'){
						$kitch[$key] = $this->findKitchen($post['pro_id'][$key]);
						if($kitch[$key] != 0){
							$kitchenId = $kitch[$key]['kitchen_ip'];
							$kitchen[$kitchenId][$key]['pro_id'] = $post['pro_id'][$key];
							$kitchen[$kitchenId][$key]['pro_name'] = $post['pro_name'][$key].' '.$post['desc2'][$key];
							$kitchen[$kitchenId][$key]['qty'] = $post['qty'][$key];
						}
						
					}
					
				}
				
				
				if(!empty($kitchen)){	
			//debug($kitchen);
					foreach( $kitchen as $key => $val ){
						
						$ins[$key]['printerName'] = $key; 
						
						$ins[$key]['htmlBody'] .= '<div class="text-center" style="font-size:40px;"><b><span class="f50">Paket Sipariş</span></b></div>';
						$ins[$key]['htmlBody'] .= '<div class="text-center" style="font-size:40px;"><b><span class="f50">'.$cust['full_name'].'</span></b></div>';
						$ins[$key]['htmlBody'] .= '<div class="text-center" style="font-size:26px;"><b>Tarih : '.date('d.m.Y H:i', time()).'</b></div>';
						$ins[$key]['htmlBody'] .= '<div class="text-center" style="font-size:26px;"><b>Garson  : '.$_SESSION['user_name'].'</b></div>';
						//$ins[$key]['htmlBody'] .= '<div class="text-left bb"><b>Müş. Say. :</b></div>';
						$ins[$key]['htmlBody'] .= '<div class="text-center"><b>'.$kitch['kitchen_name'].'</b></div>';
						$ins[$key]['htmlBody'] .= '<div style="padding-bottom:60px; border-bottom:1px solid #000;">';
						$ins[$key]['htmlBody'] .= '<div class="tr bb"><div class="w90"><b>Ürün</b></div><div class="w10 text-right"><b>Adet</b></div><div class="clr"></div></div>';
						foreach($val as $vv){$ins[$key]['htmlBody'] .= '<div class="tr f30 roww1"><div class="w90"><b>'.$vv['pro_name'].'</b></div><div class="w10 text-right"><b>'.$vv['qty'].'</b></div><div class="w33"></div><div class="clr"></div></div>';}
						$ins[$key]['htmlBody'] .= '<div class="clr"></div>';
						$ins[$key]['htmlBody'] .= '</div>';
						
					$pro[$key]['restaurant_name'] = $stngs['store_name'];
					$pro[$key]['printer_ip'] = 	$key;
					$pro[$key]['print_type'] = 	'kitchen';
					$pro[$key]['time'] = date('d.m.Y H:i', time());
					$pro[$key]['kitchen_name'] = $kitch['kitchen_name'];
					
					foreach($val as $kk => $vv){
						$pro[$key]['products'][$kk]['pro_name'] = $vv['pro_name'];
						$pro[$key]['products'][$kk]['qty'] = $vv['qty'];
					} 
						$ins[$key]['jsonArray'] =  json_encode($pro[$key], JSON_UNESCAPED_UNICODE);
						$ins[$key]['imgName'] = date('d-m-Y-His', time()).uniqid().'.png';
						$ins[$key]['insertTime'] = time();
							$this->db->insert('aaa_print_table',$ins[$key]);
						
					}
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
			
			if($post['payment_type'] == 'discount'){
				$upd['discount_price'] = ($order['discount_price'] + $post['amount']);
			}
			
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
	
	public function add_new_customer(){
		$post = $this->input->post();
		//debug($post);
		
		
			if(empty($post['customer_id'])){
				
				if($post['phone'] != ''){
					$check = $this->db->select('*')
						->where('phone', $post['phone'])
						->get('customers_table')->row_array();
				}
				
				if(empty($check)){
					
						$ins['full_name'] = $post['full_name'];
						$ins['seo_full_name'] = tr_seo_converter($post['full_name']);
						$ins['phone'] = $post['phone'];
						$ins['email'] = $post['email'];
						$ins['insert_time'] = time();
							$this->db->insert('customers_table', $ins);
						
						$customer_id = $this->db->insert_id();
						
						if($this->db->affected_rows() > 0){
							
							$ins2['address_name'] = "Adres 1";
							$ins2['address'] = $post['address'];
							$ins2['customer_id'] = $customer_id;
								$this->db->insert('customer_addresses_table', $ins2);
							
						}
					
					
				}else{
					$customer['status'] = 'phone_error';
					echo json_encode($customer); die();
				}
				
			}else{
				$customer_id = $post['customer_id'];
			}
				//$this->db->update('orders_table', array('customer_id' => $customer_id), array('order_id' => $order_id));
			
			if($this->db->affected_rows() > 0){
				$customer['status'] = 'success';
				$customer['cid'] = $customer_id;
				$customer['cname'] = $post['full_name'];
				$customer['ctel'] = $post['phone'];
				echo json_encode($customer);
			}else{
				$customer['status'] = 'success';
				echo json_encode($customer);
			}
	}
	
	public function reservation_post(){
		$post = $this->input->post();
		//debug($post);
		
		$ins['user_id'] = $post['custId'];
		$ins['reservation_date'] = $post['reservation_date'];
		$ins['date_int'] = strtotime($post['reservation_date']);
		$ins['reservation_hour'] = $post['hour'];
		$ins['total_person'] = $post['person'];
		$ins['note'] = $post['note'];
		$ins['record'] = "TELEFON";
		$ins['insert_time'] = time();
			$this->db->insert('reservations_table', $ins);
		
		redirect( RESERVATION );
		
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
						
						$ins['email'] = $post['email'];
						$ins['insert_time'] = time();
							$this->db->insert('customers_table', $ins);
							$customer_id = $this->db->insert_id();
						if($this->db->affected_rows() > 0){
							
							$ins2['address_name'] = "Adres 1";
							$ins2['address'] = $post['address'];
							$ins2['customer_id'] = $customer_id;
								$this->db->insert('customer_addresses_table', $ins2);
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
	
	public function add_customer_to_phone_order(){
		$post = $this->input->post();
		//debug($post);
				if($post['phone'] != ''){
					$check = $this->db->select('*')
						->where('phone', $post['phone'])
						->get('customers_table')->row_array();
				}
				
				if(empty($check)){
					
						$ins['full_name'] = $post['full_name'];
						$ins['seo_full_name'] = tr_seo_converter($post['full_name']);
						$ins['phone'] = $post['phone'];
						$ins['address'] = $post['address'];
						$ins['email'] = $post['email'];
						$ins['insert_time'] = time();
							$this->db->insert('customers_table', $ins);
							$customer_id = $this->db->insert_id();
						if($this->db->affected_rows() > 0){
							$ins2['address_name'] = "Adres 1";
							$ins2['address'] = $post['address'];
							$ins2['customer_id'] = $customer_id;
								$this->db->insert('customer_addresses_table', $ins2);
							$address_id = $this->db->insert_id();
						}
					
					
				}else{
					$customer['msg'] = 'phone_error';
				}
				
			if($this->db->affected_rows() > 0){
				$customer['msg'] = 'success';
				$customer['customer_id'] = $customer_id;
				$customer['address_id'] = $address_id;
				
			}else{
				$customer['msg'] = 'same_customer';
			}
		
		
		echo json_encode($customer); die();
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
			
			foreach($data['results'] as $key => $val){
				$data['results'][$key]['addresses'] = $this->db->select('address_name, id, address')
					->where('customer_id', $val['customer_id'])
					->get('customer_addresses_table')->result_array();
				$data['results'][$key]['addresses'] = json_encode($data['results'][$key]['addresses']);
			}
			
			
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
			
			$upd1['ready'] = '2';
				//$this->db->update('orders_table', $upd1, array('order_id' => $order_id));
				$this->db->update('order_details_table', $upd1, array('order_id' => $order_id));
			
			$upd['is_busy'] = '0';
			$upd['activeOrderId'] = '0';
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
	
	public function kitchen2(){
		
		$SES = $this->session->all_userdata();
		
		//debug($SES);
		
		$data['orders'] = $this->db->select('*')
			->join('tables_table', 'orders_table.table_id = tables_table.table_id', 'left')
			->where('ready', '0')
			->get('orders_table')->result_array();
		
		
		
		foreach($data['orders'] as $key => $val){
			$data['orders'][$key]['order_details'] = $this->db->select('*')
				->where('order_id', $val['order_id'])
				->where('ready', '1')
				->get('order_details_table')->result_array();
		}
		
		$this->load->view('kitchen_view2', $data);
		
		
	}
	
	// mutfak işlemleri -----------------------------------------------------------------
	public function kitchen_list(){
		$data['kitchens'] = $this->db->select('*')
			->get('kitchens_table')->result_array();
		
		$data['mm'] = '14';
		$data['mt'] = '14';
		$data['mt2'] = '14_23';
		
		$this->load->view('kitchen_list_view', $data);
	}
	
	
	public function add_kitchen_post(){
		$post = $this->input->post();
		//debug($post);
		$check = $this->db->select('*')
			->where('kitchen_name', $post['kitchen_name'])
			->get('kitchens_table')->row_array();
		
		if(empty($check)){
			$ins['kitchen_name'] = $post['kitchen_name'];
				$this->db->insert('kitchens_table', $ins);
			$kid = $this->db->insert_id();
			
			if($this->db->affected_rows() > 0){
				$response['msg'] = 'success';
				$response['kitchen_name'] = $post['kitchen_name'];
				$response['kitchen_id'] = $kid;
					
			}else{
				$response['msg'] = 'error';
			}
			
		}else{
			$response['msg'] = 'same_name_error';
		}
		
		echo json_encode($response);
		
	}
	
	public function update_kitchen_post(){
		$post = $this->input->post();
		//debug($post);
		
		$whr['kitchen_id'] = $post['kitchen_id'];
		$upd['kitchen_name'] = $post['kitchen_name'];
		$upd['kitchen_ip'] = $post['kitchen_ip'];
			$this->db->update('kitchens_table', $upd, $whr);
		
		if($this->db->affected_rows() > 0){
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	
	public function delete_kitchen($kid){
		
		$check = $this->db->select('*')
			->where('kitchen_id', $kid)
			->get('kitchen_cats_table')->num_rows();
		
		if($check > 0){
			echo 'exists';
		}else{
				$whr['kitchen_id'] = $kid;
				$this->db->delete('kitchens_table', $whr);
				
				if($this->db->affected_rows() > 0){
				echo 'success';
			}
		}
	}
	
	// mutfak işlemleri -----------------------------------------------------------------
	
	public function kitchen(){
		
		$SES = $this->session->all_userdata();
		
		//debug($SES);
		
		$data['kitchens'] = $this->db->select('*')
			->get('kitchens_table')->result_array();
		
		/* $data['orders'] = $this->db->select('*')
			->join('tables_table', 'orders_table.table_id = tables_table.table_id', 'left')
			->where('ready', '0')
			->get('orders_table')->result_array();
		
		
		
		foreach($data['orders'] as $key => $val){
			$data['orders'][$key]['order_details'] = $this->db->select('*')
				->where('order_id', $val['order_id'])
				->where('ready', '0')
				->get('order_details_table')->result_array();
		} */
		
		$this->load->view('kitchen_select_view', $data);
		//$this->load->view('kitchen_view', $data);
		
		
	}
	
	public function kitchen_detail($kid){
		
		$data['kitchen_id'] = $kid;
		
		$data['kitchen'] = $this->db->select('*')
			->where('kitchen_id', $kid)
			->get('kitchens_table')->row_array();
		
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
			
			$check = $this->db->select('order_id, order_details_table.id,menu_cat_product_table.cat_id, kitchen_id, order_details_table.pro_id')
			->join('menu_cat_product_table','order_details_table.pro_id = menu_cat_product_table.pro_id', 'left')
			->join('kitchen_cats_table','menu_cat_product_table.cat_id = kitchen_cats_table.cat_id', 'left')
			->where('ready', '0')
			->where('kitchen_cats_table.kitchen_id', $post['kitchen_id'])
			->where('description !=', 'İptal')
			->where('order_id', $post['order_id'])
			->get('order_details_table')->result_array();
		//debug($check);
		
			$check2 = $this->db->select('order_id, order_details_table.id, menu_cat_product_table.cat_id, kitchen_id')
				->join('menu_cat_product_table','order_details_table.pro_id = menu_cat_product_table.pro_id', 'left')
				->join('kitchen_cats_table','menu_cat_product_table.cat_id = kitchen_cats_table.cat_id', 'left')
				->where('ready', '0')
				->where('kitchen_cats_table.kitchen_id', $post['kitchen_id'])
				->where('description', 'İptal')
				->where('order_id', $post['order_id'])
				->get('order_details_table')->result_array();
		
			if(empty($check)){ //
			//die("111");
				//$this->db->update('order_details_table', array('ready' => '1'), array('order_id' => $post['order_id']));
			
				if(!empty($check2)){
					//debug($check2);
					foreach($check2 as $key => $val){
						$this->db->update('order_details_table', array('ready' => '1'), array('id' => $val['id']));
					}
				}
			
			}else{
				//die("222");
			} 
			
			
			
			echo 'success';
		}else{
			echo 'error';
		}
	}
	
	public function complete_2(){
		$post = $this->input->post();
		//debug($post);
		if(!empty($post['id'])){
			$this->db->update('order_details_table', array('ready' => '2'), array('id' => $post['id']));
		}
		
		if($this->db->affected_rows() > 0){
			
			$check = $this->db->select('order_id, id')
			->where('ready = 1 OR ready = 0')
			->where('order_id', $post['order_id'])
			->get('order_details_table')->result_array();
		
			/* if(empty($check)){
				$this->db->update('orders_table', array('ready' => '1'), array('order_id' => $post['order_id']));
			} */
			
			echo 'success';
		}else{
			echo 'error';
		}
	}
	
	public function complete_all(){
		$post = $this->input->post();
		
		/* $orders = $this->db->select('pro_id')
			->where('order_id', $post['order_id'])
			->get('order_details_table')->result_array();
		
		foreach($orders as $key => $val){
			
		} */
		
		//debug($post);
		if(!empty($post['order_id'])){
			//$this->db->update('orders_table', array('ready' => '0'), array('order_id' => $post['order_id']));
			$this->db->update('order_details_table', array('ready' => '1'), array('order_id' => $post['order_id']));
		}
		
		if($this->db->affected_rows() > 0){
			echo 'success';
		}else{
			echo 'error';
		}
	} 
	
	public function complete_all2(){
		$post = $this->input->post();
		//debug($post);
		if(!empty($post['order_id'])){
			//$this->db->update('orders_table', array('ready' => '1'), array('order_id' => $post['order_id']));
			$this->db->update('order_details_table', array('ready' => '2'), array('order_id' => $post['order_id'], 'ready' => '1'));
		}
		
		if($this->db->affected_rows() > 0){
			echo 'success';
		}else{
			echo 'error';
		}
	}
	
	public function reload_orders($kid){
		
		$data['kitchen'] = $this->db->select('kitchen_time')
			->where('id', '1')
			->get('settings_table')->row_array();
		
		$data['orders'] = $this->db->select('*')
			->join('tables_table', 'orders_table.table_id = tables_table.table_id', 'left')
			->join('customers_table', 'orders_table.customer_id = customers_table.customer_id', 'left')
			//->where('ready', '0')
			->get('orders_table')->result_array();
		
		$data['lastOrder'] = $this->db->select('order_id')
			->order_by('order_id', 'DESC')
			->limit(1)
			->get('orders_table')->row_array(); 
		
		/* if($data['kitchen']['kitchen_time'] > 0){
			foreach($data['orders'] as $key => $val){
				$close_time = time() - ( $data['kitchen']['kitchen_time'] );
				//debug($close_time); //1524384553 <= 1524168981
				if($val['order_insert_time'] <= $close_time ){
					$this->db->update('orders_table', array('ready' => '2'), array('order_id' => $val['order_id']));
					$this->db->update('order_details_table', array('ready' => '2'), array('order_id' => $val['order_id']));
				}
			}
		} */
		
		foreach($data['orders'] as $key => $val){
			
			$data['orders'][$key]['order_details'] = $this->db->select('order_details_table.order_id,menu_cat_product_table.cat_id, order_details_table.id, order_details_table.pro_name,order_details_table.description,order_details_table.description2, order_details_table.qty, order_details_table.ready')
				->join('menu_cat_product_table','order_details_table.pro_id = menu_cat_product_table.pro_id', 'left')
				->where('order_details_table.order_id', $val['order_id'])
				->where('order_details_table.ready', '0')
				//->where('order_details_table.total_price > ', '0')
				->order_by('order_details_table.id', 'ASC')
				->get('order_details_table')->result_array();
			
			foreach( $data['orders'][$key]['order_details'] as $kk => $vv ){
				if( $this->check_kitchen_cat($kid, $vv['cat_id']) == '0' ){
					unset($data['orders'][$key]['order_details'][$kk]);
				}
			}

			if(empty($data['orders'][$key]['order_details'])){
				unset($data['orders'][$key]);
			}

		}
		
		//debug($data);
		$data['kitchen_id'] =  $kid;
		$this->load->view('kitchen_orders_view', $data);
	}
	
	public function check_kitchen_cat($kid, $cat_id){
		$check = $this->db->select('*')
			->where('kitchen_id', $kid)
			->where('cat_id', $cat_id)
			->get('kitchen_cats_table')->num_rows();
		
		if($check > 0){
			return '1';
		}else{
			return '0';
		}
	}
	
	public function reload_orders2(){
		
		$data['kitchen'] = $this->db->select('kitchen_time')
			->where('id', '1')
			->get('settings_table')->row_array();
		
		$data['orders'] = $this->db->select('*')
			->join('tables_table', 'orders_table.table_id = tables_table.table_id', 'left')
			->where('ready', '0')
			->get('orders_table')->result_array();
		//debug($data['orders']);
		$data['lastOrder'] = $this->db->select('order_id')
			->order_by('order_id', 'DESC')
			->limit(1)
			->get('orders_table')->row_array();
		
		/* if($data['kitchen']['kitchen_time'] > 0){
			foreach($data['orders'] as $key => $val){
				$close_time = time() - ( $data['kitchen']['kitchen_time'] );
				//debug($close_time); //1524384553 <= 1524168981
				if($val['order_insert_time'] <= $close_time ){
					$this->db->update('orders_table', array('ready' => '1'), array('order_id' => $val['order_id']));
					$this->db->update('order_details_table', array('ready' => '1'), array('order_id' => $val['order_id']));
				}
			}
		} */
		
		foreach($data['orders'] as $key => $val){ 
			$data['orders'][$key]['order_details'] = $this->db->select('*')
				->where('order_id', $val['order_id'])
				->where('ready', '1')
				->where('description != ', 'İptal')
				->order_by('id', 'ASC')
				->get('order_details_table')->result_array();
			if(empty($data['orders'][$key]['order_details'])){
				unset($data['orders'][$key]);
			}
		}
		
		//debug($data);
		
		$this->load->view('kitchen_orders_view2', $data);
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
		
		$data['mm'] = '14';
		$data['mt'] = '14';
		$data['mt2'] = '14_11';
		
		$this->load->view('products_view', $data);
		
		
	}
	
	public function products2(){
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
		
		$data['mm'] = '22';
		$data['mt2'] = '22_1';
		
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
		
		$data['mm'] = '14';
		$data['mt2'] = '14_11';
		//debug($data['products']);
		$this->load->view('cat_products_view',$data);
		
	}
	
	public function product_image_list(){
			
		$data['products'] = $this->db->select('pro_id, pro_name, pro_img')
				->order_by('products_table2.pro_id', 'ASC')
				->get('products_table2')->result_array();
		
		
		$data['mm'] = '14';
		$data['mt'] = '14';
		$data['mt2'] = '14_11_1';
		//debug($data['products']);
		$this->load->view('product_image_list_view',$data);
		
	}
	
	public function update_pro_img($pro_id){
			
		$data['pro'] = $this->db->select('pro_id, pro_img,pro_name')
			->where('pro_id', $pro_id)
				->get('products_table2')->row_array();
		
		
		$data['mm'] = '14';
		$data['mt2'] = '14_11_1';
		//debug($data['products']);
		$this->load->view('update_pro_img_view', $data);
		
	}
	
	public function update_pro_img_post(){
			
		//debug($_FILES);
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
							$this->resize_function($from_file, $to_file, 300, 200);
						}
						
						
						
					
				
				
				if(!empty($img_name)){
					$whr['pro_id'] = $post['pro_id'];
					$upd['pro_img'] = $img_name;
						$this->db->update('products_table2', $upd, $whr);
					
					if($this->db->affected_rows() > 0){
						redirect( $_SERVER['HTTP_REFERER'] );
					}
					
				}
				
				
			}
		}
		
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
	
	public function del_option_product($id){
		if($id > 0){
			$this->db->delete('products_options_table', array('option_id' => $id));
			
			if($this->db->affected_rows() > 0){
				echo 'success'; 
				die();
			}else{
				echo 'error'; die();
			}
		}
	}
	
	public function del_option_group($id){
		if($id > 0){
			$this->db->delete('products_and_option_groups_table', array('id' => $id));
			
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
		
		if(!empty($post['optionGroups'])){
			foreach( $post['optionGroups'] as $key => $val ){
				$ins12['og_name'] = $val;
				$ins12['og_insert_time'] = time();
					$this->db->insert('products_option_groups_table', $ins12);
				$og_id = $this->db->insert_id();
				if($og_id > 0){
					$this->db->insert('products_and_option_groups_table', array('pro_id' => $pro_id, 'og_id' => $og_id));
				}
				
			}
		} 

		if(!empty($post['optPro'])){
			foreach($post['optPro'] as $key => $val){
				if(!empty($val['pro_id'])){
					foreach( $val['pro_id'] as $kk => $vv ){
						$check[$kk] = $this->db->select('*')
							->where('og_id', $key)
							->where('pro_id', $vv)
							->get('products_options_table')->row_array();
						if(empty($check[$kk])){
							$this->db->insert('products_options_table', array('og_id' => $key, 'pro_id' => $vv));
						}
					}
				}
			}
			
			$this->db->update('products_table2', array('proType' => '1'), array('pro_id' => $pro_id));
		}else{
			$this->db->update('products_table2', array('proType' => '0'), array('pro_id' => $pro_id));
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
		
		$check = $this->db->select('cat_name')
			->where('cat_name', $catName)
			->get('cats_table2')->num_rows();
		
		if($check > 0){
			echo 'exists';
			die();
		}
		
		
			$this->db->insert('cats_table2', array( 'cat_name' => $catName ));
		if( $this->db->affected_rows() > 0 ){
			//$this->session->set_flashdata('success', 'İŞLEM BAŞARILI!');
			//redirect( $_SERVER['HTTP_REFERER'] ); 
			echo 'success';
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
		/* foreach($data['customers'] as $key => $val){
			$data['customers'][$key]['debts'] = $this->db->select('*')
				->where('customer_id', $val['customer_id'])
				->where('payment_type', 'openPay')
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
		} */
		
		$data['mm'] = '161';	
		$data['mt'] = '161_1';	
		
		
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
				->where('payment_type', 'openPay')
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
		
			
		$data['mm'] = '161';	
		$data['mt'] = '161_2';	
		
		
		//debug($data);
		$this->load->view('customers_debt_view', $data);
		
	}
	
	public function customer_details($customer_id){
		$data['customer'] = $this->db->select('*')
			->where('customer_id', $customer_id)
			->get('customers_table')->row_array();
		
		$data['cities'] = $this->db->select('*')
			->get('city')->result_array();
		
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
		
		$data['debts'] = $this->db->select('*')
			->where('customer_id', $customer_id)
			->where('payment_type', 'openPay')
			->get('order_payments_table')->result_array();
		
		//debug($data['debts']);
		
		$data['payments'] = $this->db->select('*')
			->where('customer_id', $customer_id)
			->where('payment_type', 'payment')
			->get('order_payments_table')->result_array();
		
		//debug($data['payments']);
		
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
		
		$data['resList'] = $this->db->select('*')
			->where('user_id', $customer_id)
			->get('reservations_table')->result_array();
		
		foreach($data['resList'] as $key => $val){
			$data['resList'][$key]['payment_time'] = $val['insert_time'];
			$data['resList'][$key]['payment_type'] = 'res';
		}
		
		$data['merged'] = array_merge($data['resList'],$data['merged']);
		
		$date = array();
		foreach ($data['merged'] as $key => $row)
		{
			$date[$key] = $row['payment_time'];
		}
		array_multisort($date, SORT_DESC, $data['merged']);
		
		//debug($data['merged']);
		
		$data['addresses'] = $this->db->select('*')
			->join("city", "customer_addresses_table.city_id = city.CityID", "left")
			->join("town", "customer_addresses_table.town_id = town.TownID", "left")
			->join("district", "customer_addresses_table.district_id = district.DistrictID", "left")
			->where('customer_id', $customer_id)
			->get('customer_addresses_table')->result_array();
		//debug($data['addresses']);
		$this->load->view('customer_details_view', $data);
		
	}
	
	public function add_address_post(){
		$post = $this->input->post();
		//debug($post);
		
		if( ( $post['customer_id'] > 0 ) AND ( $post['city_id'] > 0 ) AND ( $post['town_id'] > 0 ) AND ( $post['district_id'] > 0 ) AND ( $post['address_name'] != "" ) AND ( $post['address'] != "" )){
			
			$whr['id'] = $post['id'];
			
			$ins['city_id'] = $post['city_id'];
			$ins['customer_id'] = $post['customer_id'];
			$ins['town_id'] = $post['town_id'];
			$ins['district_id'] = $post['district_id'];
			$ins['address_name'] = $post['address_name'];
			$ins['address'] = $post['address'];
				
			if( $post['id'] > 0 ){
				$this->db->update('customer_addresses_table', $ins, $whr);
			}else{
				$this->db->insert('customer_addresses_table', $ins);
			}
			
			if($this->db->affected_rows() > 0){
				echo 'success'; die();
			}else{
				echo 'error';
			}
		
		}else{
			echo 'empty';
		}
	}
	
	public function get_towns($city_id){
		$data['towns'] = $this->db->select('*')
			->where('CityID', $city_id)
			->get('town')->result_array();
		
		echo json_encode($data['towns']);
		
	}
	
	public function get_district($town_id){
		$data['dist'] = $this->db->select('*')
			->where('TownID', $town_id)
			->get('district')->result_array();
		
		echo json_encode($data['dist']);
		
	}
	
	public function delete_address($id){
		$post = $this->input->post();
		//debug($post);
		$whr['id'] = $id;
		
			$this->db->delete('customer_addresses_table', $whr);
		
		if($this->db->affected_rows() > 0){
			echo 'success'; die();
		}else{
			echo 'error';
		}
		
	}
	
	public function customer_update_post(){
		$post = $this->input->post();
		
		$whr['customer_id'] = $post['customer_id'];
		
		$upd['full_name'] = $post['full_name'];
		$upd['email'] = $post['email'];
		$upd['phone'] = $post['phone'];
			$this->db->update('customers_table', $upd, $whr);
		
		if($this->db->affected_rows() > 0){
			echo 'success';
		}else{
			echo 'error';
		}
		
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
		
		$data['optionGroups'] = $this->db->select('*') 
			->join('products_option_groups_table', 'products_and_option_groups_table.og_id = products_option_groups_table.og_id', 'left')
			->where('products_and_option_groups_table.pro_id', $pro_id)
			->get('products_and_option_groups_table')->result_array();
		foreach($data['optionGroups'] as $key => $val){
			$data['optionGroups'][$key]['options'] = $this->db->select('products_table2.pro_id, pro_name, option_id')
				->join('products_table2', 'products_options_table.pro_id = products_table2.pro_id', 'left')
				->where('products_options_table.og_id', $val['id'])
				->get('products_options_table')->result_array();
		}
		
		//debug($data['optionGroups']);
		
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
	
	public function get_pro2($pro_id){
		
		$data['pro'] = $this->db->select('pro_id, pro_img, pro_name') 
			->where('pro_id', $pro_id)
			->get('products_table2')->row_array();
		
		
	//debug($data);
			
		$this->load->view('update_product_view2',$data);
	}
	
	public function delImg(){
		$post = $this->input->post();
		
		//debug($post);

		if(!empty($post['img_name'])){
			$this->db->update('products_table2', array('pro_img' => ''), array('pro_img' => $post['img_name']));
			if(file_exists( DOC_ROOT.'img/products/'.$post['img_name'] )){
				
				$del = unlink(DOC_ROOT.'img/products/'.$post['img_name']);
				if($del != FALSE){
					
					
					
					echo 'success';
				}else{
					echo 'error';
				}
			}
			
		}
		
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
	
	public function stock_entry(){

		$data['depos'] = $this->db->select('*')
			->get('depos_table')->result_array();

		$data['cats'] = $this->db->select('*')
			->get('cats_table2')->result_array();
			
		$data['mm'] = '2';
		$data['mt'] = '5';
		$data['mt2'] = '2_1';
		
		$this->load->view('stock_entry_view', $data);
	}
	
	public function stock_entry_list(){
		$data['list'] = $this->db->select('*')
			->join('depos_table', 'purchase_table.depo_id = depos_table.depo_id')
			->order_by('purchase_insert_time', 'DESC')
			->where('total_price ','0.00')
			->get('purchase_table')->result_array();
		$data['mm'] = '2';
		$data['mt'] = '5';
		$data['mt2'] = '2_1';
		$data['title'] = 'Stok Giriş Listesi';
		$this->load->view('stock_entry_list_view', $data);
		
	}
	
	public function stock_entry_detail($purchase_id){
		
		$data['record'] = $this->db->select('*')
			->join('depos_table', 'purchase_table.depo_id = depos_table.depo_id')
			->where('purchase_id', $purchase_id)
			->get('purchase_table')->row_array();
		
		$data['products'] = $this->db->select('*')
			->join('products_table2', 'purchase_details_table.pro_id = products_table2.pro_id', 'left')
			->where('purchase_id', $purchase_id)
			->get('purchase_details_table')->result_array();
		$data['mm'] = '2';
		$data['mt'] = '5';
		$data['mt2'] = '2_1';
		$this->load->view('stock_entry_detail_view', $data);
		
	}
	
	public function stock_entry_post(){
		
		$post = $this->input->post();
		//debug($post);
		$ins['depo_id'] = $post['depo_id'];
		$ins['date1'] = $post['date1'];
		$ins['description'] = $post['description'];
		$ins['purchase_insert_time'] = time();	
			$this->db->insert('purchase_table', $ins);		
		$purchase_id = $this->db->insert_id();
		if($this->db->affected_rows() > 0){
			
			foreach($post['pro_id'] as $key => $val){
				$ins[$key]['depo_id'] = $post['depo_id'];
				$ins[$key]['pro_id'] = $val;
				$ins[$key]['purchase_id'] = $purchase_id;
				
				if($post['unit'][$key] == 'cl'){
					$post['unit'][$key] = 'lt';
					$post['qty'][$key] = ($post['qty'][$key] / 100);
				}
				
				if($post['unit'][$key] == 'gr'){
					$post['unit'][$key] = 'kg';
					$post['qty'][$key] = ($post['qty'][$key] / 1000);
				}
				
				$ins[$key]['unit'] = $post['unit'][$key];
				$ins[$key]['qty'] = $post['qty'][$key];
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
			
			echo 'success';
		}
	}
	
	public function stock_entry_update($purchase_id){
		$data['purchase'] = $this->db->select('*')
			->where('purchase_id', $purchase_id)
			->get('purchase_table')->row_array();
		$data['depos'] = $this->db->select('*')
			->get('depos_table')->result_array();
		$data['list'] = $this->db->select('*')
			->join('products_table2', 'purchase_details_table.pro_id = products_table2.pro_id', 'left')
			->where('purchase_id', $purchase_id)
			->get('purchase_details_table')->result_array();
		$data['mm'] = '2';
		$data['mt'] = '5';
		$data['mt2'] = '2_1';
		$this->load->view("stock_entry_update_view", $data);
		
		
	}
	
	public function stock_entry_update_post(){
		
		$post = $this->input->post();
		//debug($post);
		$ins['depo_id'] = $post['depo_id'];
		$ins['date1'] = $post['date1'];
		$ins['description'] = $post['description'];
		$ins['purchase_insert_time'] = time();	
		
		$purchase_id = $post['purchase_id'];
		
			$this->db->update('purchase_table', $ins, array('purchase_id' => $purchase_id));		
		
		
		
		
		if($purchase_id > 0){
			
			$this->db->delete('purchase_details_table', array('purchase_id' => $purchase_id));
			
			foreach($post['pro_id'] as $key => $val){
				$ins[$key]['depo_id'] = $post['depo_id'];
				$ins[$key]['pro_id'] = $val;
				$ins[$key]['purchase_id'] = $purchase_id;
				
				if($post['unit'][$key] == 'cl'){
					$post['unit'][$key] = 'lt';
					$post['qty'][$key] = ($post['qty'][$key] / 100);
				}
				
				if($post['unit'][$key] == 'gr'){
					$post['unit'][$key] = 'kg';
					$post['qty'][$key] = ($post['qty'][$key] / 1000);
				}
				
				$ins[$key]['unit'] = $post['unit'][$key];
				$ins[$key]['qty'] = $post['qty'][$key];
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
			
			echo 'success';
		}
	}
	
	public function stock_delete($purchase_id){
		
		if($purchase_id > 0){
			
			$this->db->delete('purchase_details_table', array('purchase_id' => $purchase_id));
			$this->db->delete('purchase_table', array('purchase_id' => $purchase_id));
		}
		
		if( $this->db->affected_rows() > 0 ){
			echo 'success';
		}else{
			echo 'error';
		}
	}
	
	public function stock_count_entry(){

		$data['depos'] = $this->db->select('*')
			->get('depos_table')->result_array();

		$data['cats'] = $this->db->select('*')
			->get('cats_table2')->result_array();
			
		$data['mm'] = '2';
		$data['mt'] = '5_1';
		$data['mt2'] = '2_1';
		
		$this->load->view('stock_count_entry_view', $data);
	}
	
	public function stock_count_entry_list(){
		$data['list'] = $this->db->select('*')
			->join('depos_table', 'stock_records_table.depo_id = depos_table.depo_id')
			->order_by('stock_insert_time', 'DESC')
			->get('stock_records_table')->result_array();
		$data['mm'] = '2';
		$data['mt'] = '5_1';
		$data['mt2'] = '2_1';
		$data['title'] = 'Stok Sayım Listesi';
		$this->load->view('stock_count_entry_list_view', $data);
		
	}
	
	public function stock_count_entry_detail($record_id){
		
		$data['record'] = $this->db->select('*')
			->join('depos_table', 'stock_records_table.depo_id = depos_table.depo_id')
			->where('record_id', $record_id)
			->get('stock_records_table')->row_array();
		
		$data['products'] = $this->db->select('*')
			->join('products_table2', 'stock_details_table.pro_id = products_table2.pro_id', 'left')
			->where('record_id', $record_id)
			->get('stock_details_table')->result_array();
		$data['mm'] = '2';
		$data['mt'] = '5_1';
		$this->load->view('stock_count_entry_detail_view', $data);
		
	}
	
	public function stock_count_entry_post(){
		
		$post = $this->input->post();
		//debug($post);
		
		$ins['depo_id'] = $post['depo_id'];
		$ins['date1'] = $post['date1'];
		$ins['description'] = $post['description'];
		$ins['stock_insert_time'] = time();	
			$this->db->insert('stock_records_table', $ins);		
		$record_id = $this->db->insert_id();
		if($this->db->affected_rows() > 0){
			
			foreach($post['pro_id'] as $key => $val){
				$ins[$key]['depo_id'] = $post['depo_id'];
				$ins[$key]['pro_id'] = $val;
				$ins[$key]['record_id'] = $record_id;
				
				if($post['unit'][$key] == 'cl'){
					$post['unit'][$key] = 'lt';
					$post['qty'][$key] = ($post['qty'][$key] / 100);
				}
				
				if($post['unit'][$key] == 'gr'){
					$post['unit'][$key] = 'kg';
					$post['qty'][$key] = ($post['qty'][$key] / 1000);
				}
				
				$ins[$key]['unit'] = $post['unit'][$key];
				$ins[$key]['qty'] = $post['qty'][$key];
				$ins[$key]['row_insert_time'] = time();
					$this->db->insert('stock_details_table', $ins[$key]);
				
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
			
			
			echo 'success';	
		}
	}
	
	public function stock_count_entry_update($record_id){
		$data['purchase'] = $this->db->select('*')
			->where('record_id', $record_id)
			->get('stock_records_table')->row_array();
		$data['depos'] = $this->db->select('*')
			->get('depos_table')->result_array();
		$data['list'] = $this->db->select('*')
			->join('products_table2', 'stock_details_table.pro_id = products_table2.pro_id', 'left')
			->where('record_id', $record_id)
			->get('stock_details_table')->result_array();
		$data['mm'] = '2';
		$data['mt'] = '5_1';
		$this->load->view("stock_count_entry_update_view", $data);
		
	}
	
	public function stock_count_entry_update_post(){
		
		$post = $this->input->post();
		//debug($post);
		$ins['depo_id'] = $post['depo_id'];
		$ins['date1'] = $post['date1'];
		$ins['description'] = $post['description'];
		$ins['stock_insert_time'] = time();	
		
		$record_id = $post['record_id'];
		
			$this->db->update('stock_records_table', $ins, array('record_id' => $record_id));		
		
		
		
		
		if($record_id > 0){
			
			$this->db->delete('stock_details_table', array('record_id' => $record_id));
			
			foreach($post['pro_id'] as $key => $val){
				$ins[$key]['depo_id'] = $post['depo_id'];
				$ins[$key]['pro_id'] = $val;
				$ins[$key]['record_id'] = $record_id;
				
				if($post['unit'][$key] == 'cl'){
					$post['unit'][$key] = 'lt';
					$post['qty'][$key] = ($post['qty'][$key] / 100);
				}
				
				if($post['unit'][$key] == 'gr'){
					$post['unit'][$key] = 'kg';
					$post['qty'][$key] = ($post['qty'][$key] / 1000);
				}
				
				$ins[$key]['unit'] = $post['unit'][$key];
				$ins[$key]['qty'] = $post['qty'][$key];
				$ins[$key]['row_insert_time'] = time();
					$this->db->insert('stock_details_table', $ins[$key]);
				
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
			
			echo 'success';
		}
	}
	
	public function stock_count_delete($record_id){
		
		if($record_id > 0){
			$this->db->delete('stock_records_table', array('record_id' => $record_id));
			$this->db->delete('stock_details_table', array('record_id' => $record_id));
		}
		
		if( $this->db->affected_rows() > 0 ){
			echo 'success';
		}else{
			echo 'error';
		}
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
	
	public function delete_company(){
		$post = $this->input->post();
		//debug($post);
		
		$company_id = $post['company_id'];
		
		$check = $this->db->select('*')
			->where('company_id', $company_id)
			->get('purchase_table')->num_rows();
		
		if($check > 0){
			echo 'record'; die();
		}else{
			$this->db->delete('companies_table', array('company_id' => $company_id));
			
			if($this->db->affected_rows() > 0){
				echo 'success';
			}else{
				echo 'error';
			}
		}
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
			/* $response['msg'] = 'success';
			$response['company_name'] = $post['company_name'];
			$response['company_id'] = $compId; */
			
			//redirect($_SERVER['HTTP_REFERER']);
			echo 'success';
			
		}else{
			echo 'error';
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
		
		$data['mt'] = '6';
		
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
	
	public function all_stock_details(){
		
		$data['details'] = $this->db->select('pro_name, pro_id')
			->get('products_table2')->result_array();
		//debug($data['details']);
		
		
		foreach($data['details'] as $key => $val){
			$data['details'][$key]['stocks'] = $this->db->select('purchase_details_table.depo_id, qty, unit, depo_name')
				->join('depos_table', 'purchase_details_table.depo_id = depos_table.depo_id', 'left')
				->where('pro_id', $val['pro_id'])
				->get('purchase_details_table')->result_array();
			
			foreach( $data['details'][$key]['stocks'] as $kk => $vv ){
				$data['details'][$key]['depos'][$kk] = $vv['depo_name'];
			}
			
			$data['details'][$key]['depos'] = array_unique($data['details'][$key]['depos']);
			
			foreach($data['details'][$key]['stocks'] as $kk => $vv){
				$data['details'][$key]['stock']['qty'] += $vv['qty'];
			}
			$data['details'][$key]['stock']['unit'] = $data['details'][$key]['stocks'][0]['unit'];
		}
		
		foreach($data['details'] as $key => $val){
			$data['details'][$key]['sales'] = $this->db->select_sum('qty')
				->where('pro_id', $val['pro_id'])
				->get('sales_table')->row_array();
			
			//$data['details'][$key]['depo_details'] = $this->depo_details($val['pro_id']);
			
		}
		//debug($data['details']);
		$data['mm'] = '2';
		$data['mt'] = '5_2';
		$data['mt2'] = '2_1';
		$this->load->view('stock_details_view', $data);
	}
	
	/* private function depo_details($pro_id){
		
	} */
	
	public function stock_details($depo_id){ 
		
		$data['details'] = $this->db->select('pro_name, products_table2.pro_id')
			->join('products_table2', 'purchase_details_table.pro_id = products_table2.pro_id', 'left')
			->where('depo_id', $depo_id)
			->group_by('products_table2.pro_id')
			->get('purchase_details_table')->result_array();
		
		$data['depo'] = $this->db->select('*')
			->where('depo_id', $depo_id)
			->get('depos_table')->row_array();
		$data['depos'] = $this->db->select('*')
			->get('depos_table')->result_array();
		
		
		
		foreach($data['details'] as $key => $val){
			$data['details'][$key]['stocks'] = $this->db->select('purchase_details_table.depo_id, qty, unit, depo_name')
				->join('depos_table', 'purchase_details_table.depo_id = depos_table.depo_id', 'left')
				->where('pro_id', $val['pro_id'])
				->get('purchase_details_table')->result_array();
			
			foreach( $data['details'][$key]['stocks'] as $kk => $vv ){
				$data['details'][$key]['depos'][$kk] = $vv['depo_name'];
			}
			
			$data['details'][$key]['depos'] = array_unique($data['details'][$key]['depos']);
			
			
			foreach($data['details'][$key]['stocks'] as $kk => $vv){
				$data['details'][$key]['stock']['qty'] += $vv['qty'];
			}
			$data['details'][$key]['stock']['unit'] = $data['details'][$key]['stocks'][0]['unit'];
		}
		//debug($data['details']);
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
	public function update_product_depo_post(){
		$post = $this->input->post();
		//debug($post);
		
		$whr['pro_id'] = $post['prid'];
		$upd['depo_id'] = $post['depo_id'];
			$this->db->update('purchase_details_table', $upd, $whr);
		
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
		
		$data['printers'] = $this->db->select('*')
			->get('aaa_printers_table')->result_array();
		
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
		if($type == 'cancelx'){
			$this->cancelx_details($fdate, $ldate);
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
	
	
	
	public function cancelx_details(){
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
		
		
		
		$data['titleText'] = date('d/m/Y H:i', $fdate).' - '.date('d/m/Y H:i', $ldate).' Tarihleri Arası İptal & İkram Raporları';
		$data['list'] = $this->db->select('*')
			->join('orders_table','user_log_report.order_id = orders_table.order_id', 'left')
			->join('tables_table','orders_table.table_id = tables_table.table_id', 'left')
			->join('products_table2','user_log_report.pro_id = products_table2.pro_id', 'left')
			->join('porsions_table','user_log_report.porsion_id = porsions_table.id', 'left')
			->join('users_table','user_log_report.user_id = users_table.user_id', 'left')
			->where('insert_time >= ', $fdate)
			->where('insert_time <= ', $ldate)
			->where('process !=', 'pro_insert')
			->get('user_log_report')->result_array();
		 
		$this->load->view('cancelx_details_view',$data); 
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
	
	public function get_order_details_logs(){
		$post = $this->input->post();
		$data['settings'] = $this->db->select('*')
			->where('id', 1)
			->get('settings_table')->row_array();
		$data['details'] = $this->db->select('products_table2.pro_name, porsion_name,  user_log_report.qty, porsion_price, user_name')
			->join('users_table', 'user_log_report.user_id = users_table.user_id', 'left')
			->join('products_table2', 'user_log_report.pro_id = products_table2.pro_id', 'left')
			->join('porsions_table', 'user_log_report.porsion_id = porsions_table.id', 'left')
			->where('order_id', $post['order_id'])
			->get('user_log_report')->result_array();
		$data['list'] = $data['details'];
		$data['details']['ord'] = $this->db->select('*')
			->join('tables_table', 'orders_table.table_id = tables_table.table_id', 'left')
			->where('order_id', $post['order_id']) 
			->get('orders_table')->row_array();
		//debug($data['details']);
		$this->load->view('order_details_view', $data);
	}
	
	public function menu_categories(){
		/* $data['cats'] = $this->db->select('cat_name, cat_id')
			->get('menu_cats_table')->result_array(); */
		
		$data['cats'] = $this->db->select('*')
			->order_by('sort', 'ASC')
			->where('type', '1')
			->get('menu_cats_table')->result_array();
			
		$data['kitchens'] = $this->db->select('*')
			->get('kitchens_table')->result_array();
		
		/* foreach($data['cats'] as $key => $val){
			$data['cats'][$key]['products'] = $this->db->select('cat_id, products_table2.pro_id, pro_name')
				->join('products_table2', 'menu_cat_product_table.pro_id = products_table2.pro_id', 'left')
				->where('cat_id', $val['cat_id'])
				->get('menu_cat_product_table')->result_array();
		} */
		$data['mm'] = '14';
		$data['mt'] = '14';
		$data['mt2'] = '14_21';
		$this->load->view('menu_categories_view', $data);
	}
	
	public function menu_categories2(){
		
		$data['cats'] = $this->db->select('*')
			->order_by('sort', 'ASC')
			->where('type', '1')
			->get('menu_cats_table')->result_array();
		
		$data['mm'] = '22';
		$data['mt2'] = '22_2';
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
		
		foreach($data['cat_list'] as $key => $val){
			$check[$key] = $this->db->select('*')
				->where('cat_id', $val['cat_id'])
				->get('kitchen_cats_table')->row_array();
			
			if(!empty($check[$key])){
				$data['cat_list'][$key]['kitchen_id'] = $check[$key]['kitchen_id'];
			}
			
		}
		
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
							$ins['pro_name'] = trim($val);
							$ins['pro_seo_name'] = tr_seo_converter($val);
						$this->db->insert('products_table2', $ins);
					
					$proNames .= $ins['pro_name'].', ';
					
					$pro_id = $this->db->insert_id();
						
						$ins2['pro_id'] = $pro_id;
						$ins2['cat_id'] = $post['cat_id'];
							$this->db->insert('product_cats_table2', $ins2);
						
						$ins3['pro_id'] = $pro_id;
						//$ins3['porsion_name'] = 'Adet';
						$ins3['porsion_price'] = '0.00';
							$this->db->insert('porsions_table', $ins3);
					}else{
						$sameNames .= $check['pro_name'].', ';
					}
					
				}
				
			
		}
		
		if(!empty($proNames)){
			
			$msg .= '<div style="margin-bottom:15px;"><i class="fa fa-check-circle" style="color:#5fbc29"></i> <b>'.$proNames.'</b> eklenmiştir.</div>'; 
			
		}
		
		if(!empty($sameNames)){
			
			$msg .= '<div style=""><i class="fa fa-exclamation-triangle" style="color:#C91F30"></i> <b>'.$sameNames.'</b> daha önce eklenmiştir. </div>';
			
		}
		
		
		
		if($this->db->affected_rows() > 0){
			
			echo $msg;
			
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
					->order_by('sort', 'ASC')
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
		
		foreach($data['sub_cat_list'] as $key => $val){
			$check[$key] = $this->db->select('*')
				->where('cat_id', $val['cat_id'])
				->get('kitchen_cats_table')->row_array();
			
			if(!empty($check[$key])){
				$data['sub_cat_list'][$key]['kitchen_id'] = $check[$key]['kitchen_id'];
			}
			
		}
		
		if(!empty($data['sub_cat_list'])){
			$data['msg'] = 'success';
			echo json_encode($data);
		}else{
			$data['msg'] = 'error';
			echo json_encode($data);
		}
	}
	
	public function check_sub_cats(){
		$post = $this->input->post();
		$data['sub_cat_list'] = $this->db->select('*')
			->where('cat_id', $post['cat_id'])
			->get('menu_sub_cats_table')->result_array();
		
		if(!empty($data['sub_cat_list'])){
			echo 'full';
		}else{
			echo 'empty';
		}
		
	}
	
	public function get_menu_products($cat_id){
		
		$data['cat'] = $this->db->select('*')
			->where('cat_id', $cat_id)
			->get('menu_cats_table')->row_array();
		
		$data['all_products'] = $this->db->select('pro_name, pro_id')
			->get('products_table2')->result_array();
		
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
		//debug($data['all_products']);
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
		
		$check2 = $this->db->select('*')
			->where('cat_id', $cat_id)
			->get('menu_sub_cats_table')->result_array();
		
		if(!empty($check)){
			echo 'hasproducts'; die();
		}
		
		if(!empty($check2)){
			echo 'hascats'; die();
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
		
		
		if(!empty($post)){
			$this->db->update('price_lists_table', array('isActive' => '0'));
			$this->db->insert('price_lists_table', array('list_insert_time' => time(), 'isActive' => 1));
			
			$list_id = $this->db->insert_id();
			
			if($list_id > 0){
				
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
			->order_by('products_table2.pro_name', 'ASC')
			->get('menu_cat_product_table')->result_array();
		
		foreach($data['pro_list'] as $key => $val){
			$data['pro_list'][$key]['porsions'] = $this->db->select('*')
				->where('pro_id', $val['pro_id'])
				->order_by('sort', 'ASC')
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
		$table1 = $this->db->select('is_busy, activeOrderId')
			->where('table_id', $t1)
			->where('is_busy', '1')
			->get('tables_table')->row_array();
		$table2 = $this->db->select('is_busy, activeOrderId')
			->where('table_id', $t2)
			->where('is_busy', '1')
			->get('tables_table')->row_array();
		
		if( (!empty($table1)) AND (!empty($table2)) ){
			$data['last_order_1'] = $this->db->select('order_id, total_price, paid_price, rest_price')
				->where('order_id', $table1['activeOrderId'])
				->get('orders_table')->row_array();
			$order_id_1 = $table1['activeOrderId'];
			
			$data['last_order_2'] = $this->db->select('order_id, total_price, paid_price, rest_price')
					->where('order_id', $table2['activeOrderId'])
					->get('orders_table')->row_array();
			$order_id_2 = $table2['activeOrderId'];
			
			$change = $this->db->update('order_details_table', array('order_id' => $order_id_1), array('order_id' => $order_id_2));
			$changePayments = $this->db->update('order_payments_table', array('order_id' => $order_id_1), array('order_id' => $order_id_2));
			
			if($change != FALSE){
				
				$upd['total_price'] = $data['last_order_1']['total_price'] + $data['last_order_2']['total_price'];
				$upd['paid_price'] = $data['last_order_1']['paid_price'] + $data['last_order_2']['paid_price'];
				$upd['rest_price'] = $data['last_order_1']['rest_price'] + $data['last_order_2']['rest_price'];
				$whr['order_id'] = $order_id_1;
				$updOrder = $this->db->update('orders_table', $upd, $whr);
				
				
				
				$tableNotBusy = $this->db->update('tables_table', array('is_busy' => '0', 'activeOrderId' => '0'), array('table_id' => $t2));
				
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
		
		//debug($post);
		
		$t1 = $post['table_id_1'];
		$t2 = $post['table_id_2'];
		
		$data['last_order_2'] = $this->db->select('order_id, table_id')
				->where('table_id', $t2)
				->order_by('order_id', 'DESC')
				->limit(1)
				->get('orders_table')->row_array();
		
		//debug($data['last_order_2']);
		
		$order_id_2 = $data['last_order_2']['order_id'];
		
		$change = $this->db->update('orders_table', array('table_id' => $t1), array('order_id' => $order_id_2));
		
		if($change != FALSE){
			
			$tableNotBusy = $this->db->update('tables_table', array('is_busy' => '0'), array('table_id' => $t2));
			$tableBusy = $this->db->update('tables_table', array('is_busy' => '1', 'activeOrderId' => $order_id_2 ), array('table_id' => $t1));
			
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
		
		$check = $this->db->select('*')
			->where('proType', '20')
			->get('products_table2')->row_array();
		
		$settings = $this->db->select('kuver_status, kuver_name, kuver_price')
			->where('id', '1')
			->get('settings_table')->row_array();
		
		if($post['order_id'] > 0){
			
			if($settings['kuver_status'] == '1'){
		
				if(empty($check)){
					
					$this->db->insert('products_table2', array('pro_name' => $settings['kuver_name'], 'pro_seo_name' => tr_seo_converter($settings['kuver_name']), 'proType' => 20) );
					$pro_id = $this->db->insert_id();
					
				}else{
					$pro_id = $check['pro_id'];
				}
				
				$orderCheck = $this->db->select('*')
					->where('pro_id', $pro_id)
					->where('order_id', $post['order_id'])
					->get('order_details_table')->row_array();
				
				if( !empty( $orderCheck ) ){
					$whr['order_id'] = $post['order_id'];
					$whr['pro_id'] = $pro_id;
					
					$upd['qty'] = $post['person'];
					$upd['price'] = $settings['kuver_price'];
					$upd['total_price'] = ($post['person']*$settings['kuver_price']);
					$upd['pro_name'] = $settings['kuver_name'];
					
					
					$this->db->update('order_details_table', $upd, $whr);
					
				}else{
					$ins['order_id'] = $post['order_id'];
					$ins['pro_id'] = $pro_id;
					$ins['qty'] = $post['person'];
					$ins['price'] = $settings['kuver_price'];
					$ins['total_price'] = ($post['person']*$settings['kuver_price']);
					$ins['pro_name'] = $settings['kuver_name'];
					$this->db->insert('order_details_table', $ins);
				}
			}
			$order_id = $post['order_id'];
			$whrx['order_id'] = $post['order_id'];
			$updx['person'] = $post['person'];
			$this->db->update('orders_table', $updx, $whrx);
			$this->update_order_price($order_id);
			redirect( $_SERVER['HTTP_REFERER'] );
			
		}else{
			
			$insOrd['table_id'] = $post['table_id'];
			$insOrd['total_price'] = ($post['person']*$settings['kuver_price']);
			$insOrd['rest_price'] = ($post['person']*$settings['kuver_price']);
			$insOrd['order_insert_time'] = time();
				$this->db->insert('orders_table', $insOrd);
			
			$order_id = $this->db->insert_id();
			
			if($settings['kuver_status'] == '1'){
		
				if(empty($check)){
					
					$this->db->insert('products_table2', array('pro_name' => $settings['kuver_name'], 'pro_seo_name' => tr_seo_converter($settings['kuver_name']), 'proType' => 20) );
					$pro_id = $this->db->insert_id();
					
				}else{
					$pro_id = $check['pro_id'];
				}
				
				
					$ins5['order_id'] = $order_id;
					$ins5['pro_id'] = $pro_id;
					$ins5['qty'] = $post['person'];
					$ins5['price'] = $settings['kuver_price'];
					$ins5['total_price'] = ($post['person']*$settings['kuver_price']);
					$ins5['pro_name'] = $settings['kuver_name'];
					
					
					$this->db->insert('order_details_table', $ins5);
					
					if($this->db->affected_rows() > 0){
						$this->db->update('tables_table', array('activeOrderId' => $order_id, 'is_busy' => '1'), array('table_id' => $post['table_id']));
					}
					
				
			}
			$this->update_order_price($order_id);
			$whrx['order_id'] = $order_id;
			$updx['person'] = $post['person'];
			$this->db->update('orders_table', $updx, $whrx);
			$this->update_order_price($order_id);
			redirect( $_SERVER['HTTP_REFERER'] );
			
		}
		
		
	}
	
	public function update_order_price($order_id){
		$order = $this->db->select('total_price, paid_price, discount_price, extra_price, rest_price')
			->where('order_id', $order_id)
			->get('orders_table')->row_array();
			
		$orderRows = $this->db->select('*')
			->where('order_id', $order_id)
			->get('order_details_table')->result_array();
		//debug($orderRows);
		foreach($orderRows as $key => $val){
			$totalPrice += $val['total_price'];
		}
		
		$upd['total_price'] = $totalPrice;
		
		$settings = $this->db->select('extra_status, extra_percent')
			->where('id', '1')
			->get('settings_table')->row_array();
		
		if($settings['extra_status'] == '1'){
			$extra_price = number_format(($totalPrice * ($settings['extra_percent'] / 100)), 2);
		}else{
			$extra_price = 0.00;
		}
		
		
		$upd['extra_price'] = $extra_price;
		$upd['rest_price'] = ($totalPrice - ( $order['paid_price'] ) + $extra_price );
		$this->db->update('orders_table', $upd, array('order_id' => $order_id));
		
		
	}
	
	public function cc_update_post(){ 
		$post = $this->input->post();
		$catName = $post['ccName'];
		$catDesc = $post['catDesc'];
		$catId = $post['ccId'];
		
		$kitchen_id = $post['kitchen_id'];
		
		if($kitchen_id > 0){
			$check = $this->db->select('*')
				->where('cat_id', $catId)
				->get('kitchen_cats_table')->row_array();
			if( empty($check) ){
				$this->db->insert('kitchen_cats_table', array('cat_id' => $catId, 'kitchen_id' => $kitchen_id));
			}else{
				$this->db->update('kitchen_cats_table', array('cat_id' => $catId, 'kitchen_id' => $kitchen_id), array('cat_id' => $catId));
			}
		}
		
		
		//debug($post);	
			$whr['cat_id'] = $catId;
			$upd['cat_name'] = $catName;
			if(!empty($catDesc)){
				$upd['cat_description'] = $catDesc;
			}
			
			$this->db->update('menu_cats_table', $upd, $whr);
			
			echo 'ok'; die();
			
			
	}
	
	public function get_payment_types($pid){
		$data['sub_payment_types'] = $this->db->select('*')
			->where('payment_id', $pid)
			->where('status', '1')
			->get('payment_subtypes_table')->result_array();
		
		$this->load->view('sub_payment_types_view', $data);
		
	}
	
	public function check_sp(){
		$post = $this->input->post();
		$check = $this->db->select('*')
			->where('sub_p_id', $post['spid'])
			->get('order_payments_table')->row_array();
		if(!empty($check)){
			echo 'error';
		}else{
			echo 'empty';
		}
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
		if(!empty($post['status'])){
			$upd['status'] = '1';
		}else{
			$upd['status'] = '0';
		}
		//debug($upd);
			$this->db->update("payment_subtypes_table", $upd, $whr);
		
		if($this->db->affected_rows() > 0){
			echo 'success';
		}else{
			echo 'error';
		}
		
	}
	
	public function kuver_settings_post(){
		$post = $this->input->post();
		//debug($post);
		
		if(!empty($post['kuver_status'])){
			$upd['kuver_status'] = 1;
		}else{
			$upd['kuver_status'] = 0;
		}
		
		$upd['kuver_name'] = $post['kuver_name'];
		$upd['kuver_price'] = $post['kuver_price'];
		
		$this->db->update('settings_table', $upd, array('id' => 1));
		
		redirect( $_SERVER['HTTP_REFERER'] );
		
		
	}
	
	public function garsoniye_settings_post(){
		$post = $this->input->post();
		//debug($post);
		
		if(!empty($post['extra_status'])){
			$upd['extra_status'] = 1;
		}else{
			$upd['extra_status'] = 0;
		}
		
		$upd['extra_name'] = $post['extra_name'];
		$upd['extra_percent'] = $post['extra_percent'];
		
		$this->db->update('settings_table', $upd, array('id' => 1));
		
		redirect( $_SERVER['HTTP_REFERER'] );
		
		
	}
	
	public function add_printer_post(){
		$post = $this->input->post();
		//debug($post);
		$ins['printer_name'] = $post['printer_name'];
		$ins['printer_ip'] = $post['printer_ip'];
			$this->db->insert("aaa_printers_table", $ins);
		
		if($this->db->affected_rows() > 0){
			echo 'success';
		}
		
	}
	
	public function update_printer_post(){
		$post = $this->input->post();
		//debug($post);
		$whr['id'] = $post["prid"];
		$upd['printer_name'] = $post['prname'];
		$upd['printer_ip'] = $post['pr_ip'];
		
		//debug($upd);
			$this->db->update("aaa_printers_table", $upd, $whr);
		
		if($this->db->affected_rows() > 0){
			echo 'success';
		}else{
			echo 'error';
		}
		
	}
	
	public function change_sub_p_status(){
		$post = $this->input->post();
		//debug($post);
		$whr['payment_sub_id'] = $post["spid"];
		
		
		$check = $this->db->select('status')
			->where('payment_sub_id', $post["spid"])
			->get('payment_subtypes_table')->row_array();
		
		if($check['status'] == '0'){
			$st = '1';
		}else{
			$st = '0';
		}
		$upd['status'] = $st;
		//debug($upd);
			$this->db->update("payment_subtypes_table", $upd, $whr);
		
		if($this->db->affected_rows() > 0){
			echo 'success';
		}else{
			echo 'error';
		}
		
	}
	public function delete_printer($prid){
		
		$whr['id'] = $prid;
			$this->db->delete("aaa_printers_table", $whr);
		
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
	
	public function system_test(){
		echo '1';
	}
}

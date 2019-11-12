<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	
	public function contact_post()
	{
		
		$post = $this->input->post();
		
		//debug($post);
		$ins["first_name"] = $post["first_name"];
		$ins["last_name"] = $post["last_name"];
		$ins["user_mail"] = $post["user_mail"];
		$ins["user_gsm"] = $post["user_gsm"];
		$ins["user_text"] = $post["user_text"];
		$ins["insert_time"] = time();
		
			//$this->db->insert('reservations_table', $ins); 
		
		//if($this->db->affected_rows() > 0){
			
			$sender = 'info@agoranisantasi.com';
			$pass = 'pswagr**';
			$receiver = 'ece@agoranisantasi.com';
			//$receiver = 'yemliha@superpratik.com';
			$subject = 'İletişim Formu Mesajı';
			$body = '<div style="background:#efefef; padding:10px;">
						<div><span>Ad - Soyad : </span><span>'.$ins["first_name"].''.$ins["last_name"].'</span></div>
						<div><span>E-posta : </span><span>'.$ins["user_mail"].'</span></div>
						<div><span>Mesaj : </span><span>'.$ins["user_text"].'</span></div>
					</div>';
			
			
			$mailSend = $this->mail($sender, $pass, $receiver, $subject, $body);
		
			if($mailSend != FALSE){
				redirect(FATHER_BASE);
			}
		
		//}
		
		
		
		//$this->load->view('page_view', $data);
		
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

		$ci->email->from($sender_mail, 'Agora Nişantaşı'); 
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
	

}

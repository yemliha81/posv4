<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
	
	public function month()
	{
		require_once DOC_ROOT . 'phpexcel/Classes/PHPExcel.php';
		
		$first = strtotime('01-05-2019');
		$last = strtotime('01-06-2019');
		
		//debug($first.'-'.$last);
		
		$list = $this->db->select('order_id,total_price,order_insert_time,person')
			->where('order_insert_time >=',$first)
			->where('order_insert_time <=',$last)
			->get('orders_table')->result_array();
		
		foreach($list as $key => $val){
			$list[$key]['hizm'] = $this->db->select('qty,total_price')
				->where('order_id', $val['order_id'])
				->where('pro_id', '135')
				->where('total_price > ', '0')
				->get('order_details_table')->result_array();
			$list[$key]['kuver'] = $this->db->select('qty,total_price')
				->where('order_id', $val['order_id'])
				->where('pro_id', '231')
				//->where('total_price > ', '0')
				->get('order_details_table')->result_array();
			
			/* if(!empty($list[$key]['kuver'])){
				$this->db->update('orders_table', array('person' => $list[$key]['kuver'][0]['qty']), array('order_id' => $val['order_id']));
			} */
			
		}
		
		debug($list); 
		
		$objPHPExcel = new PHPExcel();

		// Set document properties
		$objPHPExcel->getProperties()->setCreator("-")
									 ->setLastModifiedBy("-")
									 ->setTitle("-")
									 ->setSubject("-")
									 ->setDescription("-")
									 ->setKeywords("-")
									 ->setCategory("-");


		

		$objPHPExcel->getActiveSheet()
					->setCellValue('A1', 'Sipariş No')
					->setCellValue('B1', 'Tarih')
					->setCellValue('C1', 'Toplam Tutar')
					->setCellValue('D1', 'Kişi Sayısı')
					->setCellValue('E1', 'Hizmet Bedeli Ad.')
					->setCellValue('F1', 'Hizmet Bedeli Tutar')
					->setCellValue('G1', 'Kuver Ad.')
					->setCellValue('H1', 'Kuver Tutar')
					;
		
 
		// Miscellaneous glyphs, UTF-8
		
		foreach($list as $key => $val){
			$i = $key+2;
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $val['order_id']);
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$i, date('d-m-Y H:i', $val['order_insert_time']));
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $val['total_price']);
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$i, ($val['person']) );
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$i, $val['hizm'][0]['qty']);
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$i, $val['hizm'][0]['total_price']);
			$objPHPExcel->getActiveSheet()->setCellValue('G'.$i, $val['kuver'][0]['qty']);
			$objPHPExcel->getActiveSheet()->setCellValue('H'.$i, $val['kuver'][0]['total_price']);
		}
		
		foreach(range('A','L') as $columnID) {
			$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
		}
		
		$objPHPExcel->setActiveSheetIndex(0);


		// Redirect output to a client’s web browser (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="01simple.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;
	}
	
}
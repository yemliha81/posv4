<?php  include('includes/header-order.php');?>


<div class="left1">
	<?php include('includes/left_menu.php');?>
</div> 

<div class="left2">
	<div class="top">
		<div >
			<a href="javascript:;" class="tglM" style="position:fixed;top:0; right:0;  z-index:99999999; background:#666; color:#fff; padding:15px;">
				<i class="fas fa-bars fa-2x"></i>
			</a>
		</div>
		<div>
			<div class="col-xs-12">
			<div class="row">
				<div class="col-sm-6">
					<span class="pageTitle"><?php echo $titleText;?></span>
				</div>
				<div class="col-sm-6">
					
				</div>
			</div>
				
			</div>
		</div>
	</div>
	
	<div class="row dn" style="display:none;">
		<?php foreach($payments as $key => $val){ ?>
			<?php 
				if($val['payment_type'] == 'cash'){ $cash[] = $val['paid_price']; $type = 'Nakit';} 
				if($val['payment_type'] == 'credit'){ $credit[] = $val['paid_price']; $type = 'Kredi Kartı';} 
				if($val['payment_type'] == 'openPay'){ $open[] = $val['paid_price']; $type = 'Açık Hesap';} 
				if($val['payment_type'] == 'out'){ $out[] = $val['paid_price']; $type = 'Masraf';} 
				if($val['payment_type'] == 'discount'){ $discount[] = $val['paid_price']; $type = 'İndirim';} 
				if($val['payment_type'] == 'mealCard'){ $mealCard[] = $val['paid_price']; $type = 'Yemek Kartı';} 
			?>
			<?php //$total += $val['paid_price'];?>
			<?php $disc = array_sum($discount);?>
		<?php } ?>
		<?php  foreach($list as $key => $val){ 
				$people[] = $val['people']['person'];
			 }
		 ?>	
	</div>
	<div class="mainContainer"style="padding:0 15px;">
		<div class="whiteZone f13" style="padding-right:0; padding-left:0;">
		<?php $ccash = array_sum($cash);?> 
		<?php $ccredit = array_sum($credit);?> 
		<?php $copen = array_sum($open);?> 
		<?php $cmeal = array_sum($mealCard);?> 
		<?php //array_sum($out);?>  <br/>
		<?php $cdisc = array_sum($discount);?> 
		<?php $total = $ccash + $ccredit + $copen + $cmeal;?> 
		
			<div class="rowT">
				<div class="col-sm-3">
				<table style="width:100%;">
				<?php if(array_sum($cash) > 0){ ?>
					<tr style="font-weight:bold;">
						<td>Nakit</td>
						<td class="text-right"><?php echo (number_format(array_sum($cash),2,",","."));?>  ₺</td>
					</tr>
				<?php } ?>
				<?php if(array_sum($credit) > 0){ ?>
					<tr style="font-weight:bold;">
						<td>Kredi Kartı</td>
						<td class="text-right"><?php echo (number_format(array_sum($credit),2,",","."));?>  ₺</td>
					</tr>
				<?php } ?>
				<?php if(!empty($credit_subPayments)){ ?>
					<?php foreach($credit_subPayments as $key => $val){ ?>
						<tr>
							<td><?php echo $val['payment_subname'];?></td>
							<td class="text-right"><?php echo number_format($val['total']['paid_price'], 2,",",".");?>  ₺</td>
						</tr>
					<?php } ?>
				<?php } ?>
				<?php if(array_sum($mealCard) > 0){ ?>
					<tr style="font-weight:bold;">
						<td>Yemek Kartı</td>
						<td class="text-right"><?php echo (number_format(array_sum($mealCard),2,",","."));?>  ₺</td>
					</tr>
				<?php } ?>
				<?php if(!empty($mealcard_subPayments)){ ?>
					<?php foreach($mealcard_subPayments as $key => $val){ ?>
						<tr>
							<td><?php echo $val['payment_subname'];?></td>
							<td class="text-right"><?php echo number_format($val['total']['paid_price'], 2,",",".");?>  ₺</td>
						</tr>
					<?php } ?>
				<?php } ?>
				<?php if(array_sum($open) > 0){ ?>
					<tr style="font-weight:bold;">
						<td>Açık Hesap</td>
						<td class="text-right"><?php echo (number_format(array_sum($open),2,",","."));?>  ₺</td>
					</tr>
				<?php } ?>
				<?php if(array_sum($discount) > 0){ ?>
					<tr style="font-weight:bold;">
						<td>İndirim</td>
						<td class="text-right"><?php echo (number_format(array_sum($discount),2,",","."));?>  ₺</td>
					</tr> 
				<?php } ?>
				</table>
				
					<hr />
					
				</div>
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<h3 class="text-right">
						Toplam : <?php echo number_format(($total - $disc),2,",",".");?> ₺
					</h3>
						<div class="text-right">
							<select class="pastDays form-control" style="margin-bottom:15px;">
								<option value="">Önceki Günler</option>
								<?php  foreach($pastDays as $key => $val){ ?>
								<?php if($val['day_end_time'] > 0){ $lastDay[$key] = date("d-m-Y H:i",$val['day_end_time']); }else{
									$lastDay[$key] = 'Gün sonu yapılmadı';
								}  ?>
								<option value="<?php echo $val['day_id'];?>">
									<?php echo date("d-m-Y H:i",$val['day_start_time']).' - '.$lastDay[$key];?>
								</option>
								<?php } ?>
							</select>
							<?php if($day['day_end_time'] == 0){ ?> 
							<a href="javascript:;" style="float: right;margin-left: 5px;" class="butonX1 dayEndPost" day_id="<?php echo $day['day_id'];?>">GÜN SONU YAP</a>
							<?php } ?>
							<!--<a href="javascript:;" class="butonX1 dayEndPrint hidden">GÜN SONU YAZDIR</a> -->
							<a href="#" data-toggle="modal" data-target="#reportModal" style="float: right;margin-left: 5px;" class="butonX1">ÖZET GÜN SONU RAPORU</a> 
						</div>
					</div>
				<div class="clearfix"></div>
				<div class="col-sm-12">
					<div class="row">
					<?php //debug($list);?>
						<table class="table table-hover">
							<thead>
								<tr class="text-right">
									<td><b>Tarih</b></td>
									<td><b>Masa</b></td>
									<td><b>İndirim</b></td>
									<td><b>Toplam</b></td>
									<td><b>Nakit</b></td>
									<td><b>Kredi Kartı</b></td>
									<td><b>Yemek Kartı</b></td>
									<td><b>Açık Hesap</b></td>
								</tr>
							</thead>
							<tbody>
								<?php foreach($list as $key => $val){ ?>
									<tr class="text-right ordDetails" order_id="<?php echo $val['order_id'];?>">
										<td><?php echo date('d-m-Y H:i', $val['order_insert_time']);?></td>
										<td><?php echo $val['table_name'];?></td>
										<td><?php echo number_format((float)$val['discount']['paid_price'], 2,",",".");?></td>
										<td><?php echo number_format((float)($val['total_price'] - $val['discount']['paid_price']), 2,",",".");?></td>
										<td><?php echo number_format((float)$val['cash']['paid_price'], 2,",",".");?></td>
										<td><?php echo number_format((float)$val['credit']['paid_price'], 2,",",".");?></td>
										<td><?php echo number_format((float)$val['mealCard']['paid_price'], 2,",",".");?></td>
										<td><?php echo number_format((float)$val['open']['paid_price'], 2,",",".");?></td>
									</tr>					
								<?php } ?>
									
							</tbody>
						</table>
					</div>
				</div>
				
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>

<div class="" style="">
	
	<div class="">
		<div class="col-xs-12">
			<div class="container hidden" id="printDiv1">
				<div class="row" >
					<?php foreach($list as $key => $val){ ?>
						<div style="background:#f7f7f7; line-height:1; padding:5px;">
							<b>Masa : <?php echo $val['table_name'];?></b>
							<span class="pull-right"><?php echo date('d-m-Y H:i', $val['order_insert_time']);?></span>
						</div>
						<div class="clearfix"></div>
						
							<?php foreach($val['details'] as $kk => $vv){ ?>
								
									<div class="row" style="border-bottom:1px solid #ddd; ">
										<div class="col-xs-7" style="padding-left:25px;">
											<?php echo $vv['pro_name'];?>
										</div>
										<div class="col-xs-1">
											<?php echo $vv['qty'];?>
										</div>
										<div class="col-xs-3 text-right" style="">
											<?php echo number_format($vv['total_price'], 2,",",".");?>
										</div>
									</div>
								
							<?php } ?>
								
							<?php if($val['cash']['paid_price'] != ''){ ?>
								<div class="row" style="border-bottom:1px solid #ddd; ">
									<div class="col-xs-7" style="padding-left:25px;">
										<b>Nakit Ödeme</b>
									</div>
									<div class="col-xs-1">
										
									</div>
									<div class="col-xs-3 text-right" style="">
										<b><?php echo number_format($val['cash']['paid_price'], 2,",",".");?></b>
									</div>
								</div>
							<?php } ?>
							
							<?php if($val['credit']['paid_price'] != ''){ ?>
								<div class="row" style="border-bottom:1px solid #ddd; ">
									<div class="col-xs-7" style="padding-left:25px;">
										<b>Kredi Kartı</b>
									</div>
									<div class="col-xs-1">
										
									</div>
									<div class="col-xs-3 text-right" style="">
										<b><?php echo number_format($val['credit']['paid_price'], 2,",",".");?></b>
									</div>
								</div>
							<?php } ?>
							<?php if($val['mealCard']['paid_price'] != ''){ ?>
								<div class="row" style="border-bottom:1px solid #ddd; ">
									<div class="col-xs-7" style="padding-left:25px;">
										<b>Yemek Kartı</b>
									</div>
									<div class="col-xs-1">
										
									</div>
									<div class="col-xs-3 text-right" style="">
										<b><?php echo number_format($val['mealCard']['paid_price'], 2,",",".");?></b>
									</div>
								</div>
							<?php } ?>
							<?php if($val['open']['paid_price'] != ''){ ?>
								<div class="row" style="border-bottom:1px solid #ddd; ">
									<div class="col-xs-7" style="padding-left:25px;">
										<b>Açık Hesap</b>
									</div>
									<div class="col-xs-1">
										
									</div>
									<div class="col-xs-3 text-right" style="">
										<b><?php echo number_format($val['open']['paid_price'], 2,",",".");?></b>
									</div>
								</div>
							<?php } ?>
						
					<?php } ?>
					<div class="text-right" style="padding:20px;">
						<b>Toplam : <?php echo $total;?> ₺</b> <br />
					
						<b>Nakit : <?php echo number_format(array_sum($cash), 2,",",".");?>  ₺</b> <br />
						<b>Kredi Kartı : <?php echo number_format(array_sum($credit), 2,",",".");?>  ₺</b> <br />						
						<b>Yemek Kartı : <?php echo number_format(array_sum($mealCard), 2,",",".");?>  ₺</b> <br />
						<b>Açık Hesap : <?php echo number_format(array_sum($open), 2,",",".");?>  ₺</b> <br />
						<b>İndirim : <?php echo number_format(array_sum($discount), 2,",",".");?>  ₺</b> <br />
					</div>
					</div>
				</div>
			</div>
			<div id="reportModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				  
				  <div class="modal-body">
					<div class="row">
						<div class="col-xs-4">
							<select class="printer form-control">
								<option value="">Yazıcı Seçiniz</option>
								<?php foreach($printers as $key => $val){ ?>
									<option ptype="<?php echo $val['printer_type'];?>" value="<?php echo $val['printer_ip'];?>"><?php echo $val['printer_name'];?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-xs-4">
							<a href="javascript:;" class="butonX1 w100 dayEndPrint2xx text-center" data-dismiss="modal">YAZDIR</a>
						</div>
						<div class="col-xs-4">
						<a href="javascript:;" class="butonX1 w100 text-center prShow">ÜRN DTY GİZLE</a>
					</div>
					</div>
					<div class="htmlBody">
					
					<div style="font-weight:bold;">
						<?php $row[] = array('print_type' => 'report');?>
						<?php $row[] = array('type' => 'header', 'title' => 'Posopos');?>
						<?php $row[] = array('type' => 'header', 'title' => 'Gün Sonu Raporu');?>
						<div style="text-align:center;"><b><h1 style="font-weight:bold;">Posopos</h1></b></div>
						<div style="text-align:center;"><h2 style="font-weight:bold;"><?php echo $stngs['store_name'];?></h2></div>
						<div>Gün Sonu Raporu</div>
						<div>
							<?php
							if($day['day_end_time'] == 0){ $day['day_end_time'] = time(); } 
								echo date('d-m-Y H:i', $day['day_start_time']) .' - '.date('d-m-Y H:i', $day['day_end_time']) ;
							?>
							<?php $row[] = array('type' => 'line', 'title' => '------'.date('d-m-Y H:i', $day['day_start_time']).' - '.date('d-m-Y H:i', $day['day_end_time']).'------');?>
						</div>
						<?php $row[] = array('type' => 'line', 'title' => '------------------------------------------------');?>						
						<div style="text-align:center;margin-top:25px;border-bottom:1px dashed #000; padding-bottom:15px; margin-bottom:15px;">
							<h2 style="font-weight:bold;">Gelirler</h2>
							<?php $row[] = array('type' => 'header', 'title' => 'Gelirler');?>
						</div>
						<?php if(array_sum($cash) > 0){ ?>
							<div>
								<span style="float:left;display:inline-block;font-weight:bold;">Nakit</span>
								<span style="float:right;display:inline-block;"> <?php echo number_format(array_sum($cash), 2,",",".");?> ₺</span>
								<div style="clear:both;"></div>
								<?php $row[] = array('type' => 'row', 'title' => 'Nakit', 'value' => number_format(array_sum($cash), 2,",","."));?>
							</div>
						<?php } ?>
						<?php if(array_sum($credit) > 0){ ?>
							<div>
								<span style="float:left;display:inline-block;font-weight:bold;">Kredi Kartları Toplam</span>
								<span style="float:right;display:inline-block;"> <?php echo number_format(array_sum($credit), 2,",",".");?> ₺</span>
								<div style="clear:both;"></div>
								<?php $row[] = array('type' => 'row', 'title' => 'Kredi Kartları Toplam', 'value' => number_format(array_sum($credit), 2,",","."));?>
							</div>
						<?php } ?>
						<?php if(!empty($credit_subPayments)){ ?>
							<?php foreach($credit_subPayments as $key => $val){ ?>
								<div class="bestSellers">
									<div class="row">
										<?php echo '<div class="col-xs-6">'.$val['payment_subname'].'</div>  <div class="col-xs-6 text-right">'.number_format($val['total']['paid_price'], 2,",",".").' ₺</div>';?> 
									</div>
								</div>
								<?php $row[] = array('type' => 'row', 'title' => $val['payment_subname'], 'value' => number_format($val['total']['paid_price'], 2,",","."));?>
							<?php } ?>
						<?php } ?>
						<?php if(array_sum($mealCard) > 0){ ?>
							<div>
								<span style="float:left;display:inline-block;font-weight:bold;">Yemek Kartları Toplam</span>
								<span style="float:right;display:inline-block;"> <?php echo number_format((float)array_sum($mealCard), 2,",",".");?> ₺</span>
								<div style="clear:both;"></div>
							</div>
							<?php $row[] = array('type' => 'row', 'title' => 'Yemek Kartları Toplam', 'value' => number_format(array_sum($mealCard), 2,",","."));?>
						<?php } ?>
						<?php if(!empty($mealcard_subPayments)){ ?>
							<?php foreach($mealcard_subPayments as $key => $val){ ?>
								<div class="bestSellers">
									<div class="row">
										<?php echo '<div class="col-xs-6">'.$val['payment_subname'].'</div>  <div class="col-xs-6 text-right">'.number_format($val['total']['paid_price'], 2,",",".").' ₺</div>';?> 
									</div>
								</div>
								<?php $row[] = array('type' => 'row', 'title' => $val['payment_subname'], 'value' => number_format($val['total']['paid_price'], 2,",","."));?>
							<?php } ?>
						<?php } ?>
						<?php if(array_sum($open) > 0){ ?>
							<div>
								<span style="float:left;display:inline-block;">Açık Hesap</span> 
								<span style="float:right;display:inline-block;"> <?php echo number_format(array_sum($open), 2,",",".");?> ₺</span>
								<div style="clear:both;"></div>
							</div>
							<?php $row[] = array('type' => 'row', 'title' => 'Açık Hesap', 'value' => number_format(array_sum($open), 2,",","."));?>
						<?php } ?>
						<div>
							<span style="float:left;display:inline-block;font-weight:bold;">Genel Toplam</span>
							<span style="float:right;display:inline-block;"> <?php echo number_format(($total -array_sum($discount)), 2,",",".");?> ₺</span>
							<div style="clear:both;"></div>
						</div>
						<?php $row[] = array('type' => 'bold_row', 'title' => 'Genel Toplam', 'value' => number_format(($total - array_sum($discount)), 2,",","."));?>
						<div style="text-align:center;margin-top:25px;border-bottom:1px dashed #000; padding-bottom:15px; margin-bottom:15px;">
							<h2 style="font-weight:bold;">Ciroya Yansımayanlar</h2>
						</div>
						<?php $row[] = array('type' => 'line', 'title' => '------------------------------------------------');?>
						<?php $row[] = array('type' => 'header', 'title' => 'Ciroya Yansimayanlar');?>
						<div>
							<span style="float:left;display:inline-block;">İptaller Toplamı</span>
							<span style="float:right;display:inline-block;"> <?php echo number_format($iptal, 2,",",".");?> ₺</span>
							<div style="clear:both;"></div>
						</div>
						<?php $row[] = array('type' => 'row', 'title' => 'İptaller Toplamı', 'value' => number_format(($iptal), 2,",","."));?>
						<div>
							<span style="float:left;display:inline-block;">İndirimler Toplamı</span>
							<span style="float:right;display:inline-block;"> <?php echo number_format(array_sum($discount), 2,",",".");?> ₺</span>
							<div style="clear:both;"></div>
						</div>
						<?php $row[] = array('type' => 'row', 'title' => 'İndirimler Toplamı', 'value' => number_format(array_sum($discount), 2,",","."));?>
						<div>
							<span style="float:left;display:inline-block;">İkramlar Toplamı</span>
							<span style="float:right;display:inline-block;"> <?php echo number_format($ikram, 2,",",".");?> ₺</span>
							<div style="clear:both;"></div>
						</div>
						<?php $row[] = array('type' => 'row', 'title' => 'İkramlar Toplamı', 'value' => number_format(($ikram), 2,",","."));?>
						<?php $row[] = array('type' => 'line', 'title' => '------------------------------------------------');?>
						<div style="text-align:center;margin-top:25px;border-bottom:1px dashed #000; padding-bottom:15px; margin-bottom:15px;">
							<h2 style="font-weight:bold;">Adisyon & Ciro Derinliği</h2>
						</div>
						<?php $row[] = array('type' => 'header', 'title' => 'Adisyon & Ciro Derinliği');?>
						<div>
							<span style="float:left;display:inline-block;">Adisyon Sayısı</span>
							<span style="float:right;display:inline-block;"> <?php echo count($list);?></span>
							<div style="clear:both;"></div>
						</div>
						<?php $row[] = array('type' => 'row', 'title' => 'Adisyon Sayısı','','', 'value' => count($list) );?>
						<div>
							<span style="float:left;display:inline-block;">Ciro / Adisyon</span>
							<?php $rate = ( ($total - array_sum($discount)) / (count($list)) );?>
							<span style="float:right;display:inline-block;"> <?php echo number_format((float)$rate, 2,",",".");?> ₺</span>
							<div style="clear:both;"></div>
						</div>
						<?php $row[] = array('type' => 'row', 'title' => 'Ciro / Adisyon', 'value' => number_format((float)$rate, 2,",",".") );?>
						<div>
							<span style="float:left;display:inline-block;">Kişi Sayısı</span>
							<span style="float:right;display:inline-block;"> <?php echo array_sum($people);?></span>
							<div style="clear:both;"></div>
						</div>
						<?php $row[] = array('type' => 'row', 'title' => 'Kişi Sayısı', 'value' => array_sum($people) );?>
						<div>
							<span style="float:left;display:inline-block;">Ciro / Kişi</span>
							<?php if(array_sum($people) > 0){ ?>
								<?php $rate2 = ( ($total - array_sum($discount)) / (array_sum($people)) );?>
							<?php }else{ ?>
								<?php $rate2 = 0;?>
							<?php } ?>
							<span style="float:right;display:inline-block;"> <?php echo number_format($rate2, 2,",",".");?> ₺</span>
							<div style="clear:both;"></div>
						</div>
						<?php $row[] = array('type' => 'row', 'title' => 'Ciro / Kişi', 'value' => number_format((float)$rate2, 2,",",".") );?>
						<?php $row[] = array('type' => 'line', 'title' => '------------------------------------------------');?>
						<div class="prrx">
							<div style="text-align:center;margin-top:25px;border-bottom:1px dashed #000; padding-bottom:15px; margin-bottom:15px;">
								<h2 style="font-weight:bold;">Ürün Satışları</h2>
							</div>
							<?php $row[] = array('type' => 'header', 'title' => 'Ürün Satışları');?>
							<?php $row[] = array('type' => 'tableCell', 'cell1' => 'Urun', 'cell2' => 'Adet', 'cell3' => 'Yuzde', 'cell4' => 'Tutar');?>
							<?php $row[] = array('type' => 'line', 'title' => '------------------------------------------------');?>
							<div>
								<div class="">
									<?php foreach($proList as $key => $val){ ?>
										<div class="row">
											<div class="col-xs-6"><span style="float:left;display:inline-block;"><?php echo $val['pro_name'];?></span></div>
											<div class="col-xs-2" style="white-space:nowrap;"><?php echo $val['count'];?></div>
											<div class="col-xs-2" style="white-space:nowrap;">% <?php echo number_format((float)((($val['price']*$val['count']) / $total) * 100 ), 2,",",".");?></div>
											<div class="col-xs-2"><span style="float:right;display:inline-block;"> <?php echo number_format((float)($val['tot_price']), 2,",",".");?> ₺</span></div>
										</div>
										<?php $row[] = array('type' => 'tableCell', 'cell1' => str_replace("'"," ",$val['pro_name']), 'cell2' => $val['count'], 'cell3' => number_format((float)((($val['price']*$val['count']) / $total) * 100 ), 2,",","."), 'cell4' => number_format((float)($val['price']*$val['count']), 2,",",".") );?>
									<?php $ttt += $val['tot_price'];?>
									<?php } ?>
									<?php $row[] = array('type' => 'line', 'title' => '------------------------------------------------');?>
									<?php $row[] = array('type' => 'row', 'title' => 'BRUT TOPLAM','','', 'value' => number_format($ttt, 2,",",".") );?>
									<?php $row[] = array('type' => 'row', 'title' => 'INDIRIM','','', 'value' => number_format(array_sum($discount), 2,",",".") );?>
									<?php $row[] = array('type' => 'bold_row', 'title' => 'NET TOPLAM','','', 'value' => number_format(($ttt - array_sum($discount)), 2,",",".") );?>
									<div class="row">
										<div class="col-xs-6"><b>Toplam</b></div>
										<div class="col-xs-6"><span style="float:right;display:inline-block;"> <?php echo number_format((float)($ttt), 2,",",".");?> ₺</span></div>
									</div>
								</div>
								<div style="clear:both;"></div>
							</div>
							<?php $row[] = array('type' => 'line', 'title' => '------------------------------------------------');?>
						</div>
						<div style="text-align:center;margin-top:25px;border-bottom:1px dashed #000; padding-bottom:15px; margin-bottom:15px;">
							<h2 style="font-weight:bold;">Ürün Satışları <br /> ( Grup Bazında )</h2>
						</div>
						<?php $row[] = array('type' => 'header', 'title' => 'Kategori Satislari');?>
						
						<?php $row[] = array('type' => 'tableCell2', 'cell1' => 'Kategori', 'cell2' => 'Yuzde', 'cell3' => 'Tutar' );?>
						<?php $row[] = array('type' => 'line', 'title' => '------------------------------------------------');?>
						<div>
							<div class="">
								<?php foreach($list2 as $key => $val){ ?>
									<div class="row">
										<div class="col-xs-6"><span style="float:left;display:inline-block;"><?php echo $val['cat_name'];?></span></div>
										<div class="col-xs-2" style="white-space:nowrap;">% <?php echo number_format((float)(($val['total'] / $total) * 100 ), 2,",",".");?></div>
										<div class="col-xs-4"><span style="float:right;display:inline-block;"> <?php echo number_format((float)$val['total'], 2,",",".");?> ₺</span></div>
									</div>
									<?php $ttc += $val['total'];?>
									<?php $row[] = array('type' => 'tableCell2', 'cell1' => $val['cat_name'], 'cell2' => number_format((float)(($val['total'] / $total) * 100 ), 2,",","."), 'cell3' => number_format((float)$val['total'], 2,",",".") );?>
								<?php } ?>
								
								<div class="row">
									<div class="col-xs-6"><span style="float:left;display:inline-block;">Toplam</span></div>
									<div class="col-xs-2" style="white-space:nowrap;"></div>
									<div class="col-xs-4"><span style="float:right;display:inline-block;"> <?php echo number_format($ttc, 2,",",".");?> ₺</span></div>
								</div>
								<div class="row">
									<div class="col-xs-6"><span style="float:left;display:inline-block;">İndirim</span></div>
									<div class="col-xs-2" style="white-space:nowrap;">% <?php echo number_format( ( ( array_sum($discount) / $total ) * 100  ) , 2,",",".");?></div>
									<div class="col-xs-4"><span style="float:right;display:inline-block;"> <?php echo number_format(array_sum($discount), 2,",",".");?> ₺</span></div>
								</div>
								<?php $row[] = array('type' => 'line', 'title' => '------------------------------------------------');?>
								<div class="row">
									<div class="col-xs-6"><h1 style="font-weight:bold;"><span style="float:left;display:inline-block;">TOPLAM</span></h1></div>
									
									<div class="col-xs-6" style="white-space:nowrap;"><h1 style="font-weight:bold;"><span style="float:right;display:inline-block;"> <?php echo number_format($total - array_sum($discount), 2,",",".");?> TL</span></h1></div>
								</div>
								<?php $row[] = array('type' => 'row', 'title' => 'BRUT TOPLAM','','', 'value' => number_format($total, 2,",",".") );?>
								<?php $row[] = array('type' => 'row', 'title' => 'INDIRIM','','', 'value' => number_format(array_sum($discount), 2,",",".") );?>
								<?php $row[] = array('type' => 'bold_row', 'title' => 'NET TOPLAM','','', 'value' => number_format(($total - array_sum($discount)), 2,",",".") );?>
							</div> <br /><br /><br />
							<div style="clear:both; border-bottom:1px solid #000;"></div>
						</div>
						
					</div>
					</div>
					
					
					</div>
				</div>

			  </div>
			</div>
			
		</div>
	</div>
	
</div>

<div class="hidden repxx">
		<div class="repp">
			<?php $row2[] = array('print_type' => 'report');?>
			<?php $row2[] = array('type' => 'header', 'title' => 'Posopos');?>
			<?php $row2[] = array('type' => 'header', 'title' => 'Özet Rapor');?>
			<?php $row2[] = array('type' => 'line', 'title' => '------'.date('d-m-Y H:i', $day['day_start_time']).' - '.date('d-m-Y H:i', $day['day_end_time']).'------');?>
			<?php $row2[] = array('type' => 'line', 'title' => '------------------------------------------------');?>
			<?php $row2[] = array('type' => 'header', 'title' => 'Gelirler');?>
			
			<?php if(array_sum($cash) > 0){ ?>
			<?php $row2[] = array('type' => 'row', 'title' => 'Nakit', 'value' => number_format(array_sum($cash), 2,",","."));?>
			<?php } ?>
			<?php if(array_sum($credit) > 0){ ?>
			<?php $row2[] = array('type' => 'row', 'title' => 'Kredi Kartları Toplam', 'value' => number_format(array_sum($credit), 2,",","."));?>
			<?php } ?>
			<?php if(!empty($credit_subPayments)){ ?>
				<?php foreach($credit_subPayments as $key => $val){ ?>
					<?php $row2[] = array('type' => 'row', 'title' => $val['payment_subname'], 'value' => number_format($val['total']['paid_price'], 2,",","."));?>
				<?php } ?>
			<?php } ?>
			<?php if(array_sum($mealCard) > 0){ ?>
				<?php $row2[] = array('type' => 'row', 'title' => 'Yemek Kartlari Toplam', 'value' => number_format(array_sum($mealCard), 2,",","."));?>
			<?php } ?>
			<?php if(!empty($mealcard_subPayments)){ ?>
				<?php foreach($mealcard_subPayments as $key => $val){ ?>
					<?php $row2[] = array('type' => 'row', 'title' => $val['payment_subname'], 'value' => number_format($val['total']['paid_price'], 2,",","."));?>
				<?php } ?>
			<?php } ?>
			<?php if(array_sum($open) > 0){ ?>
				<?php $row2[] = array('type' => 'row', 'title' => 'Açık Hesap', 'value' => number_format(array_sum($open), 2,",","."));?>
			<?php } ?>
			<?php $row2[] = array('type' => 'bold_row', 'title' => 'Genel Toplam', 'value' => number_format(($total - array_sum($discount)), 2,",","."));?>
			<?php $row2[] = array('type' => 'line', 'title' => '------------------------------------------------');?>
			<?php $row2[] = array('type' => 'header', 'title' => 'Ciroya Yansımayanlar');?>
			<?php $row2[] = array('type' => 'row', 'title' => 'İptaller Toplamı','','', 'value' => number_format(($iptal), 2,",","."));?>
			<?php $row2[] = array('type' => 'row', 'title' => 'İndirimler Toplamı','','', 'value' => number_format(array_sum($discount), 2,",","."));?>
			<?php $row2[] = array('type' => 'row', 'title' => 'İkramlar Toplamı','','', 'value' => number_format(($ikram), 2,",","."));?>
			<?php $row2[] = array('type' => 'line', 'title' => '------------------------------------------------');?>
			<?php $row2[] = array('type' => 'header', 'title' => 'Adisyon & Ciro Derinligi');?>
			<?php $row2[] = array('type' => 'row', 'title' => 'Adisyon Sayısı','','', 'value' => count($list) );?>
			<?php $row2[] = array('type' => 'row', 'title' => 'Ciro / Adisyon','','', 'value' => number_format((float)$rate, 2,",",".") );?>
			<?php $row2[] = array('type' => 'row', 'title' => 'Kişi Sayısı','','', 'value' => array_sum($people) );?>
			<?php $row2[] = array('type' => 'row', 'title' => 'Ciro / Kişi','','', 'value' => number_format((float)$rate2, 2,",",".") );?>
			<?php $row2[] = array('type' => 'line', 'title' => '------------------------------------------------');?>
			<?php $row2[] = array('type' => 'row', 'title' => 'BRUT TOPLAM','','', 'value' => number_format($total, 2,",",".") );?>
			<?php $row2[] = array('type' => 'row', 'title' => 'INDIRIM','','', 'value' => number_format(array_sum($discount), 2,",",".") );?>
			<?php $row2[] = array('type' => 'bold_row', 'title' => 'NET TOPLAM','','', 'value' => number_format(($total - array_sum($discount)), 2,",",".") );?>
		</div>
	</div>

<input type="hidden" class="reportDetail" value='<?php echo json_encode($row);?>' />
<input type="hidden" class="reportDetail2" value='<?php echo json_encode($row2);?>' />
<input type="hidden" class="noPro" value="0" />
<!-- Modal -->
<div id="orderModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Adisyon Detayları</h4>
      </div>
      <div class="modal-body">
        <div class="adisResp"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
      </div>
    </div>

  </div>
</div>
<?php include('includes/footer-order.php');?>
<script type="text/javascript">
	$(".details").click(function(){
		$(".dn").slideToggle();
	});
	$(".dayEndPost").click(function(){
		var day_id = $(this).attr("day_id");
		$.ajax({
			type : 'get',
			url : '<?php echo DAY_END_POST;?>'+day_id,
			success : function(response){
				if(response == 'success'){
					swal(
					  'Başarılı!',
					  '<div>Gün sonu yapılmıştır!</div>',
					  'success'
					);
				}else{
					swal(
					  '',
					  '<div>'+response+'</div>',
					  'error'
					);
				}
			}
		});
	});
$(".dayEndPrint").click(function(){
	printDiv('printDiv1');
});	
$(".dayEndPrint2").click(function(){
	printDiv('printDiv2');
});	

$(document).on("click", ".prShow", function(){
	$('.prrx').toggleClass("hidden");
	
	var noPro = $(".noPro").val();
	
	if(noPro == '1'){
		$(".noPro").val('0');
	}else{
		$(".noPro").val('1');
	}
	
});

function printDiv(divID) 
{

  var divToPrint=document.getElementById(divID);

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html>\
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">\
  <style type="text/css">\
  body{font-size:13px;font-family:Arial;padding:10px; margin:0;}\
  #cartDiv{border-top:1px solid #666;border-bottom:1px solid #666;}\
  table tr td{font-size:13px}\
  input{border:0;background:#fff; width:40px;}\
  .hidePrint{display:none;}\
  .rightPrint{display:inline-block; float:right;}\
  .enjoyTxt{margin-top:85px;}\
  .clearfix{clear:both;}\
  td{padding-right:0; padding-left:0;}\
  .showKitchen{display:none;}\
  </style>\
  <body  onload="window.print();">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);

}

$(document).on("click", ".ordDetails", function(){
	var order_id = $(this).attr("order_id");
	$('#orderModal').modal('show');
	
	$.ajax({
		type : 'post',
		url : '<?php echo GET_ORDER_DETAILS;?>',
		data : {"order_id" : order_id},
		success : function(response){
			$(".adisResp").html(response);
		}
	});
	
});

$(".dayEndPrint2xx").click(function(){
	
	var htmlBody = $(".htmlBody").html();
	var printer_ip = $(".printer").val();
	var printer_type = $('option:selected', '.printer').attr('ptype');
	var reportDetail = $('.reportDetail').val();
	var reportDetail2 = $('.reportDetail2').val();
	var noPro = $('.noPro').val();
	
	if(noPro == '1'){
		reportDetail = reportDetail2;
	}
	
	$.ajax({
		type : "post",
		url : "<?php echo SEND_TO_PRINTER_REPORT;?>",
		data : { "htmlBody" : htmlBody , "printer" : printer_ip, "printer_type" : printer_type, "reportDetail" : reportDetail},
		success : function(response){
			console.log(response);
		}
	});
	
	
});

$(".pastDays").change(function(){
	var dayid = $(this).val();
	
	if( dayid != '' ){
		window.location.href = '<?php echo OPEN_DAY_DETAIL_PAGE;?>'+dayid;
	} 
	
});


</script>
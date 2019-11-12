			<div class="" style="">
				<div class="row dn" style="display:none;">
					<?php foreach($payments as $key => $val){ ?>
						<?php 
							if($val['payment_type'] == 'cash'){ $cash[] = $val['paid_price']; $type = 'Nakit';} 
							if($val['payment_type'] == 'credit'){ $credit[] = $val['paid_price']; $type = 'Kredi Kartı';} 
							if($val['payment_type'] == 'open'){ $open[] = $val['paid_price']; $type = 'Açık Hesap';} 
							if($val['payment_type'] == 'out'){ $out[] = $val['paid_price']; $type = 'Masraf';} 
							if($val['payment_type'] == 'discount'){ $discount[] = $val['paid_price']; $type = 'İndirim';} 
							if($val['payment_type'] == 'mealCard'){ $mealCard[] = $val['paid_price']; $type = 'Yemek Kartı';} 
						?>
						<?php $total += $val['paid_price'];?>
						
					<?php } ?>
					<?php foreach($list as $key => $val){ 
							$people[] = $val['person'];
						 }
					 ?>		 
				</div>
				<?php $ccash = array_sum($cash);?> 
				<?php $ccredit = array_sum($credit);?> 
				<?php $copen = array_sum($open);?> 
				<?php $cmeal = array_sum($mealCard);?> 
				<?php //array_sum($out);?>  <br/>
				<?php $cdisc = array_sum($discount);?> 
				<?php $total = $ccash + $ccredit + $copen + $cmeal;?> 
				<div class="row" style="margin:20px 0 0 0;" >
				<?php //echo '<pre>'; print_r($people);?>
				<?php //debug($mealcard_subPayments);?>
					<div class="col-xs-12">
						<div class="row rowT">
							<div class="col-sm-6">
							<div class="boxT1" style="background:#e74c3c; color:#fff;">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-line-chart fa-3x"></i>
									</div>
									<div class="col-xs-9">
										<div class="text-right">
										<?php $ttx5 =  number_format(  ($total - array_sum($discount)) ,2,",","." ) ;?>
											<span class="priceS <?php if( strlen($ttx5) > 8 ){ echo 'f24'; }else{ echo 'f30'; }?>">
												<?php echo $ttx5;?>
											</span> 
											<span>₺</span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<div class="text-right"><span><b>Toplam Net Satış</b></span></div>
										<div class="text-right"><span><b class="f13" style="color:#000;">İndirim, iade ve iptaller hariçtir</b></span></div>
									</div>
								</div>
							</div>
							<div class="boxT1" style="background:#58c49e;color:#fff;">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-money fa-3x"></i>
									</div>
									<div class="col-xs-9">
										<div class="text-right">
										<?php $ttx =  number_format( array_sum($cash) ,2,",","." ) ;?>
											<span class="priceS <?php if( strlen($ttx) > 8 ){ echo 'f24'; }else{ echo 'f30'; }?>">
												<?php echo $ttx;?>
											</span> 
											<span>₺</span>
										</div>
										<div class="text-right"><span><b>Nakit</b></span></div>
									</div>
								</div>
							</div>
							<div class="boxT1" style="background:#666666;color:#fff;">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-credit-card-alt fa-3x"></i>
									</div>
									<div class="col-xs-9">
										<div class="text-right">
										<?php $ttx1 =  number_format( array_sum($credit) ,2,",","." ) ;?>
											<span class="priceS <?php if( strlen($ttx1) > 8 ){ echo 'f24'; }else{ echo 'f30'; }?>">
												<?php echo $ttx1;?>
											</span> 
											<span>₺</span>
										</div>
										<div class="text-right"><span><b>Kredi Kartları Toplam</b></span></div>
									</div>
								</div>
							</div>
							<div class="boxT1" style="background:#43abcc;color:#fff;">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-credit-card fa-3x"></i>
									</div>
									<div class="col-xs-9">
										<div class="text-right">
										<?php $ttx2 =  number_format( array_sum($mealCard) ,2,",","." ) ;?>
											<span class="priceS <?php if( strlen($ttx2) > 8 ){ echo 'f24'; }else{ echo 'f30'; }?>">
												<?php echo $ttx2;?>
											</span> 
											<span>₺</span>
										</div>
										<div class="text-right"><span><b>Yemek Kartı</b></span></div>
									</div>
								</div>
							</div>
							<div class="boxT1" style="background:#886650;color:#fff;">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-pencil-square fa-3x"></i>
									</div>
									<div class="col-xs-9">
										<div class="text-right">
										<?php $ttx3 =  number_format( array_sum($open) ,2,",","." ) ;?>
											<span class="priceS <?php if( strlen($ttx3) > 8 ){ echo 'f24'; }else{ echo 'f30'; }?>">
												<?php echo $ttx3;?>
											</span> 
											<span>₺</span>
										</div>
										<div class="text-right"><span><b>Açık Hesap</b></span></div>
									</div>
								</div>
							</div>
							<?php $rate = ( $total / (count($list)) );?>
							<div class="boxT1" style="background:#7f3f98;color:#fff;">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-pie-chart fa-3x"></i>
									</div>
									<div class="col-xs-9">
										<div class="text-right">
										<?php $ttx4 =  number_format( $rate ,2,",","." ) ;?>
											<span class="priceS <?php if( strlen($ttx4) > 8 ){ echo 'f24'; }else{ echo 'f30'; }?>">
												<?php echo $ttx4;?>
											</span> 
											<span>₺</span>
										</div>
										<div class="text-right"><span><b>Toplam Satış / Masa (<?php echo count($list);?>)</b></span></div>
									</div>
								</div>
							</div>
							
							
							<div class="clearfix"></div>
							
							<div style="margin-top:25px; padding-bottom:15px;">
								<div style="border-bottom:1px solid #ddd;padding-bottom:7px; margin-bottom:10px;"><b class="f16">Finansal İstatistikler</b></div>
							</div>
							
							<div class="bestSellers">
								<div class="row">
									<?php echo '<div class="col-xs-6"><b>Nakit</b></div>  <div class="col-xs-6 text-right">'.number_format(array_sum($cash), 2, ",",".").' ₺</div>';?> 
								</div>
							</div>
							<div class="bestSellers">
								<div class="row">
									<?php echo '<div class="col-xs-6"><b>Kredi Kartları Toplam</b></div>  <div class="col-xs-6 text-right">'.number_format(array_sum($credit), 2, ",",".").' ₺</div>';?> 
								</div>
							</div>
							<?php if(!empty($credit_subPayments)){ ?>
								<?php foreach($credit_subPayments as $key => $val){ ?>
									<div class="bestSellers">
										<div class="row">
											<?php echo '<div class="col-xs-6">'.$val['payment_subname'].'</div>  <div class="col-xs-6 text-right">'.number_format($val['total']['paid_price'], 2, ",",".").' ₺</div>';?> 
										</div>
									</div>
								<?php } ?>
							<?php } ?>
							<div class="bestSellers">
								<div class="row">
									<?php echo '<div class="col-xs-6"><b>Yemek Kartı</b></div>  <div class="col-xs-6 text-right">'.number_format(array_sum($mealCard), 2, ",",".").' ₺</div>';?> 
								</div>
							</div>
							<?php if(!empty($mealcard_subPayments)){ ?>
								<?php foreach($mealcard_subPayments as $key => $val){ ?>
									<div class="bestSellers">
										<div class="row">
											<?php echo '<div class="col-xs-6">'.$val['payment_subname'].'</div>  <div class="col-xs-6 text-right">'.number_format($val['total']['paid_price'], 2, ",",".").' ₺</div>';?> 
										</div>
									</div>
								<?php } ?>
							<?php } ?> 
							<div class="bestSellers">
								<div class="row">
									<?php echo '<div class="col-xs-6"><b>Açık Hesap</b></div>  <div class="col-xs-6 text-right">'.number_format(array_sum($open), 2, ",",".").' ₺</div>';?> 
								</div>
							</div>
							
							<div class="bestSellers">
								<div class="row">
									<?php echo '<div class="col-xs-6"><b>Toplam Net Satış</b></div>  <div class="col-xs-6 text-right">'.$ttx5.' ₺</div>';?> 
								</div>
							</div>
							
							<div style="margin-top:25px; padding-bottom:15px;">
								<div style="border-bottom:1px solid #ddd;padding-bottom:7px; margin-bottom:10px;"><b class="f16">Ciroya Yansımayan İstatistikler</b></div>
							</div>
							
							<div class="bestSellers">
								<div class="row">
									<?php echo '<div class="col-xs-6"><b>İptaller Toplamı</b></div>  <div class="col-xs-6 text-right">'.number_format(($iptal), 2, ",",".").' ₺</div>';?> 
								</div>
							</div>
							<div class="bestSellers">
								<div class="row">
									<?php echo '<div class="col-xs-6"><b>İndirimler Toplamı</b></div>  <div class="col-xs-6 text-right">'.number_format(array_sum($discount), 2, ",",".").' ₺</div>';?> 
								</div>
							</div>
							<div class="bestSellers">
								<div class="row">
									<?php echo '<div class="col-xs-6"><b>İkramlar Toplamı</b></div>  <div class="col-xs-6 text-right">'.number_format(($ikram), 2, ",",".").' ₺</div>';?> 
								</div>
							</div>
							 
								<a href="javascript:;" class="w100 text-center butonX1 showxModal">ÖZET RAPOR YAZDIR</a>
							
								
							</div>
							<div class="col-sm-6">
							
							<div class="bestWrapper">
								<div style="border-bottom:1px solid #ddd;padding-bottom:7px; margin-bottom:10px;"><b class="f16">En Çok Satan 10 Ürün </b></div>
								<div>
									<?php foreach($most as $key => $val){ ?>
										<div class="bestSellers">
											<?php echo '<span><b>'.($key+1).'</b></span>. '.$val['pro_name'].' <span class="pull-right">'.$val['c'].' Adet</span>';?> 
										</div>
									<?php } ?>
								</div>
							</div>
							
							<div style="margin-top:25px; padding-bottom:15px;">
								<div style="border-bottom:1px solid #ddd;padding-bottom:7px; margin-bottom:10px;"><b class="f16">Kategori Bazında Satış İstatistikleri </b></div>
							</div>
							
							<div>
								<?php foreach($list2 as $key => $val){ ?>
									<div class="bestSellers">
										<div class="row">
											<?php echo '<div class="col-xs-4"><b>'.($key+1).'</b>. '.$val['cat_name'].'</div> <div class="col-xs-4 text-center">%'.number_format((float)(($val['total'] / $total) * 100 ), 2, ",",".").' </div>  <div class="col-xs-4 text-right">'.number_format((float)$val['total'], 2, ",",".").' ₺</div>';?> 
										</div>
									</div>
								<?php } ?>
								<div class="bestSellers">
									<?php echo '<span><b>TOPLAM</b></span><span class="pull-right">'.number_format((float)$total, 2, ",",".").' ₺</span>';?> 
								</div>
								
								<div style="clear:both;"></div>
							</div>
							
							</div>
						</div>
						
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
														<?php echo $vv['total_price'];?>
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
													<b><?php echo $val['cash']['paid_price'];?></b>
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
													<b><?php echo $val['credit']['paid_price'];?></b>
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
													<b><?php echo $val['mealCard']['paid_price'];?></b>
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
													<b><?php echo $val['open']['paid_price'];?></b>
												</div>
											</div>
										<?php } ?>
									
								<?php } ?>
								<div class="text-right" style="padding:20px;">
									<b>Toplam : <?php echo $total;?> ₺</b> <br />
								
									<b>Nakit : <?php echo array_sum($cash);?>  ₺</b> <br />
									<b>Kredi Kartı : <?php echo array_sum($credit);?>  ₺</b> <br />
									<b>Yemek Kartı : <?php echo array_sum($mealCard);?>  ₺</b> <br />
									<b>Açık Hesap : <?php echo array_sum($open);?>  ₺</b> <br />
									<b>İndirim : <?php echo array_sum($discount);?>  ₺</b> <br />
								</div>
								</div>
							</div>
						</div>
						
						<div class="container hidden" id="printDiv2_">
							<div>Bulut Kasa</div>
							<div>Ay Sonu Raporu</div>
							<div>
								<?php echo date('d-m-Y H:i', $day['day_start_time']) .' - '.date('d-m-Y H:i', time()) ;?>
							</div>
							<div style="text-align:center; border-bottom:1px dashed #000; padding-bottom:15px; margin-bottom:15px;">
								<strong>Satışlar</strong>
							</div>
							<div>
								<span style="float:left;display:inline-block;">TOPLAM SATIŞ</span>
								<span style="float:right;display:inline-block;"> <?php echo number_format((float)$total, 2, ",",".");?> ₺</span>
								<div style="clear:both;"></div>
							</div>
							
							<div style="text-align:center;margin-top:25px;border-bottom:1px dashed #000; padding-bottom:15px; margin-bottom:15px;">
								<strong>Gelirler</strong>
							</div>
							<div>
								<span style="float:left;display:inline-block;">Nakit</span>
								<span style="float:right;display:inline-block;"> <?php echo number_format((float)array_sum($cash), 2, ",",".");?> ₺</span>
								<div style="clear:both;"></div>
							</div>
							<div>
								<span style="float:left;display:inline-block;">Kredi Kartı</span>
								<span style="float:right;display:inline-block;"> <?php echo number_format((float)array_sum($credit), 2, ",",".");?> ₺</span>
								<div style="clear:both;"></div>
							</div>
							<div>
								<span style="float:left;display:inline-block;">Yemek Çeki</span>
								<span style="float:right;display:inline-block;"> <?php echo number_format((float)array_sum($mealCard), 2, ",",".");?> ₺</span>
								<div style="clear:both;"></div>
							</div>
							<div>
								<span style="float:left;display:inline-block;">Açık Hesap</span>
								<span style="float:right;display:inline-block;"> <?php echo number_format((float)array_sum($open), 2, ",",".");?> ₺</span>
								<div style="clear:both;"></div>
							</div>
							<div>
								<span style="float:left;display:inline-block;">Toplam Genel</span>
								<span style="float:right;display:inline-block;"> <?php echo number_format((float)$total, 2, ",",".");?> ₺</span>
								<div style="clear:both;"></div>
							</div>
							
							<div style="text-align:center;margin-top:25px;border-bottom:1px dashed #000; padding-bottom:15px; margin-bottom:15px;">
								<strong>Genel Bilgiler</strong>
							</div>
							<div>
								<span style="float:left;display:inline-block;">İptaller Toplamı</span>
								<span style="float:right;display:inline-block;"> <?php echo number_format(($iptal), 2, ",",".");?> ₺</span>
								<div style="clear:both;"></div>
							</div>
							<div>
								<span style="float:left;display:inline-block;">İndirimler Toplamı</span>
								<span style="float:right;display:inline-block;"> <?php echo number_format(array_sum($discount), 2, ",",".");?> ₺</span>
								<div style="clear:both;"></div>
							</div>
							<div>
								<span style="float:left;display:inline-block;">İkramlar Toplamı</span>
								<span style="float:right;display:inline-block;"> <?php echo number_format(($ikram), 2, ",",".");?> ₺</span>
								<div style="clear:both;"></div>
							</div>
							<div>
								<span style="float:left;display:inline-block;">Adisyon Sayısı</span>
								<span style="float:right;display:inline-block;"> <?php echo count($list);?></span>
								<div style="clear:both;"></div>
							</div>
							<div>
								<span style="float:left;display:inline-block;">Ciro / Adisyon</span>
								<?php $rate = ( $total / (count($list)) );?>
								<span style="float:right;display:inline-block;"> <?php echo number_format((float)$rate, 2, ",",".");?> ₺</span>
								<div style="clear:both;"></div>
							</div>
							
							<div class="prrx">
								<div style="text-align:center;margin-top:25px;border-bottom:1px dashed #000; padding-bottom:15px; margin-bottom:15px;">
									<strong>Ürün Satışları</strong>
								</div>
								
								<div>
									<table width="100%">
										<?php foreach($list2 as $key => $val){ ?>
											<tr>
												<td><span style="float:left;display:inline-block;"><?php echo $val['cat_name'];?></span></td>
												<td>% <?php echo number_format((float)(($val['total'] / $total) * 100 ), 2, ",",".");?></td>
												<td><span style="float:right;display:inline-block;"> <?php echo number_format((float)$val['total'], 2, ",",".");?> ₺</span></td>
											</tr>
										<?php } ?>
										<tr>
											<td><span style="float:left;display:inline-block;">TOPLAM</span></td>
											<td></td>
											<td><span style="float:right;display:inline-block;"> <?php echo number_format((float)$total, 2, ",",".");?> ₺</span></td>
										</tr>
									</table>
									<div style="clear:both;"></div>
								</div>
							</div>
							
						</div>
						
					</div>
			<div class="clearfix"></div>
			</div>

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
								<option ptype="<?php echo $val['printer_type'];?>"  value="<?php echo $val['printer_ip'];?>"><?php echo $val['printer_name'];?></option>
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
		
				<div class="">
				
					<div>Posopos</div>
					<div>Özet Raporu</div>
					<?php $row[] = array('print_type' => 'report');?>
					<?php $row[] = array('type' => 'header', 'title' => 'Posopos');?>
					<?php $row[] = array('type' => 'header', 'title' => 'Özet Rapor');?>
					<div>
						<?php echo date('d-m-Y H:i', $day['day_start_time']) .' - '.date('d-m-Y H:i', $day['day_end_time']) ;?> 
						<?php $row[] = array('type' => 'header', 'title' => date('d-m-Y H:i', $day['day_start_time']) .' - '.date('d-m-Y H:i', $day['day_end_time']));?>
					</div>
					
					<div style="text-align:center;margin-top:25px;border-bottom:1px dashed #000; padding-bottom:15px; margin-bottom:15px;">
						<strong>Gelirler</strong>
						
						<?php $row[] = array('type' => 'header', 'title' => 'Gelirler');?>
					</div>
					<?php if(array_sum($cash) > 0){ ?>
						<div>
							<span style="float:left;display:inline-block;font-weight:bold;">Nakit</span>
							<span style="float:right;display:inline-block;"> <?php echo number_format(array_sum($cash), 2,",",".");?> ₺</span>
							<div style="clear:both;"></div>
						</div>
						<?php $row[] = array('type' => 'row', 'title' => 'Nakit', 'value' => number_format(array_sum($cash), 2,",",".").' ₺');?>
					<?php } ?>
					<?php if(array_sum($credit) > 0){ ?>
						<div>
							<span style="float:left;display:inline-block;font-weight:bold;">Kredi Kartları Toplam</span>
							<span style="float:right;display:inline-block;"> <?php echo number_format(array_sum($credit), 2,",",".");?> ₺</span>
							<div style="clear:both;"></div>
						</div>
						<?php $row[] = array('type' => 'row', 'title' => 'Kredi Kartları Toplam', 'value' => number_format(array_sum($credit), 2,",",".").' ₺');?>
					<?php } ?>
					<?php if(!empty($credit_subPayments)){ ?>
						<?php foreach($credit_subPayments as $key => $val){ ?>
							<div class="bestSellers">
								<div class="row">
									<?php echo '<div class="col-xs-6">'.$val['payment_subname'].'</div>  <div class="col-xs-6 text-right">'.number_format($val['total']['paid_price'], 2,",",".").' ₺</div>';?> 
								</div>
							</div>
							<?php $row[] = array('type' => 'row', 'title' => $val['payment_subname'], 'value' => number_format($val['total']['paid_price'], 2,",",".").' ₺');?>
						<?php } ?>
					<?php } ?>
					<?php if(array_sum($mealCard) > 0){ ?>
						<div>
							<span style="float:left;display:inline-block;font-weight:bold;">Yemek Kartları Toplam</span>
							<span style="float:right;display:inline-block;"> <?php echo number_format((float)array_sum($mealCard), 2,",",".");?> ₺</span>
							<div style="clear:both;"></div>
						</div>
						<?php $row[] = array('type' => 'row', 'title' => 'Yemek Kartları Toplam', 'value' => number_format(array_sum($mealCard), 2,",",".").' ₺');?>
					<?php } ?>
					<?php if(!empty($mealcard_subPayments)){ ?>
						<?php foreach($mealcard_subPayments as $key => $val){ ?>
							<div class="bestSellers">
								<div class="row">
									<?php echo '<div class="col-xs-6">'.$val['payment_subname'].'</div>  <div class="col-xs-6 text-right">'.number_format($val['total']['paid_price'], 2,",",".").' ₺</div>';?> 
								</div>
							</div>
							<?php $row[] = array('type' => 'row', 'title' => $val['payment_subname'], 'value' => number_format($val['total']['paid_price'], 2,",",".").' ₺');?>
						<?php } ?>
					<?php } ?>
					<?php if(array_sum($open) > 0){ ?>
						<div>
							<span style="float:left;display:inline-block;">Açık Hesap</span> 
							<span style="float:right;display:inline-block;"> <?php echo number_format(array_sum($open), 2,",",".");?> ₺</span>
							<div style="clear:both;"></div>
						</div>
						<?php $row[] = array('type' => 'row', 'title' => 'Açık Hesap', 'value' => number_format(array_sum($open), 2,",",".").' ₺');?>
					<?php } ?>
					<div>
						<span style="float:left;display:inline-block;font-weight:bold;">Toplam Genel</span>
						<span style="float:right;display:inline-block;"> <?php echo number_format(($total - array_sum($discount)), 2,",",".");?> ₺</span>
						<div style="clear:both;"></div>
					</div>
					<?php $row[] = array('type' => 'row', 'title' => 'Toplam Genel', 'value' => number_format(($total - array_sum($discount)), 2,",",".").' ₺');?>
					<div style="text-align:center;margin-top:25px;border-bottom:1px dashed #000; padding-bottom:15px; margin-bottom:15px;">
						<strong>Ciroya Yansımayan İşlemler</strong>
						<?php $row[] = array('type' => 'header', 'title' => 'Ciroya Yansımayan İşlemler');?>
					</div>
					<div>
						<span style="float:left;display:inline-block;">İptaller Toplamı</span>
						<span style="float:right;display:inline-block;"> <?php echo number_format($iptal, 2,",",".");?> ₺</span>
						<?php $row[] = array('type' => 'row', 'title' => 'İptaller Toplamı','','', 'value' => number_format(($iptal), 2,",",".").' ₺');?>
						<div style="clear:both;"></div>
					</div>
					<div>
						<span style="float:left;display:inline-block;">İndirimler Toplamı</span>
						<span style="float:right;display:inline-block;"> <?php echo number_format(array_sum($discount), 2,",",".");?> ₺</span>
						<div style="clear:both;"></div>
						<?php $row[] = array('type' => 'row', 'title' => 'İndirimler Toplamı','','', 'value' => number_format(array_sum($discount), 2,",",".").' ₺');?>
					</div>
					<div>
						<span style="float:left;display:inline-block;">İkramlar Toplamı</span>
						<span style="float:right;display:inline-block;"> <?php echo number_format($ikram, 2,",",".");?> ₺</span>
						<div style="clear:both;"></div>
						<?php $row[] = array('type' => 'row', 'title' => 'İkramlar Toplamı','','', 'value' => number_format(($ikram), 2,",",".").' ₺');?>
					</div>
					
					
					<div style="text-align:center;margin-top:25px;border-bottom:1px dashed #000; padding-bottom:15px; margin-bottom:15px;">
						<strong>Adisyon & Kişi Başı Ciro Derinliği</strong>
						<?php $row[] = array('type' => 'header', 'title' => 'Adisyon & Kişi Başı Ciro Derinliği');?>
					</div>
					<div>
						<span style="float:left;display:inline-block;">Adisyon Sayısı</span>
						<span style="float:right;display:inline-block;"> <?php echo count($list);?></span>
						<div style="clear:both;"></div>
						<?php $row[] = array('type' => 'row', 'title' => 'Adisyon Sayısı','','', 'value' => count($list) );?>
					</div>
					<div>
						<span style="float:left;display:inline-block;">Ciro / Adisyon</span>
						<?php $rate = ( ($total - array_sum($discount)) / (count($list)) );?>
						<span style="float:right;display:inline-block;"> <?php echo number_format((float)$rate, 2,",",".");?> ₺</span>
						<div style="clear:both;"></div>
						<?php $row[] = array('type' => 'row', 'title' => 'Ciro / Adisyon','','', 'value' => number_format((float)$rate, 2,",",".").' ₺' );?>
					</div>
					<div>
						<span style="float:left;display:inline-block;">Kişi Sayısı</span>
						<span style="float:right;display:inline-block;"> <?php echo array_sum($people);?></span>
						<div style="clear:both;"></div>
						<?php $row[] = array('type' => 'row', 'title' => 'Kişi Sayısı','','', 'value' => array_sum($people) );?>
					</div>
					<div>
						<span style="float:left;display:inline-block;">Ciro / Kişi.</span>
							<?php if(array_sum($people) > 0){ ?>
								<?php $rate2 = ( ($total - array_sum($discount)) / (array_sum($people)) );?>
							<?php }else{ ?>
								<?php $rate2 = 0;?>
							<?php } ?>
						<span style="float:right;display:inline-block;"> <?php echo number_format($rate2, 2,",",".");?> ₺</span>
						<div style="clear:both;"></div>
						<?php $row[] = array('type' => 'row', 'title' => 'Ciro / Kişi','','', 'value' => number_format((float)$rate2, 2,",",".").' ₺' );?>
					</div>
					<div class="prrx">
							<div style="text-align:center;margin-top:25px;border-bottom:1px dashed #000; padding-bottom:15px; margin-bottom:15px;">
								<h2 style="font-weight:bold;">Ürün Satışları</h2>
							</div>
							<?php $row[] = array('type' => 'header', 'title' => 'Ürün Satışları');?>
							<div>
								<div class="">
										<div class="row" style="margin-bottom:15px;">
											<div class="col-xs-4"><b>Ürün Adı</b></div>
											<div class="col-xs-2"><b>Adet</b></div>
											<div class="col-xs-2"><b>%</b></div>
											<div class="col-xs-4 text-right"><b>Tutar</b></div>
											<?php $row[] = array('type' => 'tableCell', 'cell1' => 'Ürün Adı', 'cell2' => 'Adet', 'cell3' => 'Yüzde', 'cell4' => 'Tutar' );?>
										</div>
									<?php foreach($proList as $key => $val){ ?>
										<div class="row">
											<div class="col-xs-6"><span style="float:left;display:inline-block;"><?php echo $val['pro_name'];?></span></div>
											<div class="col-xs-2" style="white-space:nowrap;"><?php echo $val['count'];?></div>
											<div class="col-xs-2" style="white-space:nowrap;">% <?php echo number_format((float)((($val['tot_price']) / $total) * 100 ), 2,",",".");?></div>
											<div class="col-xs-2"><span style="float:right;display:inline-block;"> <?php echo number_format((float)($val['tot_price']), 2,",",".");?> ₺</span></div>
										</div>
										<?php $row[] = array('type' => 'tableCell', 'cell1' => str_replace("'"," ",$val['pro_name']), 'cell2' => ($val['count']), 'cell3' => number_format((float)((($val['tot_price']) / $total) * 100 ), 2,",","."), 'cell4' => number_format((float)($val['tot_price']), 2,",",".") );?>
										<?php //$ttt += ($val['price']*$val['count']);?>
									<?php } ?>
								</div>
								<div style="clear:both;"></div>
							</div>
						<div style="text-align:center;margin-top:25px;border-bottom:1px dashed #000; padding-bottom:15px; margin-bottom:15px;">
							<strong>Ürün Satışları (Grup Bazında)</strong>
							<?php $row[] = array('type' => 'header', 'title' => 'Ürün Satışları (Grup Bazında)');?>
						</div>
						<div>
							<table width="100%">
								<?php foreach($list2 as $key => $val){ ?>
									<tr>
										<td><span style="float:left;display:inline-block;"><?php echo $val['cat_name'];?></span></td>
										<td>% <?php echo number_format((float)(($val['total'] / $total) * 100 ), 2,",",".");?></td>
										<td><span style="float:right;display:inline-block;"> <?php echo number_format((float)$val['total'], 2,",",".");?> ₺</span></td>
									</tr>
									<?php $row[] = array('type' => 'tableCell2', 'cell1' => $val['cat_name'], 'cell2' => number_format((float)(($val['total'] / $total) * 100 ), 2,",","."), 'cell3' => number_format((float)$val['total'], 2,",",".").' ₺' );?>
								<?php } ?>
								<tr> 
									<td><span style="float:left;display:inline-block;">İndirim</span></td>
									<td>% <?php echo number_format( ( ( array_sum($discount) / $total ) * 100  ) , 2,",",".");?></td>
									<td><span style="float:right;display:inline-block;"> <?php echo number_format(array_sum($discount), 2,",",".");?> ₺</span></td>
									<?php $row[] = array('type' => 'tableCell2', 'cell1' => 'İndirim', 'cell2' => number_format( ( ( array_sum($discount) / $total ) * 100  ) , 2,",","."), 'cell3' => number_format(array_sum($discount), 2,",",".").' ₺' );?>
								</tr>
								<tr>
									<td><span style="float:left;display:inline-block;">TOPLAM</span></td>
									<td></td>
									<td><span style="float:right;display:inline-block;"> <?php echo number_format($total - array_sum($discount), 2,",",".");?> ₺</span></td>
								</tr>
								<?php $row[] = array('type' => 'bold_row', 'title' => 'TOPLAM','','', 'value' => number_format($total - array_sum($discount), 2,",",".") );?>
							</table>
							<div style="clear:both;"></div>
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
			<?php $row2[] = array('type' => 'header', 'title' => date('d-m-Y H:i', $day['day_start_time']) .' - '.date('d-m-Y H:i', time()));?>
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
				<?php $row2[] = array('type' => 'row', 'title' => 'Yemek Kartları Toplam', 'value' => number_format(array_sum($mealCard), 2,",","."));?>
			<?php } ?>
			<?php if(!empty($mealcard_subPayments)){ ?>
				<?php foreach($mealcard_subPayments as $key => $val){ ?>
					<?php $row2[] = array('type' => 'row', 'title' => $val['payment_subname'], 'value' => number_format($val['total']['paid_price'], 2,",","."));?>
				<?php } ?>
			<?php } ?>
			<?php if(array_sum($open) > 0){ ?>
				<?php $row2[] = array('type' => 'row', 'title' => 'Açık Hesap', 'value' => number_format(array_sum($open), 2,",","."));?>
			<?php } ?>
			<?php $row2[] = array('type' => 'row', 'title' => 'Toplam Genel', 'value' => number_format(($total - array_sum($discount)), 2,",","."));?>
			<?php $row2[] = array('type' => 'header', 'title' => 'Ciroya Yansımayan İşlemler');?>
			<?php $row2[] = array('type' => 'row', 'title' => 'İptaller Toplamı','','', 'value' => number_format($iptal, 2,",","."), 2,",",".");?>
			<?php $row2[] = array('type' => 'row', 'title' => 'İndirimler Toplamı','','', 'value' => number_format(array_sum($discount), 2,",","."));?>
			<?php $row2[] = array('type' => 'row', 'title' => 'İkramlar Toplamı','','', 'value' => number_format(array_sum($ikram), 2,",","."));?>
			<?php $row2[] = array('type' => 'header', 'title' => 'Adisyon & Kişi Başı Ciro Derinliği');?>
			<?php $row2[] = array('type' => 'row', 'title' => 'Adisyon Sayısı','','', 'value' => count($list) );?>
			<?php $row2[] = array('type' => 'row', 'title' => 'Ciro / Adisyon','','', 'value' => number_format((float)$rate, 2,",",".") );?>
			<?php $row2[] = array('type' => 'row', 'title' => 'Kişi Sayısı','','', 'value' => array_sum($people) );?>
			<?php $row2[] = array('type' => 'row', 'title' => 'Ciro / Kişi','','', 'value' => number_format((float)$rate2, 2,",",".") );?>
			<?php $row2[] = array('type' => 'bold_row', 'title' => 'TOPLAM','','', 'value' => number_format($total - array_sum($discount), 2,",",".") );?>
		</div>
	</div>
	
	
	<input type="hidden" class="reportDetail" value='<?php echo json_encode($row);?>' />		
	<input type="hidden" class="reportDetail2" value='<?php echo json_encode($row2);?>' />		

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
					alert("Gün sonu yapılmıştır!");
					window.location.href = '<?php echo MAIN_BOARD;?>';
				}else{
					alert(response);
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
</script>
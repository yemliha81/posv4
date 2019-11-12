<?php
//debug($_SESSION);
//debug($last_order);
	$ipt = '0';
	$ikr = '0';
	$fiy = '0';
	$iptDesc = '0';
	$ikrDesc = '0';
	$fiyDesc = '0';
	foreach($_SESSION['auth_list'] as $key => $val){
		if($val['auth_id'] == '12'){ $ipt = '1'; }
		if($val['auth_id'] == '11'){ $ikr = '1'; }
		if($val['auth_id'] == '13'){ $fiy = '1'; }
		if($val['auth_id'] == '14'){ $iptDesc = '1'; }
		if($val['auth_id'] == '15'){ $ikrDesc = '1'; }
		if($val['auth_id'] == '16'){ $fiyDesc = '1'; }
	}


 include('includes/header-order.php'); ?>
<link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet">
<style type="text/css">
	.mobileTab{width:33.33%; float:left; background:#ddd; cursor:pointer; padding:15px; line-height:1; font-weight:bold;text-align:center;}
	.mactive{background:#5EC76A; color:#fff;}
	.slideM{position:absolute;left:0; right:0;top:0;bottom:0; background:#ffffffdb;display:none;}
	.borderR{border-right:1px solid #ddd;}
	.screenKeyboard{display:none;padding-top: 15px; position:fixed; background:#ddd; bottom:0; left:0; right:0; height:320px; z-index:11111;}
	.lttr{display:inline-block;width:50px; font-weight:bold; text-align:center;padding-top:12px; height:50px; margin:4px 3px; border-radius:5px; background:#fff; color:#000; font-size:16px;}
	.dll{display:inline-block;width:50px; font-weight:bold; text-align:center;padding-top:12px; height:50px; margin:4px 3px; border-radius:5px; background:#fff; color:#000; font-size:16px;}
	.lttr:focus{color:#000;}
	.dll:focus{color:#000;}
	.tglMx{display:none !important;}
	.yanone{font-family: 'Yanone Kaffeesatz', sans-serif;display:table-cell;vertical-align:middle;}
	a:focus{color:#fff;}
	.xbxb{color:#666;}
	.xbxb:focus{color:#666;}
	.body{position: fixed;  bottom:0;  top:0;  right:0;  left:0;  overflow:hidden;}
	.f20{font-size:20px;}
	.f25{font-size:25px;}
	.f30{font-size:30px;}
	.w80{width:80%; float:left;}
	.w20{width:20%; float:left;}
	.cat_name{background:#5bc0de;}
	 .accc::after{content:"(Aktif)"; position:relative; z-index:1;}
	.optGr{padding:15px; background:#ddd; line-height:1;}
	.prxxName{padding:15px 62px 15px 15px; background:#f3f3f3; line-height:1;cursor:pointer;border-bottom:1px solid #ddd;}
	
	.porsBtn{width:100%;border-radius:3px;font-size:22px;font-weight:bold;cursor:pointer;box-sizing:border-box;float:left;display:inline-block; padding:15px 0; text-align:center;background:blue; color:#fff;}
	.black{background:#000 !important;}
	.contt {
		  display: inline-block;
		  position: relative;
		  cursor: pointer;
		  -webkit-user-select: none;
		  -moz-user-select: none;
		  -ms-user-select: none;
		  user-select: none;
		}

		/* Hide the browser's default radio button */
		.contt input {
		  position: absolute;
		  opacity: 0;
		  cursor: pointer;
		}

		/* Create a custom radio button */
		.checkmark {
		  position: absolute;
		  top: 9px;
		right: 15px;
		  height: 25px;
		  width: 25px;
		  background-color: #eee;
		  border-radius: 50%;
		}

		/* On mouse-over, add a grey background color */
		.contt:hover input ~ .checkmark {
		  background-color: #ccc;
		}

		/* When the radio button is checked, add a blue background */
		.contt input:checked ~ .checkmark {
		  background-color: #2196F3;
		}

		/* Create the indicator (the dot/circle - hidden when not checked) */
		.checkmark:after {
		  content: "";
		  position: absolute;
		  display: none;
		}

		/* Show the indicator (dot/circle) when checked */
		.contt input:checked ~ .checkmark:after {
		  display: block;
		}
 
		/* Style the indicator (dot/circle) */
		.contt .checkmark:after {
			top: 9px;
			left: 9px;
			width: 8px;
			height: 8px;
			border-radius: 50%;
			background: white;
		}
	
	.subpt{position:absolute;right:0;line-height:1; bottom:0;font-size:12px;padding:4px 8px;background:#5EC76A;}
	.text-right input{width:48px;border:0;background:transparent;text-align:right;}
	.w50{width:50%; float:left !important;padding:2.5px;box-sizing:border-box;}
	.w46{width:48.333%; float:left !important; margin:0 2.5px 2.5px 2.5px;height:100px;}
	.w33{width:33.333%; float:left !important;padding:2.5px;box-sizing:border-box;}
	.btnXX{width:100%;height:100px;line-height:1.1;font-family: 'Yanone Kaffeesatz', sans-serif;margin-bottom:3px;}
	.digitCommon{width:100%; padding:10px; margin:0; font-size:35px; text-align:center;}
	.digit{ background:#00B2C9; color:#fff;border:1px solid #ddd;}
	.digit2{padding:21px; margin:0; display:block; font-size:20px; text-align:center; background:#14EFB2; color:#fff;border:1px solid #ddd;}
	.del{width:100%; float:left; padding:10px; font-size:35px; background:#e41e55; color:#fff; text-align:center; border:1px solid #ddd;}
	.delPro{color:#EF4C4C;}
	.xLabel{padding:15px; border:1px solid #ddd; margin-bottom:5px;width:100%;cursor:pointer;text-align:center;font-weight:bold;}
	.xLact{background:#ddd;}
	.payDiv{padding:25px 15px; font-size:20px;  border:1px solid #ddd;cursor:pointer;position:relative;}
	.bgBlue{background:#00B2C9;color:#fff;}
	.pymnt{border-bottom:1px solid #ddd;padding:10px 0;}
	.payBottom{position:absolute; bottom:0; right:0; left:0; background:#fff; z-index:2;}
	.totalX{font-size:22px; font-weight:bold;}
	 .xbb{display:inline-block;padding-top:3px;}
	.showPrint{display:none;}
	.xBtn{text-align:center; border:1px solid #ddd; padding:20px 0;cursor:pointer;}
	.act{background:#ddd;}
	.prox{padding: 15px; /* margin-right: 15px; margin-bottom:15px; */}
	.prox1{padding: 25px; margin-right: 15px; margin-bottom:15px; width:150px;}
	.abtn{border-right:1px solid #ddd; color:#000; border-radius:0;padding:15px;}
	.abtn2{border-radius:0;padding:15px;}
	td{padding:4px !important;}
	.leftBt{padding-top:30%; border-radius:3px; margin:3px; color:#fff; display:block; font-size:18px;text-align:center;}
	.big_btn{padding:20px; font-weight:bold;font-size:15px !important;}
	.showKitchen{display:none;}
	.discount{width:100%; font-size:20px; padding:15px;border:1px solid #ddd;}
	.freeBtn{width:100%;padding:20px 10px;}
	.freeBtn2{width:100%;padding:20px 10px;}
	.noP{padding:0;}
	.passDiv{padding:15px;position:absolute; top:0; bottom:0; left:0; right:0; background:rgba(255,255,255,0.9); }
	#cartDiv{overflow:auto;}
	.tableD{background:#3D3D3D; border-radius:3px; color:#fff;  padding:10px;display:block; font-size:15px;text-align:center;}
	.srcResults2{margin-top:15px;}
	.srcResults2 div{background:#f5f5f5;font-size:18px; line-height:1; cursor:pointer;}
	.srcResults2 div:hover{background:#ddd;}
	.srcResults2 div a{color:#666;font-weight:bold;display:block;padding:15px;border-bottom:1px solid #666;}
	.nameSpan{display:inline-block; padding:9px 0;}
	.payxDiv{-webkit-box-shadow: 0px 0px 2px 0px rgba(0,0,0,0.75);
			-moz-box-shadow: 0px 0px 2px 0px rgba(0,0,0,0.75);
			box-shadow: 0px 0px 2px 0px rgba(0,0,0,0.75);}
	
	@media only screen and (max-width: 1200px){
		.btn-float{padding:10px !important}
	}
	
	@media only screen and (max-width: 768px){
		.leftDiv{display:none;}
		.yanone{font-size:16px;height:60px;}
		.totalX{font-size:18px;}
		
		.tableD{font-size:18px;text-align:left;}
	}
	
</style>

<div class="table">
	<div class="row" style="margin:0;">
		<div class="col-sm-1 autoHeight leftDiv" style="padding:0;"> 
			<div>
				<a href="javascript:;"  class="leftBt tablesPage" style="background:#3D3D3D;" link="<?php echo TABLES_PAGE;?>">
					<b> <i class="fa fa-th"></i> <br /></b>Masalar
				</a>
				<a href="javascript:;"  class="leftBt" data-toggle="modal" data-target="#customerModal" style="background:#3D3D3D;">
					<b><i class="fa fa-user"></i><br /></b>Müşteri
				</a> 
				
				<a href="javascript:;" class="leftBt" style="background:#3D3D3D;"><!--printKitchen--> 
					<a href="javascript:;" data-toggle="modal" data-target="#printersModal2"  class="leftBt" style="background:#3D3D3D;">
						<b><i class="fa fa-print"></i>  <br /></b>Fatura
					</a>
					
				</a>
				
				<?php if(count($printers) == 1){ ?>
					<?php if($_SESSION['demo'] == '1'){ ?>
						<a href="javascript:;" class="leftBt" style="background:#3D3D3D;padding-top:10px;">
							<b><i class="fa fa-print"></i> <br /></b>Adisyon <br /><span style="color:red;font-size:14px;line-height: 1; display: inline-block;">(Demoda kullanılamaz)</span>
						</a>
					<?php }else{ ?>
						<a href="javascript:;" class="leftBt sendToPrinter2" style="background:#3D3D3D;"><!--printX-->
							<b><i class="fa fa-print"></i> <br /></b>Adisyon
						</a>
					<?php } ?>
					<form id="printForm2">
						<input class="hidden" id="pr0" type="hidden" name="printer" value="<?php echo $printers[0]['printer_ip'];?>" />
						<input type="hidden" name="order_id" value="<?php echo $last_order['order_id'];?>" />
						<input type="hidden" name="table_name" value="<?php echo $table['table_name'];?>" />
					</form>
				<?php }else{ ?>
					<?php if($_SESSION['demo'] == '1'){ ?>
						<a href="javascript:;" class="leftBt" style="background:#3D3D3D;padding-top:10px;">
							<b><i class="fa fa-print"></i> <br /></b>Adisyon <br /><span style="color:red;font-size:14px;line-height: 1; display: inline-block;">Demoda kullanılamaz</span>
						</a>
					<?php }else{ ?>
						<a href="javascript:;" data-toggle="modal" data-target="#printersModal" class="leftBt" style="background:#3D3D3D;"><!--printX-->
						<b><i class="fa fa-print"></i> <br /></b>Adisyon
					</a>
					<?php } ?>
					
				<?php } ?>
				<a href="javascript:;" class="leftBt tablesPage" style="background:#3D3D3D;"  link="<?php echo MAIN_BOARD;?>">
						<b><i class="fa fa-home"></i> <br /></b>Ana Sayfa
				</a>
			</div>
		</div>
		<div id="printDiv" class="col-sm-4 autoHeight" style="padding:0;padding-right:3px; border-right:1px solid #4b4b4b;">
			<div class="hidePrint visible-xs">
				<div class="mobileTab">
					<a href="<?php echo TABLES_PAGE;?>">Masalar</a>
				</div>
				<div class="mobileTab mactive borderR" rel="adisyonDiv">
					Adisyon
				</div>
				<div class="mobileTab" rel="menuDiv">
					Menü
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="xtab menuDiv hidePrint" style="display:none; position:absolute;top:50px; right:0; left:0; bottom:0;">
				<?php foreach($cats as $key => $val){ ?>
					<div class="w33">
						<button type="button" class="btn btn-2 btn-2c cat_name f16 btnXX yanone slideMenu" 
						rel="<?php echo $val['cat_id'];?>"
						<?php if($val['cat_bg'] != ''){ ?>
							style="background:<?php echo $val['cat_bg'];?> !important; margin-bottom:3px;height:100px;"
						<?php }else{ ?>
							style="background:#4D4745;margin-bottom:3px;height:100px;"
						<?php } ?>
						>
						<span><?php echo $val['cat_name'];?></span>
						</button>
					</div>
				<?php } ?>
			<div class="slideM">
				<div class="closeSlideM" style="background:#fff;text-align:center;padding:10px; color:red;position:relative;">
					<i class="fa fa-times fa-2x"></i>
					<span class="proAdded" style="position:absolute;display:none;color:green;right:0;top:0;padding:10px;">
					Ürün Eklendi <i class="fa fa-check fa-2x" style=""></i>
					</span>
				</div>
				
				<div class="btnxDiv removeLg"></div>
			</div>
			</div>
			<div class="xtab adisyonDiv">
				<div class="showPrint">
					<?php echo $settings['adisyon_header'];?>
				</div>
				<div style="margin-top:3px;position:relative;">
					<div class="tableD hidePrint">
					<?php if($table['table_id'] == '0'){ ?>
					<b>Paket Sipariş</b>
					<?php }else{ ?>
						<b><?php echo $table['table_name'];?></b>
						<?php if($settings['fix_menu'] == '1'){ ?>
							<a href="javascript:;" class="btn btn-sm btn-info fixC"><b>Fix</b></a>
						<?php } ?>
						<?php if($settings['wait_product'] == '1'){ ?>
							<a href="javascript:;" class="btn btn-sm btn-warning waitC"><b>Beklet</b></a>
						<?php } ?>
						
						
					<?php } ?>
						<?php if($table['is_busy'] > 0){ ?>
						
							<span class="pull-right hidden-xs">
								<a href="javascript:;" data-toggle="modal" data-target="#peopleModal" class="btn btn-info"><i class="fa fa-users"></i></a>
								<?php if($_SESSION['user_type_id'] != '4'){ ?>
									<a href="javascript:;" style="margin:0 5px" data-toggle="modal" data-target="#tableModal" class="btn btn-info"><i class="fa fa-exchange"></i></a>
								<?php } ?>
							</span>
							<span class="pull-right visible-xs">
								<a href="javascript:;" class="btn btn-info openToolBar"><i class="fa fa-gear"></i></a>
							</span>
						<?php }else{ ?>
							<?php if( $settings['kuver_status'] == 1 ){ ?>
								<span class="pull-right">
									<a href="javascript:;" data-toggle="modal" data-target="#peopleModal" class="btn btn-info"><i class="fa fa-users"></i></a>
								</span>
							<?php } ?>
						<?php } ?>
						<div class="clearfix"></div>
					</div>
					<div style="position:absolute; z-index:1; left:0; right:0; display:none; background:#666; padding:15px;" class="toolBar">
						<div class="row">
							<div class="col-xs-3 text-center" style="padding:3px;">
								<a href="javascript:;" data-toggle="modal" data-target="#peopleModal" class="btn btn-2 btn-2c btn-sm btn-float w100" style="font-size:15px;">
									<b>Kişi<br />Sayısı</b>
								</a>
							</div>
							<div class="col-xs-3 text-center" style="padding:3px;">
								<a href="javascript:;" data-toggle="modal" data-target="#tableModal" class="btn btn-2 btn-2c btn-sm btn-float w100" style="font-size:15px;">
									<b>Masa<br />Değiştir</b>
								</a>
							</div>
							<div class="col-xs-3 text-center" style="padding:3px;">
								<a href="javascript:;"  class="btn btn-2 btn-2c btn-sm btn-float w100" data-toggle="modal" data-target="#noteModal" style="font-size:15px;">
									<b>Not<br />Ekle</b>
								</a>
							</div>
							<div class="col-xs-3 text-center" style="padding:3px;">
								<a href="javascript:;"  class="btn btn-2 btn-2c btn-sm btn-float w100" data-toggle="modal" data-target="#customerModal" style="font-size:15px;">
									<b>Müşteri<br />Ekle</b>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="showPrint">
					<?php echo date('d.m.Y H:i');?>
					<span style="float:right; display:inline-block;">
						<b>Masa <?php echo $table['table_name'];?></b>
					</span>
				</div>
				<?php if($last_order['customer_id'] > 0){ ?>
					<div class="" style="padding:10px 0;">
						<div>
							<b>Müşteri : <?php echo $customer['full_name'];?></b>
						</div>
					</div>
				<?php }?>
				<?php if($phone_order == '1'){ ?>
					<form id="orderForm" action="<?php echo PHONE_ORDER_POST;?>" method="post">
				<?php }else{ ?>
					<form id="orderForm" action="<?php echo ORDER_POST;?>" method="post">
				<?php } ?>	
					<?php if($phone_order == '1'){ ?>
						<div class="hidePrint" style="background:#ddd; padding:10px;">
							<div class="row">
								<div class="col-xs-7">
									<b>Müşteri : <span class="cxname"><?php echo $customer['full_name'];?></span></b>
								</div>
								<div class="col-xs-5">
									<select name="payment_type" class="form-control select2 ptypex">
										<option value="">Ödeme Yöntemi</option>
										<?php foreach($payment_types as $key => $val){ ?>
											<?php if($settings[$val['payment_code']] == '1'){ ?>
												<?php if($val['payment_code'] != 'point'){ ?>
													<option value="<?php echo $val['payment_code'];?>">
														<?php echo $val['payment_name'];?>
													</option>
												<?php } ?>
											<?php } ?>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="row" style="margin-top:10px;">
								<div class="col-xs-12" id="addrContainer"></div>
							</div>
						</div>
					<?php } ?>
					<div class="calculatex" style="position:relative;">
						<div id="cartDiv">
							
								<input type="hidden" name="kiosk" value="<?php echo $kiosk_order;?>"/>
								<input type="hidden" name="table_id" value="<?php echo $table['table_id'];?>"/>
								<input type="hidden" class="customer_id" name="customer_id" value="0"/>
								<input type="hidden" name="order_id" id="order_id" value="<?php echo $last_order['order_id'];?>"/>
								<input type="hidden" name="paid_price" value="<?php echo $last_order['paid_price'];?>"/>
								<input type="hidden" name="isFree" class="isFree" value="0"/>
								<?php $SES = $this->session->all_userdata();?>
								<?php if(!empty($SES['user_id'])){ $user_id = $SES['user_id']; }else{$user_id = '0';}?>
								<input type="hidden" class="user_id" name="user_id" value="<?php echo $user_id;?>" />
								<table class="table table-striped" width="100%">
									<thead>
										<tr class="" style="border-bottom:1px solid #ddd;">
											<td></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
									</thead>
									
									<tbody id="cartDivx"></tbody>
									
								</table>
							
						</div>
						
					</div>
				</form>
				<div class="payBottom">
						<?php 
							if(!empty($discounts)){
								$disc = '1';
								foreach($discounts as $key => $val){
									$totalDisc += $val['paid_price'];
								}
								$paid_price = number_format($last_order['paid_price'] - $totalDisc ,2) ;
							}else{
								$paid_price = number_format($last_order['paid_price'],2) ;
							}
						?>
						<div style="">
							
							<?php if( $last_order['extra_price'] > 0 ){ ?>
							<div class="row" style="background:#f7f7f7; margin:0 1px;white-space:nowrap;">
								<div class="clearfix"></div>
								<div class="col-xs-12 rightPrint hd" style="padding-top:5px;">
									<span class="pull-left xbb"><?php echo $settings['extra_name'];?> :</span>
									<span class="pull-right totalX" id=""> <?php echo number_format($last_order['extra_price'], 2);?> <span class="fa fa-try"></span></span>
									
								</div>
							</div>
								
							<?php } ?>
							<div class="row" style="background:#f7f7f7; margin:0 1px;">
								<div class="col-xs-12 rightPrint hd" style="padding-top:5px;">
									<span class="pull-left xbb">Toplam :</span>
									<span class="pull-right totalX" id="total" style=''>0.00</span> 
									<div class="clearfix"></div>
								</div>
							</div>
							<?php if($paid_price > 0){ ?>
							<div class="row hidePrint" style="margin:0 1px;white-space:nowrap;">
								<div class="col-xs-8" style="padding-top:5px;">
									<span class="pull-left xbb">Ödenen :</span>
								</div>
								<div class="col-xs-4">
								
									<span class="pull-right totalX paid_total"  id="paid_total" style=''> 
									
										<?php echo $paid_price;?> <span class="fa fa-try"></span>
									
									</span>
								</div>
							</div>
							<?php } ?>
							<?php if( $disc == '1' ){ ?>
								<div class="row" style="background:#f7f7f7; margin:0 1px;white-space:nowrap;">
									<div class="clearfix"></div>
									<div class="col-xs-12 rightPrint hd" style="padding-top:5px;">
										<span class="pull-left xbb">İndirim : <a href="javascript:;" class="btn btn-xs btn-danger discCancel" order_id="<?php echo $last_order['order_id'];?>">İptal</a> </span>
										<span class="pull-right totalX" id=""> <?php echo number_format((float)$totalDisc, 2, '.', '');?> <span class="fa fa-try"></span></span>
										
									</div>
								</div>
							<?php } ?>
														
							<?php if( $last_order['rest_price'] != $last_order['total_price'] ){ ?>
								<div class="row" style="background:#fff; margin:0 1px;">
									<div class="clearfix"></div>
										<div class="col-xs-12 rightPrint hd" style="padding-top:5px;">
											<span class="pull-left xbb"><b>Genel Toplam :</b></span>
											<span class="pull-right totalX rest_total rest_total1" id="rest_total"> 
												<?php echo $last_order['rest_price'];?> <span class="fa fa-try"></span>
											</span>
											
										</div>
								</div>
							<?php } ?>		
						</div>
						<div style="" class="hidePrint">
							<table class="table">
								<tr>
									<td style="padding:9px 2px !important">
										<span style="display:inline-block; float:left;">
											<?php if($_SESSION['user_type_id'] != '4'){ ?>
												<?php if($table['is_busy'] > 0){ ?>
													<a href="javascript:;" table_id="<?php echo $table['table_id'];?>" class="btn btn-2 btn-2c btn-sm btn-float hidden-xs" data-toggle="modal" data-target="#myModal" style="font-size:15px;background:#5ec76a;"><b>ÖDE</b></a>
													<?php if($kiosk_order == '1'){ $closeT == 'YENİ SİPARİŞ'; }else{ $closeT == 'KAPAT'; }?>
													<a href="javascript:;" table_id="<?php echo $table['table_id'];?>" class="btn btn-2 btn-2c btn-sm btn-float  closeTable" style="font-size:15px"><b>KAPAT</b></a>
																								
													<a href="javascript:;" data-toggle="modal" data-target="#discountModal" class="btn btn-2 btn-2c btn-sm btn-float" style="font-size:15px"><b>İNDİRİM</b></a>
													
												<?php } ?> 
											<?php } ?>
										</span>
										<?php if(count($printers) == 1){ ?>
											
										<a href="javascript:;" class="visible-xs  btn btn-2 btn-2c btn-sm btn-float sendToPrinter2" style="font-size:15px;float:left;margin-left:5px;"><b>ADİSYON</b></a>	
											<form id="printForm2">
												<input class="hidden" id="pr0" type="hidden" name="printer" value="<?php echo $printers[0]['printer_ip'];?>" />
												<input type="hidden" name="order_id" value="<?php echo $last_order['order_id'];?>" />
												<input type="hidden" name="table_name" value="<?php echo $table['table_name'];?>" />
											</form>
										<?php }else{ ?>
											<a href="javascript:;" data-toggle="modal" data-target="#printersModal" class="visible-xs btn btn-2 btn-2c btn-sm btn-float" style="font-size:15px;float:left;margin-left:5px;"><b>ADİSYON</b></a>
											
										<?php } ?>
										
									</td>
									<td style="padding:5px !important">
										<a href="javascript:;" class="btn btn-2 btn-2c btn-float btn-sm saveOrder pull-right" style="font-size:15px;background:#5ec76a;">
											 <b>KAYDET</b> 
										</a>
									</td>
									
								</tr>
							</table>
						</div>
					</div>
				<div class="clearfix"></div>
				<div class="showPrint showKitchen" style="">
					<?php if($last_order['order_note'] != ''){ ?>
						Not : <?php echo $last_order['order_note'];?>
					<?php } ?>
				</div>
				<div class="showPrint">
					<?php echo $settings['adisyon_footer'];?>
				</div>
			</div>
		</div>
		<div class="col-sm-3 autoHeight hidden-xs" style="padding:0; padding-right:3px;  overflow-y:auto; background:#fdfdfd;">
			<?php foreach($cats as $key => $val){ ?> 
				<div class="w50">
					<button type="button" class="btn btn-2 btn-2c cat_name f25 btnXX yanone" 
					rel="<?php echo $val['cat_id'];?>"
					<?php if($val['cat_bg'] != ''){ ?>
						style="background:<?php echo $val['cat_bg'];?> !important; margin-bottom:3px;"
					<?php }else{ ?>
						style="background:#4D4745;margin-bottom:3px;"
					<?php } ?>
					>
					<span><?php echo $val['cat_name'];?></span>
					</button>
				</div>
			<?php } ?>
		</div>
		<div class="  col-sm-4 autoHeight hidden-xs removeXs" style="padding:0; background:#f5f5f5; overflow-y:auto; background:#6d6b6b; ">
			<div class="hidden <?php if($kiosk_order == '1'){ echo 'hidden'; } ?>">
				<div class="w33" style="padding:2px;"><div class="porsBtn" rel="0.5">0.5</div></div>
				<div class="w33" style="padding:2px;"><div class="porsBtn" rel="1.5">1.5</div></div>
				<div class="w33" style="padding:2px;"><div class="porsBtn" rel="2">Duble</div></div>
				<div class="clearfix"></div>
			</div>
			<div class="btnxDiv"></div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
<!-- Modal -->
<div id="printersModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
	  <div class="row">
		<p class="text-center borderB">
			<b>YAZICI SEÇİMİ</b> <br /> <br />
		</p>
	  </div>
		<div>
			<form id="printForm">
			<?php foreach($printers as $key => $val){ ?>
				
				<label for="pr<?php echo $key;?>" class="xLabel">
					<?php echo $val['printer_name'];?>
					<input class="hidden" id="pr<?php echo $key;?>" type="radio" name="printer" value="<?php echo $val['printer_ip'];?>" />
				</label>
			<?php } ?>
				<input type="hidden" name="order_id" value="<?php echo $last_order['order_id'];?>" />
				<input type="hidden" name="table_name" value="<?php echo $table['table_name'];?>" />
				<a href="javascript:;" class="btn btn-success form-control sendToPrinter" data-dismiss="modal"><b>YAZDIR</b></a>
			</form>
		</div>
      </div>
    </div>

  </div>
</div>
<div id="printersModal2" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    
    <div class="modal-content">
      <div class="modal-body">
	  <div class="row">
		<p class="text-center borderB">
			<b>FATURA YAZDIRMA</b> <br /> <br />
		</p>
	  </div>
		<div>
			<form id="printForm3">
				<?php foreach($printers as $key => $val){ ?>
					
					<label for="prx<?php echo $key;?>" class="xLabel">
						<?php echo $val['printer_name'];?>
						<input class="hidden" id="prx<?php echo $key;?>" type="radio" name="printer" value="<?php echo $val['printer_ip'];?>" />
					</label>
				<?php } ?>
				<input type="hidden" name="order_id" value="<?php echo $last_order['order_id'];?>" />
				<input type="hidden" name="table_name" value="<?php echo $table['table_name'];?>" />
				<a href="javascript:;" class="btn btn-success form-control sendToPrinter3" data-dismiss="modal"><b>YAZDIR</b></a>
			</form>
		</div>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->
<!-- Modal -->
<div id="peopleModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
	  <div class="row">
		<p class="text-center borderB">
			<b>KİŞİ SAYISI</b> <br /> <br />
		</p>
	  </div>
		<form action="<?php echo PERSON_POST;?>" method="post">
			<div class="row">
				<div class="col-xs-6">
					<input type="number" name="person" class="form-control" value="<?php echo $last_order['person'];?>" />
					<input type="hidden" name="table_id" value="<?php echo $table['table_id'];?>" />
					<input type="hidden" name="order_id" value="<?php echo $last_order['order_id'];?>" />
				</div>
				<div class="col-xs-6">
					<input type="submit" class="butonX1 w100" value="GÜNCELLE"/> 
				</div>
			</div>
		</form>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->
<!-- Modal -->
<div id="tableModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
	  <div class="row">
		<p class="text-center borderB">
			<b>MASA BİRLEŞTİRME & DEĞİŞTİRME</b> <br /> <br />
		</p>
	  </div>
        <div class="row">
			<ul class="nav nav-tabs">
			  <li class="active"><a class="f16" data-toggle="tab" href="#home"><b>Masa Değiştir</b></a></li>
			  <li><a class="f16" data-toggle="tab" href="#menu1"><b>Masa Birleştir</b></a></li>
			</ul>

			<div class="tab-content" style="padding:15px;">
			  <div id="home" class="tab-pane fade in active">
				<div class="row">
					<form action="<?php echo CHANGE_TABLE;?>" method="post">
						<div class="col-sm-12" style="margin-bottom:15px;">
							<div class="row">
								<div class="col-xs-4"><b>1. Masa</b></div>
								<div class="col-xs-8">
									<b><?php echo $table['table_name'];?></b>
									<input type="hidden" name="table_id_2" value="<?php echo $table['table_id'];?>" />
								</div>
							</div>
						</div>
						<div class="col-sm-12" style="margin-bottom:15px;">
							<div class="row">
								<div class="col-xs-4"><b>2. Masa</b></div>
								<div class="col-xs-8">
									<select name="table_id_1" class="form-control select2" required>
										<option value="">Masa Seçiniz</option>
										<?php foreach($empty_tables as $key => $val){ ?>
											<option value="<?php echo $val['table_id'];?>">
												<?php echo $val['table_name'];?>
											</option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-sm-12">
							<input type="submit" class="butonX1 w100" value="MASA DEĞİŞTİR" />
						</div>
						<div class="clearfix"></div>
						<hr />
						<div class="col-xs-12">
							<i>* 1. Masanın sipariş ve ödemeleri, 2. Masaya aktarılacaktır.</i>
						</div>
					</form>
				</div>
			  </div>
			  <div id="menu1" class="tab-pane fade">
				<div class="row">
					<form action="<?php echo MERGE_TABLES;?>" method="post">
						<div class="col-sm-12" style="margin-bottom:15px;">
							<div class="row">
								<div class="col-xs-4"><b>1. Masa</b></div>
								<div class="col-xs-8">
									<b><?php echo $table['table_name'];?></b>
									<input type="hidden" name="table_id_2" value="<?php echo $table['table_id'];?>" />
								</div>
							</div>
						</div>
						<div class="col-sm-12" style="margin-bottom:15px;">
							<div class="row">
								<div class="col-xs-4"><b>2. Masa</b></div>
								<div class="col-xs-8">
									<select name="table_id_1" class="form-control select2" required>
										<option value="">Masa Seçiniz</option>
										<?php foreach($tables as $key => $val){ ?>
											<option value="<?php echo $val['table_id'];?>">
												<?php echo $val['table_name'];?>
											</option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="col-sm-12">
							<input type="submit" class="butonX1 w100" value="BİRLEŞTİR" />
						</div>
						<div class="clearfix"></div>
						<hr />
						<div class="col-xs-12">
							<i>* 1. Masanın sipariş ve ödemeleri, 2. Masaya aktarılacaktır.</i>
						</div>
					</form>
				</div>
			  </div>
			</div>
		</div>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->
<div id="customerModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
	  <div class="row">
        <p class="text-center borderB">
			<b>MÜŞTERİ ARA & EKLE</b> <br /> <br />
		</p>
		<p>
			<div class="">
				<div class="col-sm-4 col-xs-6">
					<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-user"></i> &nbsp;&nbsp; MÜŞTERİ İSMİ</span>
				</div>
				<div class="col-sm-8 col-xs-6">
					<input autofocus="on" type="text" class="srcCustomers form-control" placeholder="Müşteri Ara..." />
				</div>
				<div class="clearfix"></div>
				
			</div>
			<div class="srcResults2" style=""></div>
		</p>
		<div class="custDiv"></div>
		<div class="clearfix"></div><hr />
		<form id="customerForm" class="hidden" method="post">
			<p class="text-center borderB">
				<b>MÜŞTERİ BİLGİLERİ</b> <br /> <br />
			</p>
			<p>
				<div class="">
					<div class="col-sm-4  col-xs-6">
						<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-user"></i> &nbsp;&nbsp; MÜŞTERİ İSMİ</span>
					</div>
					<div class="col-sm-8 col-xs-6">
						<input type="hidden" name="order_id" value="<?php echo $last_order['order_id'];?>" />
						<input type="text" name="full_name" class="form-control full_name" required placeholder="Müşteri Ad - Soyad" />
					</div>
					<div class="clearfix"></div>
				</div>
			</p>
			<p>
				<div class="">
					<div class="col-sm-4 col-xs-6">
						<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-phone"></i> &nbsp;&nbsp; TELEFON</span>
					</div>
					<div class="col-sm-8 col-xs-6">
						<input type="text" id="phone" name="phone" pattern="[0-9]{1}-[0-9]{3}-[0-9]{3}-[0-9]{4}" required title="0-212-123-4567"  placeholder="Telefon" class="form-control phone"/>
					</div>
					<div class="clearfix"></div>
				</div>
			</p>
			<p>
				<div class="">
					<div class="col-sm-4 col-xs-6">
						<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-envelope"></i> &nbsp;&nbsp; E-MAIL</span>
					</div>
					<div class="col-sm-8 col-xs-6">
						<input type="text" name="email" class="form-control email" placeholder="E-mail" />
					</div>
					<div class="clearfix"></div>
				</div>
			</p>
			<p>
				<div class="">
					<div class="col-sm-4 col-xs-6">
						<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; ADRES</span>
					</div>
					<div class="col-sm-8 col-xs-6">
						<input type="text" name="address" class="form-control address" placeholder="Adres" />
					</div>
					<div class="clearfix"></div>
				</div>
			</p>
			<p>
			<div class="col-xs-12">
				<input type="button" href="javascript:;" class="butonX1 pull-right addCustomer" value="EKLE"/>
				<button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
			</div>
			</p>
		</form>
		
      </div>
    </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="noteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body" style="">
	   <div  class="row">
		<p class="text-center borderB">
			<b>NOT EKLEME</b> <br /> <br />
		</p>
	  </div>
        <p>
			<form id="noteForm">
				<input type="hidden" name="order_id" value="<?php echo $last_order['order_id'];?>" />
				<textarea name="note" class="form-control noteArea" id="" cols="30" rows="5"><?php echo $last_order['order_note'];?></textarea>
			</form>
			<div>
				<br /> <a href="javascript:;" class="addNote butonX1 w100 text-center">Ekle</a>
				<div class="clearfix"></div>
			</div>
		</p>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="discountModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title">İndirim Ekleme</h4>
      </div>
      <div class="modal-body">
		<p>
			<div class="row">
				<div class="col-sm-6">
					<div>%</div>
					<input type="text" class="discount percDisc" placeholder="%" />
				</div>
				<div class="col-sm-6">
					<div><span class="fa fa-try"></span></div>
					<input type="text" class="discount amoDisc" placeholder="Tutar" />
				</div>
			</div>
		</p>
		<p>
			Kalan Tutar : <span class="rest_priceX"><?php echo ($last_order['total_price'] - $paid_price);?></span> <span class="fa fa-try"></span>
		</p>
		
		<p>
			<a href="javascript:;" data-dismiss="modal" order_id="<?php echo $last_order['order_id'];?>"  class="btn btn-success addDisc">İndirim Ekle</a>
		</p>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="descModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header text-center">
		<h4 class="modal-title"><b>Ürüne Not Ekleme</b></h4>
      </div>
      <div class="modal-body">
		<p>
			<div class="row">
				<div class="col-sm-12">
					<input type="text" class="form-control descRow" rows="5" rel="" style="line-height: 60px; height: 60px; font-size: 30px;">
				</div>
			</div>
		</p>
		<p class="text-center">
			<a href="javascript:;" data-dismiss="modal" class="btn btn-2 btn-2c btn-sm btn-float newDesc" style="font-size:15px;background:#5ec76a;"><b>NOT EKLE</b></a>
			<a href="javascript:;" data-dismiss="modal" class="btn btn-2 btn-2c btn-sm btn-float newDesc2" style="font-size:15px;background:#5ec76a; display:none;"><b>NOT DÜZENLE</b></a>
		</p>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content" style="position:relative;">
      <div id="successDiv" style="display:none;position:absolute; text-align:center; padding-top:10%; top:0; bottom:0; left:0; right:0; background:rgba(255,255,255,0.7); z-index:9999;">
		<img src="<?php echo IMG;?>success/success.jpg" width="250" />
	  </div>
      <div class="modal-body" style="padding:3px;background:#F2F2F2;">
	  <div class="hidden-xs" style="padding:5px; color:#fff;">
		<a href="javascript:;" class="payBtn pull-right btn btn-2 btn-2i" style="background:#5ec76a" table_id="<?php echo $table['table_id'];?>" rel="1">
			<b class="f16">ÖDE</b>
		</a>
		<span style="font-size:22px; display:inline-block; padding:20px;color:#666;">
			<?php if($last_order['customer_id'] > 0){ ?>
				<?php echo $customer['full_name'];?> 
				<?php if($group['group_discount'] > 0){ ?>
					İndirim : <?php echo $group['group_discount'];?>% 
					<input type="hidden" class="disccc" value="<?php echo ( ($last_order['rest_price']  / 100 ) * $group['group_discount'] );?>" />
					<a href="javascript:;" class="btn btn-xs btn-info processDisc" order_id="<?php echo $last_order['order_id'];?>">Uygula</a>
				<?php } ?>
				<?php if($point > 0){ ?>
					Puan : <?php echo $point;?> 
					<input type="hidden" class="cPoint" value="<?php echo $point;?>" />
				<?php } ?>
				
				
				
			<?php } ?>
		</span>
		<a class="pull-left btn btn-2 btn-2i" href="#" data-dismiss="modal" style="">
		<b>KAPAT</b>
		</a>
		<div class="clearfix"></div>
	  </div>
	  <div style="padding-bottom:15px;">
		<div class="col-sm-4 noP hidden-xs " style="padding:5px;">
			<div style="background:#fff;min-height:434px;" class="payxDiv">
				<div class="col-sm-12">
					<div class="row">
						<div class="w50 xBtn act" rel="details"><b>Adisyon</b></div>
						<div class="w50 xBtn" rel="payments"><b>Tahsilatlar</b></div>
						
						<!--<div class="w33 xBtn" rel="parts">Ürün Öde</div>-->
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="col-sm-12">
					<div class="row ccc payments" style="display:none;  max-height: 316px; overflow-y: auto;">
						<?php foreach($payments as $key => $val){ ?>
							<div style="padding:10px; border-bottom:1px solid #ddd;">
							<span class="pull-right"><?php echo $val['paid_price'];?> <span class="fa fa-try"></span></span>
								<span class="">
									<?php if($val['payment_type'] == 'credit'){ echo 'Kredi Kartı';}?>
									<?php if($val['payment_type'] == 'cash'){ echo 'Nakit';}?>
									<?php if($val['payment_type'] == 'open'){ echo 'Açık Hesap';}?>
									<?php if($val['payment_type'] == 'mealCard'){ echo 'Yemek Kartı';}?>
									<?php if($val['payment_type'] == 'point'){ echo 'Puanla Ödeme';}?>
								</span>
							</div>
						<?php } ?>
					</div>
					<div class="row ccc details" style="max-height: 316px; overflow-x:hidden; overflow-y: auto;">
						<?php foreach($order_details as $key => $val){ ?>
							<div style="padding:10px; border-bottom:1px solid #ddd;">
							
								<span class="">
									<?php echo $val['pro_name'];?>
								</span>
								<span class="pull-right">
									<span><?php echo $val['qty'];?></span>
									<span style="display:inline-block; width:60px;text-align:right;">
										<?php echo $val['total_price'];?> <span class="fa fa-try"></span>
									</span>
								</span>
							
							</div>
							
						<?php } ?>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="col-sm-5 noP "style="padding:5px;">
		<div style="background:#fff;min-height:434px;" class="payxDiv">
			<div class="" style=" padding:5px;">
				
				<div style="">
					<div class="">
						<div class="col-xs-12 pymnt">
							<div class="">
								<span style="display:inline-block; padding:5px;"><b>Toplam Kalan:</b></span> 
								<span class="pull-right rest_total" id="rest_total" style='font-size:22px; font-weight:bold;display:inline-block; padding-right:10px;'>
									<?php echo $last_order['rest_price'];?> <span class="fa fa-try"></span>
								</span>
							</div>
							
						</div>
					</div>
					<div class="">
						<div class="col-xs-12 pymnt">
							<div class="">
								<span style="display:inline-block; padding:5px;"><b>Tahsil Edilen :</b></span> 
								<span class="pull-right paid_total" id="paid_total" style='font-size:22px; font-weight:bold;display:inline-block; padding-right:10px;'>
									<?php echo $last_order['paid_price'];?> <span class="fa fa-try"></span>
								</span>
							</div>
						</div>
					</div>
					<div class="hidden">
						<div class="col-xs-12 pymnt">
							<div class="">
								<input type="text" class="" placeholder="İndirim" />
							</div>
						</div>
					</div>
				</div>
			</div>
			<style type="text/css">
				.digitWrapper{display:inline-block; padding:4px;width:25%; float:left;}
			</style>
			<div style="position:relative; padding:5px;">
				<div class="">
					<div class="digitWrapper">
						<a href="javascript:;" class="digit digitCommon btn btn-2c" rel="1">1</a>
					</div>
					<div class="digitWrapper">
						<a href="javascript:;" class="digit digitCommon btn  btn-2c  " rel="2">2</a>
					</div>
					<div class="digitWrapper">
						<a href="javascript:;" class="digit digitCommon btn btn-2c  " rel="3">3</a>
					</div>
					<div class="digitWrapper">
						<a href="javascript:;" class="digit2 digitCommon btn btn-2c" rel="all">Tümü</a>
					</div>
					<div class="digitWrapper">
						<a href="javascript:;" class="digit digitCommon btn btn-2c" rel="4">4</a>
					</div>
					<div class="digitWrapper">
						<a href="javascript:;" class="digit digitCommon btn btn-2c" rel="5">5</a>
					</div>
					<div class="digitWrapper">
						<a href="javascript:;" class="digit digitCommon btn btn-2c" rel="6">6</a>
					</div>
					<div class="digitWrapper">
						<a href="javascript:;" class="digit2 digitCommon btn btn-2c" rel="1_2">1/2</a>
					</div>
					<div class="digitWrapper">
						<a href="javascript:;" class="digit digitCommon btn btn-2c" rel="7">7</a>
					</div>
					<div class="digitWrapper">
						<a href="javascript:;" class="digit digitCommon btn btn-2c" rel="8">8</a>
					</div>
					<div class="digitWrapper">
						<a href="javascript:;" class="digit digitCommon btn btn-2c" rel="9">9</a>
					</div>
					<div class="digitWrapper">
						<a href="javascript:;" class="digit2 digitCommon btn btn-2c" rel="1_3">1/3</a>
					</div>
					<div class="digitWrapper">
						<a href="javascript:;" class="digit digitCommon btn btn-2c" rel="0">0</a>
					</div>
					<div class="digitWrapper">
						<a href="javascript:;" class="digit digitCommon btn btn-2c" rel=".">.</a>
					</div>
					<div class="digitWrapper">
						<a href="javascript:;" class="del digitCommon btn btn-2c"><i class="fa fa-long-arrow-left "></i></a>
					</div>
					<div class="digitWrapper">
						<a href="javascript:;" class="digit2 digitCommon btn btn-2c" rel="1_4">1/4</a>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
				<div style="position:absolute; top:0; bottom:0; left:0; right:0; z-index:8; background:#ffffff;display:none;" id="subPDiv" ></div>
			</div> 
			<div class="clearfix"></div>
		</div>
		</div>
		<div class="col-sm-3 noP" style="padding:5px;">
		<div style="background:#fff;min-height:434px;" class="payxDiv">
		<?php foreach($payment_types as $key => $val){ ?>
		
			<?php if($val['payment_code'] == 'point'){ ?>
			
				<?php if($settings[$val['payment_code']] == '1'){ ?>
					<?php if($point > 0){ ?>
						<div class="payDiv" payment_id="<?php echo $val['payment_id'];?>" 
							rel="<?php echo $val['rel'];?>"
							sub="<?php if(!empty($val['sub_payment_types'])){ echo 'sub'; }?>"
							>
							<i class="fa fa-<?php echo $val['icon'];?>"></i> &nbsp;&nbsp;&nbsp; <?php echo $val['payment_name'];?>
						</div>
					<?php } ?>
				<?php } ?>
			
			<?php }else{ ?>
		
				<?php if($settings[$val['payment_code']] == '1'){ ?>
					<div class="payDiv 
					<?php if($val['payment_code'] == 'open'){ 
						if($last_order['customer_id'] < 1){ 
							echo 'openPay';
						} 
					}?>" payment_id="<?php echo $val['payment_id'];?>" 
						<?php if($last_order['customer_id'] < 1){ 
							if($val['payment_code'] == 'open'){ ?> 
						data-toggle="modal" data-target="#customerModal" 
						<?php } ?>
						<?php } ?>
						rel="<?php echo $val['rel'];?>"
						sub="<?php if(!empty($val['sub_payment_types'])){ echo 'sub'; }?>" >
						<i class="fa fa-<?php echo $val['icon'];?>"></i> &nbsp;&nbsp;&nbsp; <?php echo $val['payment_name'];?>
					</div>
				<?php } ?>		
			
			<?php } ?>		
		
		<?php } ?>		
			
			
			
			<div class="">
				<input class="paidInput" style="width:100%;float:left;height:90px; padding-left:20px; font-weight:bold; font-size:35px; border:1px solid #ddd;" type="text" name="paid" id="amount" placeholder="Tutar Giriniz" readonly="readonly"/>
				
			</div>
			<input type="hidden" class="payment_type_temp" value=""/>
			<input type="hidden" class="sub_p_id" value="0"/>
			<input type="hidden" class="payment_type" name="payment_type" value=""/>
			<div class="clearfix"></div>
			<div class="visible-xs" style="padding:5px; background:#4757B9; color:#fff;">
				<a href="javascript:;" class="payBtn pull-right" table_id="<?php echo $table['table_id'];?>" style="font-size:20px; text-align:center; display:inline-block; padding:7px 25px; background: #14efb2;  color:#fff;" rel="1">
					<i class="fa fa-check"></i><br />
					Öde
				</a>
				<span style="font-size:22px; display:inline-block; padding:20px;">
					<?php if($last_order['customer_id'] > 0){ ?>
						<?php echo $customer['full_name'];?>
					<?php } ?>
				</span>
				<a class="pull-left" href="#" data-dismiss="modal" style="font-size:20px; text-align:center; display:inline-block; padding:7px 25px;  color:#fff; background: #eb5b5b;">
				<i class="fa fa-times"></i><br />
				KAPAT</a>
				<div class="clearfix"></div>
		    </div>
			
		</div>
		<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	  </div>
      </div>
    </div>

  </div>
</div>

<div id="loaderX" style="position:fixed; top:0; right:0; left:0; bottom:0; z-index:11111; background:rgba(0,0,0,0.6); display:none;">
	<div class="text-center" style="margin:150px auto; float:none; width:300px; padding:25px; background:#fff;">
		<i class="fa fa-refresh fa-3x fa-spin"></i>
	</div>
</div>
<input type="hidden" class="isChanged" value="0" />
<input type="hidden" class="isActive" value="0" />

<?php foreach($order_details as $key => $val){ ?>
	<input type="hidden" class="order_row" 
		id="<?php echo $val['id'];?>" 
		pro_id="<?php echo $val['pro_id'];?>" 
		porsion_id="<?php echo $val['porsion_id'];?>" 
		pro_name="<?php echo $val['pro_name'];?>" 
		desc="<?php echo $val['description'];?>" 
		desc2="<?php echo $val['description2'];?>" 
		qty="<?php echo $val['qty'];?>" 
		price="<?php echo $val['price'];?>" 
		total_price="<?php echo $val['total_price'];?>" 
		printed="<?php echo $val['printed'];?>" 
		ready="<?php echo $val['ready'];?>" 
		total_price="<?php echo $val['total_price'];?>" 
	/>
<?php } ?>

<?php 
	$auth = '0';
	if(!empty($_SESSION['authList'])){ 
		foreach($_SESSION['authList'] as $key => $val){
			if($val['auth_id'] == '2'){
				$auth = '1';
			}
			if($val['auth_id'] == '11'){
				$ikram = '1';
			}
			if($val['auth_id'] == '12'){
				$iptal = '1';
			}
			if($val['auth_id'] == '13'){
				$fiyat = '1';
			}
		} ?>
		
	<input type="hidden" class="ikram" value="<?php echo $ikram;?>" />
	<input type="hidden" class="iptal" value="<?php echo $iptal;?>" />
	<input type="hidden" class="fiyat" value="<?php echo $fiyat;?>" />
	<?php

		
	}else{ $ikram = '0'; $iptal = '0'; $fiyat = '0';?>
	
	<input type="hidden" class="ikram" value="0" />
	<input type="hidden" class="iptal" value="0" />
	<input type="hidden" class="fiyat" value="0" />
	
	<?php } ?>

<input type="hidden" class="authNum" value="2" />
<input type="hidden" class="auth" value="<?php echo $auth;?>" />

<?php if( $iptDesc == '1' ){ 
	$descXX = '1';		
 }else{ 
	$descXX = '0';
 } ?>
 <?php if($ikrDesc == '1'){ 
	$ikrdescXX = '1';		
 }else{ 
	$ikrdescXX = '0';
 } ?>
 <?php if($fiyDesc == '1'){ 
	$fiyDescXX = '1';		
 }else{ 
	$fiyDescXX = '0';
 } ?>
<input type="hidden" class="descXX" value="<?php echo $descXX;?>" />
<input type="hidden" class="ikrdescXX" value="<?php echo $ikrdescXX;?>" />
<input type="hidden" class="fiyDescXX" value="<?php echo $fiyDescXX;?>" />

<input type="hidden" class="fixP" value="0" />
<input type="hidden" class="waitP" value="0" />
<input type="hidden" class="porsX" value="1" desc="" />

<div class="screenKeyboard">
	<div style="position:relative;">
		<div style="position:absolute; right:15px;">
			<a href="javascript:;" class="clsBoard btn btn-danger"><i class="fa fa-times"></i></a>
		</div>
	</div>
	<div class="container">
	<div class="row text-center">
		<a href="javascript:;" class="lttr">1</a>
		<a href="javascript:;" class="lttr">2</a>
		<a href="javascript:;" class="lttr">3</a>
		<a href="javascript:;" class="lttr">4</a>
		<a href="javascript:;" class="lttr">5</a>
		<a href="javascript:;" class="lttr">6</a>
		<a href="javascript:;" class="lttr">7</a>
		<a href="javascript:;" class="lttr">8</a>
		<a href="javascript:;" class="lttr">9</a>
		<a href="javascript:;" class="lttr">0</a>
		<a href="javascript:;" class="dll"><<</a>
	</div>
	<div class="row text-center">
		<a href="javascript:;" class="lttr">Q</a>
		<a href="javascript:;" class="lttr">W</a>
		<a href="javascript:;" class="lttr">E</a>
		<a href="javascript:;" class="lttr">R</a>
		<a href="javascript:;" class="lttr">T</a>
		<a href="javascript:;" class="lttr">Y</a>
		<a href="javascript:;" class="lttr">U</a>
		<a href="javascript:;" class="lttr">I</a>
		<a href="javascript:;" class="lttr">O</a>
		<a href="javascript:;" class="lttr">P</a>
		<a href="javascript:;" class="lttr">Ğ</a>
		<a href="javascript:;" class="lttr">Ü</a>
	</div>
	<div class="row text-center">
		<a href="javascript:;" class="lttr">A</a>
		<a href="javascript:;" class="lttr">S</a>
		<a href="javascript:;" class="lttr">D</a>
		<a href="javascript:;" class="lttr">F</a>
		<a href="javascript:;" class="lttr">G</a>
		<a href="javascript:;" class="lttr">H</a>
		<a href="javascript:;" class="lttr">J</a>
		<a href="javascript:;" class="lttr">K</a>
		<a href="javascript:;" class="lttr">L</a>
		<a href="javascript:;" class="lttr">Ş</a>
		<a href="javascript:;" class="lttr">İ</a>
		<a href="javascript:;" class="lttr">,</a>
	</div>
	<div class="row text-center">
		<a href="javascript:;" class="lttr">Z</a>
		<a href="javascript:;" class="lttr">X</a>
		<a href="javascript:;" class="lttr">C</a>
		<a href="javascript:;" class="lttr">V</a>
		<a href="javascript:;" class="lttr">B</a>
		<a href="javascript:;" class="lttr">N</a>
		<a href="javascript:;" class="lttr">M</a>
		<a href="javascript:;" class="lttr">Ö</a>
		<a href="javascript:;" class="lttr">Ç</a>
		<a href="javascript:;" class="lttr">.</a>
	</div>
	<div class="row text-center">
		<a href="javascript:;" class="lttr" style="width:300px;"> </a>
	</div>
	</div>
	
</div>

<!-- Modal -->
<div id="options" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Fix Menü Seçenekleri</h4>
      </div>
      <div class="modal-body">
       <div class="optResponse"></div>
      </div>
    </div>

  </div>
</div>

<?php include('includes/footer-order.php');?>
<script type="text/javascript">
$(".fixC").click(function(){
	$(this).toggleClass('accc');
	var fixPP = $(".fixP").val();
	if(fixPP == '1'){
		$(".fixP").val('0');
	}
	if(fixPP == '0'){
		$(".fixP").val('1');
	}
});
$(".waitC").click(function(){
	$(this).toggleClass('accc');
	var waitPP = $(".waitP").val();
	if(waitPP == '1'){
		$(".waitP").val('0');
	}
	if(waitPP == '0'){
		$(".waitP").val('1');
	}
});
$(".lttr").click(function(){
		var val = $(this).text();
		var curval = $(".descRow").val();
		var newval = curval+val;
		$(".descRow").val(newval);
		$(".descRow").focus();
	});
$(".dll").click(function(){
		
		var curval = $(".descRow").val();
		curval = curval.slice(0, -1);
		$(".descRow").val(curval);
	});
$(".clsBoard").click(function(){	
	$(".screenKeyboard").fadeOut();
});

$(document).ready(function(){
	$(".paidInput").number(2, true);
	
	if( window.outerWidth < 768 ){
		$(".removeXs").remove();
	}else{
		$(".removeLg").remove();
	}
	
});

$(".mobileTab").click(function(){
	$(".mobileTab").removeClass("mactive");
	$(this).addClass("mactive");
	var rel = $(this).attr("rel");
	$(".xtab").hide();
	$("."+rel).fadeIn();
});
$(".slideMenu").click(function(){
	$(".slideM").fadeIn();
});
$(".closeSlideM").click(function(){
	$(".slideM").fadeOut();
});



$(".percDisc").keyup(function(){
	var rest = parseFloat($(".rest_priceX").text()).toFixed(2);
	var perc = parseFloat($(this).val().trim()).toFixed(2);
	
	
	if(perc > 0){
		var percPrice = parseFloat( (rest * perc ) / 100).toFixed(2);
		var percPrice2 = parseFloat( percPrice * (-1) ).toFixed(2);
		$(".amoDisc").val(percPrice);
		$(".addDisc").attr("pro_price", percPrice2);
	}
});

$(".full_name").keyup(function(){
	var fname = $(this).val();
	var fname = fname.toUpperCase();
	$(this).val(fname);
});

$(".openToolBar").click(function(){
	$(".toolBar").slideToggle();
});

$(".amoDisc").keyup(function(){
	
	var rest = parseFloat($(".rest_priceX").text()).toFixed(2);
	var disc = parseFloat($(this).val().trim()).toFixed(2);

	if(disc > 0){
		var percPrice = parseFloat( (disc / rest) * 100 ).toFixed(2);
		var percPrice2 = parseFloat( disc * (-1) ).toFixed(2);
		
		$(".percDisc").val(percPrice);
		$(".addDisc").attr("pro_price", percPrice2);
	}else{
		$(".percDisc").val("");
	}
});
$(".addDisc").click(function(){
	
	var amoDisc = parseFloat($(".amoDisc").val()).toFixed(2);
	var ptype = 'discount';
	var cust_id = '<?php echo $customer['customer_id'];?>';
	var order_id = $(this).attr("order_id");
	var table_id = "<?php echo $table['table_id'];?>";
	 
	if(amoDisc > 0){
		
		$.ajax({
			type : "post",
			url : "<?php echo ORDER_PAYMENT_POST;?>",
			data : {"amount" : amoDisc, "order_id" : order_id, "table_id" : table_id, "payment_type" : ptype, "customer_id" : cust_id},
			success : function(response){
				if(response == 'success'){
					location.reload();
				}
			}
		});
		
	}else{
		$(".percDisc").val("");
	}
});


$(".processDisc").click(function(){
	
	var amoDisc = parseFloat($(".disccc").val()).toFixed(2);
	var ptype = 'discount';
	var cust_id = '<?php echo $customer['customer_id'];?>';
	var order_id = $(this).attr("order_id");
	var table_id = "<?php echo $table['table_id'];?>";
	
		$.ajax({
			type : "post",
			url : "<?php echo ORDER_PAYMENT_POST;?>",
			data : {"amount" : amoDisc, "order_id" : order_id, "table_id" : table_id, "payment_type" : ptype, "customer_id" : cust_id},
			success : function(response){
				if(response == 'success'){
					location.reload();
				}
			}
		});
});


$(".printX").click(function(){
	var changed = $(".isChanged").val();
	if(changed == '1'){
		swal("","Lütfen yazdırmadan önce Kaydet butonu ile siparişi kaydediniz!","warning");
	}else{
		printDiv();
	}
	
});

$(window).click(function(e) {
    $(".isActive").val("1");
});

$(".printKitchen").click(function(){
	var changed = $(".isChanged").val();
	if(changed == '1'){
		swal("","Lütfen yazdırmadan önce Kaydet butonu ile siparişi kaydediniz!","warning");
	}else{
		printKitchen(); 
		window.location.href = '<?php echo TABLES_PAGE;?>';
	}
});

$(".xLabel").change(function(){
	$(".xLabel").removeClass("xLact");
	$(this).addClass("xLact");
});

$(".sendToPrinter").click(function(){
	var dataX = $("#printForm").serialize();
	console.log(dataX);
	
	$.ajax({
		type : "post",
		data : dataX,
		url : "<?php echo SEND_TO_PRINTER;?>",
		success : function(response){
			console.log(response);
		}
	});
	
});

$(document).on("click",".leftBt",function(){
	$(".srcCustomers").focus();
	//alert("test");
});

$(".sendToPrinter2").click(function(){
	var dataX = $("#printForm2").serialize();
	//console.log(dataX);
	
	$.ajax({
		type : "post",
		data : dataX,
		url : "<?php echo SEND_TO_PRINTER;?>",
		success : function(response){
			console.log(response);
		}
	});
	
});

$(".sendToPrinter3").click(function(){
	var dataX = $("#printForm3").serialize();
	//console.log(dataX);
	
	$.ajax({
		type : "post",
		data : dataX,
		url : "<?php echo SEND_TO_PRINTER_RECEIPT;?>",
		success : function(response){
			console.log(response);
		}
	});
	
});

function printDiv() 
{

  var divToPrint=document.getElementById('printDiv');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html>\
  <style type="text/css">\
  body{font-size:13px;font-family:Arial;padding:10px; margin:0;}\
  #cartDiv{border-top:1px solid #666;border-bottom:1px solid #666;height:auto !important;}\
  table tr td{font-size:13px}\
  input{border:0;background:#fff; width:60px;text-align:right;}\
  .hidePrint{display:none;}\
  .cc{text-align:center;}\
  .tableD{margin-bottom:50px;}\
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


function printKitchen() 
{

  var divToPrint=document.getElementById('printDiv');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html>\
  <style type="text/css">\
  body{font-size:13px;font-family:Arial;padding:10px; margin:0;}\
  #cartDiv{border-top:1px solid #666;border-bottom:1px solid #666;}\
  table tr td{font-size:13px}\
  input{border:0;background:#fff; width:40px;display:none !important;}\
  .hidePrint{display:none;}\
  .rightPrint{display:inline-block; float:right;}\
  .enjoyTxt{margin-top:85px;}\
  .clearfix{clear:both;}\
  .hd{display:none;}\
  td{padding-right:0; padding-left:0;}\
  </style>\
  <body  onload="window.print();">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();
  var dt = $("#orderForm").serialize();
  $.ajax({
	  
	  type : 'post',
	  url : '<?php echo ORDER_PRINTED;?>',
	  data : dt,
	  success : function(response){
		  console.log(response);
	  }
  });

  setTimeout(function(){newWin.close();},10);
  //location.reload();

}



	$(".payDiv").click(function(){
		$(".sub_p_id").val("0");
		$(".subpt").remove();
		var type = $(this).attr("rel");
		if( (type == 'cash') || (type == 'openPay') ){
			$(".payment_type").val(type);
			$("#subPDiv").fadeOut();
		}else{
			
			var sub = $(this).attr("sub");
			if( sub == 'sub' ){
				
				$(".payment_type_temp").val(type);
				$(".payment_type").val("");
				var payment_id = $(this).attr("payment_id");
				$.ajax({
					type :"get",
					url : "<?php echo GET_PAYMENT_TYPES;?>"+payment_id,
					success : function(response){
						$("#subPDiv").html(response);
						$("#subPDiv").fadeIn();
						
					}
					
				});
				
			}else{
					$(".payment_type").val(type);
					$("#subPDiv").fadeOut();
				}
			}
		
		$(".payDiv").removeClass("bgBlue");
		$(this).addClass("bgBlue");
		
	});
	
	$(".discCancel").click(function(){
		var order_id = $(this).attr("order_id");
		$.ajax({
			type : "post",
			url : "<?php echo DISCOUNT_CANCEL;?>",
			data : { "order_id" : order_id },
			success : function(response){
				if(response == "success"){
					location.reload();
				}
			}
		});
	});
	
	$(document).on("click", ".subPX", function(){
		var sub_p_id = $(this).attr("sub_p_id");
		var sub_p_name = $(this).text();
		var p_type = $(".payment_type_temp").val();
		$(".payment_type").val(p_type);
		$(".sub_p_id").val(sub_p_id);
		$("#subPDiv").fadeOut();
		$(".bgBlue").append("<div class='subpt'>- "+sub_p_name+"</div>");
	});
	
	
	$(".digit").click(function(){
		var rel = $(this).attr("rel");
		var amount = $("#amount").val();
		var newAmount = amount+rel;
		$("#amount").val(newAmount);
	});
	
	$(".digit2").click(function(){
		var val = $(this).attr("rel");
		if(val == 'all'){
			var amount = parseFloat($("#rest_total").text()).toFixed(2);
		}
		if(val == '1_2'){
			var amount = parseFloat($("#rest_total").text()).toFixed(2);
			amount = parseFloat(amount / 2).toFixed(2);
		}
		if(val == '1_3'){
			var amount = parseFloat($("#rest_total").text()).toFixed(2);
			amount = parseFloat(amount / 3).toFixed(2);
		}
		if(val == '1_4'){
			var amount = parseFloat($("#rest_total").text()).toFixed(2);
			amount = parseFloat(amount / 4).toFixed(2);
		}
		
		
		$("#amount").val(amount);
	});
	
	$(".del").click(function(){
		var str = $("#amount").val();
		str = str.slice(0, -1);
		$("#amount").val(str);
	});

	$(document).on("click",".cat_name", function(){
		var cat_id = $(this).attr("rel");
		getCatsOrProducts(cat_id);	
	});
	
	$(document).on("click", ".fixMenu", function(){
		var pro_id = $(this).attr("rel");
			
			$.ajax({
				type : "post",
				url : "<?php echo GET_PRODUCT_OPTIONS;?>",
				data : {"pro_id" : pro_id},
				success : function(response){
					$(".optResponse").html(response);
				}
			});
	});
	
	function getCatsOrProducts(cat_id){
		$(".btnxDiv").html("<div style='padding:30px 0;' class='text-center'><i class='fa fa-3x fa-refresh fa-spin'></i></div>");
		$.ajax({
			type : 'get',
			url : '<?php echo GET_CAT_OR_PRODUCTS;?>'+cat_id,
			success : function(response){
				rowData = JSON.parse(response);
				if(rowData.cat_msg == 'success'){
					var innerHtml = "";
					for(var key in rowData.sub_cat_list)
					{
						r = rowData.sub_cat_list[key];
						cBg = r.cat_bg;
						innerHtml += '<div class="w33">\
										<button type="button" class="btn btn-2 btn-2c  cat_name f25 btnXX yanone"  \
										rel="'+rowData.sub_cat_list[key].cat_id+'"\
										style="background:'+cBg+'">\
										<span>'+rowData.sub_cat_list[key].cat_name+'</span>\
										</button>\
									</div>';
					}
					$(".btnxDiv").html(innerHtml);
				}else{ 
					if(rowData.pro_msg == 'success'){
						var innerHtml = "";
						for(var key in rowData.pro_list)
						{
							opt1 = rowData.pro_list[key];
							porsion = rowData.pro_list[key].opt;
							pro_bg = rowData.pro_list[key].pro_bg;
							kiosk = '<?php echo $kiosk_order;?>';
							proType = rowData.pro_list[key].proType;
								innerHtml += '<div class="w33">';
								innerHtml += '<button ';
									
									
										if(opt1.one == '1'){
											if( porsion.porsion_name == 'Tam'  ){
												var pors = "";
											}else{
												var pors = porsion.porsion_name;
											}
											innerHtml += 'class="prox btnXX  f18 btn btn-2 btn-2c yanone"\
															pro_name="'+rowData.pro_list[key].pro_name+' '+pors+'" \
															pro_id="'+porsion.pro_id+'" \
															porsion_id="'+porsion.id+'" \
															pro_price="'+porsion.porsion_price+'"';
										}else{
											innerHtml += 'class="btn btn-2 btn-2c  f18 btnXX yanone" ';
											innerHtml += 'data-toggle="modal" data-target="#pro_'+rowData.pro_list[key].pro_id+'"';
										}
									
									
									
								
								if(pro_bg != ''){
									innerHtml += 'style="background:'+pro_bg+' !important" ';
								}
								
								if(kiosk == '1'){
									prr = '<br/> ('+porsion.porsion_price+')';
								}else{prr = '';}
								
								innerHtml += 'rel="'+rowData.pro_list[key].pro_id+'">';
								
								
								
								
								innerHtml += '<span>'+rowData.pro_list[key].pro_name+' '+prr+' </span>';
								innerHtml += '</button>';
								innerHtml += '</div>';
								
								if(opt1.one != '1'){
									innerHtml += '<div id="pro_'+rowData.pro_list[key].pro_id+'" class="modal fade" role="dialog" style="display: none;">\
									  <div class="modal-dialog">\
										<div class="modal-content">\
										  <div class="modal-header">\
											<h4 class="modal-title">Lütfen Seçiniz</h4>\
										  </div>\
										  <div class="modal-body text-center">';
											if(opt1.one == 'kg'){
													for(var kk in rowData.pro_list[key].options){
													  
													  var opt = rowData.pro_list[key].options[kk];
													 
														innerHtml += '<p> '+opt.porsion_name+'</p>';
													}
													innerHtml += '<p>\
													<div class="row">\
														<div class="col-xs-6">\
															<input type="number" class="form-control grInput" rel="'+opt.pro_id+'" value="1000" />\
														<span class="grInfo_'+opt.pro_id+'"></span>\
														</div>\
														<div class="col-xs-6">\
															<a class="grBtn_'+opt.pro_id+' prox prox1 btn btn-2 btn-2c f18 btnXX yanone" href="javascript:;"\
																pro_name1="'+rowData.pro_list[key].pro_name+'" \
																pro_name="'+rowData.pro_list[key].pro_name+' - '+opt.porsion_name+'" \
																pro_id="'+opt.pro_id+'" \
																porsion_id="'+opt.id+'" \
																kg_price="'+opt.porsion_price+'" \
																pro_price="'+opt.porsion_price+'"\
																data-toggle="modal" data-target="#pro_'+opt.pro_id+'"\
															>Ekle</a>\
														</div>\
													</div>\
													</p>';
												}else{
													 for(var kk in rowData.pro_list[key].options){
														  
														  var opt = rowData.pro_list[key].options[kk];
														  
														  if( opt.porsion_name == 'Tam'  ){
																var pors = "";
															}else{
																var pors = " - "+opt.porsion_name;
															}
														 
															innerHtml += '<span style="display:inline-block; margin:3px;"><a href="javascript:;"\
																data-toggle="modal" data-target="#pro_'+opt.pro_id+'"\
																class="prox prox1 btn btn-2 btn-2c f18 btnXX yanone"\
																pro_name="'+rowData.pro_list[key].pro_name+' '+pors+'" \
																pro_id="'+opt.pro_id+'" \
																porsion_id="'+opt.id+'" \
																style="margin-right:5px;"\
																pro_price="'+opt.porsion_price+'"> '+opt.porsion_name+'\
																</a></span>';
													  }
											  }
										  innerHtml += '</div>\
										</div>\
									  </div>\
									</div>';
								}
								
								
								
						}
						$(".btnxDiv").html(innerHtml);
					}
				}
			}
		});
	}
	
	$(document).on("keyup", ".grInput", function(){
		var rel = $(this).attr("rel");
		var pro_name = $(".grBtn_"+rel).attr("pro_name1");
		var gr = parseInt($(this).val());
		var kg = parseFloat(gr / 1000).toFixed(2);
		var kgPrice = parseFloat($(".grBtn_"+rel).attr("kg_price")).toFixed(2);
		var grPrice = parseFloat(kg * kgPrice).toFixed(2);
		$(".grBtn_"+rel).attr("pro_price", grPrice);
		$(".grBtn_"+rel).attr("pro_name", pro_name+" "+gr+" gr");
		$(".grInfo_"+rel).text(gr+" gr - "+grPrice+" TL");
		console.log(grPrice);
	});
	
	$(".saveOrder").click(function(){
		
		var tblId = parseInt(<?php echo $table['table_id'];?>);
		
		if(tblId > 0){
		
			var order_rows = $(".cartRow").length;
			if(order_rows > 0){
				screenLoader();
				$("#orderForm").submit();
			}else{
				swal('','Kaydetmek için En az 1 ürün girmelisiniz!','warning');
			}
			
		}
		
		if(tblId == 0){
		
				var order_content = $("#cartDivx").html();
				var cust_id = $(".customer_id").val();
				var ptype = $(".ptypex").val();
				var addressId = $(".addressId").val();
				
				//alert(cust_id);
				
				
				if(cust_id == '0'){
					swal('','Lütfen Müşteri seçimi yapınız!','warning');
					return false
				}
				
				if(ptype == ''){
					swal('','Lütfen Ödeme Yöntemi seçiniz!','warning');
					return false
				}
				
				if(addressId == ''){
					swal('','Lütfen Adres seçiniz!','warning');
					return false
				}
				
				
				if(order_content == ''){
					swal('','Kaydetmek için En az 1 ürün girmelisiniz!','warning');
				}else{
					screenLoader();
					$("#orderForm").submit();
				}
			
		}
		
		
	});
	function screenLoader(){
		$("#loaderX").show();
	}
	$(".tablesPage").click(function(e){
		
		var link = $(this).attr("link");
		var isC = $(".isChanged").val();
 
		if(isC == '1'){
			
			swal({
			  title: 'Emin misiniz?',
			  text: "Sayfada Kaydedilmemiş değişiklikler var!",
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#5b5351',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'EVET!',
			  cancelButtonText: 'VAZGEÇ'
			}).then(function (result) {
			  if (result.value) {
				// handle confirm 
				window.location.href = link;
			  } else {
				// handle cancel
			  }
			});
			
		}else{
			window.location.href = link;
		}
	});
	function isChanged(){
		$(".isChanged").val('1');
	}
	function askForExit(){
		var order_content = $("#cartDivx").html();
		if(order_content != ''){
			confirm('Kaydetmeden çıkmak istediğinizden emin misiniz?');
		}
	}
	$(".payBtn").click(function(){
		var sttt = '1';
		var amount = parseFloat($("#amount").val()).toFixed(2);
		var ptype = $('.payment_type').val();
		var sub_p_id = $('.sub_p_id').val();
		var cust_id = '<?php echo $customer['customer_id'];?>';
		var table_id = $(this).attr("table_id");
		var order_id = '<?php echo $last_order['order_id'];?>';
		if(ptype != ''){	
			if(amount != ''){	
			
			if(ptype == 'point'){
				
				var point = parseFloat( $(".cPoint").val() ).toFixed(2);
				
				if(amount > point){
					
					swal('','Kazanılan Puandan daha büyük bir tutar giremezsiniz!','warning'); 
					var sttt = '0';
				}
				
			}
			
			if( sttt == '1' ){
				$.ajax({
					type : "post",
					url : "<?php echo ORDER_PAYMENT_POST;?>",
					data : {"amount" : amount, "table_id" : table_id, "order_id" : order_id, "payment_type" : ptype, "sub_p_id" : sub_p_id,  "customer_id" : cust_id },
					success : function(response){
						if(response == 'success'){
							$("#successDiv").show();
							$("#successDiv").fadeOut(500);
							getPayments(order_id);
							$("#amount").val("");
							location.reload();
						}else{
							swal('',response,'warning'); 
						}
					}
				});
			}
			
			
				
			}else{
				swal("","Lütfen Tutar Giriniz!!!", "warning");
			}
		}else{
			swal('','Ödeme Yöntemi seçiniz!!!','warning');
			
		}
	});
	
	function getPayments(order_id){
		$.ajax({
			type : "get",
			url : "<?php echo GET_PAYMENTS;?>"+order_id,
			success : function(response){
				default_data = JSON.parse(response);
				
				$(".rest_total").html(default_data.rest_price+" <span class='fa fa-try'></span>");
				$(".paid_total").html(default_data.paid_price+" <span class='fa fa-try'></span>");
				$("input[name='paid_price']").val(default_data.paid_price);
			
					var innerHtml = "";
						
					for( var key in default_data.payments ) {
						innerHtml+= '<div style="padding:10px; border-bottom:1px solid #ddd;">\
										<span class="pull-right">'+default_data.payments[key].paid_price+' <span class="fa fa-try"></span></span>\
										<span class="">'+get_payment_type(default_data.payments[key].payment_type)+'</span>\
									</div>';
					}
					
						$(".payments").html(innerHtml); 
			}
		});
	}
	
	function get_payment_type(type){
		if(type == 'cash'){ return 'Nakit'; }
		if(type == 'credit'){ return 'Kredi Kartı'; }
		if(type == 'open'){ return 'Açık Hesap'; }
		if(type == 'mealCard'){ return 'Yemek Kartı'; }
		if(type == 'discount'){ return 'İndirim'; }
	}
	
	//function savePrintQuit(){
		$(".savePrintQuit").click(function(){
			var dataForm = $("#orderForm").serialize();
			$.ajax({
				type : 'post',
				url : '<?php echo SAVE_ORDER_POST;?>',
				data : dataForm,
				success : function(response){
					console.log(response);
				}
			});
		});
	//}
	
	$(".closeTable").click(function(){
		var table_id = $(this).attr("table_id");
		var order_id = '<?php echo $last_order['order_id'];?>';
		var kiosk_order = '<?php echo $kiosk_order;?>';
		$.ajax({
			type : "get",
			url : "<?php echo GET_REST_PRICE;?>"+order_id,
			success : function(response){
				order = JSON.parse(response);
				var rest_pricex = order.rest_price;
				console.log(rest_pricex);
				if(rest_pricex == 0.00){
					$.ajax({
						type : "post",
						url : "<?php echo CLOSE_TABLE;?>",
						data : {"table_id" : table_id, "order_id" : order_id},
						success : function(response){
							if(response == 'success'){
								
								if(kiosk_order == '1'){
									location.reload();
								}else{
									window.location.href = '<?php echo TABLES_PAGE;?>';
								}
								
								
							}else{
								console.log(response); 
							}
						}
					});
				}else{
					swal('','Masayı Kapatmak için Ödeme yapılması gerekmektedir!','error');
				}
			
			}
		});
		
	});
	
	function get_rest_price(order_id){
		var rest = '';
		$.ajax({
			type : "get",
			url : "<?php echo GET_REST_PRICE;?>"+order_id,
			success : function(response){
				order = JSON.parse(response);
				rest = parseFloat(order.rest_price);
			}
		});
		return rest;
	}
	
	
	
	$(document).ready(function(){
	
		var height = window.innerHeight
			|| document.documentElement.clientHeight
			|| document.body.clientHeight;
		
		var xheight = parseInt((height / 6) -3);
		var yheight = parseInt((height - 280));
		
		$(".autoHeight").css('height', height+'px');
		$(".leftBt").css('height', xheight+'px');
		$("#cartDiv").css('height', yheight+'px');
		
		cart = [];
		
		$(".order_row").each(function(){
			var id = $(this).attr('id');
			var pro_id = $(this).attr('pro_id');
			var porsion_id = $(this).attr('porsion_id');
			var name = $(this).attr('pro_name');
			var desc = $(this).attr('desc');
			var desc2 = $(this).attr('desc2');
			var price = parseFloat($(this).attr('price')).toFixed(2);
			var total_price = parseFloat($(this).attr('total_price')).toFixed(2);
			var pro_qty = parseInt($(this).attr('qty'));
			var printed = parseInt($(this).attr('printed'));
			var ready = parseInt($(this).attr('ready'));
			
			cart.push({
				id : id,
				pro_id : pro_id,
				qty : pro_qty,
				pro_name : name,
				desc : desc,
				desc2 : desc2,
				pro_price : price,
				porsion_id : porsion_id,
				total : total_price,
				isSaved : 1,
				prnted : printed,
				ready : ready,
				total_price : total_price,
			});
			updateCart();
			
			//isChanged();
		});
		
		$(".porsBtn").click(function(){
			$(".porsBtn").removeClass("black");
			$(this).addClass("black");
			var qty = $(this).attr("rel");
			var desc = $(this).text();
			$(".porsX").val(qty);
			$(".porsX").attr("desc",desc);
		});
		
		$(document).on('click','.prox',function(){
			
			var fixPP = $(".fixP").val();
			var waitPP = $(".waitP").val();
			var porsDesc = $(".porsX").attr("desc");
			
			var pro_id = parseInt($(this).attr('pro_id'));
			var pro_name = $(this).attr('pro_name');
			var porsion_id = $(this).attr('porsion_id');
			
			if(fixPP == '0'){
				var pro_price = parseFloat($(this).attr('pro_price'));
				var fixDesc = '';				
			}
			
			if(fixPP == '1'){
				var pro_price = parseFloat('0.00').toFixed(2);
				var fixDesc = '(Fix)';
			}
			
			if(waitPP == '0'){
				var desc2 = '';
			}
			
			if(waitPP == '1'){
				var desc2 = '(Beklet)';
			}
			
			var pro_qty = $(".porsX").val();
			
			var total_price = parseFloat( pro_price * pro_qty ).toFixed(2);

			var length = cart.length;

					cart.push({
						pro_id : pro_id,
						qty : 1,
						pro_name : pro_name+' '+porsDesc,
						desc : fixDesc,
						desc2 : desc2,
						pro_price : total_price,
						porsion_id : porsion_id,
						total : total_price,
						isSaved : 0,
						prnted : 0
					});

			updateCart();
			proAdded();
			isChanged();
			$(".porsX").val("1");
			$(".porsX").attr("desc","");
			$(".porsBtn").removeClass("black");
		});
		
		function proAdded(){
			$(".proAdded").show();
			$(".proAdded").fadeOut(250);
			
		}
		
		function updateScroll(){
			$('#cartDiv').scrollTop($('#cartDiv')[0].scrollHeight);
		}
		
		function updateCart(){
			
			var iptal = '<?php echo $iptal;?>';
			var ikram = '<?php echo $ikram;?>';
			var fiyat = '<?php echo $fiyat;?>';
			
			if(iptal == '1'){
				var ipt = '';
			}else if(iptal == '0'){
				var ipt = '';
			}else{
				var ipt = 'hidden';
			}
			
			if(ikram == '1'){
				var ikr = '';
			}else if(ikram == '0'){
				var ikr = '';
			}else{
				var ikr = 'hidden';
			}
			
			if(fiyat == '1'){
				var fiy = '';
			}else if(fiyat == '0'){
				var fiy = '';
			}else{
				var fiy = 'hidden';
			}
			
			var length = cart.length;
			var text = "";
			
			var iconx = [];
			var ikr = [];
			var total = "";
		text += '<tr >\
					<td></td>\
					<td class="text-left"><b>Ürün</b></td>\
					<td class="text-left"></td>\
					<td class="text-right cc"><b>Miktar</b></td>\
					<td class="rightPrint text-right"><b>Fiyat</b></td>\
					<td></td>\
				</tr>';
			for (i = 0; i < length; i++){ 
				
				
				var ipt = '';
				if(cart[i].prnted == '1'){
					pr = 'hd';
				}else{
					pr = '';
				}
				
				if(cart[i].desc2 == '(Beklet)'){
					hdd2 = '';
				}else{
					hdd2 = 'hidden';
				}
				
				
				if(cart[i].desc == 'İptal'){
					hd = 'hidePrint';
					ipt = 'hidden';
					iconx[i] = '';
					
				}else if(cart[i].desc == 'İkram'){
					hd = '';
					ipt = '';
					ikr[i] = 'hidden';
					iconx[i] = '';
				}else{
					hd = '';
					ipt = '';
					if( cart[i].ready == 1 ){
						iconx[i] = '<i style="color:#C02E2D" class="glyph-icon flaticon-reception-bell"></i>';
					}else if( cart[i].ready == 2 ){
						iconx[i] = '<i style="color:green" class="fa fa-check"></i>';
					}else if( cart[i].ready == 0 ){
						iconx[i] = '';
					}else if( cart[i].ready == undefined ){
						iconx[i] = '';
					}
				}
				
				if(cart[i].id == undefined){
					var hideClass = 'hidden'+cart[i].id;
					var freeBtn = '';
					var existing = '';
					//console.log(cart[i].id + 'undefined')
				}else{
					var hideClass = 'hidden';
					
					var freeBtn = '<a href="#" data-target="#freeModal_'+[i]+'" pro_id="'+cart[i].id+'" data-toggle="modal" class="fa fa-refresh btn btn-default"></a>';
					var existing = 'exist';
					//console.log(cart[i].id + 'notundefined')
					
				}
				
	
	
	
	text += '<tr class="'+pr+' '+hd+'  cartRow">\
				<td style="white-space:nowrap;">\
					<span><a href="javascript:;" rel="'+[i]+'" class="minus btn abtn fa fa-minus '+hideClass+'"></a></span>\
					<input class="qty qty_'+[i]+'" rel="'+[i]+'" type="hidden" name="qty[]" value="' +cart[i].qty+ '"/>\
					<a href="javascript:;" rel="'+[i]+'" class="plus btn abtn fa fa-plus '+hideClass+'"></a>\
				</td>\
				<td class="text-left"><a href="javascript:;" class="xbxb '+existing+'" rel="'+ [i] +'" idd="'+cart[i].id+'" pro_id="'+cart[i].pro_id+'">'+ cart[i].pro_name +'</a><span style="color:blue;">'+cart[i].desc+'</span> <span style="color:#a54343;">'+cart[i].desc2+'</span></td>\
				<td class="text-left">\
					<span style="">'+iconx[i]+'</span>\
				</td>\
				<td class="text-right cc"><span>' +cart[i].qty+ '</span> </td>\
				<input type="hidden" name="row_id[]" value="' +cart[i].id+ '" />\
				<input type="hidden" name="porsion_id[]" value="'+cart[i].porsion_id+'" />\
				<input type="hidden" name="pro_name[]" value="' +cart[i].pro_name+ '" />\
				<input type="hidden" name="pro_id[]" value="' +cart[i].pro_id+ '" />\
				<input type="hidden" class="desc_'+[i]+'" name="desc[]" value="'+cart[i].desc+'" />\
				<input type="hidden" class="desc2_'+[i]+'" name="desc2[]" value="'+cart[i].desc2+'" />\
				<input type="hidden" class="price_'+[i]+'" name="price[]" value="' +cart[i].pro_price+ '" />\
				<input type="hidden" class="printed_'+[i]+'" name="printed[]" value="' +cart[i].prnted+ '" />\
				<input type="hidden" class="ready_'+[i]+' ready_'+cart[i].id+'" name="ready[]" value="' +cart[i].ready+ '" />\
				<td class="text-right" style="white-space:nowrap;">\
				<input type="text" class="rightPrint total_'+[i]+'" name="total[]" value="' +parseFloat(cart[i].qty * cart[i].pro_price).toFixed(2)+ '" readonly/>\
				<i class="fa fa-try"></i></td>\
				<td>\
				<a href="javascript:;" row_id="'+cart[i].id+'" class="hidePrint fa fa-trash btn abtn2 btn-sm delPro '+hideClass+'" key="'+i+'"></a>\
				'+freeBtn+'\
					<div class="modal fade hidePrint" id="freeModal_'+[i]+'" role="dialog">\
						<div class="modal-dialog" style="position:relative;">\
						  <div class="modal-content">\
							<div class="modal-body">\
							 <?php if($ikr == '1'){ ?>\
							<div class="text-center"><b>İptal veya İkram etmek istediğiniz adeti yazınız.</b></div>\
								<p class="'+ikr[i]+'" style="margin-bottom:15px;">\
									  <div class="row '+ikr[i]+'">\
									  <div class="col-xs-6">\
										<a href="javascript:;" data-dismiss="modal" class="freeBtnFree form-control btn btn-success" idd="'+cart[i].id+'" typ="free" rel="'+[i]+'">İkram</a>\
									  </div>\
									  <div class="col-xs-6">\
										<div class="row">\
											<div class="col-xs-4">\
												<a href="javascript:;" class="form-control btn btn-info ikrNum" process="minus" rel="'+cart[i].id+'"><i class="fa fa-minus"></i></a>\
											</div>\
											<div class="col-xs-4" style="padding:0;">\
												<input type="number" class="form-control freeQty_'+cart[i].id+'" value="1" />\
											</div>\
											<div class="col-xs-4">\
												<a href="javascript:;" class="form-control btn btn-info ikrNum" process="plus" rel="'+cart[i].id+'"><i class="fa fa-plus"></i></a>\
											</div>\
										</div>\
									  </div>\
									  </div>\
								  </p>\
							  <?php }else{ ?>\
							  <div class="text-center"><b>Yetkiniz bulunmamaktadır.</b></div>\
							  <?php } ?>\
							  <?php if($ipt == '1'){ ?>\
								  <p class="'+ipt+'" style="margin-bottom:25px;">\
									  <div class="row '+ipt+'">\
										  <div class="col-xs-6">\
											<a href="javascript:;" data-dismiss="modal" class="freeBtnCancel form-control btn btn-danger" idd="'+cart[i].id+'" typ="cancel" rel="'+[i]+'">İptal</a>\
										  </div>\
										  <div class="col-xs-6">\
											<div class="row">\
												<div class="col-xs-4">\
													<a href="javascript:;" class="form-control btn btn-info iptNum" process="minus" rel="'+cart[i].id+'"><i class="fa fa-minus"></i></a>\
												</div>\
												<div class="col-xs-4" style="padding:0;">\
														<input type="number" class="form-control cancelQty_'+cart[i].id+'" value="1" />\
												</div>\
												<div class="col-xs-4">\
													<a href="javascript:;" class="form-control btn btn-info iptNum" process="plus" rel="'+cart[i].id+'"><i class="fa fa-plus"></i></a>\
												</div>\
											</div>\
										  </div>\
									  </div>\
								  </p>\
							  <?php if(($iptDesc == '1') OR ($ikrDesc == '1') OR ($fiyDesc == '1') ){ ?>\
									<input type="text" class="descriptionXX_'+[i]+' form-control" placeholder="Açıklama giriniz" />\
								  <?php } ?>\
							  <?php } ?>\
							  <?php if($fiy == '1'){ ?>\
								  <p  style="margin-bottom:25px;">\
									  <div class="row '+fiy+'">\
										  <div class="col-xs-6">\
										  <a href="javascript:;" data-dismiss="modal" class="btn btn-info form-control pUpd" idd="'+cart[i].id+'" rel="'+[i]+'" qty="'+cart[i].qty+'">Güncelle</a>\
										  </div>\
										  <div class="col-xs-6">\
										  <input type="text" class="form-control newPrice newP_'+[i]+'" placeholder="Fiyat"/></div>\
										</div>\
								 </p>\
							  <?php } ?>\
							  <p  style="margin-bottom:25px;">\
								<div class="row '+hdd2+'">\
									  <div class="col-xs-12">\
										<a href="javascript:;" data-dismiss="modal" class="btn btn-info form-control sendToKitchen" idd="'+cart[i].id+'" rel="'+[i]+'" >Mutfağa Gönder</a>\
									  </div>\
								</div>\
							 </p>\
							</div>\
						  </div>\
						  <div class="passDiv hidden">\
						  <p><input type="text" class="passX_'+[i]+' form-control" placeholder="Şifre Giriniz" /></p>\
						  <p><a href="javascript:;" class="approveX freeBtn2 btn btn-success" rel="'+[i]+'">Onayla</a><span class="repD"></span></p>\
						  </div>\
						</div>\
					  </div>\
				</td>\
			</tr>';
				 
			}
			
			
			var total=0;
			for(i = 0; i < length; i++) { total += parseFloat(cart[i].total); }
			
			$("#cartDivx").html(text);
			total = parseFloat(total).toFixed(2);
			$("#total").html(total+" <i class='fa fa-try'></i>");
			$("#total2").html(total+" <i class='fa fa-try'></i>");
			//console.log(cart);
			
			updateScroll();
		}
		
		
		
		$(document).on("click", ".sendToKitchen", function(){
			var id = $(this).attr("idd");
			var table_id = "<?php echo $last_order['table_id'];?>";
			
			$.ajax({
				type : "post",
				url : "<?php echo SEND_TO_KITCHEN;?>",
				data : { "id" : id, "table_id" : table_id },
				success : function(response){
					if(response == "success"){
						location.reload();						
					}
				}
			});
			
		});
		
		$(document).on("click", ".ikrNum", function(){
			var rel = $(this).attr("rel");
			var process = $(this).attr("process");
			var val = parseInt($(".freeQty_"+rel).val());
			
			if(process == 'plus'){
				var newVal = val+1;
			}
			
			if(process == 'minus'){
				if(val > 1){
					var newVal = val-1;
				}else{
					var newVal = 0;
				}
				
			}
			
			$(".freeQty_"+rel).val(newVal);
			
			
		});
		
		$(document).on("click", ".iptNum", function(){
			var rel = $(this).attr("rel");
			var process = $(this).attr("process");
			var val = parseInt($(".cancelQty_"+rel).val());
			
			if(process == 'plus'){
				var newVal = val+1;
			}
			
			if(process == 'minus'){
				if(val > 1){
					var newVal = val-1;
				}else{
					var newVal = 0;
				}
				
			}
			
			$(".cancelQty_"+rel).val(newVal);
			
			
		});
		
		setInterval(function(){
			var order_id = '<?php echo $last_order['order_id'];?>';
			if(order_id != ''){
				$.ajax({
					type : 'get',
					url : '<?php echo GET_READY_STATUS;?>'+order_id,
					success : function(response){
						dataX = JSON.parse(response);
						
						for(var key in dataX){
							$(".ready_"+dataX[key].id).val(dataX[key].ready);
						}
						
					}
				});
			}
			
		},5000);
		
		$(document).on("click", ".xbxb", function(){
			$(".newDesc2").hide();
			$(".newDesc").show();
			var rel = $(this).attr("rel");
			console.log(cart[rel].desc2);
			$(".descRow").val(cart[rel].desc2);
			$("#descModal").modal('show');
			$(".descRow").attr("rel", rel);
			$(".screenKeyboard").fadeIn();
			
		});
		$(document).on("click", ".exist", function(){
			var pro_id = $(this).attr("pro_id");
			var id = $(this).attr("idd");
			$(".newDesc").hide();
			$(".newDesc2").attr("pro_id", pro_id);
			$(".newDesc2").attr("idd", id);
			$(".newDesc2").show();
			
		});
		
		$(document).on("click", ".freeBtnCancel", function(){
			var idd = $(this).attr("idd");
			var cancelQty = $(".cancelQty_"+idd).val();
			var order_id = '<?php echo $last_order['order_id'];?>';
			var xtype = 'İptal';
			qty_change( idd, cancelQty, order_id, xtype );
		});
		
		$(document).on("click", ".freeBtnFree", function(){
			var idd = $(this).attr("idd");
			var freeQty = $(".freeQty_"+idd).val();
			var order_id = '<?php echo $last_order['order_id'];?>';
			var xtype = 'İkram';
			qty_change( idd, freeQty, order_id, xtype );
		});
		
		$(document).on("click", ".freeBtn", function(){
			var descXX = $(".descXX").val(); // İptal Açıklama Zorunluluğu
			var ikrdescXX = $(".ikrdescXX").val(); // İkram Açıklama Zorunluluğu
			var rel = $(this).attr("rel");
			var type = $(this).attr("typ");
			var idd = $(this).attr("idd");
			var process = type;
			var approve1 = '1';
			var approve2 = '1';
			var cancel = '0';
			
			if( process == 'cancel' ){
			
				if(descXX == '1'){
					
					var descriptionXX = $(".descriptionXX_"+rel).val();
					
					if(descriptionXX == ''){
						swal("","Açıklama kısmı zorunludur!","warning");
						var approve1 = '0';
					}else{
						var cancel = '1';
						var descLastXX = descriptionXX;
						/*------------------------------------------------------*/
							price_change( process, descLastXX, "0.00", idd, cancel );
							
						/*------------------------------------------------------*/
						var approve1 = '1';
					}
					
				}else{
					var cancel = '1';
					var descLastXX = "-";
					/*------------------------------------------------------*/
						price_change( process, descLastXX, "0.00", idd, cancel );
					/*------------------------------------------------------*/
					var approve1 = '1';
					//alert(approve1);
				}
			
				qty_change( idd, qty );
			
			}
			
			if( process == 'free' ){
			
				if(ikrdescXX == '1'){
					
					var descriptionXX = $(".descriptionXX_"+rel).val();
					
					if(descriptionXX == ''){
						swal("","Açıklama kısmı zorunludur!","warning");
						var approve2 = '0';
					}else{
						
						var descLastXX = descriptionXX;
						/*------------------------------------------------------*/
							price_change( process, descLastXX, "0.00", idd, cancel );
						/*------------------------------------------------------*/
						var approve2 = '1';
					}
					
				}else{
						
					var descLastXX = "-";
					/*------------------------------------------------------*/
						price_change( process, descLastXX, "0.00", idd, cancel );
					/*------------------------------------------------------*/
					var approve2 = '1';
				}
				
			}
			
			if( ( approve1 == '1' ) && ( approve2 == '1' ) ){
				var desc = $(this).text();
				$(".total_"+rel).val('0.00');
				$(".isFree").val('1');
				$(".price_"+rel).val('0.00');
				$(".desc_"+rel).val(desc);
				$(".passDiv").removeClass("hidden");
				$("#orderForm").submit();
			}
			
			
		});
		
		$(document).on("click", ".pUpd", function(){
			
			var fiyDescXX = $(".fiyDescXX").val(); // Fiyat Güncelleme Açıklama Zorunluluğu
			var rel = $(this).attr("rel");
			var idd = $(this).attr("idd");
			var newPP = parseFloat($(".newP_"+rel).val()).toFixed(2);
			var qty = parseFloat($(this).attr("qty")).toFixed(2);
			var cancel = '0';
			var newP = parseFloat(newPP * qty).toFixed(2);
			
			if(newP > 0){
				if(fiyDescXX == '1'){
				
					var descriptionXX = $(".descriptionXX_"+rel).val();
					
					if(descriptionXX == ''){
						swal("","Açıklama kısmı zorunludur!","warning");
					}else{
						var descLastXX = descriptionXX;
						/*------------------------------------------------------*/
							price_change( "priceUpdate", descLastXX, newP, idd, cancel );
						/*------------------------------------------------------*/
						var approve = '1';
					}
					
				}else{
					var descLastXX = "-";
					/*------------------------------------------------------*/
						price_change( "priceUpdate", descLastXX, newP, idd, cancel );
					/*------------------------------------------------------*/
					var approve = '1';
				}
				
				if(approve == '1'){
					$(".desc_"+rel).val("FD");
					$(".isFree").val('1');
					$(".total_"+rel).val(newP);
					$(".price_"+rel).val(newPP);
					$("#orderForm").submit();
				}
				
				
			}else{
				swal("","Fiyat Girişi zorunludur!","warning");
			}
			
		});
		
		// ---------------------------------- FİYAT GÜNCELLEME - İPTAL İKRAM ---------------------//
		
		
		
		function price_change( process, description, last_price, idd, cancel ){
			$.ajax({
				type : "post",
				url : "<?php echo CANCEL_PRINT;?>",
				data : { "process": process, "last_price" :  last_price, "id" : idd, "table_id" : <?php echo $table['table_id'];?>, "description" : description, "cancel" : cancel },
				success : function(response){
					console.log(response);
				}
			});
		}
		
		function qty_change( idd, cancelQty, order_id, xtype ){
			
			$.ajax({
				type : "post",
				url : "<?php echo QTY_CHANGE;?>",
				data : { "id" : idd, "cancelQty" : cancelQty, "order_id" : order_id, "type" : xtype },
				success : function(response){
					if(response == "success"){
						location.reload();
					}
					if(response == "qtyError"){
						swal("","Toplam adetten daha büyük bir değer giremezsiniz!","warning");
					}
					if(response == "error"){
						swal("","Hatalı İşlem!","warning");
					}
				}
			});
		}
		
		// ---------------------------------- FİYAT GÜNCELLEME - İPTAL İKRAM ---------------------//
				
		$(".empty").click(function(){
			cart = [];
			$("#cartDivx").html("");
			$("#total").html("0.00 <i class='fa fa-try'></i>");
			$("#total2").html("0.00 <i class='fa fa-try'></i>");
		});
		
		$(document).on("click",".delPro",function(){
			var key = $(this).attr("key");
			$(this).parent().parent().remove();
			//remove(cart, key);
			cart.splice(key,1);
			updateCart();
			isChanged();
		});
		
		function remove(array, element) {
			const index = array.indexOf(element);
			array.splice(index, 1);
		}
		
		$(document).on("click", ".plus", function(){
			var rel = $(this).attr("rel");
			var qty = parseInt($(".qty_"+rel).val());
			var new_qty = parseInt(qty+1);
			$(".qty_"+rel).val(new_qty);
			price_update(new_qty,rel);
			cart[rel].qty = new_qty;
			cart[rel].total = parseFloat(new_qty*cart[rel].pro_price).toFixed(2);
			updateCart();
			isChanged();
		});
		
		$(document).on("click", ".minus", function(){
			var rel = $(this).attr("rel");
			var qty = parseInt($(".qty_"+rel).val());
			if(qty > 1){
				var new_qty = parseInt(qty-1);
				$(".qty_"+rel).val(new_qty);
				price_update(new_qty,rel);
				cart[rel].qty = new_qty;
				cart[rel].total = parseFloat(new_qty*cart[rel].pro_price).toFixed(2);
				updateCart();
				isChanged();
			}
			
		});
		
		$(document).on("click", ".newDesc", function(){
			//console.log(cart);
			var descx = $(".descRow").val();
			//console.log(descx);
			var rel = $(".descRow").attr("rel");
			
			cart[rel].desc2 = descx;
			$(".desc2_"+rel).val(descx);
			updateCart();
			isChanged();
			$(".descRow").val("");
			$(".screenKeyboard").fadeOut();
		});
		
		$(document).on("click", ".newDesc2", function(){
			
			var descx = $(".descRow").val();
			var rel = $(".descRow").attr("rel");
			
			var id = $(this).attr("idd");
			var pro_id = $(this).attr("pro_id");
			
			$.ajax({
					type : "post",
					url : "<?php echo UPDATE_NOTE;?>",
					data : { "id" : id, "desc2" : descx, "table_id" : <?php echo $table['table_id'];?> },
					success : function(response){
						console.log(response);
					}
				});
			
			cart[rel].desc2 = descx;
			$(".desc2_"+rel).val(descx);
			updateCart();
			$(".screenKeyboard").fadeOut();
			
			$("#orderForm").submit();
			
		});
		
		function price_update(new_qty,rel){
			var price = parseFloat($(".price_"+rel).val()).toFixed(2);
			var total = parseFloat(price * new_qty).toFixed(2);
			
			
			$(".total_"+rel).val(total);
		}
		
		$(".addNote").click(function(){
			var note = $(".noteArea").val().trim();
			var formData = $("#noteForm").serialize();
			if(note != ''){
				$.ajax({
					type : "post",
					url : "<?php echo ADD_NOTE_TO_ORDER;?>",
					data : formData,
					success : function(response){
						if(response == 'success'){
							swal('','Not Eklenmiştir!','success');
							location.reload();
						}else{
							swal('','Hata oluştu!!!','error');
						}
					}
					
				});
			}
		});
		
		$(".addCustomer").click(function(){
			
			var tblId = parseInt(<?php echo $table['table_id'];?>);
			
			if(tblId > 0){
				
				var full_name = $(".full_name").val().trim();
				var phone = $(".phone").val().trim();
				var formData = $("#customerForm").serialize();
				if((full_name != '') && ( phone != '' ) ){
					$.ajax({
						type : "post",
						url : "<?php echo ADD_CUSTOMER_TO_ORDER;?>",
						data : formData,
						success : function(response){
							if(response == 'success'){
								swal('','Müşteri Eklenmiştir!','success');
								location.reload();
							}else if(response == 'phone_error'){
								swal('','Bu telefon numarası ile daha önce kayıt yapılmıştır!','error');
							}else if(response == 'empty_table'){
								swal('','Lütfen müşteri eklemeden önce sipariş oluşturunuz!','warning');
							}else if(response == 'same_customer'){
								swal('','Bu müşteri bu siparişe daha önce eklenmiştir!','error');
							}else{
								swal('','Hata oluştu!!!','error');
							}
						}
						
					});
				}else{
					swal('','İsim ve Telefon alanları zorunludur!','warning');
				}
				
			}
			
			if(tblId == 0){
				
				$(".addCustomer").click(function(){
					var full_name = $(".full_name").val().trim();
					var phone = $(".phone").val().trim();
					var address = $(".address").val().trim();
					var formData = $("#customerForm").serialize();
					if( (full_name != '') && ( phone != '' ) && ( address != '' ) ){
						
						if( phone.length < 14 ){
							swal("","Eksik telefon numarası girdiniz!","warning");
						}else{
						
						
							$.ajax({
								type : "post",
								url : "<?php echo ADD_CUSTOMER_TO_PHONE_ORDER;?>",
								data : formData,
								success : function(response){
									var customer = JSON.parse(response);
									
									var custId = customer.customer_id;
									var name = $(this).attr("name");
									var addrss = "";
									
									addrss += '<select name="address_id" class="form-control select2 addressId">';
									addrss += '<option value="">Seçiniz</option>';
									addrss += '<option value="'+customer.address_id+'">'+address+'</option>';
									addrss += '</select>';
									
									$("#addrContainer").html(addrss);
									
									$(".customer_id").val(custId);
									$(".cxname").text(full_name);
									$('.modal').modal('hide');
									$(".select2").select2();
									
									
									if(customer.msg == 'phone_error'){
										swal('','Bu telefon numarası ile daha önce kayıt yapılmıştır!','error');
									}
								}
								
							});
						
						
						}
						
					}else{
						swal('','İsim, telefon ve adres girilmesi zorunludur!','warning');
					}
				});
				
			}
			
		});
		
		$(".srcCustomers").keyup(function(){
			
			var name = $(this).val().trim();
			
			if( name.length > 2 ){
				$.ajax({
					type : "post",
					url : "<?php echo SEARCH_CUSTOMERS;?>",
					data : {"name" : name},
					success : function(response){
						if(response != 'noresults'){
							default_data = JSON.parse(response);
							var innerHtml = "";
								
							for( var key in default_data ) {
								innerHtml+= "<div><a href='javascript:;' phone='"+default_data[key].phone+"' custId='"+default_data[key].customer_id+"' addresses='"+default_data[key].addresses+"' class='selectCustomer' name='"+default_data[key].full_name+"'>";
								innerHtml+= default_data[key].full_name+" - "+default_data[key].phone;	
								innerHtml+= "</a></div>";
							}
								innerHtml+= '<div><a href="javascript:;" class="selectCustomerNew"><span class="nameSpan"> "<span class="newC">'+name+'</span>" &nbsp;&nbsp;&nbsp; <span>Yeni Ekle...</span></span> <span class="pull-right btn butonX1 newCB">YENİ EKLE</span><span class="clearfix"></span></a></div>';
								$(".srcResults2").html(innerHtml);
						}else{
							$(".srcResults2").html('<div><a href="javascript:;" class="selectCustomerNew"><span class="nameSpan"> "<span class="newC">'+name+'</span>" &nbsp;&nbsp;&nbsp; <span style="color:red">Müşteri Bulunamadı...</span> </span> <span class="pull-right btn butonX1 newCB">YENİ EKLE</span><span class="clearfix"></span></a></div>');
						}
					}
					
				});
			}else{
				$(".srcResults2").html("");
			}
		});
		
		
	});
	
	$(document).on("click", ".newCB", function(){
		var newName = $(".newC").html();
		$("#customerForm").removeClass("hidden");
		$(".full_name").val(newName.toUpperCase());
	});
	
	$(document).on("click", ".selectCustomer", function(){
		
		var curCustId = "<?php echo $last_order['customer_id'];?>";
		var custId = $(this).attr("custid");
		var tblId = parseInt(<?php echo $table['table_id'];?>);
		//alert(custId);
		if( curCustId != "" ){
			
			swal({
			  title: '',
			  text: "Kayıtlı müşteri güncellenecektir, onaylıyor musunuz?",
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#5b5351',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'EVET!',
			  cancelButtonText: 'VAZGEÇ'
			}).then(function (result) {
			  if (result.value) {
				// handle confirm 
				
				
				var order_id = '<?php echo $last_order['order_id'];?>';
				
					$.ajax({
						type : "post",
						url : "<?php echo UPDATE_CUSTOMER_ORDER;?>",
						data : { "customer_id" : custId, "order_id" : order_id },
						success : function(response){
							console.log(custId);
							console.log(order_id);
							if(response == 'success'){
								swal("","Müşteri Güncellenmiştir!","success");
								location.reload();
							}
							if(response == 'same_customer'){
								swal("","Aynı müşteriyi eklemeye çalışıyorsunuz.","error");
							}
							if(response == 'empty_table'){
								swal("","Lütfen önce siparişi kaydediniz!","warning");
							}
						}
					});
				
			  } else {
				// handle cancel
			  }
			}); 
			
		}else{
			if(tblId > 0){
				swal("","Lütfen önce siparişi kaydediniz!","warning");
			}else{
				if(tblId == 0){
					
					var custId = $(this).attr("custid");
					var name = $(this).attr("name");
					var addresses = JSON.parse($(this).attr("addresses"));
					var addrss = "";
					
					addrss += '<select name="address_id" class="form-control select2 addressId">';
					addrss += '<option value="">Seçiniz</option>';
					for(var key in addresses){
						addrss += '<option value="'+addresses[key].id+'">'+addresses[key].address_name+' - '+addresses[key].address+'</option>';
					}
					
					addrss += '</select>';
					
					$("#addrContainer").html(addrss);
					
					$(".customer_id").val(custId);
					$(".cxname").text(name);
					$('.modal').modal('hide');
					$(".select2").select2();
					
				}
			}
		}

		
		
	});
	
	$(".xBtn").click(function(){
		$(".xBtn").removeClass("act");
		$(this).addClass("act");
		var rel = $(this).attr("rel");
		$(".ccc").hide();
		$("."+rel).fadeIn();
	});
	
	$(".openPay").click(function(){
		$('#myModal').modal('hide');
	});
	
</script>
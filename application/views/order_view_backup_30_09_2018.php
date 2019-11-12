<?php include('includes/header-order.php');?>
<link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet">
<style type="text/css">
	.mobileTab{width:50%; float:left; background:#ddd; cursor:pointer; padding:15px; line-height:1; font-weight:bold;text-align:center;}
	.mactive{background:#5EC76A; color:#fff;}
	.slideM{position:absolute;left:0; right:0;top:0;bottom:0; background:#ffffffdb;display:none;}
	.borderR{border-right:1px solid #ddd;}
	.yanone{font-family: 'Yanone Kaffeesatz', sans-serif;display:table-cell;vertical-align:middle;}
	a:focus{color:#fff;}
	.body{position: fixed;  bottom:0;  top:0;  right:0;  left:0;  overflow:hidden;}
	.f20{font-size:20px;}
	.f25{font-size:25px;}
	.f30{font-size:30px;}
	.w80{width:80%; float:left;}
	.w20{width:20%; float:left;}
	.cat_name{background:#5bc0de;}
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
	.payDiv{padding:25px 15px; font-size:20px;  border:1px solid #ddd;cursor:pointer;position:relative;}
	.bgBlue{background:#00B2C9;color:#fff;}
	.pymnt{border-bottom:1px solid #ddd;padding:10px 0;}
	.payBottom{position:absolute; bottom:0; right:0; left:0; background:#fff; z-index:2;}
	.totalX{font-size:22px; font-weight:bold;}
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
	.tableD{background:#3D3D3D; border-radius:3px; color:#fff;  padding:10px;display:block; font-size:25px;text-align:center;}
	.srcResults2{margin-top:15px;}
	.srcResults2 div{background:#f5f5f5;font-size:18px; line-height:1; cursor:pointer;}
	.srcResults2 div:hover{background:#ddd;}
	.srcResults2 div a{color:#666;font-weight:bold;display:block;padding:15px;border-bottom:1px solid #666;}
	.nameSpan{display:inline-block; padding:9px 0;}
	.payxDiv{-webkit-box-shadow: 0px 0px 2px 0px rgba(0,0,0,0.75);
			-moz-box-shadow: 0px 0px 2px 0px rgba(0,0,0,0.75);
			box-shadow: 0px 0px 2px 0px rgba(0,0,0,0.75);}
	@media only screen and (max-width: 600px){
		.leftDiv{display:none;}
		.yanone{font-size:16px;height:60px;}
	}
	
</style>

<div class="table">
	<div class="row" style="margin:0;">
		<div class="col-sm-1 autoHeight leftDiv" style="padding:0;"> 
			<div>
				<a href="javascript:;"  class="leftBt tablesPage" style="background:#3D3D3D;" link="<?php echo TABLES_PAGE;?>">
					<b> <i class="fa fa-th"></i> <br /></b>Masalar
				</a>
				<a href="javascript:;"  class="leftBt" data-toggle="modal" data-target="#noteModal" style="background:#3D3D3D;">
					<b><i class="fa fa-edit"></i><br /></b>Not
				</a>
				<a href="javascript:;"  class="leftBt" data-toggle="modal" data-target="#customerModal" style="background:#3D3D3D;">
					<b><i class="fa fa-user"></i><br /></b>Müşteri
				</a>
				<a href="javascript:;" class="printKitchen leftBt" style="background:#3D3D3D;">
					<b><i class="fa fa-print"></i>  <br /></b>Mutfak
				</a>
				<a href="javascript:;" class="printX leftBt" style="background:#3D3D3D;">
					<b><i class="fa fa-print"></i> <br /></b>Adisyon
				</a>
				<a href="javascript:;" class="leftBt tablesPage" style="background:#3D3D3D;"  link="<?php echo MAIN_BOARD;?>">
						<b><i class="fa fa-home"></i> <br /></b>Ana Sayfa
				</a>
			</div>
		</div>
		<div id="printDiv" class="col-sm-4 autoHeight" style="padding:0;padding-right:3px; border-right:1px solid #4b4b4b;">
			<div class="hidePrint visible-xs">
				<div class="mobileTab mactive borderR" rel="adisyonDiv">
					Adisyon
				</div>
				<div class="mobileTab" rel="menuDiv">
					Menü
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="xtab menuDiv hidePrint" style="display:none; position:absolute;">
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
				<div style="margin-top:3px;">
					<div class="tableD hidePrint" style="text-align:center;font-size:25px;">
						<b>Masa <?php echo $table['table_name'];?></b>
						<?php if($table['is_busy'] == '1'){ ?>
						
						<a href="javascript:;" style="margin:0 5px" data-toggle="modal" data-target="#tableModal" class="btn btn-info pull-right"><i class="fa fa-exchange"></i></a>
						
						<a href="javascript:;" data-toggle="modal" data-target="#peopleModal" class="btn btn-info pull-right"><i class="fa fa-users"></i></a>
						<?php } ?>
					</div>
				</div>
				<div class="showPrint">
					<?php echo date('d.m.Y H:i');?>
					<span style="float:right; display:inline-block;">
						<b>Masa <?php echo $table['table_name'];?></b>
					</span>
				</div>
				<?php if($last_order['customer_id'] > 0){ ?>
					<div class="showPrint" style="padding:10px 0;">
						<div>
							<b>Müşteri : <?php echo $customer['full_name'];?></b>
						</div>
					</div>
				<?php }?>
				<?php if($last_order['customer_id'] > 0){ ?>
					<div class="hidePrint" style="background:#ddd; padding:10px;">
						<div><b>Müşteri : <?php echo $customer['full_name'];?></b></div>
					</div>
				<?php }?>
				<div class="calculatex" style="position:relative;">
					<div id="cartDiv">
						<form id="orderForm" action="<?php echo ORDER_POST;?>" method="post">
							<input type="hidden" name="table_id" value="<?php echo $table['table_id'];?>"/>
							<input type="hidden" name="order_id" id="order_id" value="<?php echo $last_order['order_id'];?>"/>
							<input type="hidden" name="paid_price" value="<?php echo $last_order['paid_price'];?>"/>
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
						</form>
					</div>
					
				</div>
				
				<div class="payBottom">
						
						<div style="padding:10px;padding-right:0;">
							
							<div class="row" style="background:#f7f7f7; margin:0 1px;">
								<div class="col-xs-12 rightPrint hd" style="padding-top:5px;">
									<span class="pull-left">Toplam :</span>
									<span class="pull-right totalX" id="total" style=''>0.00</span> 
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="row hidePrint" style="margin:0 1px;white-space:nowrap;">
								<div class="col-xs-8" style="padding-top:5px;">
									<span class="pull-left">Ödenen :</span>
								</div>
								<div class="col-xs-4">
								<?php 
									if(!empty($discounts)){
										$disc = '1';
										foreach($discounts as $key => $val){
											$totalDisc += $val['paid_price'];
										}
										$paid_price = $last_order['paid_price'] - $totalDisc ;
									}else{
										$paid_price = $last_order['paid_price'] ;
									}
								?>
									<span class="pull-right totalX paid_total"  id="paid_total" style=''> 
									
										<?php echo $paid_price;?> <span class="fa fa-try"></span>
									
									</span>
								</div>
							</div>
							
							<?php if( $disc == '1' ){ ?>
								<div class="row" style="background:#f7f7f7; margin:0 1px;white-space:nowrap;">
									<div class="clearfix"></div>
									<div class="col-xs-12 rightPrint hd" style="padding-top:5px;">
										<span class="pull-left">İndirim :</span>
										<span class="pull-right totalX" id=""> <?php echo number_format((float)$totalDisc, 2, '.', '');?> <span class="fa fa-try"></span></span>
										
									</div>
								</div>
							<?php } ?>					
							
							<div class="row" style="background:#fff; margin:0 1px;">
								<div class="clearfix"></div>
									<div class="col-xs-12 rightPrint hd" style="padding-top:5px;">
										<span class="pull-left">Kalan :</span>
										<span class="pull-right totalX rest_total rest_total1" id="rest_total"> 
											<?php echo $last_order['rest_price'];?> <span class="fa fa-try"></span>
										</span>
										
									</div>
							</div>
						</div>
						<div style="" class="hidePrint">
							<table class="table">
								<tr>
									<td style="padding:9px 2px !important">
										<span class="">
											<?php if($table['is_busy'] == '1'){ ?>
												<a href="javascript:;" table_id="<?php echo $table['table_id'];?>" class="btn btn-2 btn-2c btn-sm btn-float hidden-xs" data-toggle="modal" data-target="#myModal" style="font-size:15px;background:#5ec76a;"><b>ÖDE</b></a>
												
												<a href="javascript:;" table_id="<?php echo $table['table_id'];?>" class="btn btn-2 btn-2c btn-sm btn-float  closeTable" style="font-size:15px"><b>KAPAT</b></a>
																							
												<a href="javascript:;" data-toggle="modal" data-target="#discountModal" class="btn btn-2 btn-2c btn-sm btn-float  " style="font-size:15px"><b>İNDİRİM</b></a>
												
											<?php } ?> 
										</span>
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
		<div class="col-sm-4 autoHeight hidden-xs removeXs" style="padding:0; background:#f5f5f5; overflow-y:auto; background:#6d6b6b; ">
			<div class="btnxDiv"></div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>

<!-- Modal -->
<div id="peopleModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Kişi Sayısı</h4>
      </div>
      <div class="modal-body">
		<form action="<?php echo PERSON_POST;?>" method="post">
			<div class="row">
				<div class="col-xs-4">
					<input type="number" name="person" class="form-control" value="<?php echo $last_order['person'];?>" />
					<input type="hidden" name="order_id" value="<?php echo $last_order['order_id'];?>" />
				</div>
				<div class="col-xs-4">
					<input type="submit" class="btn btn-info form-control" value="Güncelle"/>
				</div>
			</div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
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
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Masa Birleştirme & Değiştirme</h4>
      </div>
      <div class="modal-body">
        <div class="">
			<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#home">Masa Değiştir</a></li>
			  <li><a data-toggle="tab" href="#menu1">Masa Birleştir</a></li>
			</ul>

			<div class="tab-content">
			  <div id="home" class="tab-pane fade in active">
				<div class="row">
					<form action="<?php echo CHANGE_TABLE;?>" method="post">
						<div class="col-xs-4">
							<div><b>1. Masa</b></div>
							<div style="padding:10px"><b><?php echo $table['table_name'];?></b></div>
							<input type="hidden" name="table_id_2" value="<?php echo $table['table_id'];?>" />
						</div>
						<div class="col-xs-4">
							<div><b>2. Masa</b></div>
							<div>
								<select name="table_id_1" class="form-control" required>
									<option value="">Masa Seçiniz</option>
									<?php foreach($empty_tables as $key => $val){ ?>
										<option value="<?php echo $val['table_id'];?>">
											<?php echo $val['table_name'];?>
										</option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-xs-4">
							<div><b>&nbsp;</b></div>
							<input type="submit" class="btn btn-info form-control" value="Masa Değiştir" />
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
						<div class="col-xs-4">
							<div><b>1. Masa</b></div>
							<div style="padding:10px"><b><?php echo $table['table_name'];?></b></div>
							<input type="hidden" name="table_id_2" value="<?php echo $table['table_id'];?>" />
						</div>
						<div class="col-xs-4">
							<div><b>2. Masa</b></div>
							<div>
								<select name="table_id_1" class="form-control" required>
									<option value="">Masa Seçiniz</option>
									<?php foreach($tables as $key => $val){ ?>
										<option value="<?php echo $val['table_id'];?>">
											<?php echo $val['table_name'];?>
										</option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-xs-4">
							<div><b>&nbsp;</b></div>
							<input type="submit" class="btn btn-info form-control" value="Birleştir" />
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
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
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
				<div class="col-xs-4">
					<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-user"></i> &nbsp;&nbsp; MÜŞTERİ İSMİ</span>
				</div>
				<div class="col-xs-8">
					<input type="text" class="srcCustomers form-control" placeholder="Müşteri Ara..." />
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
					<div class="col-xs-4">
						<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-user"></i> &nbsp;&nbsp; MÜŞTERİ İSMİ</span>
					</div>
					<div class="col-xs-8">
						<input type="hidden" name="order_id" value="<?php echo $last_order['order_id'];?>" />
						<input type="text" name="full_name" class="form-control full_name" required placeholder="Müşteri Ad - Soyad" />
					</div>
					<div class="clearfix"></div>
				</div>
			</p>
			<p>
				<div class="">
					<div class="col-xs-4">
						<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-phone"></i> &nbsp;&nbsp; TELEFON</span>
					</div>
					<div class="col-xs-8">
						<input type="text" id="phone" name="phone" pattern="[0-9]{1}-[0-9]{3}-[0-9]{3}-[0-9]{4}" required title="0-212-123-4567"  placeholder="Telefon" class="form-control"/>
					</div>
					<div class="clearfix"></div>
				</div>
			</p>
			<p>
				<div class="">
					<div class="col-xs-4">
						<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-envelope"></i> &nbsp;&nbsp; E-MAIL</span>
					</div>
					<div class="col-xs-8">
						<input type="text" name="email" class="form-control email" placeholder="E-mail" />
					</div>
					<div class="clearfix"></div>
				</div>
			</p>
			<p>
				<div class="">
					<div class="col-xs-4">
						<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; ADRES</span>
					</div>
					<div class="col-xs-8">
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
      <div class="modal-header">
       
        <h4 class="modal-title">Not Ekleme</h4>
      </div>
      <div class="modal-body">
        <p>
			<form id="noteForm">
				<input type="hidden" name="order_id" value="<?php echo $last_order['order_id'];?>" />
				<textarea name="note" class="form-control noteArea" id="" cols="30" rows="5"><?php echo $last_order['order_note'];?></textarea>
			</form>
		</p>
		<p>
			<a href="javascript:;" class="addNote btn btn-info pull-right big_btn">Ekle</a>
			<button type="button" class="btn btn-default big_btn" data-dismiss="modal">Kapat</button>
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
			Kalan Tutar : <span class="rest_priceX"><?php echo $last_order['rest_price'];?></span> <span class="fa fa-try"></span>
		</p>
		
		<p>
			<a href="javascript:;" data-dismiss="modal" order_id="<?php echo $last_order['order_id'];?>"  class="btn btn-success addDisc">İndirim Ekle</a>
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
		<span style="font-size:22px; display:inline-block; padding:20px;">
			<?php if($last_order['customer_id'] > 0){ ?>
				<?php echo $customer['full_name'];?>
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
		
			<?php if($settings[$val['payment_code']] == '1'){ ?>
				<div class="payDiv 
				<?php if($val['payment_code'] == 'open'){ 
					if($last_order['customer_id'] < 1){ 
						echo 'openPay';
					} 
				}?>" payment_id="<?php echo $val['payment_id'];?>" 
					<?php if($last_order['customer_id'] < 1){ 
						if($val['payment_code'] == 'open'){
					?> 
					data-toggle="modal" data-target="#customerModal" 
					<?php } ?>
					<?php } ?>
					rel="<?php echo $val['rel'];?>"
					sub="<?php if(!empty($val['sub_payment_types'])){ echo 'sub'; }?>"
					>
					<i class="fa fa-<?php echo $val['icon'];?>"></i> &nbsp;&nbsp;&nbsp; <?php echo $val['payment_name'];?>
				</div>
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
		qty="<?php echo $val['qty'];?>" 
		price="<?php echo $val['price'];?>" 
		total_price="<?php echo $val['total_price'];?>" 
		printed="<?php echo $val['printed'];?>" 
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

<?php include('includes/footer-order.php');?>
<script type="text/javascript">

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
								innerHtml += '<div class="w33">';
								innerHtml += '<button ';
								if(opt1.one == '1'){
									innerHtml += 'class="prox btnXX  f25 btn btn-2 btn-2c yanone"\
													pro_name="'+rowData.pro_list[key].pro_name+' '+porsion.porsion_name+'" \
													pro_id="'+porsion.pro_id+'" \
													porsion_id="'+porsion.id+'" \
													pro_price="'+porsion.porsion_price+'"';
								}else{
									innerHtml += 'class="btn btn-2 btn-2c  f25 btnXX yanone" ';
									innerHtml += 'data-toggle="modal" data-target="#pro_'+rowData.pro_list[key].pro_id+'"';
								}
								
								if(pro_bg != ''){
									innerHtml += 'style="background:'+pro_bg+' !important" ';
								}
								
								innerHtml += 'rel="'+rowData.pro_list[key].pro_id+'">';
								
								
								
								
								innerHtml += '<span>'+rowData.pro_list[key].pro_name+'</span>';
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
															<a class="grBtn_'+opt.pro_id+' prox prox1 btn btn-2 btn-2c f25 btnXX yanone" href="javascript:;"\
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
														 
															innerHtml += '<span style="display:inline-block; margin:3px;"><a href="javascript:;"\
																data-toggle="modal" data-target="#pro_'+opt.pro_id+'"\
																class="prox prox1 btn btn-2 btn-2c f25 btnXX yanone"\
																pro_name="'+rowData.pro_list[key].pro_name+' - '+opt.porsion_name+'" \
																pro_id="'+opt.pro_id+'" \
																porsion_id="'+opt.id+'" \
																style="margin-right:5px;"\
																pro_price="'+opt.porsion_price+'"> '+opt.porsion_name+'\
																</a></span>';
													  }
											  }
										  innerHtml += '</div>\
										  <div class="modal-footer">\
											<button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>\
										  </div>\
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
		
		var order_content = $("#cartDivx").html();
		if(order_content != ''){
			screenLoader();
			$("#orderForm").submit();
		}else{
			swal('','Kaydetmek için En az 1 ürün girmelisiniz!','warning');
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
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Evet!',
			  cancelButtonText: 'Vazgeç'
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
		var amount = $("#amount").val();
		var ptype = $('.payment_type').val();
		var sub_p_id = $('.sub_p_id').val();
		var cust_id = '<?php echo $customer['customer_id'];?>';
		var table_id = $(this).attr("table_id");
		var order_id = '<?php echo $last_order['order_id'];?>';
		if(ptype != ''){	
			if(amount != ''){	
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
						}else{
							swal('',response,'warning'); 
						}
					}
				});
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
								window.location.href = '<?php echo TABLES_PAGE;?>';
							}else{
								alert(response); 
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
			var price = parseFloat($(this).attr('price')).toFixed(2);
			var total_price = parseFloat($(this).attr('total_price')).toFixed(2);
			var pro_qty = parseInt($(this).attr('qty'));
			var printed = parseInt($(this).attr('printed'));
			
			cart.push({
				id : id,
				pro_id : pro_id,
				qty : pro_qty,
				pro_name : name,
				desc : desc,
				pro_price : price,
				porsion_id : porsion_id,
				total : total_price,
				isSaved : 1,
				prnted : printed
			});
			updateCart();
			
			//isChanged();
		});
		
		$(document).on('click','.prox',function(){
			var pro_id = parseInt($(this).attr('pro_id'));
			var pro_name = $(this).attr('pro_name');
			var porsion_id = $(this).attr('porsion_id');
			var pro_price = parseFloat($(this).attr('pro_price')).toFixed(2);
			var pro_qty = 1;

			var length = cart.length;

					cart.push({
						pro_id : pro_id,
						qty : pro_qty,
						pro_name : pro_name,
						desc : '',
						pro_price : pro_price,
						porsion_id : porsion_id,
						total : pro_price,
						isSaved : 0,
						prnted : 0
					});

			updateCart();
			proAdded();
			isChanged();
			//console.log(cart);
			//console.log(cart.length);
		});
		
		function proAdded(){
			$(".proAdded").show();
			$(".proAdded").fadeOut(1500);
			
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
			var total = "";
		text += '<tr >\
					<td></td>\
					<td class="text-left"><b>Ürün</b></td>\
					<td class="text-right cc"><b>Miktar</b></td>\
					<td class="rightPrint text-right"><b>Fiyat</b></td>\
					<td></td>\
				</tr>';
			for (i = 0; i < length; i++){ 
				if(cart[i].id == undefined){
					var hideClass = 'hidden'+cart[i].id;
					var freeBtn = '';
					//console.log(cart[i].id + 'undefined')
				}else{
					var hideClass = 'hidden';
					var freeBtn = '<a href="#" data-target="#freeModal_'+[i]+'" data-toggle="modal" class="fa fa-refresh btn btn-default"></a>';
					//console.log(cart[i].id + 'notundefined')
				}
				//console.log(cart[i].id);
				
				if(cart[i].prnted == '1'){
					pr = 'hd';
				}else{
					pr = '';
				}
				
				if(cart[i].desc == 'İptal'){
					hd = 'hidePrint';
				}else{
					hd = '';
				}
			
	text += '<tr class="'+pr+' '+hd+'">\
				<td style="white-space:nowrap;">\
					<span><a href="javascript:;" rel="'+[i]+'" class="minus btn abtn fa fa-minus '+hideClass+'"></a></span>\
					<input class="qty qty_'+[i]+'" rel="'+[i]+'" type="hidden" name="qty[]" value="' +cart[i].qty+ '"/>\
					<a href="javascript:;" rel="'+[i]+'" class="plus btn abtn fa fa-plus '+hideClass+'"></a>\
				</td>\
				<td class="text-left">' + cart[i].pro_name + '\
				<span style="color:blue;">'+cart[i].desc+'</span>\
				</td>\
				<td class="text-right cc"><span>' +cart[i].qty+ '</span> </td>\
				<input type="hidden" name="row_id[]" value="' +cart[i].id+ '" />\
				<input type="hidden" name="porsion_id[]" value="'+cart[i].porsion_id+'" />\
				<input type="hidden" name="pro_name[]" value="' +cart[i].pro_name+ '" />\
				<input type="hidden" name="pro_id[]" value="' +cart[i].pro_id+ '" />\
				<input type="hidden" class="desc_'+[i]+'" name="desc[]" value="'+cart[i].desc+'" />\
				<input type="hidden" class="price_'+[i]+'" name="price[]" value="' +cart[i].pro_price+ '" />\
				<input type="hidden" class="printed_'+[i]+'" name="printed[]" value="' +cart[i].prnted+ '" />\
				<td class="text-right" style="white-space:nowrap;">\
				<input type="text" class="rightPrint total_'+[i]+'" name="total[]" value="' +parseFloat(cart[i].qty * cart[i].pro_price).toFixed(2)+ '" readonly/>\
				<i class="fa fa-try"></i></td>\
				<td>\
				<a href="javascript:;" row_id="'+cart[i].id+'" class="hidePrint fa fa-trash btn abtn2 btn-sm delPro '+hideClass+'" key="'+i+'"></a>\
				'+freeBtn+'\
					<div class="modal fade hidePrint" id="freeModal_'+[i]+'" role="dialog">\
						<div class="modal-dialog modal-sm" style="position:relative;">\
						  <div class="modal-content">\
							<div class="modal-body">\
							  <p class="'+ikr+'"><a href="javascript:;" data-dismiss="modal" class="freeBtn btn btn-success" rel="'+[i]+'">İkram</a></p>\
							  <p class="'+ipt+'"><a href="javascript:;" data-dismiss="modal" class="freeBtn btn btn-danger" rel="'+[i]+'">İptal</a></p>\
							  <p class="">\
							  <div class="row '+fiy+'">\
								  <div class="col-xs-6">\
								  <input type="text" class="form-control newPrice newP_'+[i]+'" placeholder="Fiyat"/></div>\
								  <div class="col-xs-6">\
								  <a href="javascript:;" data-dismiss="modal" class="btn btn-info form-control pUpd" rel="'+[i]+'">Güncelle</a>\
								  </div>\
							  </div>\
							 </p>\
							  <p class="hidden"><a href="javascript:;" data-dismiss="modal" class="freeBtn btn btn-warning" rel="'+[i]+'">İade</a></p>\
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
		
		$(".approveX").click(function(){
			var i = $(this).attr("rel");
			
			var pass = parseInt($(".passX_"+i).val());
			
			if(pass == 4321){
				$(".passDiv").addClass("hidden");
				$(".passX_"+i).val("");
				/* setTimeout(function(){
					$(".passDiv").removeClass("hidden");
				},10000); */
			}else{
				$(".repD").text("Şifre Hatalıdır!");
			}
		});
		
		$(document).on("click", ".freeBtn", function(){
			var rel = $(this).attr("rel");
			var desc = $(this).text();
			$(".total_"+rel).val('0.00');
			$(".price_"+rel).val('0.00');
			$(".desc_"+rel).val(desc);
			$(".passDiv").removeClass("hidden");
			$("#orderForm").submit();
			isChanged();
		});
		
		$(document).on("click", ".pUpd", function(){
			var rel = $(this).attr("rel");
			var newP = parseFloat($(".newP_"+rel).val()).toFixed(2);
			$(".total_"+rel).val(newP);
			$(".price_"+rel).val(newP);
			$("#orderForm").submit();
		});
		
		$(".empty").click(function(){
			cart = [];
			$("#cartDivx").html("");
			$("#total").html("0.00 <i class='fa fa-try'></i>");
			$("#total2").html("0.00 <i class='fa fa-try'></i>");
		});
		
		$(document).on("click",".delPro",function(){
			var key = $(this).attr("key");
			$(this).parent().parent().remove();
			remove(cart, key);
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
			var full_name = $(".full_name").val().trim();
			var formData = $("#customerForm").serialize();
			if(full_name != ''){
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
								innerHtml+= "<div><a href='javascript:;' phone='"+default_data[key].phone+"' custId='"+default_data[key].customer_id+"' class='selectCustomer'>";
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
		
		if( curCustId != "" ){
			if( confirm( " Kayıtlı müşteri güncellenecektir, onaylıyor musunuz? " ) ){
			var custId = $(this).attr("custId");
			var order_id = '<?php echo $last_order['order_id'];?>';
			
				$.ajax({
					type : "post",
					url : "<?php echo UPDATE_CUSTOMER_ORDER;?>",
					data : { "customer_id" : custId, "order_id" : order_id },
					success : function(response){
						//console.log(response);
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
			}
		}else{
			swal("","Lütfen önce siparişi kaydediniz!","warning");
		}

		
		
		/* var phone = $(this).attr("phone");
		var name = $(this).text();
		$(".full_name").val(name);
		$(".phone").val(phone);
		$(".custDiv").html("<input type='hidden' name='customer_id' value='"+custId+"' />"); */
		
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
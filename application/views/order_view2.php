<?php include('includes/header-order.php');?>
<link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet">
<style type="text/css">
	.yanone{font-family: 'Yanone Kaffeesatz', sans-serif;}
	a:focus{color:#fff;}
	.body{position: fixed;  bottom:0;  top:0;  right:0;  left:0;  overflow:hidden;}
	.f20{font-size:20px;}
	.f25{font-size:25px;}
	.f30{font-size:30px;}
	.cat_name{background:#5bc0de;}
	input{width:40px;border:0;background:transparent;}
	.w50{width:50%; float:left !important;padding:2.5px;box-sizing:border-box;}
	.w46{width:48.333%; float:left !important; margin:0 2.5px 2.5px 2.5px;height:100px;}
	.w33{width:33.333%; float:left !important;padding:2.5px;box-sizing:border-box;}
	.btnXX{width:100%;height:100px;line-height:1.1;font-family: 'Yanone Kaffeesatz', sans-serif;}
	.digit{width:33.333%; float:left; padding:10px; margin:0; font-size:35px; text-align:center; background:#00B2C9; color:#fff;border:1px solid #ddd;}
	.del{width:33.333%; float:left; padding:10px; font-size:35px; background:#e41e55; color:#fff; text-align:center; border:1px solid #ddd;}
	.delPro{color:#EF4C4C;}
	.payDiv{padding:25px 15px; font-size:30px;  border:1px solid #ddd;cursor:pointer;}
	.bgBlue{background:#82cef2;color:#fff;}
	.pymnt{border-bottom:1px solid #ddd;padding:10px 0;}
	.payBottom{position:absolute; bottom:0; right:0; left:0; background:#fff; z-index:2;}
	.totalX{font-size:22px; font-weight:bold;}
	.showPrint{display:none;}
	.xBtn{text-align:center; border:1px solid #ddd; padding:20px 0;cursor:pointer;}
	.act{background:#ddd;}
	.prox{padding: 15px; /* margin-right: 15px; margin-bottom:15px; */}
	.prox1{padding: 25px; margin-right: 15px; margin-bottom:15px; }
	.abtn{border-right:1px solid #ddd; color:#000; border-radius:0;padding:15px;}
	.abtn2{border-radius:0;padding:15px;}
	td{padding:10px !important;}
	.leftBt{padding-top:30%; border-radius:3px; margin:3px; color:#fff; display:block; font-size:18px;text-align:center;}
	.big_btn{padding:20px; font-weight:bold;font-size:15px !important;}
	.showKitchen{display:none;}
	.discount{width:100%; font-size:20px; padding:15px;border:1px solid #ddd;}
	.freeBtn{width:100%;padding:20px 10px;}
	.passDiv{padding:15px;position:absolute; top:0; bottom:0; left:0; right:0; background:rgba(255,255,255,0.9); }
	
	@media only screen and (max-width: 600px){
		.mdDiv{display:none;position:fixed;top:0;right:0;left:0; bottom:60px;z-index:11;background:#fff;padding:15px;}
		.w50{width:100%;}
		.w33{width:50%;height:100px;}
		.f25{font-size:16px;}
		.lfDiv{display:none;}
		.mobileBar{padding:15px; background:#000; color:#fff;position:fixed; bottom:0;right:0;left:0; z-index:12;}
		.btnXX{height:auto;}
		.catsBar{padding:15px; background:#000; color:#fff;}
		.catWrapper{display:none; max-height:200px;overflow-y:auto;}
	}
	
	
</style>
<?php //debug($last_order);?>
<div class="row hidden">
	<span class="pull-right">
		<?php echo date('d.m.Y');?>
	</span>
</div>
<div class="table">
	<div class="row" style="margin:0;">
		<div id="lBtns" class="col-sm-1 autoHeight hidden-xs" style="padding:0;"> 
			<div>
				<a href="javascript:;"  class="leftBt tablesPage" style="background:#3D3D3D;">
					<b> <i class="fa fa-th"></i> <br /></b>Masalar
				</a>
				<a href="javascript:;"  class="leftBt" data-toggle="modal" data-target="#noteModal" style="background:#31d686;">
					<b><i class="fa fa-edit"></i><br /></b>Not
				</a>
				<a href="javascript:;"  class="leftBt" data-toggle="modal" data-target="#customerModal" style="background:#ef4c4c;">
					<b><i class="fa fa-user"></i><br /></b>Müşteri
				</a>
				<a href="javascript:;" class="printKitchen leftBt" style="background:#666;">
					<b><i class="fa fa-print"></i>  <br /></b>Mutfak
				</a>
				<a href="javascript:;" class="printX leftBt" style="background:#222;">
					<b><i class="fa fa-print"></i> <br /></b>Adisyon
				</a>
				<a href="<?php echo MAIN_BOARD;?>" class="leftBt" style="background:#4757B9;">
						<b><i class="fa fa-home"></i> <br /></b>Ana Sayfa
				</a>
			</div>
		</div>
		<div id="printDiv" class="col-sm-4 autoHeight" style="padding:0; ">
			<div style="margin-top:3px;">
				<div style="background:#3D3D3D; border-radius:3px; color:#fff;  padding:10px;display:block; font-size:25px;text-align:center;">
					<b>Masa <?php echo $table['table_name'];?></b>
					<?php if($table['is_busy'] == '1'){ ?>
					
					<a href="javascript:;" style="margin:0 5px" data-toggle="modal" data-target="#tableModal" class="btn btn-info pull-right"><i class="fa fa-exchange"></i></a>
					
					<a href="javascript:;" data-toggle="modal" data-target="#peopleModal" class="btn btn-info pull-right"><i class="fa fa-users"></i></a>
					<?php } ?>
				</div>
			</div>
			<div class="showPrint">
				<?php echo date('d.m.Y H:i');?>
			</div>
			<?php if($last_order['customer_id'] > 0){ ?>
				<div class="showPrint" style="padding:10px 0;">
					<div><b>Müşteri : <?php echo $customer['full_name'];?></b></div>
				</div>
			<?php }?>
			<?php if($last_order['customer_id'] > 0){ ?>
				<div class="hidePrint" style="background:#ddd; padding:10px;">
					<div><b>Müşteri : <?php echo $customer['full_name'];?></b></div>
				</div>
			<?php }?>
			<div class="calculatex" style="position:relative;">
				<div id="cartDiv" style="max-height:350px; overflow-y:auto;">
					<form id="orderForm" action="<?php echo ORDER_POST;?>" method="post">
						<input type="hidden" name="table_id" value="<?php echo $table['table_id'];?>"/>
						<input type="hidden" name="order_id" id="order_id" value="<?php echo $last_order['order_id'];?>"/>
						<input type="hidden" name="paid_price" value="<?php echo $last_order['paid_price'];?>"/>
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
					
					<div style="padding:10px;">
						
						<div class="row" style="background:#f7f7f7; margin:0 1px;">
							<div class="col-xs-12 rightPrint hd" style="padding-top:5px;">
								<span class="pull-left">Toplam :</span>
								<span class="pull-right totalX" id="total" style=''>0.00</span> 
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="row hidePrint" style="margin:0 1px;">
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
								
									<?php echo $paid_price;?> ₺
								
								</span>
							</div>
						</div>
						
						<?php if( $disc == '1' ){ ?>
							<div class="row" style="background:#f7f7f7; margin:0 1px;">
								<div class="clearfix"></div>
								<div class="col-xs-12 rightPrint hd" style="padding-top:5px;">
									<span class="pull-left">İndirim :</span>
									<span class="pull-right totalX" id=""> <?php echo $totalDisc;?> ₺</span>
									
								</div>
							</div>
						<?php } ?>					
						
						<div class="row" style="background:#fff; margin:0 1px;">
							<div class="clearfix"></div>
								<div class="col-xs-12 rightPrint hd" style="padding-top:5px;">
									<span class="pull-left">Kalan :</span>
									<span class="pull-right totalX rest_total rest_total1" id="rest_total"> 
										<?php echo $last_order['rest_price'];?> ₺
									</span>
									
								</div>
						</div>
					</div>
					<div style="" class="hidePrint">
						<table class="table">
							<tr>
								<td style="padding:5px">
									<span class="">
										<?php if($table['is_busy'] == '1'){ ?>
											<a href="javascript:;" table_id="<?php echo $table['table_id'];?>" class="btn btn-info btn-sm btn-float " data-toggle="modal" data-target="#myModal" style="font-size:15px"><b>Öde</b></a>
											
											<a href="javascript:;" table_id="<?php echo $table['table_id'];?>" class="btn btn-danger btn-sm btn-float  closeTable" style="font-size:15px"><b>Kapat</b></a>
											
											<a href="javascript:;" data-toggle="modal" data-target="#discountModal" class="btn btn-info btn-sm btn-float  " style="font-size:15px"><b>İndirim</b></a>
											
										<?php } ?> 
									</span>
								</td>
								<td style="padding:5px !important">
									<a href="javascript:;" class="btn btn-success btn-float btn-sm saveOrder pull-right" style="font-size:15px">
										 <b>Kaydet</b> 
									</a>
								</td>
								
							</tr>
						</table>
						<div class="mobileBar visible-xs">
							<a href="javascript:;" class="tglCats"><i class="fa fa-2x fa-bars"></i></a>
						</div>
					</div>
				</div>
			<div class="clearfix"></div>
			<div class="showPrint showKitchen" style="">
				<?php if($last_order['order_note'] != ''){ ?>
					Not : <?php echo $last_order['order_note'];?>
				<?php } ?>
			</div>
			<div class="showPrint enjoyTxt" style="text-align:center;">
				Afiyet olsun...
			</div>
		</div>
		<div class="col-sm-3 autoHeight mdDiv" style="padding:0;  overflow-y:auto;">
			<div class="visible-xs catsBar">
				Kategoriler 
				<a href="javascript:;" class="pull-right tglCbtn">
					<i class="fa fa-chevron-down"></i>
				</a>
				<div class="clearfix"></div>
			</div>
			<div class="catWrapper">
			<?php foreach($cats as $key => $val){ ?>
				<div class="w50">
					<button type="button" class="btn btn-info btn-float cat_name f25 btnXX yanone" rel="<?php echo $val['cat_id'];?>">
					<span><?php echo $val['cat_name'];?></span>
					</button>
				</div>
			<?php } ?>
			<div class="clearfix"></div>
			</div>
			<div class="btnxDiv visible-xs"></div>
		</div>
		<div class="col-sm-4 autoHeight lfDiv" style="background:#f4f4f4; overflow-y:auto; ">
			<div class="btnxDiv hidden-xs"></div>
			
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
      <div class="modal-header">
       
        <h4 class="modal-title">Müşteri Ara & Ekle</h4>
      </div>
      <div class="modal-body">
        
		<p>
			<input type="text" class="srcCustomers form-control" placeholder="Müşteri Ara..." />
		</p>
		<div class="srcResults2"></div>
		<div class="clearfix"></div><hr />
		<form id="customerForm">
			<p><b>Müşteri Bilgileri</b></p>
			<p>
				<input type="hidden" name="order_id" value="<?php echo $last_order['order_id'];?>" />
				<input type="text" name="full_name" class="form-control full_name" placeholder="Müşteri Ad - Soyad" />
			</p>
			<div class="custDiv"></div>
			<p>
				<input type="text" name="phone" class="form-control phone" placeholder="Telefon" />
			</p>
			<p>
				<input type="text" name="email" class="form-control email" placeholder="E-mail" />
			</p>
			<p>
				<input type="text" name="address" class="form-control address" placeholder="Adres" />
			</p>
		</form>
		<p>
			<a href="javascript:;" class="addCustomer btn btn-info pull-right big_btn">Yeni Ekle</a>
			<a href="javascript:;" class="addCustomer btn btn-success pull-right big_btn">Seç</a>
			<button type="button" class="btn btn-default big_btn" data-dismiss="modal">Kapat</button>
		</p>
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
					<div>₺</div>
					<input type="text" class="discount amoDisc" placeholder="Tutar" />
				</div>
			</div>
		</p>
		<p>
			Kalan Tutar : <span class="rest_priceX"><?php echo $last_order['rest_price'];?></span> ₺
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
		<img src="<?php echo IMG;?>success/success.jpg" width="250" alt="" />
	  </div>
      <div class="modal-body" style="padding:3px;">
	  <div style="padding:5px; background:#4757B9; color:#fff;">
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
	  <div class="row" style="padding-bottom:15px;">
		<div class="col-sm-4">
			<div class="col-sm-12">
				<div class="row">
					<div class="w33 xBtn act" rel="details">Adisyon</div>
					<div class="w33 xBtn" rel="payments">Tahsilatlar</div>
					
					<div class="w33 xBtn" rel="parts">Ürün Öde</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="col-sm-12">
				<div class="row ccc payments" style="display:none;  max-height: 316px; overflow-y: auto;">
					<?php foreach($payments as $key => $val){ ?>
						<div style="padding:10px; border-bottom:1px solid #ddd;">
						<span class="pull-right"><?php echo $val['paid_price'];?> ₺</span>
							<span class="">
								<?php if($val['payment_type'] == 'credit'){ echo 'Kredi Kartı';}?>
								<?php if($val['payment_type'] == 'cash'){ echo 'Nakit';}?>
								<?php if($val['payment_type'] == 'open'){ echo 'Açık Hesap';}?>
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
									<?php echo $val['total_price'];?> ₺
								</span>
							</span>
						
						</div>
						
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="col-sm-4 noP" style="padding:0;">
		
			<div style="">
				
				<div style="">
					<div class="">
						<div class="col-xs-12 pymnt">
							<div class="">
								<span style="display:inline-block; padding-top:5px;">Toplam Kalan:</span> 
								<span class="pull-right rest_total" id="rest_total" style='font-size:22px; font-weight:bold;display:inline-block; padding-right:10px;'>
									<?php echo $last_order['rest_price'];?> ₺
								</span>
							</div>
							
						</div>
					</div>
					<div class="">
						<div class="col-xs-12 pymnt">
							<div class="">
								<span style="display:inline-block; padding-top:5px;">Tahsil Edilen :</span> 
								<span class="pull-right paid_total" id="paid_total" style='font-size:22px; font-weight:bold;display:inline-block; padding-right:10px;'>
									<?php echo $last_order['paid_price'];?> ₺
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
			
			<div>
				
				<a href="javascript:;" class="digit" rel="1">1</a>
				<a href="javascript:;" class="digit" rel="2">2</a>
				<a href="javascript:;" class="digit" rel="3">3</a>
				
				<a href="javascript:;" class="digit" rel="4">4</a>
				<a href="javascript:;" class="digit" rel="5">5</a>
				<a href="javascript:;" class="digit" rel="6">6</a>
				
				<a href="javascript:;" class="digit" rel="7">7</a>
				<a href="javascript:;" class="digit" rel="8">8</a>
				<a href="javascript:;" class="digit" rel="9">9</a>
				
				<a href="javascript:;" class="digit" rel="0">0</a>
				<a href="javascript:;" class="digit" rel=".">,</a>
				<a href="javascript:;" class="del"><i class="fa fa-chevron-left"></i><i class="fa fa-chevron-left"></i></a>
			</div>
			
		</div>
		<div class="col-sm-4">
		
			<div class="payDiv" rel="cash">
				<i class="fa fa-money"></i> &nbsp;&nbsp;&nbsp; Nakit
			</div>
			<div class="payDiv" rel="credit">
				<i class="fa fa-credit-card"></i> &nbsp;&nbsp;&nbsp; Kredi Kartı
			</div>
			<div class="payDiv <?php if($last_order['customer_id'] < 1){ ?>openPay <?php } ?>" rel="open" <?php if($last_order['customer_id'] < 1){ ?> data-toggle="modal" data-target="#customerModal" <?php } ?>>
				<i class="fa fa-id-card"></i> &nbsp;&nbsp;&nbsp; Açık Hesap
			</div>
			
			<div class="">
				<input style="width:100%;float:left;height:90px; padding-left:20px; font-weight:bold; font-size:35px; border:1px solid #ddd;" type="text" name="paid" id="amount" placeholder="Tutar Giriniz" readonly="readonly"/>
				
			</div>
			<input type="hidden" class="payment_type" name="payment_type" value=""/>
			
		</div>
	  </div>
      </div>
    </div>

  </div>
</div>
<input type="hidden" class="isChanged" value="0" />
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

<?php include('includes/footer-order.php');?>
<script>

$(".tglCats").click(function(){
	$(".mdDiv").slideToggle();
});
$(".tglCbtn").click(function(){
	$(".catWrapper").slideToggle();
});

$(".percDisc").keyup(function(){
	var rest = parseFloat($(".rest_priceX").text()).toFixed(2);
	var perc = parseFloat($(this).val().trim()).toFixed(2);
	
	//alert(perc); 
	if(perc > 0){
		var percPrice = parseFloat( (rest * perc ) / 100).toFixed(2);
		var percPrice2 = parseFloat( percPrice * (-1) ).toFixed(2);
		$(".amoDisc").val(percPrice);
		$(".addDisc").attr("pro_price", percPrice2);
	}
});

$(".amoDisc").keyup(function(){
	///alert("test");
	var rest = parseFloat($(".rest_priceX").text()).toFixed(2);
	var disc = parseFloat($(this).val().trim()).toFixed(2);
	//alert(perc); 
	if(disc > 0){
		var percPrice = parseFloat( (disc / rest) * 100 ).toFixed(2);
		var percPrice2 = parseFloat( disc * (-1) ).toFixed(2);
		//alert(percPrice);
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
	//alert(perc); 
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
	printDiv();
});
$(".printKitchen").click(function(){
	printKitchen();
	location.reload();
});
function printDiv() 
{

  var divToPrint=document.getElementById('printDiv');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html>\
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
		var type = $(this).attr("rel");
		$(".payment_type").val(type);
		$(".payDiv").removeClass("bgBlue");
		$(this).addClass("bgBlue");
	});
	$(".digit").click(function(){
		var rel = $(this).attr("rel");
		var amount = $("#amount").val();
		var newAmount = amount+rel;
		$("#amount").val(newAmount);
	});
	
	$(".del").click(function(){
		var str = $("#amount").val();
		str = str.slice(0, -1);
		$("#amount").val(str);
	});

	/* $(".cat_name").click(function(){
		$(".hcat").hide();
		var rel = $(this).attr("rel");
		$(".cat_"+rel).fadeIn();
	
	}); */
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
						innerHtml += '<div class="w33">\
										<button type="button" class="btn btn-info btn-float cat_name f25 btnXX yanone" rel="'+rowData.sub_cat_list[key].cat_id+'">\
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
								innerHtml += '<div class="w33">';
								innerHtml += '<button ';
								if(opt1.one == '1'){
									innerHtml += 'class="prox btnXX yanone f25 btn btn-info"\
													pro_name="'+rowData.pro_list[key].pro_name+' - '+porsion.porsion_name+'" \
													pro_id="'+porsion.pro_id+'" \
													porsion_id="'+porsion.id+'" \
													pro_price="'+porsion.porsion_price+'"';
								}else{
									innerHtml += 'class="btn btn-info btn-float f25 btnXX yanone" ';
									innerHtml += 'data-toggle="modal" data-target="#pro_'+rowData.pro_list[key].pro_id+'"';
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
										  <div class="modal-body">';
											  for(var kk in rowData.pro_list[key].options){
												  
												  var opt = rowData.pro_list[key].options[kk];
												 
													innerHtml += '<a href="javascript:;"\
														data-toggle="modal" data-target="#pro_'+opt.pro_id+'"\
														class="prox prox1 btn btn-success"\
														pro_name="'+rowData.pro_list[key].pro_name+' - '+opt.porsion_name+'" \
														pro_id="'+opt.pro_id+'" \
														porsion_id="'+opt.id+'" \
														pro_price="'+opt.porsion_price+'"> '+opt.porsion_name+' - '+opt.porsion_price+' ₺\
													</a>';
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
	
	$(".saveOrder").click(function(){
		var order_content = $("#cartDivx").html();
		if(order_content != ''){
			$("#orderForm").submit();
		}else{
			alert('Kaydetmek için En az 1 ürün girmelisiniz!');
		}
		
	
	});
	$(".tablesPage").click(function(){
		var link = '<?php echo TABLES_PAGE;?>';
		var isC = $(".isChanged").val();
		//alert(isC);
		if(isC == '1'){
			if(confirm('Sayfada Kaydedilmemiş değişiklikler var. Çıkmak istediğinizden emin misiniz?')){
				window.location.href = link;
			}else{
				return false;
			}
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
		var cust_id = '<?php echo $customer['customer_id'];?>';
		var table_id = $(this).attr("table_id");
		var order_id = '<?php echo $last_order['order_id'];?>';
		if(ptype != ''){	
			if(amount != ''){	
				$.ajax({
					type : "post",
					url : "<?php echo ORDER_PAYMENT_POST;?>",
					data : {"amount" : amount, "table_id" : table_id, "order_id" : order_id, "payment_type" : ptype, "customer_id" : cust_id },
					success : function(response){
						if(response == 'success'){
							$("#successDiv").show();
							$("#successDiv").fadeOut(500);
							getPayments(order_id);
							$("#amount").val("");
						}else{
							alert(response); 
						}
					}
				});
			}else{
				alert("Lütfen Tutar Giriniz!!!");
			}
		}else{
			alert("Ödeme Yöntemi seçiniz!!!");
		}
	});
	
	function getPayments(order_id){
		$.ajax({
			type : "get",
			url : "<?php echo GET_PAYMENTS;?>"+order_id,
			success : function(response){
				default_data = JSON.parse(response);
				
				$(".rest_total").html(default_data.rest_price+" ₺");
				$(".paid_total").html(default_data.paid_price+" ₺");
			
					var innerHtml = "";
						
					for( var key in default_data.payments ) {
						innerHtml+= '<div style="padding:10px; border-bottom:1px solid #ddd;">\
										<span class="pull-right">'+default_data.payments[key].paid_price+' ₺</span>\
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
		if(type == 'discount'){ return 'İndirim'; }
	}
	
	$(".closeTable").click(function(){
		var table_id = $(this).attr("table_id");
		var order_id = '<?php echo $last_order['order_id'];?>';
		//alert(table_id);
		//var rest_price = parseFloat(<?php echo $last_order['rest_price'];?>).toFixed(2);
		
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
					alert('Masayı Kapatmak için Ödeme yapılması gerekmektedir!');
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
		
		var width = parseInt(window.innerWidth);
		alert(width);
		var height = window.innerHeight
			|| document.documentElement.clientHeight
			|| document.body.clientHeight;
		
		var xheight = parseInt((height / 6) -3);
		
		
		if(width > 600){
			$(".autoHeight").css('height', height+'px');
			$(".leftBt").css('height', xheight+'px');
		}else{
			$("#printDiv").css('height', '400px');
		}
		
		
		
		
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
			isChanged();
			console.log(cart);
			//console.log(cart.length);
		});
		
		function updateCart(){
			
			var length = cart.length;
			var text = "";
			var total = "";
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
				console.log(cart[i].id);
				
				if(cart[i].prnted == '1'){
					pr = 'hd';
				}else{
					pr = '';
				}
				
	text += '<tr class="'+pr+'">\
				<td style="white-space:nowrap;">\
					<span><a href="javascript:;" rel="'+[i]+'" class="minus btn abtn fa fa-minus '+hideClass+'"></a></span>\
					<input class="qty qty_'+[i]+'" rel="'+[i]+'" type="hidden" name="qty[]" value="' +cart[i].qty+ '"/>\
					<a href="javascript:;" rel="'+[i]+'" class="plus btn abtn fa fa-plus '+hideClass+'"></a>\
				</td>\
				<td><span>' +cart[i].qty+ '</span> &nbsp;&nbsp;&nbsp;&nbsp;' + cart[i].pro_name + '\
				<span style="color:blue;">'+cart[i].desc+'</span>\
				</td>\
				<input type="hidden" name="row_id[]" value="' +cart[i].id+ '" />\
				<input type="hidden" name="porsion_id[]" value="'+cart[i].porsion_id+'" />\
				<input type="hidden" name="pro_name[]" value="' +cart[i].pro_name+ '" />\
				<input type="hidden" name="pro_id[]" value="' +cart[i].pro_id+ '" />\
				<input type="hidden" class="desc_'+[i]+'" name="desc[]" value="'+cart[i].desc+'" />\
				<input type="hidden" class="price_'+[i]+'" name="price[]" value="' +cart[i].pro_price+ '" />\
				<input type="hidden" class="printed_'+[i]+'" name="printed[]" value="' +cart[i].prnted+ '" />\
				<td style="white-space:nowrap;">\
				<input type="text" class="rightPrint total_'+[i]+'" name="total[]" value="' +parseFloat(cart[i].qty * cart[i].pro_price).toFixed(2)+ '" readonly/>\
				<i class="fa fa-try"></i></td>\
				<td>\
				<a href="javascript:;" row_id="'+cart[i].id+'" class="hidePrint fa fa-trash btn abtn2 btn-sm delPro '+hideClass+'" key="'+i+'"></a>\
				'+freeBtn+'\
					<div class="modal fade hidePrint" id="freeModal_'+[i]+'" role="dialog">\
						<div class="modal-dialog modal-sm" style="position:relative;">\
						  <div class="modal-content">\
							<div class="modal-body">\
							  <p><a href="javascript:;" data-dismiss="modal" class="freeBtn btn btn-success" rel="'+[i]+'">İkram</a></p>\
							  <p><a href="javascript:;" data-dismiss="modal" class="freeBtn btn btn-danger" rel="'+[i]+'">İptal</a></p>\
							  <p class="hidden"><a href="javascript:;" data-dismiss="modal" class="freeBtn btn btn-warning" rel="'+[i]+'">İade</a></p>\
							</div>\
						  </div>\
						  <div class="passDiv hidden">\
						  <p><input type="password" class="passX form-control" placeholder="Şifre Giriniz" /></p>\
						  <p><a href="javascript:;" class="approveX freeBtn btn btn-success" >Onayla</a><span class="repD"></span></p>\
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
			console.log(cart);
		}
		
		$(".approveX").click(function(){
			var pass = $(".passX").val();
			if(pass == '4321'){
				$(".passDiv").addClass("hidden");
				$(".passX").val("");
				setTimeout(function(){
					
					$(".passDiv").removeClass("hidden");
				},10000);
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
			isChanged();
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
			
			//alert(total);
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
							alert('Not Eklenmiştir!');
							location.reload();
						}else{
							alert('Hata oluştu!!!');
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
							alert('Müşteri Eklenmiştir!');
							location.reload();
						}else{
							alert('Hata oluştu!!!');
						}
					}
					
				});
			}
		});
		
		$(".srcCustomers").keyup(function(){
			var name = $(this).val().trim();
			
			if(name != ''){
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
								innerHtml+= default_data[key].full_name;	
								innerHtml+= "</a></div>";
							}
							
								$(".srcResults2").html(innerHtml);
						}
					}
					
				});
			}else{
				$(".srcResults2").html("");
			}
		});
		
		
	});
	
	$(document).on("click", ".selectCustomer", function(){
		var custId = $(this).attr("custId");
		var phone = $(this).attr("phone");
		var name = $(this).text();
		$(".full_name").val(name);
		$(".phone").val(phone);
		$(".custDiv").html("<input type='hidden' name='customer_id' value='"+custId+"' />");
		
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
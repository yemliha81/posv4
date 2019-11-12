<?php include('includes/header-order.php');?>
<style type="text/css">
	body{background:#F5F5F5;}
	.backToHome{font-size:20px;display:inline-block; line-height:1;padding:15px 25px; background:#4972B7; color:#fff;}
	.btn22{font-size:20px;display:inline-block; width:100%;border-bottom:1px solid #fff; line-height:1;padding:15px 25px; background:#30bedb; color:#fff;}
	.cat_btn{padding:20px 10px;font-size:20px; margin-right:5px;}
	.orderx{padding:8px 0; border-bottom:1px solid #ddd;}
	.ordery{background:#eee;border-bottom:1px dotted #666; cursor:pointer;}
	.orderz{background:#666;color:#fff;}
	.orderd{padding:10px 0; border-bottom:1px dashed #ddd;}
	.orderdp{background:#baffe4;padding:10px 0; border-bottom:1px dashed #ddd;}
	.xtab{display:none;}
	.account1{padding: 9px 8px;
    line-height: 1;
    border: 1px solid #d6d1d1;
    border-radius: 3px;
    margin-bottom: 20px; color:#969090}
	.payx{cursor:pointer;display:inline-block;float:left; border:1px solid #ddd; padding:5px; width:100%; background:#f7f7f7;text-align:center;}
	.bgGreen{background:#a3f5c3}
	.payx2{cursor:pointer;display:inline-block;float:left; border:1px solid #ddd; width:100%;font-size:24px; background:#f7f7f7;text-align:center;line-height:88px;}
	table>tbody>tr>td{padding:8px !important;background:#f5f5f5;}
	</style>

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
					<span class="pageTitle"><?php echo $company['company_name'];?></span>
				</div>
				<div class="col-sm-6">
					
				</div>
			</div>
				
			</div>
		</div>
	</div>
	
	
	<div class="mainContainer"style="padding:0 15px;">
	
		<div class="whiteZone f13" style="padding-right:0; padding-left:0;">
			<div class="row" style="padding:0 15px;">
				<div class="col-sm-6">
					
					<div class="panel panel-flat">
					  <div class="panel-heading">
						<h6 class="panel-title"><b>Firma Bilgisi</b></a></h6>
						
					</div>
					  <div class="panel-body">
							<form action="<?php echo UPDATE_COMPANY_POST;?>" method="post">
								<div class="form-group">
									<div class="row">
										<label class="col-lg-3 control-label">Firma Adı:</label>
										<div class="col-lg-9">
											<input type="text" name="company_name" class="form-control" value="<?php echo $company['company_name'];?>">
											<input type="hidden" name="company_id" value="<?php echo $company['company_id'];?>">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<label class="col-lg-3 control-label">Telefon:</label>
										<div class="col-lg-9">
											<input type="text" name="company_phone"  class="form-control" value="<?php echo $company['company_phone'];?>">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<label class="col-lg-3 control-label">Email:</label>
										<div class="col-lg-9">
											<input type="text" name="company_mail"  class="form-control" value="<?php echo $company['company_mail'];?>">
										</div>
									</div>
								</div>
								
								<div class="form-group">
									<div class="row">
										<label class="col-lg-3 control-label">Adres:</label>
										<div class="col-lg-9">
											<input type="text" name="company_address"  class="form-control" value="<?php echo $company['company_address'];?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6">
										<a href="javascript:;" class="butonFile delCompany text-center" style="width:110px;" rel="<?php echo $company['company_id'];?>" >SİL</a>
									</div>
									<div class="col-xs-6">
										<input type="submit" class="butonX1 pull-right text-center" style="width:110px;" value="KAYDET"/>
									</div>
								</div>
							</form>
						</div>
					</div>	
				</div>
				<div class="col-sm-6">
					<!--<div class="panel panel-flat">
					  <div class="panel-heading">
						<h6 class="panel-title"><b>Ödeme Yap</b></a></h6>
						
					</div>
					  <div class="panel-body">
							<form action="<?php echo COMPANY_PAYMENT_POST;?>" method="post">
								<div class="form-group">
									<div class="row">
										<label class="col-lg-3 control-label">Tutar:</label>
										<div class="col-lg-9">
											<input type="text" name="amount" class="form-control" value="">
											<input type="hidden" name="company_id" value="<?php echo $company['company_id'];?>">
										</div>
									</div>
								</div>
								
								<div>
									<input type="submit" class="butonX1 pull-right"  value="KAYDET"/>
									<div class="clearfix"></div>
								</div>
							</form>
						</div>
					</div>-->
					
				</div>
			</div>
			
			<div class="col-xs-12" style="">
				<div class="panel panel-flat">
					  <div class="panel-heading">
						<b>Hesap Geçmişi</b>
					  </div>
					  <div class="panel-body" style="padding:0;">
						<?php foreach($records as $key => $val){ ?>
							<?php if(!empty($val['purchase_id'])){ ;?>
								<div class="orderx ordery" rel="<?php echo $val['purchase_id'];?>">
									<div class="col-sm-3">
										<b>Satın Alma</b>
									</div>
									<div class="col-sm-3">
										<?php echo date("d-m-Y H:i", $val['purchase_insert_time']);?>
									</div>
									<div class="col-sm-2">
										Toplam : <?php echo $val['total_price'];?> ₺
									</div>
									<div class="col-sm-2">
										Kdv Dahil : <?php echo $val['last_total'];?> ₺
									</div>
									<div class="col-sm-1">
										<?php if($val['isPaid'] == '1'){ echo 'Ödendi';}?>
									</div>
									<div class="col-sm-1">
										<a href="javascript:;" class="fa fa-chevron-down pull-right"></a>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="ordertab_<?php echo $val['purchase_id'];?> xtab">
									
									<div class="table-responsive">
										<table class="table">
											<tbody>
												<tr>
													<td><b>Ürün</b></td>
													<td><b>Birim Fiyat</b></td>
													<td><b>Miktar</b></td>
													<td class="text-right"><b>Toplam</b></td>
													
												</tr>
												<?php foreach($val['details'] as $kk => $vv){ ?>
													<tr>
														<td><?php echo $vv['pro_name'];?></td>
														<td><?php echo $vv['purchase_price'];?> ₺</td>
														<td><?php echo $vv['qty'].' '.$vv['unit'];?></td>
														<td class="text-right"><?php echo $vv['total_price'];?> ₺</td>
														
													</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							<?php }else{ ?>
								<div class="orderx" >
									<div class="col-sm-3">
										<b>Sonradan Ödeme</b>
									</div>
									<div class="col-sm-3">
										<?php echo date("d-m-Y H:i", $val['payment_time']);?>
									</div>
									<div class="col-sm-6 text-right">
										Ödeme Tutarı : <?php echo $val['amount'];?> ₺
									</div>
									<div class="clearfix"></div>
								</div>
							<?php } ?>
						<?php } ?>
					  </div>
					</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>

<?php include('includes/footer-order.php');?>
<script type="text/javascript">
	$(document).ready(function(){
		$("span.pie").peity("pie", {width : 100});
	});
	
	$(".delCompany").click(function(){
		
		var rel = $(this).attr("rel");
			
		swal({
			  title: '',
			  text: "Tedarikçiyi silmek üzeresiniz, onaylıyor musunuz?",
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#5b5351',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'EVET!',
			  cancelButtonText: 'VAZGEÇ'
			}).then(function (result) {
			  if (result.value) {
				// handle confirm 
				
					$.ajax({
						type : "post",
						url : "<?php echo DELETE_COMPANY;?>",
						data : { "company_id" : rel },
						success : function(response){
							if(response == 'success'){
								swal("","Tedarikçi silinmiştir!","success");
								setTimeout(function(){
									window.location.href = '<?php echo COMPANIES;?>';
								},1000);
							}else if(response == 'record'){
								swal("","Daha önce bu tedarikçi üzerinden satın alma işlemi gerçekleştirildiği için silinemez.!","error");
							}
						}
					});
				
			  } else {
				// handle cancel
			  }
			}); 	
			
		
	});
	
	$.fn.peity.defaults.pie = {
	  delimiter: null,
	  fill: ["#ff9900", "#fff4dd", "#ffd592"],
	  height: 100,
	  radius: 50,
	  width: 100
	}
	$(".btn22").click(function(){
		var rel = $(this).attr("rel");
		$(".tabx").hide();
		$("."+rel).fadeIn();
	});
	$(".ordery").click(function(){
		var rel = $(this).attr("rel");
		$(".ordertab_"+rel).slideToggle();
	});
	$(".payx").click(function(){
		var ptype = $(this).attr('ptype');
		$(".payx").removeClass("bgGreen");
		$(this).addClass("bgGreen");
		$(".ptype").val(ptype);
	});
	$(".payx2").click(function(){
		var ptype = $(".ptype").val();
		var paid = parseFloat($(".paid").val());
		
		if ( (paid > 0) && (ptype != '') ){
			$("#payForm").submit();
		}else{
			alert("Tutar ve Ödeme Yöntemi alanları zorunludur!");
		}
		
		
	});
	
	
</script>
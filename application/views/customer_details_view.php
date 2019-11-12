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
	.payx{cursor:pointer;text-align:center;}
	.bgGreen{background:#59ea7d}
	.payx2{}
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
					<span class="pageTitle"><?php echo $customer['full_name'];?></span>
				</div>
				<div class="col-sm-6">
					
				</div>
			</div>
				
			</div>
		</div>
	</div>
	
	
	<div class="mainContainer"style="padding:0 15px;">
		<div class="whiteZone f13" style="padding-right:0; padding-left:0;">
			<div class="row" style="margin-top:15px; padding:0 15px;">
				<div class="col-sm-4 ">
					<div class="panel panel-flat hidden">
					  <div class="panel-heading"><b>Açık Hesap Ekstresi</b></div>
					  <div class="panel-body">
						
						
							<?php foreach($debts as $key => $val){ 
								$debt += $val['paid_price'];
							} ?>
					
							<?php foreach($payments as $key => $val){ 
								$paid += $val['paid_price'];
							} ?>
								
						
							<div class="form-group">
							<div class="row">
								<label class="col-lg-3 control-label">Açık Hesap:</label>
								<div class="col-lg-9">
									<input type="text" class="form-control" value="<?php echo number_format((float)$debt, 2, '.', '');?>">
								</div>
							</div>
							</div>
							
							<div class="form-group">
							<div class="row">
								<label class="col-lg-3 control-label">Tahsil Edilen:</label>
								<div class="col-lg-9">
									<input type="text" class="form-control" value="<?php echo number_format((float)$paid, 2, '.', '');?>">
								</div>
							</div>
							</div>
							
							<div class="form-group">
							<div class="row">
								<label class="col-lg-3 control-label">Kalan Bakiye:</label>
								<div class="col-lg-9">
									<input type="text" class="form-control restAmnt" value="<?php echo number_format((float)($debt - $paid), 2, '.', '');?>">
								</div>
							</div>
							</div>
					  </div>
					</div>	
					
					<div class="panel panel-flat">
					  <div class="panel-heading">
						<h6 class="panel-title"><b>Hesap Bilgisi</b></a></h6>
						
					</div>
					  <div class="panel-body"  style="position:relative;">
							<form id="custForm">
								<div class="form-group">
									<div class="row">
										<label class="col-lg-3 control-label" style="padding-top:8px;"><b>İsim : </b></label>
										<div class="col-lg-9">
											<input type="text" name="full_name" class="form-control" value="<?php echo $customer['full_name'];?>" />
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<label class="col-lg-3 control-label" style="padding-top:8px;"><b>Telefon  : </b></label>
										<div class="col-lg-9">
											<input type="text" name="phone" class="form-control" value="<?php echo $customer['phone'];?>">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<label class="col-lg-3 control-label" style="padding-top:8px;"><b>Email : </b></label>
										<div class="col-lg-9">
											<input type="text" name="email" class="form-control" value="<?php echo $customer['email'];?>">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<label class="col-lg-3 control-label" style="padding-top:8px;"><b>Grup : </b></label>
										<div class="col-lg-9">
											<div class="row">
												<div class="col-xs-6">
													<select name="customer_group_id" class="form-control">
														<?php foreach($groups as $key => $val){ ?>
															<option value="0">Seçiniz</option>
															<option value="<?php echo $val['id'];?>" <?php if($val['id'] == $customer['customer_group_id']){ echo 'selected'; }?> >
																<?php echo $val['group_name'];?>
															</option>
														<?php } ?>
													</select>
												</div>
												<div class="col-xs-6" style="padding-top:7.5px;">
													İndirim : %<?php echo $customer['group_discount'];?>
												</div>
											</div>
											
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<label class="col-lg-3 control-label" style="padding-top:8px;"><b>Barkod : </b></label>
										<div class="col-lg-9">
											<input type="text" name="customer_barcode" class="form-control" value="<?php echo $customer['customer_barcode'];?>">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<label class="col-lg-3 control-label"></label>
										<div class="col-lg-9">
											<input type="hidden" name="customer_id" value="<?php echo $customer['customer_id'];?>" />
											
										</div>
									</div>
								</div>
								<input type="button" class="butonX1 pull-right updCust w100 text-center" style="position:absolute; width:90%;right:15px; left:15px; bottom:15px;" value="GÜNCELLE">
							</form>
						</div>
					</div>
					
				</div>
				<div class="col-sm-4">
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h6 class="panel-title" style="display:inline-block;"><b>Adresler</b></h6>
							<a href="javascript:;" 
								style="position:absolute;right: 20px;top: 12px;"
							class="butonFile pull-right" data-toggle="modal" data-target="#addrModal" >Yeni <i class="fa fa-plus"></i></a>
							<div class="clearfix"></div>
						</div>
						<div class="panel-body" style="height:250px; overflow-y:auto;">
							<?php foreach($addresses as $key => $val){ ?>
								<div style="background:#f5f5f5; margin-bottom:5px;border:1px solid #ddd;border-radius:4px;">
									<div class="">
										<div class="row" style="border-bottom:1px solid #ddd;margin:0;">
											<div class="col-xs-8">
												<div class="row" style="padding:7px 10px;">
													<b><?php echo $val['address_name'];?></b>
												</div>
											</div>
											<div class="col-xs-4 text-right">
												<div class="row" style="padding:7px 10px;">
													<a 
														class="updAdr" style="color:#000;"
														adrid="<?php echo $val['id'];?>" 
														address="<?php echo $val['address'];?>" 
														address_name="<?php echo $val['address_name'];?>" 
														cityid="<?php echo $val['CityID'];?>" 
														cityname="<?php echo $val['CityName'];?>" 
														townid="<?php echo $val['TownID'];?>" 
														townname="<?php echo $val['TownName'];?>" 
														districtid="<?php echo $val['DistrictID'];?>" 
														districtname="<?php echo $val['DistrictName'];?>"
													href="javascript:;" data-toggle="modal" data-target="#addrModal"  style="color:#000;">
														<i class="fa fa-cog"></i>
													</a>
												</div>
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
									<div style="padding:10px;"><?php echo $val['address'];?> <br />
									<?php echo $val['DistrictName'].' '.$val['TownName'].' '.$val['CityName'];?></div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
				<form id="payForm" action="<?php echo PAY_POST;?>" method="post">
					<div class="panel panel-flat" style="position:relative;">
					  <div class="panel-heading"><h6 style="display:inline-block;" class="panel-title"><b>Toplam Açık Hesap</b></h6>
						<span class="pull-right" style="font-size:15px;color:red;">
							<b><?php echo number_format((float)($debt - $paid), 2, '.', '');?> ₺</b>
						</span>
					  </div>
					  <div class="panel-body" style="height:250px;overflow-y:auto;">
							
								<div class="form-group">
									<input type="text" required name="paid" class="form-control paid" placeholder="Tutar Giriniz" />
								</div>

								<div class="form-group">
									<div class="">
										
										<?php foreach($payment_types as $key => $val){ ?>
											<?php if($settings[$val['payment_code']] == '1'){ ?>
												<?php if($val['payment_code'] != 'open'){ ?>
													<div style="width:33%; text-align:center; float:left; padding:3px;margin-bottom:5px;">
														<a href="javascript:;" class="payx btn-xs butonX1sm w100" rel="<?php echo $key;?>" ptype="<?php echo $val['payment_code'];?>">
															<?php echo $val['payment_name'];?>
														</a>
													</div>
												<?php } ?>
											<?php } ?>
										<?php } ?>
										<div class="clearfix"></div>
										<?php foreach($payment_types as $key => $val){ ?>
											<?php if($settings[$val['payment_code']] == '1'){ ?>
												<?php if($val['payment_code'] != 'open'){ ?>
													<?php if(!empty($val['sub_payment_types'])){ ?>
														<div class="subTab subT_<?php echo $key;?>"  style="display:none;">
															<?php foreach($val['sub_payment_types'] as $kk => $vv){ ?>
																<div  style="width:33%; text-align:center; float:left; padding:3px;margin-bottom:5px;" class="subpd" rel="<?php echo $vv['payment_sub_id'];?>">
																	<a href="javascript:;" class="btn-xs butonX1sm w100"><?php echo $vv['payment_subname'];?></a>
																</div>
															<?php } ?>
															<div class="clearfix"></div>
														</div>
													<?php } ?>
												<?php } ?>
											<?php } ?>
										<?php } ?>
										<input type="hidden" name="ptype" class="ptype" value="" />
										<input type="hidden" name="customer_id" value="<?php echo $customer['customer_id'];?>" />
										
										
									</div>
									
								</div>
							
						</div>
						<input type="button" class="payx2 butonX1 text-center" style="position:absolute; width:90%; right:15px; left:15px; bottom:15px;" value="ÖDE">
					</div>
					
					</form>
				</div>
			</div>
			
			<div class="row" style="padding:0 15px;">
				<div class="col-sm-12">
					<div class="panel panel-flat">
					  <div class="panel-heading">
						<b>Hesap Geçmişi</b>
					  </div>
					  <div class="panel-body" style="padding:0;">
						<?php foreach($merged as $key => $val){ ?>
						<?php if($val['order_insert_time'] > 0){ ?>
							<div class="orderx ordery" rel="<?php echo $val['order_id'];?>">
								<div class="col-sm-3">
									<b>Hesap</b>
								</div>
								<div class="col-sm-3">
									<?php echo date("d-m-Y H:i", $val['payment_time']);?>
								</div>
								<div class="col-sm-3">
									<?php if($val['orderType'] == '0'){ ?>
										Masa - <?php echo $val['table_name'];?>
									<?php }?>
									<?php if($val['orderType'] == '1'){ ?>
										Online Sipariş
									<?php }?>
									<?php if($val['orderType'] == '2'){ ?>
										Telefonla Sipariş
									<?php }?>
								</div>
								<div class="col-sm-2">
									<?php echo $val['total_price'];?> ₺
								</div>
								<div class="col-sm-1">
									<a href="javascript:;" class="fa fa-chevron-down pull-right"></a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="ordertab_<?php echo $val['order_id'];?> xtab">
								<?php foreach($val['details'] as $kk => $vv){ ?>
									<div class="orderx" style="background:#f5f5f5;">
										<div class="col-sm-3">Hesap</div>
										<div class="col-sm-3"><?php echo $vv['pro_name'];?></div>
										<div class="col-sm-3"><?php echo $vv['qty'];?></div>
										<div class="col-sm-3"><?php echo $vv['total_price'];?> ₺</div>
										<div class="clearfix"></div>
									</div>
								<?php } ?>
								<?php foreach($val['payments'] as $kk => $vv){ ?>
									<div class="orderx" style="background:#f5f5f5;">
										<div class="col-sm-3">Ödeme</div>
										<div class="col-sm-3"><?php echo date('d-m-Y H:i', $vv['payment_time']);?></div>
										<div class="col-sm-3">
											<?php if($vv['payment_type'] == 'cash'){ $type = 'Nakit'; }?>
											<?php if($vv['payment_type'] == 'credit'){ $type = 'Kredi Kartı'; }?>
											<?php if($vv['payment_type'] == 'open'){ $type = 'Açık Hesap'; }?>
											<?php if($vv['payment_type'] == 'point'){ $type = 'Puanla Ödeme'; }?>
											<?php echo $type;?>
										</div>
										<div class="col-sm-3"><?php echo $vv['paid_price'];?> ₺</div>
										<div class="clearfix"></div>
									</div>
								<?php } ?>
										
							</div>
							<?php } ?>
							
							<?php if($val['order_id'] == '0'){ ?>
								<div class="orderx " style="background:#2dff8f;">
									<div class="col-sm-3">
										<b>Açık Hesap Ödeme</b>
									</div>
									<div class="col-sm-3">
										<?php echo date("d-m-Y H:i", $val['payment_time']);?>
									</div>
									<div class="col-sm-3">
										<?php if($val['p_type'] == 'cash'){ $ptype = 'Nakit'; }?>
										<?php if($val['p_type'] == 'credit'){ $ptype = 'Kredi Kartı'; }?>
										<?php echo $ptype;?>
									</div>
									<div class="col-sm-3">
										<?php echo $val['paid_price'];?> ₺
									</div>
									<div class="clearfix"></div>
								</div>
							<?php } ?>
							<?php if($val['payment_type'] == 'res'){ ?>
								<div class="orderx " style="background:#64d4fc;">
									<div class="col-sm-3">
										<b>Rezervasyon</b>
									</div>
									<div class="col-sm-3">
										<?php echo date("d-m-Y H:i", $val['insert_time']);?>
									</div>
									<div class="col-sm-3">
										
										<?php echo $val['record'];?>
									</div>
									<div class="col-sm-3">
										<?php echo $val['total_person'];?> Kişi
									</div>
									<div class="clearfix"></div>
								</div>
							<?php } ?>
						<?php } ?>
					  </div>
					</div>	
				</div>
			</div>
		</div>
	</div>
</div>

<div id="addrModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
	  
		<div class="row">
			<form id="addrForm" action="" method="post">
				<p class="text-center borderB">
					<b>ADRES GÜNCELLE</b> <br /> <br />
				</p>
				<div style="padding:15px;margin-bottom:15px; border-bottom:1px solid #ddd;">
				<form id="addrForm">
					<input type="hidden" name="id" class="adr_id" value="0"/>
					<input type="hidden" name="customer_id" class="customer_id" value="<?php echo $customer['customer_id'];?>"/>
						<div class="row" style="margin-bottom:15px;">
							<div class="col-sm-4">
								<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> ADRES ADI</span>
							</div>
							<div class="col-sm-8">
							
								<input type="text" name="address_name" class="form-control adrName1" placeholder="Ev, İş vs." />
							
							</div>
						</div>
						<div class="row" style="margin-bottom:15px;">
							<div class="col-sm-4">
								<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> İL SEÇİNİZ</span>
							</div>
							<div class="col-sm-8">
							<div class="">
								<select name="city_id" class="form-control citySelect city1">
									<option value=""></option>
									<?php foreach($cities as $key => $val){ ?>
										<option value="<?php echo $val['CityID'];?>"><?php echo $val['CityName'];?></option>
									<?php } ?>
								</select>
							</div>
							</div>
						</div>
						<div class="row" style="margin-bottom:15px;">
							<div class="col-sm-4">
								<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> İLÇE SEÇİNİZ</span>
							</div>
							<div class="col-sm-8">
								<div class="">
									<select name="town_id" class="form-control selectTown town1">
										<option value=""></option>
									</select>
								</div>
							</div>
						</div>
						<div class="row" style="margin-bottom:15px;">
							<div class="col-sm-4">
								<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> MAHALLE SEÇİNİZ</span>
							</div>
							<div class="col-sm-8">
								<div class="">
									<select name="district_id" class="form-control selectDistrict dist1">
										<option value=""></option>
									</select>
								</div>
							</div>
						</div>
						<div class="row" style="">
							<div class="col-sm-4">
								<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> ADRESINİZİ YAZINIZ</span>
							</div>
							<div class="col-sm-8">
								<div class="">
									<textarea name="address" class="form-control adr1" rows="5"></textarea>
								</div>
							</div>
							<input type="hidden" name="customer_id" value="<?php echo $customer['customer_id'];?>" />
						</div>
					</form>
					</div>
				
				
					<div class="">
						<div class="col-xs-6">
							<a href="javascript:;" rel="" class="delAddr butonFile" style="width:110px; text-align-center; display:none;">SİL</a>
						</div>
						<div class="col-xs-6">
							<input type="submit" class="butonX1 addAddr pull-right" value="KAYDET" style="width:110px; text-align-center;"/>
						</div>
						<div class="clearfix"></div>
					</div>
			</form>
		</div>
      </div>
    </div>

  </div>
</div>

<?php include('includes/footer-order.php');?>
<script type="text/javascript">
	$(document).ready(function(){
		$("span.pie").peity("pie", {width : 100});
	});
	
	$(".updCust").click(function(){
		var fd = $("#custForm").serialize();
		$.ajax({
			type : "post",
			url : "<?php echo CUSTOMER_UPDATE_POST;?>",
			data  : fd,
			success : function(response){
				if(response == 'success'){
					swal("","Güncelleme Başarılı!","success");
					location.reload();
				}else{
					swal("","Hiç bir bilgiyi güncellemediniz!","error");
				}
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
		var rel = $(this).attr('rel');
		var ptype = $(this).attr('ptype');
		$(".payx").removeClass("bgGreen");
		$(this).addClass("bgGreen");
		$(".ptype").val(ptype);
		
		$(".subTab").hide();
		$(".subT_"+rel).fadeIn();
		
	});
	$(".payx2").click(function(){
		var ptype = $(".ptype").val();
		var paid = parseFloat($(".paid").val());
		var restAmnt = parseFloat($(".restAmnt").val());
		
		if ( (paid > 0) && (ptype != '') ){
			if(restAmnt >= paid){
				$(this).hide();
				$(".process").show();
				$("#payForm").submit();
			}else{
				alert("Lütfen "+restAmnt+" TL veya daha küçük bir tutar giriniz!");
			}
			
		}else{
			alert("Tutar ve Ödeme Yöntemi alanları zorunludur!");
		}
		
		
	});
	
	$(".citySelect").change(function(){
		var city_id = $(this).val();
		$.ajax({
			type : "get",
			url : "<?php echo GET_TOWNS;?>"+city_id,
			success : function(response){
				datax = JSON.parse(response);
				var innerHtml = "";
					innerHtml+= "<option value=''>";
					innerHtml+= "İlçe seçiniz";	
					innerHtml+= "</option>";
				for(var key in datax){
					innerHtml += '<option value="'+datax[key].TownID+'">'+datax[key].TownName+'</option>';
				}
				$(".selectTown").html(innerHtml);
			}
		});
	});
	$(".selectTown").change(function(){
		var town_id = $(this).val();
		$.ajax({
			type : "get",
			url : "<?php echo GET_DISTRICT;?>"+town_id,
			success : function(response){
				datax = JSON.parse(response);
				var innerHtml = "";
					innerHtml+= "<option value=''>";
					innerHtml+= "Mahalle seçiniz";	
					innerHtml+= "</option>";
				for(var key in datax){
					innerHtml += '<option value="'+datax[key].DistrictID+'">'+datax[key].DistrictName+'</option>';
				}
				$(".selectDistrict").html(innerHtml);
			}
		});
	});
	$(".updAdr").click(function(){
		var id = $(this).attr("adrid");
		var address = $(this).attr("address");
		var address_name = $(this).attr("address_name");
		var CityID = $(this).attr("cityid");
		//alert(CityID);
		var CityName = $(this).attr("cityname");
		var TownID = $(this).attr("townid");
		var TownName = $(this).attr("townname");
		var DistrictID = $(this).attr("districtid");
		var DistrictName = $(this).attr("districtname");
			
		$(".adr_id").val(id);
		$(".adrName1").val(address_name);
		$(".adr1").val(address);
		$(".city1").val(CityID);
		$(".town1").html("<option value="+TownID+">"+TownName+"</option>");
		$(".dist1").html("<option value="+DistrictID+">"+DistrictName+"</option>");
		$(".addAddr").val("GÜNCELLE");
		$(".delAddr").attr("rel", id);
		$(".delAddr").show();
	});
	
	$(".addAddr").click(function(){
		var fd = $("#addrForm").serialize();
		$(".delAddr").hide();
		$.ajax({
			type : "post",
			url : "<?php echo ADD_ADDRESS_POST;?>",
			data : fd,
			success : function(response){
				if(response == "success"){
					swal("","Başarılı!","success");
					setTimeout(function(){
						location.reload();
					},1500);
				}else if(response == "empty"){
					swal("","Lütfen Boş alan bırakmayınız!","warning");
				}else if(response == "error"){
					swal("","Hiç bir alanı güncellemediniz!","error");
				}
			}
		});
	});
	
	$(".delAddr").click(function(){
		var id = $(this).attr("rel");
		
		swal({
		  title: 'Emin misiniz?',
		  text: "Adres silinecektir!",
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
				type : "get",
				url : "<?php echo DELETE_ADDRESS;?>"+id,
				success : function(response){
					if(response == 'success'){
						swal("","Adres silinmiştir!","success");
						location.reload();
					}
				}
			});
			
		  } else {
			// handle cancel
		  }
		});	
		
		
	});
	
</script>
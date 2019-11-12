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
					<span class="pageTitle">
						Arayan : <?php if(!empty($customer)){ echo $customer['full_name']; }else{ echo formatTelNumber($new_number);}?>
					</span>
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
					<div class="panel panel-flat">
					  <div class="panel-heading">
						<h6 class="panel-title"><b>Hesap Bilgisi</b></a></h6>
						
					</div>
					  
					  <?php if(!empty($customer)){ ?>
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
												<input type="text" id="phone" name="phone" value="<?php echo $customer['phone'];?>" pattern="[0-9]{1}-[0-9]{3}-[0-9]{3}-[0-9]{4}" required="" title="0-212-123-4567" placeholder="Telefon" class="form-control phone" autocomplete="off" maxlength="14">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<label class="col-lg-3 control-label" style="padding-top:8px;"><b>Adres  : </b></label>
											<div class="col-lg-9">
												<textarea class="form-control" name="address" rows="5"><?php echo $customer['address'];?></textarea>
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
					  <?php }else{?>
						<div class="panel-body"  style="position:relative;">
								<form id="custAddForm" style="position:relative;">
									<div class="form-group">
										<div class="row">
											<label class="col-lg-3 control-label" style="padding-top:8px;"><b>İsim : </b></label>
											<div class="col-lg-9">
												<input type="text" name="full_name" class="form-control" value="" />
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<label class="col-lg-3 control-label" style="padding-top:8px;"><b>Telefon  : </b></label>
											<div class="col-lg-9">
												<input type="text" id="phone" name="phone" value="<?php echo formatTelNumber($new_number);?>" pattern="[0-9]{1}-[0-9]{3}-[0-9]{3}-[0-9]{4}" required="" title="0-212-123-4567" placeholder="Telefon" class="form-control phone" autocomplete="off" maxlength="14">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<label class="col-lg-3 control-label" style="padding-top:8px;"><b>Adres  : </b></label>
											<div class="col-lg-9">
												<textarea class="form-control" name="address" rows="5"></textarea>
											</div>
										</div>
									</div>
									
									<input type="button" class="butonX1 pull-right addCust w100 text-center" style="margin-top:15px;" value="KAYDET">
								</form>
							</div>
					  <?php } ?>
					</div>
					
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
	$(".addCust").click(function(){
		var fd = $("#custAddForm").serialize();
		$.ajax({
			type : "post",
			url : "<?php echo ADD_CUSTOMER_TO_PHONE_ORDER;?>",
			data  : fd,
			success : function(response){
				
				var xData = JSON.parse(response);
				console.log(xData);
				if(xData.msg == 'success'){
					swal("","Kayıt Başarılı!","success");
					location.reload();
				}
				
				if(xData.msg == 'same_customer'){
					swal("","Bu numara ile daha önce kayıt yapılmıştır!","warning");
					
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
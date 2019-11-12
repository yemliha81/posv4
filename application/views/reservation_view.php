<?php include('includes/header-order.php');?>
<style type="text/css">
	.inputTitle{    display: inline-block;
    font-weight: bold;
    color: #999593;}
	.srcResults2{margin-top:15px;}
	.srcResults2 div{background:#f5f5f5;font-size:18px; line-height:1; cursor:pointer;}
	.srcResults2 div:hover{background:#ddd;}
	.srcResults2 div a{color:#666;font-weight:bold;display:block;padding:15px;border-bottom:1px solid #666;}
	.nameSpan{display:inline-block; padding:9px 0;}
	#ui-datepicker-div { z-index: 99999 !important; }
	 #calendar {
    max-width: 900px;
    margin: 0 auto;
  }
</style>
<link href="<?php echo ASSETS;?>css/equinox.css" rel="stylesheet" type="text/css">
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
					<span class="pageTitle">Rezervasyon</span>
				</div>
				<div class="col-sm-6">
					
				</div>
			</div>
				
			</div>
		</div>
	</div>
	
	
	<div class="mainContainer" style="">
		<div class="srcDiv row" style="margin-bottom:15px;">
			<div class="col-sm-6"></div>
			<div class="col-sm-3" >
				<a style="display:inline-block; margin-bottom:15px;" href="<?php echo RESERVATION_LIST;?>" class="butonX1 pull-right w100 text-center"><i class="fa fa-list"></i> REZ. LİST.</a>
			</div>
			<div class="col-sm-3">
				<a href="javascript:;" data-toggle="modal" data-target="#customerModal" class="butonX1 pull-right w100 text-center"><i class="fa fa-plus"></i> YENİ REZERVASYON</a>
			</div>
		</div>
		<div class="" style="margin-top:15px;">
			 <div class="event-calendar"></div>
		</div>
	</div>
</div>




<div id="reservationModal" class="modal fade" role="dialog" style="padding-right: 17px;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
			<form action="<?php echo RESERVATION_POST;?>" method="post">
				<div class="row" style="margin-bottom:15px;">
					<div class="col-sm-3">
						<b>Müşteri : </b>
					</div>
					<div class="col-sm-9">
						<input type="text" name="custName" class="custName form-control" disabled required />
						<input type="hidden" name="custId" class="custId form-control" />
					</div>
				</div>
				<div class="row" style="margin-bottom:15px;">
					<div class="col-sm-3">
						<b>Tarih : </b>
					</div>
					<div class="col-sm-3">
						<input name="reservation_date" type="text" class="datepicker form-control" class="form-control"  required />
					</div>
					<div class="col-sm-3">
						<b>Saat : </b>
					</div>
					<div class="col-sm-3">
						<select name="hour" class="form-control" required >
							<option value="">Saat Seçiniz</option>
							<option value="19:00">19:00</option>
							<option value="20:00">20:00</option>
							<option value="21:00">21:00</option>
							<option value="22:00">22:00</option>
							<option value="23:00">23:00</option>
							<option value="24:00">24:00</option>
						</select>
					</div>
				</div>
				<div class="row" style="margin-bottom:15px;">
					<div class="col-sm-3">
						<b>Kişi Sayısı : </b>
					</div>
					<div class="col-sm-9">
						<input type="number" name="person" class="form-control"  required />
					</div>
				</div>
				<div class="row" style="margin-bottom:15px;">
					<div class="col-sm-3">
						<b>Not : </b>
					</div>
					<div class="col-sm-9">
						<textarea name="note" class="form-control" rows="3"></textarea>
					</div>
				</div>
				<div class="row" style="margin-bottom:15px;">
					<div class="col-sm-3">
						
					</div>
					<div class="col-sm-9">
						<input type="submit" class="butonX1 w100 text-center" value="Kaydet"/>
					</div>
				</div>
			</form>
	</div>
    </div>

  </div>
</div>
			

<div id="customerModal" class="modal fade" role="dialog" style="padding-right: 17px;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
	  <div class="row">
        <p class="text-center borderB">
			<b>MÜŞTERİ ARA &amp; EKLE</b> <br> <br>
		</p>
		<p>
			</p><div class="">
				<div class="col-sm-4 col-xs-6">
					<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-user"></i> &nbsp;&nbsp; MÜŞTERİ İSMİ</span>
				</div>
				<div class="col-sm-8 col-xs-6">
					<input type="text" class="srcCustomers form-control" placeholder="Müşteri Ara..." autocomplete="off">
				</div>
				<div class="clearfix"></div>
				
			</div>
			<div class="srcResults2" style=""></div>
		<p></p>
		<div class="custDiv"></div>
		<div class="clearfix"></div><hr>
		<form id="customerForm" class="hidden" method="post">
			<p class="text-center borderB">
				<b>MÜŞTERİ BİLGİLERİ</b> <br> <br>
			</p>
			<p>
				</p><div class="">
					<div class="col-sm-4  col-xs-6">
						<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-user"></i> &nbsp;&nbsp; MÜŞTERİ İSMİ</span>
					</div>
					<div class="col-sm-8 col-xs-6">
						<input type="hidden" name="order_id" value="" autocomplete="off">
						<input type="text" name="full_name" class="form-control full_name" required="" placeholder="Müşteri Ad - Soyad" autocomplete="off">
					</div>
					<div class="clearfix"></div>
				</div>
			<p></p>
			<p>
				</p><div class="">
					<div class="col-sm-4 col-xs-6">
						<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-phone"></i> &nbsp;&nbsp; TELEFON</span>
					</div>
					<div class="col-sm-8 col-xs-6">
						<input type="text" id="phone" name="phone" class="form-control phone" pattern="[0-9]{1}-[0-9]{3}-[0-9]{3}-[0-9]{4}" required="" title="0-212-123-4567" placeholder="Telefon"  autocomplete="off" maxlength="14">
					</div>
					<div class="clearfix"></div>
				</div>
			<p></p>
			<p>
				</p><div class="">
					<div class="col-sm-4 col-xs-6">
						<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-envelope"></i> &nbsp;&nbsp; E-MAIL</span>
					</div>
					<div class="col-sm-8 col-xs-6">
						<input type="text" name="email" class="form-control email" placeholder="E-mail" autocomplete="off">
					</div>
					<div class="clearfix"></div>
				</div>
			<p></p>
			<p>
				</p><div class="">
					<div class="col-sm-4 col-xs-6">
						<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; ADRES</span>
					</div>
					<div class="col-sm-8 col-xs-6">
						<input type="text" name="address" class="form-control address" placeholder="Adres" autocomplete="off">
					</div>
					<div class="clearfix"></div>
				</div>
			<p></p>
			<p>
			</p><div class="col-xs-12">
				<input type="button" href="javascript:;" class="butonX1 pull-right addCustomer" value="EKLE" autocomplete="off">
				<button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
			</div>
			<p></p>
		</form>
		
      </div>
    </div>
    </div>

  </div>
</div>
<?php include('includes/footer-order.php');?>
<script src='<?php echo ASSETS;?>/lib/moment.min.js'></script>
<script src="<?php echo ASSETS;?>js/equinox.min.js"></script>
<script type="text/javascript">
	
$(document).ready(function() {
moment.locale('tr');
 
$('.event-calendar').equinox({
	
	events: [
		<?php foreach($list as $key => $val){ 
			$date1[$key] = $val['reservation_date'];
			$date[$key] = date("Y-m-d",strtotime($val['reservation_date']));
		?>
		{
			start: '<?php echo $date[$key];?>',
			end: '<?php echo date("Y-m-d",strtotime($val['reservation_date']));?>',
			title: '<div><i class="fa fa-check"></i> : <?php echo $val['onayli'];?></div>\
			<div><i class="fa fa-user"></i> : <?php echo $val['person']['total_person'];?></div>\
			<?php if($val['beklemede'] > 0){ ?>\
			<div><i class="fa fa-clock-o"></i> :  <?php echo $val['beklemede'];?></div>\
			<?php } ?>',
			url: '<?php echo RESERVATION_DAY_LIST.$date1[$key];?>',
			class: 'aac',
			color: 'red',
			data: {},
		},
		<?php } ?>
	]
	});

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
								innerHtml+= "<div><a href='javascript:;' phone='"+default_data[key].phone+"' custId='"+default_data[key].customer_id+"' class='selectCustomer' data-dismiss='modal'>";
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

	$(document).on("click", ".newCB", function(){
		var newName = $(".newC").html();
		$("#customerForm").removeClass("hidden");
		$(".full_name").val(newName.toUpperCase());
	});
	
	$(document).on("click", ".selectCustomer", function(){

		var custId = $(this).attr("custid");
		var custName = $(this).text();
		
		$(".custName").val(custName);
		$(".custId").val(custId);
		
		$("#reservationModal").modal('show');
		
	});
	
	$(".addCustomer").click(function(){
			var full_name = $(".full_name").val().trim();
			var phone = $(".phone").val().trim();
			var formData = $("#customerForm").serialize();
			if((full_name != '') && ( phone != '' ) ){
				$.ajax({
					type : "post",
					url : "<?php echo ADD_NEW_CUSTOMER;?>",
					data : formData,
					success : function(response){
						var responseData = JSON.parse(response);
						console.log(responseData);
						if(responseData.status == 'success'){
							var custid = responseData.cid;
							var cname = responseData.cname;
							var ctel = responseData.ctel;
							$(".custName").val(cname+' - '+ctel);
							$(".custId").val(custid);
							$("#customerModal").modal('hide');
							$("#reservationModal").modal('show');
							//swal('','Müşteri Eklenmiştir!','success');
							//location.reload();
						}else if(responseData.status == 'phone_error'){
							swal('','Bu telefon numarası ile daha önce kayıt yapılmıştır!','error');
						}else{
							swal('','Hata oluştu!!!','error');
						}
					}
					
				});
			}else{
				swal('','İsim ve Telefon alanları zorunludur!','warning');
			}
		});
		
</script>
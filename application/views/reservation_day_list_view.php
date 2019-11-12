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
	.dataTables_length{display:none !important;}
  }
</style>
<link href='<?php echo ASSETS;?>css/fullcalendar.min.css' rel='stylesheet' />
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
	
	
	<div class="mainContainer" style="padding:0 15px;">
	
	<div class="srcDiv row" style="margin-bottom:15px;">
		<div class="col-sm-3">
			<input type="text" class="customSrc srcStyle srcTerm srcX" placeholder="Search..." />
		</div>
		<div class="col-sm-3">
			<input type="text" class="form-control datepicker dateX" value="<?php echo $date;?>"/>
		</div>
		<div class="col-sm-3">
			<a style="display:inline-block; margin-bottom:15px;"  href="<?php echo RESERVATION;?>" class="butonX1 pull-right w100 text-center"><i class="fa fa-calendar"></i> TAKVİM</a>
		</div>
		<div class="col-sm-3">
			<a href="javascript:;" data-toggle="modal" data-target="#customerModal" class="butonX1 pull-right w100 text-center"><i class="fa fa-plus"></i> YENİ REZERVASYON</a>
		</div>
	</div>
		<div class="whiteZone f13" style="padding-right:0; padding-left:0; margin-top:15px;">
			<div style="">
			<div class="table-responsive">
				<table class="table table-hover"> 
					<thead>
						<tr role="row srccc">
							<th>ID</th>
							<th>Ad - Soyad</th>
							<th>Telefon</th>
							<th>Tarih</th>
							<th>Saat</th>
							<th>Kişi Sayısı</th>
							<th>Not</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($list as $kk => $vv){ ?>	
						<?php if($vv['status'] == '1'){ $bg[$kk] = '#64d4fc';}?>
						<?php if($vv['status'] == '5'){ $bg[$kk] = '#2dff8f';}?>
						<?php if($vv['status'] == '4'){ $bg[$kk] = '#2dff8f';}?>
						<?php if($vv['status'] == '3'){ $bg[$kk] = '#ff8e90';}?>
							<tr role="row" class="odd link_tr" link="<?php echo RESERVATION_DETAIL.$vv['id'];?>"  style="background:<?php echo $bg[$kk];?>">
								<td><?php echo $vv['id'];?></td>
								<td><?php echo $vv['full_name'];?></td>
								<td><a href="tel:<?php echo $vv['phone'];?>"><?php echo $vv['phone'];?></a></td>
								<td><?php echo $vv['reservation_date'];?></td>
								<td><?php echo $vv['reservation_hour'];?></td>
								<td><?php echo $vv['total_person'];?></td>
								<td><?php echo $vv['note'];?></td>
								<td>
									<?php if($vv['status'] == '0'){ ?> 
										<a href="<?php echo APPROVE_RESERVATION.$vv['id'];?>" class="butonX1">Teyit</a>
									<?php } ?>
								</td>
							</tr>
						
					<?php } ?>
					
					</tbody>
				</table>
			</div>
		</div>
		
		<hr />
		
		<div class="text-center">
			<a href="javascript:;" data-toggle="modal" data-target="#reservationListModal"  class="butonX1"><i class="fa fa-print fa-2x"></i></a>
		</div>
		
		</div>
		
	</div>
</div>

<div id="reservationListModal" class="modal fade" role="dialog" style="padding-right: 17px;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
		<div class="modal-body">
		
				<div class="row" style="margin-bottom:15px;">
					<div class="col-xs-6">
						<select class="printer form-control">
							<option value="">Yazıcı Seçiniz</option>
							<?php foreach($printers as $key => $val){ ?>
								<option ptype="<?php echo $val['printer_type'];?>" value="<?php echo $val['printer_ip'];?>"><?php echo $val['printer_name'];?></option>
							<?php } ?>
						</select>
					</div>
					<div class="col-xs-3">
						<a href="javascript:;" class="butonX1 w100 phnToggle text-center"><i class="fa fa-phone"></i></a>
					</div>
					<div class="col-xs-3">
						<a href="javascript:;" class="butonX1 w100 listPrint text-center" data-dismiss="modal">YAZDIR</a>
					</div>
				</div>
			<div class="htmlBody">
				<div class="text-center"><b>REZERVASYON LİSTESİ</b></div>
				<div class="text-center"><b><?php echo $date;?></b></div>
				<table class="tablex table-bordered" style="width:100%;">
					<thead>
						<tr>
							<th><b>Saat</b></th>
							<th><b>İsim</b></th>
							<th><b><i class="fa fa-user"></i></b></th>
							<th><b>Not</b></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($list2 as $kk => $vv){ ?>
							<tr>
								<td><span><?php echo $vv['reservation_hour'];?></span></td>
								<td>
									<div><?php echo $vv['full_name'];?></div>
									<div class="phn hidden"><?php echo $vv['phone'];?></div>
								</td>
								<td><b><?php echo $vv['total_person'];?></b></td>
								<td><?php echo $vv['note'];?></td>
								<td><?php if($vv['status'] == '1'){ echo '<i class="fa fa-check"></i>'; }?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
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
	
	$(document).on("click",".listPrint",function(){
	
		var htmlBody = $(".htmlBody").html();
		var printer_ip = $(".printer").val();
		var date = '<?php echo $date;?>';
		var printer_type = $('option:selected', '.printer').attr('ptype');
		//console.log(htmlBody);
		
		$.ajax({
			type : "post",
			url : "<?php echo PRINT_RESERVATION;?>",
			data : {"date" : date, "printer" : printer_ip, "printer_type" : printer_type },
			success : function(response){
				console.log(response);
			}
		});
		
	});
	
	$(".phnToggle").click(function(){
		$(".phn").toggleClass("hidden");
	});
	
	
	$(".dateX").change(function(){
		var date = $(this).val();
		window.location.href = '<?php echo RESERVATION_DAY_LIST;?>'+date;
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
	
	$('th').click(function(){
		var table = $(this).parents('table').eq(0)
		var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
		this.asc = !this.asc
		if (!this.asc){rows = rows.reverse()}
		for (var i = 0; i < rows.length; i++){table.append(rows[i])}
	})
	function comparer(index) {
		return function(a, b) {
			var valA = getCellValue(a, index), valB = getCellValue(b, index)
			return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB)
		}
	}
	function getCellValue(row, index){ return $(row).children('td').eq(index).text() }
	
		
</script>
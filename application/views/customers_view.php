<?php include('includes/header-order.php');?>
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
					<span class="pageTitle">Müşteriler</span>
				</div>
				<div class="col-sm-6">
					
				</div>
			</div>
				
			</div>
		</div>
	</div>
	
	
<div class="mainContainer"style="padding:0 15px;">
	
	<div class="srcDiv row" style="margin-bottom:15px;">
		<div class="col-sm-6">
			<input type="text" class="customSrc srcStyle srcTerm srcX" placeholder="Search..." />
		</div>
		<div class="col-sm-3">
			<a href="#" class="butonX1 w100 text-center" data-toggle="modal" data-target="#groupModal" >Grup Güncelle</a>
		</div>
		<div class="col-sm-3">
			<a href="#" class="butonX1 w100 text-center" data-toggle="modal" data-target="#customerModal" >Müşteri Ekle</a>
		</div>
	</div>
	
		<div class="whiteZone f13" style="padding-right:0; padding-left:0;">
			<div style="">
			<div>
				<table class="table table-hover"> 
					<thead>
						<tr role="row srccc">
							<th></th>
							<th>Ad - Soyad</th>
							<th>Telefon</th>
							<th>Grup</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($customers as $kk => $vv){ ?>	
							<tr role="row" class="odd" link="" >
								<td><input type="checkbox" name="customer_id[]" value="<?php echo $vv['customer_id'];?>" /></td>
								<td><?php echo $vv['full_name'];?></td>
								<td><?php echo $vv['phone'];?></td>
								<td><?php echo $vv['group_name'];?></td>
								<td><a href="<?php echo CUSTOMER_DETAILS_PAGE.$vv['customer_id'];?>" class="butonX1 pull-right">DETAY</a></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		</div>
	</div>
</div>

<input type="hidden" class="authNum" value="10" />
<input type="hidden" class="isActive" value="0" />

<!-- Modal -->
<div id="customerModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
	  <div class="row">
        <p class="text-center borderB">
			<b>MÜŞTERİ EKLE</b> <br /> <br />
		</p>
		<form id="customerForm" >
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
<div id="groupModal" class="modal fade" role="dialog">
  <div class="modal-dialog"> 

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
	  <div class="row">
        <p class="text-center borderB">
			<b>GRUP GÜNCELLE</b> <br /> <br />
		</p>
		<form id="customerForm" >
			<p>
				<div class="">
					<div class="col-sm-4  col-xs-6">
						<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-user"></i> &nbsp;&nbsp; GRUP SEÇİNİZ</span>
					</div>
					<div class="col-sm-8 col-xs-6">
						<select name="group_id" class="form-control group_id">
							<?php foreach($groups as $key => $val){ ?>
								<option value="<?php echo $val['id'];?>">
									<?php echo $val['group_name'];?>
								</option>
							<?php } ?>
						</select>
					</div>
					<div class="clearfix"></div>
				</div>
			</p>
			<p>
			<div class="col-xs-12">
				<input type="button" href="javascript:;" class="butonX1 pull-right groupChange" value="GÜNCELLE"/>
				<button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
			</div>
			</p>
		</form>
		
      </div>
    </div>
    </div>

  </div>
</div>

<?php 
	$auth = '0';
	if(!empty($_SESSION['authList'])){ 
		foreach($_SESSION['authList'] as $key => $val){
			if($val['auth_id'] == '10'){
				$auth = '1';
			}
		}
	}

?>
<input type="hidden" class="auth" value="<?php echo $auth;?>" />

<?php include('includes/footer-order.php');?>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".srccc").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

$(".groupChange").click(function(){
	event.preventDefault(); 
		var customerIDs = $("input:checkbox:checked").map(function(){
		  return $(this).val();
		}).get();
	
	var group_id = $(".group_id").val();
	
	$.ajax({
		type : "post",
		url : "<?php echo GROUP_UPDATE_POST;?>",
		data : { "ids" : customerIDs, "group_id" : group_id },
		success : function(response){
			if(response == 'success'){
				location.reload();
			}
		}
	});
	
	//alert(customerIDs);
});
		
$(".addCustomer").click(function(){
	var full_name = $(".full_name").val().trim();
	var phone = $(".phone").val().trim();
	var address = $(".address").val().trim();
	var formData = $("#customerForm").serialize();
	
	
			$.ajax({
				type : "post",
				url : "<?php echo ADD_CUSTOMER_TO_PHONE_ORDER;?>",
				data : formData,
				success : function(response){
					var customer = JSON.parse(response);
					//$(".select2").select2();
					
					
					if(customer.msg == 'phone_error'){
						swal('','Bu telefon numarası ile daha önce kayıt yapılmıştır!','error');
					}
					
					if(customer.msg == 'success'){
						//swal('','Bu telefon numarası ile daha önce kayıt yapılmıştır!','error');
						location.reload();
					}
				}
				
			});
	
	
});

</script>
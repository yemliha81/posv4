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
						<span class="pageTitle">Müşteri Grupları</span>
					</div>
					<div class="col-sm-6">
						
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
<div class="mainContainer"style="padding:0 15px;">
	
	<div class="srcDiv row" style="margin-bottom:15px;">
		<div class="col-sm-9">
			<input type="text" class="customSrc srcStyle srcTerm srcX" placeholder="Search..." />
		</div>
		<div class="col-sm-3">
			<a href="#" class="butonX1 w100 text-center" data-toggle="modal" data-target="#customerModal" >Müşteri Grubu Ekle</a>
		</div>
	</div>
	
		<div class="whiteZone f13" style="padding-right:0; padding-left:0;">
			<div style="">
			<div>
				<table class="table table-hover"> 
					<thead>
						<tr role="row srccc">
							<th>Müşteri Grubu Adı</th>
							<th>İndirmi (%)</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($groups as $kk => $vv){ ?>	
						<tr role="row" class="odd link_tr" link="<?php echo CUSTOMER_GROUP_DETAILS_PAGE.$vv['id'];?>" >
							<td><?php echo $vv['group_name'];?></td>
							<td><?php echo $vv['group_discount'];?></td>
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
			<b>MÜŞTERİ GRUBU EKLE</b> <br /> <br />
		</p>
		<form id="groupForm">
			<p>
				<div class="">
					<div class="col-sm-4  col-xs-6">
						<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-user"></i> &nbsp;&nbsp; GRUP İSMİ</span>
					</div>
					<div class="col-sm-8 col-xs-6">
						<input type="text" name="group_name" class="form-control group_name" required placeholder="Grup Adı" />
					</div>
					<div class="clearfix"></div>
				</div>
			</p>
			<p>
				<div class="">
					<div class="col-sm-4  col-xs-6">
						<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-user"></i> &nbsp;&nbsp; GRUP İNDİRİMİ</span>
					</div>
					<div class="col-sm-8 col-xs-6">
						<input type="text" name="group_discount" class="form-control group_discount" required placeholder="Grup İndirimi (%)" />
					</div>
					<div class="clearfix"></div>
				</div>
			</p>
			<p>
			<div class="col-xs-12">
				<input type="button" href="javascript:;" class="butonX1 pull-right addGroup" value="EKLE"/>
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


		
$(".addGroup").click(function(){
	var group_name = $(".group_name").val().trim();
	var formData = $("#groupForm").serialize();
	if( (group_name != '') ){
			$.ajax({
				type : "post",
				url : "<?php echo ADD_GROUP_POST;?>",
				data : formData,
				success : function(response){
					
					
					if(response == 'success'){
						location.reload();
					}
				}
				
			});
		
		
	}else{
		swal('','İsim, telefon ve adres girilmesi zorunludur!','warning');
	}
});

</script>
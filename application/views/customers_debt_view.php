<?php include('includes/header-order.php');?>
<div class="topBar hidden">
	<a href="<?php echo MAIN_BOARD;?>" class="backToHome">
	<i class="fa fa-chevron-left"></i>
	<i class="fa fa-chevron-left"></i> Ana Sayfa</a>
	<a href="<?php echo CUSTOMERS_PAGE;?>" class="backToHome">
	 Tümü</a>
	<a href="<?php echo CUSTOMERS_DEBTS;?>" class="backToHome">
	 Borçlu Olanlar</a>
</div>

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
		<div class="col-sm-9">
			<input type="text" class="customSrc srcStyle srcTerm srcX" placeholder="Search..." />
		</div>
		<div class="col-sm-3">
			
		</div>
	</div>
	
		<div class="whiteZone f13" style="padding-right:0; padding-left:0;">
			<div style="">
			<div>
				<table class="table table-hover"> 
					<thead>
						<tr role="row srccc">
							<th>Ad - Soyad</th>
							<th>Telefon</th>
							<th>Toplam Borç</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($customers as $kk => $vv){ ?>	
						<tr role="row" class="odd link_tr" link="<?php echo CUSTOMER_DETAILS_PAGE.$vv['customer_id'];?>" >
							<td><?php echo $vv['full_name'];?></td>
							<td><?php echo $vv['phone'];?></td>
							<td><?php echo number_format((float)($vv['rest']), 2, '.', '');?></td>
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
</script>
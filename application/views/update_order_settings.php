<?php include('includes/header-order.php');?>
<?php 
	function status($id){
		if($id == '0'){ $status = 'Beklemede'; }
		if($id == '1'){ $status = 'Onaylandı'; }
		if($id == '2'){ $status = 'Teslimatta'; }
		if($id == '3'){ $status = 'Teslim edildi'; }
		if($id == '4'){ $status = 'Reddedildi'; }
		return $status;
	}

	function getPtype($type){
		if($type == 'cc'){ return 'Kredi Kartı'; }
		if($type == 'cash'){ return 'Nakit'; }
		if($type == 'meal'){ return 'Yemek Kartı'; }
		if($type == 'point'){ return 'Puanla Ödeme'; }
	}
	
?>
<div class="left1">
	<?php include('includes/left_menu.php');?>
</div> 
<style type="text/css">
	tr>td{text-align:center;}
</style>
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
					<span class="pageTitle">Online Sipariş</span>
				</div>
				<div class="col-sm-6">
					
				</div>
			</div>
				
			</div>
		</div>
	</div>
	
	
	<div class="mainContainer"style="padding:0 15px;">
	
		<div class="whiteZone f13" style="">
			
			<div class="row">
				<table class="table table-hover">
					<thead>
						<tr>
							<td></td>
							<td><b>Şube</b></td>
							<td><b>Ad - Soyad</b></td>
							<td><b>Toplam</b></td>
							<td><b>Ödeme Şekli</b></td>
							<td><b>Sipariş Zamanı</b></td>
							<td><b>Onay Zamanı</b></td>
							<td><b>Sipariş Durumu</b></td>
							
							<td><b>İşlem</b></td>
						</tr>
					</thead>
					<tbody>
					<?php foreach($orders as $key => $val){ ?>
						<tr>
							<td><?php echo $val['order_id'];?></td>
							<td><?php echo $val['br_name'];?></td>
							<td><?php echo $val['full_name'];?></td>
							<td><?php echo $val['total_price'];?></td>
							<td><?php echo getPtype($val['payment_type']);?></td>
							<td><?php echo date("d-m-Y H:i",$val['order_insert_time']);?></td>
							<td><?php echo date("H:i",$val['order_insert_time']);?></td>
							<td><?php echo status($val['status']);?></td>
							<td class="text-right">
								<a href="<?php echo ONLINE_ORDER_DETAILS.$val['order_id'];?>" class="butonX1">DETAY</a>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
			
<?php include('includes/footer-order.php');?>
<script type="text/javascript">
	$(".denyOrder").click(function(){
		var status = '4';
		var order_id = $(this).attr("rel");
		$.ajax({
			type : 'post',
			url : '<?php echo UPDATE_ORDER_STATUS;?>',
			data : { "status" : status, "order_id" : order_id },
			success : function(response){
				if(response == 'success'){
					swal("","Sipariş Reddedilmiştir!","success");
					location.reload();
				}else{
					swal("Hata!","","error");
				}
			}
		});
	});
</script>
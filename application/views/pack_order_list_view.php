<?php include('includes/header-order.php');?>
<style type="text/css">
	input{width:40px;border:0;}
	.btnXX{width:100%;height:100px;font-size:25px;}
	.noP{padding:0;}
	.bb{box-sizing:border-box;}
	.m5{margin:5px;}
	.p1{padding:1px;}
	.p5{padding:5px;}
	.btn-busy{background:#FFA500; color:#000; font-weight:bold;}
	.btn-free{background:#404040; color:#f7f7f7; font-weight:bold;}
	.backToHome{font-size:20px;display:inline-block; line-height:1;padding:15px 25px; background:#4972B7; color:#fff;}
	.nav-tabs a{padding:20px !important; font-size:22px; text-align:center; background: #404040 !important; border-right: 2px solid #fff  !important;color:#fff !important;}
	.nav-tabs .active a{background:#2196f3 !important; color:#fff !important;}
</style>
<div class="" style="">
<div class="topBar">
	<a href="<?php echo MAIN_BOARD;?>" class="backToHome">
	<i class="fa fa-chevron-left"></i>
	<i class="fa fa-chevron-left"></i> Ana Sayfa</a>
	<a href="<?php echo PACK_ORDER_LIST;?>" class="backToHome newOrder">
	<i class="fa fa-plus"></i> Yeni Paket Sipariş</a>
</div>
	<div class="container">
		<?php if(!empty($pack_tables)){ ?>
		<table class="table">
			<thead>
				<tr>
					<td><b>Müşteri</b></td>
					<td><b>Sipariş No</b></td>
					<td><b>Tarih / Saat</b></td>
					<td><b>Tutar</b></td>
					<td><b></b></td>
				</tr>
			</thead>
			<tbody>
				<?php foreach($pack_tables as $key => $val){ ?>
					<tr>
						<td></td>
						<td>#<?php echo $val['order']['order_id'];?></td>
						<td><?php echo date('d-m-Y H:i', $val['order']['order_insert_time']);?></td>
						<td><?php echo $val['order']['rest_price'];?> ₺</td>
						<td><a href="<?php echo ORDER_PAGE.$val['table_id'];?>" class="btn btn-sm btn-info">Detay</a></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<?php }else{ ?>
		<div class="text-center">
			<br /><br />
			<b>
				Henüz Sipariş kaydedilmemiştir! <br /><br />
				<a href="javascript:;" class="btn btn-info newOrder"><i class="fa fa-plus"></i> Yeni Sipariş</a>
			</b>
		</div>
		<?php } ?>
	</div>
	
	<div class="clearfix"></div>
</div>
<?php include('includes/footer-order.php');?>
<script type="text/javascript">
	$(".newOrder").click(function(){
		$.ajax({
			type : 'get',
			url : '<?php echo NEW_PACK_ORDER;?>',
			success : function(response){
				var table_id = parseInt(response);
				if(table_id > 0){
					window.location.href = '<?php echo ORDER_PAGE;?>'+table_id;
				}else{
					alert("Hata oluştu!!!");
				}
			}
		});
	});
	
</script>
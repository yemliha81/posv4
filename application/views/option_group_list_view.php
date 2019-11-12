<?php include('includes/header-order.php');?>
<style type="text/css">
	.backToHome{font-size:20px;display:inline-block; line-height:1;padding:15px 25px; background:#4972B7; color:#fff;}
	.cat_btn{padding:20px 10px;font-size:20px; margin-right:5px;}
	.copied{position:relative;}
	.delRow{position:absolute; right:-30px; top:0;}
</style>
<div class="topBar">
	<a href="<?php echo MAIN_BOARD;?>" class="backToHome">
	<i class="fa fa-chevron-left"></i>
	<i class="fa fa-chevron-left"></i> Ana Sayfa</a>
</div>
<div class="col-xs-12" style="padding:15px;">
	<div>
		<b>Seçenek Grubu Listesi</b>
		<a href="<?php echo ADD_OPTION_GROUP;?>" CLASS="btn btn-warning pull-right">+ Yeni Seçenek Grubu</a>
		<hr />
		
	</div>
	<div>
		<table class="table">
			<?php foreach($og_list as $key => $val){ ?>
				<tr>
					<td><?php echo $val['og_name'];?></td>
					<td><?php echo date("d-m-Y H:i", $val['og_insert_time']);?></td>
					<td>
					<a href="<?php echo UPDATE_OPTION_GROUP.$val['og_id'];?>" class="btn btn-info">Düzenle</a> 
					<a href="<?php echo ADD_OPTION_TO_GROUP.$val['og_id'];?>" class="btn btn-success">Seçenek Ekle & Düzenle </a> 
					<a href="<?php echo DELETE_OPTION_GROUP.$val['og_id'];?>" class="btn btn-danger">Sil</a> 
					</td>
				</tr>
			<?php } ?>
		</table>
	</div>
</div>
			
<?php include('includes/footer-order.php');?>

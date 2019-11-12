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
		<b>Yeni Bölge Ekle</b>
		
		<hr />
		
	</div>
	<div class="col-sm-6">
		<form action="<?php echo ADD_ZONE_POST;?>" method="post">
			<table class="table">
					<tr>
						<td>
							<input type="text" name="zone_name" class="form-control" placeholder="Bölge Adı Giriniz"/>
						</td>
						<td></td>
					</tr>
					<tr>
						<td>
							<input type="submit" class="btn btn-success" value="Kaydet"/>
						</td>
						<td></td>
					</tr>
			</table>
		</form>
	</div>
</div>
			
<?php include('includes/footer-order.php');?>

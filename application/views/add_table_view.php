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
		<b>Yeni Masa Ekle</b>
		
		<hr />
		
	</div>
	<div class="col-sm-6">
		<form action="<?php echo ADD_TABLE_POST;?>" method="post">
			<table class="table">
				<tr>
					<td>
						<select name="zone_id" class="form-control" required>
							<option value="">Bölge Seçiniz</option>
							<?php foreach($list as $key => $val){ ?>
								<option value="<?php echo $val['zone_id'];?>">
									<?php echo $val['zone_name'];?>
								</option>
							<?php } ?>
						</select>
					</td>
					<td></td>
				</tr>
				<tr>
					<td>
						<input type="number" name="table_qty" class="form-control" placeholder="Masa Sayısı Giriniz"/>
					</td>
					<td>
						<!--<input type="text" name="table_name" class="form-control" placeholder="Masa Adı Giriniz"/>-->
					</td>
					<td></td>
				</tr>
				<tr>
					<td>
						
					</td>
					<td>
						<input type="submit" class="btn btn-success" value="Kaydet"/>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
			
<?php include('includes/footer-order.php');?>

<?php include('includes/header-order.php');?>
<div class="topBar">
	<a href="<?php echo MAIN_BOARD;?>" class="backToHome">
	<i class="fa fa-chevron-left"></i>
	<i class="fa fa-chevron-left"></i> Ana Sayfa</a>
</div>
<div class="col-xs-12" style="padding:15px;">

	<div>
		<b>Seçenek Grubu Adı Güncelleme</b>
		<a href="<?php echo OPTION_GROUPS_LIST;?>" CLASS="btn btn-warning pull-right">Seçenek Grupları</a>
		<hr />
	</div>
	<form action="<?php echo UPDATE_OPTION_GROUP_POST;?>" method="post">
		<input type="hidden" name="og_id" value="<?php echo $group['og_id'];?>" />
		<table class="table">
			<tr>
				<td>Seçenek Grubu Adı</td>
				<td>
					<input type="text" class="form-control" name="og_name" value="<?php echo $group['og_name'];?>"/>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" class="btn btn-success" value="Kaydet"/>
				</td>
			</tr>
		</table>
	</form>
</div>
			
<?php include('includes/footer-order.php');?>

<?php include('includes/header-order.php');?>
<div class="col-xs-12" style="padding:15px;">
	<div>
		<b>Seçenek Adı Güncelleme</b>
		<a href="<?php echo OPTION_GROUPS_LIST;?>" CLASS="btn btn-warning pull-right">Seçenek Grupları</a>
		<hr />
	</div>
	<form action="<?php echo UPDATE_OPTION_POST;?>" method="post">
		<input type="hidden" name="option_id" value="<?php echo $option['option_id'];?>" />
		<table class="table">
			<tr>
				<td>Seçenek Adı</td>
				<td>
					<input type="text" class="form-control" name="option_name" value="<?php echo $option['option_name'];?>"/>
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

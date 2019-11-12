<?php include('includes/header-order.php');?>
<div class="topBar">
	<a href="<?php echo MAIN_BOARD;?>" class="backToHome">
	<i class="fa fa-chevron-left"></i>
	<i class="fa fa-chevron-left"></i> Ana Sayfa</a>
</div>
<div class="col-xs-12" style="padding:15px;">
	<div>
		<b>Seçenek Grubuna Seçenek Ekleme</b>
		<a href="<?php echo OPTION_GROUPS_LIST;?>" CLASS="btn btn-warning pull-right">Seçenek Grupları</a>
		<hr />
	</div>
	<form action="<?php echo ADD_OPTION_TO_GROUP_POST;?>" method="post">
		<input type="hidden" name="og_id" value="<?php echo $og['og_id'];?>" />
		<table class="table">
			<tr>
				<td>Seçenek Grubu</td>
				<td>
					<?php echo $og['og_name'];?>
				</td>
			</tr>
			<tr>
				<td>Seçenek Adı</td>
				<td>
					<input type="text" class="form-control" name="option_name"/>
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
	
<hr />
<div class="">
	<div>
		<b>Seçenekler</b>
		<hr />
	</div>
	<?php foreach($og_options as $key => $val){ ?>
		<div class="col-xs-12" style="padding:15px; border-bottom:2px dashed #f4f4f4;">
			<?php echo $val['option_name'];?>
			<span class="pull-right">
				<a href="<?php echo UPDATE_OPTION.$val['option_id'];?>" class="btn btn-info">Düzenle</a>  
				<a href="<?php echo DELETE_OPTION.$val['option_id'];?>" class="btn btn-danger">Sil</a> 
			</span>
		</div>
	<?php } ?>
</div>	
	
</div>
			
<?php include('includes/footer-order.php');?>

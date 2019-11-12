<?php include('includes/header-order.php');?>
<div class="topBar">
	<a href="<?php echo MAIN_BOARD;?>" class="backToHome">
	<i class="fa fa-chevron-left"></i>
	<i class="fa fa-chevron-left"></i> Ana Sayfa</a>
</div>
<div class="col-xs-12" style="padding:15px;">
	<div>
		<b>Ürüne Seçenek Ekleme</b>
		<a href="<?php echo PRODUCT_LIST;?>" CLASS="btn btn-warning pull-right">Ürün Listesi</a>
		<hr />
	</div>
	<form action="<?php echo ADD_OPTION_TO_PRODUCT_POST;?>" method="post">
		<input type="hidden" name="pro_id" value="<?php echo $product['pro_id'];?>" />
		<table class="table">
			<tr>
				<td>Ürün Adı</td>
				<td>
					<?php echo $product['pro_name'];?>
				</td>
			</tr>
			<tr>
				<td>Seçenek Grupları</td>
				<td>
					<?php foreach($option_groups as $key => $val){ ?>
						<div><b><?php echo $val['og_name'];?></b></div>
						<div class="og_<?php echo $val['og_id'];?>"  style="border:1px solid #ddd; margin-bottom:15px; padding:15px;">
							<?php foreach($val['options'] as $kk => $vv){ ?>
								<div>
									<input class="opt" type="radio" name="option_id[<?php echo $val['og_id'];?>]" value="<?php echo $vv['option_id'];?>" /> <?php echo $vv['option_name'];?>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td>Fiyat</td>
				<td>
					<input type="text" name="option_price" class="form-control" />
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
	<?php foreach($pro_options as $key => $val){ ?>
		<div class="col-xs-12" style="padding:15px; border-bottom:2px dashed #f4f4f4;">
			<?php echo $val['option_name'].' '.$val['option_price'];?>
			<span class="pull-right">
				<a href="<?php echo UPDATE_OPTION.$val['id'];?>" class="btn btn-info">Düzenle</a>  
				<a href="<?php echo DELETE_OPTION_FROM_PRODUCT.$val['id'];?>" class="btn btn-danger">Sil</a> 
			</span>
		</div>
	<?php } ?>
</div>	
	
</div>
			
<?php include('includes/footer-order.php');?>
<script type="text/javascript">
	$(".opt:first").attr("checked","checked");
</script>
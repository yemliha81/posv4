<?php include('includes/header-order.php');?>
<style type="text/css">
	.backToHome{font-size:20px;display:inline-block; line-height:1;padding:15px 25px; background:#4972B7; color:#fff;}
	.cat_btn{padding:20px 10px;font-size:20px;}
	.pro_boxx{display:inline-block; margin:3px; padding:20px; border:1px solid #ddd;color:#fff;}
	.products_box{border:1px solid #ddd; margin-bottom:10px; padding:5px;}
	.pro_row{line-height:1; background:#f7f7f7; border:1px solid #ddd; padding:7px;}
</style>
<div>
	<a href="<?php echo MAIN_BOARD;?>" class="backToHome">
	<i class="fa fa-chevron-left"></i>
	<i class="fa fa-chevron-left"></i> Ana Sayfa</a>
</div>
<div class="col-xs-12" style="padding:15px;">
		<div class="row pro_row" >
			<div class="col-sm-3">
				
			</div>
			<?php foreach($options as $kk => $vv){ ?>
				<div class="col-sm-3">
					<?php echo $vv['option_name'];?>
				</div>
			<?php } ?>
			
		</div>
	<form action="<?php echo UPDATE_PRICES_POST;?>" method="post">
		<?php foreach($products as $key => $val){ ?>
			<div class="row pro_row row_<?php echo $val['pro_id'];?>" >
			<input type="hidden" name="pro[<?php echo $key;?>][pro_id]" value="<?php echo $val['pro_id'];?>" />
				<div class="col-sm-3">
					<?php echo $val['pro_name'];?>
				</div>
				
				<?php $opCount = count($options);?>
				
				<?php if(!empty($val['options'])){ ?>
					
					<?php foreach($val['options'] as $kk => $vv){ ?>
						<div class="col-sm-3">
							<input type="text" class="form-control" 
							name="pro[<?php echo $key;?>][option][<?php echo $kk;?>][option_price]"  
							value="<?php echo $vv['option_price'];?>"/>
							<input type="hidden" class="form-control" 
							name="pro[<?php echo $key;?>][option][<?php echo $kk;?>][option_id]" 
							value="<?php echo $vv['option_ids'];?>" 
							/>
						</div>
					<?php } ?>
				
				<?php }else{ ?>
					<?php foreach($options as $kk => $vv){ ?>
							<div class="col-sm-3">
								<input type="text" class="form-control" 
								name="pro[<?php echo $key;?>][option][<?php echo $kk;?>][option_price]"  
								value="<?php echo $vv['option_price'];?>"/>
								<input type="hidden" class="form-control" 
								name="pro[<?php echo $key;?>][option][<?php echo $kk;?>][option_id]" 
								value="<?php echo $vv['option_id'];?>" 
								/>
							</div>
					<?php } ?>
				<?php } ?>
				<div class="col-sm-3">
					<a href="javascript:;" class="fa fa-times btn btn-danger removePro" pro_id="<?php echo $val['pro_id'];?>"></a>
				</div>
			</div>
		<?php } ?>
		<div>
			<input type="submit" value="Kaydet" class="btn btn-success" />
		</div>
	</form>
</div>
<?php include('includes/footer-order.php');?>
<script type="text/javascript">
	$(".removePro").click(function(){
		var pro_id = $(this).attr("pro_id");
		$.ajax({
			type : "post",
			url : "<?php echo DEL_PRO_PERM;?>",
			data : {"pro_id" : pro_id},
			success : function(response){
				if(response == 'success'){
					console.log(pro_id+" silindi");
					$(".row_"+pro_id).fadeOut();
				}else{
					alert("Hata oluştu!!!");
				}
			}
		});
		//alert("test");
	});
</script>
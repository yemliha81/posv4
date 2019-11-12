<?php include('includes/header.php');?>
<div class="row">
	<div class="col-sm-3 hidden-sm hidden-xs">
		<div class="cats_list">
			<?php foreach($cats as $key => $val){ ?> 
				<div>
					<a href="<?php echo CAT_PAGE.$val['cat_id'];?>"><?php echo $val['cat_name'];?></a>
				</div>
			<?php } ?>
		</div>
	</div>
	<div class="col-sm-9">
		<div class="row">
			<?php foreach($cats as $key => $val){ ?>
				<div class="col-sm-4">
					<div class="">
						<a class="sub_cat_link" href="<?php echo CAT_PAGE.$val['cat_id'];?>">
							<div class="text-center">
								<b><?php echo $val['cat_name'];?></b>
							</div>
						</a>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
	
	<div class="clearfix"></div>
</div>
<?php include('includes/footer.php');?>
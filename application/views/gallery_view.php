<?php include('includes/header.php');?>
<style type="text/css">
	img{border-radius:3px; overflow:hidden;}
</style>
<div class="container">
	<div class="row">
		<div class="text-center">
			<hr/>
				<div class="amatic f_30"><b>GALERİ</b></div>
			<hr/>
		</div>
		
		<?php foreach($gallery as $key => $val){ ?>
			<div class="col-md-3 col-sm-4">
				<div class="pr_box">
					<a href="<?php echo IMG;?>gallery/1000/<?php echo $val['img_name'];?>" data-fancybox="group" data-caption="">
						<img src="<?php echo IMG;?>gallery/300/<?php echo $val['img_name'];?>" width="100%" alt=""/>
					</a>
				</div>
			</div>
		<?php } ?>
		
	</div>
	
	<div class="clearfix"></div>
</div>
<?php include('includes/footer.php');?>
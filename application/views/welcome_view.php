<?php include('includes/header.php');?>
<div class="">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
		<?php foreach($banners as $key => $val){ ?>
			<li data-target="#myCarousel" data-slide-to="<?php echo $key;?>" class="dots"></li>
		<?php } ?>
		
	  </ol>

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner">
		<?php foreach($banners as $key => $val){ ?>
			<div class="item itemRel">
			<a href="<?php echo $val['slide_link'];?>">
			  <img src="<?php echo FATHER_BASE.'admin/img/banners/'.$val['slide_img'];?>" width="100%" alt="">
				<!--<div class="item_caption">
					<div><h2><?php echo $val['slide_title'];?></h2></div>
					<div><h4><?php echo $val['slide_text'];?></h4></div>
				</div>-->
			</a>
			</div>
		<?php } ?>
	  </div>

	  <!-- Left and right controls -->
	  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
		<span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#myCarousel" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
		<span class="sr-only">Next</span>
	  </a>
	</div>
</div>
<div class="container" style="padding:20px 0;">
	<div class="row">
		<div class="text-center">
			<hr/>
				<div class="amatic f_30"><b>GALERİ</b></div>
			<hr/>
		</div>
		
		<?php foreach($gallery as $key => $val){ ?>
			<div class="col-sm-4">
				<div class="pr_box">
					<a href="<?php echo IMG;?>gallery/1000/<?php echo $val['img_name'];?>" data-fancybox="group" data-caption="">
						<img src="<?php echo IMG;?>gallery/300/<?php echo $val['img_name'];?>" width="100%" alt=""/>
					</a>
				</div>
			</div>
		<?php } ?>
		<!--<?php foreach($products as $key => $val){ ?>
			<div class="col-md-3 col-sm-4">
				<div class="pr_box">
					<div class="pro_img_div">
						<a href="<?php echo PRODUCT_PAGE.$val['pro_id'];?>">
							<img src="<?php echo FATHER_BASE.'admin/img/products/'.$val['pro_img'];?>" width="100%" alt="<?php echo $val['pro_name'];?>"/>
						</a>
					</div>
					<div class="pr_name text-center">
						<b><?php echo $val['pro_name'];?></b>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		<?php } ?>-->
	</div>
</div>

<?php include('includes/footer.php');?>
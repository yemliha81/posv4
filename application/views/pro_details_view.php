<?php include('includes/header.php');?>
<style type="text/css">
	img{border-radius:3px; overflow:hidden;}
</style>
<div>
	<div class="breadcrumb" style="font-size:20px; font-family: 'Indie Flower', cursive;">
		<a href="<?php echo FATHER_BASE;?>">Anasayfa</a> <i class="fa fa-chevron-right"></i> 
		<a href="<?php echo CAT_PAGE.$cat_id;?>"><?php echo $cat_name;?></a> <i class="fa fa-chevron-right"></i> 
		<?php echo $product['pro_name'];?>
	</div>
</div>
<div>
	<div class="col-sm-3">
		<img width="100%" src="<?php echo FATHER_BASE.'admin/img/products/'.$product['pro_img'];?>" alt="" />
	
		<!--<div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails" style="width:100%;">
			<a style="width:100%;" href="<?php echo FATHER_BASE.'admin/img/products/big/'.substr($product['pro_img'], 0, -4).'-800px.jpg';?>">
				<img width="100%" src="<?php echo FATHER_BASE.'admin/img/products/'.$product['pro_img'];?>" alt="" />
			</a>
		</div>

		<?php if(!empty($imgs)){ ?>
			<ul class="thumbnails">
				<?php foreach($imgs as $key => $val){ ?>
					<?php $small[$key] = FATHER_BASE.'admin/img/products/extra/medium/'.$val['img_name'];?>
					<?php $large[$key] = FATHER_BASE.'admin/img/products/extra/source/'.$val['img_name'];?>
					<li>
						<a href="<?php echo $large[$key];?>" data-standard="<?php echo $small[$key];?>">
							<img src="<?php echo $small[$key];?>" alt="" />
						</a>
					</li>
				<?php }?>
			</ul>
		<?php } ?>-->
		<div style="padding:10px 0;">
			<span class="pull-right">
				<!--<div class="fb-share-button" 
					  data-href="http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" 
					  data-layout="button" 
					  data-size="large" 
					  data-mobile-iframe="true">
					  <a class="fb-xfbml-parse-ignore" target="_blank" href="http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>">Share</a>
				</div>-->
				<!--<a class="twitter-share-button"
				  href="http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>"
				  data-size="large">
					Tweet
				</a>-->
				
			</span>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="col-sm-9" style="">
		<div style="font-size:36px; font-weight:bold; font-family:'Amatic SC', cursive;"><?php echo $product['pro_name'];?></div>
		<div style="font-size:24px; font-family: 'Indie Flower', cursive;">
			<?php echo ucfirst(strip_tags($product['pro_description']));?>
			<?php if($price_info['price_detail_show'] == '1'){ ?>
				<div style="margin-top:20px;"><b>Menü Fiyatı : </b><?php echo $product['pro_price'];?> TL</div>
			<?php }?>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
<?php include('includes/footer.php');?>
<script type="text/javascript">
	$(document).ready(function(){
		
		// Instantiate EasyZoom instances
		var $easyzoom = $('.easyzoom').easyZoom();

		// Setup thumbnails example
		var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

		$('.thumbnails').on('click', 'a', function(e) {
			var $this = $(this);

			e.preventDefault();

			// Use EasyZoom's `swap` method
			api1.swap($this.data('standard'), $this.attr('href'));
		});

	});
</script>
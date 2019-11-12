<?php include('includes/header-order.php');?>
<style type="text/css">
	.backToHome{font-size:20px;display:inline-block; line-height:1;padding:15px 25px; background:#4972B7; color:#fff;}
	.cat_btn{font-size:15px;margin-bottom:5px;}
	.cat_name{border:1px solid #ddd;}
	.cat_name:hover{background:#f7f7b9;border:1px solid #ddd;}
	.pro_boxx{position:relative;}
	.products_box{border:1px solid #ddd; margin-bottom:10px; padding:5px;}
	.removePro{}
	.tab_cat{display:none;}
	.cats_names{line-height:1;font-weight:bold; border-bottom:1px solid #ddd; padding:8px;}
	.cats_btns{font-size:13px;line-height:1; padding:8px;background:#f4f4f4;}
	.porsDiv{}
	.optDiv{cursor:pointer;padding:3px;font-weight:bold;}
	.optDiv:hover{background:#efefef;}
	.bold{font-weight:bold;}
</style>

<div class="left1">
	<?php include('includes/left_menu.php');?>
</div> 

<div class="left2">
	<div class="top">
		<div>
			<a href="javascript:;" class="tglM" style="position:fixed;top:0; right:0;  z-index:99999999; background:#666; color:#fff; padding:15px;">
				<i class="fas fa-bars fa-2x"></i>
			</a>
		</div>
		<div>
			<div class="col-xs-12">
				<div class="row">
					<div class="col-sm-6">
						<span class="pageTitle"><?php echo $title;?></span>
					</div>
					<div class="col-sm-6">
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="mainContainer"style="padding:0 15px;">
	
		<div class="srcDiv row" style="margin-bottom:15px;">
			<div class="col-sm-7">
				<input type="text" class="customSrc srcStyle srcTerm srcX" placeholder="Search..." />
			</div>
			<div class="col-sm-2">
				
			</div>
			<div class="col-sm-3">
				
			</div>
		</div>
		<div class="whiteZone f13" style="padding-right:0; padding-left:0;">
			<?php if(!empty($_SESSION['sameNames'])) { ?>
				<div class="alert alert-warning">
					<?php echo $_SESSION['sameNames'];?> isimli ürünler daha önce eklenmiştir!
					<?php //unset($_SESSION['sameNames']); ?>
				</div>
			<?php } ?>
			<div class="">
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Ürün Adı</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($list as $kk => $vv){ ?>
							<tr class="link_tr pro_boxx" link="<?php echo PRODUCT_COST.$vv['pro_id'];?>" pro_id="<?php echo $vv['pro_id'];?>"  >
								<td><?php echo $vv['pro_id'];?></td>
								<td>
									<?php echo $vv['pro_name'];?>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>			
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>

<?php include('includes/footer-order.php');?>
<?php include('includes/header-order.php');?>
<style type="text/css">
	.backToHome{font-size:20px;display:inline-block; line-height:1;padding:15px 25px; background:#4972B7; color:#fff;}
	.cat_btn{padding:20px 10px;font-size:20px; margin-right:5px;}
	.copied{position:relative;}
	.delRow{position:absolute; right:-30px; top:0;}
</style>
<div class="left1">
	<?php include('includes/left_menu.php');?>
</div> 

<div class="left2">
	<div class="top">
		<div >
			<a href="javascript:;" class="tglM" style="position:fixed;top:0; right:0;  z-index:99999999; background:#666; color:#fff; padding:15px;">
				<i class="fas fa-bars fa-2x"></i>
			</a>
		</div>
		<div>
			<div class="col-xs-12">
			<div class="row">
				<div class="col-sm-6">
					<span class="pageTitle">Bölge Düzenle</span>
				</div>
				<div class="col-sm-6">
					
				</div>
			</div>
				
			</div>
		</div>
	</div>
	
	
	<div class="mainContainer"style="padding:0 15px;">
	
	<div class="srcDiv row" style="margin-bottom:15px;">
		<div class="col-sm-9">
			<input type="text" class="customSrc srcStyle srcTerm srcX" placeholder="Search..." />
		</div>
		<div class="col-sm-3">
			
		</div>
	</div>
	
		<div class="whiteZone f13" style="padding-right:0; padding-left:0;">
			<form action="<?php echo UPDATE_ZONE_POST;?>" method="post">
				<table class="table">
						<tr>
							<td>
								<input type="hidden" name="zone_id" value="<?php echo $zone['zone_id'];?>"/>
								<input type="text" name="zone_name" class="form-control" value="<?php echo $zone['zone_name'];?>"/>
							</td>
							<td></td>
						</tr>
						<tr>
							<td>
								<input type="submit" class="butonX1" value="Kaydet"/>
							</td>
							<td></td>
						</tr>
				</table>
			</form>
		</div>
	</div>
</div>	
<?php include('includes/footer-order.php');?>

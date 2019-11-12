<?php include('includes/header-order.php');?>
<style type="text/css">
	.backToHome{font-size:20px;display:inline-block; line-height:1;padding:15px 25px; background:#4972B7; color:#fff;}
	.tablesWrapper{overflow-x:auto;}
	.tables{min-height:1000px;background:#ddd;}
	.tbl{padding:5px; background:#505050; color:#fff; font-weight:bold;}
	.ord{width:250px; float:left;background:#fff; margin:5px;border-radius:5px; overflow:hidden;}
	.btnns{padding:5px; background:#efefef;}
	.tbls a{display:block;padding:20px !important; font-size:22px; text-align:center; background: #404040 !important; border-right: 2px solid #fff  !important;border-top: 2px solid #fff  !important;color:#fff !important;}
	.tbls .active a{background:#c02e2d !important; color:#fff !important;}
	.tbls .active a:focus{text-decoration:none;}
	.tb1x a{background:#505050 !important; color:#fff !important;font-weight:bold;}
	
	[class^="flaticon-"]:before, [class*=" flaticon-"]:before,
	[class^="flaticon-"]:after, [class*=" flaticon-"]:after {   
			font-size: 34px;
	}
	.tglMx{display:none !important;}
	@media only screen and (max-width: 600px){
		.tbls a{padding:10px 0; font-size:15px; border-bottom: 2px solid #fff  !important; line-height: 1; height: 65px;}
		.btnXX{width:100%;height:75px;font-size:14px;}
	}
</style>

	<div class="tbls" style="margin-bottom:2px;">
	   <div class="col-xs-4 tb1x" style="padding:0;"><a href="<?php echo MAIN_BOARD;?>">Anasayfa</a></div>
	  <div class="col-xs-4 tb1x active" style="padding:0;"><a href="<?php echo KITCHEN;?>">Mutfaklar</a></div>
	  <div class="col-xs-4 tb1x" style="padding:0;"><a href="<?php echo KITCHEN2;?>">Hazır Siparişler</a></div>
	 <div class="clearfix"></div>
	</div>

<div class="" style="">
	<div class="row" style="margin:15px;">
		<?php foreach($kitchens as $key => $val){ ?>
			<div class="col-sm-4 col-xs-6 text-center" style="margin-bottom:40px;">
				<a class="btn btn-2 btn-2h newbtn dayStart w100" href="<?php echo KITCHEN_DETAIL.$val['kitchen_id'];?>" style="background:#c02e2d; padding:55px 0 !important;">
					<div class="glyph-icon flaticon-reception-bell"></div><br />
					<span class="xText f20" style="display:inline-block;margin-top:10px; height:55px;"><b><?php echo $val['kitchen_name'];?></b></span>
				</a>
			</div>
		<?php } ?>
	</div>
	<div class="clearfix"></div>
</div>


<input type="hidden" class="isActive" value="0" />
<?php 
	$auth = '0';
	if(!empty($_SESSION['authList'])){ 
		foreach($_SESSION['authList'] as $key => $val){
			if($val['auth_id'] == '4'){
				$auth = '1';
			}
		}
	}

?>
<input type="hidden" class="auth" value="<?php echo $auth;?>" />
<input type="hidden" class="authNum" value="4" />
<input type="hidden" class="last2" value="" />
<?php include('includes/footer-order.php');?>
<script type="text/javascript" src="<?php echo ASSETS;?>js/jquery.playSound.js"></script>

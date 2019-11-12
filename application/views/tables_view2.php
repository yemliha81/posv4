<?php include('includes/header-order.php');?>
<style type="text/css">
	input{width:40px;border:0;}
	.btnXX{width:100%;height:100px;font-size:25px;}
	.noP{padding:0;}
	.bb{box-sizing:border-box;}
	.m5{margin:5px;}
	.p1{padding:1px;}
	.p5{padding:5px;}
	.btn-busy{background:#FFA500; color:#000; font-weight:bold;}
	.btn-free{background:#404040; color:#f7f7f7; font-weight:bold;}
	.backToHome{font-size:20px;display:inline-block; line-height:1;padding:15px 25px; background:#4972B7; color:#fff;}
	.nav-tabs a{padding:20px !important; font-size:22px; text-align:center; background: #404040 !important; border-right: 2px solid #fff  !important;color:#fff !important;}
	.nav-tabs .active a{background:#2196f3 !important; color:#fff !important;}
	.tbls a{display:block;padding:20px !important; font-size:22px; text-align:center; background: #404040 !important; border-right: 2px solid #fff  !important;color:#fff !important;}
	.tbls .active a{background:#2196f3 !important; color:#fff !important;}
	@media only screen and (max-width: 600px){
		.tbls a{padding:10px 0; font-size:15px; border-bottom: 2px solid #fff  !important; line-height: 1; height: 65px;}
	}
</style>
<div class="" style="">
<div class="topBar">
	<a href="<?php echo MAIN_BOARD;?>" class="backToHome">
	<i class="fa fa-chevron-left"></i>
	<i class="fa fa-chevron-left"></i> Ana Sayfa</a>
	<a href="<?php echo PACK_ORDER_LIST;?>" class="backToHome hidden">
	<i class="fa fa-gift"></i> Paket Siparişler</a>
</div>
	<div class="">
		<div class="col-xs-12">
			<div class="row tbls">
			  <div class="active col-sm-2 col-xs-4" style="padding:0;"><a data-toggle="tab" href="#home">Tüm Masalar</a></div>
			 <?php foreach($zones as $key => $val){ ?>
				<div class="col-sm-2 col-xs-4" style="padding:0;"><a data-toggle="tab" href="#tab<?php echo $val['zone_id'];?>"><?php echo $val['zone_name'];?></a></div>
			 <?php } ?>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="tab-content">
		  <div id="home" class="tab-pane fade in active">
			
			<div class="col-sm-12">
				<div class="row">
					<?php foreach($tables as $kk => $vv){ ?>
						<div class="col-sm-2 col-xs-4 noP p1 bb">
							<div class="tableBox">
								<?php if($vv['is_busy'] == '1'){$cls = 'busy';}else{$cls = 'free';}?>
									<a class="btnXX btn btn-<?php echo $cls;?> btn-float" href="<?php echo ORDER_PAGE.$vv['table_id'];?>">
										
											<?php echo $vv['table_name'];?>
											<?php if($vv['is_busy'] == '1'){ ?>
												<div><?php echo $vv['total']['rest_price'];?> <span class="fa fa-try"></span></div>
											<?php } ?>
									</a>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		  </div>
		  <?php foreach($zones as $key => $val){ ?>
			<div id="tab<?php echo $val['zone_id'];?>" class="tab-pane fade">
				<?php foreach($val['tables'] as $kk => $vv){ ?>
						<div class="col-sm-3 noP p1 bb">
							
								<div class="tableBox">
									
									<?php if($vv['is_busy'] == '1'){$cls = 'busy';}else{$cls = 'free';}?>
										<a class="btnXX btn btn-<?php echo $cls;?> btn-float" href="<?php echo ORDER_PAGE.$vv['table_id'];?>">
											
												<?php echo $vv['table_name'];?>
												<?php if($vv['is_busy'] == '1'){ ?>
													<div><?php echo $vv['total']['rest_price'];?> <span class="fa fa-try"></span></div>
												<?php } ?>
											
										</a>
									
								</div>
							
						</div>
					<?php } ?>
		    </div>
		 <?php } ?>
		</div>
		<div class="clearfix"></div>
	</div>
	
	<div class="clearfix"></div>
</div>

<input type="hidden" class="isActive" value="0" />
<?php 
	$auth = '0';
	if(!empty($_SESSION['authList'])){ 
		foreach($_SESSION['authList'] as $key => $val){
			if($val['auth_id'] == '2'){
				$auth = '1';
			}
		}
	}

?>
<input type="hidden" class="authNum" value="2" />
<input type="hidden" class="auth" value="<?php echo $auth;?>" />
<?php include('includes/footer-order.php');?>
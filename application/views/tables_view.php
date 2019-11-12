<?php include('includes/header-order.php');?>
<style type="text/css">
	input{width:40px;border:0;}
	.btnXX{width:100%;height:100px;font-size:20px;}
	.noP{padding:0;}
	.tglMx{display:none !important;}
	.bb{box-sizing:border-box;}
	.m5{margin:5px;}
	.p1{padding:1px;}
	.p5{padding:5px;}
	.btn-busy{background:#FFA500; color:#000; font-weight:bold;}
	.btn-busy a{color:#c02e2d; font-weight:normal;}
	.btn-free{background:#404040; color:#f7f7f7; font-weight:bold;}
	.btn-printed{background:#c02e2d !important; color:#fff; font-weight:bold;}
	.backToHome{font-size:20px;display:inline-block; line-height:1;padding:15px 25px; background:#4972B7; color:#fff;}
	.nav-tabs a{padding:20px !important; font-size:22px; text-align:center; background: #404040 !important; border-right: 2px solid #fff  !important;color:#fff !important;}
	.nav-tabs .active a{background:#2196f3 !important; color:#fff !important;}
	.tbls a{display:block;padding:20px !important; font-size:22px; text-align:center; background: #404040 !important; border-right: 2px solid #fff  !important;border-top: 2px solid #fff  !important;color:#fff !important;}
	.tbls .active a{background:#c02e2d !important; color:#fff !important;}
	.tbls .active a:focus{text-decoration:none;}
	.tb1x a{background:#ddd !important; color:#666 !important;font-weight:bold;}
	@media only screen and (max-width: 600px){
		.tbls a{padding:10px 0; font-size:15px; border-bottom: 2px solid #fff  !important; line-height: 1; height: 65px;}
		.btnXX{width:100%;height:100px;font-size:14px;}
	}
</style>
<div class="" style="">
	<div class="">
		<div class="col-xs-12"> 
			<div class="row tbls">
			   <div class="col-sm-3 col-xs-3 tb1x" style="padding:0;"><a href="<?php echo MAIN_BOARD;?>">Anasayfa</a></div>
			  <div class="col-sm-3 col-xs-3 tb1x active" style="padding:0;"><a data-toggle="tab" href="#home">Tüm Masalar</a></div>
			  <div class="col-sm-3 col-xs-3 tb1x" style="padding:0;"><a href="<?php echo PHONE_ORDER;?>">Online Sipariş</a></div>
			  <div class="col-sm-3 col-xs-3 tb1x" style="padding:0;"><a href="<?php echo KIOSK_ORDER;?>1">Kiosk</a></div>
			 <div class="clearfix"></div>
			 <?php foreach($zones as $key => $val){ ?>
				<div class="col-sm-4 col-xs-4 tb1x" style="padding:0;"><a data-toggle="tab" href="#tab<?php echo $val['zone_id'];?>"><?php echo $val['zone_name'];?></a></div>
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
									<?php if($vv['is_busy'] == '1'){$cls = 'busy';}elseif($vv['is_busy'] == '2'){$cls = 'printed';}else{$cls = 'free';}?>
									<a class="tb_<?php echo $vv['table_id'];?>  btnXX btn btn-<?php echo $cls;?> btn-float" href="<?php echo ORDER_PAGE.$vv['table_id'];?>">
										
											<?php echo $vv['table_name'];?>
											
											<div>
												<span class="price_<?php echo $vv['table_id'];?>">
													<?php if($vv['is_busy'] > 0){ ?>
														<?php if($vv['total']['rest_price'] > 0){ ?>
															<?php echo $vv['total']['rest_price'];?> <span class="fa fa-try"></span>
														<?php } ?>
													<?php } ?>
												</span>
											</div>
											
											<div class="table_<?php echo $vv['table_id'];?>"></div>
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
						<div class="col-sm-2  col-xs-4 noP p1 bb">
							<div class="tableBox">
									<?php if($vv['is_busy'] == '1'){$cls = 'busy';}elseif($vv['is_busy'] == '2'){$cls = 'printed';}else{$cls = 'free';}?>
									<a class="tb_<?php echo $vv['table_id'];?>  btnXX btn btn-<?php echo $cls;?> btn-float" href="<?php echo ORDER_PAGE.$vv['table_id'];?>">
										
											<?php echo $vv['table_name'];?>
											
											<div>
												<span class="price_<?php echo $vv['table_id'];?>">
													<?php if($vv['is_busy'] > 0){ ?>
														<?php if($vv['total']['rest_price'] > 0){ ?>
															<?php echo $vv['total']['rest_price'];?> <span class="fa fa-try"></span>
														<?php } ?>
													<?php } ?>
												</span>
											</div>
											
											<div class="table_<?php echo $vv['table_id'];?>"></div>
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

<!-- Modal -->
<div id="readyModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body readyResponse" style="padding:0;">
		
      </div>
    </div>

  </div>
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
<script type="text/javascript">
	$(".tb1x").click(function(){
		$(".tb1x").removeClass("active");
		$(this).addClass("active");
	});
	
	setInterval(function(){
		$.ajax({
			type : "get",
			url : "<?php echo CHECK_READY;?>",
			success : function(response){
				datax = JSON.parse(response);
				for(var key in datax){
					if( datax[key].order.ready != '0' ){
						$(".table_"+datax[key].table_id).html('<a class="table_x" href="javascript:;" data-toggle="modal" data-target="#readyModal" order_id="'+datax[key].order.order_id+'" ><i class="glyph-icon flaticon-reception-bell"></i></a>');
					}
					if( datax[key].order.ready == '0' ){
						$(".table_"+datax[key].table_id).html('');
					}
					if(datax[key].is_busy == '1'){
						$(".tb_"+datax[key].table_id).removeClass("btn-free");
						$(".tb_"+datax[key].table_id).removeClass("btn-printed");
						$(".tb_"+datax[key].table_id).addClass("btn-busy");
						$(".price_"+datax[key].table_id).html(datax[key].total.rest_price+" <span class='fa fa-try'></span>");
					}else if(datax[key].is_busy == '2'){
						$(".tb_"+datax[key].table_id).removeClass("btn-free");
						$(".tb_"+datax[key].table_id).removeClass("btn-busy");
						$(".tb_"+datax[key].table_id).addClass("btn-printed");
						$(".price_"+datax[key].table_id).html(datax[key].total.rest_price+" <span class='fa fa-try'></span>");
					}else{
						$(".tb_"+datax[key].table_id).removeClass("btn-printed");
						$(".tb_"+datax[key].table_id).removeClass("btn-busy");
						$(".tb_"+datax[key].table_id).addClass("btn-free");
						$(".price_"+datax[key].table_id).html("");
					}
				}
			}
		});
	},5000);
	
	$(document).on("click", ".table_x", function(){
		var order_id = $(this).attr("order_id");
		$.ajax({
			type : "post",
			url : "<?php echo GET_READY_ORDER_ROWS;?>",
			data : {"order_id" : order_id},
			success : function(response){
				$(".readyResponse").html(response);
			}
		});	
	});
	
	$(document).on("click", ".complete_2", function(){
		var order_id = $(this).attr("order_id");
		var id = $(this).attr("rel");
		$.ajax({
			type : 'post',
			context : this,
			url : '<?php echo COMPLETE_2;?>',
			data : {"order_id" : order_id, "id" : id},
			success : function(response){
				if(response == 'success'){
					$(this).parent().parent().remove();
					var count = $(".countX").length;
					if(count < 1){
						$(".modal").modal('hide');
					}
				}
			}
		});
	});
	$(document).on("click", ".complete_all2", function(){
		var order_id = $(this).attr("order_id");
		$.ajax({
			type : 'post',
			url : '<?php echo COMPLETE_ALL2;?>',
			data : {"order_id" : order_id},
			success : function(response){
				if(response == 'success'){
					$(".modal").modal('hide');
				}
			}
		});
		
	});
	
</script>
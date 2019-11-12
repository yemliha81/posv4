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
	.tglMx{display:none !important;}
	@media only screen and (max-width: 600px){
		.tbls a{padding:10px 0; font-size:15px; border-bottom: 2px solid #fff  !important; line-height: 1; height: 65px;}
		.btnXX{width:100%;height:75px;font-size:14px;}
	}
</style>

	<div class="tbls" style="margin-bottom:2px;">
	   <div class="col-sm-3 col-xs-3 tb1x" style="padding:0;"><a href="<?php echo MAIN_BOARD;?>">Anasayfa</a></div>
	  <div class="col-sm-3 col-xs-3 tb1x " style="padding:0;"><a href="<?php echo KITCHEN;?>">Mutfaklar</a></div>
	  <div class="col-sm-3 col-xs-3 tb1x active" style="padding:0;"><a href="javascript:;"><?php echo $kitchen['kitchen_name'];?></a></div>
	  <div class="col-sm-3 col-xs-3 tb1x" style="padding:0;"><a href="<?php echo KITCHEN2;?>">Hazır Siparişler</a></div>
	 <div class="clearfix"></div>
	</div>

<div class="" style="">
	<div class="tablesWrapper">
	<?php $w = (count($orders) * 250) + 150;?>
		<div class="tables" style="width:<?php echo $w;?>px;"></div>
	</div>
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
<input type="hidden" class="process" value="0" />
<?php include('includes/footer-order.php');?>
<script type="text/javascript" src="<?php echo ASSETS;?>js/jquery.playSound.js"></script>
<script type="text/javascript">
	/* $(document).ready(function(){
		reloadOrders();
	}); */
	setInterval(function(){
		reloadOrders();
		var last = $(".last").val();
		var last2 = $(".last2").val();
			if(last != last2){
				$.playSound('../../assets/tones/sms.mp3');
				$(".last2").val(last);
			}
		 
	},3000);
	
	$(document).on("click", ".complete_1", function(){
		
		var order_id = $(this).attr("order_id");
		var kitchen_id = $(this).attr("kitchen_id");
		var id = $(this).attr("rel");
		$(".process").val("1");
		$(this).parent().parent().parent().fadeOut();
		$.ajax({
			type : 'post', 
			url : '<?php echo COMPLETE_1;?>',
			data : {"order_id" : order_id, "id" : id, "kitchen_id" : kitchen_id},
			success : function(response){
				
				if(response == 'success'){
					$(".process").val("0");
				}
			}
		});
	});
	
	$(document).on("click", ".complete_all", function(){ 
		//alert("test");
		var order_id = $(this).attr("order_id");
		var kitchen_id = $(this).attr("kitchen_id"); 
		$(".complete_1_"+order_id).each(function(){
			
			var id = $(this).attr("rel");
			
			$.ajax({
				type : 'post',
				url : '<?php echo COMPLETE_1;?>',
				data : {"order_id" : order_id, "id" : id, "kitchen_id" : kitchen_id},
				success : function(response){
					/* if(response == 'success'){
						reloadOrders();
					} */
				}
			});
			
		});
		
	});
	function reloadOrders(){
		var process = $(".process").val();
		var kid = '<?php echo $kitchen_id;?>';
		
		if(process == '0'){
			$.ajax({
				type : 'get',
				url : '<?php echo RELOAD_ORDERS;?>'+kid,
				success : function(response){
					$(".tables").html(response);
				}
			});
		}
		
		
	}
</script>
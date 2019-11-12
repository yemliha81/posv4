<?php include('includes/header-order.php');?>

<style type="text/css">
	.full_input{width:100%; display:block; padding:25px; font-size:20px;}
	.loginBtn{width:100%; display:block; padding:25px; font-size:20px; text-align:center;background:#4d78c1; color:#fff;}
</style>
<div class="container" style="">
	
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<div style="padding-top:200px;">
				<div>
					<input class="full_input" type="password" name="pinCode" placeholder="PIN KODU" />
				</div>
				<div>
					<a class="loginBtn" href="javascript:;">GİRİŞ <i class="fa fa-chevron-right"></i></a>
				</div>
				<div class="formResult"></div>
			</div>
		</div>
		<div class="col-sm-3"></div>
	</div>
</div>
<?php include('includes/footer-order.php');?>
<script type="text/javascript">
	$(".loginBtn").click(function(){
		
		var pin = $(".full_input").val().trim();
		if(pin != ''){
			$.ajax({
				type : "post",
				url : "<?php echo LOGIN_POST;?>",
				data : {"pinCode" : pin},
				success : function(response){
					if(response == 'success'){
						window.location.href = '<?php echo MAIN_BOARD;?>';
					}else{
						alert("Pin Kodu Hatalıdır!");
					}
				}
			});
		}
	});
	
</script>
<?php include('includes/header-order.php');?>
<style type="text/css">
	body{background:#F5F5F5;}
	.backToHome{font-size:20px;display:inline-block; line-height:1;padding:15px 25px; background:#4972B7; color:#fff;}
	.cat_btn{padding:20px 10px;font-size:20px; margin-right:5px;}
	.container{padding:0;}
	.f15{font-size:15px;}
	.auth_name{background:#f7f7f7; padding:10px; line-height:1; margin-bottom:2px;cursor:pointer;}
	.auth_name:hover{background:#eeeeee;}
	.act{background:#2196f3 !important;color:#fff !important;}
</style>
<div class="topBar">
	<a href="<?php echo MAIN_BOARD;?>" class="backToHome">
	<i class="fa fa-chevron-left"></i>
	<i class="fa fa-chevron-left"></i> Ana Sayfa</a>
</div>
<div class="page-container ">
	<div class="container">
		<div class="panel panel-flat">
			<div style="padding:15px;">
			<div class="row">
				<div class="col-sm-3">
				<div style="margin-bottom:10px;"><b>Kullanıcı Tipleri</b></div>
					<?php foreach($user_types as $key => $val){ ?>
						<div class="auth_name" rel="<?php echo $val['user_type_id'];?>">
							<?php echo $val['user_type_name'];?>
						</div>
					<?php } ?>
				</div>
				<div class="col-sm-9">
				<div style="margin-bottom:10px;"><b>Yetki Türleri</b></div>
					<form id="authForm">
					<?php foreach($authentications as $key => $val){ ?>
						<div style="background:#f7f7f7; padding:10px; line-height:1; margin-bottom:2px;">
							<input type="checkbox" class="auth auth_<?php echo $val['auth_id'];?>" name="auth_id[]" value="<?php echo $val['auth_id'];?>"/> <?php echo $val['auth_name'];?>
						</div>
					<?php } ?>
					<input type="hidden" class="ut_id" name="ut_id" value="0" />
						<div style="background:#f7f7f7; padding:10px; line-height:1; margin-bottom:2px;">
							<a href="javascript:;" class="btn btn-success btn-sm saveAuth">Kaydet</a>
						</div>
					</form>
				</div>
			</div>
			</div> 
		</div>
	</div>
</div>
<?php 
	$auth = '0';
	if(!empty($_SESSION['authList'])){ 
		foreach($_SESSION['authList'] as $key => $val){
			if($val['auth_id'] == '9'){
				$auth = '1';
			}
		}
	}

?>
<input type="hidden" class="authNum" value="9" />
<input type="hidden" class="auth" value="<?php echo $auth;?>" />
<?php include('includes/footer-order.php');?>
<script type="text/javascript">
	$(".auth_name").click(function(){
		$(".auth_name").removeClass("act");
		$(this).addClass("act");
		$(".auth").removeAttr( "checked" )
		var ut_id = $(this).attr("rel");
		$(".ut_id").val(ut_id);
		$.ajax({
			type : 'get',
			url : '<?php echo GET_USER_AUTH_LIST;?>'+ut_id,
			success : function(response){
				authList = JSON.parse(response);
				for(var key in authList){
					aL = authList[key];
					$(".auth_"+aL.auth_id).attr("checked", "true");
				}
			}
		});
	});
	$(".saveAuth").click(function(){
		var ut_id = $(".ut_id").val();
		
		if(ut_id != '0'){
			var authForm = $("#authForm").serialize();
			$.ajax({
				type : 'post',
				data : authForm,
				url : '<?php echo USER_AUTH_POST;?>',
				success : function(response){
					if(response == 'success'){
						alert("Başarılı!");
						location.reload();
					}else{
						alert("Hata oluştu!");
					}
				}
			});
		}else{
			alert("Lütfen soldaki menüden Kullanıcı Tipi seçiniz.");
		}
		
		
	});
	
</script>
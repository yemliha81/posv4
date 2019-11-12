<?php include('includes/header-order.php');?>
<link rel="stylesheet" href="<?php echo ASSETS;?>css/summernote.css"/>
<style type="text/css">
	body{background:#F5F5F5;}
	.backToHome{font-size:20px;display:inline-block; line-height:1;padding:15px 25px; background:#4972B7; color:#fff;}
	.cat_btn{padding:20px 10px;font-size:20px; margin-right:5px;}
	.container{padding:0;}
	.f15{font-size:15px;}
	.auth_name{    
		background: #f7f7f7;
		padding: 22px 5px;
		line-height: 16px;
		margin-bottom: 2px;
		border-right: 1px solid #fff;
		cursor: pointer;
		text-align: center;
		font-weight: bold;
		font-size: 19px;
		height: 70px;
		vertical-align: middle;
    border-top: 5px solid #373636;}
	.auth_name2{background:#f7f7f7; padding:10px; line-height:1; margin-bottom:2px;cursor:pointer;}
	.auth_name:hover{background:#373636; color:#fff;}
	.auth_name2:hover{background:#eeeeee;}
	.act{background:#373636 !important;color:#fff !important;}
	.tab{display:none;}
</style>
<?php function user_type($utid){
	if($utid == '1'){
		return 'Yönetici';
	}
	if($utid == '2'){
		return 'Garson';
	}
	if($utid == '3'){
		return 'Mutfak';
	}
	if($utid == '4'){
		return 'Kiosk';
	}
} ?>

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
					<span class="pageTitle">Ayarlar <i class="f18 fa fa-chevron-right"></i> Arşivlenmiş Kullanıcı Listesi</span>
				</div>
				<div class="col-sm-6">
					
				</div>
			</div>
				
			</div>
		</div>
	</div>
	
	
	<div class="mainContainer"style="padding:0 15px;">
	
		<div class="whiteZone f13" style="">
			<div class="row">
				<div class="col-sm-12">
					<div style="margin-bottom:10px;"><b>&nbsp;</b></div>
					<div class="">
						<div class="row">
						<div class="col-xs-12">
							<a href="<?php echo USER_SETTINGS2;?>" class="butonX1 pull-right" >KULLANICI LİSTESİ</a>
						</div>
							<table class="table table-hover">
								<thead>
									<tr>
										<th>İsim</th>
										<th>Kullanıcı Tipi</th>
										<th>Şifre</th>
										<th>Kayıt Tarihi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($user_list as $key => $val){ ?>
										<tr class="link_tr updUser" link="#" data-toggle="modal" data-target="#userModal" rel="<?php echo $val['user_id'];?>">
											<td><?php echo $val['user_name'];?></td>
											<td><?php echo user_type($val['user_type_id']);?></td>
											<td><?php echo $val['password'];?></td>
											<td><?php echo date('d-m-Y',$val['user_insert_time']);?></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>



<div id="addUserModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <form action="<?php echo ADD_USER_POST;?>" method="post">
		<p class="text-center borderB">
			<b>KULLANICI EKLE</b> <br /> <br />
		</p>
		<p>
			<div class="">
				<div class="col-xs-4">
					<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; AD - SOYAD</span>
				</div>
				<div class="col-xs-8">
					<input type="text" class="form-control" name="user_name" required />
				</div>
				<div class="clearfix"></div>
			</div>
		</p>
		<p>
			<div class="">
				<div class="col-xs-4">
					<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; ŞİFRE</span>
				</div>
				<div class="col-xs-8">
					<input type="password" class="form-control" name="password" required />
				</div>
				<div class="clearfix"></div>
			</div>
		</p>
		<p>
			<div class="">
				<div class="col-xs-4">
					<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; KULLANICI TÜRÜ</span>
				</div>
				<div class="col-xs-8">
					<select class="form_control select2" name="user_type_id">
						<?php foreach($user_types as $key => $val){ ?>
							<option value="<?php echo $val['user_type_id'];?>">
								<?php echo $val['user_type_name'];?>
							</option>
						<?php } ?>
					</select>
				</div>
				<div class="clearfix"></div>
			</div>
		</p>
		<p class="borderB">
				<div class="">
					<div class="col-xs-6">
						
					</div>
					<div class="col-xs-6">
						<input type="submit" class="butonX1 pull-right" value="EKLE" style="width:110px; text-align-center;"/>
					</div>
					<div class="clearfix"></div>
				</div>
					
			</p>
		</form>
      </div>
    </div>

  </div>
</div>

<div id="userModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <div class="user_info"></div>
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
<input type="hidden" class="auth" value="<?php echo $auth;?>" />
<input type="hidden" class="authNum" value="9" />
<?php include('includes/footer-order.php');?>
<script type="text/javascript" src="<?php echo ASSETS;?>js/summernote.js"></script>
<script type="text/javascript">

	$(".updUser").click(function(){
		var user_id = $(this).attr("rel");
		 $.ajax({
			type : 'get',
			url : '<?php echo GET_USER_INFO;?>'+user_id,
			success : function(response){
				$(".user_info").html(response);
				$('.select2').select2();
			}
		});
	});
	$(".svAd").click(function(){
		var formD = $("#adisyon").serialize();
		 $.ajax({
			type : 'post',
			data : formD,
			url : '<?php echo ADISYON_POST;?>',
			success : function(response){
				if(response == 'ok'){
					alert("Kayıt Başarılı!");
				}else{
					alert("Hata oluştu!");
				}
			}
		});
	});
	
	$(document).on("click",".unarchiveUser",function(){
		var user_id = $(this).attr("userid");
		 $.ajax({
			type : 'get',
			url : '<?php echo UNARCHIVE_USER;?>'+user_id,
			success : function(response){
				if(response == 'success'){
					location.reload();
				}
			}
		});
	});
	
	$(".auth_name2").click(function(){
		$(".auth_name2").removeClass("act");
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
	
	$(".cbox").click(function(){
		if($(this).is(':checked')){
			var checked = '1';
		}else{
			var checked = '0';
		}
		
		$.ajax({
			type : 'post',
			url : '<?php echo LOCK_SCREEN_POST;?>',
			data : {'lockScreen' : checked},
			success : function(response){
				console.log(response);
				if(response == "1"){
					$(".statusText").text('Açık');
				}else if(response == "0"){
					$(".statusText").text('Kapalı');
				}
			}
		});
		
		
	});
	$("#lTime").change(function(){
		
		var time = $(this).val();
		
		$.ajax({
			type : 'post',
			url : '<?php echo LOCK_TIME_POST;?>',
			data : {'lock_time' : time},
			success : function(response){
				//console.log(response);
				if(response == "success"){
					alert("Başarılı!");
				}else{
					alert("Hata oluştu!");
				}
			}
		});
		
		
	});
	
	
	$(document).on("click",".updBtn",function(){
		var formD = $("#userUpdForm").serialize();
		 $.ajax({
			type : 'post',
			data : formD,
			url : '<?php echo UPDATE_USER_POST;?>',
			success : function(response){
				if(response == 'success'){
					alert("Güncelleme Başarılı!");
					location.reload();
				}else{
					alert(response);
				}
			}
		});
	});
	$(".auth_name").click(function(){
		var rel = $(this).attr("rel");
		$(".auth_name").removeClass("act");
		$(this).addClass("act");
		$(".tab").hide();
		$(".tab_"+rel).fadeIn();
	});
</script>
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
		return 'Kurye';
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
					<span class="pageTitle">Ayarlar <i class="f18 fa fa-chevron-right"></i> Kullanıcı Yetkileri </span>
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
						<div class="">
							<div style="padding:15px;">
							<div class="row">
								<div class="col-sm-3">
								<div style="margin-bottom:10px;"><b>Kullanıcı Tipleri</b></div>
									<?php foreach($user_types as $key => $val){ ?>
										<div class="auth_name2" rel="<?php echo $val['user_type_id'];?>">
											<b><?php echo $val['user_type_name'];?></b>
										</div>
									<?php } ?>
								</div>
								<div class="col-sm-9">
								<div style="margin-bottom:10px;"><b>Yetki Türleri</b></div>
									<form id="authForm">
									<?php foreach($authentications as $key => $val){ ?>
										<?php if( $val['auth_id'] != 5 ){ ?>
											<div style="width:50%; float:left; background:#f7f7f7; padding:10px; line-height:1; margin-bottom:2px;">
												<div class="row">
													<div class="col-xs-3">
														<label class="switch">
														  <input type="checkbox" class="auth auth_<?php echo $val['auth_id'];?>" name="auth_id[]" value="<?php echo $val['auth_id'];?>" />
														  <span class="slider round"></span>
														</label>
													</div>
													<div class="col-xs-9">
														 <span style="display:inline-block;padding-top:10px;"><b><?php echo $val['auth_name'];?></b></span>
													</div>
												</div>
											</div>
										<?php } ?>
									<?php } ?>
									<input type="hidden" class="ut_id" name="ut_id" value="0" />
										<div style="background:#f7f7f7; width:50%; padding:12px; float:left;  line-height:1; margin-bottom:2px;">
											<a href="javascript:;" class="butonX1 pull-right saveAuth">KAYDET</a>
											<div class="clearfix"></div>
										</div>
									</form>
								</div>
							</div>
							</div> 
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
						<input type="submit" class="butonX1 addDepo pull-right" value="EKLE" style="width:110px; text-align-center;"/>
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
		/* $.ajax({
			type : 'get',
			url : '<?php echo GET_USER_AUTH_LIST;?>'+ut_id,
			success : function(response){
				authList = JSON.parse(response);
				for(var key in authList){
					aL = authList[key];
					$(".auth_"+aL.auth_id).attr("checked", "true");
				}
			}
		}); */
	});
	
	$(document).ready(function(){
		
		$('.summernote').summernote();
		
		$(".table").DataTable({
			language : {
				"sDecimal":        ",",
				"sEmptyTable":     "Tabloda herhangi bir veri mevcut değil",
				"sInfo":           "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
				"sInfoEmpty":      "Kayıt yok",
				"sInfoFiltered":   "(_MAX_ kayıt içerisinden bulunan)",
				"sInfoPostFix":    "",
				"sInfoThousands":  ".",
				"sLengthMenu":     "Sayfada _MENU_ kayıt göster",
				"sLoadingRecords": "Yükleniyor...",
				"sProcessing":     "İşleniyor...",
				"sSearch":         "Ara : ",
				"sZeroRecords":    "Eşleşen kayıt bulunamadı",
				"oPaginate": {
					"sFirst":    "İlk",
					"sLast":     "Son",
					"sNext":     "Sonraki",
					"sPrevious": "Önceki"
				},
				"oAria": {
					"sSortAscending":  ": artan sütun sıralamasını aktifleştir",
					"sSortDescending": ": azalan sütun sıralamasını aktifleştir"
				}
			}
		}); 
	});
</script>
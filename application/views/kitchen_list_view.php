<?php include('includes/header-order.php');?>
<style type="text/css">
	.backToHome{font-size:20px;display:inline-block; line-height:1;padding:15px 25px; background:#4972B7; color:#fff;}
	.cat_btn{padding:20px 10px;font-size:20px; margin-right:5px;}
	.companyDiv{background:#f7f7f7; border-bottom:1px solid #ddd; padding:10px; line-height:1;}
	.dataTables_filter{display:none !important;}
	.dataTables_length{margin:0 10px;}
	.dataTables_info{margin:0 10px;}
	.tglMx{display:none;}
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
						<span class="pageTitle">Mutfak Yönetimi</span>
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
				<input type="text" class="customSrc srcStyle srcTerm srcX" placeholder="Mutfak Ara..." />
			</div>
			<div class="col-sm-3">
				<a data-toggle="modal" data-target="#companyModal" href="javascript:;" class="butonX1 w100 text-center" style="width:100%;">
					<span class="">MUTFAK EKLE</span> 
				</a>
			</div>
		</div>
		
			<div class="whiteZone f13" style="padding-right:0; padding-left:0;">
				<table id="tab-data" class="table table-hover">
					<thead>
						<tr>
							<th>Mutfak Adı</th>
						</tr>
					</thead>
					<tbody>
				
						<?php foreach($kitchens as $key => $val){ ?>
							<tr class="link_tr" link="javascript:;" data-toggle="modal" data-target="#companyModal2"  kid="<?php echo $val['kitchen_id'];?>" kitchen_ip="<?php echo $val['kitchen_ip'];?>" kitchen_name="<?php echo $val['kitchen_name'];?>">
								<td><?php echo $val['kitchen_name'];?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>



<input type="hidden" class="isActive" value="0" />
<?php 
	$auth = '0';
	if(!empty($_SESSION['authList'])){ 
		foreach($_SESSION['authList'] as $key => $val){
			if($val['auth_id'] == '7'){
				$auth = '1';
			}
		}
	}

?>
<input type="hidden" class="auth" value="<?php echo $auth;?>" />
<input type="hidden" class="authNum" value="7" />


<div id="companyModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
	  
	  <div class="row">
			<form id="addDForm" action="" method="post">
				<p class="text-center borderB">
					<b>MUTFAK EKLE</b> <br /> <br />
				</p>
				<p >
				
					<div class="">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; MUTFAK İSMİ</span>
						</div>
						<div class="col-xs-8">
							<input type="text" name="kitchen_name"  class="form-control kitchen_name" placeholder="Mutfak Adı"/>
						</div>
						<div class="clearfix"></div>
					</div>
					
				
				</p>
				<p class="borderB">
				<div class="">
					<div class="col-xs-6">
						
					</div>
					<div class="col-xs-6">
						<input type="button" class="butonX1 addDepo pull-right" value="KAYDET" style="width:110px; text-align-center;"/>
					</div>
					<div class="clearfix"></div>
				</div>
					
				</p>
			</form>
		</div>
      </div>
    </div>

  </div>
</div>

<div id="companyModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-body">
	  <div class="row">
			<form id="depoForm" action="<?php echo UPDATE_KITCHEN_POST;?>" method="post">
				<p class="text-center borderB">
					<b>MUTFAK BİLGİSİ GÜNCELLE</b> <br /> <br />
				</p>
				<p>
				
					<div class="">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; MUTFAK İSMİ</span>
						</div>
						<div class="col-xs-8">
							<input type="text" name="kitchen_name" value="" class="form-control kitchen_name" placeholder=""/>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; MUTFAK IP ADRESİ</span>
						</div>
						<div class="col-xs-8">
							<input type="text" name="kitchen_ip" value="" class="form-control kitchen_ip" placeholder=""/>
						</div>
						<div class="clearfix"></div>
					</div>
					<input type="hidden" name="kitchen_id" class="kitchen_id" value="0" />
					
				
				</p>
				<p class="borderB">
				<div class="">
					<div class="col-xs-6">
						<a href="javascript:;" class="butonFile delKitchen" kid="" style="width:110px; text-align-center;"><i class="fa fa-trash"></i> SİL</a>
					</div>
					<div class="col-xs-6">
						<input type="submit" class="butonX1 pull-right" value="GÜNCELLE" style="width:110px; text-align-center;"/>
					</div>
					<div class="clearfix"></div>
				</div>
					
				</p>
			</form>
		</div>
	  </div>
	</div>
  </div>
</div>

<?php include('includes/footer-order.php');?>

<script type="text/javascript">
$(".addDepo").click(function(){
	var kitchen_name = $(".kitchen_name").val().trim();
	if(kitchen_name != ''){
		$(this).addClass("disabled");
		var dataF = $("#addDForm").serialize();
		$.ajax({
			type : 'post',
			data : dataF,
			url : '<?php echo ADD_KITCHEN_POST;?>',
			success : function(response){
				dataX = JSON.parse(response);
				if(dataX.msg == 'success'){
					swal("","Mutfak Eklenmiştir","success");
					location.reload();
				}else if(dataX.msg == 'same_name_error'){
					swal("","Aynı isimli Mutfak daha önce tanımlanmıştır!","error");
					
				}else{
					swal("","Hata oluştu!","error");
					//location.reload();
				}
				
			}
		});
	}else{
		alert("Mutfak ismi girilmesi zorunludur!");
	}
	
});

$(".link_tr").click(function(){
	var kid = $(this).attr("kid");
	var kitchen_name = $(this).attr("kitchen_name");
	var kitchen_ip = $(this).attr("kitchen_ip");
		$(".kitchen_id").val(kid);
		$(".kitchen_ip").val(kitchen_ip);
		$(".delKitchen").attr("kid",kid);
		$(".kitchen_name").val(kitchen_name);
});

$(".delKitchen").click(function(){
	var kid = $(this).attr("kid");
	$.ajax({
		type : 'get',
		url : '<?php echo DELETE_KITCHEN;?>'+kid,
		success : function(response){
			if(response == 'success'){
				swal("","Mutfak Silinmiştir!","success");
				location.reload();
			}
			if(response == 'exists'){
				swal("","Mutfak kategoriye bağlı olduğundan silinemez!","error");
			}
			
		}
	});
});

</script>
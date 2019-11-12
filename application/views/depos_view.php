<?php include('includes/header-order.php');?>
<style type="text/css">
	.backToHome{font-size:20px;display:inline-block; line-height:1;padding:15px 25px; background:#4972B7; color:#fff;}
	.cat_btn{padding:20px 10px;font-size:20px; margin-right:5px;}
	.companyDiv{background:#f7f7f7; border-bottom:1px solid #ddd; padding:10px; line-height:1;}
	.dataTables_filter{display:none !important;}
	.dataTables_length{margin:0 10px;}
	.dataTables_info{margin:0 10px;}
</style>

<div class="left1">
	<?php include('includes/left_menu.php');?>
</div> 

<div class="left2">
		<div class="top">
			<div >
				
			</div>
			<div>
				<div class="col-xs-12">
				<div class="row">
					<div class="col-sm-6">
						<span class="pageTitle">Depolar</span>
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
				<a data-toggle="modal" data-target="#companyModal" href="javascript:;" class="butonX1 w100 text-center" style="width:100%;">
					<span class="">DEPO EKLE</span> 
				</a>
			</div>
		</div>
		
			<div class="whiteZone f13" style="padding-right:0; padding-left:0;">
				<table id="tab-data" class="table table-hover">
					<thead>
						<tr>
							<th>Depo Adı</th>
						</tr>
					</thead>
					<tbody>
				
						<?php foreach($depos as $key => $val){ ?>
							<tr class="link_tr" link="<?php echo STOCK_DETAILS.$val['depo_id'];?>">
								<td><?php echo $val['depo_name'];?></td>
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
			<form id="addDForm" >
				<p class="text-center borderB">
					<b>DEPO EKLE</b> <br /> <br />
				</p>
				<p >
				
					<div class="">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; DEPO İSMİ</span>
						</div>
						<div class="col-xs-8">
							<input type="text" name="depo_name"  class="form-control depo_name" placeholder="Depo Adı"/>
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

<?php include('includes/footer-order.php');?>

<script type="text/javascript">
$(".addDepo").click(function(){
	var depo_name = $(".depo_name").val().trim();
	if(depo_name != ''){
		$(this).addClass("disabled");
		var dataF = $("#addDForm").serialize();
		$.ajax({
			type : 'post',
			data : dataF,
			url : '<?php echo ADD_DEPO_POST;?>',
			success : function(response){
				dataX = JSON.parse(response);
				if(dataX.msg == 'success'){
					swal("","Depo Eklenmiştir","success");
					location.reload();
				}else if(dataX.msg == 'same_name_error'){
					swal("","Aynı isimli depo daha önce tanımlanmıştır!","error");
					
				}else{
					swal("","Hata oluştu!","error");
					//location.reload();
				}
				
			}
		});
	}else{
		alert("Depo ismi girilmesi zorunludur!");
	}
	
});

</script>
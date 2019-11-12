<?php include('includes/header-order.php');?>

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
					<span class="pageTitle">Kasa İşlemleri</span>
				</div>
				<div class="col-sm-6">
					
				</div>
			</div>
				
			</div>
		</div>
	</div>
	
	
	<div class="mainContainer"style="padding:0 15px;">
	
		<div class="whiteZone f13" style="padding-right:0; padding-left:0;">
			<div class="alert alert-warning alertBox" style="display:none;"></div>
			<div class="row" style="margin:0;">
				<div class="col-sm-6 text-center">
						<a class="butonX1 btn btn-2 btn-2h newbtn dayStart" href="javascript:;" style="background:#5b5351">
							<span class="fa fa fa-sun-o fa-2x"></span> <br />
							<span class="xText f20" style="display:inline-block;margin-top:10px;"><b>GÜN BAŞI</b></span>
						</a>
				</div>
				<div class="col-sm-6 text-center">
						<a class="butonX1 btn btn-2 btn-2h newbtn" href="<?php echo OPEN_DAY_DETAIL_PAGE.$lastDay['day_id'];?>" style="background:#5b5351">
							<span class="fa fa fa-moon-o fa-2x"></span><br />
							<span class="xText f20"style="display:inline-block;margin-top:10px;"><b>GÜN SONU</b></span> 
							
						</a>
				</div>
				<!--<div class="col-sm-4">
						<a class="btnXX btn   btn-float" href="<?php echo CASH_PREVIEW;?>">
							<span class="xText">KASAYI GÖR</span> <br />
							<span class="fa fa fa-money fa-3x"></span>
						</a>
				</div>--> 
				<!--<div class="col-sm-4">
					<a class="btnXX btn   btn-float" data-toggle="modal" data-target="#payModal" href="javascript:;">
						<span class="xText">PARA ÇIKIŞI YAP</span> <br />
						<span class="fa fa fa-minus-circle fa-3x"></span>
					</a> 
				</div>-->
			</div><div class="clearfix"></div>
		</div>
	</div>
</div>

<div id="payModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<h4 class="modal-title">Para Çıkışı</h4>
		  </div>
		  <div class="modal-body">
			<form id="pForm">
				<p><input type="text" name="paymentAmount" class="form-control payment "  placeholder="0.00"/></p>
				<p><input type="text" name="desc" class="desc form-control"  placeholder="Açıklama Giriniz"/></p>
				<p><a class="sbmF btn btn-success form-control" href="javascript:;"/>Kaydet</a></p>
			</form>
		 </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
		  </div>
		</div>

	</div>
</div>

<input type="hidden" class="isActive" value="0" />
<?php 
	$auth = '0';
	if(!empty($_SESSION['authList'])){ 
		foreach($_SESSION['authList'] as $key => $val){
			if($val['auth_id'] == '8'){
				$auth = '1';
			}
		}
	}

?>
<input type="hidden" class="auth" value="<?php echo $auth;?>" />
<input type="hidden" class="authNum" value="8" /> 
<?php include('includes/footer-order.php');?>
<script type="text/javascript">

	/* $(".dayEnd").click(function(){
		$.ajax({
			type : 'get',
			url : '<?php echo DAY_END;?>',
			success : function(response){
				console.log(response);
				dataX = JSON.parse(response);
				if(dataX.status == 'success'){
					var link = dataX.link;
					window.location.href = link;
				}else{
					swal(
					  dataX.title,
					  '<div>'+dataX.msg+'</div>',
					  dataX.status
					);
					
				}
				
			}
		})
	}); */
	$(".dayStart").click(function(){
		$.ajax({
			type : 'get',
			url : '<?php echo DAY_START;?>',
			success : function(response){
				if(response == 'success')
				swal(
				  'Başarılı!',
				  '<div>Gün Başı yapılmıştır!</div>',
				  'success'
				);
				else
				swal(
				  '',
				  '<div>'+response+'</div>',
				  'error'
				);
				
			}
		})
	});

	$(".sbmF").click(function(){
		var amount = $(".payment").val();
		var amount = amount.replace(",", ".");
		var amount = parseFloat(amount).toFixed(2);
		//alert(amount);
		var desc = $(".desc").val();
		var dataF = $("#pForm").serialize();
		
		if( (amount != '') && (desc != '') ){
			if(amount > 0){
				
				$.ajax({
					
					type : 'post',
					url : '<?php echo MAKE_PAYMENT_POST;?>',
					data : dataF,
					success : function(response){
						if(response == 'success'){
							alert("İşlem Başarılı!");
							location.reload();
						}else{
							alert("Hata oluştu!");
						}
					}
					
				});
				
			}else{
				alert("LÜTFEN TUTAR BİLGİSİNİ DOĞRU FORMATTA GİRİNİZ!");
			}
		}else{
			alert("LÜTFEN GEREKLİ ALANLARI DOLDURUNUZ!");
		}
		
		
		
		
		
	});
</script>
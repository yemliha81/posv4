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
					<span class="pageTitle">Şube Güncelleme</span>
				</div>
				<div class="col-sm-6">
					
				</div>
			</div>
				
			</div>
		</div>
	</div>
	
	
	<div class="mainContainer"style="padding:0 15px;">
	
		<div class="whiteZone f13" style="">
			<div>
				<form id="updForm">
					
					<div class="row pB15 mB15 borderB">
						<div class="col-sm-3">
							<span class="inputTitle">ŞUBE ADI</span>
						</div>
						<div class="col-sm-9">
							<input type="text" name="br_name" class="form-control" placeholder="İş Yeri Adı" value="<?php echo $branch['br_name'];?>"/>
						</div>
					</div>
					<div class="row pB15 mB15 borderB">
						<div class="col-sm-3">
							<span class="inputTitle">TELEFON</span>
						</div>
						<div class="col-sm-9">
							<input type="text" name="br_phone" class="form-control" placeholder="Telefon" value="<?php echo $branch['br_phone'];?>"/>
						</div>
					</div>
					<div class="row pB15 mB15 borderB">
						<div class="col-sm-3">
							<span class="inputTitle">TELEFON 2</span>
						</div>
						<div class="col-sm-9">
							<input type="text" name="br_phone2" class="form-control" placeholder="Telefon" value="<?php echo $branch['br_phone2'];?>"/>
						</div>
					</div>
					<div class="row pB15 mB15 borderB">
						<div class="col-sm-3">
							<span class="inputTitle">WHATSAPP TELEFONU</span>
						</div>
						<div class="col-sm-9">
							<input type="text" name="br_whatsapp" class="form-control" placeholder="Whatsapp" value="<?php echo $branch['br_whatsapp'];?>"/>
						</div>
					</div>
					<div class="row pB15 mB15 borderB">
						<div class="col-sm-3">
							<span class="inputTitle">İL</span>
						</div>
						<div class="col-sm-9">
							<input type="text" name="br_city" class="form-control" placeholder="İl" value="<?php echo $branch['br_city'];?>"/>
						</div>
					</div>
					<div class="row pB15 mB15 borderB">
						<div class="col-sm-3">
							<span class="inputTitle">İLÇE</span>
						</div>
						<div class="col-sm-9">
							<input type="text" name="br_town" class="form-control" placeholder="İlçe" value="<?php echo $branch['br_town'];?>"/>
						</div>
					</div>
					<div class="row pB15 mB15 borderB">
						<div class="col-sm-3">
							<span class="inputTitle">ADRES</span>
						</div>
						<div class="col-sm-9">
							<input type="text" name="br_address" class="form-control" placeholder="Adres" value="<?php echo $branch['br_address'];?>"/>
						</div>
					</div>
					<div class="row pB15 mB15 borderB">
						<div class="col-sm-3">
							<span class="inputTitle">ENLEM</span>
						</div>
						<div class="col-sm-9">
							<input type="text" name="br_latitude" class="form-control" placeholder="" value="<?php echo $branch['br_latitude'];?>"/>
						</div>
					</div>
					<div class="row pB15 mB15 borderB">
						<div class="col-sm-3">
							<span class="inputTitle">BOYLAM</span>
						</div>
						<div class="col-sm-9">
							<input type="text" name="br_longitude" class="form-control" placeholder="" value="<?php echo $branch['br_longitude'];?>"/>
						</div>
					</div>
					<div class="row pB15 mB15 borderB">
						<div class="col-sm-3">
							<span class="inputTitle">E-MAIL</span>
						</div>
						<div class="col-sm-9">
							<input type="text" name="br_email" class="form-control" placeholder="E-mail" value="<?php echo $branch['br_email'];?>"/>
						</div>
					</div>
					<div class="row pB15 mB15 borderB">
						<div class="col-sm-3">
							<span class="inputTitle">ŞIFRE</span>
						</div>
						<div class="col-sm-9">
							<input type="text" name="br_pass" class="form-control" placeholder="Şifre" value="<?php echo $branch['br_pass'];?>"/>
						</div>
					</div>
					<div class="row pB15 mB15 borderB hidden">
						<div class="col-sm-3">
							<span class="inputTitle">AÇILIŞ SAATİ</span>
						</div>
						<div class="col-sm-9">
							<select name="br_openinghour" class="form-control select2">
								<option value="">Seçiniz</option>
								<option value="05:00" <?php if($branch['br_openinghour'] == '05:00'){ echo 'selected'; };?> >05:00</option>
								<option value="06:00" <?php if($branch['br_openinghour'] == '06:00'){ echo 'selected'; };?> >06:00</option>
								<option value="07:00" <?php if($branch['br_openinghour'] == '07:00'){ echo 'selected'; };?> >07:00</option>
								<option value="08:00" <?php if($branch['br_openinghour'] == '08:00'){ echo 'selected'; };?> >08:00</option>
								<option value="09:00" <?php if($branch['br_openinghour'] == '09:00'){ echo 'selected'; };?> >09:00</option>
								<option value="10:00" <?php if($branch['br_openinghour'] == '10:00'){ echo 'selected'; };?> >10:00</option>
								<option value="11:00" <?php if($branch['br_openinghour'] == '11:00'){ echo 'selected'; };?> >11:00</option>
								<option value="12:00" <?php if($branch['br_openinghour'] == '12:00'){ echo 'selected'; };?> >12:00</option>
							</select>
						</div>
					</div>
					<div class="row pB15 mB15 borderB hidden">
						<div class="col-sm-3">
							<span class="inputTitle">KAPANIŞ SAATİ</span>
						</div>
						<div class="col-sm-9">
							<select name="br_closehour" class="form-control select2">
								<option value="">Seçiniz</option>
								<option value="17:00" <?php if($branch['br_closehour'] == '17:00'){ echo 'selected'; };?> >17:00</option>
								<option value="18:00" <?php if($branch['br_closehour'] == '18:00'){ echo 'selected'; };?> >18:00</option>
								<option value="19:00" <?php if($branch['br_closehour'] == '19:00'){ echo 'selected'; };?> >19:00</option>
								<option value="20:00" <?php if($branch['br_closehour'] == '20:00'){ echo 'selected'; };?> >20:00</option>
								<option value="21:00" <?php if($branch['br_closehour'] == '21:00'){ echo 'selected'; };?> >21:00</option>
								<option value="22:00" <?php if($branch['br_closehour'] == '22:00'){ echo 'selected'; };?> >22:00</option>
								<option value="23:00" <?php if($branch['br_closehour'] == '23:00'){ echo 'selected'; };?> >23:00</option>
								<option value="00:00" <?php if($branch['br_closehour'] == '00:00'){ echo 'selected'; };?> >00:00</option>
								<option value="01:00" <?php if($branch['br_closehour'] == '01:00'){ echo 'selected'; };?> >01:00</option>
								<option value="02:00" <?php if($branch['br_closehour'] == '02:00'){ echo 'selected'; };?> >02:00</option>
							</select>
						</div>
					</div>
					<div class="row pB15 mB15 borderB">
						<div class="col-sm-3">
							<span class="inputTitle">ONLINE SİPARİŞ</span>
						</div>
						<div class="col-sm-9">
							<label class="switch">
							  <input class="pmx" type="checkbox" name="open" <?php if($branch['open'] == '1'){ echo 'checked'; }?> >
							  <span class="slider round"></span>
							</label>
						</div>
					</div>
					<div class="row pB15 mB15 borderB">
						<div class="col-sm-3">
							
						</div>
						<div class="col-sm-9">
							<input type="hidden" name="branch_id" value="<?php echo $branch['branch_id'];?>" />
							<input type="button" class="butonX1 pull-right updBranch" value="KAYDET"/>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
			
<?php include('includes/footer-order.php');?>
<script type="text/javascript">
	$(".updBranch").click(function(){
		var fd = $("#updForm").serialize();
		$.ajax({
			type : "post",
			url : "<?php echo UPDATE_BRANCH_POST;?>",
			data : fd,
			success : function(response){
				if(response == "success"){
					swal("","Güncelleme Başarılı!","success");
				}else{
					swal("","Herhangi bir güncelleme yapmadınız!","error");
				}
			}
		});
	});
</script>
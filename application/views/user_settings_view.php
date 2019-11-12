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
	.subp{display:inline-block; padding:10px;}
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
					<span class="pageTitle">Ayarlar <i class="f18 fa fa-chevron-right"></i> Genel Ayarlar</span>
				</div>
				<div class="col-sm-6">
					
				</div>
			</div>
				
			</div>
		</div>
	</div>
	
	
	<div class="mainContainer"style="padding:0 15px;">
	
		<div class="f13" style="">
			<div class="row">
				<div class="col-sm-6">
					
					<div class="whiteZone" style="margin-bottom:15px;">
						<div style="text-align:center; margin-bottom:15px; font-weight:bold;" class="f20">
							ÖDEME YÖNTEMLERİ
						</div>
						<form id="form123123" action="<?php echo PAYMENT_TYPE_POST;?>" method="post">
							<?php foreach($payment_types as $key => $val){ ?>
								<div class="row">
									<div class="col-xs-2">
										<label class="switch">
										  <input class="pmx" type="checkbox" name="<?php echo $val['payment_code'];?>" <?php if($settings[$val['payment_code']] == '1'){ echo 'checked';} ?>>
										  <span class="slider round"></span>
										</label>
									</div>
									<div class="col-xs-4" style="padding-top:7px;"><b><?php echo $val['payment_name'];?></b></div>
									<div class="col-xs-6">
										
									</div>
								</div>
							<?php } ?>
						</form>
					</div>
					<div class="whiteZone" style="margin-bottom:15px;">
						<div style="text-align:center; margin-bottom:15px; font-weight:bold;" class="f20">
							ALT ÖDEME YÖNTEMLERİ
						</div>
						<div class="row">
							<?php foreach( $payment_types2 as $key => $val ){ ?>
								<div class="col-xs-6">
									<div><b><?php echo $val['payment_name'];?></b></div>
									<div>
										<?php foreach($val['sub_payments'] as $kk => $vv){ ?>
											<div> 
												<label class="switch" style="vertical-align:middle;">
												  <input class="spmx" spid="<?php echo $vv['payment_sub_id'];?>" type="checkbox" name="spmx" <?php if($vv['status'] == '1'){ echo 'checked';} ?> >
												  <span class="slider round"></span>
												</label>
												<a style="color:#000; font-weight:bold;" href="javascript:;" data-target="#spModal" data-toggle="modal" class="subp" spid="<?php echo $vv['payment_sub_id'];?>" spname="<?php echo $vv['payment_subname'];?>" ><?php echo $vv['payment_subname'];?></a>
											</div>
										<?php } ?>
									</div>
								</div>
							<?php } ?>
							<div class="col-xs-12">
								<a href="#" class="butonX1 pull-right" data-target="#addspModal" data-toggle="modal" />ALT ÖDEME EKLE</a>
							</div>
						</div>
							
						
					</div>
					
					<div class="whiteZone" style="margin-bottom:15px;">
						<div style="text-align:center; margin-bottom:15px; font-weight:bold;" class="f20">
							YAZICILAR
						</div>
						<?php if($_SESSION['demo'] !== '1'){ ?>
							<div class="">
								<?php foreach( $printers as $key => $val ){ ?>
									<div class="row updp" prid="<?php echo $val['id'];?>" prtype="<?php echo $val['printer_type'];?>" prname="<?php echo $val['printer_name'];?>" prip="<?php echo $val['printer_ip'];?>" style="padding:8px; cursor:pointer;" data-target="#updatePrinterModal" data-toggle="modal">
										<div class="col-xs-6">
											<div><b><?php echo $val['printer_name'];?></b></div>
										</div>
										<div class="col-xs-6">
											<div><b><?php echo $val['printer_ip'];?></b></div>
										</div>
									</div>
								<?php } ?>
								<div class="clearfix"></div>
								<div class="col-xs-12">
									<a href="#" class="butonX1 pull-right" data-target="#addPrinterModal" data-toggle="modal" />YAZICI EKLE</a>
								</div>
								<div class="clearfix"></div>
							</div>
						<?php } ?>
						<?php if($_SESSION['demo'] == '1'){ ?>
							<div class="text-center" style="padding:20px; background:#ddd; font-weight:bold;">
								Yazıcı ekleme özelliği Demo hesaplarda kullanılamaz!
							</div>
						<?php } ?>
					</div>
					
					<div class="whiteZone" style="margin-bottom:15px;">
						<form action="<?php echo ADISYON_GROUP_POST;?>" method="post">
							<div style="text-align:center; margin-bottom:15px; font-weight:bold;" class="f20">
								ADİSYON ÜRÜN GRUPLAMA
							</div>
							<div class="row">
								<div class="col-sm-3" style="padding-top:7px;">
									<label for=""><b>Aktif / Pasif</b></label>
								</div>
								<div class="col-xs-9">
									<label class="switch">
									  <input class="adsgrp" type="checkbox" name="adisyon_group" <?php if($settings['adisyon_group'] == '1'){ echo 'checked';} ?>>
									  <span class="slider round"></span>
									</label>
								</div>
							</div>
							<div><input type="submit" class="butonX1 pull-right" value="KAYDET" autocomplete="off">
								<div class="clearfix"></div>
							</div>
						</form>
					</div>
					
					<div class="whiteZone" style="margin-bottom:15px;">
						<form action="<?php echo FIX_MENU_POST;?>" method="post">
							<div style="text-align:center; margin-bottom:15px; font-weight:bold;" class="f20">
								FİX MENÜ
							</div>
							<div class="row">
								<div class="col-sm-3" style="padding-top:7px;">
									<label for=""><b>Aktif / Pasif</b></label>
								</div>
								<div class="col-xs-9">
									<label class="switch">
									  <input class="fixM" type="checkbox" name="fix_menu" <?php if($settings['fix_menu'] == '1'){ echo 'checked';} ?>>
									  <span class="slider round"></span>
									</label>
								</div>
							</div>
							<div><input type="submit" class="butonX1 pull-right" value="KAYDET" autocomplete="off">
								<div class="clearfix"></div>
							</div>
						</form>
					</div>
					
					<div class="whiteZone" style="margin-bottom:15px;">
						<form action="<?php echo WAIT_PRODUCT_POST;?>" method="post">
							<div style="text-align:center; margin-bottom:15px; font-weight:bold;" class="f20">
								ÜRÜN BEKLETME
							</div>
							<div class="row">
								<div class="col-sm-3" style="padding-top:7px;">
									<label for=""><b>Aktif / Pasif</b></label>
								</div>
								<div class="col-xs-9">
									<label class="switch">
									  <input class="waitP" type="checkbox" name="wait_product" <?php if($settings['wait_product'] == '1'){ echo 'checked';} ?>>
									  <span class="slider round"></span>
									</label>
								</div>
							</div>
							<div><input type="submit" class="butonX1 pull-right" value="KAYDET" autocomplete="off">
								<div class="clearfix"></div>
							</div>
						</form>
					</div>
					
					<!--<div class="whiteZone" style="margin-bottom:15px;">
						<div style="text-align:center; margin-bottom:15px; font-weight:bold;" class="f20">
							EKRAN KİLİDİ
						</div>
						<div class="">
							<form action="<?php echo KITCHEN_TIME_POST;?>" method="post">
								<?php if($settings['lockScreen'] == '1'){ 
									$checked = 'checked'; 
									$status = 'Açık'; 
								 }else{ 
									$checked = ''; 
									$status = 'Kapalı'; 
								 }?>
								<div class="row">
									<div class="col-xs-2">
										<label class="switch">
										  <input type="checkbox" class="cbox" name="lockScreen" <?php echo $checked;?> />
										  <span class="slider round"></span>
										</label>
									</div>
									<div class="col-xs-4" style="padding-top:7px;"><b>Ekran Kilidi ( <span class="statusText"><?php echo $status;?> </span> )</b></div>
									<div class="col-xs-3">
										<select name="lock_time" id="lTime" class="select2">
											<option value="0">Seçiniz</option>
											<option value="15">15 sn</option>
											<option value="30">30 sn</option>
											<option value="60">1 dk</option>
											<option value="120">2 dk</option>
											<option value="180">3 dk</option>
											<option value="300">5 dk</option>
											<option value="600">10 dk</option>
											<option value="900">15 dk</option>
											<option value="1200">20 dk</option>
											<option value="1800">30 dk</option>
										</select>
									</div>
									<div class="col-xs-3" style="padding-top:7px;"><b>Kapanma Süresi</b></div>
								</div>
							</form>
						</div>
					</div>
					
					
					
					<div class="whiteZone" style="margin-bottom:15px;">
						<div style="text-align:center; margin-bottom:15px; font-weight:bold;" class="f20">
							MUTFAK AYARLARI
						</div>
						<form action="<?php echo KITCHEN_TIME_POST;?>" method="post">
							<table class="xtable" style="width:100%">
								<tr>
									<td><b>Masa Kapanma Süresi giriniz (dk)</b></td>
									<td><input type="number" class="form-control" name="kitchen_time" value="<?php if(!empty($kitchen_time)){
										echo $kitchen_time;
									} ?>" required /></td>
									<td style="padding-right:0 !important;">
										<input type="submit" class="butonX1 pull-right" value="KAYDET" />
									</td>
								</tr>
							</table>
						</form>
					</div>-->
					
					
					<div style="margin-bottom:10px;"><b>&nbsp;</b></div>
				</div>
				<div class="col-sm-6">
					
					<div class="whiteZone" style="margin-bottom:15px;">
						<div style="text-align:center; margin-bottom:15px; font-weight:bold;" class="f20">
							HİZMET BEDELİ AYARLARI
						</div>
						<form id="kuverForm" method="post" action="<?php echo KUVER_SETTINGS_POST;?>">
							<div class="row">
								<div class="col-sm-3" style="padding-top:7px;">
									<label for=""><b>Aktif / Pasif</b></label>
								</div>
								<div class="col-xs-9">
									<label class="switch">
									  <input class="kvx" type="checkbox" name="kuver_status" <?php if($settings['kuver_status'] == '1'){ echo 'checked';} ?>>
									  <span class="slider round"></span>
									</label>
								</div>
							</div>
							<div class="row" style="margin-bottom:10px;">
								<div class="col-sm-3" style="padding-top:7px;">
									<label for=""><b>Hizmet Adı</b></label>
								</div>
								<div class="col-xs-9">
									<input type="text" class="form-control" name="kuver_name" value="<?php echo $settings['kuver_name'];?>" />
								</div>
							</div>
							<div class="row" style="margin-bottom:10px;">
								<div class="col-sm-3" style="padding-top:7px;">
									<label for=""><b>Hizmet Fiyatı</b></label>
								</div>
								<div class="col-xs-9">
									<input type="text" class="form-control" name="kuver_price"  value="<?php echo $settings['kuver_price'];?>" />
								</div>
							</div>
							<div><input type="submit" class="butonX1 pull-right" value="KAYDET" />
								<div class="clearfix"></div>
							</div>
						</form>
					</div>
					
					<div class="whiteZone" style="margin-bottom:15px;">
						<div style="text-align:center; margin-bottom:15px; font-weight:bold;" class="f20">
							GARSONİYE AYARLARI
						</div>
						<form id="kuverForm" method="post" action="<?php echo GARSONIYE_SETTINGS_POST;?>">
							<div class="row">
								<div class="col-sm-3" style="padding-top:7px;">
									<label for=""><b>Aktif / Pasif</b></label>
								</div>
								<div class="col-xs-9">
									<label class="switch">
									  <input class="kvx" type="checkbox" name="extra_status" <?php if($settings['extra_status'] == '1'){ echo 'checked';} ?>>
									  <span class="slider round"></span>
									</label>
								</div>
							</div>
							<div class="row" style="margin-bottom:10px;">
								<div class="col-sm-3" style="padding-top:7px;">
									<label for=""><b>Garsoniye Adı</b></label>
								</div>
								<div class="col-xs-9">
									<input type="text" class="form-control" name="extra_name" value="<?php echo $settings['extra_name'];?>" />
								</div>
							</div>
							<div class="row" style="margin-bottom:10px;">
								<div class="col-sm-3" style="padding-top:7px;">
									<label for=""><b>Garsoniye Yüzdesi</b></label>
								</div>
								<div class="col-xs-9">
									<input type="text" class="form-control" name="extra_percent"  value="<?php echo $settings['extra_percent'];?>" />
								</div>
							</div>
							<div><input type="submit" class="butonX1 pull-right" value="KAYDET" />
								<div class="clearfix"></div>
							</div>
						</form>
					</div>
					
					<div class="whiteZone">
						<div style="text-align:center; margin-bottom:15px; font-weight:bold;" class="f20">
							ADİSYON AYARLARI
						</div>
						<form id="adisyon" >
							<div class="row">
								<div class="col-sm-12">
								<label for=""><b>Adisyon Üst Bilgi</b></label>
									<textarea name="adisyon_header" id="txt1" class="form-control summernote" rows="5"><?php echo $settings['adisyon_header'];?></textarea>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
								<label for=""><b>Adisyon Alt Bilgi</b></label>
									<textarea name="adisyon_footer"  id="txt2" class="form-control summernote" rows="5"><?php echo $settings['adisyon_footer'];?></textarea>
								</div>
							</div>
							<div><a href="javascript:;" class="butonX1 pull-right svAd">KAYDET</a>
								<div class="clearfix"></div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="spModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
	  
	  <div class="row">
			
				<p class="text-center ">
					<b>ÖDEME TİPİ DÜZENLE</b> <br /> 
					<div class="clearfix"></div>
				</p>
				<div class="clearfix"></div>
				<p>
					<div class="">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; ÖDEME TİPİ İSMİ</span>
						</div>
						<div class="col-xs-8">
							<input type="hidden" name="sp_id" class="sp_id" value=""/>
							<input type="text" name="sp_name" class="form-control sp_name" value=""/>
						</div>
						<div class="clearfix"></div>
					</div>
				</p>
				<p class="borderB">
					<div class="">
						<div class="col-xs-6">
							<a href="javascript:;" class="butonFile delSp" style="width:110px; text-align-center;"><i class="fa fa-trash"></i> SİL</a>
						</div>
						<div class="col-xs-6">
							<input type="button" class="butonX1 updSp pull-right" value="GÜNCELLE" style="width:110px; text-align-center;"/>
						</div>
						<div class="clearfix"></div>
					</div>
				</p>
			
		</div>
      </div>
    </div>

  </div>
</div>

<div id="updatePrinterModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
	  
	  <div class="row">
			
				<p class="text-center ">
					<b>YAZICI DÜZENLE</b> <br /> 
					<div class="clearfix"></div>
				</p>
				<div class="clearfix"></div>
				<p>
					<div class="">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; YAZICI ADI</span>
						</div>
						<div class="col-xs-8">
							<input type="hidden" name="pr_id" class="pr_id" value=""/>
							<input type="text" name="printer_name" class="form-control printer_name" value=""/>
						</div>
						<div class="clearfix"></div>
					</div>
				</p>
				<p>
					<div class="">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; IP ADRESİ</span>
						</div>
						<div class="col-xs-8">
							<input type="text" name="pr_ip" class="form-control pr_ip" value=""/>
						</div>
						<div class="clearfix"></div>
					</div>
				</p>
				<p>
					<div class="">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; YAZICI TİPİ</span>
						</div>
						<div class="col-xs-8">
							<select name="printer_type" class="form-control printer_type">
								<option value="">Seçiniz</option>
								<option value="network">Network</option>
								<option value="usb">USB</option>
							</select>
						</div>
						<div class="clearfix"></div>
					</div>
				</p>
				
				<p class="borderB">
					<div class="">
						<div class="col-xs-6">
							<a href="javascript:;" class="butonFile delPrinter" style="width:110px; text-align-center;"><i class="fa fa-trash"></i> SİL</a>
						</div>
						<div class="col-xs-6">
							<input type="button" class="butonX1 updPrinter pull-right" value="GÜNCELLE" style="width:110px; text-align-center;"/>
						</div>
						<div class="clearfix"></div>
					</div>
				</p>
			
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

<div id="addspModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
	  
	  <div class="row">
			<form id="addspForm" action="<?php echo ADD_SUBPAYMENT_POST;?>" method="post">
				<p class="text-center borderB">
					<b>ALT ÖDEME YÖNTEMİ EKLE</b> <br /> <br />
				</p>
				<p >
				
					<div class="">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; ÖDEME YÖNTEMİ</span>
						</div>
						<div class="col-xs-8">
							<select name="payment_id" class="form-control select2" required>
								<option value="">Ödeme Yöntemi Seçiniz</option>
								<?php foreach($payment_types2 as $key => $val){ ?>
									<option value="<?php echo $val['payment_id'];?>">
										<?php echo $val['payment_name'];?>
									</option>
								<?php } ?>
							</select>
						</div>
						<div class="clearfix"></div>
					</div>
					
				
				</p>
				<p >
				
					<div class="">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; ALT ÖDEME YÖNTEMİ</span>
						</div>
						<div class="col-xs-8">
							<input type="text" name="payment_subname" class="form-control" placeholder="Ödeme Yöntemi Adı"/>
						</div>
						<div class="clearfix"></div>
					</div>
					
				
				</p>
				<p class="borderB">
				<div class="">
					<div class="col-xs-6">
						
					</div>
					<div class="col-xs-6">
						<input type="button" class="butonX1 addSubp pull-right" value="KAYDET" style="width:110px; text-align-center;"/>
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

<div id="addPrinterModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
	  
	  <div class="row">
			<form id="addprForm" action="<?php echo ADD_PRINTER_POST;?>" method="post">
				<p class="text-center borderB">
					<b>YAZICI EKLE</b> <br /> <br />
				</p>

				<p >
				
					<div class="">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; YAZICI ADI</span>
						</div>
						<div class="col-xs-8">
							<input type="text" name="printer_name" class="form-control" placeholder="Yazıcı Adı"/>
						</div>
						<div class="clearfix"></div>
					</div>
					
				
				</p>
				<p >
				
					<div class="">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; YAZICI IP ADRESİ</span>
						</div>
						<div class="col-xs-8">
							<input type="text" name="printer_ip" class="form-control" placeholder="Yazıcı IP Adresi"/>
						</div>
						<div class="clearfix"></div>
					</div>
					
				
				</p>
				<p >
				
					<div class="">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; YAZICI TİPİ</span>
						</div>
						<div class="col-xs-8">
							<select name="printer_type" class="form-control">
								<option value="network">Network</option>
								<option value="usb">USB</option>
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
						<input type="button" class="butonX1 addpr pull-right" value="KAYDET" style="width:110px; text-align-center;"/>
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



<input type="hidden" class="auth" value="<?php echo $auth;?>" />
<input type="hidden" class="authNum" value="9" />
<?php include('includes/footer-order.php');?>
<script type="text/javascript" src="<?php echo ASSETS;?>js/summernote.js"></script>
<script type="text/javascript">

	$(".subp").click(function(){
		var spid = $(this).attr("spid");
		var spname = $(this).attr("spname");
		var status = $(this).attr("status");
		$(".sp_id").val(spid);
		$(".sp_name").val(spname);
		if(status == 'true'){
			$(".sp_status").attr("checked", "true");
		}else{
			$(".sp_status").removeAttr("checked");
		}
		
	});
	$(".updp").click(function(){
		var prid = $(this).attr("prid");
		var prname = $(this).attr("prname");
		var prip = $(this).attr("prip");
		var prtype = $(this).attr("prtype");
		$(".pr_id").val(prid);
		$(".printer_name").val(prname);
		$(".pr_ip").val(prip);
		$(".printer_type").val(prtype);
		
		
	});
	
	
	
	$(".addSubp").click(function(){
		var formD = $("#addspForm").serialize();
		var Posturl = $("#addspForm").attr("action");
		 $.ajax({
			type : 'post',
			url : Posturl,
			data : formD,
			success : function(response){
				if(response == "success"){
					swal(
						'Başarılı!',
						'Ödeme yöntemi eklendi!',
						'success'
					);
					setTimeout(function(){
						location.reload();
					},1000);
					
				}else{
					swal(
						'Oops!',
						'Ekleme işlemi sırasında hata oluştu!',
						'error'
					);
				}
			}
		});
	});
	
	$(".addpr").click(function(){
		var formD = $("#addprForm").serialize();
		var Posturl = $("#addprForm").attr("action");
		 $.ajax({
			type : 'post',
			url : Posturl,
			data : formD,
			success : function(response){
				if(response == "success"){
					swal(
						'Başarılı!',
						'Yazıcı eklendi!',
						'success'
					);
					setTimeout(function(){
						location.reload();
					},1000);
					
				}else{
					swal(
						'Oops!',
						'Ekleme işlemi sırasında hata oluştu!',
						'error'
					);
				}
			}
		});
	});
	
	
	
	$(".updSp").click(function(){
		var spid = $(".sp_id").val();
		var spname = $(".sp_name").val().trim();
		var sp_status = $(".sp_status").val();
		if(spname != "")
			$.ajax({
				type : 'post',
				url : '<?php echo UPDATE_SUBPAYMENT_POST;?>',
				data : {"sp_id" : spid, "sp_name" : spname, "status" : sp_status},
				success : function(response){
					if(response == "success"){
						swal(
							'Başarılı!',
							'Güncelleme işlemi başarılı.!',
							'success'
						);
						setTimeout(function(){
							location.reload();
						},1000);
						
					}
					else{
						swal(
							'Oops!',
							'Güncelleme işlemi sırasında hata oluştu!',
							'error'
						);
					}
				}
			});
		else
			swal(
				'Oops!',
				'Güncelleme işlemi sırasında hata oluştu!',
				'error'
			);
	});
	
	$(".updPrinter").click(function(){
		var prid = $(".pr_id").val();
		var prname = $(".printer_name").val().trim();
		var pr_ip = $(".pr_ip").val();
		var printer_type = $(".printer_type").val();
		if(prname != "")
			$.ajax({
				type : 'post',
				url : '<?php echo UPDATE_PRINTER_POST;?>',
				data : {"prid" : prid, "prname" : prname, "pr_ip" : pr_ip, "printer_type" : printer_type},
				success : function(response){
					if(response == "success"){
						swal(
							'Başarılı!',
							'Güncelleme işlemi başarılı.!',
							'success'
						);
						setTimeout(function(){
							location.reload();
						},1000);
						
					}
					else{
						swal(
							'Oops!',
							'Güncelleme işlemi sırasında hata oluştu!',
							'error'
						);
					}
				}
			});
		else
			swal(
				'Oops!',
				'Güncelleme işlemi sırasında hata oluştu!',
				'error'
			);
	});
	
	$(".delSp").click(function(){
		var sp_id = $(".sp_id").val();
		
		$.ajax({
			type : "post",
			data : {"spid" : sp_id},
			url : "<?php echo CHECK_SP;?>",
			success : function(response){
				if(response == 'error'){
					swal("","Bu Ödeme Yöntemi ile kayıtlar bulunduğundan silinemez. İsterseniz Pasif duruma alabilirsiniz.","error");
				}else{
					swal({
					  title: 'Emin misiniz?',
					  text: "Ödeme Yöntemini silmek üzeresiniz!",
					  type: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#5b5351',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'EVET!',
					  cancelButtonText: 'VAZGEÇ'
					}).then(function (result) {
					  if (result.value) {
						// handle confirm 
						$.ajax({
							type : 'get',
							url : '<?php echo DELETE_SUBPAYMENT;?>'+sp_id,
							success : function(response){
								if(response == "success"){
									swal(
										'Başarılı!',
										'Silme işlemi başarılı.!',
										'success'
									);
									setTimeout(function(){
										location.reload();
									},1000);
									
								}
								else{
									swal(
										'Oops!',
										'Silme işlemi sırasında hata oluştu!',
										'error'
									);
								}
							}
						});
					  } else {
						// handle cancel
					  }
					});
				}
			}
		});

	});

	$(".delPrinter").click(function(){
		var pr_id = $(".pr_id").val();
		
		
					swal({
					  title: 'Emin misiniz?',
					  text: "Yazıcıyı silmek üzeresiniz!",
					  type: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#5b5351',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'EVET!',
					  cancelButtonText: 'VAZGEÇ'
					}).then(function (result) {
					  if (result.value) {
						// handle confirm 
						$.ajax({
							type : 'get',
							url : '<?php echo DELETE_PRINTER;?>'+pr_id,
							success : function(response){
								if(response == "success"){
									swal(
										'Başarılı!',
										'Silme işlemi başarılı.!',
										'success'
									);
									setTimeout(function(){
										location.reload();
									},1000);
									
								}
								else{
									swal(
										'Oops!',
										'Silme işlemi sırasında hata oluştu!',
										'error'
									);
								}
							}
						});
					  } else {
						// handle cancel
					  }
					});
				

	});

	
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
	$(".pmx").change(function(){
		$("#form123123").submit();
	});
	$(".spmx").change(function(){
		var spid = $(this).attr("spid");
		$.ajax({
			type : "post",
			url : "<?php echo CHANGE_SUB_P_STATUS;?>",
			data : { "spid" : spid },
			success : function(response){
				if(response == "success"){
					swal("","Güncelleme Başarılı!","success");
				}
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
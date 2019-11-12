<?php include('includes/header-order.php');?>
<?php if($details['status'] == '5'){ $xStatus = 'ONAY BEKLİYOR'; $bg = '#2dff8f'; }?>
<?php if($details['status'] == '4'){ $xStatus = 'ONAY BEKLİYOR'; $bg = '#2dff8f'; }?>
<?php if($details['status'] == '3'){ $xStatus = 'İPTAL EDİLDİ'; $bg = '#ff8e90'; }?>
<?php if($details['status'] == '0'){ $xStatus = 'TEYİT BEKLİYOR'; $bg = '#fdff8e'; }?>
<?php if($details['status'] == '1'){ $xStatus = 'TEYİT EDİLDİ'; $bg = '#64d4fc'; }?>
<style type="text/css">
	.inputTitle{    display: inline-block;
    font-weight: bold;
    color: #999593;}
	.srcResults2{margin-top:15px;}
	.srcResults2 div{background:#f5f5f5;font-size:18px; line-height:1; cursor:pointer;}
	.srcResults2 div:hover{background:#ddd;}
	.srcResults2 div a{color:#666;font-weight:bold;display:block;padding:15px;border-bottom:1px solid #666;}
	.nameSpan{display:inline-block; padding:9px 0;}
	#ui-datepicker-div { z-index: 99999 !important; }
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
					<span class="pageTitle">Rezervasyon Detayı</span>
				</div>
				<div class="col-sm-3" style="display:inline-block;padding-top: 24px;" >
					<a class="butonX1 w100 text-center" href="<?php echo CANCEL_RESERVATION.$details['id'];?>">İPTAL ET</a>
				</div>
				<div class="col-sm-3" style="display:inline-block;padding-top: 24px;" >
					<a class="butonX1 w100 text-center" href="<?php echo DELETE_RESERVATION.$details['id'];?>">SİL</a>
				</div>
			</div>
				
			</div>
		</div>
	</div>
	
	
	<div class="mainContainer" style="padding:0 15px;">
		
		<div class="whiteZone f13" style="margin-top:15px;">
			<form action="<?php echo UPDATE_RESERVATION_POST;?>" method="post">
			<input type="hidden" name="id" value="<?php echo $details['id'];?>" />
				<div style="">
					<div class="row" style="margin-bottom:15px;">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; İSİM</span>
						</div>
						<div class="col-xs-4">
							<a style="font-size:20px; font-weight:bold;color:#000;" href="<?php echo CUSTOMER_DETAILS_PAGE.$details['customer_id'];?>">
							<input type="text" class="form-control" disabled value="<?php echo $details['full_name'];?>" />
							</a>
							<!--<a style="font-size:20px; font-weight:bold;color:#000;" href="<?php echo CUSTOMER_DETAILS_PAGE.$details['customer_id'];?>"><?php echo $details['full_name'];?> <i class="fa fa-info-circle"></i></a>-->
						</div>
						<div class="col-xs-4" >
						<div style="background:<?php echo $bg;?>; padding:8px; border-radius:10px;">
							<b>Rezervasyon Durumu :</b> <?php echo $xStatus;?>
						</div>
						</div>
					</div>
					<div class="row" style="margin-bottom:15px;">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; TELEFON</span>
						</div>
						<div class="col-xs-4">
							<a style="font-size:20px; font-weight:bold;color:#000;" href="<?php echo CUSTOMER_DETAILS_PAGE.$details['customer_id'];?>">
								<input type="text" class="form-control" disabled value="<?php echo $details['phone'];?>" />
							</a>
						</div>
						<div class="col-xs-4">
							<div style="border:1px solid #ddd; padding:8px; border-radius:10px;">
								<b>Kayıt Yeri :</b> <?php echo $details['record'];?>
							</div>
							
						</div>
					</div>
					<div class="row" style="margin-bottom:15px;">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; E-MAIL</span>
						</div>
						<div class="col-xs-4"> 
							<a style="font-size:20px; font-weight:bold;color:#000;" href="<?php echo CUSTOMER_DETAILS_PAGE.$details['customer_id'];?>">
								<input type="text" class="form-control" disabled value="<?php echo $details['email'];?>" />
							</a>
						</div>
					</div>
					<div class="row" style="margin-bottom:15px;">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; TARİH</span>
						</div>
						<div class="col-xs-8">
							<input type="text" class="datepicker form-control" name="reservation_date" value="<?php echo $details['reservation_date'];?>" />
						</div>
					</div>
					<div class="row" style="margin-bottom:15px;">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; SAAT</span>
						</div>
						<div class="col-xs-8">
							<select name="reservation_hour" class="form-control">
								<option value="<?php echo $details['reservation_hour'];?>" selected ><?php echo $details['reservation_hour'];?></option>
								<option value="19:00">19:00</option>
								<option value="20:00">20:00</option>
								<option value="21:00">21:00</option>
								<option value="22:00">22:00</option>
								<option value="23:00">23:00</option>
								<option value="24:00">24:00</option>
							</select>
						</div>
					</div>
					<div class="row" style="margin-bottom:15px;">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; KİŞİ SAYISI</span>
						</div>
						<div class="col-xs-8">
							<input type="text" class="form-control" name="total_person" value="<?php echo $details['total_person'];?>" />
						</div>
					</div>
					<div class="row" style="margin-bottom:15px;">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; NOT</span>
						</div>
						<div class="col-xs-8">
							<textarea name="note" class="form-control" rows="3"><?php echo $details['note'];?></textarea>
						</div>
					</div>
					<div class="row" style="margin-bottom:15px;">
						<div class="col-xs-4">
							
						</div>
						<div class="col-xs-8">
							<?php if(($details['status'] == '4') OR ($details['status'] == '5')){ ?>
								<div class="row">
									<div class="col-xs-6">
										<input type="submit" class="butonX1 w100 text-center" value="GÜNCELLE" />
									</div>
									<div class="col-xs-6">
										<a href="<?php echo APPROVE2_RESERVATION.$details['id'];?>" class="w100 text-center butonX1">ONAYLA</a>
									</div>
								</div>
							<?php }else{?>
								<input type="submit" class="butonX1 w100 text-center" value="GÜNCELLE" />
							<?php } ?>
							
						</div>
					</div>
				</div>
			</form>
		</div>
		
	</div>
</div>
<?php include('includes/footer-order.php');?>
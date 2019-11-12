<?php include('includes/header-order.php');?>
<style type="text/css">
	.inputTitle{    display: inline-block;
    font-weight: bold;
    color: #999593;}
	.srcResults2{margin-top:15px;}
	.srcResults2 div{background:#f5f5f5;font-size:18px; line-height:1; cursor:pointer;}
	.srcResults2 div:hover{background:#ddd;}
	.srcResults2 div a{color:#666;font-weight:bold;display:block;padding:15px;border-bottom:1px solid #666;}
	.nameSpan{display:inline-block; padding:9px 0;}
</style>
<div class="left1">
	<?php include('includes/left_menu.php');?>
</div>
<div class="left2" style="background:#fff;">
	<div class="mainContainer" style="padding:0 15px;">
		<div class="text-center hidden-xs" style="font-size:40px; padding-top:20px; font-weight:bold;">
			<img src="<?php echo IMG;?>posopos-logo.png" width="140px" /> <br />
			POSOPOS
		</div>
		<div class="whiteZone f13" style="font-weight:bold; font-size:20px;">
		
		<div class="text-center" style="font-size:40px;line-height:45px;">
		<div>Adisyon, Rezervasyon ve Stok Takip <br /><br /></div>
			
		<div>Yapmak istediğiniz işlemleri <br />
			sol taraftaki menüden seçebilirsiniz.</div>
		</div>
		
			<div style="background:#ff0000;color:#fff; position:absolute; bottom:15px; right:15px; left:15px; border-radius: 3px; padding: 15px;">
				
				<div class="text-center" style="font-size:25px;"><b><?php echo $_SESSION['store_name'];?></b></div>
				<div style="text-align:center;color:#fff;">Program Lisans Süreniz</div>
					<?php 
						$ftime = strtotime($_SESSION['c_insert_time']);
						$ltime = strtotime($_SESSION['c_close_time']);
						$dif = $ltime - strtotime(date('d.m.Y', time()));
						$days = $dif / (24*60*60);
						$perc = ($days / 365)*100;
					?>
				
				<div class="fontXX">
					<div class="col-sm-6 text-center" style="padding:0;">
						<span class="text-center"><b>Başlangıç <br /> <?php echo $_SESSION['c_insert_time'];?></b></span>
					</div>
					<div class="col-sm-6 text-center" style="padding:0;">
						<span class="text-center"><b>Bitiş<br /><?php echo $_SESSION['c_close_time'];?></b></span>
					</div>
					<div class="clearfix"></div>
				</div>
				<div style="border:1px solid #404040; height:20px;position:relative; border-radius:8px;overflow:hidden;background:#fff;">
					<div style="position:absolute; top:0;left:0; bottom:0; width:<?php echo $perc;?>%;background:#404040;"></div>
					<!--<span class="" style="position:absolute;left:<?php echo $perc;?>%;">Kalan <?php echo $days;?> Gün</span>-->
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('includes/footer-order.php');?>
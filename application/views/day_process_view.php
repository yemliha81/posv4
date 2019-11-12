<?php include('includes/header-order.php');?>
<style type="text/css">
	input{width:40px;border:0;}
	.btnXX{width:100%;height:200px;font-size:25px; margin:5px; background:#4d78c1; color:#fff;}
	.xText{
		vertical-align:middle;
	}
</style>
<div class="container" style="">
	<div class="row">
		<div class="col-sm-4">
				<a class="btnXX btn btn-<?php echo $cls;?> btn-float" href="<?php echo MAIN_BOARD;?>">
					<span class="xText">ANA SAYFA</span> <br />
					<span class="fa fa fa-th fa-3x"></span>
				</a>
		</div>
		<div class="col-sm-4">
				<a class="btnXX btn btn-<?php echo $cls;?> btn-float" href="<?php echo DAY_START;?>">
					<span class="xText">GÜN BAŞI</span> <br />
					<span class="fa fa fa-sun-o fa-3x"></span>
				</a>
		</div>
		<div class="col-sm-4">
				<a class="btnXX btn btn-<?php echo $cls;?> btn-float" href="<?php echo DAY_END;?>">
					<span class="xText">GÜN SONU</span> <br />
					<span class="fa fa fa-moon-o fa-3x"></span>
				</a>
		</div>
	</div>
	<div style="font-size:24px; font-weight:bold;text-align:center; padding:20px;">
		<?php if(!empty($last_day)){ ?>
			En son gün başı : <?php echo date('d.m.Y H:i', $last_day['day_start_time']);?> tarihinde yapıldı.
		<?php } ?>
	</div>
	<div class="clearfix"></div>
</div>
<?php include('includes/footer-order.php');?>
<?php include('includes/header-order.php');?>
<style type="text/css">
	.rowH{ background: #f5f5f5; padding: 10px; border-top: 1px solid #ddd;}
	.rowT{ padding: 10px; border-top: 1px solid #ddd;}
	.backToHome{font-size:20px;display:inline-block; line-height:1;padding:15px 25px; background:#4972B7; color:#fff;}
</style>
<div class="topBar">
	<a href="<?php echo MAIN_BOARD;?>" class="backToHome">
	<i class="fa fa-chevron-left"></i>
	<i class="fa fa-chevron-left"></i> Ana Sayfa</a>
</div>
<div class="" style="">
	<div>
		<?php foreach($payments as $key => $val){ ?>
		<?php 
			if($val['payment_type'] == 'cash'){ $cash[] = $val['paid_price']; $type = 'Nakit';} 
			if($val['payment_type'] == 'credit'){ $credit[] = $val['paid_price']; $type = 'Kredi Kartı';} 
			if($val['payment_type'] == 'open'){ $open[] = $val['paid_price']; $type = 'Açık Hesap';} 
			if($val['payment_type'] == 'out'){ $out[] = $val['paid_price']; $type = 'Masraf';} 
			if($val['payment_type'] == 'discount'){ $discount[] = $val['paid_price']; $type = 'İndirim';} 
		?>
			
			<?php $total += $val['paid_price'];?>
		<?php } ?>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="row rowT">
				<div class="col-sm-6">
					<h3>Nakit : <?php echo array_sum($cash);?>  ₺</h3>
					<h3>Banka : <?php echo array_sum($credit);?>  ₺</h3>
					<h3>Açık Hesap : <?php echo array_sum($open);?>  ₺</h3>
					<h3 class="hidden">İndirim : <?php echo array_sum($discount);?>  ₺</h3>
					<h3 class="hidden">Masraf : <?php echo array_sum($out) * (-1);?>  ₺</h3> 
					<hr />
					<h3 class="hidden">
					Toplam : <?php echo $total;?> ₺
					</h3>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		
			<div class="col-xs-12">
				<div class="row rowH">
					<div class="col-sm-3">
						<b>Gün Başı Tarihi</b>
					</div>
					<div class="col-sm-3">
						<b>Gün Sonu Tarihi</b>
					</div>
					<div class="col-sm-3">
						
					</div>
					<div class="col-sm-3">
						
					</div>
				</div>
			</div>
		<?php if(!empty($open_day)){ ?>
			<div class="col-xs-12">
				<div class="row rowT">
					<div class="col-sm-3">
						<?php echo date('d.m.Y H:i', $open_day['day_start_time']);?>
					</div>
					<div class="col-sm-3">
						<?php if($open_day['day_end_time'] > 0){ ?>
							<?php echo date('d.m.Y H:i', $open_day['day_end_time']);?>
						<?php }else{ ?>
							Gün sonu yapılmadı...
						<?php } ?>
					</div>
					<div class="col-sm-3">
						
					</div>
					<div class="col-sm-3">
						<a href="<?php echo OPEN_DAY_DETAIL_PAGE.$open_day['day_id'];?>" class="btn btn-info">İncele</a>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php foreach($closed_days as $key => $val){ ?>
			<div class="col-xs-12">
				<div class="row rowT">
					<div class="col-sm-3">
						<?php echo date('d.m.Y H:i', $val['day_start_time']);?>
					</div>
					<div class="col-sm-3">
						<?php if($val['day_end_time'] > 0){ ?>
							<?php echo date('d.m.Y H:i', $val['day_end_time']);?>
						<?php }else{ ?>
							Gün sonu yapılmadı...
						<?php } ?>
					</div>
					<div class="col-sm-3">
						
					</div>
					<div class="col-sm-3">
						<a href="<?php echo DAY_DETAIL_PAGE.$val['day_id'];?>" class="btn btn-info">İncele</a>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
<?php include('includes/footer-order.php');?>
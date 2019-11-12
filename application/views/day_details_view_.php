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
	<a href="<?php echo $_SERVER['HTTP_REFERER'];?>" class="backToHome">
	<i class="fa fa-chevron-left"></i> Önceki Sayfa</a>
</div>
<div class="" style="">
	<div class="row dn" style="display:none;">
		
			<div class="col-xs-12">
				<div class="row rowH">
					<div class="col-sm-3">
						<b>Ödeme Tarihi</b>
					</div>
					<div class="col-sm-3">
						<b>Ödeme Tipi</b>
					</div>
					<div class="col-sm-3">
						
					</div>
					<div class="col-sm-3">
						<b>Ödenen Tutar</b>
					</div>
				</div>
			</div>
		<?php foreach($payments as $key => $val){ ?>
		<?php 
			if($val['payment_type'] == 'cash'){ $cash[] = $val['paid_price']; $type = 'Nakit';} 
			if($val['payment_type'] == 'credit'){ $credit[] = $val['paid_price']; $type = 'Kredi Kartı';} 
			if($val['payment_type'] == 'open'){ $open[] = $val['paid_price']; $type = 'Açık Hesap';} 
			if($val['payment_type'] == 'out'){ $out[] = $val['paid_price']; $type = 'Masraf';} 
			if($val['payment_type'] == 'discount'){ $discount[] = $val['paid_price']; $type = 'İndirim';} 
			if($val['payment_type'] == 'mealCard'){ $mealCard[] = $val['paid_price']; $type = 'Yemek Kartı';} 
		?>
			<div class="col-xs-12">
				<div class="row rowT">
					<div class="col-sm-3">
						<?php echo date('d.m.Y H:i', $val['payment_time']);?>
					</div>
					<div class="col-sm-3">
						<?php echo $type;?>
					</div>
					<div class="col-sm-3">
						
					</div>
					<div class="col-sm-3">
					<?php echo $val['paid_price'];?> ₺
					</div>
				</div>
			</div>
			<?php $total += $val['paid_price'];?>
		<?php } ?>
			
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="row rowT">
				<div class="col-sm-6">
					<h3>Nakit : <?php echo array_sum($cash);?>  ₺</h3>
					<h3>Kredi Kartı : <?php echo array_sum($credit);?>  ₺</h3>
					<h3>Yemek Kartı : <?php echo array_sum($mealCard);?>  ₺</h3>
					<h3>Açık Hesap : <?php echo array_sum($open);?>  ₺</h3>
					<h3>İndirim : <?php echo array_sum($discount);?>  ₺</h3>
					<h3>Masraf : <?php echo array_sum($out) * (-1);?>  ₺</h3> 
					<hr />
					<h3>
					Toplam : <?php echo $total;?> ₺
					</h3>
					<a href="javascript:;" class="btn btn-success details">Detaylar</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('includes/footer-order.php');?>
<script type="text/javascript">
	$(".details").click(function(){
		$(".dn").slideToggle();
	});
</script>
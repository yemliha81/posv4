<div class="text-center">
	<b class="f18">
		<?php echo $titleText;?>
	</b>
</div>
<div class="row" style="margin:20px 0 0 0;" >
	<div class="col-sm-6">
		<div class="" style="">
			<?php foreach($payments as $key => $val){ ?>
			<?php 
				if($val['payment_type'] == 'cash'){ $cash[] = $val['paid_price']; $type = 'Nakit';} 
				if($val['payment_type'] == 'credit'){ $credit[] = $val['paid_price']; $type = 'Kredi Kartı';} 
				if($val['payment_type'] == 'open'){ $open[] = $val['paid_price']; $type = 'Açık Hesap';} 
				if($val['payment_type'] == 'out'){ $out[] = $val['paid_price']; $type = 'Masraf';} 
				if($val['payment_type'] == 'discount'){ $discount[] = $val['paid_price']; $type = 'İndirim';} 
			?>
			<?php } ?>
			<div class="boxT1" style="background:#29eb7f;color:#fff;">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-money fa-3x"></i>
					</div>
					<div class="col-xs-9">
					<?php $tot = array_sum($cash)+array_sum($credit)+array_sum($open);?>
						<div class="text-right">
						<?php $ttx =  number_format( array_sum($cash)+array_sum($credit)+array_sum($open) ,2,".","," ) ;?>
							<span class="priceS <?php if( strlen($ttx) > 8 ){ echo 'f24'; }else{ echo 'f30'; }?>">
								<?php echo $ttx;?>
							</span> 
							<span>₺</span>
						</div>
						<div class="text-right"><span>Toplam Satış</span></div>
					</div>
				</div>
			</div>
			<div class="boxT1" style="background:#ffc82c;color:#fff;">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-money fa-3x"></i>
					</div>
					<div class="col-xs-9">
						<div class="text-right">
							<?php $ttx2 =  number_format( array_sum($cash) ,2,".","," ) ;?>
							<span class="priceS <?php if( strlen($ttx2) > 8 ){ echo 'f24'; }else{ echo 'f30'; }?>">
							<?php echo $ttx2;?></span> 
							<span>₺</span>
						</div>
						<div class="text-right">Nakit</div>
					</div>
				 </div>
			 </div>
			<div class="boxT1" style="background:#ff5216;color:#fff;">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-money fa-3x"></i>
					</div>
					<div class="col-xs-9">
					<?php $ttx3 =  number_format( array_sum($credit) ,2,".","," ) ;?>
						<div class="text-right">
							<span class="priceS <?php if( strlen($ttx3) > 8 ){ echo 'f24'; }else{ echo 'f30'; }?>">
							<?php echo $ttx3;?></span> 
							<span>₺</span>
						</div>
						<div class="text-right">Banka</div>
					</div>
				 </div>
			 </div>
			<div class="boxT1" style="background:#1fb6ff;color:#fff;">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-money fa-3x"></i>
					</div>
					<div class="col-xs-9">
					<?php $ttx4 =  number_format( array_sum($open) ,2,".","," ) ;?>
						<div class="text-right">
							<span class="priceS <?php if( strlen($ttx4) > 8 ){ echo 'f24'; }else{ echo 'f30'; }?>">
								<?php echo $ttx4;?>
							</span>  
							<span>₺</span>
						</div>
						<div class="text-right">Açık Hesap</div>
					</div>
				 </div>
			 </div>
			 <div class="boxT1" style="background:#1fb6ff;color:#fff;">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-money fa-3x"></i>
					</div>
					<div class="col-xs-9">
					
						<div class="text-right">
							<span class="priceS <?php if( strlen($list) > 8 ){ echo 'f24'; }else{ echo 'f30'; }?>">
								<?php echo $list;?>
							</span> 
						</div>
						<div class="text-right">Toplam Adisyon</div>
					</div>
				 </div>
			 </div>
			  <div class="boxT1" style="background:#1fb6ff;color:#fff;">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-money fa-3x"></i>
					</div>
					<div class="col-xs-9">
					
						<div class="text-right">
							<span class="priceS <?php if( strlen($ttx) > 8 ){ echo 'f24'; }else{ echo 'f30'; }?>">
								<?php echo number_format(($tot / $list) ,2,".","," );?>
							</span>  
							<span>₺</span>
						</div>
						<div class="text-right">Ciro / Adisyon</div>
					</div>
				 </div>
			 </div>
			
		</div>
	</div>
	<div class="col-sm-6">
		<div class="bestWrapper">
			<div style="border-bottom:1px solid #ddd;padding-bottom:7px; margin-bottom:10px;"><b class="f16">En Çok Satan 10 Ürün : </b></div>
			<div>
				<?php foreach($most as $key => $val){ ?>
					<div class="bestSellers">
						<?php echo '<span><b>'.($key+1).'</b></span>. '.$val['pro_name'].' : <span class="pull-right">'.$val['c'].' Adet</span>';?> 
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="col-sm-4 hidden">
		<div class="panel panel-flat" style="padding:10px;">
			Tahsilatlar : 
		</div>
	</div>
</div>
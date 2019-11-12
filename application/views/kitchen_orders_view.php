<?php foreach($orders as $key => $val){ ?>
<?php $passedSec[$key] = ( time() - $val['order_insert_time']);?>
<?php $passedMin[$key] = floor( (( time() - $val['order_insert_time']) / 60));?>
<?php $passedHour[$key] = floor( ( $passedMin[$key] / 60));?>

<?php $restMin[$key] = $passedMin[$key] - ($passedHour[$key] * 60);?>
<?php $restSec[$key] = $passedSec[$key] - ($passedMin[$key] * 60);?>
	<div class="ord">
		<div class="tbl">
			<div class="row">
				<div class="col-xs-7">
					
					<?php if($val['orderType'] == '2'){ ?>
						Paket Sipariş 	<?php echo $val['full_name'];?>
					<?php }else{ ?>
						<?php echo $val['table_name'];?> 
					<?php } ?>
				</div>
				<div class="col-xs-5" style="white-space:nowrap;">
					<span class="timeDiv pull-right" time=""><?php if($passedHour[$key] > 0){echo $passedHour[$key].' s ';}?><?php echo $restMin[$key].' : '.$restSec[$key].'';?></span>
				</div>
			</div>
		</div>
		<?php if($val['order_note'] != ''){ ?>
			<div style="padding:5px;border-bottom:1px solid #ddd;background:#f49931;color:#fff;">
				<b>Not : <?php echo $val['order_note'];?></b>
			</div>
		<?php } ?>
		<?php foreach($val['order_details'] as $kk => $vv){ ?>
			<?php if($vv['description'] == 'İptal'){ $desc = ' <span style="color:#fff;font-weight:bold;">İptal</span>'; $bg = 'red';}else{ $desc = ''; $bg = '#fff';}?>
				<div class="row complete_1_<?php echo $val['order_id'];?>" kitchen_id="<?php echo $kitchen_id;?>" rel="<?php echo $vv['id'];?>" order_id="<?php echo $val['order_id'];?>" style="border-bottom:1px solid #ddd;padding:5px;margin:0;background:<?php echo $bg;?>">
					<div class="col-xs-9">
						<div class="row"><?php echo '<b>'.$vv['qty'].'</b> x '.$vv['pro_name'].$desc;?> 
							<?php if($vv['description2'] != ''){ echo '<br /> <span style="color:#B34439"> <b>Not : '.$vv['description2'].'</b></span>'; }?>
						</div>
					</div>
					<div class="col-xs-3">
						<?php if ($bg != 'red'){ ?>
							<div class="row">
								<a href="javascript:;" style="color:#B34439; display:inline-block; " kitchen_id="<?php echo $kitchen_id;?>" class="complete_1 pull-right" rel="<?php echo $vv['id'];?>" order_id="<?php echo $val['order_id'];?>"><i class="glyph-icon flaticon-reception-bell"></i></a>
							</div>
						<?php } ?>
					</div>
					<div class="clearfix"></div>
				</div>
			<?php } ?>
		
		<div class="btnns">
			<a href="javascript:;" order_id="<?php echo $val['order_id'];?>" kitchen_id="<?php echo $kitchen_id;?>" class="complete_all w100 butonX1 text-center" style="background:#B34439">HEPSİ HAZIR</a>
		</div>
	</div>
<?php } ?>
<input type="hidden" class="last" value="<?php echo $lastOrder['order_id'];?>" /> 
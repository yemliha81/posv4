<div class="text-center">
	<b class="f18">
		<?php echo $titleText;?>
	</b>
</div>
<div>
	  <!--<div id="donutchart" style="width: 1000px; height: 375px; float:left;"></div>-->
</div>
<div class="clearfix"></div>
<table class="table table-hover">
<thead>
	<tr class="text-right">
		<td class="text-left"><b>Tarih</b></td>
		<td><b>Masa</b></td>
		<td><b>İndirim</b></td>
		<td><b>Toplam</b></td>
		<td><b>Nakit</b></td>
		<td><b>Kredi Kartı</b></td>
		<td><b>Açık Hesap</b></td>
	</tr>
</thead>
<tbody>
	<?php foreach($list as $key => $val){ ?>
		<tr class="text-right ordDetailsX" style="cursor:pointer;" table_name="<?php echo $val['table_name'];?>" order_id="<?php echo $val['order_id'];?>">
			<td class="text-left"><?php echo date('d/m/Y H:i', $val['order_insert_time']);?></td>
			<?php if($val['table_id'] > 0){ ?>
				<td><?php echo $val['table_name'];?></td>
			<?php }else{ ?>
				<td>Online Sipariş</td>
			<?php } ?>
			<td><?php echo number_format($val['discount']['paid_price'], 2, ",",".");?></td>
			<td><?php echo number_format(($val['total_price'] - $val['discount']['paid_price']), 2, ",",".");?></td>
			<td><?php echo number_format($val['cash']['paid_price'], 2, ",",".");?></td>
			<td><?php echo number_format($val['credit']['paid_price'], 2, ",",".");?></td>
			<td><?php echo number_format($val['open']['paid_price'], 2, ",",".");?></td>
		</tr>
		<?php	
			$disc += $val['discount']['paid_price'];
			$total_price += ($val['total_price']-$val['discount']['paid_price']);
			$cash += $val['cash']['paid_price'];
			$credit += $val['credit']['paid_price'];
			$open += $val['open']['paid_price'];
		?>					
	<?php } ?>
		<tr class="text-right">
			<td><b></b></td>
			<td><b></b></td>
			<td><b><?php echo number_format((float)$disc, 2, ",",".");?></b></td>
			<td><b><?php echo number_format((float)($total_price-$disc), 2, ",",".");?></b></td>
			<td><b><?php echo number_format((float)$cash, 2, ",",".") ;?></b></td>
			<td><b><?php echo number_format((float)$credit, 2, ",",".") ;?></b></td>
			<td><b><?php echo number_format((float)$open, 2, ",",".") ;?></b></td>
		</tr>
</tbody>
</table>
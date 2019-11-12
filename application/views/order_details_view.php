<div class="showPrint">
	<?php echo $settings['adisyon_header'];?>
</div>
<div style="border-bottom:1px solid #000;">Tarih: <?php echo date('d/m/Y H:i', $details['ord']['order_insert_time']);?>
	<span style="display:inline-block; float:right;"><b>Masa: <?php echo $details['ord']['table_name'];?></b></span>
</div>
<table class="table" width="100%">
<tr>
	<td><b>Ürün</b></td>
	<td><b>Miktar</b></td>
	<td style="text-align:right;"><b>Fiyat</b></td>
</tr>
<?php foreach($list as $key => $val){ ?>
	<tr>
		<td><?php echo $val['pro_name'];?></td>
		<td><?php echo $val['qty'];?></td>
		<td style="text-align:right;"><?php echo number_format((float)($val['price']*$val['qty']), 2, '.', ',');?></td>
	</tr>
<?php } ?>
</table>
<div class="clearfix"></div>
<div style="border-top:1px solid #000;">
	<div style="text-align:right;">Toplam : <?php echo number_format((float)$details['ord']['total_price'], 2, '.', ',');?></div>
	<div></div>
	<div class="clearfix"></div>
</div>
<div class="showPrint">
	<?php echo $settings['adisyon_footer'];?>
</div>
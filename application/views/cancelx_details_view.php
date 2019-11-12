<?php function processType($vvv){
	if($vvv == 'cancel'){ $bg="#FFCED1"; echo 'İptal'; }
	if($vvv == 'free'){ $bg="#C6FAC0"; echo 'İkram'; }
	if($vvv == 'priceUpdate'){ $bg="#93EBFD"; echo 'Fiyat Güncelleme'; }
} ?>
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
		<td class="text-left"><b>ID</b></td>
		<td class="text-left"><b>Tarih</b></td>
		<td class="text-left"><b>Kullanıcı</b></td>
		<td><b>Masa</b></td>
		<td><b>Ürün</b></td>
		<td><b>Adet</b></td>
		<td><b>İlk Fiyat</b></td>
		<td><b>Son Fiyat</b></td>
		<td><b>İşlem Türü</b></td>
	</tr>
</thead>
<tbody>
	<?php foreach($list as $key => $val){ 
		if($val['process'] == 'cancel'){ $bg="#FFCED1";}
		if($val['process'] == 'free'){ $bg="#C6FAC0";}
		if($val['process'] == 'priceUpdate'){ $bg="#93EBFD"; }
	?>
		<tr class="text-right" style="background:<?php echo $bg;?>" >
			<td class="text-left"><?php echo $val['log_id'];?></td>
			<td class="text-left"><?php echo date('d/m/Y H:i', $val['order_insert_time']);?></td>
			<td><?php echo $val['user_name'];?></td>
			<td><?php echo $val['table_name'];?></td>
			<td><b><?php echo $val['pro_name'].' '.$val['porsion_name'];?></b></td>
			<td><b><?php echo $val['qty'];?></b></td>
			<td><b><?php echo $val['first_price'];?></b></td>
			<td><b><?php echo $val['last_pp'];?></b></td>
			<td><b><?php processType($val['process']);?></b></td>
		</tr>					
	<?php } ?>
		
</tbody>
</table>
<?php include('includes/header-order.php');?>
<div class="text-center">
	<b class="f18">
		<?php echo $titleText;?>
	</b>
</div>
<?php if(!empty($list)){ ?>
<?php foreach($list as $key => $val){ ?>
	<?php	
		$disc += $val['discount']['paid_price'];
		$total_price += ($val['total_price']-$val['discount']['paid_price']);
		$cash += $val['cash']['paid_price'];
		$credit += $val['credit']['paid_price'];
		$open += $val['open']['paid_price'];
	?>					
<?php } ?>
		
	<div>
		 <!-- <div id="donutchart2" style="width: 1000px; height: 375px; float:left;"></div>-->
	</div>
	<div class="clearfix"></div>
<?php } ?>

<table class="table"  id="e32e3">
<thead>
	<tr class="">
		<td><b>Sıra</b></td>
		<td><b>Ürün</b></td>
		<td><b>Sipariş Sayısı</b></td>
		<td><b>Kategori</b></td>
		<td><b>Birim Fiyat</b></td>
		<td><b>Toplam Tutar</b></td>
		
	</tr>
</thead>
<tbody>
	<?php foreach($products as $key => $val){ ?>
		<tr class="">
			<td><?php echo $key+1;?></td>
			<td><?php echo $val['pro_name'];?></td>
			<td><?php echo $val['c'];?></td>
			<td><?php echo $val['cat_name'];?></td>
			<td class="text-right"><?php echo number_format( $val['price'] ,2,",","." );?></td>
			<td class="text-right"><?php echo number_format( $val['price'] * $val['c'],2,",","." );?></td>
			
		</tr>					
	<?php } ?>
</tbody>
</table>
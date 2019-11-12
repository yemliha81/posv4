<?php include('includes/header-order.php');?>
<div class="text-center">
	<b class="f18">
		<?php echo $titleText;?>
	</b>
</div>

<table class="table table-hover"  id="y5656y56">
	<thead>
		<tr class="">
			<td><b>Gün Başı Tarihi</b></td>
			<td><b>Gün Sonu Tarihi</b></td>
		</tr>
	</thead>
	<tbody>
		<?php foreach($days as $key => $val){ ?>
			<?php if($val['day_end_time'] == '0'){$dend = date('m/d/Y H:i:s', time()); }else{ $dend = date('m/d/Y H:i:s', $val['day_end_time']);}?>
			<tr class="gdR" style="cursor:pointer;" fDate="<?php echo date('m/d/Y H:i:s', $val['day_start_time']);?>" lDate="<?php echo $dend;?>">
				<td><?php echo date('d/m/Y H:i', $val['day_start_time']);?></td>
				<td><?php if($val['day_end_time'] == '0'){$dend = date('m/d/Y H:i:s', time()); echo 'Gün Sonu Yapılmadı';}else{ $dend = date('m/d/Y H:i:s', $val['day_end_time']); echo date('d/m/Y H:i', $val['day_end_time']);}?></td>
				
			</tr>					
		<?php } ?>
	</tbody>
</table>

<?php include('includes/footer-order.php');?>
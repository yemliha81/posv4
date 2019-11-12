<div>
	
	<div class="text-center" style="background:#2196f3; color:#fff; padding:10px 0;">
		<h2 style="padding:0;margin:0;"><?php echo $depo['depo_name'];?></h2>
	</div>
		<div class="panel panel-flat" style="padding:15px;">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Ürün</th>
						<th>Stok</th>
						<th>Birim</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($details as $key => $val){ ?>
					<?php 	
						if( $val['stock']['unit'] == 'kg' ){
							$qty[$key] = ($val['sales']['qty']/1000);
						}elseif($val['stock']['unit'] == 'Lt'){
							$qty[$key] = ($val['sales']['qty']/1000);
						}else{
							$qty[$key] = $val['sales']['qty'];
						}
					?>
					<tr>
						<td><?php echo $val['pro_id'];?></td>
						<td><?php echo $val['pro_name'];?></td>
						<td><?php echo ( $val['stock']['qty'] - $qty[$key]);?></td>
						<td><?php echo $val['stock']['unit'];?></td>
						<td></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>

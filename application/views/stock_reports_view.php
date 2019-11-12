<div>
		<div class="panel danel-flat" style="padding:15px;">
			
			<table class="table">
				<thead>
					<tr>
						<th>Depo Adı</th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
			
					<?php foreach($depos as $key => $val){ ?>
						<tr>
							<td><?php echo $val['depo_name'];?></td>
							<td>
								
							</td>
							<td>
								<a href="javascript:;" link="<?php echo STOCK_REPORT_DETAILS.$val['depo_id'];?>" class="btn btn-info btn-sm pull-right stockDetails">Stok Detay</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
</div>
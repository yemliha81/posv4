<div class="tbl" style="background:#666; font-size:17px; color:#fff; font-weight:bold; padding:10px;">
	<div class="text-center">
		<?php echo $table['table_name'];?>
	</div>
</div>
<?php foreach($order_rows as $key => $val){ ?>
	<div class="countX" style="border-bottom:1px solid #ddd; padding:15px;">
		<div class="col-xs-9">
			<div class="row">
				<?php echo $val['pro_name'];?>
				<?php if($val['description2'] != ''){ echo '<br /> <span style="color:#B34439"> <b>Not : '.$val['description2'].'</b></span>'; }?>
			</div>
		</div>
		<div class="col-xs-3">
			<a href="javascript:;" style="color:#fff; display:inline-block; " class="complete_2 pull-right btn btn-sm btn-success" rel="<?php echo $val['id'];?>" order_id="<?php echo $val['order_id'];?>"><i class="fa fa-check"></i></a>
		</div>
		<div class="clearfix"></div>
	</div>
<?php } ?>
<div class="btnns" style="padding:12px;">
	<a href="javascript:;" order_id="<?php echo $order_rows[0]['order_id'];?>" class="complete_all2 w100 butonX1 text-center" style="background:#B34439">HEPSİ SERVİS EDİLDİ</a>
</div>
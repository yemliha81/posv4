<div class="div" style="padding:15px;">

	<?php foreach($sub_payment_types as $key => $val){ ?>
		<div style="width:33.33%;float:left; padding:3px;">
			<div class="subPX btn btn-2c" style="width:100%;background:#fff; border:1px solid #000; color:#000; font-weight:bold; padding:25px 0;" sub_p_id="<?php echo $val['payment_sub_id'];?>" psubname="<?php echo $val['payment_subname'];?>">
				<?php echo $val['payment_subname'];?>
			</div>
		</div>
	<?php } ?>

</div>
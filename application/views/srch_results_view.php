<?php if(!empty($list)){ ?>
	<?php foreach($list as $key => $val){ ?>
		<div class="optDiv" pro_id="<?php echo $val['pro_id'];?>" unit="<?php echo $val['unitTypes'];?>" rel="<?php echo $val['pro_id'];?>"><?php echo $val['pro_name'];?></div>
	<?php } ?>
<?php } ?>
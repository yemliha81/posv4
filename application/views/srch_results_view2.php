<?php if(!empty($list)){ ?>
	<?php foreach($list as $key => $val){ ?>
		<div class="pDiv" pro_id="<?php echo $val['pro_id'];?>" >
			<?php echo $val['pro_name'];?>
		</div>
	<?php } ?>
<?php } ?>
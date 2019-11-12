<?php if(!empty($sub_cat_list)){ ?>
	<?php foreach($sub_cat_list as $key => $val){ ?>
		<div class="s_c1" rel="<?php echo $val['cat_id'];?>">
			<?php for($i=1; $i<=$val['type']; $i++){ ?>
				<?php echo '-';?>
			<?php } ?>
			<?php echo $val['cat_name'];?>
		</div>
		<div class="cSubC_<?php echo $val['cat_id'];?>" rel="<?php echo $val['cat_id'];?>"></div>
	<?php } ?>
<?php } ?>
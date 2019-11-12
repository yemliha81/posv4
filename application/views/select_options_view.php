<?php if(!empty($groups)){ ?>
	<?php foreach($groups as $key => $val){ ?>
		
		<div class="optGr">
			<b><?php echo $val['og_name'];?></b>
		</div>
		<?php foreach($val['products'] as $kk => $vv){ ?>
		
			<label for="pidopt_<?php echo $key.$kk;?>" class="prxxName contt"> 
				<?php echo $vv['pro_name'];?>
				<input name="pro_id_option_<?php echo $key;?>" id="pidopt_<?php echo $key.$kk;?>" type="radio" class="hidden" value="<?php echo $vv['pro_id'];?>">
				<span class="checkmark"></span>
			</label>
			
		<?php } ?>
	<?php } ?>
<?php } ?>
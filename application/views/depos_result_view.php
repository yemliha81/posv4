<?php if(!empty($list)){ ?>
	<?php foreach($list as $key => $val){ ?>
		<div class="depoD depoDx" depoId="<?php echo $val['depo_id'];?>"><?php echo $val['depo_name'];?></div>
	<?php } ?>
<?php }else{ ?>
	Sonuç bulunamadı!
<?php }?>
<?php if(!empty($list)){ ?>
	<?php foreach($list as $key => $val){ ?>
		<div class="compD compDx" compId="<?php echo $val['company_id'];?>"><?php echo $val['company_name'];?></div>
	<?php } ?>
<?php }else{ ?>
	Sonuç bulunamadı!
<?php }?>
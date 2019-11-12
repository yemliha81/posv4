<?php if(!empty($list)){ ?>

	<?php foreach($list as $key => $val){ ?>
		<div class="srcPro">
			<a href="<?php echo PRODUCT_PAGE.$val['pro_id'];?>"><?php echo $val['pro_name'];?></a>
		</div>
	<?php } ?>

<?php }else{ ?>
	<div>No Results</div>
<?php }?>
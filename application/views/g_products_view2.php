<?php if(!empty($pro_list)){ ?>
	<?php foreach($pro_list as $key => $val){ ?>
		<div class="searchableDiv">
			<div class="p_1">
				<div class="col-xs-6">
					<input type="color" class="colorP" rel="<?php echo $val['pro_id'];?>" value="<?php echo $val['pro_bg'];?>"/>
					<span class="fa fa-chevron-down sortB sP" p="m" proid="<?php echo $val['pro_id'];?>"></span>
					<span class="sortB p_<?php echo $val['pro_id'];?>" ><?php echo $val['sort'];?></span>
					<span class="fa fa-chevron-up sortB sP" p="p" proid="<?php echo $val['pro_id'];?>"></span>
					<span class="pNm"><?php echo $val['pro_name'];?></span>
				</div>
				<div class="col-xs-6">
					<span class="pull-right"><b>Fiyat</b></span> 
				</div>
				<div class="clearfix"></div>
				
			</div>
			<div class="pPors_<?php echo $val['pro_id'];?>" rel="<?php echo $val['pro_id'];?>">
				<?php if(!empty($val['porsions'])){ ?>
					<?php foreach($val['porsions'] as $kk => $vv){ ?>
						<div class="porrs">
							<div class="">
								<div class="col-sm-4">
									<?php echo $vv['porsion_name'];?>
								</div>
								<div class="col-sm-4"></div>
								<div class="col-sm-4">
									<input type="text" class="pull-right form-control" name="porsion_id[<?php echo $vv['id'];?>]" value="<?php echo $vv['porsion_price'];?>"/>
									<input type="hidden" name="pro_id[<?php echo $vv['id'];?>]" value="<?php echo $val['pro_id'];?>"/>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
	<?php } ?>
<?php } ?>
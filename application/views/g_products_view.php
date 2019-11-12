<?php if(!empty($pro_list)){ ?>
	<?php foreach($pro_list as $key => $val){ ?>
		<div class="" pro_id="<?php echo $val['pro_id'];?>">
			<div class="p_1">
				<div class="col-xs-4">
					<div class="row">
						<input type="color" class="colorP" rel="<?php echo $val['pro_id'];?>" value="<?php echo $val['pro_bg'];?>"/>
						<!--<span class="fa fa-chevron-down sortB sP" p="m" proid="<?php echo $val['pro_id'];?>"></span>-->
						<input type="text" maxlength="3" class="sortPP" proid="<?php echo $val['pro_id'];?>" value="<?php echo $val['sort'];?>">
						<!--<span class="fa fa-chevron-up sortB sP" p="p" proid="<?php echo $val['pro_id'];?>"></span>-->
						&nbsp;<span class="pNm" style="display:inline-block; margin-top:20px;font-weight:bold;"><?php echo $val['pro_name'];?></span>
					</div>
				</div>
				<div class="col-xs-8 text-right">
					<div class=" pPors_<?php echo $val['pro_id'];?>" rel="<?php echo $val['pro_id'];?>">
						<?php if(!empty($val['porsions'])){ ?>
							<?php foreach($val['porsions'] as $kk => $vv){ ?>
								<div class="porrs " style="display:inline-block;float:left; max-width:33%;">
									<div class="">
										<div class="text-center">
											<?php echo $vv['porsion_name'];?>&nbsp;
										</div>
										<div>
											<input type="text" class="pull-right text-right" style="display:inline-block;max-width:70px;border:1px solid #ddd; padding:5px; border-radius:3px;" name="porsion_id[<?php echo $vv['id'];?>]" value="<?php echo $vv['porsion_price'];?>"/>
											<input type="hidden" name="pro_id[<?php echo $vv['id'];?>]" value="<?php echo $val['pro_id'];?>"/>
										</div>	
									</div>
								</div>
							<?php } ?>
						<?php } ?>
					</div>
				</div>
				<div class="clearfix"></div>
				
			</div>
			
		</div>
	<?php } ?>
<?php } ?>
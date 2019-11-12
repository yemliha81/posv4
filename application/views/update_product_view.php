<style type="text/css">
	.pro_color{display:inline-block; width:30px; height:30px; cursor:pointer;box-sizing:border-box;}
	.actBox{border:1px solid #000;}
	.myPanel{}
	.myPanelHeader{padding:10px; background:#666; color:#fff;}
	.myPanelBody{padding:10px;}
	.proOpts{position:relative;background:#666; color:#fff; margin-right:10px; display:inline-block; padding:15px;text-align:center; line-height:1;
	font-size:15px;}
	.optRemove{position:absolute; top:0; right:0; width:18px; height:18px; background:red; color:#fff;}
</style>
<div class="col-xs-12" style="">
	
<div class="">
	<form id="updProForm" action="<?php echo UPDATE_PRODUCT_POST;?>" method="post" enctype="multipart/form-data">
	<div class="">
		<div class="row mB15 borderB bg4" style="padding:15px 0;">
			<div class="col-sm-6">
				<span class="inputTitle2">ÜRÜN GÜNCELLEME</span>
			</div>
			<div class="col-sm-6">
				<span class="inputTitle2 pull-right"><?php echo 'ÜRÜN ID : '.$product['pro_id']. ' / '.$product['pro_name'];?></span>
			</div>
		</div>
	</div>
	<div class="deleted_info text-center" style="font-size:24px; line-height:1; padding:20px;"></div>
	<div class="">

		  <div class="tab-content">
			<div id="home" class="tab-pane fade in active">
			    <div class="row pB15 mB15 borderB">
					<div class="col-sm-3">
						<span class="inputTitle">ÜRÜN GRUBU</span>
					</div>
					<div class="col-sm-9">
						<select name="cat_id" class="select2 form-control" >
							<?php foreach($cats as $key => $val){ ?>
								<option value="<?php echo $val['cat_id'];?>" <?php if($cat['cat_id'] == $val['cat_id']){echo 'selected';} ?>>
									<?php echo $val['cat_name'];?>
								</option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="row pB15 mB15 borderB">
					<div class="col-sm-3">
						<span class="inputTitle">ÜRÜN GÖRSELİ</span>
					</div>
					<div class="col-sm-9">
						<div>
							<?php if(!empty($product['pro_img'])){ ?>
								<img src="<?php echo FATHER_BASE.'img/products/'.$product['pro_img'];?>" width="150" />
							<?php } ?>
						</div>
						<!--<input type="file" class="form-control" name="pro_img"/>-->
					</div>
				</div>
				<div class="row pB15 mB15 borderB">
					<div class="col-sm-3">
						<span class="inputTitle">ÜRÜN ADI</span>
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="pro_name" value="<?php echo $product['pro_name'];?>"/>
					</div>
				</div>
				<div class="row pB15 mB15 borderB">
					<div class="col-sm-3">
						<span class="inputTitle">ÜRÜN AÇIKLAMA</span>
					</div>
					<div class="col-sm-9">
						<textarea name="pro_description" class="form-control" rows="3"><?php echo $product['pro_description'];?></textarea>
					</div>
				</div>
				<div class="row pB15 mB15 borderB">
					<div class="col-sm-3">
						<span class="inputTitle">ÜRÜN BİRİMİ</span>
					</div>
					<div class="col-sm-9">
						<?php //debug($product);?>
						<?php if(!empty($check)){ ?>
							<?php if($product['unitTypes'] == 'kg'){ ?>
								<?php $uTypes  = '<option value="kg">Kg - Gr</option>';?>
							<?php } ?>
							<?php if($product['unitTypes'] == 'lt'){ ?>
								<?php $uTypes  = '<option value="lt">Lt - Cl</option>';?>
							<?php } ?>
							<?php if($product['unitTypes'] == 'adet'){ ?>
								<?php $uTypes  = '<option value="adet">Adet</option>';?>
							<?php } ?>
								<select name="unitTypes" class="select2 form-control">
									<?php echo $uTypes;?>
								</select>
								<div style="margin-top:10px;">
									 <span style="color:#C91F30"> <i class="fa fa-exclamation-triangle"></i> Satın alma, satış veya reçete bilgisi kayıtlı olduğu için değiştirilemez. </span><br />
									 Bu alanı değiştirmek isterseniz destek departmanı ile iletişime geçiniz.
								</div>
						<?php } else{ ?>
							<select name="unitTypes" class="select2 form-control">
								<option value="" >Seçiniz</option>
								<option value="adet" <?php if($product['unitTypes'] == 'adet'){ echo 'selected'; } ?> >Adet</option>
								<option value="kg" <?php if($product['unitTypes'] == 'kg'){ echo 'selected'; }?> >Kg - Gr</option>
								<option value="lt" <?php if($product['unitTypes'] == 'lt'){ echo 'selected'; }?> >Lt - Cl</option>
							</select>
						<?php } ?>
						
					</div>
				</div>
				<div class="row pB15 mB15 borderB">
					<div class="col-sm-3">
						<span class="inputTitle">KDV ORANI %</span>
					</div>
					<div class="col-sm-9">
						<select name="kdv" class="form-control select2" >
							<option value="">Seçiniz</option>
							<option value="18" <?php if( $product['kdv'] == '18' ){ echo 'selected'; }?>>18</option>
							<option value="8" <?php if( $product['kdv'] == '8' ){ echo 'selected'; }?>>8</option>
							<option value="1" <?php if( $product['kdv'] == '1' ){ echo 'selected'; }?>>1</option>
							<option value="0" <?php if( $product['kdv'] == '0' ){ echo 'selected'; }?>>0</option>
							
						</select>
					</div>
				</div>
				
				
				<input type="hidden" name="pro_id" value="<?php echo $product['pro_id'];?>" />
				<!--<div class="row pB15 borderB">
					<div class="col-sm-3">
						<span class="inputTitle">SATIŞ EKRANI RENGİ</span>
					</div>
					<div class="col-sm-9">
						<input type="color" class="colorP" name="pro_bg" value="<?php echo $product['pro_bg'];?>"/>
					</div>
				</div>-->
				
			
				<div class="porsDiv">
				
				<div class="row borderB" style="padding:15px 0;background:#bbb;">
					<div class="col-sm-3">
						<span class="inputTitle2">PORSİYON BİLGİSİ</span>
					</div>
					<div class="col-sm-9">
						<a href="javascript:;" class="butonFile addPors pull-right" style="width:110px;white-space:nowrap;">PORSİYON <i class="fa fa-plus"></i></a>
					</div>
				</div>
				
				<?php if(!empty($pro_options)){ ?>
			
					
					<?php foreach($pro_options as $key => $val){ ?>
						<div class="row borderB" style="padding:8px 0 6px 0; background:#eee;">
							<div class="col-sm-3" style="padding-top:3px;">
								<span class="inputTitle2"><?php echo $key+1;?>. PORSİYON BİLGİSİ</span>
							</div>
							<div class="col-sm-8">
								
								<div class="row porsRow">
									<div class="col-sm-5" style="padding-right:5px;">
										<input type="text" class="form-control" name="porsions[]" value="<?php echo $val['porsion_name'];?>" />
									</div>
									<div class="col-sm-4" style="padding-left:5px;">
										<input type="text" class="form-control" readonly name="porsion_price[]" value="<?php echo $val['porsion_price'];?>" />
										<input type="hidden" class="form-control" readonly name="porsion_id[]" value="<?php echo $val['id'];?>" />
									</div>
									<div class="col-sm-3">
										<a href="javascript:;" class="butonFile recipe pull-right" style="width:110px;" rel="<?php echo $val['id'];?>">REÇETE</a>
									</div>
								</div>
							</div>
							<div class="col-xs-1">
								<a href="javascript:;" class="delPorsion btn btn-sm btn-danger pull-right" rel="<?php echo $val['id'];?>"><i class="fa fa-trash"></i></a>
							</div>
						</div>
						
						<div class="rcp recipe_<?php echo $val['id'];?> row mB15 borderB" style="display:none; padding:0 10px;">
							<div class="row borderB" style="padding:5px">
								<div class="col-sm-12 text-center" style="">
									<span class="inputTitle" style="padding-top:10px;"><?php echo $key+1;?>. PORSİYONUN REÇETESİ</span>
								
									<a href="javascript:;" class="butonFile pull-right addRecipeRow" style="width:110px;white-space:nowrap;" rel="<?php echo $val['id'];?>">ÜRÜN EKLE </a>
								</div>
							</div>
							<div class="">
							
							<div class="row" style="padding:5px;">
								<div class="col-sm-3">
									
								</div>
								<div class="col-sm-9">
									<div class="row">
										<div class="col-sm-4">
											ÜRÜN ADI
										</div>
										<div class="col-sm-2">
											BİRİM
										</div>
										<div class="col-sm-2">
											 FİRE(%)
										</div>
										<div class="col-sm-3">
											 MİKTAR
										</div>
										<div class="col-sm-1">
											<a href="javascript:;" class="delPrx btn btn-sm btn-danger pull-right" rel="<?php echo $vv['id'];?>"><i class="fa fa-trash"></i></a>
										</div>
									</div>
								</div>
								
							</div>
							
								<?php if(!empty($val['recipe'])){ ?>
									<?php foreach($val['recipe'] as $kk => $vv){ ?>
										<div class="row" style="padding:5px;">
											<div class="col-sm-3">
												<span class="inputTitle"><?php echo $kk+1;?>. ÜRÜN BİLGİSİ</span>
											</div>
											<div class="col-sm-9">
												<div class="row">
													<div class="col-sm-4">
														<input type="text" autocomplete="off" required class="pr_namex form-control" rel="<?php echo $val['id'];?>" name="recipe[<?php echo $val['id'];?>][pro][]" placeholder="Malzeme" value="<?php echo $vv['pro_name'];?>"/>
														<input type="hidden" class="pr_id_<?php echo $val['id'];?> form-control prid" name="recipe[<?php echo $val['id'];?>][pro_id][]" placeholder="Malzeme" value="<?php echo $vv['c_pro_id'];?>"/>
													</div>
													<div class="col-sm-2">
														<select  name="recipe[<?php echo $val['id'];?>][unit][]" required class="form-control select2">
															<?php if($vv['unit'] == 'adet'){ ?>
																<option value="adet"  >Adet</option>
															<?php }?>
															<?php if($vv['unit'] == 'kg'){ ?>
																<option value="kg" <?php if($vv['unit'] == 'kg'){ echo 'selected';}?> >Kg</option>
																<option value="gr" <?php if($vv['unit'] == 'gr'){ echo 'selected';}?> >Gr</option>
															<?php }?>
															<?php if($vv['unit'] == 'lt'){ ?>
																<option value="lt" <?php if($vv['unit'] == 'lt'){ echo 'selected';}?> >L</option>
																<option value="cl" <?php if($vv['unit'] == 'cl'){ echo 'selected';}?> >cL</option>
															<?php }?>
															
															
														</select>
														
													</div>
													<div class="col-sm-2">
														 <input type="text" required class="form-control" name="recipe[<?php echo $val['id'];?>][loss][]" value="<?php echo $vv['loss'];?>"/>
													</div>
													<div class="col-sm-3">
														 <input type="text" required class="form-control" name="recipe[<?php echo $val['id'];?>][qty][]" value="<?php echo $vv['qty'];?>"/>
													</div>
													<div class="col-sm-1">
														<a href="javascript:;" class="delPrx btn btn-sm btn-danger pull-right" rel="<?php echo $vv['id'];?>"><i class="fa fa-trash"></i></a>
													</div>
												</div>
											</div>
											
										</div>
									<?php } ?>
								<?php } ?>
							</div>
							
						</div>
					
					<?php } ?>
			
				
			
			<?php } ?>
			</div>
			
			<div class="optionDiv">
				<div class="row borderB" style="padding:15px 0;background:#bbb;">
					<div class="col-sm-3">
						<span class="inputTitle2">SEÇENEKLİ ÜRÜN</span>
					</div>
					<div class="col-sm-9">
						<a href="javascript:;" class="butonFile addOptionGroup pull-right" style="width:110px;white-space:nowrap;">GRUP <i class="fa fa-plus"></i></a>
					</div>
				</div>
				<?php if(!empty($optionGroups)){ ?>
					<?php foreach($optionGroups as $key => $val){ ?>
						<div class="optionRow_<?php echo $val['og_id'];?> row borderB" style="padding:8px 0 6px 0; background:#eee;">
							<div class="col-sm-3" style="padding-top:3px;">
								<span class="inputTitle2"><?php echo $key+1;?>. SEÇENEK GRUBU</span>
							</div>
							<div class="col-sm-8">
								<div class="row porsRow">
									<div class="col-sm-5" style="padding-right:5px;">
										<input type="text" class="form-control bold" disabled name="og_name[]" value="<?php echo $val['og_name'];?>" />
									</div>
									<div class="col-sm-4" style="padding-left:5px;">
										<input type="hidden" class="form-control" readonly name="og_id[]" value="<?php echo $val['og_id'];?>" />
									</div>
									<div class="col-sm-3">
										<a href="javascript:;" class="butonFile addOptionRow pull-right" style="width:110px;" rel="<?php echo $val['og_id'];?>">SEÇENEK</a>
									</div>
								</div>
							</div>
							<div class="col-xs-1">
								<a href="javascript:;" class="delOptionGroup btn btn-sm btn-danger pull-right" rel="<?php echo $val['id'];?>"><i class="fa fa-trash"></i></a>
							</div>
							<div class="">
								<?php if(!empty($val['options'])){ ?>
									<?php foreach($val['options'] as $kk => $vv){ ?>
										<div class="row" style="padding:0 15px;">
												<div class="col-sm-3">
													<span class="inputTitle"><?php echo $kk+1;?>. ÜRÜN BİLGİSİ</span>
												</div>
												<div class="col-sm-8">
													<div class="row">
														<div class="col-sm-5" style="padding-right:5px;">
															<input type="text" autocomplete="off" disabled class="pr_namex form-control bold" rel="<?php echo $val['option_id'];?>" name="optPro[<?php echo $val['og_id'];?>][pro][]" value="<?php echo $vv['pro_name'];?>"/>
															<input type="hidden" class="pr_id_<?php echo $val['option_id'];?> prid" name="optPro[<?php echo $val['og_id'];?>][pro_id][]" value="<?php echo $vv['pro_id'];?>"/>
														</div>
														<div class="col-sm-1">
															<a href="javascript:;" class="delOptPro btn btn-sm btn-danger pull-right" rel="<?php echo $vv['option_id'];?>"><i class="fa fa-trash"></i></a>
														</div>
													</div>
												</div>
												
											</div>
									<?php }?>
								<?php }?>
							</div>
							
						</div>
					<?php } ?>
				<?php } ?>
			</div>
			
			
			</div>
		  </div>
		  <div class="row bg4" style="padding:15px 0;">
			<div class="col-sm-6">
			<span style="width:110px;" id="<?php echo $cat['cat_id'];?>_<?php echo $product['pro_id'];?>" class="removePro butonFile" pro_id="<?php echo $product['pro_id'];?>" cat_id="<?php echo $cat['cat_id'];?>"> <i class="fa fa-trash"></i> SİL</span>
			</div>
			<div class="col-sm-6">
				<span class="pull-right">
					<a type="button" class="butonX1 saveX text-center" pro_id="<?php echo $product['pro_id'];?>" href="javascript:;" style="width:111px;">GÜNCELLE</a>
				</span>
			</div>
		</div>
	
				
	
	</div>
	</form>	
</div>
</div>

<style type="text/css">
	.pro_color{display:inline-block; width:30px; height:30px; cursor:pointer;box-sizing:border-box;}
	.actBox{border:1px solid #000;}
	.myPanel{}
	.myPanelHeader{padding:10px; background:#666; color:#fff;}
	.myPanelBody{padding:10px;border:1px solid #ddd;}
	.proOpts{position:relative;background:#666; color:#fff; margin-right:10px; display:inline-block; padding:15px;text-align:center; line-height:1;
	font-size:15px;}
	.optRemove{position:absolute; top:0; right:0; width:18px; height:18px; background:red; color:#fff;}
</style>
<div class="col-xs-12" style="padding:15px;">
<div class="panel panel-flat">
	<div class="panel-heading">
		<h5 class="panel-title">Ürün Ekleme<a class="heading-elements-toggle"><i class="icon-more"></i></a></h5>
	</div>

	<div class="panel-body">
		<form action="<?php echo ADD_PRODUCT_POST;?>" method="post">
			<div class="form-group">
				<label>Ürün Adı:</label>
				<input type="text" class="form-control" name="pro_name" value=""/>
			</div>

			<div class="form-group">
				<label>Kdv Oranı % :</label>
				<select name="kdv" class="form-control" required>
					<option value="">Seçiniz</option>
					<option value="8" <?php if( $product['kdv'] == '8' ){ echo 'selected'; }?>>8</option>
					<option value="18" <?php if( $product['kdv'] == '18' ){ echo 'selected'; }?>>18</option>
					
				</select>
			</div>

			
			<div class="form-group">
				<label class="display-block">Ürün Rengi:</label>
				<span class="pro_color" style="background:#ed6f6f;" bg="#ed6f6f"></span>
				<span class="pro_color" style="background:#ba5151;" bg="#ba5151"></span>
				<span class="pro_color" style="background:#893232;" bg="#893232"></span>
				<span class="pro_color" style="background:#bb6fe8;" bg="#bb6fe8"></span>
				<span class="pro_color" style="background:#8c4faf;" bg="#8c4faf"></span>
				<span class="pro_color" style="background:#63337f;" bg="#63337f"></span>
				<span class="pro_color" style="background:#629be0;" bg="#629be0"></span>
				<span class="pro_color" style="background:#4675af;" bg="#4675af"></span>
				<span class="pro_color" style="background:#345a89;" bg="#345a89"></span>
				<span class="pro_color" style="background:#44d6a3;" bg="#44d6a3"></span>
				<span class="pro_color" style="background:#34ad82;" bg="#34ad82"></span>
				<span class="pro_color" style="background:#247c5d;" bg="#247c5d"></span>
				<input type="hidden" class="pro_bg" name="pro_bg" value="" />
				
			</div>
			<div class="form-group porsDiv">
				<label>Porsiyon Ekle</label>
				<div class="row porsRow">
					<div class="col-sm-6" style="padding-right:5px;">
						<input type="text" class="form-control" name="porsions[]" placeholder="Porsiyon Adı" value="Adet"/>
					</div>
					<div class="col-sm-6" style="padding-left:5px;">
						<input type="text" class="form-control hidden" name="porsion_price[]" placeholder="Fiyat" value="0.00"/>
					</div>
				</div>
			</div>
			<div class="text-right">
				<a href="javascript:;" class="btn btn-xs btn-info addPors">Porsiyon <i class="fa fa-plus"></i></a>
			</div>
			<!--<div class="form-group">
				<label>Satış Ekranında Gösterilsin mi?</label>
				<select name="onSale" class="form-control" required>
					<option value="">Seçiniz</option>
					<option value="1">Göster</option>
					<option value="0">Gösterme</option>
				</select>
			</div>-->
			
			<!--<div class="form-group">
				<label>Stok Takibi Yapılsın mı?</label>
				<select name="keepStock" class="form-control" required>
					<option value="">Seçiniz</option>
					<option value="1">Evet</option>
					<option value="0">Hayır</option>
				</select>
			</div>-->
			<input type="hidden" name="cat_id" class="pro_cat_id" value="<?php echo $cat_id;?>"/>
			<div class="text-right">
				<button type="submit" class="btn btn-primary">Kaydet <i class="icon-arrow-right14 position-right"></i></button>
			</div>
		</form>
	</div>
</div>
<div id="optionModal" class="optModal modal fade" role="dialog">
  <div class="modal-dialog">

   
    <div class="modal-content">
	<div class="modal-header">
		<a href="javascript:;" class="clsOptMdl btn btn-danger pull-right">Kapat</a>
	</div>
      <div class="modal-body">
	  <form id="optForm">
			<input type="hidden" class="prId" name="pro_id" value="<?php echo $product['pro_id'];?>"/>
		 
			<?php foreach($options as $key => $val){ ?>
			<?php if(!empty($pro_options)){ ?>
				<?php foreach($pro_options as $kk => $vv){ ?>
					<?php if($val['option_id'] == $vv['option_id']){ ?>
						<?php $options[$key]['op_price'] = $vv['option_price'];?>
					<?php } ?>
				<?php } ?>
			<?php }?>
				<p>
					<div class="row">
						<div class="col-xs-3"><?php echo $val['option_name'];?></div>
						<div class="col-xs-7">
							<input type="text" name="option_price[]" class="form-control" value="<?php echo $options[$key]['op_price'];?>"/>
							<input type="hidden" name="option_ids[]" value="<?php echo $val['option_id'];?>" />
						</div>
						<div class="col-xs-2"></div>
					</div>
				</p>
				
			<?php } ?>
			<p>
				<a href="javascript:;" class="btn btn-sm btn-success updateOptions">Kaydet</a>
				
			</p>
		 </form>
      </div>
    </div>

  </div>
</div>
</div>

<div class="row">
	<form action="<?php echo UPDATE_PRO_IMG_POST;?>" method="post" enctype="multipart/form-data">
		<p class="text-center borderB">
			<b>GÖRSEL YÜKLE</b> <br /> <br />
		</p>
		<p  class="">
		
			<div class="">
				<div class="col-xs-4">
					<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; ÜRÜN ADI</span>
				</div>
				<div class="col-xs-8">
					<?php echo $pro['pro_name'];?>
				</div>
				<div class="clearfix"></div>
			</div>
			
		
		</p>
		<p class="borderB">
			<div class="">
				<div class="col-xs-4">
					<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-camera"></i> &nbsp;&nbsp; ÜRÜN GÖRSELİ</span>
				</div>
				<div class="col-xs-8">
					<img src="<?php echo FATHER_BASE;?>img/products/<?php echo $pro['pro_img'];?>" alt="" />
					<input type="file" name="pro_img" />
				</div>
				<div class="clearfix"></div>
			</div>
		</p>
		<p class="borderB">
		<div class="">
			<div class="col-xs-6">
				<a href="javascript:;" class="butonFile delImg" style="width:110px; text-align-center;" imgname="<?php echo $pro['pro_img'];?>"> <i class="fa fa-trash"></i> SİL</a>
			</div>
			<div class="col-xs-6">
			<input type="submit" class="butonX1 pull-right" value="KAYDET" style="width:110px; text-align-center;"/>
			</div>
			<div class="clearfix"></div>
		</div>
			
		</p>
	</form>
</div>
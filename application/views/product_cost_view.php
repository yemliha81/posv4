<?php include('includes/header-order.php');?>
<style type="text/css">
	.backToHome{font-size:20px;display:inline-block; line-height:1;padding:15px 25px; background:#4972B7; color:#fff;}
	.cat_btn{font-size:15px;margin-bottom:5px;}
	.cat_name{border:1px solid #ddd;}
	.cat_name:hover{background:#f7f7b9;border:1px solid #ddd;}
	.pro_boxx{position:relative;}
	.products_box{border:1px solid #ddd; margin-bottom:10px; padding:5px;}
	.removePro{}
	.tab_cat{display:none;}
	.cats_names{line-height:1;font-weight:bold; border-bottom:1px solid #ddd; padding:8px;}
	.cats_btns{font-size:13px;line-height:1; padding:8px;background:#f4f4f4;}
	.porsDiv{}
	.optDiv{cursor:pointer;padding:3px;font-weight:bold;}
	.optDiv:hover{background:#efefef;}
	.bold{font-weight:bold;}
	.unt{display:inline-block; width:100px;text-transform:uppercase;font-weight:bold;}
	@media print{
		.left1{display:none;}
		.left2{position:relative; width:100%; left:0;}
	}
</style>

<div class="left1">
	<?php include('includes/left_menu.php');?>
</div> 

<div class="left2">
	<div class="top">
		<div>
			<a href="javascript:;" class="tglM" style="position:fixed;top:0; right:0;  z-index:99999999; background:#666; color:#fff; padding:15px;">
				<i class="fas fa-bars fa-2x"></i>
			</a>
		</div>
		<div>
			<div class="col-xs-12">
			<div class="row">
				<div class="col-sm-9">
					<span class="pageTitle">Reçeteli Maliyet Tablosu</span>
				</div>
				<div class="col-sm-3" style="padding-top:25px;">
					<a href="#" class="butonX1 text-center" style="width:100%;" onclick="window.print()" >YAZDIR</a>
				</div>
			</div>
				
			</div>
		</div>
	</div>
	
	
	<div class="mainContainer"style="padding:0 15px;">
	
		<div class="whiteZone f13" style="">
			<?php foreach($porsions as $key => $val){ ?>
				<div style="font-weight:bold; font-size:20px; padding:15px 0;text-align:center; background:#F1EEAB;">
					<div class="row">
						<div class="col-xs-3 text-left">
							&nbsp;&nbsp;<a href="<?php echo PRINT_COST.$val['id'];?>" class="butonX1 ">EXCELE AKTAR</a> 
						</div>
						<div class="col-xs-6"> <?php echo $val['pro_name'].' '.$val['porsion_name'];?></div>
						<div class="col-xs-3"></div>
					</div>
				</div>
				<div style="font-weight:bold;  padding:15px;background:#F2F2F2;">
					<div class="row">
						<div class="col-xs-4">
							<b>Porsiyon 1 Ad.</b>
						</div>
						<div class="col-xs-4">
							<b>Net Satış Fiyatı : </b> <?php echo $val['porsion_price'];?>
						</div>
						<div class="col-xs-4">
							<b>Birim Maliyet : </b> <span class="price_<?php echo $key;?>"></span>
						</div>
					</div>
				</div>
				<table class="table">
					<tr>
						<td><b>Ürün</b></td>
						<td><b>Miktar</b></td>
						<td><b>Fire</b></td>
						<td><b>Fire Dahil M.</b></td>
						<td><b>Birim</b></td>
						<td><b>Birim Fiyat</b></td>
						<td><b>Tutar</b></td>
					</tr>
					<?php $i=0; foreach($val['recipe'] as $kk => $vv){ ?>
						<tr>
							<td><?php echo $vv['pro_name'];?></td>
							<td><?php echo $vv['qty'];?></td>
							<td>%<?php echo $vv['loss'];?></td>
							<td><?php echo $vv['qty'] + (($vv['qty']/100)*$vv['loss']);?></td>
							<td><?php echo $vv['unit'];?></td>
							<td><?php echo $vv['cost'];?></td>
							<td><?php echo $vv['cost']*($vv['qty'] + (($vv['qty']/100)*$vv['loss']));?></td>
						</tr>
						<?php $unit[$vv['unit']] += $vv['qty'];?>
						<?php $total_cost += number_format(($vv['cost']*($vv['qty'] + (($vv['qty']/100)*$vv['loss']))),2);?>
					<?php $i++ ; } ?>
					
				
					<tr style="background:#ADD8E6;">
						<td><b>Kalem Adedi : <?php echo $i;?></b></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td><b>Toplam :</b> </td>
						<td><b><span class="tott" rel="<?php echo $key;?>"><?php echo $total_cost;?></span></b></td>
					</tr>
					<tr style="background:#F1EEAB;">
						<td><b>Birim Toplamları : </b></td>
						<td><?php foreach($unit as $kkk => $vvv){ echo '<span class="unt">'.substr($kkk,0,2).'</span> : <span class="unt">'.$vvv .'</span><br/>'; }?></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</table>
			<hr/>
			
			<?php } ?>
			
			
			
		</div>
	</div>
</div>
<?php include('includes/footer-order.php');?>
<script>
	$(document).ready(function(){
		$(".tott").each(function(){
			var pr = $(this).text();
			var rel = $(this).attr("rel");
			$(".price_"+rel).text(pr);
			//alert(pr);
		});
	});
</script>
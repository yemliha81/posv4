<?php include('includes/header-order.php');?>
<?php 
	function status($id){
		if($id == '0'){ $status = 'Beklemede'; }
		if($id == '1'){ $status = 'Onaylandı'; }
		if($id == '2'){ $status = 'Teslimatta'; }
		if($id == '3'){ $status = 'Teslim edildi'; }
		if($id == '4'){ $status = 'Reddedildi'; }
		return $status;
	} 
	function pt($type){
		if($type == 'cc'){
			return 'Kredi Kartı';
		}
		if($type == 'cash'){
			return 'Nakit';
		}
		if($type == 'meal'){
			return 'Yemek Kartı';
		}
	} 
?>
<style type="text/css">
	.xLabel{padding:15px; border:1px solid #ddd; margin-bottom:5px;width:100%;cursor:pointer;text-align:center;font-weight:bold;}
	.xLact{background:#ddd;}
</style>
<div class="left1">
	<?php include('includes/left_menu.php');?>
</div> 
<div class="left2">
	<div class="top">
		<div >
			<a href="javascript:;" class="tglM" style="position:fixed;top:0; right:0;  z-index:99999999; background:#666; color:#fff; padding:15px;">
				<i class="fas fa-bars fa-2x"></i>
			</a>
		</div>
		<div>
			<div class="col-xs-12">
			<div class="row">
				<div class="col-sm-6">
					<span class="pageTitle">Online Sipariş</span>
				</div>
				<div class="col-sm-6">
					
				</div>
			</div>
				
			</div>
		</div>
	</div>
	
	
	<div class="mainContainer"style="padding:0 15px;">
	
		<div class="whiteZone f13" style="">
			
			<div class="row">
			<div class="col-sm-8">
			<div>
				<span class="pull-right" style="font-size:32px;"><b>Toplam : <?php echo $order['total_price'];?> ₺</b></span>
			</div>
			<div>
				<a href="javascript:;" data-toggle="modal" data-target="#reportModal" class="butonX1" 
				customer_id="<?php echo $order['customer_id'];?>" order_id="<?php echo $order['order_id'];?>" address_id="<?php echo $order['address_id'];?>"
				>KURYE FİŞİ YAZDIR</a>
			</div>
				<table class="table table-hover">
					<thead>
						<tr>
							<td><b>Ürün</b></td>
							<td><b>Adet</b></td>
							<td><b>Fiyat</b></td>
						</tr>
					</thead>
					<tbody>
					<?php foreach($order_details as $key => $val){ ?>
						<tr>
							<td><?php echo $val['pro_name'];?></td>
							<td><?php echo $val['qty'];?></td>
							<td><?php echo $val['price'];?></td>
						</tr>
					<?php } ?>
					</tbody>
				</table>
				<div class="clearfix"></div>
				
			</div>
			<div class="col-sm-4">
				<div style="border:1px solid #ddd;">
					
					<table class="table">
						<tr style="border-bottom:1px solid #ddd;">
							<td><b style="white-space:nowrap;">Sipariş Tarihi:</b></td>
							<td><span><?php echo date("d-m-Y H:i", $order['order_insert_time']);?></span></td>
						</tr>
						<tr>
							<td><b>Ad Soyad:</b></td>
							<td><span><?php echo $customer['full_name'];?></span></td>
						</tr>
						<tr>
							<td><b>Adres:</b></td>
							<td><?php echo $address['address_name'];?></td>
						</tr>
						<tr>
							<td></td>
							<td><span><?php echo $address['address'] ;?></span></td>
						</tr>
						<tr>
							<td><b>Mah: </b></td>
							<td><?php echo $address['DistrictName'] ;?></td>
						</tr>
						<tr>
							<td><b>İlçe: </b></td>
							<td><?php echo $address['TownName'] ;?></td>
						</tr>
						<tr>
							<td><b>İl: </b></td>
							<td><?php echo $address['CityName'] ;?></td>
						</tr>
						<tr>
							<td><b>Telefon:</b></td>
							<td><span><?php echo $customer['phone'];?></span></td>
						</tr>
						<tr>
							<td><b style="white-space:nowrap;">Sipariş Durumu:</b></td>
							<td><span><?php echo status($order['status']);?></span></td>
						</tr>
						<tr>
							<td><b style="white-space:nowrap;">Ödeme Tipi:</b></td>
							<td><span><?php echo pt($order['payment_type']);?></span></td>
						</tr>
						<?php if($order['status'] == '3'){ ?>
							<?php if(empty($payment)){ ?>
							<tr>
								<td><b style="white-space:nowrap;">Tahsilat Kapama:</b></td>
								<td>
									<select name="payment_type" class="paymentSelect form-control select2">
										<?php foreach($payment_types as $key => $val){ ?>
											<?php if($settings[$val['payment_code']] == '1'){ ?>
												<?php if($val['payment_code'] != 'point'){ ?>
													<option rel="<?php echo $key;?>" value="<?php echo $val['rel'];?>">
														<?php echo $val['payment_name'];?>
													</option>
												<?php } ?>
											<?php } ?>
										<?php } ?>
									</select>
									<?php foreach($payment_types as $key => $val){ ?>
										<?php if($settings[$val['payment_code']] == '1'){ ?>
											<?php if(!empty($val['sub_payment_types'])){ ?>
												<div class="pTab t_<?php echo $key;?>" style="display:none;margin-top:5px;">
												<select name="p_sub[<?php echo $val['payment_id'];?>]" class="p_sub_id form-control select2">
														<?php foreach($val['sub_payment_types'] as $kk => $vv){ ?>
															<option value="<?php echo $vv['payment_sub_id'];?>">
																<?php echo $vv['payment_subname'];?>
															</option>
														<?php } ?>
													</select>
												</div>
											<?php } ?>
										<?php } ?>
									<?php } ?>
									
									<input type="hidden" class="ord" value="<?php echo $order['order_id'];?>" />
								</td>
							</tr>
							<?php } ?>
						<?php }else{ ?>
						<tr>
							<td><b style="white-space:nowrap;">Sipariş Durumu:</b></td>
							<td>
								<select name="status" class="form-control status">
									<option value="">Seçiniz</option>
									<option value="1">Onaylandı</option>
									<option value="4">Reddedildi</option>
									<option value="2">Teslimatta</option>
									<option value="3">Teslim edildi</option>
								</select>
								<input type="hidden" class="ord" value="<?php echo $order['order_id'];?>" />
							</td>
						</tr>
						<?php } ?>
						
					</table>
					<?php if(empty($payment)){ ?>
						<div style="padding:10px;">
							<?php if($order['status'] == '3'){ ?>
								<a href="javascript:;" class=" text-center w100 butonX1 closeOrder pull-right">KURYE İLE HESABI KAPAT</a>
							<?php }else{ ?>
								<a href="javascript:;" class="text-center w100 butonX1 updOrder pull-right">GÜNCELLE</a>
							<?php } ?>
							<div class="clearfix"></div>
						</div>
					<?php } ?>
				</div>
				
			</div>
			</div>
		</div>
	</div>
</div>

<div id="reportModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
		  <div class="row">
			<p class="text-center borderB">
				<b>YAZICI SEÇİMİ</b> <br /> <br />
			</p>
		  </div>
			<div>
				<form id="printPack">
					<?php foreach($printers as $key => $val){ ?>
						
						<label for="pr<?php echo $key;?>" class="xLabel">
							<?php echo $val['printer_name'];?>
							<input class="hidden" id="pr<?php echo $key;?>" type="radio" name="printer" value="<?php echo $val['printer_ip'];?>" />
						</label>
					<?php } ?>
					<input type="hidden" name="order_id" value="<?php echo $order['order_id'];?>" />
					<input type="hidden" name="customer_id" value="<?php echo $order['customer_id'];?>" />
					<input type="hidden" name="address_id" value="<?php echo $order['address_id'];?>" />
					<a href="javascript:;" class="btn btn-success form-control sendToPrinter" data-dismiss="modal"><b>YAZDIR</b></a>
				</form>
			</div>
      </div>
    </div>

  </div>
</div>
		
<?php include('includes/footer-order.php');?>
<script type="text/javascript">
	$(".xLabel").change(function(){
		$(".xLabel").removeClass("xLact");
		$(this).addClass("xLact");
	});
	$(".sendToPrinter").click(function(){
		var dataX = $("#printPack").serialize();
		console.log(dataX);
		
		$.ajax({
			type : "post",
			data : dataX,
			url : "<?php echo SEND_TO_PRINTER_PACK;?>",
			success : function(response){
				console.log(response);
			}
		});
		
	});


	$(".updOrder").click(function(){
		var status = $(".status").val();
		var order_id = $(".ord").val();
		$.ajax({
			type : 'post',
			url : '<?php echo UPDATE_ORDER_STATUS;?>',
			data : { "status" : status, "order_id" : order_id },
			success : function(response){
				if(response == 'success'){
					swal("","Güncelleme Başarılı!","success");
					location.reload();
				}else{
					swal("Hata!","","error");
				}
			}
		});
	}); 
	$(".closeOrder").click(function(){
		var total_price = '<?php echo $order['total_price'];?>';
		var cust_id = '<?php echo $order['customer_id'];?>';
		var payment_type = $(".paymentSelect").val();
		var sub_p_id = $(".p_sub_id").val();
		var order_id = $(".ord").val();
		$.ajax({
			type : 'post',
			url : '<?php echo CLOSE_ORDER;?>',
			data : { "total_price" : total_price, "cust_id" : cust_id, "payment_type" : payment_type, "sub_p_id" : sub_p_id, "order_id" : order_id },
			success : function(response){
				if(response == 'success'){
					swal("","Ödeme Kaydedilmiştir","success");
					setTimeout(function(){
						location.reload();
					},1000);
				}
			}
		});
	});
	
	$(".paymentSelect").change(function(){
		var rel = $("option:selected", this).attr("rel");
		$(".pTab").hide();
		$(".t_"+rel).fadeIn();
	});
	
</script>
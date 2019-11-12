<?php include('includes/header.php');?>
<div class="container" style="margin-top:30px; margin-bottom:300px;">
	<div class="row">
		<div class="col-sm-9">
			<?php foreach($cats as $key => $val){ ?>
				<div class="cats_how_much">
					<h4><?php echo $val['cat_name'];?></h4> <hr/>
						<?php foreach($val['products'] as $kk => $vv){ ?>
							<div class="col-md-4 col-sm-6">
								<div class="pr_box">
									<div class="pro_img_div">
										<a href="javascript:;" class="prox" pro_name="<?php echo $vv['pro_name'];?>" pro_id="<?php echo $vv['pro_id'];?>" pro_price="<?php echo $vv['pro_price'];?>">
											<img src="<?php echo FATHER_BASE.'admin/img/products/'.$vv['pro_img'];?>" width="100%" alt="<?php echo $vv['pro_name'];?>"/>
										</a>
									</div>
									<div class="pr_name text-center">
										<div class="col-xs-6 text-left">
											<b><?php echo $vv['pro_name'];?></b>
										</div>
										<div class="col-xs-6 text-right">
											<?php echo $vv['pro_price'];?> <i class="fa fa-try"></i>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="clearfix"></div>
							</div>
						<?php } ?>
					<div class="clearfix"></div>
				</div>
			<?php } ?>
		</div>
	</div>
	<div class="calculate">
		<div id="cartDivx">
			<table class="table table-striped">
				<thead>
					<tr>
						<td>Ürün</td>
						<td>Adet</td>
						<td>Birim Fiyat</td>
						<td>Tutar</td>
					</tr>
				</thead>
				<tbody id="cartDiv"></tbody>
			</table>
		</div>
		<div id="">
			Toplam : <span id="total" style='font-size:22px; font-weight:bold;'>0.00 <i class="fa fa-try"></i></span> <span class=""><a href="javascript:;" class="btn btn-danger btn-sm empty">SIFIRLA</a></span>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
<?php include('includes/footer.php');?>
<script>
	$(document).ready(function(){
		cart = [];
		
		$('.prox').click(function(){
			var pro_id = parseInt($(this).attr('pro_id'));
			var pro_name = $(this).attr('pro_name');
			var pro_price = parseFloat($(this).attr('pro_price')).toFixed(2);
			
			
			var length = cart.length;
			if(length > 0){
					
				if( checkProduct(pro_id) == true){
					
					console.log("exists");
					
				}else{
					cart.push({
						pro_id : pro_id,
						qty : 1,
						pro_name : pro_name,
						pro_price : pro_price,
						total : pro_price
					});
					
				}
					
			}else{
				cart.push({
					pro_id : pro_id,
					qty : 1,
					pro_name : pro_name,
					pro_price : pro_price,
					total : pro_price
				});
			}
			
			updateCart();
			console.log(cart);
			//console.log(cart.length);
		});
		
		function checkProduct(pro_id){
			
			var length = cart.length;
			
			for (i = 0; i < length; i++){ 
				
				
				if( pro_id == cart[i].pro_id ){
					cart[i].qty ++;
					cart[i].total = parseFloat(cart[i].qty * cart[i].pro_price).toFixed(2);
					return true;
					//console.log("exists");
					break;
				}
			}
			
		}
		
		function updateCart(){
			
			var length = cart.length;
			var text = "";
			var total = "";
			for (i = 0; i < length; i++){ 
				
				text += "<tr><td>" + cart[i].pro_name + "</td><td>" +cart[i].qty+ "</td><td>" + cart[i].pro_price + "</td><td>"+ parseFloat(cart[i].qty * cart[i].pro_price).toFixed(2) +" <i class='fa fa-try'></i></td></tr>";
				
			}
			
			
			var total=0;
			for(i = 0; i < length; i++) { total += parseFloat(cart[i].total); }
			
			$("#cartDiv").html(text);
			$("#total").html(total+" <i class='fa fa-try'></i>");
			
		}
		
		$(".empty").click(function(){
			cart = [];
			$("#cartDiv").html("");
			$("#total").html("0.00 <i class='fa fa-try'></i>");
		});
		
		
	});
	
	
	
	
</script>
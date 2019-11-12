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
				<div class="col-sm-6">
					<span class="pageTitle"><?php echo $cat['cat_name'];?></span>
				</div>
				<div class="col-sm-6">
					
				</div>
			</div>
				
			</div>
		</div>
	</div>
	
	
	<div class="mainContainer"style="padding:0 15px;">
	
	<div class="srcDiv row" style="margin-bottom:15px;">
		<div class="col-sm-7">
			<input type="text" class="customSrc srcStyle srcTerm srcX" placeholder="Search..." />
		</div>
		<div class="col-sm-5">
			<div class="alert alert-info" style="padding:10px;">
				<i class="fa fa-exclamation-triangle" style="color:red"></i> <i> Fotoğrafları 300px - 200px ölçülerinde yükleyiniz.</i>
			</div>
		</div>
	</div>
	
		<div class="whiteZone f13" style="padding-right:0; padding-left:0;">
		
			<div class="">
				<table class="table">
								<thead>
									<tr>
										<th>#</th>
										<th>Ürün Adı</th>
										<th>Ürün Görsel</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($products as $kk => $vv){ ?>
										<tr  class="link_tr2 pro_boxx" data-toggle="modal" 
													data-target="#proModal" pro_id="<?php echo $vv['pro_id'];?>" >
											<td><?php echo $vv['pro_id'];?></td>
											<td>
												<?php echo $vv['pro_name'];?>
											</td>
											<td>
												<?php if(!empty( $vv['pro_img'] )){ ?>
													<img src="<?php echo FATHER_BASE.'img/products/'.$vv['pro_img'];?>" width="100px" />
												<?php } ?>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>			
				<div class="clearfix"></div>
			</div>

		</div>
	</div>
</div>

<div id="proModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body" >
		<div class="proRes"></div>
		<div class="clearfix"></div>
      </div>
    </div>

  </div>
</div>	

<?php include('includes/footer-order.php');?>
<script type="text/javascript">
	
	$(".srchPro").keyup(function(){
		$(".proResult").show();
		$(".proResult").html('<i class="fa fa-refresh fa-spin"></i>');
		var term = $(this).val().trim();
		if(term != ''){
			$.ajax({
				type : 'post',
				url : '<?php echo SRCH_PRO;?>',
				data : {'term' : term},
				success : function(response){
					$(".proResult").html(response);
				}
			});
		}else{
			$(".proResult").html('');
			$(".proResult").hide();
		}
	});
	
	$(".pro_boxx").click(function(){
		
		var pro_id = $(this).attr("pro_id");
		get_pro(pro_id);
		
	});
	
	function get_pro(pro_id){
		
		$(".proRes").html("yükleniyor... <i class='fa fa-refresh fa-spin'></i>");
		
		$.ajax({
			type : "get",
			url : "<?php echo GET_PRO2;?>"+pro_id,
			success : function(response){
				$(".proRes").html(response);
				$('.select2').select2();
			}
		});
		
		
		
	}
	
	$(".addPro").click(function(){
		var cat_id = $(this).attr("cat_id");
		add_pro(cat_id);
		
	});
	
	function add_pro(cat_id){
		
		$(".proRes").html("yükleniyor... <i class='fa fa-refresh fa-spin'></i>");
		
		$.ajax({
			type : "get",
			url : "<?php echo ADD_PRO;?>"+cat_id,
			success : function(response){
				$(".proRes").html(response);
			}
		});
		
	}
	
	
	$(document).on("click", ".removePro", function(){
		var id = $(this).attr("id");
		var pro_id = $(this).attr("pro_id");
		var cat_id = $(this).attr("cat_id");
		//$(this).parent().remove();
		$.ajax({
			type : "post",
			url : "<?php echo REMOVE_PRO;?>",
			data : {"pro_id" : pro_id, "cat_id" : cat_id},
			success : function(response){
				if(response == 'success'){
					$("#"+id).parent().parent().parent().fadeOut();
					$(".deleted_info").html("<span class='fa fa-exclamation-triangle' style='color:#C91F30; '></span> ÜRÜN SİLİNMİŞTİR");
				}else{
					alert("Satış veya Stok Bilgisi kayıtlı olduğu için silinemez!");
				}
			}
		});
		//alert("test");
	});
	
	$(document).on("click",".pro_color", function(){
		var pro_bg = $(this).attr("bg");
		$(".pro_color").removeClass("actBox");
		$(this).addClass("actBox");
		$(".pro_bg").val(pro_bg);
	});
	
	$(document).on("click",".delImg", function(){
		var img_name = $(this).attr("imgname");
		$.ajax({
			type : 'post',
			url : '<?php echo DELIMG;?>',
			data : { 'img_name' : img_name },
			success : function(response){
				if( response == 'success' ){
					swal("","Fotoğraf Silinmiştir","success");
					location.reload();
				}else{
					swal("","Hata oluştu!","error");
				}
			}
		});
	});
	
	$(document).on("click",".optRemove", function(){
		var rel = $(this).attr("rel");
		var pro_id = $(this).attr("pro_id");
		$.ajax({
			type : "get",
			url : "<?php echo DEL_OPT;?>"+rel+'/'+pro_id,
			success : function(response){
				if(response == 'success'){
					get_pro(pro_id);
				}
			}
		});
	});
	
	$(document).on("click",".updateOptions", function(){
		var pro_id = $(".prId").val();
		var formData = $("#optForm").serialize();
			$.ajax({
				type : "post",
				data : formData,
				url : "<?php echo PRO_OPT_POST;?>",
				success : function(response){
					//alert(response);
					if(response == 'success'){
						$('.porcDiv').modal('hide');
						get_pro(pro_id);
					}
					
				}
			});
	});
	
	$(document).on("click",".clsOptMdl", function(){
		$('#optionModal').modal('hide');
	});
	
	$(".updCat").click(function(){
		var cat_id = $(this).attr("cat_id");
		var cat_name = $(this).attr("cat_name");
		$(".catId").val(cat_id);
		$(".catName").val(cat_name);
	});
	
	$(document).on("click",".recipe", function(){
		var rel = $(this).attr("rel");
		$(".recipe_"+rel).slideToggle();
	});
	$(document).on("click",".addRecipeRow", function(){
		var rel = $(this).attr("rel");
		recipeRow = '<div class="row" style="padding:5px;">\
						<div class="col-sm-3"></div>\
						<div class="col-sm-9">\
							<div class="row">\
								<div class="col-sm-4">\
									<input type="text" required  autocomplete="off" class="pr_namex form-control" rel="'+rel+'" name="recipe['+rel+'][pro][]" placeholder="Malzeme"/>\
									<input type="hidden" class="pr_id_'+rel+' form-control prid" name="recipe['+rel+'][pro_id][]" placeholder="Malzeme"/>\
								</div>\
								<div class="col-sm-4">\
									<select name="recipe['+rel+'][unit][]" required class="form-control unit select2">\
									<option value="adet">Adet</option>\
									<option value="kg">Kg</option>\
									<option value="gr">Gr</option>\
									<option value="lt">L</option>\
									<option value="cl">cL</option>\
									</select>\
								</div>\
								<div class="col-sm-3">\
									<input type="text" required class="form-control" name="recipe['+rel+'][qty][]" placeholder="Miktar"/>\
								</div>\
								<div class="col-sm-1">\
									<a href="javascript:;" class="delPr btn btn-sm btn-danger pull-right"><i class="fa fa-trash"></i></a>\
								</div>\
							</div>\
						</div>\
					</div>';
		
		$(".recipe_"+rel).append(recipeRow);
		$('.select2').select2();
	});
	
	$(document).on("click", ".pr_namex", function(){
		var rel = $(this).attr("rel");
		$(".pr_namex").removeClass("act");
		$(this).addClass("act");
	});
	
	$(document).on("keyup", ".act", function(){
		$(".srcResx").remove();
		$(this).parent().append("<div class='srcResx'><i class='fa fa-refresh fa-spin'></i></div>");

		var term = $(this).val().trim();
		if(term != ''){
			$.ajax({
				type : 'post',
				url : '<?php echo SRCH_PRO;?>',
				data : {'term' : term},
				success : function(response){
					$(".srcResx").html(response);
				}
			});
		}else{
			$(".srcResx").html('');
			$(".srcResx").hide();
		}
	});
	$(document).on("click",".optDiv", function(){
		var rel = $(this).attr("rel");
		//alert(rel);
		var unit = $(this).attr('unit');
		
		if(unit == 'adet'){
			var unit = '<option value="adet">Adet</option>';
			$(".act").parent().parent().find(".unit").html(unit);
		}
		if(unit == 'kg'){
			var unit = '<option value="kg">Kg</option><option value="gr">Gr</option>';
			$(".act").parent().parent().find(".unit").html(unit);
		}
		if(unit == 'lt'){
			var unit = '<option value="lt">L</option><option value="cl">Cl</option>';
			$(".act").parent().parent().find(".unit").html(unit);
		}
		
		var pro_id = $(this).attr('pro_id');
		var pro_name = $(this).text();
		$(".act").val(pro_name);
		$(".act + .prid").val(pro_id);
		$(".srcResx").hide();
	});
	
</script>
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
					<span class="pageTitle">Ürün Yönetimi</span>
				</div>
				<div class="col-sm-6">
					
				</div>
			</div>
				
			</div>
		</div>
	</div>
	
	
	<div class="mainContainer"style="padding:0 15px;">
	
	<div class="srcDiv row" style="margin-bottom:15px;">
		<div class="col-sm-6">
			<!--<input type="text" class="customSrc srcStyle srcTerm srcX" placeholder="Search..." />-->
		</div>
		<div class="col-sm-3">
			<a href="#" class="butonX1 w100 text-center" data-toggle="modal" data-target="#addMultiProModal" >HIZLI ÜRÜN EKLE</a>
		</div>
		<div class="col-sm-3">
			<a href="#" class="butonX1 w100 text-center" data-toggle="modal" data-target="#addCatModal" >ÜRÜN GRUBU EKLE</a>
		</div>
		
	</div>
	
		<div class="whiteZone f13" style="padding-right:0; padding-left:0;">
			<div class="">
			<div class="col-xs-12">
				<div class="alert alert-info">
					<i class="fa fa-info-circle"></i> Burada oluşturduğunuz gruplar ve ürünler <b style="color:#e04545;">satış menüsünde görüntülenmez</b>, eklediğiniz ürünleri <a href="<?php echo MENU_CATS;?>"> <b>Menü Yönetimi </b> </a> sayfasından satışa çıkarabilirsiniz.
				</div>
			</div>
			
				<div class="col-sm-12">
					<table class="table">
						<thead> 
							<tr>
								<th>Ürün Grubu Adı</th>
								<th>Ürün Sayısı</th>
							</tr>
						</thead>
						<tbody>
					<?php foreach($cats as $key => $val){ ?>
					
					<tr class="link_tr" link="<?php echo CAT_PRODUCTS.$val['cat_id'];?>">
						<td><?php echo $val['cat_name'];?></td>
						<td><?php echo $val['pro_count'];?></td>
					</tr>
						<!--<div class="cat_name cat_btn"> 
							<div class="cats_names"><?php echo $val['cat_name'];?></div>
							<div class="cats_btns">
								<div class="row text-center">
									<div class="col-xs-4">
										<a class="updCat" 
											cat_id="<?php echo $val['cat_id'];?>" 
											cat_name="<?php echo $val['cat_name'];?>"  
											data-toggle="modal" 
											data-target="#catModal" 
											href="javascript:;">
											Düzenle <i class="fa fa-pencil"></i>
										</a>
									</div>
									<div class="col-xs-4">
										<a class="addPro" data-toggle="modal" data-target="#proModal" cat_id="<?php echo $val['cat_id'];?>" cat_name="<?php echo $val['cat_name'];?>" href="javascript:;">
											Ürün Ekle <i class="fa fa-plus"></i>
										</a>
									</div>
									<div class="col-xs-4">
										<a class="cat_pros" cat_id="<?php echo $val['cat_id'];?>" href="javascript:;">
											Ürünler <i class="fa fa-list"></i>
										</a>
									</div>
								</div>
							</div>
						</div>-->
					<?php } ?>
						</tbody>
					</table>
				</div>				
				<!--<div class="col-sm-12" style="padding:0;">	
					
					<div class="table-responsive tab_cat1" >
					<div>
						<h2 style="padding:15px;">Tüm Ürünler</h2>
					</div>
							<table class="table">
								<thead>
									<tr>
										<th>#</th>
										<th>Ürün Adı</th>
										<th>Stok</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($products as $kk => $vv){ ?>
										<tr>
											<td><?php echo $vv['pro_id'];?></td>
											<td>
												<?php echo $vv['pro_name'];?>
											</td>
											<td>
												<?php echo $vv['stock'];?>
											</td>
											<td>
												<span class="pull-right">
												<a 
													href="#" 
													class="pro_boxx btn btn-sm btn-warning" 
													pro_id="<?php echo $vv['pro_id'];?>" 
													data-toggle="modal" 
													data-target="#proModal"
													style="xbackground:<?php if($vv['pro_bg'] != ''){echo $vv['pro_bg'];}else{echo '#666';}?>"
												>
													Güncelle <i class="fa fa-pencil-o"></i>
													
												</a>
											
												<span 
													id="<?php echo $val['cat_id'];?>_<?php echo $vv['pro_id'];?>" 
													class="removePro fa fa-times btn btn-sm btn-danger" 
													pro_id="<?php echo $vv['pro_id'];?>"
													cat_id="<?php echo $val['cat_id'];?>"
												></span>
												</span>
												<div class="clearfix"></div>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>



				
					<?php foreach($cats as $key => $val){ ?>
						
						<div class="table-responsive tab_cat tab_cat_<?php echo $val['cat_id'];?>" >
						<div>
							<h2 style="padding:15px;"><?php echo $val['cat_name'];?></h2>
						</div>
							<table class="table">
								<thead>
									<tr>
										<th>#</th>
										<th>Ürün Adı</th>
										<th>Stok</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($val['products'] as $kk => $vv){ ?>
										<tr>
											<td><?php echo $vv['pro_id'];?></td>
											<td>
												<?php echo $vv['pro_name'];?>
											</td>
											<td>
												<?php echo $vv['stock'];?>
											</td>
											<td>
												<span class="pull-right">
												<a 
													href="#" 
													class="pro_boxx btn btn-sm btn-warning"  
													pro_id="<?php echo $vv['pro_id'];?>" 
													data-toggle="modal" 
													data-target="#proModal"
													style="xbackground:<?php if($vv['pro_bg'] != ''){echo $vv['pro_bg'];}else{echo '#666';}?>"
												>
													Güncelle <i class="fa fa-pencil-o"></i>
													
												</a>
											
												<span 
													id="<?php echo $val['cat_id'];?>_<?php echo $vv['pro_id'];?>" 
													class="removePro fa fa-times btn btn-sm btn-danger" 
													pro_id="<?php echo $vv['pro_id'];?>"
													cat_id="<?php echo $val['cat_id'];?>"
												></span>
												</span>
												<div class="clearfix"></div>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
				<?php } ?>
				</div>
				-->
				<div class="clearfix"></div>
			</div>

		</div>
	</div>
</div>

<div id="addMultiProModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
	
 
    <div class="modal-content">
	<div class="modal-header">
		<h4>Hızlı Ürün Ekleme</h4>
	</div>
      <div class="modal-body">
		<div>
			
			
				<form id="addProForm" action="<?php echo ADD_MULTI_PRO_POST;?>" method="post">
					<p>
						
						<select name="cat_id" class="select2 form-control catId" required>
							<option value="">Ürün Grubu Seçiniz</option>
							<?php foreach($cats as $key => $val){ ?>
							<option value="<?= $val['cat_id'];?>">
								<?= $val['cat_name'];?>
							</option>
							<?php } ?>
						</select>
					</p>
					<p>
						<textarea name="pro_names" class="form-control" cols="30" rows="10" required ></textarea>
						* <i>Her satıra 1 ürün olacak şekilde giriniz.</i>
					</p>
					<p>
						<input type="button" class="butonX1 pull-right savePro" value="KAYDET" />
					</p>
				</form>
			
			
		</div>
		
		<div class="clearfix"></div>
      </div>
    </div>

  </div>
</div>


<div id="proModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body" style="padding:0;">
		<div class="proRes"></div>
		<div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>	
<div id="catModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
		<b>Ürün Grubu Düzenleme</b>
	  </div>
      <div class="modal-body">
		<form action="<?php echo UPDATE_CAT_POST;?>" method="post">
			<input type="hidden" name="cat_id" class="catId" value="" />
			<p>
				<input type="text" class="form-control catName" name="catName" value="" />
			</p>
			<p>
				<input type="submit" value="Kaydet" class="btn btn-success form-control" />
			</p>
		</form>
      </div>
    </div>

  </div>
</div>
<div id="addCatModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
	  
	   <div class="row">
			<form id="addCatForm" action="">
				<p class="text-center borderB">
					<b>ÜRÜN GRUBU EKLE</b> <br /> <br />
				</p>
				<p >
					<div class="">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; ÜRÜN GRUBU İSMİ</span>
						</div>
						<div class="col-xs-8">
							<input type="text" name="catName"  class="form-control depo_name" placeholder="Ürün Grubu İsmi"/>
						</div>
						<div class="clearfix"></div>
					</div>
				</p>
				<p class="borderB">
				<div class="">
					<div class="col-xs-6">
						
					</div>
					<div class="col-xs-6">
						<input type="button" class="butonX1 addNewCat pull-right" value="KAYDET" style="width:110px; text-align-center;"/>
					</div>
					<div class="clearfix"></div>
				</div>
					
				</p>
			</form>
		</div>
      </div>
    </div>
  </div>
</div>

<?php include('includes/footer-order.php');?>
<script type="text/javascript">



$(document).on('click', '.addPors', function(){
	var pRow = '<div class="row porsRow mB15 pB15">\
					<div class="col-sm-3" style="padding-left:5px;">\
						<input type="text" class="form-control hidden" name="porsion_price[]" value="0.00" />\
					</div>\
					<div class="col-sm-8" style="padding-right:5px;">\
						<input type="text" class="form-control" name="porsions[]" placeholder="Porsiyon Adı" required/>\
					</div>\
					<div class="col-sm-1" style="padding-right:5px;">\
						<a href="javascript:;" class="btn btn-sm btn-danger delThis"><i class="fa fa-times"></i></a>\
					</div>\
				</div>';
	$(".porsDiv").append(pRow);
});

$(".addNewCat").click(function(){
	var fd = $("#addCatForm").serialize();
	$.ajax({
		type : 'post',
		url : '<?php echo ADD_CAT_POST;?>',
		data : fd,
		success : function(response){
			if( response == 'exists' ){
				swal("","Bu isimle daha önce ürün grubu eklenmiştir!","error");
			}
			if( response == 'success' ){
				swal("","Ürün Grubu eklenmiştir","success");
				location.reload();
			}
		}
	});
});

$(document).on('click', '.delThis', function(){
	$(this).parent().parent().remove();
});
$(document).on('click', '.delPorsion', function(){
	var rel = $(this).attr("rel");
	
	if( confirm("Porisyonu silmek istediğinizden emin misiniz?") ){
		$.ajax({
			type : 'get',
			context : this,
			url : '<?php echo DEL_PORSION;?>'+rel,
			success : function(response){
				if(response == 'success'){
					$(this).parent().parent().remove();
					alert("Porsiyon Silinmiştir!");
				}
			}
		});
	}
	
	
	
});

$(document).on('click', '.savePro', function(){
	
		var formData = $("#addProForm").serialize();
		var action = $("#addProForm").attr("action");
		var proGroup = $(".catId").val();
		
		if(proGroup != ""){
			//alert("test");
			setTimeout(function(){
				$.ajax({
					type : "post",
					url : action,
					data : formData,
					success : function(response){
						swal("",response,"success");
						location.reload();
					}
				});
			},1000);
		}else{
			swal("","Ürün Grubu seçimi zorunludur!","warning");
		}
		
		
	});
	
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
	
	$(document).on("click", ".clsModal", function(){
		$('.modal-backdrop').remove();
	});
	$(document).on("click", ".addPors", function(){
		$('.porcDiv').slideToggle();
	});
	
	
	$(".cat_pros").click(function(){
		
		var cat_id = $(this).attr("cat_id");
		$(".tab_cat").hide();
		$(".tab_cat1").hide();
		$(".tab_cat_"+cat_id).fadeIn();
	});
	$(".allPros").click(function(){
		$(".tab_cat").hide();
		$(".tab_cat1").fadeIn();
	});
	$(".pro_boxx").click(function(){
		
		var pro_id = $(this).attr("pro_id");
		get_pro(pro_id);
		
	});
	
	function get_pro(pro_id){
		
		$(".proRes").html("yükleniyor... <i class='fa fa-refresh fa-spin'></i>");
		
		$.ajax({
			type : "get",
			url : "<?php echo GET_PRO;?>"+pro_id,
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
		recipeRow = '<div class="row" style="padding:5px">\
						<div class="col-sm-3"></div>\
						<div class="col-sm-9">\
							<div class="row">\
								<div class="col-sm-4">\
									<input type="text" required class="pr_namex form-control" rel="'+rel+'" name="recipe['+rel+'][pro][]" placeholder="Malzeme"/>\
									<input type="hidden" class="pr_id_'+rel+' form-control prid" name="recipe['+rel+'][pro_id][]" placeholder="Malzeme"/>\
								</div>\
								<div class="col-sm-4">\
									<select name="recipe['+rel+'][unit][]" required class="form-control unit">\
									<option value="adet">Adet</option>\
									<option value="kg">Kg</option>\
									<option value="gr">Gr</option>\
									<option value="lt">L</option>\
									<option value="cl">cL</option>\
									</select>\
								</div>\
								<div class="col-sm-4">\
									<input type="text" required class="form-control" name="recipe['+rel+'][qty][]" placeholder="Miktar"/>\
								</div>\
							</div>\
						</div>\
					</div>';
		
		$(".recipe_"+rel).append(recipeRow);
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
			var unit = '<option value="lt">Lt</option><option value="cl">Cl</option>';
			$(".act").parent().parent().find(".unit").html(unit);
		}
		
		var pro_id = $(this).attr('pro_id');
		var pro_name = $(this).text();
		$(".act").val(pro_name);
		$(".act + .prid").val(pro_id);
		$(".srcResx").hide();
	});
	
</script>
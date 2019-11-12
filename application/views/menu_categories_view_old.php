<?php include('includes/header-order.php');?>
<style type="text/css">
	body{background:#F5F5F5;}
	.backToHome{font-size:20px;display:inline-block; line-height:1;padding:15px 25px; background:#4972B7; color:#fff;}
	.cat_btn{padding:20px 10px;font-size:20px; margin-right:5px;}
	.container{padding:0;}
	.f15{font-size:15px;}
	.reportSelect{text-decoration:none;display:block; line-height:60px;color:#666; text-align:center;font-size:20px; border:1px solid #ddd;}
	.reportSelect:hover{text-decoration:none;}
	.reportAct{background:#666;color:#fff !important;}
	.reportAct:focus{color:#fff !important;text-decoration:none;}
	.catList{background:#efefef;}
	.cName{line-height: 1; padding: 10px; border-bottom: 1px solid #ddd;background: #faffdb;}
	.mName{cursor:pointer;line-height: 1; padding: 10px; border-bottom: 1px solid #ddd;background: #faffdb;}
	.mName:hover{background:#f7f7f7;}
	.pmName{cursor:pointer;line-height: 1; padding: 10px; border-bottom: 1px solid #ddd;background: #faffdb;}
	.pmName:hover{background:#f7f7f7;}
	.proResult{display:none;position:absolute; width:95%;top:90px; background:#fff; padding:6px; border:1px solid #ddd; border-radius:3px;z-index:22;}
	.pDiv{cursor:pointer; padding:3px;}
	.pDiv:hover{background:#f3f3f3;}
	.cName_2{background: #d6ffd6;}
	.cName_3{background: #a2e0f2;}
	.cName_4{background: #f2dca2;}
	.cName_5{background: #e3c9ff;}
	.cName_6{background: #ffc4c4;}
	.cName_7{background: #c1bbbb;}
	.adC{margin-bottom:15px;}
	.cN2{cursor:pointer;line-height: 1; padding: 5px; border-bottom: 1px solid #ddd;background: #faffdb;}
	.cN2:hover{background:#f7f7f7;}
	.pName{border-bottom:1px solid #ddd;padding:3px;background:#efefef;}
	.porsDiv{padding:10px; border-bottom:1px solid #ddd;}
</style>
<div class="topBar">
	<a href="<?php echo MAIN_BOARD;?>" class="backToHome">
	<i class="fa fa-chevron-left"></i>
	<i class="fa fa-chevron-left"></i> Ana Sayfa</a>
	<a href="javascript:;" class="backToHome addCatToggle">
	<i class="fa fa-plus"></i> Yeni Kategori</a>
	<a href="javascript:;" class="backToHome addMenuToggle">
	<i class="fa fa-plus"></i> Yeni Menü</a>
</div>
<div class="page-container ">
<div class="">
		<div class="col-sm-3">
			<div class="panel panel-flat">
				<div class="panel-heading"><b>Fiyat Listesi</b></div>
				<div class="priceList"></div>
			</div>
			<div class="panel panel-flat">
				<div class="panel-heading"><b>Menüler</b></div>
				<div class="menuList" style="display:"></div>
			</div>
			<div class="panel panel-flat">
				<div class="panel-heading"><b>Satış Ekranı Kategorisi</b></div>
				<div class="catList"  style="display:"></div>
			</div>
		</div>
		<div class="col-sm-9" style="padding-left:0;">
			
				<div class="actionDiv">
					<div class="addMenu1 adC" style="display:none;">
						<div class="row">
							<form id="addMForm">
								<div class="col-xs-3">
									<input type="text" name="menu_name" placeholder="Menü adı giriniz" class="menu_name form-control" />
								</div>
								<div class="col-xs-3">
									<a href="javascript:;" class="btn btn-info saveMenu">Kaydet</a>
								</div>
							</form>
						</div>
					</div>
					<div class="addCat1 adC" style="display:none;">
						<div class="row">
							<form id="addCForm">
								<div class="col-xs-3">
									<input type="text" name="cat_name" placeholder="Kategori adı" class="cat_name form-control" />
								</div>
								<div class="col-xs-3">
									<a href="javascript:;" class="btn btn-info saveCat">Kaydet</a>
								</div>
							</form>
						</div>
					</div>
					<div class="addCat2 adC" style="display:none;">
						<div class="row">
							<form id="addSubCForm">
								<div class="col-xs-3">
									<div>
										<b>Alt kategori ekle</b>
									</div>
									<input type="text" readonly class="cat_name_main form-control" value=""/>
									<input type="text" name="sub_cat_name" placeholder="Alt kategori adı" class="sub_cat_name form-control" />
									<input type="hidden" name="cat_id" class="cat_id_main" value="0" />
									<input type="hidden" name="type" class="type" value="0" />
								</div>
								<div class="col-xs-3">
									<a href="javascript:;" class="btn btn-info addSCat">Kaydet</a>
								</div>
							</form>
						</div>
					</div>
					<div class="addCat3 adC" style="display:none;">
						<div class="row">
							<form id="addProForm" autocomplete="off">
								<div class="col-xs-3" style="position:relative;">
									<div>
										<b>Ürün ekle</b>
									</div>
									<input type="text" readonly class="cat_name_main form-control" value=""/>
									<input type="text" name="pro_name" placeholder="Ürün ara..." class="pro_name form-control srchPro" />
									<div class="proResult"></div>
									<input type="hidden" name="cat_id" class="cat_id" autocomplete="off" value="0" />
									<input type="hidden" name="pro_id" class="pro_id" value="0" />
								</div>
								<div class="col-xs-3">
									<a href="javascript:;" class="btn btn-info addP">Kaydet</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			
			<div class="panel panel-flat" style="padding:15px;min-height:520px;">
				<div class="appDiv"></div>
			</div>
			
		</div>
	<div class="clearfix"></div>
</div>
<?php include('includes/footer-order.php');?>
<script type="text/javascript">
	
	$(document).ready(function(){
		getMenus();
		getPriceMenus();
		getCats();
		//getCatsRight();
		
	});
	
	$(".addCatToggle").click(function(){
		$(".adC").hide();
		$(".addCat1").fadeIn();
	});
	
	$(".addMenuToggle").click(function(){
		$(".adC").hide();
		$(".addMenu1").fadeIn();
	});
	
	$(".saveCat").click(function(){
		
		var cName = $(".cat_name").val().trim();
		if(cName != ''){
			dataForm = $("#addCForm").serialize();
			$.ajax({
				type : 'post',
				url : '<?php echo ADD_MENU_CAT_POST;?>',
				data : dataForm,
				success : function(response){
					if(response == 'success'){
						$(".cat_name").val("");
						getCats();
					}
				}
			});
		}
	});
	
	$(".saveMenu").click(function(){
		
		var mName = $(".menu_name").val().trim();
		if(mName != ''){
			dataForm = $("#addMForm").serialize();
			$.ajax({
				type : 'post',
				url : '<?php echo ADD_MENU_POST;?>',
				data : dataForm,
				success : function(response){
					if(response == 'success'){
						$(".menu_name").val("");
						getMenus();
					}
				}
			});
		}
	});
	
	$(".addSCat").click(function(){
		
		var cName = $(".sub_cat_name").val().trim();
		if(cName != ''){
			dataForm = $("#addSubCForm").serialize();
			$.ajax({
				type : 'post',
				url : '<?php echo ADD_MENU_SUB_CAT_POST;?>',
				data : dataForm,
				success : function(response){
					if(response == 'success'){
						$(".sub_cat_name").val("");
						getCats();
					}
				}
			});
		}
	});
	$(".addP").click(function(){
		
		var cat_id = $(".cat_id").val();
		var pro_id = $(".pro_id").val();
		if(cat_id != ''){
			dataForm = $("#addProForm").serialize();
			$.ajax({
				type : 'post',
				url : '<?php echo ADD_MENU_PRO_POST;?>',
				data : dataForm,
				success : function(response){
					if(response == 'success'){
						$(".pro_name").val('');
						getCats();
					}
				}
			});
		}
	});
	
	$(document).on("click",".delCat", function(){
		var catId = $(this).attr('cat_id');
		$.ajax({
				type : 'post',
				url : '<?php echo DEL_MENU_CAT;?>',
				data : {"cat_id" : catId},
				success : function(response){
					if(response == 'success'){
						getCats();
					}else{
						alert(response);
					}
				}
			});
	});
	
	$(document).on("click", ".mName", function(){
		var menu_id = $(this).attr("menu_id");
		getMenuCats(menu_id);
	});
	$(document).on("click", ".addProX", function(){
		var cat_id = $(this).attr("cat_id");
		getProducts(cat_id);
	});
	$(document).on("click", ".pmName", function(){
		var menu_id = $(this).attr("menu_id");
		getMenuCats2(menu_id);
	});
	function getPriceMenus(){
		$(".priceList").html('<i class="fa fa-refresh fa-spin"></i>');
		setTimeout(function(){
			$.ajax({
				type : 'get',
				url : '<?php echo GET_MENUS;?>',
				success : function(response){
					rowData = JSON.parse(response);
					if(rowData.msg == 'success'){
						var innerHtml = "";
								
						for( var key in rowData.menu_list ) {
							menu = rowData.menu_list[key];
							innerHtml+= "<div class='pmName' menu_id='"+menu.menu_id+"'>";
							innerHtml+= menu.menu_name;
							innerHtml+= "<a class='pull-right'></a>";
							innerHtml+= "</div>";
						}
						$(".priceList").html(innerHtml);
						$(".adC").fadeOut();
					}else{
						$(".priceList").html("<div class='cName'>Henüz Menü eklenmedi</div>");
					}
				}
			});
		},800);
		
	}
	
	
	function getMenus(){
		$(".menuList").html('<i class="fa fa-refresh fa-spin"></i>');
		setTimeout(function(){
			$.ajax({
				type : 'get',
				url : '<?php echo GET_MENUS;?>',
				success : function(response){
					rowData = JSON.parse(response);
					if(rowData.msg == 'success'){
						var innerHtml = "";
								
						for( var key in rowData.menu_list ) {
							menu = rowData.menu_list[key];
							innerHtml+= "<div class='mName' menu_id='"+menu.menu_id+"'>";
							innerHtml+= menu.menu_name;
							innerHtml+= "<a class='pull-right'></a>";
							innerHtml+= "</div>";
						}
						$(".menuList").html(innerHtml);
						$(".adC").fadeOut();
					}else{
						$(".menuList").html("<div class='cName'>Henüz Menü eklenmedi</div>");
					}
				}
			});
		},800);
		
	}
	
	function getMenuCats(menu_id){
		$(".appDiv").html('<i class="fa fa-refresh fa-spin"></i>');
		setTimeout(function(){
			$.ajax({
				type : 'get',
				url : '<?php echo GET_MENU_CATS2;?>'+menu_id,
				success : function(response){
					$(".appDiv").html(response);
				}
			});
		},800);
	}
	function getMenuCats2(menu_id){
		$(".appDiv").html('<i class="fa fa-refresh fa-spin"></i>');
		setTimeout(function(){
			$.ajax({
				type : 'get',
				url : '<?php echo GET_MENU_CATS3;?>'+menu_id,
				success : function(response){
					$(".appDiv").html(response);
				}
			});
		},800);
	}
	
	function getCats(){
		$(".catList").html('<i class="fa fa-refresh fa-spin"></i>');
		setTimeout(function(){
			$.ajax({
				type : 'get',
				url : '<?php echo GET_MENU_CATS;?>',
				success : function(response){
					rowData = JSON.parse(response);
					if(rowData.msg == 'success'){
						var innerHtml = "";
								
						for( var key in rowData.cat_list ) {
							innerHtml+= "<div class='cName'>";
							innerHtml+= rowData.cat_list[key].cat_name;
							innerHtml+= "<a class='delCat btn btn-xs pull-right' cat_id='"+rowData.cat_list[key].cat_id+"' href='javascript:;'><i class='fa fa-trash'></i></a>";
							innerHtml+= "<a class='addSubCat btn btn-xs pull-right' cat_name='"+rowData.cat_list[key].cat_name+"' cat_id='"+rowData.cat_list[key].cat_id+"' type='"+rowData.cat_list[key].type+"' href='javascript:;'><i class='fa fa-plus'></i></a>";
							innerHtml+= "<a class='addProX btn btn-xs btn-info pull-right' cat_id='"+rowData.cat_list[key].cat_id+"' href='javascript:;'><i class='fa fa-plus'></i> Ürün</a>";
							innerHtml+= "</div>";
							innerHtml+= "<div class='subCDiv_"+rowData.cat_list[key].cat_id+"'></div>";
							getSubCats(rowData.cat_list[key].cat_id);
						}
						$(".catList").html(innerHtml);
					}else{
						$(".catList").html("<div class='cName'>Henüz Kategori eklenmedi</div>");
					}
				}
			});
		},800);
		
	}
	
	function getCatsRight(){
		$(".catList2").html('<i class="fa fa-refresh fa-spin"></i>');
		setTimeout(function(){
			$.ajax({
				type : 'get',
				url : '<?php echo GET_MENU_CATS;?>',
				success : function(response){
					rowData = JSON.parse(response);
					if(rowData.msg == 'success'){
						var innerHtml = "";
								
						for( var key in rowData.cat_list ) {
							innerHtml+= "<div class='cName'>";
							innerHtml+= rowData.cat_list[key].cat_name;
							
							innerHtml+= "</div>";
							innerHtml+= "<div class='subCDiv2_"+rowData.cat_list[key].cat_id+"'></div>";
							getSubCats2(rowData.cat_list[key].cat_id);
						}
						$(".catList2").html(innerHtml);
					}else{
						$(".catList2").html("<div class='cName'>Henüz Kategori eklenmedi</div>");
					}
				}
			});
		},800);
		
	}
	
	function getSubCats(cat_id){
		$.ajax({
			type : 'get',
			url : '<?php echo GET_MENU_SUB_CATS;?>'+cat_id,
			success : function(response){
				rowData = JSON.parse(response);
					//console.log(response);
					if(rowData.msg == 'success'){
						var innerHtml = "";
								
						for( var key in rowData.sub_cat_list ) {
							innerHtml+= "<div class='cName cName_"+rowData.sub_cat_list[key].type+"'>";
							innerHtml+= rowData.sub_cat_list[key].cat_name;
							innerHtml+= "<a class='delCat btn btn-xs pull-right' cat_id='"+rowData.sub_cat_list[key].cat_id+"' href='javascript:;'><i class='fa fa-trash'></i></a>";
							innerHtml+= "<a class='addSubCat btn btn-xs pull-right' cat_name='"+rowData.sub_cat_list[key].cat_name+"' cat_id='"+rowData.sub_cat_list[key].cat_id+"' type='"+rowData.sub_cat_list[key].type+"' href='javascript:;'><i class='fa fa-plus'></i></a>";
							innerHtml+= "<a class='addProX btn btn-xs btn-info pull-right' cat_name='"+rowData.sub_cat_list[key].cat_name+"' cat_id='"+rowData.sub_cat_list[key].cat_id+"' href='javascript:;'><i class='fa fa-plus'></i> Ürün</a>";
							innerHtml+= "</div>";
							innerHtml+= "<div class='subCDiv_"+rowData.sub_cat_list[key].cat_id+"'></div>";
							
							getSubCats(rowData.sub_cat_list[key].cat_id);
						}
						$(".subCDiv_"+cat_id).html(innerHtml);
					}
			}
		});
	}
	function getSubCats22(cat_id){
		$.ajax({
			type : 'get',
			url : '<?php echo GET_MENU_SUB_CATS;?>'+cat_id,
			success : function(response){
				rowData = JSON.parse(response);
					console.log(response);
					if(rowData.msg == 'success'){
						var innerHtml = "";
								
						for( var key in rowData.sub_cat_list ) {
							var type = parseInt(rowData.sub_cat_list[key].type);
							var padding = parseInt(12 * type);
							innerHtml+= "<div style='padding-left:"+padding+"px' class='cName cName_"+rowData.sub_cat_list[key].type+"'> - ";
							innerHtml+= rowData.sub_cat_list[key].cat_name;
							innerHtml+= "</div>";
							innerHtml+= "<div class='subCDiv2_"+rowData.sub_cat_list[key].cat_id+"'></div>";
							innerHtml+= "<div class='proDiv2_"+rowData.sub_cat_list[key].cat_id+"'></div>";
							
							getSubCats22(rowData.sub_cat_list[key].cat_id);
							getProducts22(rowData.sub_cat_list[key].cat_id);
						}
						$(".subCDiv2_"+cat_id).html(innerHtml);
					}
			}
		});
	}
	function getProducts22(cat_id){
		$.ajax({
			type : 'get',
			url : '<?php echo GET_PRODUCTS22;?>'+cat_id,
			success : function(response){
				rowData = JSON.parse(response);
					console.log(response);
					if(rowData.msg == 'success'){
						var innerHtml = "";
						innerHtml+= "<form action='<?php echo PRICE_UPDATE_POST;?>' method='post'>";	
						for( var key in rowData.pro_list ) {
							
							pr = rowData.pro_list[key];
							
							innerHtml+= "<div class='pName'><b> - ";
							innerHtml+= pr.pro_name;
							innerHtml+= "</b></div>";
							innerHtml+= "<div>";
							
								
								if(pr.pors == 'success'){
									
									for(var kk in pr.porsions){
										innerHtml += '<div class="porsDiv">\
														<div class="col-sm-4">'+pr.porsions[kk].porsion_name+'</div>\
														<div class="col-sm-4"></div>\
														<div class="col-sm-4">\
															<input name="porsion_id['+pr.porsions[kk].id+']" type="text" class="form-control" value="'+pr.porsions[kk].porsion_price+'" />\
														</div>\
														<div class="clearfix"></div>\
													</div>';
									}
									
									
								}
							
							innerHtml+= "</div>";
						}
						innerHtml+= "<div><input type='submit' class='btn btn-success' value='Kaydet'/></div>";
						innerHtml+= "</form>";
						$(".proDiv2_"+cat_id).html(innerHtml);
					}
			}
		});
	}
	function getSubCats2(cat_id){
		$.ajax({
			type : 'get',
			url : '<?php echo GET_MENU_SUB_CATS;?>'+cat_id,
			success : function(response){
				rowData = JSON.parse(response);
					console.log(response);
					if(rowData.msg == 'success'){
						var innerHtml = "";
								
						for( var key in rowData.sub_cat_list ) {
							var type = parseInt(rowData.sub_cat_list[key].type);
							var padding = parseInt(12 * type);
							innerHtml+= "<div style='padding-left:"+padding+"px' class='cName cName_"+rowData.sub_cat_list[key].type+"'> - ";
							innerHtml+= rowData.sub_cat_list[key].cat_name;
							innerHtml+= "</div>";
							innerHtml+= "<div class='subCDiv2_"+rowData.sub_cat_list[key].cat_id+"'></div>";
							innerHtml+= "<div class='proDiv2_"+rowData.sub_cat_list[key].cat_id+"'></div>";
							
							getSubCats2(rowData.sub_cat_list[key].cat_id);
							getProducts(rowData.sub_cat_list[key].cat_id);
						}
						$(".subCDiv2_"+cat_id).html(innerHtml);
					}
			}
		});
	}
	
	function getProducts(cat_id){
		$(".appDiv").html('<i class="fa fa-refresh fa-spin"></i>');
		setTimeout(function(){
			$.ajax({
				type : 'get',
				url : '<?php echo GET_MENU_PRODUCTS;?>'+cat_id,
				success : function(response){
					$(".appDiv").html(response);
				}
			});
		},800);
		
	}
	function getCatsOrProducts(cat_id){
		$(".subDiv").html("<i class='fa fa-spin fa-refresh'></i>");
		$.ajax({
			type : 'get',
			url : '<?php echo GET_CAT_OR_PRODUCTS;?>'+cat_id,
			success : function(response){
				rowData = JSON.parse(response);
					console.log(response);
					if(rowData.cat_msg == 'success'){
						var innerHtml = "";
								
						for( var key in rowData.sub_cat_list ) {
							var type = parseInt(rowData.sub_cat_list[key].type);
							var padding = parseInt(12 * type);
							innerHtml+= "<div style='padding-left:"+padding+"px' class='cName cName_"+rowData.sub_cat_list[key].type+"'> - ";
							innerHtml+= rowData.sub_cat_list[key].cat_name;
							innerHtml+= "</div>";
							innerHtml+= "<div class='subCDiv2_"+rowData.sub_cat_list[key].cat_id+"'></div>";
							innerHtml+= "<div class='proDiv2_"+rowData.sub_cat_list[key].cat_id+"'></div>";
							 
							getSubCats22(rowData.sub_cat_list[key].cat_id);
							getProducts22(rowData.sub_cat_list[key].cat_id);
						}
						//$(".subCDiv2_"+cat_id).html(innerHtml);
						$(".subDiv").html(innerHtml);
					}else{
						if(rowData.pro_msg == 'success'){
							var innerHtml = "";
							for( var key in rowData.pro_list ) {
								innerHtml+= "<div class='proDiv2_"+cat_id+"'></div>";
								getProducts22(cat_id);
							}
							$(".subDiv").html(innerHtml);
						}else{
							$(".subDiv").html("Alt kategori veya Ürün bulunamadı!");
						}
						
					}
			}
		});
	}
	
	$(document).on('click', '.addSubCat', function(){
		var cat_id = $(this).attr('cat_id');
		var cat_name = $(this).attr('cat_name');
		var type = $(this).attr('type');
			$(".cat_id_main").val(cat_id);
			$(".cat_name_main").val(cat_name);
			$(".type").val(type);
		$(".adC").hide();
		$(".addCat2").fadeIn();
	});
	$(document).on('click', '.cN2', function(){
		var cat_id = $(this).attr('cat_id');
		getCatsOrProducts(cat_id);
	});
	
	$(document).on('click', '.addMC', function(){
		var fData = $("#mcForm").serialize();
		$.ajax({
				type : 'post',
				data : fData,
				url : '<?php echo ADD_CATS_TO_MENU_POST;?>',
				success : function(response){
					if(response == 'success'){
						$(".appDiv").html("<i class='fa fa-check'></i> Kategoriler Başarıyla eklenmiştir!");
					}
				}
		
		});
	});
	$(document).on('click', '.addCP', function(){
		var fData = $("#mcForm").serialize();
		$.ajax({
				type : 'post',
				data : fData,
				url : '<?php echo ADD_PRODUCTS_TO_CAT_POST;?>',
				success : function(response){
					if(response == 'success'){
						$(".appDiv").html("<i class='fa fa-check'></i> Ürünler Başarıyla eklenmiştir!");
					}
				}
		
		});
	});
	
	$(document).on('click', '.addPro', function(){
		var cat_id = $(this).attr('cat_id');
		var cat_name = $(this).attr('cat_name');
		var type = $(this).attr('type');
			$(".cat_id").val(cat_id);
			$(".pro_name").val('');
			$(".cat_name_main").val(cat_name);
		$(".adC").hide();
		$(".addCat3").fadeIn();
	});
	
	$(".srchPro").keyup(function(){
		$(".proResult").show();
		$(".proResult").html('<i class="fa fa-refresh fa-spin"></i>');
		var term = $(this).val().trim();
		if(term != ''){
			$.ajax({
				type : 'post',
				url : '<?php echo SRCH_PRO2;?>',
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
	
	$(document).on("click",".pDiv",function(){
		var pro_id = $(this).attr('pro_id');
		var pro_name = $(this).text().trim();
			$(".pro_id").val(pro_id);
			$(".pro_name").val(pro_name);
			$(".proResult").hide();
	});
	
</script>
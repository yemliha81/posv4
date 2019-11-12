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
	.cName{padding: 10px; border-bottom: 1px solid #ddd;background: #373636; color:#bbb;}
	.cName:hover{background:#ddd;}
	.mName{cursor:pointer;line-height: 1; padding: 10px; border-bottom: 1px solid #ddd;background: #faffdb;}
	.mName:hover{background:#f7f7f7;}
	.pmName{cursor:pointer;line-height: 1; padding: 10px; border-bottom: 1px solid #ddd;background: #faffdb;}
	.pmName:hover{background:#f7f7f7;}
	.proResult{display:none;position:absolute; width:95%;top:90px; background:#fff; padding:6px; border:1px solid #ddd; border-radius:3px;z-index:22;}
	.pDiv{cursor:pointer; padding:3px;}
	.pDiv:hover{background:#f3f3f3;}
	.cName_2{background:#efefef;}
	.cName_3{background: #a2e0f2;}
	.cName_4{background: #f2dca2;}
	.cName_5{background: #e3c9ff;}
	.cName_6{background: #ffc4c4;}
	.cName_7{background: #c1bbbb;}
	.cNameX{font-weight:bold;background: #373636; color:#fff;}
	.adC{margin-bottom:15px;}
	.cN2{cursor:pointer;line-height: 1; padding: 5px; border-bottom: 1px solid #ddd;background: #faffdb;}
	.s_c1{cursor:pointer;line-height: 1; padding: 5px; border-bottom: 1px solid #ddd;background: #faffdb;}
	.p_1{background:#efefef; padding:5px;line-height:1;border-bottom:1px solid #666;}
	.porrs{padding:5px; line-height:1;}
	.pName{border-bottom:1px solid #ddd;padding:3px;background:#efefef;}
	.porsDiv{padding:10px; border-bottom:1px solid #ddd;}
	.acct{background:#41b7e2; color:#fff;}
	.sortB{display:inline-block; line-height:1; border:1px solid #ddd; background:#fff; border-radius:3px; margin:0 2px; padding:3px;width:30px;color:#000; font-weight:bold;}
	.sortPP{display:inline-block; line-height:1; border:1px solid #ddd; background:#fff; border-radius:3px; margin:0 2px; padding:3px;width:30px;color:#000; font-weight:bold;}
	.sucMsg{position:fixed; top:20px; right:20px; display:inline-block;z-index:9999999;display:none;background:#55CD6C; color:#fff; font-weight:bold;}
	.colorP{-webkit-appearance:none;border:0;cursor:pointer;}
	.w35{width:35%; float:left;}
	.w65{width:65%; float:left;}
	@media only screen and (max-width: 768px) {
		.w35{width:100%; float:left;}
		.w65{width:100%; float:left;}
	}
	
</style>
<link rel="stylesheet" href="<?php echo ASSETS;?>css/multi-select.css"/>
<div class="alert sucMsg">
	<i class="fa fa-check"></i> BAŞARILI
</div>

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
					<span class="pageTitle">Menü Yönetimi</span>
				</div>
				<div class="col-sm-6">
					
				</div>
			</div>
				
			</div>
		</div>
	</div>
	
	
	<div class="mainContainer"style="padding:0 15px;">
	
	<div class="srcDiv row" style="margin-bottom:15px;">
		<div class="col-sm-9">
			<input type="text" class="customSrc srcStyle srcTerm srcX" id="myInput2" onkeyup="myFunction2()" placeholder="Search..." />
		</div>
		<div class="col-sm-3">
			<a href="javascript:;" class="butonX1 w100 text-center" data-toggle="modal" data-target="#ccModal2">
				<i class="fa fa-plus"></i> YENİ KATEGORİ</a>
		</div>
	</div>
	
		<div class="whiteZone f13" style="padding-right:0; padding-left:0;">
			<div class="">
				<div class="w35">
					<div class="panel panel-flat" style="overflow-y:auto;">
						
						<div class="catList" id="sortable">
							<!--<?php foreach($cats as $key => $val){ ?>
								<div class="cName ui-state-default sortCatsA" cat_id="<?php echo $val['cat_id'];?>" sort="<?php echo $val['sort'];?>">
									<input type="color" class="colorC" rel="<?php echo $val['cat_id'];?>" value="<?php echo $val['cBg'];?>"/>
									<span class="fa fa-chevron-down sortB sT" p="m" catid="<?php echo $val['cat_id'];?>"></span>
									<span class="sortB s_<?php echo $val['cat_id'];?>" ><?php echo $val['sort'];?></span>
									<span class="fa fa-chevron-up sortB sT" p="p" catid="<?php echo $val['cat_id'];?>"></span>
									 <?php echo $val['cat_name'];?>
									<a class="addSubCat btn btn-xs pull-right" cat_name="<?php echo $val['cat_name'];?>" cat_id="<?php echo $val['cat_id'];?>" type="<?php echo $val['type'];?>" href="javascript:;"><i class="fa fa-plus"></i></a>
									<a class="addProX btn btn-xs btn-info pull-right" cat_id="<?php echo $val['cat_id']?>" href="javascript:;"><i class="fa fa-plus"></i> Ürün</a>
									<a class="btn btn-xs btn-warning pull-right updCat" data-toggle="modal" data-target="#ccModal" cat_id="<?php echo $val['cat_id'];?>" cat_name="<?php echo $val['cat_name']?>" href="javascript:;"><i class="fa fa-pencil"></i></a>
									<div class="subCDiv_<?php echo $val['cat_id']?>"></div>
								</div>
							<?php } ?>-->
						</div>
					</div>
				</div>
				<div class="w65" style="padding-left:0;">
					
					
					<div class="panel panel-flat" style="overflow-y:auto; position:relative;">
						
						<form action="<?php echo PRICE_UPDATE_POST;?>" method="post">
							<div class="appDiv" style="overflow-y:auto;"></div>
							<div style="padding:15px; position:absolute; bottom:0; right:0;left:0;">
								<input type="submit" class="butonX1 pull-right" value="KAYDET"/>
								<div class="clearfix"></div>
							</div>
						</form>
						
					</div>
					
				</div>
			<div class="clearfix"></div>
		</div>

		</div>
	
	</div>
</div>

<!-- Modal -->
 <!-- <div class="modal fade" id="appDivModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-body">
		<form action="<?php echo PRICE_UPDATE_POST;?>" method="post">
			<div class="appDiv" style=""></div>
			<div class="clearfix"></div>
			<div style="margin-top:17px;">
				<input type="submit" class="butonX1 pull-right" value="Kaydet"/>
				
				<div class="clearfix"></div>
			</div>
		</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
        </div>
      </div>
    </div>
  </div>-->

<div class="">

<!-- Modal -->
  <div class="modal fade" id="appModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <div class="appModalDiv"></div>
        </div>
      </div>
    </div>
  </div>

  <div id="ccModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <div class="" style="padding:0 0 15px 0;">
			<h4 class="modal-title">Kategori Düzenleme</h4>
		</div>
		
      </div>
      <div class="modal-body" style="padding:15px 0 0 0;">
			<form id="ccForm" >
				<p>
					<div class="">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; KATEGORİ İSMİ</span>
						</div>
						<div class="col-xs-8">
							<input type="hidden" class="ccId" name="ccId" value="" />
							<input type="text" class="form-control ccName" name="ccName" placeholder="Kategori ismi" />
						</div>
						<div class="clearfix"></div>
					</div>
				</p>
				<p>
					<div class="hidden">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; KATEGORİ AÇIKLAMA</span>
						</div>
						<div class="col-xs-8">
							<input type="text" class="form-control catDesc" name="catDesc" placeholder="Kategori açıklaması" />
						</div>
						<div class="clearfix"></div>
					</div>
				</p>
				<p>
					<div class="">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; RENK</span>
						</div>
						<div class="col-xs-8">
							<input type="color" class="colorC colorCx form-control" style="padding:0;" rel="" value="null"/>
						</div>
						<div class="clearfix"></div>
					</div>
				</p>
				<p>
					<div class="">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; MUTFAK</span>
						</div>
						<div class="col-xs-8">
							<select name="kitchen_id" class="form-control kitchen_id">
								<option value="">Seçiniz</option>
								<?php foreach($kitchens as $key => $val){ ?>
								<option value="<?php echo $val['kitchen_id'];?>"><?php echo $val['kitchen_name'];?></option>
								<?php } ?>
							</select>
						</div>
						<div class="clearfix"></div>
					</div>
				</p>
				<p>
					<div class="">
						<div class="col-xs-6">
							<a href="javascript:;" class="butonFile delCatx" style="width:110px; text-align-center;"><i class="fa fa-trash"></i> SİL</a>
						</div>
						<div class="col-xs-6">
							<a type="submit" class="butonX1 pull-right saveCc" style="width:110px; text-align:center;">GÜNCELLE</a>
						</div>
						<div class="clearfix"></div>
					</div>
				</p>
			</form>
			
			<div style="background:#eee;">
			
				<div class="borderB" style="padding:15px;">
					<h4 class="modal-title">Alt Kategori Ekle</h4>
				</div>
				
				<div style="padding-top:15px;">
					<div class="">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; ALT KATEGORİ</span>
						</div>
						<div class="col-xs-8">
							<div class="addCat2 adC" style="">
								<form id="addSubCForm">
									<div class="row">
										<div class="col-xs-7">
											<input type="text" name="sub_cat_name" placeholder="Alt kategori adı" class="sub_cat_name form-control" />
											<input type="hidden" name="cat_id" class="cat_id_main" value="0" />
											<input type="hidden" name="type" class="type" value="0" />
										</div>
										<div class="col-xs-5">
											<a href="javascript:;" class=" pull-right butonFile  w100 addSCat" style="width:110px; text-align:center;">KAYDET</a>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
	  </div>
    </div>

  </div>
</div>

  <div id="ccModal2" class="modal fade" role="dialog">
	 <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Kategori Ekleme</h4>
		  </div>
		  <div class="modal-body">
		 <form id="addCForm">
					
					<div class="clearfix"></div>
					<p>
						<div class="">
							<div class="col-xs-4">
								<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; KATEGORİ İSMİ</span>
							</div>
							<div class="col-xs-8">
								<input type="text" class="form-control cat_name" name="cat_name">
							</div>
							<div class="clearfix"></div>
						</div>
					</p>
					
					<p class="borderB">
						<div class="">
							<div class="col-xs-6">
								
							</div>
							<div class="col-xs-6">
								<a type="submit" class="butonX1 pull-right saveCat" style="width:110px; text-align:center;"/>KAYDET</a>
							</div>
							<div class="clearfix"></div>
						</div>
					</p>
				</form>
		  </div>
		</div>

	  </div>
</div>

<?php include('includes/footer-order.php');?>
<script type="text/javascript">
	
	$(document).ready(function(){
		//getMenus();
		//getPriceMenus();
		getCats();
		getCatsR();
		//getCatsRight();
		
		var height = window.innerHeight
			|| document.documentElement.clientHeight
			|| document.body.clientHeight;
		var height = parseInt(height - 190);
		var appHeight = parseInt(height - 70);
		
		$(".panel-flat").css('height', height+'px');
		$(".appDiv").css('height', appHeight+'px');
		
	});
	
	function myFunction() {
		var input, filter, ul, li, a, i;
		input = document.getElementById("myInput");
		filter = input.value.toUpperCase();
		//alert(li.length);
		$(".pNm").each(function(){
			text = $(this).text();
			//console.log(text);
			if (text.toUpperCase().indexOf(filter) > -1) {
				$(this).parent().parent().parent().show();
			} else {
				$(this).parent().parent().parent().hide();

			}
		});
	}
	
	function myFunction2() {
		var input, filter, ul, li, a, i;
		input = document.getElementById("myInput2");
		filter = input.value.toUpperCase();
		//alert(li.length);
		$(".pNm").each(function(){
			text = $(this).text();
			//console.log(text);
			if (text.toUpperCase().indexOf(filter) > -1) {
				$(this).parent().parent().parent().show();
			} else {
				$(this).parent().parent().parent().hide();

			}
		});
	}
	
	$(document).on("change",".colorP",function(){
		var color = $(this).val();
		var pro_id = $(this).attr("rel");
		$.ajax({
			type : 'post',
			url : '<?php echo PRO_BG_COLOR;?>',
			data : {"color" : color, "pro_id" : pro_id},
			success : function(response){
				console.log(response);
			}
		});
	});
	
	$(document).on("change",".colorC",function(){
		var color = $(this).val();
		var cat_id = $(this).attr("rel");
		$.ajax({
			type : 'post',
			url : '<?php echo CAT_BG_COLOR;?>',
			data : {"color" : color, "cat_id" : cat_id},
			success : function(response){
				console.log(response);
			}
		});
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
						swal("","Kategori Eklenmiştir!","success");
						$(".modal").modal('hide');
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
		var cat_id = $(".cat_id_main").val();
		var type = $(".type").val();
		if(cName != ''){
			dataForm = $("#addSubCForm").serialize();
			$.ajax({
				type : 'post',
				url : '<?php echo ADD_MENU_SUB_CAT_POST;?>',
				data : {"sub_cat_name" : cName, "cat_id" : cat_id, "type" : type},
				success : function(response){
					if(response == 'success'){
						$(".sub_cat_name").val("");
						swal("","Alt Kategori Eklenmiştir!","success");
						$(".modal").modal('hide');
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
						swal("","Kategori Silinmiştir!","success");
						getCats();
					}else{
						swal("",response,"error");
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
		
		$.ajax({
			type : "post",
			url : "<?php echo CHECK_SUB_CATS;?>",
			data : {"cat_id" : cat_id},
			success : function(response){
				
				if(response == 'empty'){ 
					getProducts(cat_id);
				}
				if(response == 'full'){ 
					swal("","Ürün ekleme işlemlerini alt kategorisinden yapmanız gerekmektedir!","warning");
				}
			}
		});
		
		
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
	
	function cutWord(str,n){
		if(str.length > n){
			newstr = str.substr(0, n);
			return newstr+'...';
		}else{
			newstr = str;
			return newstr;
		}
		
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
							r = rowData.cat_list[key];
							cBg = r.cat_bg;
							innerHtml+= "<div class='cName ui-state-default'>";
							//innerHtml+= "<input type='color' class='colorC' rel='"+r.cat_id+"' value='"+cBg+"'/>";
							//innerHtml+= "<span class='fa fa-chevron-down sortB sT' p='m' catid='"+r.cat_id+"'></span>";
							innerHtml+= "<input type='text'  maxlength='3' class='sortB' catid='"+r.cat_id+"' value='"+r.sort+"' />";
							//innerHtml+= "<span class='fa fa-chevron-up sortB sT' p='p' catid='"+r.cat_id+"'></span>";
							innerHtml+= "<b>"+cutWord(r.cat_name,25)+"</b>";
							//innerHtml+= "<a class='addSubCat btn btn-xs pull-right' cat_name='"+r.cat_name+"' cat_id='"+r.cat_id+"' type='"+r.type+"' href='javascript:;'><i class='fa fa-plus'></i></a>";
							innerHtml+= "&nbsp;<a class='addProX btn btn-xs btn-default pull-right' cat_id='"+r.cat_id+"' href='javascript:;'><i class='fa fa-plus'></i> ÜRÜN</a>&nbsp;";
							innerHtml+= "&nbsp;<a style='display:inline-block; margin:0 5px;' class='btn btn-xs btn-default pull-right updCat addSubCat' data-toggle='modal' data-target='#ccModal' cat_id='"+r.cat_id+"' type='"+r.type+"' cat_desc='"+r.cat_description+"' cat_name='"+r.cat_name+"' kitchen_id='"+r.kitchen_id+"'  catBg='"+cBg+"'  href='javascript:;'><i class='fa fa-gear'></i></a>&nbsp;";
													
							innerHtml+= "</div>";
							innerHtml+= "<div class='subCDiv_"+r.cat_id+"'></div>";	
							
							getSubCats(r.cat_id);
						}
						$(".catList").html(innerHtml);
						   /*  $( "#sortable" ).sortable({
							  revert: true,
							  update: function( ) {
								  catList = '';
								   $(".sortCatsA").each(function(){
									   var cat_id = $(this).attr("cat_id");
									   
									   catList += cat_id+", ";
									   
								   });
								   
								  var catListLast = catList.slice(0, catList.length-2);
								   
								  $.ajax({
									   type : 'post',
									   url : '<?php echo SORT_CATS;?>',
									   data : { "catList" : catListLast },
									   success : function(response){
										   if( response == 'success' ){
											   console.log("sort successful!");
										   }
									   }
								   });
								   
								   
								}
							}); */
					}else{
						$(".catList").html("<div class='cName'>Henüz Kategori eklenmedi</div>");
					}
				}
			});
		},800);
		
	}
	
	$(document).on("click",".updCat", function(){
		$(".ccName").val("");
		var cat_id = $(this).attr("cat_id");
		var cat_name = $(this).attr("cat_name");
		var cat_desc = $(this).attr("cat_desc");
		var kitchen_id = $(this).attr("kitchen_id");
		var catBg = $(this).attr("catBg");
		//console.log(kitchen_id);
			$(".ccName").val(cat_name);
			$(".catDesc").val(cat_desc);
			$(".ccId").val(cat_id);
			$(".kitchen_id").val(kitchen_id);
			$(".colorCx").val(catBg);
			$(".colorCx").attr("rel",cat_id);
			//$(".select2").select2();
		
		$.ajax({
			type : "post",
			url : "<?php echo CHECK_SUB_CATS;?>",
			data : {"cat_id" : cat_id},
			success : function(response){
				if(response == 'full'){ 
					$(".kitchen_id").hide();
					$(".kitchen_id").parent().append('<span class="exclm" style="color:#C91F30"> <i class="fa fa-exclamation-triangle"></i> Mutfak seçimini alt kategoriden yapmalısınız! </span>');
				}
				if(response == 'empty'){ 
					$(".kitchen_id").show();
					$(".exclm").remove();
				}
			}
		});
		
	});
	
	$(".delCatx").click(function(){
		var catId = $(".cat_id_main").val();
		
		swal({
			  title: 'Emin misiniz?',
			  text: "Kategoriyi Silmek İstedğinizden Emin misiniz?",
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#5b5351',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'EVET!',
			  cancelButtonText: 'VAZGEÇ'
			}).then(function (result) {
			  if (result.value) {
				// handle confirm 
				
				
				$.ajax({
					type : 'post',
					url : '<?php echo DEL_MENU_CAT;?>',
					data : {"cat_id" : catId},
					success : function(response){
						if(response == 'success'){
							swal("","Kategori Silindi!","success");
							$('.modal').modal('hide');
							getCats();
						}else if(response == 'hasproducts'){
							swal("","Bu Kategoriye atanmış ürünler bulunmaktadır. Lütfen önce bu ürünleri kaldırınız.","error");
						}else if(response == 'hascats'){
							swal("","Bu Kategoriye atanmış alt kategoriler bulunmaktadır. Lütfen önce bu kategorileri kaldırınız.","error");
						}else{
							swal("",response,"warning");
						}
					}
				});
				
				
			  } else {
				// handle cancel
			  }

		
		
	});
	});
	
	$(".saveCc").click(function(){
		var ff = $("#ccForm").serialize();
		$.ajax({
			type : "post",
			data : ff,
			url : "<?php echo CC_UPDATE_POST;?>",
			success : function(response){
				console.log(response);
				if(response == 'ok'){
					//console.log(response);
					swal("","Kategori Güncellenmiştir!","success");
					location.reload();
				}
			}
		});
	});
	
	$(document).on("click", ".sT", function(){
		var p = $(this).attr("p");
		var catid = $(this).attr("catid");
		var sort = parseInt($(".s_"+catid).text());
		
		if(p == 'p'){
			var newSort = parseInt(sort + 1);
			$(".s_"+catid).text(newSort);
			cat_sort(catid, newSort);
		}
		if(p == 'm'){
			var newSort = parseInt(sort - 1);
			if(newSort > 0){
				$(".s_"+catid).text(newSort);
				cat_sort(catid, newSort);
			}
		}
		
	});
	
	
	function cat_sort(cat_id, sort){
		$.ajax({
			type : 'post',
			url : '<?php echo CAT_SORT;?>',
			data : {'cat_id' : cat_id, 'sort' : sort},
			success : function(response){
				console.log(response);
			}
		});
	}
	
	$(document).on("keyup", ".sortPP", function(){
		
		var proid = $(this).attr("proid");
		var sort = parseInt($(this).val());
		
		
			var newSort = parseInt(+sort + 1);
			
			pro_sort(proid, sort);
		
		
	});
	
	function pro_sort(proid, sort){
		$.ajax({
			type : 'post',
			url : '<?php echo PRO_SORT;?>',
			data : {'pro_id' : proid, 'sort' : sort},
			success : function(response){
				console.log(response);
			}
		});
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
	
	function getSubCats44(cat_id){
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
							//innerHtml+= "<a class='delCat btn btn-xs pull-right' cat_id='"+rowData.sub_cat_list[key].cat_id+"' href='javascript:;'><i class='fa fa-trash'></i></a>";
							//innerHtml+= "<a class='addSubCat btn btn-xs pull-right' cat_name='"+rowData.sub_cat_list[key].cat_name+"' cat_id='"+rowData.sub_cat_list[key].cat_id+"' type='"+rowData.sub_cat_list[key].type+"' href='javascript:;'><i class='fa fa-plus'></i></a>";
							//innerHtml+= "<a class='addProX btn btn-xs btn-info pull-right' cat_name='"+rowData.sub_cat_list[key].cat_name+"' cat_id='"+rowData.sub_cat_list[key].cat_id+"' href='javascript:;'><i class='fa fa-plus'></i> Ürün</a>";
							innerHtml+= "</div>";
							innerHtml+= "<div class='prDiv"+rowData.sub_cat_list[key].cat_id+" '></div>";
							innerHtml+= "<div class='subCDiv2_"+rowData.sub_cat_list[key].cat_id+"'></div>";
							
							getSubCats44(rowData.sub_cat_list[key].cat_id);
							getPrs(rowData.sub_cat_list[key].cat_id);
						}
						$(".subCDiv2_"+cat_id).html(innerHtml);
						
					}
			}
		});
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
							
							
							r = rowData.sub_cat_list[key];
							cBg = r.cat_bg;
							innerHtml+= "<div class='cName cName_"+r.type+" ui-state-default'>";
							//innerHtml+= "<input type='color' class='colorC' rel='"+r.cat_id+"' value='"+cBg+"'/>";
							//innerHtml+= "<span class='fa fa-chevron-down sortB sT' p='m' catid='"+r.cat_id+"'></span>";
							innerHtml+= "<input type='text'  maxlength='3' class='sortB' catid='"+r.cat_id+"' value='"+r.sort+"' />";
							//innerHtml+= "<span class='fa fa-chevron-up sortB sT' p='p' catid='"+r.cat_id+"'></span>";
							innerHtml+= "<b>"+r.cat_name+"</b>";
							//innerHtml+= "<a class='addSubCat btn btn-xs pull-right' cat_name='"+r.cat_name+"' cat_id='"+r.cat_id+"' type='"+r.type+"' href='javascript:;'><i class='fa fa-plus'></i></a>";
							innerHtml+= "<a class='addProX btn btn-xs btn-default pull-right' cat_name='"+r.cat_name+"' cat_id='"+r.cat_id+"' href='javascript:;'><i class='fa fa-plus'></i> ÜRÜN</a>";							
							innerHtml+= "<a style='display:inline-block; margin:0 5px;' class='btn btn-xs btn-default pull-right updCat addSubCat' data-toggle='modal' data-target='#ccModal' type='"+r.type+"' cat_id='"+r.cat_id+"' cat_name='"+r.cat_name+"' kitchen_id='"+r.kitchen_id+"' cat_desc='"+r.cat_description+"' catBg='"+cBg+"' href='javascript:;'><i class='fa fa-gear'></i></a>";
							
							innerHtml+= "</div>";
							innerHtml+= "<div class='subCDiv_"+r.cat_id+"'></div>";
							
							
							
							getSubCats(r.cat_id);
							
						}
						$(".subCDiv_"+cat_id).html(innerHtml);
						   /*  $( "#sortable" ).sortable({
							  revert: true,
							  update: function( ) {
								  catList = '';
								   $(".sortCatsA").each(function(){
									   var cat_id = $(this).attr("cat_id");
									   
									   catList += cat_id+", ";
									   
								   });
								   
								  var catListLast = catList.slice(0, catList.length-2);
								     alert(catListLast);
								  $.ajax({
									   type : 'post',
									   url : '<?php echo SORT_CATS;?>',
									   data : { "catList" : catListLast },
									   success : function(response){
										   if( response == 'success' ){
											   console.log("sort successful!");
										   }
									   }
								   });
								   
								   
								}
							}); */
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
		$(".appModalDiv").html('<i class="fa fa-refresh fa-spin"></i>');
		setTimeout(function(){
			$.ajax({
				type : 'get',
				url : '<?php echo GET_MENU_PRODUCTS;?>'+cat_id,
				success : function(response){
					$("#appModal").modal('show');
					$(".appModalDiv").html(response);
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

	$(document).on('click', '.addMC', function(){
		var fData = $("#mcForm").serialize();
		$.ajax({
				type : 'post',
				data : fData,
				url : '<?php echo ADD_CATS_TO_MENU_POST;?>',
				success : function(response){
					if(response == 'success'){
						$(".appDiv").html("<i class='fa fa-check'></i> Kategoriler Başarıyla güncellenmiştir!");
					}
				}
		
		});
	});
	$(document).on('click', '.addCP', function(){
		//alert("test");
		var fData = $("#mcForm").serialize();
		$.ajax({
				type : 'post',
				data : fData,
				url : '<?php echo ADD_PRODUCTS_TO_CAT_POST;?>',
				success : function(response){
					if(response == 'success'){
						$(".appDiv").html("<i class='fa fa-check'></i> Ürünler Başarıyla güncellenmiştir!");
						getCatsR();
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
	
	/*new functions*/
	$(document).on('click', '.cN2', function(){
		var cat_id = $(this).attr('cat_id');
		$(".cN2").removeClass("acct");
		$(this).addClass("acct");
		gSubCats(cat_id);
	});
	
	function gSubCats(cat_id){
		$(".catsDiv").html("<i class='fa fa-spin fa-refresh'></i>");
		$.ajax({
			type : 'get',
			url : '<?php echo G_SUB_CATS;?>'+cat_id,
			success : function(response){
				$(".catsDiv").html(response);
			}
		});
		$.ajax({
			type : 'get',
			url : '<?php echo G_PRODUCTS;?>'+cat_id,
			success : function(response){
				$(".prodDiv").html(response);
				
			}
		});
	}
	
	function gSubCats2(cat_id){
		$(".cSubC_"+cat_id).html("<i class='fa fa-spin fa-refresh'></i>");
		$.ajax({
			type : 'get',
			url : '<?php echo G_SUB_CATS;?>'+cat_id,
			success : function(response){
				$(".cSubC_"+cat_id).html(response);
			}
		});
		$.ajax({
			type : 'get',
			url : '<?php echo G_PRODUCTS;?>'+cat_id,
			success : function(response){
				$(".prodDiv").html(response);
			}
		});
	}
	
	function getPrs(cat_id){
		$.ajax({
			type : 'get',
			url : '<?php echo G_PRODUCTS;?>'+cat_id,
			success : function(response){
				//console.log(response);
				$(".prDiv"+cat_id).html(response);
			}
		});
	}
	
	function getCatsR(){
		$(".appDiv").html('<i class="fa fa-refresh fa-spin"></i>');
		setTimeout(function(){
			$.ajax({
				type : 'get',
				url : '<?php echo GET_MENU_CATS;?>',
				success : function(response){
					rowData = JSON.parse(response);
					if(rowData.msg == 'success'){
						var innerHtml = "";
								
						for( var key in rowData.cat_list ) {
							innerHtml+= "<div class='cName cNameX'>";
							innerHtml+= rowData.cat_list[key].cat_name;
							//innerHtml+= "<a class='delCat btn btn-xs pull-right' cat_id='"+rowData.cat_list[key].cat_id+"' href='javascript:;'><i class='fa fa-trash'></i></a>";
							//innerHtml+= "<a class='addSubCat btn btn-xs pull-right' cat_name='"+rowData.cat_list[key].cat_name+"' cat_id='"+rowData.cat_list[key].cat_id+"' type='"+rowData.cat_list[key].type+"' href='javascript:;'><i class='fa fa-plus'></i></a>";
							//innerHtml+= "<a class='addProX btn btn-xs btn-info pull-right' cat_id='"+rowData.cat_list[key].cat_id+"' href='javascript:;'><i class='fa fa-plus'></i> Ürün</a>";
							innerHtml+= "</div>";
							innerHtml+= "<div class='prDiv"+rowData.cat_list[key].cat_id+"'></div>";
							innerHtml+= "<div class='subCDiv2_"+rowData.cat_list[key].cat_id+"'></div>";
							
							getSubCats44(rowData.cat_list[key].cat_id);
							getPrs(rowData.cat_list[key].cat_id);
						}
						$(".appDiv").html(innerHtml);
						
					}else{
						$(".appDiv").html("<div class='cName'>Henüz Kategori eklenmedi</div>");
					}
				}
			});
		},800);
		
	}
	
	
	
	$(document).on('change, keyup', '.sortB', function(){
		//alert("test");
		
		var catid = $(this).attr("catid");
		var sort = parseInt($(this).val());
		
		if(sort > -1){
			cat_sort(catid, sort);
		}
		
			
		
	});
	
	$(document).on('click', '.s_c1', function(){
		var cat_id = $(this).attr('rel');
		$(".s_c1").removeClass("acct");
		$(this).addClass("acct");
		gSubCats2(cat_id);
	});

	function  successMessage(){
		$(".sucMsg").show();
		$(".sucMsg").fadeOut(3000);
	}
	/*new functions*/
</script>
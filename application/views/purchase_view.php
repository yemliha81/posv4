<?php include('includes/header-order.php');?>
<style type="text/css">
	body{background:#F5F5F5;}
	.pro_color{display:inline-block; width:25px; height:25px; cursor:pointer;box-sizing:border-box;}
	.backToHome{font-size:20px;display:inline-block; line-height:1;padding:15px 25px; background:#4972B7; color:#fff;}
	.actBox{border:1px solid #000;}
	.cat_btn{padding:20px 10px;font-size:20px; margin-right:5px;}
	.copied{position:relative;}
	.delRow{position:absolute; right:15px; top:0;}
	.compDx{padding:5px; cursor:pointer;}
	.compDx:hover{background:#ddd;color:#fff;}
	.depoDx{padding:5px; border-bottom:1px solid #ddd; cursor:pointer;}
	.depoDx:hover{background:#ddd;}
	.proResult{display:none;position:absolute; width:95%;top:36px; background:#fff; padding:6px; border:1px solid #ddd; border-radius:3px;z-index:22;}
	.optDiv{cursor:pointer; padding:3px;}
	.optDiv:hover{background:#aaa; color:#fff;}
	
	.compRes{display:none;padding:6px; border:1px solid #ddd; border-radius:3px;}
	
	.left_menu{position:fixed; width:200px; top:0; left:0; bottom:0; background:#666;}
	.right_content{margin-left:200px;padding: 15px;background: #DEDDDC;}
	.menu_div{line-height:1; padding:15px;border-bottom:1px solid #ddd;}
	.menu_div a{color:#fff; ffont-weight:bold;}
	.pageTitle{line-height:1;margin-bottom:15px;}
	.pageTitle .pageT{font-size:17px; font-weight:bold;}
	
	
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
						<span class="pageTitle">Satın Alma <i class="fa fa-chevron-right f18"></i> Fatura Girişi</span>
					</div>
					<div class="col-sm-6">
						<div class="row" style="padding-top:15px;">
							<div class="col-xs-6">
								
							</div>
							<div class="col-xs-6">
								
							</div>
						</div>
					</div>
				</div>
					
				</div>
			</div>
		</div>
		
		<div class="mainContainer"style="padding:0 15px;">
			<div class="whiteZone f13" >
				<div class="row">
					<div class="col-xs-12">
					<form action="<?php echo PURCHASE_POST;?>" method="post">
					
						<div class="row pB15 mB15 borderB"> 
							<div class="col-sm-2">
								<input type="text" name="date1" class="form-control datepicker" autocomplete="off" placeholder="Tarih" required />
							</div>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="description" placeholder="Açıklama"/>
							</div>
							<div class="col-sm-4">
							<div class="row">
								<div class="col-xs-6"></div>
								<div class="col-xs-6">
									<input type="submit" class="butonX1 w100" value="KAYDET"/>
								</div>
							</div>
							</div>
						</div>
						
						<div class="clearfix"></div>
							<div class="row pB15 mB15 borderB">
								<div class="col-sm-2" style="padding-top:6px;">
									<span class="inputTitle">TEDARİKÇİ</span>
								</div>
								<div class="col-sm-6">
									<input type="text" class="form-control srcCompany" placeholder="Tedarikçi ara" required />
									<input name="company_id" type="hidden" class="compId"/>
									<div class="compRes"></div>
								</div>
								<div class="col-sm-2">
									<a href="javascript:;" class="butonFile w100 compD" compId="0">TAKİP EDİLMİYOR</a>
								</div>
								<div class="col-sm-2">
									<a href="#" class="butonX1 w100 text-center" data-toggle="modal" data-target="#addCompModal">TEDARİKÇİ EKLE</a>
								</div>
							</div>
								
								
							
							
								<div class="row  pB15 mB15 borderB">
									<div class="col-sm-2" style="padding-top:6px;">
										<span class="inputTitle">DEPO</span>
									</div>
									<div class="col-sm-6">
										<!--<input type="text" class="form-control srcDepo" placeholder="Depo ara" />-->
										<select name="depo_id" class="form-control depoSelect select2" required>
											<option value="">Depo Seçiniz</option>
											<?php foreach($depos as $key => $val){ ?>
											<option value="<?php echo $val['depo_id'];?>">
												<?php echo $val['depo_name'];?>
											</option>
											<?php } ?>
										</select>
									</div>
									<div class="col-sm-2">
										<!--<a href="javascript:;" class="btn btn-warning depoD form-control" depoId="0">Takip Edilmiyor</a>-->
									</div>
									<div class="col-sm-2">
										
									</div>
								</div>
								<div class="depoRes"></div>
							
							
								<div class="row hidden">
									<div class="col-sm-2" style="padding-top:6px;">
										<span class="inputTitle">Ödeme Durumu</span>
									</div>
									<div class="col-sm-6">
									<div class="row ">
										<div class="col-sm-6">
											<select name="isPaid" class="form-control pSelect" required >
												<option value="1">Seçiniz</option>
												<option value="1">Ödendi</option>
												<option value="0">Ödenecek</option>
											</select>
										</div>
										<div class="col-sm-6">
											<select name="cashType" class="form-control cashType" style="display:none;">
												<option value="cash">Ödeme Yöntemi</option>
												<option value="cash">Nakit Kasa</option>
												<option value="bank">Banka Hesabı</option>
											</select>
										</div>
									</div>
										
									</div>
									<div class="col-sm-2">
										<input  name="date2" type="text" class="form-control datepicker" placeholder="Vade Tarihi"  />
									</div>
								</div>
							
							<div class="row pB15 mB15 borderB">
								<div class="col-sm-2" style="padding-top:6px;">
									<span class="inputTitle">ÜRÜN EKLE</span>
								</div>
								<div class="col-sm-6">
									<input type="text" class="form-control srchPro" placeholder="Ürün ara..." />
									<div class="proResult"></div>
								</div>
								<div class="col-sm-2"></div>
								<div class="col-sm-2">
									<a href="javascript:;" class="butonX1 w100 text-center" data-toggle="modal" data-target="#addMultiProModal" >YENİ ÜRÜN EKLE</a>
								</div>
							</div>
							
							
							<div class="tables">
								<div class="row pB15 mB15 borderB">
									<div class="col-sm-3">
										<span class="inputTitle">HİZMET / ÜRÜN</span>
									</div>
									<div class="col-sm-1">
										<span class="inputTitle">MİKTAR</span>
									</div>
									<div class="col-sm-2">
										<span class="inputTitle">BİRİM</span>
									</div>
									<div class="col-sm-2">
										<span class="inputTitle">KDV DAHİL BR. FİYAT</span>
									</div>
									<div class="col-sm-1">
										<span class="inputTitle">KDV</span>
									</div>
									<div class="col-sm-2">
										<span class="inputTitle">KDV DAHİL TOPLAM</span>
									</div>
								</div>
								
								
							</div>
							
							<div class="row">
								<div class="col-sm-8"></div>
								<div class="col-sm-4">
									<div class="">
										<div style="padding:8px 0;line-height:1;font-size:16px;border-bottom:1px solid #ddd;border-top:1px solid #ddd;">
											<span class="pull-left inputTitle">
												ARA TOPLAM : 
											</span>
											<span class="pull-right">
												<b class="all_total">0.00</b> ₺ 
												<input type="hidden" name="total1" class="total1" value="" />
											</span>
											<div class="clearfix"></div>
										</div>
									<div class="clearfix"></div>
									<div style="padding:8px 0;line-height:1;font-size:16px;border-bottom:1px solid #ddd;">
										<span class="pull-left inputTitle">
											TOPLAM KDV : 
										</span>
										<span class="pull-right">
											<b class="total_tax">0.00</b> ₺ 
											<input type="hidden" name="tax1" class="tax1"  value="" />
										</span>
										<div class="clearfix"></div>
									</div>
									<div class="clearfix"></div>
									<div style="padding:8px 0;line-height:1;font-size:16px;border-bottom:1px solid #ddd; border">
										<span class="pull-left inputTitle">
											GENEL TOPLAM : 
										</span>
										<span class="pull-right">
											<b class="lastTT">0.00</b> ₺ 
											<input type="hidden" name="total2" class="total2" value="" />
										</span>
										<div class="clearfix"></div>
									</div>
									</div>
								</div>
							</div>
							
							
							
							<p>
								<a href="javascript:;" class="hidden btn btn-info addRow">Satır Ekle <i class="fa fa-plus"></i></a> 
								
							</p>
							
						</form>
						<div class="xT" style="display:none;">
							<div class="row copied" row="" style="margin-bottom:10px;">
								<div class="col-sm-4">
									<input type="text" name="pro_id[]" class="form-control xclass" />
								</div>
								<div class="col-sm-2 cc">
									<input type="number" name="qty[]" class="xcopy calc form-control" relType="qty" placeholder="Adet giriniz" value="0"/>
								</div>
								<div class="col-sm-2 cc">
									<input type="text" name="purchase_price[]" class="xcopy calc form-control" relType="price"  placeholder="Alış fiyatı giriniz: Ör: 10.00" value="0.00"/>
								</div>
								<div class="col-sm-2 cc">
									<select  name="tax[]" class="xcopy calc form-control" relType="tax">
										<option value="18">18%</option>
										<option value="8">8%</option>
									</select>
									<input type="hidden" class="xcopy txx" relType="tax"/>
								</div>
								<div class="col-sm-2 cc">
									<input type="text" readonly name="total_price[]" class="xcopy form-control lastTotal" relType="total"  placeholder="Toplam Fiyat" value="0.00"/>
								</div>
								<div>
									<a href="javascript:;" class="delRow btn btn-sm btn-danger">
										<i class="fa fa-times"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<input type="hidden" class="lastRand" value="0" />

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

<div id="addDepoModal" class="modal fade" role="dialog">
   <div class="modal-dialog">

   
    <div class="modal-content">
      <div class="modal-body">
		<form id="addDform" method="post">
			<div class="form-group">
				<div class="row">
					<label class="col-lg-3 control-label">Depo Adı: </label>
					<div class="col-lg-9">
						<input type="text" name="depo_name" class="form-control depo_name" value=""/>
					</div>
				</div>
			</div>
			
			<p>
				<input type="button" class="sbmD form-control btn btn-success" value="Kaydet"/>
			</p>
		</form>
      </div>
    </div>

  </div>
</div>

<div id="addCompModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
	<div class="modal-content">
      <div class="modal-body">
		<div class="row">
			<form id="addCform"  method="post">
				<p class="text-center borderB">
					<b>TEDARİKÇİ EKLE</b> <br /> <br />
				</p>
				<p>
					<div class="">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; FİRMA İSMİ</span>
						</div>
						<div class="col-xs-8">
							<input type="text" name="company_name"  class="company_name form-control" placeholder=""/>
						</div>
						<div class="clearfix"></div>
					</div>
				</p>
				<p>
					<div class="">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-map-marker"></i> &nbsp;&nbsp; FİRMA ADRES</span>
						</div>
						<div class="col-xs-8">
							<input type="text" name="company_address"  class="form-control" placeholder=""/>
						</div>
						<div class="clearfix"></div>
					</div>
				</p>
				<p>
					<div class="">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-envelope"></i> &nbsp;&nbsp; E-POSTA</span>
						</div>
						<div class="col-xs-8">
							<input type="text" name="company_mail"  class="form-control" placeholder=""/>
						</div>
						<div class="clearfix"></div>
					</div>
				</p>
				<p>
					<div class="">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-volume-control-phone"></i> &nbsp;&nbsp; TELEFON</span>
						</div>
						<div class="col-xs-8">
							<input type="text" name="company_phone"  class="form-control" placeholder=""/>
						</div>
						<div class="clearfix"></div>
					</div>
				</p>
				<p class="borderB">
					<div class="">
						<div class="col-xs-6"></div>
						<div class="col-xs-6">
							<input type="button" class="butonX1 sbmC pull-right" value="KAYDET" style="width:110px; text-align-center;"/>
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

<input type="hidden" class="isActive" value="0" />
<?php 
	$auth = '0';
	if(!empty($_SESSION['authList'])){ 
		foreach($_SESSION['authList'] as $key => $val){
			if($val['auth_id'] == '5'){
				$auth = '1';
			}
		}
	}

?>
<input type="hidden" class="auth" value="<?php echo $auth;?>" />
<input type="hidden" class="authNum" value="5" />
<?php include('includes/footer-order.php');?>

<script type="text/javascript">
	
	$(".addPBtn").click(function(){
		var dt = $("#addPF").serialize();
		var pname = $(".pname").val().trim();
		if(pname != ''){
			$(this).addClass("disabled");
			//$("#addPF").submit();
			$.ajax({
				type : 'post',
				url : '<?php echo ADD_PRODUCT_POST2;?>',
				data : dt,
				success : function(response){
					//console.log(response);
					rowData = JSON.parse(response);
					if(rowData.msg == 'success'){
						addRow(rowData.pro_name, rowData.pro_id, 1);
						 $('#addProModal').modal('hide');
					}else{
						alert('Hata oluştu!');
					}
					
				}
			});
		}else{
			alert("Lütfen ürün adı giriniz!");
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
	
	$(document).on("click", ".optDiv", function(){
		$(".proResult").html('');
		$(".proResult").hide('');
		var pro_name = $(this).text().trim();
		var pro_id = $(this).attr('pro_id');
		var unit = $(this).attr('unit');
		var option_id = $(this).attr('option_id');
		
		addRow(pro_name, pro_id, option_id, unit);
		$(".proResult").html('');
		$(".srchPro").val('');
		
	});
	
	function formatMoney(n, c, d, t) {
	  var c = isNaN(c = Math.abs(c)) ? 3 : c,
		d = d == undefined ? "." : d,
		t = t == undefined ? "," : t,
		s = n < 0 ? "-" : "",
		i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),
		j = (j = i.length) > 3 ? j % 3 : 0;

	  return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
	};
	
	function addRow(pro_name, pro_id, option_id, unit){
		var randX = Math.floor(100000 + Math.random() * 900000);
		
		var newR = newRow(randX, pro_name, pro_id, option_id, unit);
		
		$(".tables").append(newR);
		$(".select2").select2();
		$('.lastTotal').number( true, 2 );
		$('.xcopy').number( true, 2 );
	}
	
	function newRow(rowNum, pro_name, pro_id, option_id, unit){
		
		if( unit == '' ){
			var unitTypes = '<select name="unit[]" class="select2 calc form-control unit_'+rowNum+'" rel="'+rowNum+'" required >\
							<option value="">Seçiniz</option>\
							<option value="adet" multiply="1">Adet</option>\
							<option value="kg" multiply="1">Kg</option>\
							<option value="gr" multiply="0.001">Gr</option>\
							<option value="lt" multiply="1">Lt</option>\
							<option value="cl" multiply="0.01">Cl</option>\
						</select>';
		}
		
		if( unit == 'kg' ){
			var unitTypes = '<select name="unit[]" class="select2 calc form-control unit_'+rowNum+'" rel="'+rowNum+'" required>\
							<option value="">Seçiniz</option>\
							<option value="kg" multiply="1">Kg</option>\
							<option value="gr" multiply="0.001">Gr</option>\
						</select>';
		}
		
		if( unit == 'lt' ){
			var unitTypes = '<select name="unit[]" class="select2 calc form-control unit_'+rowNum+'" rel="'+rowNum+'" required>\
								<option value="">Seçiniz</option>\
								<option value="lt" multiply="1">Lt</option>\
								<option value="cl" multiply="0.01">Cl</option>\
							</select>';
		}
		
		if( unit == 'adet' ){
			var unitTypes = '<select name="unit[]" class="select2 calc form-control unit_'+rowNum+'" rel="'+rowNum+'" required>\
								<option value="">Seçiniz</option>\
								<option value="adet" multiply="1">Adet</option>\
							</select>';
		}
		
		
		
		var row = '<div class="row copied pB15 mB15 borderB" row="'+rowNum+'" style="margin-bottom:10px;">\
					<div class="col-sm-2">\
						<input type="text" name="pro_name[]" class="form-control xclass" readonly value="'+pro_name+'"/>\
						<input type="hidden" name="pro_id[]" class="form-control xclass" value="'+pro_id+'"/>\
					</div>\
					<div class="col-sm-2 cc">\
						<input type="text" name="qty[]" class="xcopy calc form-control qty_'+rowNum+'" relType="qty" rel="'+rowNum+'" value="0"/>\
					</div>\
					<div class="col-sm-2 cc">\
						'+unitTypes+'\
					</div>\
					<div class="col-sm-2 cc">\
						<input type="text" name="purchase_price[]" class="xcopy calc form-control price_'+rowNum+'" relType="price" rel="'+rowNum+'" placeholder="0.000"/>\
					</div>\
					<div class="col-sm-1 cc">\
						<select  name="tax[]" class="select2 xcopy calc form-control tax_'+rowNum+'" rel="'+rowNum+'" relType="tax">\
							<option value="18">18%</option>\
							<option value="8">8%</option>\
							<option value="1">1%</option>\
							<option value="0">0%</option>\
						</select>\
						<input type="hidden" class="xcopy txx tax_'+rowNum+'" relType="tax" rel="'+rowNum+'"/>\
					</div>\
					<div class="col-sm-2 cc">\
						<input type="number" step="0.001" name="total_price[]" class="xcopy calcT form-control lastTotal total_'+rowNum+'" relType="total" rel="'+rowNum+'"/>\
					</div>\
					<div>\
						<a href="javascript:;" class="delRow btn btn-sm btn-danger" rel="'+rowNum+'">\
							<i class="fa fa-times"></i>\
						</a>\
					</div>\
				</div>';
		return row;
	}
	
	
	
	
	$(".pSelect").change(function(){
		var val = $("option:selected", this).val(); 
		if(val == '1'){
			$(".cashType").show(); 
			$(".cashType").attr("required","true");
		}else{
			$(".cashType").hide();
			$(".cashType").removeAttr("required");
		}
	});
	$(".proType").change(function(){
		var val = $("option:selected", this).val(); 
		if(val == '0'){
			$(".type1").show();
			$(".req").attr("required","true");
		}else{
			$(".type1").hide();
			$(".req").removeAttr("required");
		}
	});
	
	$(".sbmC").click(function(){
		var company_name = $(".company_name").val().trim();
		if(company_name != ''){
			$(".sbmC").addClass("disabled");
			var datas = $("#addCform").serialize();
			$.ajax({
				type : 'post',
				url : '<?php echo ADD_COMPANY_POST;?>',
				data : datas,
				success : function(response){
					if(response == 'success'){
						$('#addCompModal').modal('toggle');
						swal("","Tedarikçi eklenmiştir","success");
					}
				}
			});
		}else{
			alert("Firma ismi girilmesi zorunludur!");
		}
		
	});
	$(document).on("click",".pro_color", function(){
		var pro_bg = $(this).attr("bg");
		$(".pro_color").removeClass("actBox");
		$(this).addClass("actBox");
		$(".pro_bg").val(pro_bg);
	});
	$(".sbmD").click(function(){
		var depo_name = $(".depo_name").val().trim();
		if(depo_name != ''){
			$(this).addClass("disabled");
			var datas = $("#addDform").serialize();
			$.ajax({
				type : 'post',
				url : '<?php echo ADD_DEPO_POST;?>',
				data : datas,
				success : function(response){
					resp = JSON.parse(response);
					if(resp.msg == 'success'){
						var depoName = resp.depo_name;
						var depoId = resp.depo_id;
						
						var newDepo = '<option value="'+depoId+'">'+depoName+'</option>';
						
						$(".depoSelect").append(newDepo);
						$(".depoSelect").val(depoId);
						
						$('#addDepoModal').modal('hide');
					}
				}
			});
		}else{
			alert("Depo ismi girilmesi zorunludur!");
		}
	});
	
	$(".srcCompany").keyup(function(){
		var term = $(this).val().trim();
		if(term != ''){
			$(".compRes").show();
			$(".compRes").html("<i class='fa fa-refresh fa-spin'></i>");
			
			$.ajax({
				type : 'post',
				url : '<?php echo SEARCH_COMPANIES;?>',
				data : {'term' : term},
				success : function(response){
					$(".compRes").html(response);
				}
			});
			
			
		}else{
			$(".compRes").html("");
			$(".compRes").hide();
		}
	});
	
	$(document).on("click",".compD", function(){
		var compName = $(this).text();
		var compId = $(this).attr("compId");
		$(".srcCompany").val(compName);
		$(".compId").val(compId);
		$(".compRes").html(""); 
		$(".compRes").hide(""); 
	});
	
	$(document).on("click",".depoD", function(){
		$(".depoSelect").val('0');
	}); 

	
	
	
	$(document).on("click",".delRow", function(){ 
		var rel = $(this).attr("rel");
		$(".copied").each(function(){
			var row = $(this).attr("row");
			if( row == rel ){
				$(this).remove();
			} 
		});
		total_sum();
	});
	$(document).on("keyup change", ".calc", function(){
		
		var rel = $(this).attr('rel');
		var price = parseFloat($('.price_'+rel).val());
		var qty = parseFloat($('.qty_'+rel).val());
		var tax = parseFloat($('.tax_'+rel+' option:selected').val());
		
		var rowTotal = parseFloat(qty * price);
		
		var taxTotal = parseFloat( ( rowTotal / 100) * tax  );
		
		var lastRowTotal = parseFloat(rowTotal + taxTotal).toFixed(2);
		
		$('.total_'+rel).val(lastRowTotal);
		$('.tax_'+rel).attr("value", taxTotal);
		total_sum();
		tax_sum();
		last_sum();
	});
	
	
	
	function calcSum(num1, num2){
		return parseFloat( num1 + num2 ).toFixed(2);
	}
	
	function total_sum() {
		var tttl = 0;
		$(".lastTotal").each(function(){
			tttl += parseFloat($(this).val());
			console.log(tttl);
		});
		
		tttl = parseFloat(tttl).toFixed(2);
		$(".all_total").text(tttl);
	}
	function tax_sum() {
		taxx = [];
		$(".txx").each(function(){
			
			var val = parseFloat($(this).attr("value"));
			if(!isNaN(val)){
				taxx.push( val );
			}
				
		});
		var rowTax = parseFloat(taxx.reduce(add,0)).toFixed(2);
		$(".total_tax").text(rowTax);
		$(".tax1").attr("value", rowTax);
		//console.log(taxx);
	}
	function last_sum() {
		var lastSum = parseFloat($(".all_total").text()).toFixed(2);
		var tt = parseFloat($(".total_tax").text()).toFixed(2);
		var lastT = parseFloat(lastSum - tt).toFixed(2);
		$(".lastTT").text(lastSum);
		$(".total2").attr("value", lastSum);
		
		$(".all_total").text(lastT);
		$(".total1").attr("value", lastT);
		
		
	}
	function add(a, b) {
		return a + b;
	}
	
</script>
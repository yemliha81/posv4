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
	.proResult{display:none;position:absolute; width:95%;top:90px; background:#fff; padding:6px; border:1px solid #ddd; border-radius:3px;z-index:22;}
	.pDiv{cursor:pointer; padding:3px;}
	.pDiv:hover{background:#f3f3f3;}
	.prDD {cursor:pointer; padding:4px;border-bottom:1px solid #666;}
	.prDD:hover{background:#999; color:#fff;}
	
	.priceDD {padding:8px;border-bottom:1px solid #666;}
</style>
<div class="topBar">
	<a href="<?php echo MAIN_BOARD;?>" class="backToHome">
	<i class="fa fa-chevron-left"></i>
	<i class="fa fa-chevron-left"></i> Ana Sayfa</a>
</div>

<div class="">
	<div class="col-sm-4">
		<div class="panel panel-flat">
			<div class="panel-heading"><b>Ürün Listesi</b></div>
			<div class="catList" style="max-height:600px; overflow-y:auto; ">
				<?php foreach($pro_list as $key => $val){ ?>
					<div class="prDD">
						<?php echo $val['pro_name'];?>
						<span class="pull-right">
							<a href="javascript:;" pro_name="<?php echo $val['pro_name'];?>" rel="<?php echo $val['pro_id'];?>" class="getOptions btn btn-info btn-xs fa fa-plus"></a>
						</span>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="col-sm-8" style="padding-left:0;">
		<div class="panel panel-flat" style="padding:15px;">
			<div>
				<b>Fiyat Listesi</b>
			</div>
			<form id="priceForm" action="<?php echo PRICE_FORM_POST;?>" method="post">
				<div class="text-right">
					<a href="javascript:;" class="btn btn-sm btn-success svForm">Kaydet</a>
				</div>
				<div class="actionDiv">
				</div>
			</form>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
<?php include('includes/footer-order.php');?>
<script type="text/javascript">
	$(".svForm").click(function(){
		$("#priceForm").submit();
	});
	$(".getOptions").click(function(){
		var proId = $(this).attr('rel');
		var proName = $(this).attr('pro_name');
		
		$.ajax({
			type : 'get',
			url : '<?php echo GET_PRO_OPTIONS;?>'+proId,
			success : function(response){
				rowdata = JSON.parse(response);
				innerHtml = "";
				for(var key in rowdata.options){
					var opt = rowdata.options[key];
					
					innerHtml += '<div class="priceDD">';
					innerHtml += proName+' - '+opt.option_name;
					innerHtml += '<span class="pull-right">\
									<input type="text" name="option_price[]" value="'+opt.option_price+'" />\
									<input type="hidden" name="option_id[]" value="'+opt.option_ids+'" />\
									<input type="hidden" name="pro_id[]" value="'+proId+'" />\
								</span>';
					innerHtml += '</div>';
					
				}
				console.log(rowdata);
				$(".actionDiv").append(innerHtml);
			}
		});
		$(this).hide();
	});
</script>
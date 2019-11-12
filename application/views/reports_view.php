<?php include('includes/header-order.php');?>
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS;?>css/datepicker.css" />
<style type="text/css">
	.tglMx{display:none;}
	.daterangepicker .drp-calendar {
    max-width: 400px;
	
	}
	
	.daterangepicker.ltr .ranges{ float:right; }
	.xLabel{padding: 15px;
    border: 1px solid #ddd;
    margin-bottom: 5px;
    width: 100%;
    cursor: pointer;
    text-align: center;
    font-weight: bold;}
	.xLact{
		background: #ddd;
	}
</style>

<div class="left1">
	<?php include('includes/left_menu.php');?>
</div> 

<div class="left2">
	<div class="top">
		<div>
			<div class="col-xs-12">
				<div class="row">
					<div class="col-sm-6">
						 <span class="pageTitle"><a href="<?php echo MAIN_BOARD;?>">Anasayfa</a> > Raporlar</span>
					</div>
					<div class="col-sm-6">
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="mainContainer"style="padding:0 15px;">
		<div class="srcDiv row" style="margin-bottom:15px;">
			<form id="dateForm" action="" autocomplete="off">
				<div class="col-sm-9">
					<!--<input type="text" class="customSrc srcStyle srcTerm srcX" placeholder="Ara..." />-->
				</div>
				<div class="col-sm-3" style="position:relative;">
					<input style="text-align:right;" type="text" name="dates" class="srcStyle datepicker1 form-control" placeholder="Tarih Aralığı" value="<?php echo date("d-m-Y", time()  - (86400 * 7)).' - '.date("d-m-Y", time()+86400);?>"/>
					<input class="type" type="hidden" name="type" value="month" />
					<span class="fa fa-calendar" style="position:absolute; left: 22px; top: 6px; width: 27px; height: 29px;padding: 4px;font-size:20px;"></span>
				</div>
			</form>
		</div>
		<div class="whiteZone f13" style="padding-right:0; padding-left:0;margin-bottom:15px;">
			<div class="row" style="">
				<div class="">

					<div class="repDiv" style="padding:15px;">
						&nbsp;&nbsp;&nbsp;&nbsp;Lütfen rapor almak istediğiniz tarih aralığını seçiniz.
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<style type="text/css">
	body{background:#F5F5F5;}
	.backToHome{font-size:20px;display:inline-block; line-height:1;padding:15px 25px; background:#4972B7; color:#fff;}
	.cat_btn{padding:20px 10px;font-size:20px; margin-right:5px;}
	.container{padding:0;}
	.f15{font-size:15px;}
	
	.reportAct{color:#fff !important;}
	.reportAct:focus{color:#fff !important;text-decoration:none;}
	.dT{display:inline-block; border:1px solid #ddd; border-radius:3px; line-height:1; padding:8px 16px; margin-right:2px;}
	.dTactive{background:#efefef;}
</style>

<!-- Modal -->
<div id="printersModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
	  <div class="row">
		<p class="text-center borderB">
			<b>YAZICI SEÇİMİ</b> <br /> <br />
		</p>
	  </div>
		<div>
			<form id="printForm">
			<?php foreach($printers as $key => $val){ ?>
				
				<label for="pr<?php echo $key;?>" class="xLabel">
					<?php echo $val['printer_name'];?>
					<input class="hidden" id="pr<?php echo $key;?>" type="radio" name="printer" value="<?php echo $val['printer_ip'];?>" />
				</label>
			<?php } ?>
				<input type="hidden" name="order_id" class="order_id" value="<?php echo $last_order['order_id'];?>" />
				<input type="hidden" name="table_name" class="table_name" value="<?php echo $table['table_name'];?>" />
				<input type="hidden" name="rePrint" value="1" />
				<a href="javascript:;" class="btn btn-success form-control sendToPrinter" data-dismiss="modal"><b>YAZDIR</b></a>
			</form>
		</div>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->

<!-- Modal -->
<div id="orderModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-center">Adisyon Detayları</h4>
      </div>
      <div class="modal-body">
        <div class="adisResp" id="printDiv"></div>
		<div class="text-center">
			<?php if(count($printers) == 1){ ?>
					<button class="butonX1 prBt2" data-dismiss="modal" ><i class="fa fa-print fa-2x"></i></button>
					<form id="printForm2">
						<input type="hidden" id="pr01" type="radio" name="printer" value="<?php echo $printers[0]['printer_ip'];?>" autocomplete="off">
						<input type="hidden" name="order_id" class="order_id" value="" autocomplete="off">
						<input type="hidden" name="table_name" class="table_name" value="" autocomplete="off">
						<input type="hidden" name="rePrint" value="1" />
					</form>
				<?php }else{ ?>
					<button class="butonX1 prBt" data-dismiss="modal" data-toggle="modal" data-target="#printersModal"><i class="fa fa-print fa-2x"></i></button>
				<?php } ?>
			
		</div>
      </div>
    </div>

  </div>
</div>
<input type="hidden" class="dTable" value="0" />

<input type="hidden" class="isActive" value="0" />
<input type="hidden" class="noPro" value="0" />

<?php 
	$auth = '0';
	if(!empty($_SESSION['authList'])){ 
		foreach($_SESSION['authList'] as $key => $val){
			if($val['auth_id'] == '6'){
				$auth = '1';
			}
		}
	}

?>
<input type="hidden" class="auth" value="<?php echo $auth;?>" />
<input type="hidden" class="authNum" value="6" />
<?php include('includes/footer-order.php');?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="<?php echo ASSETS;?>js/datepicker.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	
	google.charts.load("current", {packages:["corechart"]});

	//getReport();
	
	
	$('.datepicker1').daterangepicker({
	"autoApply": true,
	//"timePicker": true,
    //"timePicker24Hour": true,
    ranges: {
        'Bugün': [moment(), moment()],
        'Dün': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Son 7 Gün': [moment().subtract(6, 'days'), moment()],
        'Son 30 Gün': [moment().subtract(29, 'days'), moment()],
        'Bu Ay': [moment().startOf('month'), moment().endOf('month')],
        'Geçen Ay': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    "locale": {
        "format": "DD/MM/YYYY",
        "separator": " - ",
        "applyLabel": "UYGULA",
        "cancelLabel": "İPTAL",
        "fromLabel": "From",
        "toLabel": "To",
        "customRangeLabel": "Tarih Aralığı",
        "weekLabel": "W",
        "daysOfWeek": [
            "Pz",
            "Pzt",
            "Sa",
            "Çrş",
            "Prş",
            "Cu",
            "Cts"
        ],
        "monthNames": [
            "Ocak",
            "Şubat",
            "Mart",
            "Nisan",
            "Mayıs",
            "Haziran",
            "Temmuz",
            "Ağustos",
            "Eylül",
            "Ekim",
            "Kasım",
            "Aralık"
        ],
        "firstDay": 1
    },
    "alwaysShowCalendars": true,
	"buttonClasses": "btn",
    "applyButtonClasses": "butonX1",
    "cancelClass": "butonFile",
	"opens" : "left"
}, function(start, end, label) {
  console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
});


});

$('.datepicker1').on('apply.daterangepicker', function(ev, picker){
	getReport();
});

$(document).on("click",".showxModal",function(){
	$('#reportModal').appendTo("body").modal('show');
});
$(document).on("click",".dayEndPrint2xx",function(){
	
	var htmlBody = $(".htmlBody").html();
	var printer_ip = $(".printer").val();
	var printer_type = $('option:selected', '.printer').attr('ptype');
	var reportDetail = $('.reportDetail').val();
	var reportDetail2 = $('.reportDetail2').val();
	var noPro = $('.noPro').val();
	
	if(noPro == '1'){
		reportDetail = reportDetail2;
	}
	//console.log(htmlBody);
	
	$.ajax({
		type : "post",
		url : "<?php echo SEND_TO_PRINTER_REPORT;?>",
		data : { "htmlBody" : htmlBody , "printer" : printer_ip, "printer_type" : printer_type, "reportDetail" : reportDetail},
		success : function(response){
			console.log(response);
		}
	});
	
});

function printDiv() 
{

  var divToPrint=document.getElementById('printDiv');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html>\
  <style type="text/css">\
  body{font-size:13px;font-family:Arial;padding:10px; margin:0;}\
  #cartDiv{border-top:1px solid #666;border-bottom:1px solid #666;}\
  table tr td{font-size:13px}\
  input{border:0;background:#fff; width:60px;text-align:right;}\
  .hidePrint{display:none;}\
  .cc{text-align:center;}\
  .tableD{margin-bottom:50px;}\
  .rightPrint{display:inline-block; float:right;}\
  .enjoyTxt{margin-top:85px;}\
  .clearfix{clear:both;}\
  td{padding-right:0; padding-left:0;}\
  .showKitchen{display:none;}\
  </style>\
  <body  onload="window.print();">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);

}

$(document).on("click", ".dT", function(){
	var fD = $(this).attr("fDate");
	var lD = $(this).attr("lDate");
		$(".fD").val(fD);
		$(".lD").val(lD);
	$(".dT").removeClass("dTactive");
	$(this).addClass("dTactive");
	getReport();
});

$(document).on("click", ".stockDetails", function(){
	$(".repDiv").html("<div class='text-center'><i class='fa fa-refresh fa-spin fa-2x'></i></div>");
	var link = $(this).attr("link");
	$.ajax({
		type : 'get',
		url : link,
		success : function(response){
			$(".repDiv").html(response);
				dataTbl();
		}
	});
});
$(document).on("click", ".gdR", function(){
	var fD = $(this).attr("fDate");
	var lD = $(this).attr("lDate");
		$(".fD").val(fD);
		$(".lD").val(lD);
	var type = 'order';
	$(".type").val(type);
	$(".reportSelect").removeClass("reportAct");
	$(this).addClass("reportAct");
	getAdisyonReport(fD, lD);
});


$(".reportSelect").click(function(){
	var type = $(this).attr("rel");
	$(".type").val(type);
	$(".gdR").removeClass("reportAct");
	$(".reportSelect").removeClass("reportAct");
	$(this).addClass("reportAct");
	//alert(type);
	getReport();
});

$(document).on("click", ".ordDetailsX", function(){
	var order_id = $(this).attr("order_id");
	var table_name = $(this).attr("table_name");
	
	$(".order_id").val(order_id);
	$(".table_name").val(table_name);
	
	$(".prBt").attr("order_id", order_id);
	$('#orderModal').modal('show');
	
	$.ajax({
		type : 'post',
		url : '<?php echo GET_ORDER_DETAILS_LOGS;?>',
		data : {"order_id" : order_id},
		success : function(response){
			$(".adisResp").html(response);
		}
	});
});

$(document).on("change",".xLabel",function(){
	$(".xLabel").removeClass("xLact");
	$(this).addClass("xLact");
});

$(document).on("click",".sendToPrinter",function(){
	var dataX = $("#printForm").serialize();
	console.log(dataX);
	
	$.ajax({
		type : "post",
		data : dataX,
		url : "<?php echo SEND_TO_PRINTER;?>",
		success : function(response){
			console.log(response);
		}
	});
	
});

$(document).on("click", ".prShow", function(){
	$('.prrx').toggleClass("hidden");
	
	var noPro = $(".noPro").val();
	
	if(noPro == '1'){
		$(".noPro").val('0');
	}else{
		$(".noPro").val('1');
	}
	
});


$(document).on("click",".prBt2",function(){
	var dataX = $("#printForm2").serialize();
	//console.log(dataX);
	
	$.ajax({
		type : "post",
		data : dataX,
		url : "<?php echo SEND_TO_PRINTER;?>",
		success : function(response){
			console.log(response);
		}
	});
	
});

function getAdisyonReport(fDate, lDate){
	 //$("#dateForm").submit();
	$(".repDiv").html("<div class='text-center'><i class='fa fa-refresh fa-spin fa-2x'></i></div>");
	//alert(fDate);
	
	setTimeout(function(){
		$.ajax({
			type : 'post',
			url : '<?php echo GET_ADISYON_REPORTS;?>',
			data : {"fDate":fDate, "lDate" : lDate},
			success : function(response){
				$(".repDiv").html(response);
				dataTbl();
			}
		});
	},500);
	
	
}

function getReport(){
	 //$("#dateForm").submit();
	$(".repDiv").html("<div class='text-center'><i class='fa fa-refresh fa-spin fa-2x'></i></div>");
	var fData = $("#dateForm").serialize();
	//alert(fData);
	setTimeout(function(){
		$.ajax({
			type : 'post',
			url : '<?php echo REPORTS_POST;?>',
			data : fData,
			success : function(response){
				$(".repDiv").html(response);
				
				dataTbl();
			}
		});
	},500);
}

</script>
<!--<div class="lockD" style="position:fixed; top:0;right:0; display:inline-block; padding:19px; line-height:1; background:#000; color:#fff;">
	<a href="javascript:;" class="LockScreen" style="color:#fff;">
		<i class="fa fa-2x fa-lock"></i>
	</a>
</div>-->
<style type="text/css">
	.n11{    
	padding-top: 15px;
    padding-bottom: 15px;
    height: 56px;
    font-weight: bold;
    font-size: 18px;}
</style>
<div id="lockDiv" style="position:fixed; top:0; right:0; left:0; bottom:0; z-index:11111; background:rgba(0,0,0,0.6); display:none;">
	<div class="text-center" style="margin:100px auto; float:none; width:400px; padding:25px; background:#fff;">
		<p>
			<span><h2>Pin Kodu Giriniz</h2></span>
		</p>
		
		<p>
			<input type="password" class="form-control lockPin" value=""/>
			<div class="respPass"></div>
		</p>
		<p>
			<div class="rwx">
				<div class="w33">
					<a href="javascript:;" rel="1" class="btn btn-info form-control nn n11">1</a>
				</div>
				<div class="w33">
					<a href="javascript:;" rel="2" class="btn btn-info form-control nn n11">2</a>
				</div>
				<div class="w33">
					<a href="javascript:;" rel="3" class="btn btn-info form-control nn n11">3</a>
				</div>
			</div>
			<div class="rwx">
				<div class="w33">
					<a href="javascript:;" rel="4" class="btn btn-info form-control nn n11">4</a>
				</div>
				<div class="w33">
					<a href="javascript:;" rel="5" class="btn btn-info form-control nn n11">5</a>
				</div>
				<div class="w33">
					<a href="javascript:;" rel="6" class="btn btn-info form-control nn n11">6</a>
				</div>
			</div>
			<div class="rwx">
				<div class="w33">
					<a href="javascript:;" rel="7" class="btn btn-info form-control nn n11">7</a>
				</div>
				<div class="w33">
					<a href="javascript:;" rel="8" class="btn btn-info form-control nn n11">8</a>
				</div>
				<div class="w33">
					<a href="javascript:;" rel="9" class="btn btn-info form-control nn n11">9</a>
				</div>
			</div>
			<div class="rwx">
				<div class="w33">
				</div>
				<div class="w33">
					<a href="javascript:;" rel="0" class="btn btn-info form-control nn n11">0</a>
				</div>
				<div class="w33">
					<a href="javascript:;" class="btn btn-danger form-control delx n11">Sil</a>
				</div>
			</div>
		</p>
		<p>
			<button class="unLock btn btn-success form-control n11">GİRİŞ</button>
		</p>
	</div>
</div>


<!-- Modal -->
<div id="qModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Geri Bildirim</h4>
      </div>
      <div class="modal-body">
		<form action="<?php echo SUPPORT_POST;?>" method="post">
			<div class="row">
				<div class="col-xs-12">
					<select name="subject" class="form-control">
						<option value="Destek">Destek</option>
						<option value="Öneri">Öneri</option>
						<option value="Talep">Talep</option>
					</select>
				</div>
				<div class="col-xs-12">
					<textarea name="textMsg" class="form-control" rows="5"></textarea>
				</div>
				<div class="col-xs-12">
					<input type="submit" class="btn btn-info form-control" value="Gönder"/>
				</div>
			</div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
      </div>
    </div>

  </div>
</div>


<input type="hidden" class="isAct" value="0" />
<input type="hidden" class="stts" value="0" />
<input type="hidden" class="lock_time" value="0" />

<div id="depoModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-body">
		<form id="depoForm" action="" method="post">
			<p>
				<input type="text" name="depo_name" value="<?php echo $depo['depo_name'];?>" class="form-control depo_name" placeholder="Depo Adı"/>
			</p>
			<p>
				<input type="submit" class="form-control btn btn-success addDepo" value="Kaydet"/>
			</p>
		</form>
	  </div>
	</div>
  </div>
</div>

<?php if($_SESSION['time_warning'] == '1'){ ?>
	<div class="warnX" style="position:fixed; border-radius:5px; color:#fff; font-weight:bold; font-size:16px; right:80px; top:50px; z-index:999999; padding:15px; width:300px; background:#FF0000; text-align:center;">
		<i class="fa fa-exclamation-triangle"></i> &nbsp;&nbsp; Lisans süreniz &nbsp;&nbsp; <i class="fa fa-exclamation-triangle"></i> <br/> <?php echo $_SESSION['time_last'];?> tarihinde sona erecektir, <br/> lütfen üyeliğinizi yenileyiniz... <br/><br/>
		<a href="javascript:;" class="closeXXX" style="line-height:1; padding:5px; background:#fff; color:red; border-radius:5px;">Kapat</a>
	</div>
<?php }?>
<?php if($_SESSION['time_warning'] == '2'){ ?>
	<div class="warnX" style="position:fixed; right:0px; top:0px; bottom:0; left:0; z-index:999999; padding:150px; font-size:24px; color:#fff; background:rgba(0,0,0,0.7); text-align:center;">
		<div style="display:inline-block; padding:20px; background:#000; color:#fff; border-radius:10px;">
			Lisans süreniz <?php echo $_SESSION['time_last'];?> tarihinde sona ermiştir.<br> Lütfen üyeliğinizi yenileyiniz... <br>
			<a target="_blank" href="http://www.bulutkasapos.com">www.BulutkasaPos.com</a><br>
			0 212 909 91 09
		</div>
	</div>
<?php }?>

<script type="text/javascript" src="<?php echo ASSETS;?>js/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo ASSETS;?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo ASSETS;?>js/jquery.fancybox.js"></script>
<script type="text/javascript" src="<?php echo ASSETS;?>js/jquery.peity.min.js"></script>
<script type="text/javascript" src="<?php echo ASSETS;?>/js/datatable.min.js"></script>
<script type="text/javascript" src="<?php echo ASSETS;?>/js/select2.min.js"></script>
<!-- /core JS files -->

<!-- Theme JS files -->

<script type="text/javascript" src="<?php echo ASSETS;?>js/jquery.multi-select.js"></script>
<script type="text/javascript" src="<?php echo ASSETS;?>/js/jquery.quicksearch.js"></script>
<script type="text/javascript" src="<?php echo ASSETS;?>/js/jquery.quicksearch.js"></script>
<script type="text/javascript" src="<?php echo ASSETS;?>/js/screenfull.js"></script>
<script type="text/javascript" src="<?php echo ASSETS;?>/js/jquery.mask.js"></script>
<script src="<?php echo ASSETS;?>/js/jquery.number.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.1/sweetalert2.js"></script>


<script type="text/javascript"> 

	$(document).on("click",".link_tr", function(){
		var link = $(this).attr("link");
		window.location.href = link;
	});
	
	$('.lastTotal').number( true, 2 );
	$('.lastTotal').number( true, 2 );
	
	$(".tglTitle").click(function(){
		var rel = $(this).attr("rel");
		$(".tgl_"+rel).slideToggle();
	});
	
	$(".closeXXX").click(function(){
		$(".warnX").fadeOut();
	});


	function toggleFullScreen(elem) {
    // ## The below if statement seems to work better ## if ((document.fullScreenElement && document.fullScreenElement !== null) || (document.msfullscreenElement && document.msfullscreenElement !== null) || (!document.mozFullScreen && !document.webkitIsFullScreen)) {
    if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
        if (elem.requestFullScreen) {
            elem.requestFullScreen();
        } else if (elem.mozRequestFullScreen) {
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullScreen) {
            elem.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        } else if (elem.msRequestFullscreen) {
            elem.msRequestFullscreen();
        }
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        }
    }
}
	
	const target = $('body')[0];
	
	$(document).on("click",".fullscrn", function(){
		toggleFullScreen(document.body);
	});
	
	setInterval(function(){
		$.ajax({
			type : "get",
			url : "<?php echo SYSTEM_TEST;?>",
			success : function(response){
				console.log(response);
			}
		});
	},200000);
	
	$(".unLock").click(function(){
		$(".respPass").html("<i class='fa fa-refresh fa-spin'></i>");
		var pin = $(".lockPin").val();
		var authNum = $(".authNum").val();
		
		$.ajax({
			type : 'post',
			data : {'pin': pin},
			url : '<?php echo CHECK_AUTH;?>', 
			success : function(response){
				rowData = JSON.parse(response);
				if(rowData.status == 'ok'){
					for( var key in rowData.authList ){
						if(rowData.authList[key].auth_id == authNum){
							$(".auth").val("1");
						}
					}
					
					if($(".auth").val() == "1"){
						$(".user_id").val(rowData.user_id);
						$(".lockPin").val("");
						$("#lockDiv").hide();
						$(".isActive").val("1");
						$(".respPass").html("");
					}else{
						$(".respPass").html("<div class='alert alert-danger'>Yetkiniz bulunmamaktadır!</div>");
						
						
						
						window.location.href = '<?php echo MAIN_BOARD;?>';
					}
					
				}else{
					$(".respPass").html("Şifre Hatalıdır!");
				}
			}
		});
	});

	$(document).ready(function(){
		$('input').attr('autocomplete','off');
		$('#phone').mask('0-000-000-0000');
		
		$( ".datepicker" ).datepicker({
			dateFormat: "dd-mm-yy",
			monthNames: [ "Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık" ],
			dayNamesMin: [ "Pa", "Pt", "Sl", "Ça", "Pe", "Cu", "Ct" ],
			firstDay:1
		});
		$('.select2').select2();
		checkLockScreen();
		
		dataTbl();

	});
	$(document).mousemove(function(event){
       $(".stts").val('1');
    });
	function checkLockScreen(){
		$.ajax({
			type : 'get',
			url : '<?php echo CHECK_LOCK_SCREEN;?>',
			success : function(response){
				var dt = JSON.parse(response);
				$(".lock_time").val(dt.lock_time);
				parseInt(dt.lock_time * 1000);
				if(dt.lockScreen == '0'){
					$("#lockDiv").remove();
					$(".lockD").remove();
				}
				if(dt.lockScreen == '1'){
					 
						var auth = $(".auth").val();
						if(auth == '0'){
							$("#lockDiv").show();
						}
				}
			}
		});
	}
	$(document).on("click", ".LockScreen", function(){
		$(".stts").val('0');
		$("#lockDiv").show();
		$(".auth").val("0");
	});
	
	
	function setInt(lock_time){
		setInterval(function(){
		
			if(lock_time > 0){  
				var stts = $(".stts").val();
			
				if(stts == '0'){
					$("#lockDiv").show();
					$(".auth").val("0");
				}
				$(".stts").val('0');
				//console.log(lock_time);
			}
			
			/* $(".isAct").val('0');
			var auth = parseInt($(".auth").val());
			if(auth > 0){
				$("#lockDiv").show();
				$(".auth").val("0"); 
			}*/
			
			
		},lock_time);
	} 
	
	$(document).on("click",".tglMx",function(){
		$(".left1").toggle();
	});
	
	 
	
	$(".nn").click(function(){
		var rel = $(this).attr("rel");
		var str = $(".lockPin").val().trim();
		var newAmount = str+rel;
		$(".lockPin").val(newAmount);
	}); 

	$(".delx").click(function(){
		var str = $(".lockPin").val();
		str = str.slice(0, -1);
		$(".lockPin").val(str);
	});
	
	
	function dataTbl(){

	var table_id = "<?php echo $table['table_id'];?>";
	
	if(table_id == ""){
	
	
		if ( ! $.fn.DataTable.isDataTable( '.table' ) ) {
				  
	
			var oTable =  $(".table").DataTable({
					language : {
						"sDecimal":        ",",
						"sEmptyTable":     "Tabloda herhangi bir veri mevcut değil",
						"sInfo":           "_TOTAL_ kayıttan _START_ - _END_ arasındaki kayıtlar gösteriliyor",
						"sInfoEmpty":      "Kayıt yok",
						"sInfoFiltered":   "(_MAX_ kayıt içerisinden bulunan)",
						"sInfoPostFix":    "",
						"sInfoThousands":  ".",
						"sLengthMenu":     "Sayfada _MENU_ kayıt göster",
						"sLoadingRecords": "Yükleniyor...", 
						"sProcessing":     "İşleniyor...",
						"sSearch":         "Ara : ",
						"sZeroRecords":    "Eşleşen kayıt bulunamadı",
						"oPaginate": {
							"sFirst":    "İlk",
							"sLast":     "Son",
							"sNext":     "Sonraki",
							"sPrevious": "Önceki"
						},
						"oAria": {
							"sSortAscending":  ": artan sütun sıralamasını aktifleştir",
							"sSortDescending": ": azalan sütun sıralamasını aktifleştir"
						},
						
					},
					"order": [[ 0, "desc" ]]
				});
				
			}
			
			$('.customSrc').keyup(function(){
			   oTable.search( $(this).val() ).draw();
			});
		}
	}
	
</script>
</body>
</html>
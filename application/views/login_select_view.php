<?php include('includes/header-order.php');?>
<?php //debug($_SESSION); ?>
<style type="text/css">
	.lockD{display:none !important;}
	#lockDiv{display:none !important;}
	input{width:40px;border:0;}
	.btnXX{width:100%;height:100%;font-size:25px; background:#404040; color:#fff;}
	.xText{
		vertical-align:middle;
		margin-top: 25px
	}
	.col-sm-4{padding:0;}
	.tbl{display:table;}
	.tblrow{display:table-row;}
	.tblcell{display:table-cell;padding:3px;position:relative;width:33.333%;}
	.butonX1{background:#5B5351; color:#fff; font-size:14px; font-weight:bold;border-radius:5px; display:inline-block;border:0; padding:9px 16px;}
	.butonX1:hover{background:#4d4745 !important;color:#fff;}
	.butonX1:focus{color:#fff;text-decoration:none;}
	.w100{width:100%;}
	.pinWrapper{width: 310px;
    display: inline-block;
    float: none;
    margin: 15px auto 50px auto;
    border: 1px solid #ddd;
    padding: 15px;
    text-align: center;
    background: #f7f7f7;}
	.number{display: inline-block;
			float: left;
			width: 88px;
			height: 70px;
			/* border-radius: 50%; */
			padding: 20px 0;
			font-weight: bold;
			margin: 2px;
			background: #fff;
			font-size: 20px;
			border: 1px solid #ddd;
			color: #666;} 
	.number:hover{background:#f5f5f5;}
	.number:active{background:#666;color:#fff;}
	.number:focus{text-decoration:none;}
	.user_pass{width: 100%;
    border-bottom: 1px solid #ddd;
    text-align: center;
    /* padding-bottom: 15px; */
    margin-bottom: 15px;
    margin-top: -15px;
    font-size: 47px;
    line-height: 1;
    background: #f7f7f7;}
</style>
<div class="tbl" style="width:100%;">
	<div class="tblrow">
		<div class="tblcell">
			
		</div>
		<div class="tblcell">
			<form id="userForm">
				
				<div class="text-center">
					<div class="text-center">
						<img src="<?php echo FATHER_BASE;?>img/posopos2.jpg" alt="Posopos" width="80" />
						<!--<img src="<?php echo FATHER_BASE;?>../logo/marmaris-logo.png" alt="Posopos" width="80" />-->
					</div>
					<div style="padding-top:10px;">
						<b><?php echo $settings['store_name'];?> <br />
						Kullanıcı Girişi</b>
					</div>
					<div class="pinWrapper">
					<input type="password" class="user_pass" name="user_pass" placeholder="" />
						<a href="javascript:;" rel="1" class="number xbt">1</a>
						<a href="javascript:;" rel="2" class="number xbt">2</a>
						<a href="javascript:;" rel="3" class="number xbt">3</a>
						<a href="javascript:;" rel="4" class="number xbt">4</a>
						<a href="javascript:;" rel="5" class="number xbt">5</a>
						<a href="javascript:;" rel="6" class="number xbt">6</a>
						<a href="javascript:;" rel="7" class="number xbt">7</a>
						<a href="javascript:;" rel="8" class="number xbt">8</a>
						<a href="javascript:;" rel="9" class="number xbt">9</a>
						<a href="javascript:;"  class="number dll"><i class="fa fa-times"></i></a>
						<a href="javascript:;" rel="0" class="number xbt">0</a>
						<a href="javascript:;"  class="number loginBtn"><i class="fa fa-check"></i></a>
					</div>
				</div>
			</form>
		</div>
		<div class="tblcell">
			
		</div>
	</div>
	<div class="clearfix"></div>
</div>
<?php include('includes/footer-order.php');?>
<script type="text/javascript">
	
	$(".loginBtn").click(function(){
		var pass = $(".user_pass").val().trim();
		if(pass != ''){
			$.ajax({
				type : "post",
				url : "<?php echo LOGIN_SELECT_POST;?>",
				data : {"pass" : pass},
				success : function(response){
					if(response == 'success'){
						window.location.href = '<?php echo MAIN_BOARD;?>';
					}else{
						swal('','Bilgieriniz hatalıdır!','error');
					}
				}
			});
		}
	});
	
	$(".xbt").click(function(){
		var val = $(this).attr("rel");
		var pw = $(".user_pass").val();
		var newpw = pw+val;
		$(".user_pass").val(newpw);
	});
	
	$(".dll").click(function(){
		
		var pw = $(".user_pass").val();
		pw = pw.slice(0, -1);
		$(".user_pass").val(pw);
	});
	
	

	$(document).ready(function(){
		maxWindow();
		var hh = screen.height;
		var height = window.innerHeight
			|| document.documentElement.clientHeight
			|| document.body.clientHeight;
		
		var rh = parseInt(height / 3);
		
		$(".tbl").css('height', height+'px');
		$(".tblrow").css('height', rh+'px');
	});
	
	

    function maxWindow() {
        window.moveTo(0, 0);


        if (document.all) {
            top.window.resizeTo(screen.availWidth, screen.availHeight);
        }

        else if (document.layers || document.getElementById) {
            if (top.window.outerHeight < screen.availHeight || top.window.outerWidth < screen.availWidth) {
                top.window.outerHeight = screen.availHeight;
                top.window.outerWidth = screen.availWidth;
            }
        }
    }

	
</script>
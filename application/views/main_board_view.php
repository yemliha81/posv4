<?php include('includes/header-order.php');?>
<?php //debug($_SESSION); ?>
<style type="text/css">
	.lockD{display:none !important;}
	#lockDiv{display:none !important;}
	input{width:40px;border:0;}
	.btnXX{width:100%;height:100%; background:#404040; color:#fff;    padding: 40px 0; font-size: 25px;}
	.xText{
		vertical-align:middle;
		
	}
	.tglMx{display:none !important;}
	.col-sm-4{padding:0;}
	.tbl{display:table;}
	.tblrow{display:table-row;}
	.tblx{display:table-cell;vertical-align:middle;padding:3px;}
	
	.arrow_box {
		position: relative;
		background: #ddd;
		border: 1px solid #ddd;
	}
	.arrow_box:after, .arrow_box:before {
		bottom: 100%;
		left: 50%;
		border: solid transparent;
		content: " ";
		height: 0;
		width: 0;
		position: absolute;
		pointer-events: none;
	}

	.arrow_box:after {
		border-color: rgba(255, 255, 255, 0);
		border-bottom-color: #ddd;
		border-width: 8px;
		margin-left: -8px;
	}
	.arrow_box:before {
		border-color: rgba(221, 221, 221, 0);
		border-bottom-color: #ddd;
		border-width: 9px;
		margin-left: -9px;
	}
	.fontXX{font-size:15px;}
	@media only screen and (max-width: 800px) {
		.btnXX{ font-size: 16px;}
		.fontXX{font-size:11px;}
	}
</style>

<div class="tbl" style="width:100%;">
	<div class="row rowx" style="margin:0;">
		<?php if( $this->assist->check_auth1(2) == '1' ){?>
		<div class="col-sm-4 tblx">
			
				<a class="btnXX btn btn-<?php echo $cls;?> btn-float gotolink" link="<?php echo $this->assist->check_auth(2, TABLES_PAGE);?>" href="javascript:;">
					<span class="xText">MASALAR</span> <br />
					<span class="fa fa fa-th fa-2x"></span>
				</a>
			
		</div>
		<?php } ?>
		<?php if( $this->assist->check_auth1(4) == '1' ){?>
		<div class="col-sm-4 tblx">
			
				<a class="btnXX btn btn-<?php echo $cls;?> btn-float" href="<?php echo $this->assist->check_auth(4, KITCHEN);?>">
					<span class="xText">MUTFAK</span> <br />
					<span class="fa fa fa-coffee fa-2x"></span>
				</a>
			
		</div>
		<?php } ?>
		<!--<div class="col-sm-4 tblx">
			
				<a class="btnXX btn btn-<?php echo $cls;?> btn-float fullscrn" href="javascript:;"> 
					<span class="xText">TAM EKRAN</span> <br />
					<span class="fa fa fa-arrows-alt fa-2x"></span>
				</a>
			
		</div>-->
	
	<?php if( ($this->assist->check_auth1(6) == '1') OR ($this->assist->check_auth1(7) == '1') OR ($this->assist->check_auth1(8) == '1') ){?>
	
	<?php if( $this->assist->check_auth1(6) == '1' ){?>
		<div class="col-sm-4 tblx">
			
				<a class="btnXX btn btn-<?php echo $cls;?> btn-float" href="<?php echo $this->assist->check_auth(6, REPORTS_PAGE);?>">
					<span class="xText">RAPORLAR</span> </br>
					<span class="fa fa fa-line-chart fa-2x"></span>
				</a>
			
		</div>
	<?php } ?>
	<?php if( $this->assist->check_auth1(7) == '1' ){?>
		<div class="col-sm-4 tblx">
			
				<a class="btnXX btn btn-<?php echo $cls;?> btn-float" href="<?php echo $this->assist->check_auth(7, RESERVATION );?>">
					<span class="xText">REZERVASYON</span> </br>
					<span class="fa fa fa-calendar fa-2x"></span>
				</a>
			
		</div>
	<?php } ?>
	<?php if( $this->assist->check_auth1(8) == '1' ){?>
		<div class="col-sm-4 tblx">
			
				<a class="btnXX btn btn-<?php echo $cls;?> btn-float" href="<?php echo $this->assist->check_auth(8, CASH_PROCESS);?>">
					<span class="xText">KASA İŞLEMLERİ</span> </br>
					<span class="fa fa fa-money fa-2x"></span>
				</a>
			
		</div>
	<?php } ?>
	
	<?php } ?>
	
	<?php if( $this->assist->check_auth1(9) == '1' ){?>
		<div class="col-sm-4 tblx">
			
				<a class="btnXX btn btn-<?php echo $cls;?> btn-float" href="<?php echo $this->assist->check_auth(9, SETTINGS_MAIN);?>">
					<span class="xText">YÖNETİM</span>
					<br />
					<span class="fa fa fa-gear fa-2x"></span>
				</a>
			
		</div>
	<?php } ?>
	<?php if( $this->assist->check_auth1(10) == '1' ){?>
		<div class="col-sm-4 tblx">
			
				<a class="btnXX btn btn-<?php echo $cls;?> btn-float" href="<?php echo $this->assist->check_auth(10, CUSTOMERS_PAGE);?>">
					<span class="xText">MÜŞTERİLER</span> <br />
					<span class="fa fa fa-user fa-2x"></span>
				</a>
			
		</div>
	<?php } ?> 
		<div class="col-sm-4 tblx">
			<a class="btnXX btn btn-<?php echo $cls;?> btn-float" href="<?php echo LOGOUT;?>">
				<span class="xText">ÇIKIŞ</span> <br />
				<span class="fa fa fa-times-rectangle fa-2x"></span>
			</a>
		</div>
		<div class="col-sm-4 tblx" >
			<div style="background:#ff0000;color:#fff;position:absolute; top: 3px; bottom: 3px;right: 3px; left: 3px; border-radius: 3px; padding: 5px;">
				<div class="text-center" style="font-size:15px;"><b><?php echo $_SESSION['store_name'];?></b></div>
					<?php 
						$ftime = strtotime($_SESSION['c_insert_time']);
						$ltime = strtotime($_SESSION['c_close_time']);
						$dif = $ltime - strtotime(date('d.m.Y', time()));
						$days = $dif / (24*60*60);
						$perc = ($days / 365)*100;
					?>
				
				<div class="fontXX">
					<div class="col-sm-6 text-center" style="padding:0;">
						<span class="text-center"><b>Başlangıç <br /> <?php echo $_SESSION['c_insert_time'];?></b></span>
					</div>
					<div class="col-sm-6 text-center" style="padding:0;">
						<span class="text-center"><b>Bitiş<br /><?php echo $_SESSION['c_close_time'];?></b></span>
					</div>
					<div class="clearfix"></div>
				</div>
				<div style="border:1px solid #404040; height:20px;position:relative; border-radius:8px;overflow:hidden;background:#fff;">
					<div style="position:absolute; top:0;left:0; bottom:0; width:<?php echo $perc;?>%;background:#404040;"></div>
					<!--<span class="" style="position:absolute;left:<?php echo $perc;?>%;">Kalan <?php echo $days;?> Gün</span>-->
				</div>
				<div class="col-xs-12 text-center hidden-xs" style="font-size:30px; padding-top:20px; font-weight:bold;">
					<img src="<?php echo IMG;?>posopos-logo-white.png" width="80px" /> POSOPOS
					
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
<?php include('includes/footer-order.php');?>
<script type="text/javascript">
	$(document).ready(function(){
		maxWindow();
		
		var n = $(".tblx").length;
		
		
		var width = parseInt(window.innerWidth);
		//alert(width);
		if(width < 800){
			var height = 500;//((screen.height*window.devicePixelRatio)/3)-150;
		}else{
			var height = window.innerHeight
			|| document.documentElement.clientHeight
			|| document.body.clientHeight;
		}
		//alert(height);
		/* var height = window.innerHeight
			|| document.documentElement.clientHeight
			|| document.body.clientHeight; */
		
		if( n > 6 ){
			$(".tblx").addClass("col-xs-4");
		}
		if( n < 4 ){
			$(".tblx").addClass("col-xs-12");
		}
		
		var rh = parseInt(height / 3);
		
		$(".tbl").css('height', height+'px');
		$(".rowx").css('height', height+'px');
		$(".tblx").css('height', rh+'px');
	});
	
	$(".gotolink").click(function(){
		var link = $(this).attr("link");
		$.ajax({
			type : "get",
			url : link,
			success : function(response){
				
				if(response == 'error'){
					swal(
					 '',
					  '<div>Gün başı yapmanız gerekmektedir!</div>',
					  'error'
					);
				}else{
					window.location.href = link;
				}
				
			}
		});
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
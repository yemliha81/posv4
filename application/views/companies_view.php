<?php include('includes/header-order.php');?>
<style type="text/css">
	body{background:#F5F5F5;}
	.backToHome{font-size:20px;display:inline-block; line-height:1;padding:15px 25px; background:#4972B7; color:#fff;}
	.cat_btn{padding:20px 10px;font-size:20px; margin-right:5px;}
	.companyDiv{background:#fff; border-bottom:1px solid #ddd; padding:10px; line-height:1;}
	.dataTables_filter{display:none !important;}
	.dataTables_length{margin:0 10px;}
	.dataTables_info{margin:0 10px;}
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
					<span class="pageTitle">Satın Alma <i class="fa fa-chevron-right f18"></i> Tedarikçiler</span>
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
			<input type="text" class="customSrc srcStyle srcTerm srcX" placeholder="Search..." />
		</div>
		<div class="col-sm-3">
			<a data-toggle="modal" data-target="#companyModal" href="javascript:;" class="butonX1 w100 text-center" style="width:100%;">
				<span class="">TEDARİKÇİ EKLE</span> 
			</a>
		</div>
	</div>
	
		<div class="whiteZone f13" style="padding-right:0; padding-left:0;">
	
	
	
		
			<table class="table table-hover" id="tab-data">
				<thead>
					<tr>
						<th>Firma</th>
						<th>Telefon</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($companies as $kk => $vv){ ?>	
					<tr class="link_tr" link="<?php echo COMPANY_DETAILS_PAGE.$vv['company_id'];?>">
						<td><?php echo $vv['company_name'];?></td>
						<td><?php echo $vv['company_phone'];?></td>
						<td><?php echo $vv['company_mail'];?></td>
					</tr>
				<?php } ?>
				
				</tbody>
			</table>
		</div>
	</div>
</div>

<div id="companyModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
	<div class="modal-content">
      <div class="modal-body">
		<div class="row">
			<form id="compForm"  method="post">
				<p class="text-center borderB">
					<b>TEDARİKÇİ EKLE</b> <br /> <br />
				</p>
				<p>
					<div class="">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; FİRMA İSMİ</span>
						</div>
						<div class="col-xs-8">
							<input type="text" name="company_name"  class="form-control" placeholder=""/>
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
							<input type="submit" class="butonX1 addComp pull-right" value="KAYDET" style="width:110px; text-align-center;"/>
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
	$(".addComp").click(function(){
		var fD = $("#compForm").serialize();
		$.ajax({
			type : "post",
			url : '<?php echo ADD_COMPANY_POST;?>',
			data : fD,
			success : function(response){
				if(response == 'success'){
					swal("","Tedarikçi eklenmiştir!","success");
				}else{
					swal("","Hata oluştu!","error");
				}
			}
		});
	});
</script>
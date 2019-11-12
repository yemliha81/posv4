<?php include('includes/header-order.php');?>
<style type="text/css">
	.backToHome{font-size:20px;display:inline-block; line-height:1;padding:15px 25px; background:#4972B7; color:#fff;}
	.cat_btn{padding:20px 10px;font-size:20px; margin-right:5px;}
	.copied{position:relative;}
	.delRow{position:absolute; right:-30px; top:0;}
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
						<span class="pageTitle"><?php echo $title;?></span>
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
				<a  data-toggle="modal" data-target="#companyModal"  href="javascript:;" class="butonX1 w100 text-center" style="width:100%;">
					<span class="">BÖLGE DÜZENLE</span>
				</a>
			</div>
		</div>
		
			<div class="whiteZone f13" style="padding-right:0; padding-left:0;">
				<table class="table table-hover">
					<thead>
						<tr>
							<td><b>Masa ID</b></td>
							<td><b>Masa Adı</b></td>
						</tr>
					</thead>
					<tbody>
						<?php foreach($list as $key => $val){ ?>
							<tr class="link_tr2" table_id="<?php echo $val['table_id'];?>" table_name="<?php echo $val['table_name'];?>" table_zone="<?php echo $val['table_zone'];?>"  data-toggle="modal" data-target="#tableModal" >
								<td><?php echo $val['table_id'];?></td>
								<td><?php echo $val['table_name'];?></td>
								<!--<td class="text-right">  
								<a href="<?php echo DELETE_TABLE.$val['table_id'];?>" class="btn btn-danger">Sil</a> 
								</td>-->
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
</div>

<div id="tableModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
	  
	  <div class="row">
			<form action="<?php echo UPDATE_TABLE_POST;?>" method="post">
				<p class="text-center ">
					<b>MASA DÜZENLE</b> <br /> 
					<div class="clearfix"></div>
				</p>
				<div class="clearfix"></div>
				<p class="borderB">
					<div class="">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-info-circle"></i> &nbsp;&nbsp; BÖLGE : </span>
						</div>
						<div class="col-xs-8">
							<?php echo $zone['zone_name'];?>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</p>
				<div class="clearfix"></div>
				<p>
				
					<div class="">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; BÖLGE DEĞİŞTİR</span>
						</div>
						<div class="col-xs-8">
							<select name="zone_id" class="form-control tblZone select2"  required >
								<option value="">Bölge Seçiniz</option>
								<?php foreach($zone_list as $key => $val){ ?>
									<option value="<?php echo $val['zone_id'];?>">
										<?php echo $val['zone_name'];?>
									</option>
								<?php } ?>
							</select>
						</div>
						<div class="clearfix"></div>
					</div>
					
				
				</p>
				<p>
					<div class="">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; MASA İSMİ</span>
						</div>
						<div class="col-xs-8">
							<input type="hidden" name="table_id" class="tblId" value=""/>
							<input type="text" name="table_name" class="form-control tblName" value=""/>
						</div>
						<div class="clearfix"></div>
					</div>
				</p>
				<p class="borderB">
					<div class="">
						<div class="col-xs-6">
							<a href="javascript:;" class="butonFile delTable" style="width:110px; text-align-center;"><i class="fa fa-trash"></i> SİL</a>
						</div>
						<div class="col-xs-6">
							<input type="submit" class="butonX1 addDepo pull-right" value="GÜNCELLE" style="width:110px; text-align-center;"/>
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

<div id="companyModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
	  
	  <div class="row">
			<form action="<?php echo UPDATE_ZONE_POST;?>" method="post">
				<p class="text-center borderB">
					<b>BÖLGE DÜZENLE</b> <br /> <br />
				</p>
				<p >
				
					<div class="">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; BÖLGE İSMİ</span>
						</div>
						<div class="col-xs-8">
							<input type="hidden" name="zone_id" value="<?php echo $zone['zone_id'];?>"/>
							<input type="text" name="zone_name" class="form-control" value="<?php echo $zone['zone_name'];?>"/>
						</div>
						<div class="clearfix"></div>
					</div>
					
				
				</p>
				<p class="borderB">
				<div class="">
					<div class="col-xs-6">
						<a href="javascript:;" rel="<?php echo $zone['zone_id'];?>" class="butonFile delZone" style="width:110px; text-align-center;"><i class="fa fa-trash"></i> SİL</a>
					</div>
					<div class="col-xs-6">
						<input type="submit" class="butonX1 addDepo pull-right" value="KAYDET" style="width:110px; text-align-center;"/>
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

$(".delTable").click(function(){
	var table_id = $(".tblId").val();
	
	if(confirm("Masayı silmek istediğinizden emin misiniz?")){
	
		$.ajax({
			type : 'get',
			url : '<?php echo DELETE_TABLE;?>'+table_id,
			success : function(response){
				if(response == 'success'){
					alert("Masa silinmiştir!");
				}
				location.reload();
			}
		});
	
	}
});

$(".delZone").click(function(){
	var zone_id = $(this).attr("rel");
	
	if(confirm("Bölgeyi silmek istediğinizden emin misiniz?")){
	
		$.ajax({
			type : 'get',
			url : '<?php echo DELETE_ZONE;?>'+zone_id,
			success : function(response){
				if(response == 'success'){
					alert("Bölge silinmiştir!");
					location.reload();
				}
				if(response == 'tables'){
					swal('','Bu bölgeye atanmış masalar bulunmaktadır. Lütfen önce masaları siliniz.','warning');
				}
				
			}
		});
	
	}
});

$(".link_tr2").click(function(){
	var table_id = $(this).attr("table_id");
	var table_name = $(this).attr("table_name");
	var table_zone = $(this).attr("table_zone");
		$(".tblId").val(table_id);
		$(".tblName").val(table_name);
		$(".tblZone").val(table_zone);
});

</script>
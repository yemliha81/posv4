<?php include('includes/header-order.php');?>
<style type="text/css">
	.backToHome{font-size:20px;display:inline-block; line-height:1;padding:15px 25px; background:#4972B7; color:#fff;}
	.cat_btn{padding:20px 10px;font-size:20px; margin-right:5px;}
	.companyDiv{background:#f7f7f7; border-bottom:1px solid #ddd; padding:10px; line-height:1;}
	.dataTables_filter{display:none !important;}
	.dataTables_length{margin:0 10px;}
	.dataTables_info{margin:0 10px;}
</style>
<?php function trimNumber($number){
	
	if(substr($number,-3) == '000'){
		return substr($number,0,-4);
	}elseif(substr($number,-2) == '00'){
		return substr($number,0,-2);
	}elseif(substr($number,-1) == '0'){
		return substr($number,0,-1);
	}else{
		return $number;
	}
	
}?>
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
				<div class="col-sm-12">
					<span class="pageTitle">
						Stok Sayım Detayı: <?php echo $record['date1'].' - '.$record['depo_name'].' - '.$record['description'];?>
					</span>
				</div>
			</div>
				
			</div>
		</div>
	</div>
	
	
	<div class="mainContainer"style="padding:0 15px;">
	
		<div class="srcDiv row" style="margin-bottom:15px;">
			<div class="col-sm-8">
				<input type="text" class="customSrc srcStyle srcTerm srcX" placeholder="Ara..." />
			</div>
			<div class="col-sm-2">
				<a href="javascript:;" class="butonFile w100 text-center delR" style="width:100%;">
					<span class="">SİL</span> 
				</a>
			</div>
			<div class="col-sm-2">
				<a href="<?php echo STOCK_COUNT_ENTRY_UPDATE.$record['record_id'];?>" class="butonX1 w100 text-center" style="width:100%;">
					<span class="">GÜNCELLE</span>
				</a>
			</div>
		</div>
		<div class="whiteZone f13" style="padding-right:0; padding-left:0;">
			<table id="tab-data" class="table table-hover">
				<thead>
					<tr>
						<th>ÜRÜN</th>
						<th>MİKTAR</th>
						<th>BİRİM</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($products as $key => $val){ ?>
						<tr>
							<td><?php echo $val['pro_name'];?></td>
							<td><?php echo  trimNumber( number_format($val['qty'],3,",",".") );?></td>
							<td><?php echo $val['unit'];?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php include('includes/footer-order.php');?>

<script type="text/javascript">
$(".delDepo").click(function(){
	$.ajax({
		type : 'get',
		url : '<?php echo DELETE_DEPO.$depo['depo_id'];?>',
		success : function(response){
			swal("",response,"success");
			location.reload();
		}
	});
});

$(".delR").click(function(){
	
	swal({
	  title: 'Emin misiniz?',
	  text: "Stok Sayımı silinecektir!",
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
			type : 'get',
			url : '<?php echo STOCK_COUNT_DELETE.$record['record_id'];?>',
			success : function(response){
				if(response == 'success'){
					swal("","Kayıt Silinmiştir!","success");
					
					setTimeout(function(){
						window.location.href = '<?php echo STOCK_COUNT_ENTRY_LIST;?>';
					},1500)
					
				}
			}
		});
		
	  } else {
		// handle cancel
	  }
	});
});


</script>
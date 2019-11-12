<?php include('includes/header-order.php');?>
<style type="text/css">
	.backToHome{font-size:20px;display:inline-block; line-height:1;padding:15px 25px; background:#4972B7; color:#fff;}
	.cat_btn{padding:20px 10px;font-size:20px; margin-right:5px;}
	.companyDiv{background:#f7f7f7; border-bottom:1px solid #ddd; padding:10px; line-height:1;}
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
			<input type="text" class="customSrc srcStyle srcTerm srcX" placeholder="Ara..." />
		</div>
		<div class="col-sm-3">
			<a href="<?php echo STOCK_COUNT_ENTRY;?>" class="butonX1 w100 text-center" style="width:100%;">
				<span class="">YENİ SAYIM GİRİŞİ</span> 
			</a>
		</div>
	</div>
	
		<div class="whiteZone f13" style="padding-right:0; padding-left:0;">
			<table id="tab-data" class="table table-hover">
				<thead>
					<tr>
						<th>TARİH</th>
						<th>DEPO</th>
						<th>AÇIKLAMA</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($list as $key => $val){ ?>
						<tr class="link_tr" link="<?php echo STOCK_COUNT_ENTRY_DETAIL.$val['record_id'];?>">
							<td><?php echo $val['date1'];?></td>
							<td><?php echo $val['depo_name'];?></td>
							<td><?php echo $val['description'];?></td>
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

</script>
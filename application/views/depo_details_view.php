<?php include('includes/header-order.php');?>
<style type="text/css">
	.backToHome{font-size:20px;display:inline-block; line-height:1;padding:15px 25px; background:#4972B7; color:#fff;}
	.cat_btn{padding:20px 10px;font-size:20px; margin-right:5px;}
	.companyDiv{background:#f7f7f7; border-bottom:1px solid #ddd; padding:10px; line-height:1;}
</style>

<div class="left1">
	<a href="<?php echo MAIN_BOARD;?>" class="menuA" style="<?php if($mt == '1'){ echo 'color:#fff !important;'; }?>">
		<i class="fa iconW fa-home f20"></i> <span class="menuTitle">Ana Sayfa</span> 
	</a>
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
					<span class="pageTitle">Depolar</span>
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
				<span class="">DEPO EKLE</span> 
			</a>
		</div>
	</div>
	
		<div class="whiteZone f13" style="padding-right:0; padding-left:0;">
			<table id="tab-data" class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Tarih</th>
						<th>Firma ID</th>
						<th>Toplam</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($purchases as $key => $val){ ?>
					<tr>
						<td><?php echo $val['purchase_id'];?></td>
						<td><?php echo date('d-m-Y', $val['purchase_insert_time']);?></td>
						<td><?php echo $val['company_id'];?></td>
						<td><?php echo $val['last_total'];?></td>
						<td><a href="javascript:;">Detaylar</a></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>


<?php include('includes/footer-order.php');?>
<script type="text/javascript">
	$(document).ready(function(){
		$(".table").DataTable({
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
				}
			}
		}); 
	});

</script>
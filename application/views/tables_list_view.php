<?php include('includes/header-order.php');?>
<style type="text/css">
	.backToHome{font-size:20px;display:inline-block; line-height:1;padding:15px 25px; background:#4972B7; color:#fff;}
	.cat_btn{padding:20px 10px;font-size:20px; margin-right:5px;}
	.copied{position:relative;}
	.delRow{position:absolute; right:-30px; top:0;}
</style>
<div class="topBar">
	<a href="<?php echo MAIN_BOARD;?>" class="backToHome">
	<i class="fa fa-chevron-left"></i>
	<i class="fa fa-chevron-left"></i> Ana Sayfa</a>
</div>
<div>
	<div style="" class="container">
		<div class="panel panel-flat" style="padding:15px;">
			

		<b>Masa Listesi</b>
		<a href="<?php echo ADD_ZONE;?>" CLASS="btn btn-warning pull-right">+ Yeni Bölge Ekle</a> 
		<a href="<?php echo ADD_TABLE;?>" CLASS="btn btn-warning pull-right">+ Yeni Masa Ekle</a>
		<hr />
		
	
	<div>
		<table class="table">
		<thead>
			<tr>
					<td><b>Masa ID</b></td>
					<td><b>Masa Adı</b></td>
					<td></td>
				</tr>
		</thead>
		<tbody>
			<?php foreach($list as $key => $val){ ?>
				<tr>
					<td><?php echo $val['table_id'];?></td>
					<td><?php echo $val['table_name'];?></td>
					<td class="text-right">
					<a href="<?php echo UPDATE_TABLE.$val['table_id'];?>" class="btn btn-info">Düzenle</a>  
					<a href="<?php echo DELETE_TABLE.$val['table_id'];?>" class="btn btn-danger">Sil</a> 
					</td>
				</tr>
			<?php } ?>
		</tbody>
		</table>
	</div>

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
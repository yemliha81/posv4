<?php include('includes/header-order.php');?>
<style type="text/css">
	body{background:#F5F5F5;}
	.backToHome{font-size:20px;display:inline-block; line-height:1;padding:15px 25px; background:#4972B7; color:#fff;}
	.cat_btn{padding:20px 10px;font-size:20px; margin-right:5px;}
	.container{padding:0;}
	.f15{font-size:15px;}
</style>
<div class="topBar">
	<a href="<?php echo MAIN_BOARD;?>" class="backToHome">
	<i class="fa fa-chevron-left"></i>
	<i class="fa fa-chevron-left"></i> Ana Sayfa</a>
</div>
<div class="page-container ">
	<div class="container">
		<div class="panel panel-flat">
			<div style="padding:15px;">
			<div>
				<table class="table">
					<thead>
						<tr role="row srccc">
							<th>Ad - Soyad</th>
							<th>Telefon</th>
							<th>Kullanıcı Tipi</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($users as $kk => $vv){ ?>	
						<tr role="row" class="odd">
							<td><?php echo $vv['full_name'];?></td>
							<td><?php echo $vv['phone'];?></td>
							<td><?php echo number_format((float)($vv['rest']), 2, '.', '');?></td>
							<td>
								<a href="<?php echo CUSTOMER_DETAILS_PAGE.$vv['customer_id'];?>" type="button" class="btn btn-info btn-sm">
									 Detay <i class="fa fa-arrow-right"></i>
								</a>
							</td>
						</tr>
					<?php } ?>
					
					</tbody>
				</table>
			</div>
			</div> 
		</div>
	</div>
</div>
<?php include('includes/footer-order.php');?>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".srccc").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
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
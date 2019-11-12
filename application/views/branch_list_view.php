<?php include('includes/header-order.php');?>
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
					<span class="pageTitle">Şube Listesi</span>
				</div>
				<div class="col-sm-6">
					
				</div>
			</div>
				
			</div>
		</div>
	</div>
	
	
	<div class="mainContainer"style="padding:0 15px;">
	
		<div class="whiteZone f13" style="padding-right:0; padding-left:0;">
			<table class="table table-hover" id="tab-data">
				<thead>
					<tr>
						<th>Şube Adı</th>
						<th>Şehir</th>
						<th>İlçe</th>
						<th>Telefon</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($branches as $key => $val){ ?>	
					<tr class="link_tr" link="<?php echo BRANCH_DETAILS_PAGE.$val['branch_id'];?>">
						<td><?php echo $val['br_name'];?></td>
						<td><?php echo $val['br_city'];?></td>
						<td><?php echo $val['br_town'];?></td>
						<td><?php echo $val['br_phone'];?></td>
					</tr>
				<?php } ?>
				
				</tbody>
			</table>
		</div>
	</div>
</div>
	

<!-- Modal -->
<div id="addTModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Masa Ekleme</h4>
      </div>
      <div class="modal-body">
		<form action="<?php echo ADD_TABLE_POST;?>" method="post">
			<table class="table">
				<tr>
					<td>
						<select name="zone_id" class="form-control" required>
							<option value="">Bölge Seçiniz</option>
							<?php foreach($list as $key => $val){ ?>
								<option value="<?php echo $val['zone_id'];?>">
									<?php echo $val['zone_name'];?>
								</option>
							<?php } ?>
						</select>
					</td>
					<td></td>
				</tr>
				<tr>
					<td>
						<input type="number" name="table_qty" class="form-control" placeholder="Masa Sayısı Giriniz"/>
					</td>
					<td>
						<!--<input type="text" name="table_name" class="form-control" placeholder="Masa Adı Giriniz"/>-->
					</td>
					<td></td>
				</tr>
				<tr>
					<td>
						
					</td>
					<td>
						<input type="submit" class="btn btn-success" value="Kaydet"/>
					</td>
				</tr>
			</table>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->
<div id="addZModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Bölge Ekleme</h4>
      </div>
      <div class="modal-body">
		<form action="<?php echo ADD_ZONE_POST;?>" method="post">
			<table class="table">
					<tr>
						<td>
							<input type="text" name="zone_name" class="form-control" placeholder="Bölge Adı Giriniz"/>
						</td>
						<td></td>
					</tr>
					<tr>
						<td>
							<input type="submit" class="btn btn-success" value="Kaydet"/>
						</td>
						<td></td>
					</tr>
			</table>
		</form>
	</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
		
<?php include('includes/footer-order.php');?>
<script type="text/javascript">
	$(document).ready(function(){
		$(".ytable").DataTable({
			"order": [[ 0, 'asc' ], [ 1, 'asc' ]],
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
		$(".xtable").DataTable({
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
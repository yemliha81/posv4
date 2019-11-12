<?php include('includes/header-order.php');?>
<style type="text/css">
	.backToHome{font-size:20px;display:inline-block; line-height:1;padding:15px 25px; background:#4972B7; color:#fff;}
	.cat_btn{padding:20px 10px;font-size:20px; margin-right:5px;}
	.copied{position:relative;}
	.delRow{position:absolute; right:-30px; top:0;}
</style>
<div class="topBar hidden">
	<a href="<?php echo MAIN_BOARD;?>" class="backToHome">
	<i class="fa fa-chevron-left"></i>
	<i class="fa fa-chevron-left"></i> Ana Sayfa</a>
	<a href="<?php echo SETTINGS;?>" class="backToHome">
	<i class="fa fa-gear"></i> Yönetim</a>
	<a href="<?php echo USERS_AUTH;?>" class="backToHome">
	<i class="fa fa-user"></i> Kullanıcı Yetkileri</a>
</div>

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
					<span class="pageTitle">Bilgi Yönetimi</span>
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
			
		</div>
	</div>
	
		<div class="whiteZone f13" style="padding-right:0; padding-left:0;">
			<div>
				<form action="<?php echo UPDATE_FOOTER_POST;?>" method="post">
					<table class="table">
						<tr>
							<td>Adres : </td>
							<td><input type="text" name="address" class="form-control" placeholder="Adres" value="<?php echo $settings['address'];?>"/></td>
						</tr>
						<tr>
							<td>Telefon : </td>
							<td><input type="text" name="phone" class="form-control" placeholder="Telefon" value="<?php echo $settings['phone'];?>"/></td>
						</tr>
						<tr>
							<td>Telefon (GSM): </td>
							<td><input type="text" name="phone2" class="form-control" placeholder="Telefon" value="<?php echo $settings['phone2'];?>"/></td>
						</tr>
						<tr>
							<td>E-mail : </td>
							<td><input type="text" name="email" class="form-control" placeholder="E-mail" value="<?php echo $settings['email'];?>"/></td>
						</tr>
						<tr>
							<td>Çalışma Saatleri : </td>
							<td><input type="text" name="workHours" class="form-control" placeholder="Çalışma Saatleri" value="<?php echo $settings['workHours'];?>"/></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" class="butonX1" value="Kaydet"/></td>
						</tr>
					</table>
				</form>
			</div>
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
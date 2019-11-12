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
					<span class="pageTitle">Firma Bilgileri</span>
				</div>
				<div class="col-sm-6">
					
				</div>
			</div>
				
			</div>
		</div>
	</div>
	
	
	<div class="mainContainer"style="padding:0 15px;">
	
		<div class="whiteZone f13" style="padding-right:0; padding-left:0;">
			<div>
				<form action="<?php echo UPDATE_SETTINGS_POST;?>" method="post">
					<table class="table">
						<tr>
							<td><b>İş Yeri Adı :</b> </td>
							<td><input type="text" name="store_name" class="form-control" placeholder="İş Yeri Adı" value="<?php echo $settings['store_name'];?>"/></td>
						</tr>
						<tr>
							<td><b>Adres : </b>
							</td>
							<td><input type="text" name="address" class="form-control" placeholder="Adres" value="<?php echo $settings['address'];?>"/>
								<div class="alert alert-info" style="padding:6px; margin:0; margin-top:5px;">
									<i class="fa fa-info-circle"></i>
									Adres alanında  <span style="color:red;">bir alt satıra inmek için <span style="font-size:18px;font-weight:bold;">&lt;br/&gt;</span>
									yazıp</span> devam edebilirsiniz. 
								</div>
							</td>
						</tr>
						<tr>
							<td><b>Telefon : </b></td>
							<td><input type="text" name="phone" class="form-control" placeholder="Telefon" value="<?php echo $settings['phone'];?>"/></td>
						</tr>
						<tr>
							<td><b>Whatsapp Telefonu :</b></td>
							<td><input type="text" name="whatsapp" class="form-control" placeholder="Whatsapp" value="<?php echo $settings['whatsapp'];?>"/>
								<div class="alert alert-info" style="padding:6px; margin:0; margin-top:5px;">
									<i class="fa fa-info-circle"></i>
									Whatsapp için kullanılacak telefon numarası yazılırken boşluk verilmemelidir. 
								</div>
							</td>
						</tr>
						<tr>
							<td><b>E-mail :</b> </td>
							<td><input type="text" name="email" class="form-control" placeholder="E-mail" value="<?php echo $settings['email'];?>"/></td>
						</tr>
						<tr>
							<td><b>Web Sitesi :</b> </td>
							<td><input type="text" name="web" class="form-control" placeholder="Web Sitesi" value="<?php echo $settings['web'];?>"/></td>
						</tr>
						<tr>
							<td><b>Facebook Linki : </b></td>
							<td><input type="text" name="facebook" class="form-control" placeholder="Facebook Linki" value="<?php echo $settings['facebook'];?>"/>
								<div class="alert alert-info" style="padding:6px; margin:0; margin-top:5px;">
									<i class="fa fa-info-circle"></i>
									Sosyal medya linklerini yazarken başında "https://" olması gerekmektedir.
								</div>
							</td>
						</tr>
						<tr>
							<td><b>Instagram Linki : </b></td>
							<td><input type="text" name="instagram" class="form-control" placeholder="Instagram Linki" value="<?php echo $settings['instagram'];?>"/>
								<div class="alert alert-info" style="padding:6px; margin:0; margin-top:5px;">
									<i class="fa fa-info-circle"></i>
									Sosyal medya linklerini yazarken başında "https://" olması gerekmektedir.
								</div>
							</td>
						</tr>
						<tr>
							<td><b>Twitter Linki : </b></td>
							<td><input type="text" name="twitter" class="form-control" placeholder="Twitter Linki" value="<?php echo $settings['twitter'];?>"/>
								<div class="alert alert-info" style="padding:6px; margin:0; margin-top:5px;">
									<i class="fa fa-info-circle"></i>
									Sosyal medya linklerini yazarken başında "https://" olması gerekmektedir.
								</div>
							</td>
						</tr>
						<tr>
							<td><b>Çalışma Saatleri : </b></td>
							<td><input type="text" name="workhours" class="form-control" placeholder="" value="<?php echo $settings['workhours'];?>"/>
								<div class="alert alert-info" style="padding:6px; margin:0; margin-top:5px;">
									<i class="fa fa-info-circle"></i>
									Çalışma Saatleri alanında  <span style="color:red;">bir alt satıra inmek için <span style="font-size:18px;font-weight:bold;">&lt;br/&gt;</span>
									yazıp</span> devam edebilirsiniz. 
								</div>
							</td>
						</tr>
						<tr>
							<td><b>Google Harita Kodu :</b> </td>
							<td><input type="text" name="google_map" class="form-control" placeholder="" value="<?php echo $settings['google_map'];?>"/></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" class="butonX1 pull-right" value="KAYDET"/></td>
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
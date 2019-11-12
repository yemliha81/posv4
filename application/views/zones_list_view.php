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
						<span class="pageTitle">Masa ve Bölge Yönetimi</span>
					</div>
					<div class="col-sm-6">
						
					</div>
				</div>
					
				</div>
			</div>
		</div>
		
		
		<div class="mainContainer"style="padding:0 15px;">
		
		<div class="srcDiv row" style="margin-bottom:15px;">
			<div class="col-sm-6">
				<input type="text" class="customSrc srcStyle srcTerm srcX" placeholder="Search..." />
			</div>
			<div class="col-sm-3">
				<a data-toggle="modal" data-target="#addZModal" href="javascript:;" class="butonX1 w100 text-center" style="width:100%;">
					<span class="">BÖLGE EKLE</span> 
				</a>
			</div>
			<div class="col-sm-3">
				<a data-toggle="modal" data-target="#addTModal" href="javascript:;" class="butonX1 w100 text-center" style="width:100%;">
					<span class="">MASA EKLE</span> 
				</a>
			</div>
		</div>
		
			<div class="whiteZone f13" style="padding-right:0; padding-left:0;">
				<table class="table table-hover">
					<thead>
						<tr>
							<td><b>Bölge Adı</b></td>
							<td>Masa Sayısı</td>
						</tr>
					</thead>
					<tbody>
						<?php foreach($list as $key => $val){ ?>
							<tr class="link_tr" link="<?php echo ZONE_TABLES_LIST.$val['zone_id'];?>">
								<td><?php echo $val['zone_name'];?></td>
								<td><?php echo $val['num'];?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>

			  
			  <!--<div id="menu1" class="tab-pane fade">
					<table class="xtable table table-hover" width="100%">
						<thead>
							<tr>
									<td><b>Masa ID</b></td>
									<td><b>Masa Adı</b></td>
									<td></td>
								</tr>
						</thead>
						<tbody>
							<?php foreach($tables_list as $key => $val){ ?>
								<tr class="link_tr" link="<?php echo UPDATE_TABLE.$val['table_id'];?>">
									<td><?php echo $val['table_id'];?></td>
									<td><?php echo $val['table_name'];?></td>
									
								</tr>
							<?php } ?>
						</tbody>
					</table>

			  </div>-->
			</div>
		</div>
	</div>

<div id="addTModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
	  
	  <div class="row">
			<form id="" action="<?php echo ADD_TABLE_POST;?>" method="post">
				<p class="text-center borderB">
					<b>MASA EKLE</b> <br /> <br />
				</p>
				<p >
				
					<div class="">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; BÖLGE</span>
						</div>
						<div class="col-xs-8">
							<select name="zone_id" class="form-control select2" required>
								<option value="">Bölge Seçiniz</option>
								<?php foreach($list as $key => $val){ ?>
									<option value="<?php echo $val['zone_id'];?>">
										<?php echo $val['zone_name'];?>
									</option>
								<?php } ?>
							</select>
						</div>
						<div class="clearfix"></div>
					</div>
					
				
				</p>
				<p >
				
					<div class="">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; MASA SAYISI</span>
						</div>
						<div class="col-xs-8">
							<input type="number" name="table_qty" class="form-control" placeholder="Masa Sayısı Giriniz"/>
						</div>
						<div class="clearfix"></div>
					</div>
					
				
				</p>
				<p class="borderB">
				<div class="">
					<div class="col-xs-6">
						
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

<div id="addZModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
	  
	  <div class="row">
			<form action="<?php echo ADD_ZONE_POST;?>" method="post">
				<p class="text-center borderB">
					<b>BÖLGE EKLE</b> <br /> <br />
				</p>
				<p>
				
					<div class="">
						<div class="col-xs-4">
							<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; BÖLGE İSMİ</span>
						</div>
						<div class="col-xs-8">
							<input type="text" name="zone_name" class="form-control" placeholder="Bölge İsmi Giriniz"/>
						</div>
						<div class="clearfix"></div>
					</div>
					
				
				</p>
				<p class="borderB">
				<div class="">
					<div class="col-xs-6">
						
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
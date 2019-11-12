
<div class="text-center" style="padding:15px;">
	<img src="<?php echo IMG;?>posopos-logo.png" width="70%" />
	<!--<img src="<?php echo FATHER_BASE;?>../logo/marmaris-logo.png" width="70%" />-->
</div>
<a href="<?php echo MAIN_BOARD;?>" class="menuA" style="<?php if($mt == '1'){ echo 'color:#fff !important;'; }?>">
	<i class="fa iconW fa-home f20"></i> <span class="menuTitle">ANA SAYFA</span> 
</a>
<?php if($_SESSION['user_type_id'] == '1'){ ?>
<a href="<?php echo ALL_STOCK_DETAILS;?>" class="menuA tglTitle"  rel="1" style="white-space:nowrap; <?php if($mt2 == '2_1'){ echo 'color:#fff !important;'; }?>">
	<i class="fa iconW fa-cart-arrow-down f20"></i> <span class="menuTitle">STOK İŞLEMLERİ</span> 
</a>

<div class="tglMenu tgl_1" style="<?php if($mm == '2'){ echo 'display:block !important;'; }?>" >
	<a href="<?php echo PURCHASE;?>" class="menuA" style="<?php if($mt == '3'){ echo 'color:#fff !important;'; }?>">
		<i class="fa iconW fa-cart-arrow-down"></i> <span class="menuTitle">Satın Alma</span> 
	</a>
	<a href="<?php echo COMPANIES;?>" class="menuA" style="<?php if($mt == '4'){ echo 'color:#fff !important;'; }?>">
		<i class="fa iconW fa-building"></i> <span class="menuTitle">Tedarikçiler</span> 
	</a>
	<!--<a href="<?php echo STOCK_ENTRY_LIST;?>" class="menuA" style="<?php if($mt == '5'){ echo 'color:#fff !important;'; }?>">
		<i class="fa iconW fa-database"></i> <span class="menuTitle">Stok Girişi</span> 
	</a>
	<a href="<?php echo STOCK_COUNT_ENTRY_LIST;?>" class="menuA" style="<?php if($mt == '5_1'){ echo 'color:#fff !important;'; }?>">
		<i class="fa iconW fa-database"></i> <span class="menuTitle">Stok Sayımı</span> 
	</a>-->
	<a href="<?php echo ALL_STOCK_DETAILS;?>" class="menuA" style="<?php if($mt == '5_2'){ echo 'color:#fff !important;'; }?>">
		<i class="fa iconW fa-database"></i> <span class="menuTitle">Anlık Stok</span> 
	</a>
</div>

<a href="<?php echo DEPOS;?>" class="menuA" style="<?php if($mt == '6'){ echo 'color:#fff !important;'; }?>">
	<i class="fa iconW fa-database f20"></i> <span class="menuTitle">DEPOLAR</span> 
</a>

<a href="<?php echo CASH_PROCESS;?>" rel="13" class="menuA tglTitle" style="<?php if($mt == '13_1'){ echo 'color:#fff !important;'; }?>">
	<i class="fa iconW fa-money f20"></i> <span class="menuTitle">KASA İŞLEMERİ</span> 
</a>
<div class="tglMenu tgl_13" style="<?php if($mm == '13'){ echo 'display:block;'; }?>" >
	<a class="menuA"  href="<?php echo CASH_PROCESS;?>" style="<?php if($mt == '13_1'){ echo 'color:#fff !important;'; }?>" ><i class="fa fa-gear"></i> Açılış / Kapanış</a>
</div>
<a href="javascript:;" rel="14" class="menuA tglTitle" style="<?php if($mt == '14'){ echo 'color:#fff !important;'; }?>">
	<i class="fa iconW fa-gear f20"></i> <span class="menuTitle">YÖNETİM</span> 
</a>
<div class="tglMenu tgl_14" style="<?php if($mm == '14'){ echo 'display:block'; }?>" >
	<a class="menuA"  href="<?php echo PRODUCT_LIST;?>" style="<?php if($mt2 == '14_11'){ echo 'color:#fff !important;'; }?>" ><i class="fa fa-tag"></i> Ürün Yönetimi</a>
	<!--<a class="menuA"  href="<?php echo PRODUCT_IMAGE_LIST;?>" style="<?php if($mt2 == '14_11_1'){ echo 'color:#fff !important;'; }?>" ><i class="fa fa-camera"></i> Ürün Görselleri</a>-->
	<a class="menuA"  href="<?php echo MENU_CATS;?>" style="<?php if($mt2 == '14_21'){ echo 'color:#fff !important;'; }?>" ><i class="fa fa-coffee"></i> Menü Yönetimi</a>
	<a class="menuA"  href="<?php echo KITCHEN_LIST;?>" style="<?php if($mt2 == '14_23'){ echo 'color:#fff !important;'; }?>" ><i class="fa fa-cutlery"></i> Mutfak Yönetimi</a>
	<a class="menuA"  href="<?php echo ZONES_LIST;?>" style="<?php if($mt2 == '14_22'){ echo 'color:#fff !important;'; }?>" ><i class="fa fa-th"></i> Masa & Bölge</a>
	<a class="menuA"  href="<?php echo USER_SETTINGS;?>" style="<?php if($mt2 == '14_1'){ echo 'color:#fff !important;'; }?>" ><i class="fa fa-gear"></i> Genel Ayarlar</a>
	<a class="menuA"  href="<?php echo USER_SETTINGS2;?>" style="<?php if($mt2 == '14_2'){ echo 'color:#fff !important;'; }?>" ><i class="fa fa-users"></i> Kullanıcı Listesi</a>
	<a class="menuA"  href="<?php echo USER_SETTINGS3;?>" style="<?php if($mt2 == '14_3'){ echo 'color:#fff !important;'; }?>" ><i class="fa fa-users"></i> Kullanıcı Yetkileri</a>
	<a class="menuA"  href="<?php echo UPDATE_SETTINGS;?>" style="<?php if($mt2 == '14_31'){ echo 'color:#fff !important;'; }?>" ><i class="fa fa-lock"></i> Firma Bilgileri</a>
	<!--<a class="menuA"  href="<?php echo BRANCH_LIST;?>" style="<?php if($mt2 == '14_32'){ echo 'color:#fff !important;'; }?>" ><i class="fa fa-lock"></i> Şube Listesi</a>-->
</div>
<a href="<?php echo REPORTS_PAGE;?>" rel="1666" class="menuA tglTitle" style="<?php if($mt == '16'){ echo 'color:#fff !important;'; }?>">
	<i class="fa iconW fa-gear f20"></i> <span class="menuTitle">RAPORLAR</span> 
</a>
<div class="tglMenu tgl_1666" style="<?php if($mm == '16'){ echo 'display:block;'; }?>" >
	<a class="menuA reportSelect <?php if($mm == '16'){ echo 'reportAct'; }?>" href="javascript:;" style="<?php if($mt2 == '16_3'){ echo 'color:#fff !important;'; }?>"  rel="month" ><i class="fa fa-gear"></i> Özet Analiz</a>
	<!--<a class="menuA reportSelect <?php if($mm == '16'){ echo 'reportAct'; }?>" rel="analyse" href="javascript:;" ><i class="fa fa-gear"></i> Özet Analiz</a>-->
	<a class="menuA gdR" rel="order"  fDate="<?php echo date('m/d/Y H:i:s', $open_day['day_start_time']);?>" lDate="<?php echo date('m/d/Y H:i:s', time());?>" style="<?php if($mt2 == '16_2'){ echo 'color:#fff !important;'; }?>" ><i class="fa fa-gear"></i> Anlık Ciro</a>
	<a class="menuA reportSelect" href="javascript:;"  rel="order" ><i class="fa fa-gear"></i> Adisyon Detay Rap.</a>
	<a class="menuA reportSelect" href="javascript:;"  rel="cats" ><i class="fa fa-gear"></i> Ürün Satış Raporu</a>
	<a class="menuA reportSelect" href="javascript:;"  rel="cancelx" ><i class="fa fa-gear"></i> İptal & İkram Rap.</a>
	<a class="menuA" href="<?php echo COST_LIST;?>" style="<?php if($mt2 == '16_4'){ echo 'color:#fff !important;'; }?>" ><i class="fa fa-gear"></i> Reçeteli Maliyet</a>
	
	<!--<a class="menuA reportSelect" href="javascript:;"  rel="stock" ><i class="fa fa-gear"></i> Stok Raporları</a>-->
</div>
<a href="<?php echo CUSTOMERS_PAGE;?>" class="menuA" style="<?php if($mm == '161'){ echo 'color:#fff !important;'; }?>">
	<i class="fa iconW fa-users f20"></i> <span class="menuTitle">MÜŞTERİLER</span> 
</a>
<div class="tglMenu tgl_161" style="<?php if($mm == '161'){ echo 'display:block;'; }?>" >
	<a class="menuA"  href="<?php echo CUSTOMERS_PAGE;?>" style="<?php if($mt == '161_1'){ echo 'color:#fff !important;'; }?>" ><i class="fa fa-list"></i> Tüm Müşteriler</a>
	<a class="menuA"  href="<?php echo CUSTOMERS_DEBTS;?>" style="<?php if($mt == '161_2'){ echo 'color:#fff !important;'; }?>" ><i class="fa fa-list"></i> Borcu Olanlar</a>
	<a class="menuA"  href="<?php echo CUSTOMER_GROUPS;?>" style="<?php if($mt == '161_3'){ echo 'color:#fff !important;'; }?>" ><i class="fa fa-users"></i> Müşteri Grupları</a>
</div>
<a class="menuA"  href="<?php echo UPDATE_ORDER_SETTINGS;?>" style="<?php if($mt == '15_15'){ echo 'color:#fff !important;'; }?>" >
	<i class="fa fa-money"></i> <span class="menuTitle">ONLINE SİPARİŞ</span> 
</a>
<a class="menuA"  rel="17"  href="<?php echo RESERVATION;?>"  style="<?php if($mt == '17'){ echo 'color:#fff !important;'; }?>" >
	<i class="fa fa-calendar"></i> <span class="menuTitle">REZERVASYON</span>
</a>
<div class="tglMenu tgl_17" style="<?php if($mm == '17'){ echo 'display:block;'; }?>" >
	<a class="menuA"  href="<?php echo RESERVATION;?>" style="<?php if($mt2 == '17_1'){ echo 'color:#fff !important;'; }?>" ><i class="fa fa-calendar"></i> Takvim</a>
	<a class="menuA"  href="<?php echo RESERVATION_LIST;?>" style="<?php if($mt2 == '17_2'){ echo 'color:#fff !important;'; }?>" ><i class="fa fa-list"></i> Liste</a>
	<a class="menuA"  href="<?php echo RESERVATION_OLD_LIST;?>" style="<?php if($mt2 == '17_3'){ echo 'color:#fff !important;'; }?>" ><i class="fa fa-list"></i> Geçmiş Rez.</a>
</div>
<?php } ?>
<!--
<a href="<?php echo WEB_SETTINGS;?>" rel="15" class="menuA tglTitle" style="<?php if($mm == '22'){ echo 'color:#fff !important;'; }?>">
	<i class="fa iconW fa-globe f20"></i> <span class="menuTitle">WEB SİTESİ</span> 
</a>-->
<!--<div class="tglMenu tgl_15" style="<?php if($mm == '22'){ echo 'display:block;'; }?>" >
	<a class="menuA"  href="<?php echo UPDATE_FOOTER;?>" style="" ><i class="fa fa-list"></i> Footer Alanı</a>
	<a class="menuA"  href="<?php echo PRODUCT_LIST2;?>" style="<?php if($mt2 == '22_1'){ echo 'color:#fff !important;'; }?>" ><i class="fa fa-tag"></i> Ürün Yönetimi</a>
	<a class="menuA"  href="<?php echo MENU_CATS2;?>" style="<?php if($mt2 == '22_2'){ echo 'color:#fff !important;'; }?>" ><i class="fa fa-coffee"></i> Menü Yönetimi</a>
	<a class="menuA"  href="<?php echo UPDATE_SETTINGS2;?>" style="<?php if($mt2 == '22_3'){ echo 'color:#fff !important;'; }?>" ><i class="fa fa-lock"></i> Firma Bilgileri</a>
	
	<a class="menuA"  href="<?php echo UPDATE_SLIDES;?>" style="<?php if($mt2 == '22_5'){ echo 'color:#fff !important;'; }?>" ><i class="fa fa-image"></i> Slider</a>
	<a class="menuA"  href="<?php echo UPDATE_GALLERY;?>" style="<?php if($mt2 == '22_6'){ echo 'color:#fff !important;'; }?>" ><i class="fa fa-image"></i> Galeri</a>
	<a class="menuA"  href="<?php echo UPDATE_ABOUT_US;?>" style="<?php if($mt2 == '22_4'){ echo 'color:#fff !important;'; }?>" ><i class="fa fa-info-circle"></i> Hakkımızda</a>
</div>-->
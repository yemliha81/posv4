<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="user-scalable = yes" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<meta name="robots" content="noindex">
	<meta http-equiv="content-language" content="en"/>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE-edge"/>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo FATHER_BASE;?>img/Icon-128.png" />
	<style type="text/css">
		
		.backToHome{background:#2196f3 !important;border-radius:3px;text-decoration:none;}
		.backToHome:hover{color:#fff;text-decoration:none; background:#5880c4 !important;}
		.topBar{padding: 8px 15px; background: #505050; margin-bottom: 10px;}
		.w33{width:33.33%; float:left;min-height:1px;box-size:border-box; padding:2px;}
		.dataTables_filter{display:none !important;}
		.dataTables_length{margin:0 10px;}
		.dataTables_info{margin:0 10px;}
		.p20{padding:20px !important;}
	
	.switch {
	  position: relative;
	  display: inline-block;
	  width: 60px;
	  height: 27px;
	}

	.switch input {display:none;}

	.slider {
	  position: absolute;
	  cursor: pointer;
	  top: 0;
	  left: 0;
	  right: 0;
	  bottom: 0;
	  background-color: #ccc;
	  -webkit-transition: .4s;
	  transition: .4s;
	}

	.slider:before {
	  position: absolute;
	  content: "";
	  height: 20px;
	  width: 20px;
	  left: 9px;
	  bottom: 4px;
	  background-color: white;
	  -webkit-transition: .4s;
	  transition: .4s;
	}

	input:checked + .slider {
	  background-color: #1bc668;
	}

	input:focus + .slider {
	  box-shadow: 0 0 1px #2196F3;
	}

	input:checked + .slider:before {
	  -webkit-transform: translateX(26px);
	  -ms-transform: translateX(26px);
	  transform: translateX(26px);
	}

	/* Rounded sliders */
	.slider.round {
	  border-radius: 34px;
	}

	.slider.round:before {
	  border-radius: 50%;
	}
	</style>
	<link rel="stylesheet" href="<?php echo ASSETS;?>css/buttons.css"/>
	<link rel="stylesheet" href="<?php echo ASSETS;?>css/bootstrap.min.css?v=3454"/>
	<link rel="stylesheet" href="<?php echo ASSETS;?>fonts/font-awesome/css/font-awesome.min.css"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo ASSETS;?>css/style.css"/>
	<link rel="stylesheet" href="<?php echo ASSETS;?>css/icons/icomoon/styles.css"/>
	<link rel="stylesheet" href="<?php echo ASSETS;?>css/core.css?v=<?php echo time();?>"/>
	<link rel="stylesheet" href="<?php echo ASSETS;?>css/components.css"/>
	<link rel="stylesheet" href="<?php echo ASSETS;?>css/select2.min.css"/>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
	<link rel="stylesheet" href="<?php echo ASSETS;?>css/sweetalert2.min.css"/>
	<link rel="stylesheet" href="<?php echo ASSETS;?>flaticon/flaticon.css"/>
	
	<style type="text/css">
	.w100{width:100%;}
	a:hover {text-decoration:none !important;}
	
	.tglMenu{display:none;background:#2D2C2C;padding: 10px 0;}
	.tglMenu .menuA{border-bottom: 0; padding: 5px 10px 5px 24px; text-transform: none;font-size: 12px; }
	.menuA i{width:20px;}
	.tglMenu .menuA i{width:25px;}
	
	.bg1{background: #fff; padding: 7px; height: 32px;line-height: 1;font-size: 12px; overflow: hidden;border-left: 1px solid #666; border-bottom: 1px solid #666;}
	.bg2{background: #eee; padding: 7px; height: 32px;line-height: 1;font-size: 12px; overflow: hidden;border-left: 1px solid #666; border-bottom: 1px solid #666;}
	.bg3{position:fixed; background:#ddd; top:0; bottom:0; left:200px; right:0;}
	.bg4{background:#f5f5f5;}
	.srcResx{border:1px solid #ddd; padding:3px; border-radius:3px;}
	body{font-family: 'Roboto', sans-serif;color:#403637;}
	.lgnBox{background:#F8F8F8; border-radius:5px; padding:20px;}
	.input1{width: 100%; height: 30px; line-height: 30px; margin-bottom: 20px; padding-left: 10px; background-color: #e2e1df; color: #6E5F5F; border: 0; -webkit-border-radius: 6px; -moz-border-radius: 6px; border-radius: 6px;
    -webkit-transition-property: background-color;
    -webkit-transition-duration: 0.66s;
    -webkit-transition-timing-function: cubic-bezier(0.25, 1, 0.25, 1);
    -moz-transition-property: background-color;
    -moz-transition-duration: 0.66s;
    -moz-transition-timing-function: cubic-bezier(0.25, 1, 0.25, 1);
    -ms-transition-property: background-color;
    -ms-transition-duration: 0.66s;
    -ms-transition-timing-function: cubic-bezier(0.25, 1, 0.25, 1);
    -o-transition-property: background-color;
    -o-transition-duration: 0.66s;
    -o-transition-timing-function: cubic-bezier(0.25, 1, 0.25, 1);
    transition-property: background-color;
    transition-duration: 0.66s;
    transition-timing-function: cubic-bezier(0.25, 1, 0.25, 1);
}
		.menuA{font-weight:700;color:#999593; font-size:16px;display:block; padding:15px; padding-left:20px; border-bottom:1px solid #2d2c2c;} 
		.menuA:hover{text-decoration:none;color:#fff;}
		.menuA:focus{text-decoration:none;color:#fff;}
		.menuTitle{font-size:13px;display:inline-block;margin-left:15px;}
		.cRed{color:#FC6860;}
		.c2{color:#A39F9D;}
		.f13{font-size:13px;}
		.f14{font-size:14px;}
		.f15{font-size:15px;}
		.f16{font-size:16px;}
		.f17{font-size:17px;}
		.f18{font-size:18px;}
		.f19{font-size:19px;}
		.f20{font-size:20px;}
		.f21{font-size:21px;}
		.f22{font-size:22px;}
		.f24{font-size:24px;}
		.f30{font-size:30px;}
		.f35{font-size:35px;}
		.p10{padding:10px;}
		.p15{padding:15px;}
		.inB{display:inline-block;}
		.borderB{border-bottom:1px solid #ddd;}
		.mB15{margin-bottom:15px;}
		.pB15{padding-bottom:15px;}
		.butonX1sm{white-space:nowrap;background:#5B5351; color:#fff; font-size:13px; font-weight:bold;border-radius:5px; display:inline-block;border:0; padding:6px 4px;}
		.butonX1{background:#5B5351; color:#fff; font-size:14px; font-weight:bold;border-radius:5px; display:inline-block;border:0; padding:9px 16px;}
		.butonX1:hover{background:#4d4745 !important;color:#fff;}
		.butonX1:focus{color:#fff;text-decoration:none;}
		.butonX1sm:focus{color:#fff;background:#24f46d;text-decoration:none;}
		.butonX3{background:#fff;  color:#a39f9d; border: 2px solid #d2d0cf; font-size:14px; font-weight:bold; box-sizing:border-box; border:0; border-radius:5px; display:inline-block;padding:9px 16px;}
		.butonX3:hover{border-color:#a5a2a0;color:#403637;}
		.butonFile:hover{border-color:#a5a2a0;color:#403637;text-decoration:none;}
		.butonFile{text-align:center;
		background:#fff; border: 2px solid #d2d0cf; color:#a39f9d; 
		 font-weight:bold;border-radius:5px; 
		display:inline-block; padding:6px 12px; cursor:pointer;}
		.butonFile:focus{text-decoration:none;}
		.pageTitle{font-size:24px;padding:24px 7px;display:inline-block;}
		.left1{ position:fixed; z-index:111; width:200px; background:#373636; top:0; bottom:0;overflow-x:auto;}
		.left2{ position:fixed; background:#ddd; top:0; bottom:0; left:200px; right:0;overflow-x:auto;}
		.profile-span{display:inline-block; float:right; padding:15px 7px;cursor:pointer;}
		.userBack{border-radius:50%; background:#D2D0CF;padding:9px 10px;}
		.userBack2{border-radius:50%; background:#dfdddc;padding:9px 10px;}
		.profile-box{
			-webkit-box-shadow:0 3px 6px rgba(0,0,0,.25);
			-moz-box-shadow: 0 3px 6px rgba(0,0,0,.25);
			box-shadow: 0 3px 6px rgba(0,0,0,.25);
			font-size:15px;
			position:fixed; top:9px; right:9px; width:240px;z-index:222; background:#FDFDFD; border-radius:3px;border:1px solid #c5c4c2}
		.box-inner{border-bottom:1px solid #ddd;padding:10px 10px 10px 13px;} 
		.a_normal:hover{text-decoration:none;}
		.whiteZone{background:#fff; border-radius:6px; padding:15px;}
		.grayZone1{background:#E8E7E7; border-radius:6px; padding:15px;}
		.mainContainer{padding:0 5px;}
		.inputTitle{display:inline-block; font-weight:bold;color:#999593;}
		.inputTitle2{display:inline-block; font-weight:bold;color:#000;font-size:16px;padding-top: 8px;}
		.mainContainer{overflow-y:auto;}
		.form-controlx{font-size:13px !important;width:100%;height:32px;}
		.calendar-table>table>tr>td{padding:16px !important;}
		.calendar-table>table>thead>tr>td{padding:16px !important;}
		.calendar-table>table>tbody>tr>td{padding:16px !important;}
		.idC1{display:inline-block;background:#DEDDDC;border-radius:4px; min-width:28px; height:28px;text-align: center;
		padding: 6px;    letter-spacing: 1px;    font-weight: bold;    color: #E74C3C !important; }
	.idC2{display:inline-block;background:#DEDDDC;border-radius:4px; min-width:28px; text-align: center;padding: 6px;letter-spacing: 1px;font-weight: bold;color: #E74C3C !important;}
	.link_tr{cursor:pointer;}
	.link_tr2{cursor:pointer;}
	
	.i1{display:inline-block; width:22px;float:left;line-height:1;vertical-align:bottom;}
	.i2{display:inline-block; width:115px;float:left;line-height:1;vertical-align:bottom;}
	.i3{display:inline-block; width:82px;float:left;white-space:nowrap;line-height:1;vertical-align:bottom;}
	.a_normal{color:#ffa500;}
	.a_normal:hover{text-decoration:none;color:#dd9207;}
	.pgOuter{display:inline-block;border-radius:3px; overflow:hidden;}
	.page_num{display:inline-block; float:left;color:#9A9593; background:#D3D0CF; width:25px; height:25px; line-height:1;padding-top:5px;text-align:center;}
	.br2{border-right:1px solid #ededed;}
	.act{background:#fff;}  
	.srcStyle{background:#d2d0cf; width:100%; border-radius:5px; border:0;line-height:40px;height:40px; padding:0 10px; }
	.srcStyle:focus{outline: 0}
	.iconW{width:23px;}
	.tglM{display:none;}
	.inputTitle{white-space:nowrap;}
	.borderB b{font-size:20px;}
	.boxT1{width:48%; float:left; padding:46px 25px; -webkit-box-shadow: 0px 0px 10px 0px rgba(148,139,148,1);
		-moz-box-shadow: 0px 0px 10px 0px rgba(148,139,148,1);
		box-shadow: 0px 0px 10px 0px rgba(148,139,148,1);margin:5px;height: 150px;}
	.priceS{font-weight:bold;}
	.bestSellers{border-bottom: 1px solid #f5f5f5;
				line-height: 1;
				padding: 7px 0;}
	@media only screen and (max-width: 768px) {
		.inputTitle{}
		.left1{display:none;}
		.left2{left:0;position:relative;}
		.boxT1{width:100%;}
	}
</style>
	<title>Bulutkasa V4</title>
</head>
<body>

<a href="javascript:;" class="tglMx visible-xs" style="position:fixed;top:0; right:0;  z-index:99999999; background:#666; color:#fff; padding:15px;">
	<i class="fa fa-bars fa-2x"></i>
</a>

<?php  if(!empty($_SESSION['success'])){ ?>
	<div class="alert alert-success">
		<i class="fa fa-times fa-2x"></i> <?php echo $_SESSION['success'];?>
	</div>
<?php unset($_SESSION['success']); } ?>
<?php if(!empty($_SESSION['error'])){ ?>
	<div class="alert alert-danger">
		<i class="fa fa-times fa-2x"></i> <?php echo $_SESSION['error'];?>
	</div>
<?php unset($_SESSION['error']); } ?>
<?php //debug($_SESSION);?>
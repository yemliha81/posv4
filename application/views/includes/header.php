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
	<meta name="description" content="<?php if($product){ echo "You can find the whole information about ".$product['pro_name'].' and you can contact us for further assistance.'; }?>">
	<meta property="og:title" content="<?php if($product){ echo $product['pro_name'];}?>" />
	<meta property="og:type" content="website"/>
	<meta property="og:url" content="http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" />
	<meta property="og:image" content="<?php if($product){ echo  FATHER_BASE.'admin/img/products/big/'.substr($product['pro_img'], 0, -4).'-800px.jpg';} ?>" />
	<meta property="og:description" content="<?php if($product){ echo $product['pro_name'];}?>"/>
    <meta property="fb:app_id" content="" />
	
	<title><?php if($product){ echo $product['pro_name']; }?></title>

	<style type="text/css">

	</style>
	<link rel="stylesheet" href="<?php echo ASSETS;?>css/bootstrap.min.css"/>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="<?php echo ASSETS;?>fonts/font-awesome/css/font-awesome.min.css"/>
	<link href="https://fonts.googleapis.com/css?family=Amatic+SC|Dancing+Script|Lobster|Rajdhani" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo ASSETS;?>css/style.css"/>
	<link rel="stylesheet" href="<?php echo ASSETS;?>css/dropzone.css"/>
	<link rel="stylesheet" href="<?php echo ASSETS;?>css/easyzoom.css"/>
	<link rel="stylesheet" href="<?php echo ASSETS;?>css/example.css"/>
	<link rel="stylesheet" href="<?php echo ASSETS;?>css/pygments.css"/>
	<link rel="stylesheet" href="<?php echo ASSETS;?>css/jquery.fancybox.css"/>
	
</head>
<body>
<div id="fb-root"></div>
<script>/* (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_EN/sdk.js#xfbml=1&version=v2.9&appId=1235329666590218";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk')); */
</script>

<div class="header">
	<div class="col-sm-12 text-center">
	<div class="row">
		<div class="col-sm-2">
			<div class="hidden-xs">
				<a href="<?php echo FATHER_BASE;?>">
					<img src="<?php echo IMG;?>logo/logo2.png" width="100%"/>
				</a>
			</div>
			<div class="row visible-xs">
				<div class="col-xs-3"></div>
				<div class="col-xs-6 text-center">
					<a href="<?php echo FATHER_BASE;?>">
						<img src="<?php echo IMG;?>logo/logo2.png" width="80%"/>
					</a>
				</div>
				<div class="col-xs-3"></div>
			</div>
		</div>
		<div class="col-sm-10">
			<div class="top_nav">
				<div class="visible-xs">
					<span class="pull-right">
						<a href="javascript:;" class="toggleMenu">
							<i class="fa fa-bars"></i>
						</a>
					</span>
					<div class="clearfix"></div>
				</div>
				<div class="mobil_nav">
					<a href="<?php echo FATHER_BASE;?>">ANASAYFA</a>
						
							<!--<a href="<?php echo CATEGORIES;?>">MENÜ</a>-->
							<a href="<?php echo CAT_PAGE.'1';?>">MENÜ</a>
							
						<?php foreach($this->assist->pages() as $key => $val){ ?>
							<a href="<?php echo PAGE_DETAIL.$val['page_id'];?>"><?php echo $val['page_title'];?></a>
						<?php } ?>
					
					<a href="javascript:;" data-toggle="modal" data-target="#myModalx">REZERVASYON</a>
					<a href="<?php echo GALLERY;?>" >GALERİ</a>
					<!--<a href="<?php echo HOW_MUCH;?>">KAÇA PATLAR?</a>-->
					
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
		
		
	</div>
	
	<!-- Trigger the modal with a button -->

	
	<!--<div class="col-sm-3">
		<div class="top_nav">
			<input type="text" class="form-control srcTerm" placeholder="Search..."/>
			<div class="srcResults"></div>
		</div>
	</div>-->
	<div class="clearfix"></div>
</div>
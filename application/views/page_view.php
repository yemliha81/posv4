<?php include('includes/header.php');?>
<style type="text/css">
	img{border-radius:3px; overflow:hidden;}
</style>
<div class="container">
	<div class="">
		
		<?php if($page['page_id'] != 6){ ?>
		<div class="text-center"><h3><?php echo $page['page_title'];?></h3></div>
		<?php }?>
		<div><?php echo $page['google_map'];?></div>
		<?php if($page['page_img'] != ''){ ?>
		<div class="row" style="margin-top:15px;">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<img src="<?php echo FATHER_BASE.'admin/img/pages/'.$page['page_img'];?>" width="100%" alt=""/>
			</div>
			<div class="col-sm-3"></div>
		</div>
		<?php } ?>
		<?php if($page['page_id'] == 7){ ?>
		<div style="padding:10px; text-align:center;">
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<h4>BİZE ULAŞIN</h4>
				<form action="<?php echo CONTACT_POST;?>" method="post">
					<table class="table">
						<tr>
							<td>Adınız</td>
							<td><input type="text" class="form-control" name="first_name" required/></td>
						</tr>
						<tr>
							<td>Soyadınız</td>
							<td><input type="text" class="form-control" name="last_name" required/></td>
						</tr>
						<tr>
							<td>E-posta Adresiniz</td>
							<td><input type="email" class="form-control" name="user_mail" required/></td>
						</tr>
						<tr>
							<td>Mesajınız</td>
							<td><textarea name="user_text" class="form-control" cols="30" rows="4" required></textarea></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" value="GÖNDER" class="btn btn-info"/></td>
						</tr>
					</table>
				</form>
			</div>
			<div class="col-sm-3"></div>
		</div>
			
		</div>
		<?php }?>
		<div style="padding:10px;"><?php echo $page['page_text'];?></div>
	</div>
	
	<div class="clearfix"></div>
</div>
<?php include('includes/footer.php');?>
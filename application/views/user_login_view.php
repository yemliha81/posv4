<?php include('includes/header-order.php');
	//debug($_SESSION);
?>
<style type="text/css">
	.full_input{width:100%; display:block; padding:25px; font-size:20px;}
	.loginBtn{width:100%; display:block; padding:25px; font-size:20px; text-align:center;background:#31ce6d; color:#fff;}
</style>
<div class="container" style="">
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<form id="userForm" action="<?php echo USER_LOGIN_POST;?>" method="post">
				<div style="padding-top:200px;">
					<?php if($status == 'fail'){ ?>
						<div class="alert alert-danger">
							Bilgiler Hatalıdır!
						</div>
					<?php } ?>
					<div>
						<select class="full_input" name="user_type_id">
							<?php foreach($user_types as $key => $val){ ?>
								<option value="<?php echo $val['user_type_id'];?>">
									<?php echo $val['user_type_name'];?>
								</option>
							<?php } ?>
						</select>
					</div>
					<div>
						<input class="full_input" type="password" name="password" placeholder="ŞİFRE" required />
					</div>
					<div>
						<input class="full_input loginBtn" type="submit"  value="GİRİŞ " />
					</div>
				</div>
			</form>
		</div>
		<div class="col-sm-3"></div>
	</div>
</div>
<?php include('includes/footer-order.php');?>
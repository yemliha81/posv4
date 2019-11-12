<div class="row">
	<div class="">
		<form id="userUpdForm" method="post" action="<?php echo UPDATE_USER_POST;?>">
			<p class="text-center borderB">
				<b>KULLANICI DÜZENLE</b> <br /> <br />
			</p>
			<p>
				<div class="">
					<div class="col-xs-4">
						<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; İSİM</span>
					</div>
					<div class="col-xs-8">
						<input type="text" name="user_name" value="<?php echo $user_info['user_name'];?>" class="form-control" />
						<input type="hidden" name="user_id" value="<?php echo $user_info['user_id'];?>" class="form-control" />
					</div>
					<div class="clearfix"></div>
				</div>
			</p>
			<p>
				<div class="">
					<div class="col-xs-4">
						<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-user"></i> &nbsp;&nbsp; KULLANICI TÜRÜ</span>
					</div>
					<div class="col-xs-8">
						<select name="user_type_id" class="form-control select2 form-control">
							<?php foreach($user_types as $key => $val){ ?>
								<option value="<?php echo $val['user_type_id'];?>" 
									<?php if($val['user_type_id'] == $user_info['user_type_id']){ echo 'selected'; } ?>
								>
									<?php echo $val['user_type_name'];?>
								</option>
							<?php } ?>
						</select>
					</div>
					<div class="clearfix"></div>
				</div>
			</p>
			<p>
				<div class="">
					<div class="col-xs-4">
						<span class="inputTitle f15" style="margin-top:6px;"> <i class="fa fa-pencil"></i> &nbsp;&nbsp; ŞİFRE</span>
					</div>
					<div class="col-xs-8">
						<input type="text" name="password" class="form-control" value="<?php echo $user_info['password'];?>"/>
					</div>
					<div class="clearfix"></div>
				</div>
			</p>
			<p class="borderB">
				<div class="">
					<div class="col-xs-6">
						<?php if($user_info['status'] != '5'){ ?>
							<a href="javascript:;" class="butonFile archiveUser" userid="<?php echo $user_info['user_id'];?>" style="width:110px; text-align-center;"><i class="fa fa-archive"></i> ARŞİVLE</a>
						<?php }else{ ?>
							<a href="javascript:;" class="butonFile unarchiveUser" userid="<?php echo $user_info['user_id'];?>" style="width:110px; text-align-center;"><i class="fa fa-archive"></i> ARŞİVDEN ÇIKAR</a>
						<?php } ?>
					</div>
					<div class="col-xs-6">
						<input type="submit" class="butonX1 updBtn pull-right" value="GÜNCELLE" style="width:110px; text-align:center;"/>
					</div>
					<div class="clearfix"></div>
				</div>
					
			</p>
		</form>
	</div>
</div>
<div class="row">
	<div class="col-sm-2">
		<?php foreach($cat_list as $key => $val){ ?>
			<div class="cN2" cat_id="<?php echo $val['cat_id'];?>"><?php echo $val['cat_name'];?></div>
		<?php }?>
	</div>
	<div class="col-sm-10">
		<div class="row">
			<div class="col-sm-2">
				<div class="row">
					<div class="catsDiv"></div>
				</div>
			</div>
			<div class="col-sm-10">
				<div class="row">
					<form action="<?php echo PRICE_UPDATE_POST;?>" method="post">
						<div class="prodDiv"></div>
						<div style="margin-top:10px;">
							<input type="submit" class="btn btn-success pull-right" value="Kaydet"/>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
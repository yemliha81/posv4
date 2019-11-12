<link rel="stylesheet" href="<?php echo ASSETS;?>css/multi-select.css"/>
<div>
	<b><?php echo $menu['menu_name'];?></b>
</div>
<form id="mcForm" action="" method="post">
	<select name="catids[]" id='pre-selected-options' multiple='multiple'>
		<?php foreach($all_cats as $key => $val){ ?>
			<option value="<?php echo $val['cat_id'];?>" <?php echo $val['sel'];?>><?php echo $val['cat_name'];?></option>
		<?php } ?>
	</select>
	<div>
		<input type="hidden" name="menu_id" value="<?php echo $menu_id;?>" />
		<a href="javascript:;" class="btn btn-info addMC">Kaydet</a>
	</div>
</form>
<script type="text/javascript">
	$(document).ready(function(){
		$('#pre-selected-options').multiSelect();
		$(".ms-selectable").prepend("<div>Kategoriler</div>");
		$(".ms-selection").prepend("<div>Seçilenler</div>");
	});
</script>
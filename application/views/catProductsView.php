<div style="margin-bottom:10px;text-align:center;">
	<b><?php echo $cat['cat_name'];?> </br> KATEGORİSİ MENÜ İÇERİĞİ</b>
</div>
<form id="mcForm" action="" method="post">
	<select name="proids[]" id='pre-selected-options' multiple='multiple'>
		<?php foreach($all_products as $key => $val){ ?>
			<option value="<?php echo $val['pro_id'];?>" <?php echo $val['sel'];?>><?php echo $val['pro_name'];?></option>
		<?php } ?>
	</select>
	<div class="clearfix"></div>
	<div style="padding:15px 0;margin-bottom:15px;">
		<input type="hidden" name="cat_id" value="<?php echo $cat['cat_id'];?>" />
		<a href="javascript:;" class="butonX1 pull-right addCP" data-dismiss="modal">KAYDET</a>
	</div>
</form>
<script type="text/javascript">
	$(document).ready(function(){
		$('#pre-selected-options').multiSelect({
		  selectableHeader: "<input type='text' class='search-input form-control' autocomplete='off' placeholder='Ara'>",
		  selectionHeader: "<input type='text' class='search-input form-control' autocomplete='off' placeholder='Ara'>",
		  afterInit: function(ms){
			var that = this,
				$selectableSearch = that.$selectableUl.prev(),
				$selectionSearch = that.$selectionUl.prev(),
				selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
				selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

			that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
			.on('keydown', function(e){
			  if (e.which === 40){
				that.$selectableUl.focus();
				return false;
			  }
			});

			that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
			.on('keydown', function(e){
			  if (e.which == 40){
				that.$selectionUl.focus();
				return false;
			  }
			});
		  },
		  afterSelect: function(){
			this.qs1.cache();
			this.qs2.cache();
		  },
		  afterDeselect: function(){
			this.qs1.cache();
			this.qs2.cache();
		  }
		});
		$(".ms-selectable").prepend("<div><span class='inputTitle f15'>ÜRÜN EKLE</span></div>");
		$(".ms-selection").prepend("<div><span class='inputTitle f15'>ÜRÜN ÇIKAR</span></div>");
	});
</script>
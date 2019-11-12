<?php include('includes/header-order.php');?>
<style type="text/css">
	.backToHome{font-size:20px;display:inline-block; line-height:1;padding:15px 25px; background:#4972B7; color:#fff;}
	.cat_btn{padding:20px 10px;font-size:20px;}
	.pro_boxx{position:relative;display:inline-block; margin:3px; padding:20px; border:1px solid #ddd;color:#fff;}
	.products_box{border:1px solid #ddd; margin-bottom:10px; padding:5px;}
	.removePro{position:absolute;top:0;right:0;}
</style>
<div class="topBar">
	<a href="<?php echo MAIN_BOARD;?>" class="backToHome">
	<i class="fa fa-chevron-left"></i>
	<i class="fa fa-chevron-left"></i> Ana Sayfa</a>
	<a href="<?php echo UPDATE_PRICES;?>" class="backToHome">
	<i class="fa fa-refresh"></i> Toplu Fiyat Güncelle</a>
	
</div>
<div class="col-xs-12" style="padding:15px;">
	<?php foreach($products as $key => $val){ ?>
		<div style="background:#f7f7f7; border:1px solid #ddd;line-height:1; padding:8px;font-size:18px;"> 
			<?php echo $val['pro_name'];?>
		</div>
	<?php } ?>
</div>

<div id="addProModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
	
 
    <div class="modal-content">
	<div class="modal-header">
		<h4>Ürün Ekleme</h4>
	</div>
      <div class="modal-body"> 
		<p>
			<span>Kategori : </span><b><span class="cat_name"></span></b>
		</p>
		<div>
			
			
				<form action="<?php echo ADD_PRO_TO_CAT;?>" method="post">
					
					<p>
						<input type="hidden" name="cat_id" class="cat_id" value="" />
						<input type="text" name="pro_name" class="form-control" placeholder="Ürün Adı Griniz." />
					</p>
					<p>
						<input type="submit" class="btn btn-success" value="Kaydet" />
					</p>
				</form>
			
			
		</div>
		
		<div class="clearfix"></div>
      </div>
    </div>

  </div>
</div>
<div id="proModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

 
    <div class="modal-content">
      <div class="modal-body">
		<p class="proRes"></p>
		<div class="clearfix"></div>
      </div>
    </div>

  </div>
</div>	

<div id="catModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
		<b>Kategori Düzenleme</b>
	  </div>
      <div class="modal-body">
		<form action="<?php echo UPDATE_CAT_POST;?>" method="post">
			<input type="hidden" name="cat_id" class="catId" value="" />
			<p>
				<input type="text" class="form-control catName" name="catName" value="" />
			</p>
			<p>
				<input type="submit" value="Kaydet" class="btn btn-success form-control" />
			</p>
		</form>
      </div>
    </div>

  </div>
</div>
<div id="addCatModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
		<b>Kategori Ekleme</b>
	  </div>
      <div class="modal-body">
		<form action="<?php echo ADD_CAT_POST;?>" method="post">
			<input type="hidden" name="cat_id" class="catId" value="" />
			<p>
				<input type="text" class="form-control catName" name="catName" placeholder="Kateogri Adı giriniz" />
			</p>
			<p>
				<input type="submit" value="Kaydet" class="btn btn-success form-control" />
			</p>
		</form>
      </div>
    </div>

  </div>
</div>

<?php include('includes/footer-order.php');?>
<script type="text/javascript">
	
	$(document).on("click", ".clsModal", function(){
		$('.modal-backdrop').remove();
	});
	
	$(".pro_boxx").click(function(){
		
		var pro_id = $(this).attr("pro_id");
		get_pro(pro_id);
	});
	
	function get_pro(pro_id){
		$(".proRes").html("yükleniyor... <i class='fa fa-refresh fa-spin'></i>");
		$.ajax({
			type : "get",
			url : "<?php echo GET_PRO;?>"+pro_id,
			success : function(response){
				$(".proRes").html(response);
			}
		});
	}
	
	
	$(".removePro").click(function(){
		var id = $(this).attr("id");
		var pro_id = $(this).attr("pro_id");
		var cat_id = $(this).attr("cat_id");
		//$(this).parent().remove();
		$.ajax({
			type : "post",
			url : "<?php echo REMOVE_PRO;?>",
			data : {"pro_id" : pro_id, "cat_id" : cat_id},
			success : function(response){
				if(response == 'success'){
					$("#"+id).parent().fadeOut();
				}
			}
		});
		//alert("test");
	});
	
	$(document).on("click",".pro_color", function(){
		var pro_bg = $(this).attr("bg");
		$(".pro_color").removeClass("actBox");
		$(this).addClass("actBox");
		$(".pro_bg").val(pro_bg);
	});
	
	$(document).on("click",".optRemove", function(){
		var rel = $(this).attr("rel");
		var pro_id = $(this).attr("pro_id");
		$.ajax({
			type : "get",
			url : "<?php echo DEL_OPT;?>"+rel+'/'+pro_id,
			success : function(response){
				if(response == 'success'){
					get_pro(pro_id);
				}
			}
		});
	});
	
	$(document).on("click",".updateOptions", function(){
		var pro_id = $(".prId").val();
		var formData = $("#optForm").serialize();
			$.ajax({
				type : "post",
				data : formData,
				url : "<?php echo PRO_OPT_POST;?>",
				success : function(response){
					//alert(response);
					if(response == 'success'){
						//alert(response);
						$('#optionModal').modal('hide');
						$('body').removeClass('modal-open');
						$('.modal-backdrop').remove();
						get_pro(pro_id);
					}
					
				}
			});
	});
	
	$(".addPro").click(function(){
		var cat_id = $(this).attr("cat_id");
		var cat_name = $(this).attr("cat_name");
		$(".cat_id").val(cat_id);
		$(".cat_name").html(cat_name);
	});
	
	$(".updCat").click(function(){
		var cat_id = $(this).attr("cat_id");
		var cat_name = $(this).attr("cat_name");
		$(".catId").val(cat_id);
		$(".catName").val(cat_name);
	});
	
</script>
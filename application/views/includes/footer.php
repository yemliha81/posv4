<div class="text-center footer_menu">
	<a href="<?php echo FATHER_BASE;?>">ANASAYFA</a>&nbsp;&nbsp;&nbsp;
	 |&nbsp;&nbsp;&nbsp; <a href="<?php echo CATEGORIES;?>">MENÜ</a>&nbsp;&nbsp;&nbsp;
	<?php foreach($this->assist->pages() as $key => $val){ ?>
		 |&nbsp;&nbsp;&nbsp; <a href="<?php echo PAGE_DETAIL.$val['page_id'];?>"><?php echo $val['page_title'];?></a>&nbsp;&nbsp;&nbsp;
	<?php } ?>
	|&nbsp;&nbsp;&nbsp; <a href="javascript:;" data-toggle="modal" data-target="#myModalx">REZERVASYON</a>&nbsp;&nbsp;&nbsp;
	|&nbsp;&nbsp;&nbsp; <a href="<?php echo GALLERY;?>" >GALERİ</a>
</div>

<!-- Modal -->
<div id="myModalx" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Online Rezervasyon Formu</h4>
      </div>
      <div class="modal-body">

      	<iframe src="http://patrongeldi.com/frame/1f173097-8641-4f99-8f9e-e90cd5be359f" frameBorder="0" style="width:100%;height:500px"></iframe>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
      </div>
    </div>

  </div>
</div>


</body>
<script type="text/javascript" src="<?php echo ASSETS;?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo ASSETS;?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo ASSETS;?>js/dropzone.js"></script>
<script type="text/javascript" src="<?php echo ASSETS;?>js/easyzoom.js"></script>
<script type="text/javascript" src="<?php echo ASSETS;?>js/jquery.fancybox.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">


	$(document).ready(function(){
		
	
		$(".m_toggle").click(function(){
			var rel = $(this).attr("rel");
			$("#"+rel).slideToggle();
		});
		
		setTimeout(function(){
			$(".alert").fadeOut(1500);
		},1000);
		
		$(".item:first").addClass("active");
		$(".dots:first").addClass("active");
	
	
		$(".show_cats").mouseover(function(){
			$(".cats_div").removeClass("hidden");
		});
		$(".show_cats").mouseleave(function(){
			$(".cats_div").addClass("hidden");
		});
	
	});
	
	$(".srcTerm").keyup(function(){
		var term = $(this).val().trim();
		if(term != ''){
			
			$.ajax({
				type : "post",
				url : "<?php echo SEARCH_LINK;?>",
				data : { "term" : term },
				success : function(response){
					
					$(".srcResults").html(response);
					
				}
			});
			
		}else{
			$(".srcResults").html("");
		}
	});
	
	$(".toggleMenu").click(function(){
		$(".mobil_nav").slideToggle();
	});
	
	
	  $( function() {
		$( "#datepicker" ).datepicker( { dateFormat: 'dd-mm-yy' } );
	  });

	$(".sendForm").click(function(){
		var first_name = $(".first_name").val().trim();
		var last_name = $(".last_name").val().trim();
		var user_mail = $(".user_mail").val().trim();
		var user_gsm = $(".user_gsm").val().trim();
		var total_person = $(".total_person").val().trim();
		var reservation_date = $(".reservation_date").val().trim();
		
		if(first_name != '' && last_name != '' && user_mail != '' && user_gsm != '' && total_person != '' && reservation_date ){
			
			if(gsmValidate(user_gsm) == true){
				
				if(validateEmail(user_mail) == true){
					$(".sendForm").addClass('disabled');
					$(".pleaseWait").show();
					$("#reservationForm").submit();
				}else{
					alert("Lütfen geçerli bir email adresi giriniz. Ör. example@domain.com");
				}
				
			}else{
				alert("Telefon numaranız 10 haneden oluşmalıdır. Ör. 5556667788");
			}
			
		}else{
			alert("Lütfen Gerekli alanları doldurunuz!");
		}
		
		
	});
	
	function gsmValidate(number){
		 return number.match(/\d/g).length===10;
	}
	
	function validateEmail(email){
		var re = /\S+@\S+\.\S+/;
		return re.test(email);
	}
	
</script>

</body>
</html>
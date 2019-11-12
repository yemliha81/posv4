<?php
if( isset($error) AND $error != NULL ) {
    ?>
    <div class="alert alert-danger alert_t w_patten">
        <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
        <strong> HATA !&nbsp;&nbsp;</strong> <?php echo $error; ?>
    </div>
<?php }
if( isset($success) AND $success != NULL ) {
    ?>
    <div class="alert alert-success alert_t w_patten">
        <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
        <strong><i class="fa fa-thumbs-up"></i> BAŞARILI !&nbsp;&nbsp;</strong> <?php echo $success; ?>
    </div>
<?php }
if( isset($warning) AND $warning != NULL ) {
    ?>
    <div class="alert alert-warning alert_t w_patten">
        <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
        <strong><i class="fa fa-warning"></i> UYARI !&nbsp;&nbsp;</strong> <?php echo $warning; ?>
    </div>
<?php }
if( isset($info) AND $info != NULL ) {
    ?>
    <div class="alert alert-info alert_t w_patten">
        <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
        <strong><i class="fa fa-info-circle"></i> BİLGİ !&nbsp;&nbsp;</strong> <?php echo $info; ?>
    </div>  
<?php } ?>
      

			


			


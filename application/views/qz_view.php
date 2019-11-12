<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<script type="text/javascript" src="<?php echo ASSETS;?>js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS;?>js/qz/qz-tray.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS;?>js/qz/rsvp-3.1.0.min.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS;?>js/qz/sha-256.min.js"></script>
</head>
<body>
	<a href="javascript:;" class="print">Print</a>
</body>
<script type="text/javascript">
	$(".print").click(function(){
		qz.websocket.connect().then(function() {
		  print();
		});
	});
	
	function print() {
	   var config = qz.configs.create("Send To OneNote 2016");

	   var data = [
		  'Data\n',
		  'Should be simple data\n',
		  'To be printed\n'
	   ];

	   qz.print(config, data).catch(function(e) {
		   console.error(e);
	   });
	}
</script>
</html>
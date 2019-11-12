<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<style type="text/css">
		iframe{position:fixed; width:100%; top:0; bottom:0; right:0; left:0; border:0;}
	</style>
</head>
<body>
	<iframe id="iframe_id" src="http://agoranisantasi.com/login" frameborder="0"></iframe>
	
	<script type="text/javascript">
		$(document).ready(function(){
			
			
			var height = window.innerHeight
				|| document.documentElement.clientHeight
				|| document.body.clientHeight;
			
			var rh = parseInt(height / 3);
			
			$("iframe").css('height', height+'px');
		});
		
		$('#iframe_id').on('click', function(event) { alert("test"); });
		
		
		function requestFullScreen(element) {
			// Supports most browsers and their versions.
			var requestMethod = element.requestFullScreen || element.webkitRequestFullScreen || element.mozRequestFullScreen || element.msRequestFullScreen;

			if (requestMethod) { // Native full screen.
				requestMethod.call(element);
			} else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
				var wscript = new ActiveXObject("WScript.Shell");
				if (wscript !== null) {
					wscript.SendKeys("{F11}");
				}
			}
		}
		
	</script>
</body>
</html>

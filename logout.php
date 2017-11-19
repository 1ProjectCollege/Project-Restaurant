<?php
session_start();
if(session_destroy())
{
echo"<meta http-equiv='refresh'content='5;url=index.php'>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<div>
<div>
<!--Form-->
<form id="lockScreenForm" role="form" action="index.php" class="login-form">
<button type="submit" class="btn btn-dark btn-block btn-login">Go Home</button>
</form>
<div class="login-options"></div>
</div>
</div>
</section>
<!-- Semi general-->
<script type="text/javascript">
var paceSemiGeneral = { restartOnPushState: false };
if (typeof paceSpecific != 'undefined'){
	var paceOptions = $.extend( {}, paceSemiGeneral, paceSpecific );
	paceOptions = paceOptions;
}else{
	paceOptions = paceSemiGeneral;
}

</script>
</body>
</html>
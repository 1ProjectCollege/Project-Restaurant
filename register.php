<?php
// Checks if the user is logged in
session_start();
if (isset($_SESSION['userSession'])!=""){
header("Location: index.php");
}
require_once 'configs.php';
if(isset($_POST['resto-signup'])) {
$fname = strip_tags($_POST['fname']);
$lname = strip_tags($_POST['lname']);
$email = strip_tags($_POST['email']);
$password = strip_tags($_POST['password']);
$fname = $restodb->real_escape_string($fname);
$lname = $restodb->real_escape_string($lname);
$email = $restodb->real_escape_string($email);
$password = $restodb->real_escape_string($password);
$hpassword = md5($password);
$check_email = $restodb->query("SELECT email FROM users WHERE email='$email'");
$count=$check_email->num_rows;
if ($count==0) {
$query = "INSERT INTO users (email, password, firstname, lastname, signup_date)VALUES('$email', '$hpassword', '$fname', '$lname', NOW())";
if ($restodb->query($query)) {
$msg = "<div class='alert alert-success'>
<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Successfully registered!
<meta http-equiv='refresh'content='1; url=index.php'>
</div>";
}else {
$msg = "<div class='alert alert-danger'>
<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error while registering!
</div>";
}
}else{
$msg = "<div class='alert alert-danger'>
<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Sorry email already taken!
</div>";
}
$restodb->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<!--SECTION-->
<section>
<!--Main Content-->
<div>
<div>
<!--Login Form-->
<?php
  if (isset($msg)) {
   echo $msg;
  }
  ?>
<form id="registerForm" role="form" method="post" action="" class="login-form">
<div class="form-group">
<input id="fname" type="text" name="fname" placeholder="First Name" class="form-control">
</div>
<div class="form-group">
<input id="lname" type="text" name="lname" placeholder="Last Name" class="form-control">
</div>
<div class="form-group">
<input id="email" type="email" name="email" placeholder="Email" class="form-control">
</div>
<div class="form-group">
<input id="registerPassword" type="password" name="password" placeholder="Password" class="form-control">
</div>
<div class="form-group">
<input id="registerPasswordRepeat" type="password" name="registerPasswordRepeat" placeholder="Repeat password" class="form-control">
</div>
<div class="checkbox">
<input id="registerTerms" type="checkbox" name="registerTerms" class="checkradios checkradiosDark-1">By signing up you are accepting our <a href="#">Terms and Conditions</a>
</div>
<button type="submit" name="resto-signup" class="btn btn-dark btn-block btn-login">Sign Up</button>
</form>  
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
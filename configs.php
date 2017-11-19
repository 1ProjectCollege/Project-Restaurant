<?php
/*
|--------------------------------------------------------------------------
| No edit
|--------------------------------------------------------------------------
| From now on, we recommend not to change the code to maintain default operation script.
| All changes must be made on data found above. If NOT that means that the CMS is still in Alpha/Beta Mode.
| Thus, making any changes might break the code. This CMS is tagged "IN DEVELOPMENT"
*/

/* FUNCTIONS */
ob_start();  
if(file_exists("install"))
{
	header("Location: install");
	die();
}

/* SOCIAL LINKS */
$socialnk['Facebook'] 	= "https://www.facebook.com/";
$socialnk['Twitter']  	= "#";

/* CMS LINKS */
$cms['name']		= "Site";
$cms['title']   	= "Site |";
$cms['description'] = "#";
$cms['keywords']	= "#";
$cms['author']		= "#";
$cms['favicon']		= "assets/img/favicon.png";

/* DB CONNECTION CODE */
//----------------------------------------------//
//----- UTF8 USED FOR SPECIAL CHARACTERS ------//
//--------------------------------------------//
$restodb = mysqli_connect("127.0.0.1","root","password","resto") or die("Error " . mysqli_error($restodb));
if (!$restodb->set_charset("utf8")) {
printf("Error loading character set utf8: %s\n", $restodb->error);
} else {}
// Check connection
if ($restodb->connect_error) {
    die("Connection failed: " . $restodb->connect_error);
}
/* End of file configs.php */
?>
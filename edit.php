<?
session_start();
if (!isset($_SESSION['auth']) || $_SESSION['auth'] != 1) {
   echo 'Not logged in...';
   // sleep(3);
   // echo "<script>window.close();</script>";
   exit();
}
?>
<script type="text/javascript">
	function CloseMe()
             {
                 window.opener.location.reload();
                 window.close();
             }
</script>
<? 
include('config.php'); 
if (isset($_GET['id']) ) { 
$id = (int) $_GET['id'];
if(isset($_POST['status'])){
    //$stok is checked and value = 1
    $status = 1;
}
else{
    //$stok is nog checked and value=0
    $status = 0;
} 
if (isset($_POST['submitted'])) { 
	foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
	$sql = "UPDATE `hp_caption` SET  `message` =  '{$_POST['message']}' ,  `status` =  '$status'   WHERE `id` = '$id' "; 
	mysql_query($sql) or die(mysql_error()); 
	echo (mysql_affected_rows()) ? "Edited row.<br />" : "Nothing changed. <br />";
	// header('Location: index.php');
// echo "<a href='index.php'>Back To Listing</a>"; 
	echo '<script> CloseMe(); </script>';
} 
$row = mysql_fetch_array ( mysql_query("SELECT * FROM `hp_caption` WHERE `id` = '$id' ")); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8 />
	<title></title>
<link rel="stylesheet" href="css/bootstrap.min.css">
	
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.0/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>
	
	<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
	<script src="js/main.js" type="text/javascript"> </script>
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<style type="text/css">
		#content_wrapper{
			width: 600px;
			margin: auto;
			padding: .45em 0;
			text-align: center;
		}
		#toggleSwitch{
			text-align: left;
			padding: 0 0.25em 0;
			margin-bottom: 1em;
		}
		#form_wrapper{
			/*display: block;
			clear: both;
			margin-top: 1em;
			padding: 1em 1em;*/
		}
	</style>
</head>
<body>
	<div id="content_wrapper">

		 
	       	
	 <div id="form_wrapper">
	 <form action='' method='POST' style="width: 600px; margin: 1em auto;">

	 <div id="toggleSwitch"><input name='status' type="checkbox" <?php if (stripslashes($row['status']) == 1) echo "checked='checked'"; ?> data-toggle="toggle"></div>
	 <div style="clear: both;"></div>    
	 	
	 	
	 		<textarea type='text' name='message' rows="5" cols="100" > 
	 			<?= stripslashes($row['message']) ?>
	 		</textarea>
	 	       <div style="width: 300px; margin: 1em auto 0 auto;"> 
	 
	 	
	 			<button type="submit" class="btn btn-primary btn-lg">Submit</button>
	 			<input type='hidden' value='1' name='submitted' /> 
	 		</div>

	 	</div>
	 </form> 
	</div>
<? } ?> 
</body>
</html>

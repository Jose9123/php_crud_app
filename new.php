<?
session_start();
if (!isset($_SESSION['auth']) || $_SESSION['auth'] != 1) {
   echo 'Not logged in...';
   // sleep(1);
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
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `hp_caption` ( `message` ,  `status`  ) VALUES(  '{$_POST['message']}' ,  '0'  ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "Added message.<br />";
echo '<script> CloseMe(); </script>'; 
// header('Location: index.php');
// echo "<a href='list.php'>Back To Listing</a>"; 
} 
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="toggle-switch.css">

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
			text-align: center;
		}
	</style>
</head>
<body>
	<div id="content_wrapper">
	       	
	 <div id="form_wrapper">
	 <form action='' method='POST' style="width: 600px; margin: 1em auto;">	 	
	 	
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
</body>
</html>
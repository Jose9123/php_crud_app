<? 
	include('config.php'); 
?>
<script type="text/javascript">
	function CloseMe()
        {
            window.opener.location.reload();
            window.close();
        }
</script>
<? 
if (isset($_GET['id']) ) { 
$id = (int) $_GET['id'];

if (isset($_POST['submitted'])) { 
	if(isset($_POST['status'])){
    $status = 1;
	}
else{
    $status = 0;
}; 
	foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
	$sql = "UPDATE `hp_caption` SET  `message` =  '{$_POST['message']}' ,  `status` =  '$status'  WHERE `id` = '$id' "; 
	mysql_query($sql) or die(mysql_error()); 
	echo (mysql_affected_rows()) ? "Edited row.<br />" : "Nothing changed. <br />";
	// header('Location: index.php');
// echo "<a href='index.php'>Back To Listing</a>"; 
	echo '<script> CloseMe(); </script>';
} 
$row = mysql_fetch_array ( mysql_query("SELECT * FROM `hp_caption` WHERE `id` = '$id' ")); 
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

         <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.0/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>

        	<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script type="text/javascript">
function sleep(milliSeconds){
	var startTime = new Date().getTime(); // get the current time
	while (new Date().getTime() < startTime + milliSeconds); // hog cpu
}
tinymce.init({
	plugins: "code",
	plugins: "link",
	forced_root_block: 'div',
    selector: "textarea"
 });
</script>
<style type="text/css">
		#content_wrapper{
			width: 600px;
			margin: auto;
			padding: 2em;
			text-align: center;
		}
	</style>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
       <!--  <p>Hello world! This is HTML5 Boilerplate.</p> -->
<div id="content_wrapper">
		 <input name='status' type="checkbox" <?php if (stripslashes($row['status']) == 1) echo "checked='checked'"; ?> data-toggle="toggle">
	       	
	      
	<form action='' method='POST'> 
	<p>
		<textarea type='text' name='message' rows="5" cols="100" > 
			<?= stripslashes($row['message']) ?>
		</textarea>
	       <div style="width: 300px;"> 
	       	<!-- <label class="switch-light switch-candy" onclick="">
	       		<input type="checkbox" checked data-toggle="toggle">
	       		  <input name='status' type="checkbox"  />

	       			  <span>
	       			    Status
	       			    <span>Off</span>
	       			    <span>On</span>
	       			  </span>       
	       			  <a></a>
	       	</label><br> -->
	       	
	       	

			<!-- <input type='submit' value='Submit' />
			<button type="submit" class="btn btn-default">Submit</button> -->
			<input type='hidden' value='1' name='submitted' /> 
			<button type="submit" class="btn btn-primary btn-lg">Submit</button>
			
		</div></div>
</form> 
<? } ?>
        
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        // <script>
        //     (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        //     function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        //     e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        //     e.src='//www.google-analytics.com/analytics.js';
        //     r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
        //     ga('create','UA-XXXXX-X');ga('send','pageview');
        // </script>
    </body>
</html>


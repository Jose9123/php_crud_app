<?
session_start();
if (!isset($_SESSION['auth']) || $_SESSION['auth'] != 1) {
   header('Location: login.php');
   exit();
}
include('config.php'); 
function statusText($status) {
    if ($status == 1)	{
    	return TRUE;
    }
    else{
    	return FALSE;
    };
};
// function checkStatus($msgStatus){
// 	if (stripslashes($msgStatus == 1) {
// 		return "checked='checked'";
// 	};
// }

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
        <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>


        <style type="text/css">
        /*@media (max-width: 480px) { 
        body {
          font-size: 11px;
        }

        .hidden-phone {
           display: block;
        }
        }*/
        body{
            font-size: 16px;
            font-family: 'Raleway', sans-serif;
        }
		#content_wrapper{
			max-width: 660px;
			margin: 1em auto;
			padding: .5em .5em;
		}
        #messages_table{


        }
        #messages_table td { 
            padding: 10px 10px;
        }
        .iconcell{
            padding: 5px;
            display: table-cell;
            text-align: center;
            vertical-align: middle;
        }
        #adddiv{
            width: 108px;
            margin: auto;
        }
        #align_bottom{
            vertical-align: bottom;
        }
        span.glyphicon-off {
            font-size: 2.5em;
            color: red;
        }
        span.glyphicon-ok {
            font-size: 2.5em;
            color: green;
        }
	</style>
	<script type="text/javascript">
	jQuery(document).ready(function($) {
    jQuery('a.popup').live('click', function(){
    	var left = (screen.width/2)-(636/2);
  		var top = (screen.height/2)-(385/2);
        newwindow=window.open($(this).attr('href'),'','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, copyhistory=no, height=385,width=636, left='+left+',top='+top);
        if (window.focus) {newwindow.focus()}
        return false;
    });
});

function confirmDelete(delUrl) {
  if (confirm("Are you sure you want to delete")) {
   document.location = delUrl;
  }
}
</script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <!-- <p>Hello world! This is HTML5 Boilerplate.</p> -->
        <div id="content_wrapper">	 
    <?
$editIcon = '<button type="button" class="btn btn-default btn-lg delbutton">
  <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>';
$delIcon = '<button type="button" class="btn btn-default btn-lg">
  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>';
$confirmPrompt = 'onclick="return confirm(\'Are you sure you want to delete?\')"';
$offIcon = '<span class="glyphicon glyphicon-off"></span>';
echo "<table id='messages_table' class='table table-striped table-bordered table-condensed'>";
$okIcon = '<span class="glyphicon glyphicon-ok"></span>';
echo "<table id='messages_table' class='table table-striped table-bordered table-condensed'>"; 
echo "<tr id='header_row'>"; 
// echo "<td><b>Id</b></td>"; 
echo "<td><h1>Messages</h1></td>"; 
echo "<td id='align_bottom'><h3>Status</h3></td>";
echo "<td  id='align_bottom' COLSPAN=2><div id='adddiv'><a href='new.php' class='popup'><button type='button' class='btn btn-primary btn-lg'>Add New</button></a></div></td>"; 
echo "</tr>"; 
$result = mysql_query("SELECT * FROM `hp_caption`") or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
// echo "<td valign='top'>" . nl2br( $row['id']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['message']) . "</td>";
if (statusText($row['status'])){
	echo "<td valign='top' class='iconcell'>" . $okIcon . "</td>";
}
else{
	echo "<td valign='top' class='iconcell'>" . $offIcon . "</td>";
	}
echo "<td valign='top'><a href=edit.php?id={$row['id']} class='popup iconcell'>".$editIcon."</a></td>
<td valign='top'><a href='delete.php?id={$row['id']}' class='popup iconcell'>".$delIcon."</a></td> "; 
echo "</tr>"; 
} 
echo "</table>"; 
?>

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script src="js/bootstrap-tooltip.js"></script>
        <script src="js/bootstrap-confirmation.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>	   
    </body>
</html>



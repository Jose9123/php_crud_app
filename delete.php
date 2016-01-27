<?
session_start();
$del_confirm = false;
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
             };
    function confirmDelete() {
    	var response = confirm("Are you sure?");
  		if (response) {
  			window.location = document.URL + '&delConfirm=true';
  			}
  		else{
  			window.close();
  			}
		};
		
</script>
<?
if ((!empty($_GET['delConfirm'])) && ($_GET['delConfirm'] === 'true')){
	echo 'delConfirm=' . $_GET['delConfirm'];
	deleteMessage();
}
else{
	echo '<script> confirmDelete();  </script>';
}

function deleteMessage() {
    include('config.php'); 
	$id = (int) $_GET['id']; 
	mysql_query("DELETE FROM `hp_caption` WHERE `id` = '$id' ") ; 
	echo (mysql_affected_rows()) ? "Row deleted.<br /> " : "Nothing deleted.<br /> ";
	echo '<script> CloseMe(); </script>';  
}

?> 

<!-- <a href='index.php'>Back To Listing</a> -->
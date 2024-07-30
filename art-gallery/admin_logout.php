<?php 
/*********************************************************
 *********************************************************
 ******	  Parampal Randhawa (AKA Param)				******
 ******   Application Development: Project			******
 ******   December 7, 2007							******
 *********************************************************
 ********************************************************/
?>
<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);
?>

<?php 

setcookie("loginGallery", "", time() - 1800);
header("Location: index.php");	

?>
			


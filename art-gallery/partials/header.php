<?php
// Enable the display of errors
ini_set('display_errors', '1');

// Set the error reporting level to show all errors
error_reporting(E_ALL);

include 'vars.php';

$rowSpan = '5';
$height = '500';
if (isset($isAdmin) && $isAdmin === true && isset($isLoginGallery) && $isLoginGallery === true) {
	$rowSpan = '5';
} else if (isset($isAdmin) && $isAdmin === true) {
	$rowSpan = '6';
	$height = '100%';
}
?>
<html>

<head>
	<title>:: DezineWay - Image Gallery Portal :: <?= $isAdmin ?? false ? $translations['administrator'] : '' ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
	<!-- ImageReady Slices (gallery.psd) -->
	<table width="1000" height="<?= $height ?>" border="0" align="center" cellpadding="0" cellspacing="0" id="Table_01" class="footerBox">
		<tr>
			<td width="20" rowspan="<?= $rowSpan ?>" background="images/gallery_01.jpg"></td>
			<td height="158">
				<img src="images/gallery_02.jpg" width="960" height="158" alt="">
			</td>
			<td width="20" rowspan="<?= $rowSpan ?>" background="images/gallery_03.jpg"></td>
		</tr>
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

if (isset($_POST['submitLogin'])){
	$user = $_POST['user'];
	$password = $_POST['password'];
	$db = mysql_connect('localhost', 'art_gallery_user', 'sheridan') or die ("Could not connect");
	mysql_select_db('art_gallery', $db) or die ('Could not select database');
	
	$query = "SELECT COUNT(*) FROM user WHERE user_name = '".mysql_real_escape_string($user)."' AND password = '".mysql_real_escape_string($password)."' ;";
	$result = mysql_query($query) or die ('Query failed');
	$count = mysql_result($result,0);
	if ($count == 1){
		setcookie("loginGallery", "true", time() + 1800);
		header("Location: admin_index.php");	
	} else {
		
		//else continued at bottom
	
	?>
			<html>
			<head>
			<title>:: DezineWay - Image Gallery Portal :: Administrator</title>
			<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
			<link href="style.css" rel="stylesheet" type="text/css">
			</head>
			
			<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
			<!-- ImageReady Slices (gallery.psd) -->
			<table width="1000" height = "100%" border="0" align="center" cellpadding="0" cellspacing="0" id="Table_01" class="footerBox">
			<tr>
					<td width="20" rowspan="6" background="images/gallery_01.jpg"></td>
			<td height="158" >
						<img src="images/gallery_02.jpg" width="960" height="158" alt=""></td>
					<td width="20" rowspan="6" background="images/gallery_03.jpg"></td>
			  </tr>
				<tr>
					<td width="960" height="2" align="center" valign="middle" bgcolor="#000000" style="height:3px"></td>
			</tr>
			<tr>
			  <td height="30" bgcolor="#01AFC8"><span class="tableHead">Login to Art Gallery - Administrator</span></td>
			</tr>
				<tr>
					<td width="960" align="center" valign="middle" bgcolor="#E4E4E4"><br>
					  <table border="0" align="center" cellpadding="7" cellspacing="0">
					  <form method="post">
						<tr>
						  <td align="left" valign="middle"><span class="updateText">User Id:</span> </td>
						  <td valign="middle" align="center"><input name="user" type="text" size="15" maxlength="50">              </td>
						</tr>
						<tr>
						  <td align="left" valign="middle"><span class="updateText">Passsword:</span> </td>
						  <td valign="middle" align="center"><input name="password" type="password" size="15" maxlength="50">              </td>
						</tr>
						<tr>
						  <td align="left" valign="middle"></td>
						  <td valign="middle" align="left"><input type="submit" Value=" Submit " name="submitLogin"></td>
						</tr>
						</form>
					  </table>
					  <br>
					  <span class="error">&nbsp;&nbsp;ERROR: Check your Username and Password then try again.&nbsp;&nbsp;</span>
					  <br>
				  <br>
				  <br>
				  <br>
				  <br>
				  <br></td>
			  </tr>
			  <tr>
				<td width="960" height="40" align="center" valign="middle" bgcolor="#000000" style="height:3px"></td>
			  </tr>
				<tr>
					<td width="960" height="54" align="center" valign="middle" background="images/gallery_06.jpg"><span class="footer">:: Copyright © 2007 www.designway.com ::</span></td>
			  </tr>
			</table>
			<!-- End ImageReady Slices -->
			</body>
			</html>
<?php
	setcookie("loginGallery", "", time() - 1800);
	}
}

?>

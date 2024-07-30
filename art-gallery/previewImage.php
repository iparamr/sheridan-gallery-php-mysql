<?php 
/*********************************************************
 *********************************************************
 ******	  Parampal Randhawa (AKA Param)				******
 ******   Application Development: Project			******
 ******   December 7, 2007							******
 *********************************************************
 ********************************************************/
?>
<html>
<head>
<title>:: DezineWay - Image Gallery Portal ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);
?>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- ImageReady Slices (gallery.psd) -->
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" id="Table_01" class="footerBox">
	
	<tr><td width="20" background="images/gallery_01.jpg"></td>
		<td width="960" align="center" valign="top" bgcolor="#E4E4E4">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
          <td height="50" bgcolor="#01AFC8">
          	<?php
            	$title = htmlspecialchars($_GET['title'], ENT_QUOTES);
				echo("<span class=\"tableHead\">$title</span>");
			?>            
            </td>
          </tr>
          <tr>						
			<td width="100%" align="center" valign="middle" class="backLink">     
          <?php
		 		$picture = htmlspecialchars($_GET['picture'], ENT_QUOTES);
				$sectionID = htmlspecialchars($_GET['sectionID'], ENT_QUOTES);
				
				echo("<br /><font style=\"font-size:10px\"><br /></font>");
				echo("[ <a href=\"index.php?sectionID=$sectionID\" class=\"backLink\"><< back</a> ]<br/>");
				echo("<font style=\"font-size:10px\"><br /></font>");				
				echo("<img src=\"$picture\" alt=\"\" border=\"0\" /><br />");
				echo("<font style=\"font-size:10px\"><br /></font>");					
				echo("[ <a href=\"index.php?sectionID=$sectionID\" class=\"backLink\"><< back</a> ]");
				echo("<br /><br /><font style=\"font-size:10px\"><br /></font>");
		  ?>          </td>				
		</tr>
        <tr>						
			<td width="100%" align="center" valign="middle" style="border:dashed; border-color:#666666; border-width:0px; border-top-width:1px;">
             <form method="post" action="postComment.php">    
			  <table width="90%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td class="comments">
                  <a name="addComments"><br /><font style="font-size:10px"><br /></font></a>
                  <span class="commentsTitle">Add Comments:</span><br />
                  <font style="font-size:6px"><br /></font>
                  <textarea name="commentInput" id="textarea" cols="45" rows="5" class="commentInput"></textarea><br />
                  <font style="font-size:6px"><br /></font>
                  <input type="submit" name="addComment" id="button" value="Submit"><br />
                  <font style="font-size:6px"><br /><br /></font>                  
                  
				  <?php
				  	$imageID = htmlspecialchars($_GET['imageID'], ENT_QUOTES);
					$db = mysql_connect('localhost', 'art_gallery_user', 'sheridan') or die ("Could not connect");
					mysql_select_db('art_gallery', $db) or die ('Could not select database');		  					
					$query = "SELECT comment FROM comments WHERE image_id = '".mysql_real_escape_string($imageID)."' ORDER BY comment_id ASC;";
                    $result = mysql_query($query) or die ('Query failed');
					
					//increment page view
					$query = "SELECT views FROM image WHERE image_id = '".mysql_real_escape_string($imageID)."';";
                    $result2 = mysql_query($query) or die ('Query failed');					
					$updateView = mysql_result($result2,0,"views") + 1;
					$query = "UPDATE image SET views = $updateView WHERE image.image_id = '".mysql_real_escape_string($imageID)."'";
					mysql_query($query) or die(mysql_error());
										
                    mysql_close($db);
					
					$numRecords = mysql_num_rows($result);
					
					if ($numRecords == 0){
						echo("<br />");
					}
					
					for ($i=0;$i<$numRecords;$i++){
						$dbComment = mysql_result($result,$i,"comment");
						echo("<hr class=\"lineBreak\"/>");
						echo($dbComment);
						if ($i==$numRecords-1){
							echo("<br /><font style=\"font-size:6px\"><br /></font>");
							echo("<font style=\"font-size:5px\"><br /><br /><br /></font>");					
							echo("<center><span class=\"backLink\">[ <a href=\"index.php?sectionID=$sectionID\" class=\"backLink\"><< back</a> ]</span></center><br />");
						}
					}					
					
              ?>
              </td>
              </tr>
              </table> 
              <?php 
			  	echo("<input type=\"hidden\" id=\"imageID\" name=\"imageID\" value=\"$imageID\" />");
				$redirectLink = "previewImage.php?picture=$picture&title=$title&sectionID=$sectionID&imageID=$imageID";
				echo("<input type=\"hidden\" id=\"redirectLink\" name=\"redirectLink\" value=\"$redirectLink\" />");				
			  ?>                       
              </form>
              
		  </td>				
		</tr>
        <tr>
          <td height="50" align="center" valign="middle" bgcolor="#A9AEA2"><span class="footer">:: Copyright © 2007 www.designway.com ::</span></td>
          </tr>
      </table></td>
      <td width="20" background="images/gallery_03.jpg"></td>
  </tr>  	
</table>
<!-- End ImageReady Slices -->
</body>
</html>
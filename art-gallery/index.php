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
setcookie("chkComment", "Default Value.", time() + 3600);
?>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- ImageReady Slices (gallery.psd) -->
<table width="1000" height="500" border="0" align="center" cellpadding="0" cellspacing="0" id="Table_01" class="footerBox">
<tr>
		<td width="20" rowspan="5" background="images/gallery_01.jpg"></td>
<td>
			<img src="images/gallery_02.jpg" width="960" height="158" alt=""></td>
		<td width="20" rowspan="5" background="images/gallery_03.jpg"></td>
  </tr>
	<tr>
                <td width="960" height="40" align="center" valign="middle" bgcolor="#000000">
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" widht="100%" >
                <tr>
                <td width="92%" align="center">
                <?php		
                        
                echo("<a href=\"index.php?sectionID=1\" class=\"links\">About</a> <span class=\"linksDivider\">:: </span>");
                echo("<a href=\"index.php?sectionID=2\" class=\"links\">Digital Art</a> <span class=\"linksDivider\"> :: </span> ");
                echo("<a href=\"index.php?sectionID=3\" class=\"links\">Fine Art</a> <span class=\"linksDivider\"> :: </span>");
                echo("<a href=\"index.php?sectionID=4\" class=\"links\">Contact</a>");
                
                if (isset($_GET['sectionID'])){
                    $sectionID = htmlspecialchars($_GET['sectionID'], ENT_QUOTES);
                } else {			
                    $sectionID = 2;
                }	
                
                ?>                </td>
                
                <td width="8%" align="right">
                <span class="logOut"><a href="admin.php" style="color:#FFFFFF; text-decoration:none;">Log In</a></span>&nbsp;&nbsp;&nbsp;
                </td>
                </tr>
                </table>
              </td>
        </tr>
	<tr>
		<td width="960" height="500" align="center" valign="top" bgcolor="#E4E4E4">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        
          <?php 
		  //----------------------------------------DATABASE CONNECTION-----------------------------------------------
		  $db = mysql_connect('localhost', 'art_gallery_user', 'sheridan') or die ("Could not connect");
		  mysql_select_db('art_gallery', $db) or die ('Could not select database');
		  $query = 'SELECT image_id, title, thumbnail, picture, views FROM image WHERE cat_id = 1 ORDER BY image_id ASC;';
		  $result1 = mysql_query($query) or die ('Query failed');
		  $query = 'SELECT image_id, title, thumbnail, picture, views  FROM image WHERE cat_id = 2 ORDER BY image_id ASC;';
		  $result2 = mysql_query($query) or die ('Query failed');		 
		  //$row = mysql_fetch_array($result);
		  mysql_close($db);
		  ?>
          
          <?php
		  //----------------------------------------ABOUT-----------------------------------------------		  
		  if ($sectionID == 1)
		  {
		  	  echo("<tr>");
              echo("<td height=\"30\" colspan=\"5\" bgcolor=\"#01AFC8\"><span class=\"tableHead\">About</span></td>");
          	  echo("</tr>");
			  echo("<tr>");
              echo("<td height=\"30\" colspan=\"5\"><div class=\"content\">
			  <p>Since my primary schooling, I have been winning competitions and certificates in art and craft and that was enough to encourage me to do something in art. In my higher school I won an embroidery competition scoring third position and everybody was surprised to see a boy winning it. After having completed my higher school education I joined senior secondary school in science stream (physics, chemistry and math) as science was my favourite subject after art. Secondly, science and engineering are considered most employable streams in India. After completing my senior secondary education I decided to do CPA (Computer Programmer Analyst, Georgian College, Canada). When I completed the study tenure of three years; I was awarded with Computer Programmer Analyst Diploma (CPA), with Honours, from Georgian College, Canada and Bachelor of Computer Applications Degree (BCA), in First Division, from Punjab Technical University, India.</p>
    
    <p>For the successful completion of the CPA program I had to do 3 Co-Op training(s), 1 Co-Op each year.  I did the first Co-Op as a flash animator, which was a mix-match of design and programming and I made my mind that I will definitely do something in Multimedia. During the second Co-Op, I worked as a Technical Support Executive in DELL (I worked on the technical issues and troubleshooting), and in the third Co-op I worked as a Web/Graphic Designer. I possess a keen eye and good hand at sketching and wanted to try my hand in Graphic Design and joined Graphic Design Certificate Program (in association with UCOL). I had never scored a grade lower than �A� in my Graphic Design Program. I was the best graphic design student and my Institute Director and Program Coordinator hired me for a commercial project in which I had to design an invitation card and a poster for fashion show which was supposed to be held at the CIIS. I did not just design the card and the poster, but also organized and participated in the fashion show and the cultural event.</p>
    
    <p>Recently I was working as a fulltime Graphic/Web Designer and I have designed a latest website www.gizmosupport.com. Now-a-days you can see Flash on almost every website and people love to see beautiful interactive interfaces. I have seen websites like www.mtv.com which are fully made using Flash. I think there will a time when we will have loads of websites which will totally have a flash interface. Like flash is for web FlashLite is the new technology to take flash to Mobile. Flash has endless possibilities and we can not just design and program games in flash but also build applications.</p></div>
			  
			  
			  </td>");
          	  echo("</tr>");			  
		  }
		  
		  ?>
          
          <?php
		  //----------------------------------------DIGITAL ART-----------------------------------------------		  
		  if ($sectionID == 2)
		  {
		  	  echo("<tr>");
              echo("<td height=\"30\" colspan=\"5\" bgcolor=\"#01AFC8\"><span class=\"tableHead\">Digital Art</span></td>");
          	  echo("</tr>");
			  $numRecords = mysql_num_rows($result1);
			  $cols = 5;
			  $rows = ceil($numRecords/$cols);		  
			  $index = 0;
			  
				for ($i=1;$i<=$rows;$i++){
					
					echo("<tr>");
					
					for ($j=1;$j<=$cols;$j++){
					
						$thumbnail = mysql_result($result1,$index,"thumbnail");
						$picture = mysql_result($result1,$index,"picture");
						$title = mysql_result($result1,$index,"title");
						$views = mysql_result($result1,$index,"views");
						$imageID = mysql_result($result1,$index,"image_id");
						
						echo("<td width=\"20%\" height=\"135\" align=\"center\" valign=\"middle\">");
						echo("<a href=\"previewImage.php?picture=$picture&title=$title&sectionID=$sectionID&imageID=$imageID\"><img src=\"$thumbnail\" width=\"65\" height=\"65\" alt=\"\" border=\"0\" /></a><br />");
						echo("<font style=\"font-size:4px\"><br /></font>");
						echo("<span class=\"imgTitle\">$title</span><br />");
						echo("<span class=\"views\">Views: $views</span>");
						echo("</td>");
						
						if ($index < $numRecords-1)
						{
							$index++;						
						} else {
							break;
						}			
					}
					
					echo("</tr>");           	
				}
			}
		  
		  ?>
          
           <?php
		  //----------------------------------------FINE ART-----------------------------------------------
		  
		  if ($sectionID == 3)
		  {
		  	  echo("<tr>");
              echo("<td height=\"30\" colspan=\"5\" bgcolor=\"#01AFC8\"><span class=\"tableHead\">Fine Art</span></td>");
          	  echo("</tr>");
			  $numRecords = mysql_num_rows($result2);
			  $cols = 5;
			  $rows = ceil($numRecords/$cols);		  
			  $index = 0;
			  
				for ($i=1;$i<=$rows;$i++){
					
					echo("<tr>");
					
					for ($j=1;$j<=$cols;$j++){
					
						$thumbnail = mysql_result($result2,$index,"thumbnail");
						$picture = mysql_result($result2,$index,"picture");
						$title = mysql_result($result2,$index,"title");
						$views = mysql_result($result2,$index,"views");
						$imageID = mysql_result($result2,$index,"image_id");
						
						echo("<td width=\"20%\" height=\"135\" align=\"center\" valign=\"middle\">");
						echo("<a href=\"previewImage.php?picture=$picture&title=$title&sectionID=$sectionID&imageID=$imageID\"><img src=\"$thumbnail\" width=\"65\" height=\"65\" alt=\"\" border=\"0\" /></a><br />");
						echo("<font style=\"font-size:4px\"><br /></font>");
						echo("<span class=\"imgTitle\">$title</span><br />");
						echo("<span class=\"views\">Views: $views</span>");
						echo("</td>");
						
						if ($index < $numRecords-1)
						{
							$index++;						
						} else {
							break;
						}			
					}
					
					echo("</tr>");           	
				}
			}		  
		  ?>
          
          <?php
		  //----------------------------------------CONTACT-----------------------------------------------		  
		  if ($sectionID == 4)
		  {
		  	  echo("<tr>");
              echo("<td height=\"30\" colspan=\"5\" bgcolor=\"#01AFC8\"><span class=\"tableHead\">Contact</span></td>");
          	  echo("</tr>");
			  echo("<tr>");
              echo("<td height=\"30\" colspan=\"5\" align=\"center\"><div class=\"content\">
			  	<br />
				39 Wildsky Rd.<br />
              Brampton<br />
              ON L6Y 5P9<br />
              Canada<br />
                Mobile: +91 98762-43154<br />
                E-mail: <a href=\"mailto:param84me@yahoo.com\" style=\"color:#3366FF; text-decoration:none\">param84me@yahoo.com</a><br />
                Website: <a href=\"http://param84me.deviantart.com/gallery/\" target=\"_blank\" style=\"color:#3366FF; text-decoration:none\">My Design Assignments</a><br />
                <br />
				</div>
				</td></tr>
			  
			  ");		  
		  }
		  ?>
          
      </table></td>
  </tr>
  <tr>
                <td width="960" height="40" align="center" valign="middle" bgcolor="#000000">
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" widht="100%" >
                <tr>
                <td width="92%" align="center">
                <?php		
                        
                echo("<a href=\"index.php?sectionID=1\" class=\"links\">About</a> <span class=\"linksDivider\">:: </span>");
                echo("<a href=\"index.php?sectionID=2\" class=\"links\">Digital Art</a> <span class=\"linksDivider\"> :: </span> ");
                echo("<a href=\"index.php?sectionID=3\" class=\"links\">Fine Art</a> <span class=\"linksDivider\"> :: </span>");
                echo("<a href=\"index.php?sectionID=4\" class=\"links\">Contact</a>");
                
                if (isset($_GET['sectionID'])){
                    $sectionID = htmlspecialchars($_GET['sectionID'], ENT_QUOTES);
                } else {			
                    $sectionID = 2;
                }	
                
                ?>                </td>
                
                <td width="8%" align="right">
                <span class="logOut"><a href="admin.php" style="color:#FFFFFF; text-decoration:none;">Log In</a></span>&nbsp;&nbsp;&nbsp;
                </td>
                </tr>
                </table>
              </td>
        </tr>
	<tr>
		<td width="960" height="54" align="center" valign="middle" background="images/gallery_06.jpg"><span class="footer">:: Copyright � 2007 www.designway.com ::</span></td>
  </tr>
</table>
<!-- End ImageReady Slices -->
</body>
</html>
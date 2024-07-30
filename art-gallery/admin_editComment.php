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

	if($_COOKIE['loginGallery'] == true){

?>
        <html>
        <head>
        <title>:: DezineWay - Image Gallery Portal ::</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link href="style.css" rel="stylesheet" type="text/css">
        </head>
        <body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
        <!-- ImageReady Slices (gallery.psd) -->
        <table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" id="Table_01" class="footerBox">
            
            <tr><td width="20" background="images/gallery_01.jpg"></td>
                <td width="960" align="center" valign="top" bgcolor="#E4E4E4">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                  <td height="50" bgcolor="#01AFC8">
                    <?php
                        
                        $sectionID = htmlspecialchars($_GET['sectionID'], ENT_QUOTES);
                        $imageID = htmlspecialchars($_GET['imageID'], ENT_QUOTES);			
                        
                        $db = mysql_connect('localhost', 'art_gallery_user', 'sheridan') or die ("Could not connect");
                        mysql_select_db('art_gallery', $db) or die ('Could not select database');
                        
                        $query = "SELECT title, thumbnail, picture, cat_id FROM image WHERE image_id = '".mysql_real_escape_string($imageID)."';";
                        $result = mysql_query($query) or die ('Query failed');
                        
                        $title = mysql_result($result,0,"title");
                        $thumbnail = mysql_result($result,0,"thumbnail");
                        $picture = mysql_result($result,0,"picture");
                        $cat_id = mysql_result($result,0,"cat_id");
                        
                        $redirectLink = "admin_editComment.php?sectionID=$sectionID&imageID=$imageID";
                                        
                        echo("<span class=\"tableHead\">$title</span>");
                        
                    ?>            
                    </td>
                  </tr>
                  <tr>						
                  <td width="100%" align="center" valign="middle" class="backLink">
                  <?php 
                  
                    echo("
                          <form method=\"post\" action=\"admin_imageUpdate.php\">
                          
                          <input type=\"hidden\" id=\"imageID\" name=\"imageID\" value=\"$imageID\" />
                          <input type=\"hidden\" id=\"redirectLink\" name=\"redirectLink\" value=\"$redirectLink\" />
                          
                          <br/>				  			  
                          <table width=\"45%\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\" class=\"updateText\">
                            <tr>
                              <td valign=\"middle\">Title:</td>
                              <td valign=\"middle\"><input name=\"title\" type=\"text\" id=\"title\" value=\"$title\" class=\"updateTextfield\"></td>
                            </tr>
                            <tr>
                              <td valign=\"middle\">Thumbnail Path:</td>
                              <td valign=\"middle\"><input type=\"text\" name=\"thumbnail\" id=\"thumbnail\" value=\"$thumbnail\" class=\"updateTextfield\"></td>
                            </tr>
                            <tr>
                              <td valign=\"middle\">Picture Path:</td>
                              <td valign=\"middle\"><input type=\"text\" name=\"picture\" id=\"picture\" value=\"$picture\" class=\"updateTextfield\"></td>
                            </tr>
                            <tr>
                              <td valign=\"middle\">Category:</td>
                              <td valign=\"middle\">
                        ");				
                        
                        if ($cat_id == 1){
                            echo("<select name=\"cat_id\" id=\"cat_id\" class=\"updateTextfield\">
                                  <option value=\"1\" selected=\"selected\">Digital Art</option>
                                  <option value=\"2\">Fine Art</option>
                                </select>
                              ");
                        }
                        
                        if ($cat_id == 2){
                            echo("<select name=\"cat_id\" id=\"cat_id\" class=\"updateTextfield\">
                                  <option value=\"1\" >Digital Art</option>
                                  <option value=\"2\" selected=\"selected\">Fine Art</option>
                                </select>
                              ");
                        }  
                                            
                        echo("	  
                              </td>
                            </tr>
                            <tr>
                              <td valign=\"middle\"></td>
                              <td valign=\"middle\"><input type=\"submit\" name=\"Update\" id=\"Update\" value=\"Update\"></td>
                            </tr>
                          </table>
                          </form>
                      ");
                      
                      
                      
                  ?>
                  <?php
                                                        
                        echo("<font style=\"font-size:10px\"><br /></font>");
                        echo("[ <a href=\"admin_index.php?sectionID=$sectionID\" class=\"backLink\"><< back</a> ]<br/>");
                        echo("<font style=\"font-size:10px\"><br /></font>");				
                        echo("<img src=\"$picture\" alt=\"\" border=\"0\" /><br />");
                        echo("<font style=\"font-size:10px\"><br /></font>");					
                        echo("[ <a href=\"admin_index.php?sectionID=$sectionID\" class=\"backLink\"><< back</a> ]");
                        echo("<br /><br /><font style=\"font-size:10px\"><br /></font>");
                  ?>          
                  </td>				
                </tr>
                <tr>						
                    <td width="100%" align="center" valign="middle" style="border:dashed; border-color:#666666; border-width:0px; border-top-width:1px;">
                     <form method="post" action="admin_deleteComment.php">    
                      <table width="90%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td class="comments">
                          <a name="deleteComments"><br /><font style="font-size:10px"><br />
                          </font></a>
                          <div style="background-color:#CFCFCF;"><span class="commentsTitle">Delete Comments</span>
                          <span style="padding-left:671px">
                          <input type="submit" name="delComment" id="button" value="Delete"></span></div>
                          <font style="font-size:6px"><br /><br /></font>                  
                          
                          <?php
                                                                        
                            $query = "SELECT comment_id, comment FROM comments WHERE image_id = '".mysql_real_escape_string($imageID)."' ORDER BY comment_id ASC;";
                            $result = mysql_query($query) or die ('Query failed');
                                                        					
                            mysql_close($db);
                            
                            $numRecords = mysql_num_rows($result);
                            
                            if ($numRecords == 0){
                                echo("<br />");
                            }
                            
                            for ($i=0;$i<$numRecords;$i++){
                                $dbComment = mysql_result($result,$i,"comment");
                                $dbComment_ID = mysql_result($result,$i,"comment_id");
                                echo("<input name=\"commentSel[]\" type=\"checkbox\" value=\"$dbComment_ID\" class=\"checkbox\"/>");
                                echo("<div style=\"padding-left:3px\">$dbComment</div>");
                                echo("<hr class=\"lineBreak\"/>");
                                
                                if ($i==$numRecords-1){							
                                    echo("<font style=\"font-size:5px\"><br /><br /><br /></font>");					
                                    echo("<center><span class=\"backLink\">[ <a href=\"admin_index.php?sectionID=$sectionID\" class=\"backLink\"><< back</a> ]</span></center><br />");
                                }
                            }
                      ?>
                      </td>
                      </tr>
                      </table> 
                      <?php 			  	
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
              
<?php 
} else {
	header("Location: admin.php");
}

?>
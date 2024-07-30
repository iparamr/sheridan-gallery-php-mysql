<?php
ob_start(); // Start output buffering
$isAdmin = true;
$isLoginGallery = $_COOKIE['loginGallery'] == true;
include 'partials/header-main.php';
?>
<?php

if ($isLoginGallery) {

?>
  <tr>
    <?php include 'partials/nav.php'; ?>
  </tr>
  <tr>
    <td width="960" height="500" align="center" valign="top" bgcolor="#E4E4E4">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <?php
        include 'partials/db-connect.php';

        // Query for category 1
        $query1 = 'SELECT image_id, title, thumbnail, picture, views FROM image WHERE cat_id = 1 ORDER BY image_id ASC;';
        $result1 = $db->query($query1);

        if (!$result1) {
          die('Query failed: ' . $db->error);
        }

        // Query for category 2
        $query2 = 'SELECT image_id, title, thumbnail, picture, views FROM image WHERE cat_id = 2 ORDER BY image_id ASC;';
        $result2 = $db->query($query2);

        if (!$result2) {
          die('Query failed: ' . $db->error);
        }

        // Close connection
        $db->close();
        ?>

        <?php
        if ($sectionID == 1) {             // About
          include 'sections/about.php';
        } else if ($sectionID == 2) {     // Digital Art
          echo ("<tr><form method=\"post\" action=\"admin_delete.php\">");
          echo ("<td height=\"30\" colspan=\"5\" bgcolor=\"#01AFC8\">
                            <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                              <tr>
                                <td width=\"60%\"><span class=\"tableHead\">Digital Art</span></td>
                                <td width=\"40%\" align=\"right\"><input type=\"submit\" name=\"delImage\" id=\"button\" value=\"Delete\">&nbsp;&nbsp;&nbsp;
                                
                                </td>
                              </tr>
                            </table>
                          ");
          $redirectLink = "admin_index.php?sectionID=$sectionID";
          echo ("<input type=\"hidden\" id=\"redirectLink\" name=\"redirectLink\" value=\"$redirectLink\" />");
          echo ("</td>
                            </tr>
                          ");

          $numRecords = mysqli_num_rows($result1);
          $cols = 5;
          $rows = ceil($numRecords / $cols);
          $index = 0;

          for ($i = 1; $i <= $rows; $i++) {

            echo ("<tr>");

            for ($j = 1; $j <= $cols; $j++) {

              $row = mysqli_fetch_assoc($result1);

              $thumbnail = $row['thumbnail'];
              $picture = $row['picture'];
              $title = $row['title'];
              $views = $row['views'];
              $imageID = $row['image_id'];

              echo ("<td width=\"20%\" height=\"135\" align=\"center\" valign=\"middle\">");
              echo ("<font style=\"font-size:14px\"><br /></font><a href=\"admin_editComment.php?sectionID=$sectionID&imageID=$imageID\"><img src=\"$thumbnail\" width=\"65\" height=\"65\" alt=\"Click to edit\" border=\"0\" /></a><br />");
              echo ("<font style=\"font-size:4px\"><br /></font>");
              echo ("<span class=\"imgTitle\">$title</span><br />");
              echo ("<span class=\"views\">Views: $views</span>");
              echo ("<br /><input name=\"imageSel[]\" type=\"checkbox\" value=\"$imageID\" class=\"checkbox\"/>");
              echo ("</td>");

              if ($index < $numRecords - 1) {
                $index++;
              } else {
                break;
              }
            }

            echo ("</tr>");
          }
          echo ("</form>");
        } else if ($sectionID == 3) {
          echo ("<tr><form method=\"post\" action=\"admin_delete.php\">");
          echo ("<td height=\"30\" colspan=\"5\" bgcolor=\"#01AFC8\">
                            <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                              <tr>
                                <td width=\"60%\"><span class=\"tableHead\">Fine Art</span></td>
                                <td width=\"40%\" align=\"right\"><input type=\"submit\" name=\"delImage\" id=\"button\" value=\"Delete\">&nbsp;&nbsp;&nbsp;
                                
                                </td>
                              </tr>
                            </table>
                          ");
          $redirectLink = "admin_index.php?sectionID=$sectionID";
          echo ("<input type=\"hidden\" id=\"redirectLink\" name=\"redirectLink\" value=\"$redirectLink\" />");
          echo ("</td>
                            </tr>
                          ");

          $numRecords = mysqli_num_rows($result2);
          $cols = 5;
          $rows = ceil($numRecords / $cols);
          $index = 0;

          for ($i = 1; $i <= $rows; $i++) {

            echo ("<tr>");

            for ($j = 1; $j <= $cols; $j++) {

              $row = mysqli_fetch_assoc($result2);

              $thumbnail = $row['thumbnail'];
              $picture = $row['picture'];
              $title = $row['title'];
              $views = $row['views'];
              $imageID = $row['image_id'];

              echo ("<td width=\"20%\" height=\"135\" align=\"center\" valign=\"middle\">");
              echo ("<font style=\"font-size:14px\"><br /></font><a href=\"admin_editComment.php?sectionID=$sectionID&imageID=$imageID\"><img src=\"$thumbnail\" width=\"65\" height=\"65\" alt=\"Click to edit\" border=\"0\" /></a><br />");
              echo ("<font style=\"font-size:4px\"><br /></font>");
              echo ("<span class=\"imgTitle\">$title</span><br />");
              echo ("<span class=\"views\">Views: $views</span>");
              echo ("<br /><input name=\"imageSel[]\" type=\"checkbox\" value=\"$imageID\" class=\"checkbox\"/>");
              echo ("</td>");

              if ($index < $numRecords - 1) {
                $index++;
              } else {
                break;
              }
            }

            echo ("</tr>");
          }
          echo ("</form>");
        } else if ($sectionID == 4) {     // Contact
          include 'sections/contact.php';
        }
        ?>

      </table>
    </td>
  </tr>
  <tr>
    <?php include 'partials/nav.php'; ?>
  </tr>
<?php
} else {
  header("Location: admin.php");
  ob_end_flush(); // Flush the output buffer
}

?>
<?php include 'partials/footer-main.php'; ?>
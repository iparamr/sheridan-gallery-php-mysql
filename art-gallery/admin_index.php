<?php
ob_start(); // Start output buffering
$isAdmin = true;
$isLoginGallery = $_COOKIE['loginGallery'] == true;
include 'partials/header.php';
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
        // Database connection
        include 'partials/db-connect.php';

        if ($sectionID == 1) {            // About
          $pageHeading = "About";
          include 'sections/about.php';
        } else if ($sectionID == 2) {     // Digital Art
          $pageHeading = "Digital Art";
          $query = 'SELECT image_id, title, thumbnail, picture, views FROM image WHERE cat_id = 1 ORDER BY image_id ASC;';
          $result = $db->query($query);
          include 'sections/list-art-admin.php';
        } else if ($sectionID == 3) {     // Fine Art
          $pageHeading = "Fine Art";
          $query = 'SELECT image_id, title, thumbnail, picture, views FROM image WHERE cat_id = 2 ORDER BY image_id ASC;';
          $result = $db->query($query);
          include 'sections/list-art-admin.php';
        } else if ($sectionID == 4) {     // Contact
          $pageHeading = "Contact";
          include 'sections/contact.php';
        }

        if (isset($result) && !$result) {
          die('Query failed: ' . $db->error);
        }

        // Close connection
        $db->close();
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
<?php include 'partials/footer.php'; ?>
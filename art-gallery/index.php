<?php
// Set a cookie named "chkComment" with the value "Default Value."
// The cookie will expire in 1 hour (3600 seconds)
setcookie("chkComment", "Default Value.", time() + 3600);
include 'partials/header-main.php';
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
			if ($sectionID == 1) { 				// About
				include 'sections/about.php';
			} else if ($sectionID == 2) { 		// Digital Art
				include 'sections/digital-art.php';
			} else if ($sectionID == 3) { 		// Fine Art
				include 'sections/fine-art.php';
			} else if ($sectionID == 4) { 		// Contact
				include 'sections/contact.php';
			}
			?>
		</table>
	</td>
</tr>
<tr>
	<?php include 'partials/nav.php'; ?>
</tr>
<?php include 'partials/footer-main.php'; ?>
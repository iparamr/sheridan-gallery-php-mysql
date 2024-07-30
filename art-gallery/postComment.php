<?php
ob_start(); // Start output buffering
include 'partials/header.php';
?>
<?php
include 'partials/db-connect.php';
// Sanitize and escape the imageID from the POST request
$imageID = $db->real_escape_string(htmlspecialchars($_POST['imageID'], ENT_QUOTES));

if (isset($_POST['addComment']) && ($_COOKIE['chkComment'] != $_POST['commentInput']) && ($_POST['commentInput'] != "")) {
	$userComment = $db->real_escape_string($_POST['commentInput']);
	// Use prepared statements: This helps prevent SQL injection
	$stmt = $db->prepare("INSERT INTO comments (image_id, comment) VALUES (?, ?)");

	if ($stmt === false) {
		die("Prepare failed: " . $conn->error);
	}

	$stmt->bind_param("ss", $imageID, $userComment);

	if ($stmt->execute() === false) {
		die("Execute failed: " . $stmt->error);
	}

	$stmt->close();
	$db->close();

	setcookie("chkComment", $userComment, time() + 3600);

	$redirectLink = $_POST['redirectLink'];
	header("Location: $redirectLink#addComments");
	ob_end_flush(); // Flush the output buffer
	exit();
} else if (isset($_POST['addComment'])) { // Else if error commenting
?>
	<tr>
		<td width="100%" align="center" valign="middle"><span class="sendComments">
				<br />
				<!-- <script type="text/javascript">
						window.alert("Comment with the same value posted too recently.");
					</script> -->

				<?php if ($_POST['commentInput'] == "") : ?>
					<?php $redirectLink = $_POST['redirectLink']; ?>

					<span class="error">&nbsp;&nbsp;ERROR: Please type a comment.&nbsp;&nbsp;</span>
					<font style="font-size:20px"><br /><br /><br /></font>
					<span class="backLink">[ <a href="<?= $redirectLink ?>#addComments" class="backLink">
							<?= $translations['back']; ?></a> ]
					</span>
					<br /><br /><br /><br /><br /><br />
				<?php else : ?>
					<?php $redirectLink = $_POST['redirectLink']; ?>
					<span class="error">&nbsp;&nbsp;ERROR: You can't post the same comment too frequently.&nbsp;&nbsp;</span>
					<font style="font-size:20px"><br /><br /><br /></font>
					<span class="backLink">[ <a href="<?= $redirectLink ?>#addComments" class="backLink">
							<?= $translations['back']; ?></a> ]
					</span>
					<br /><br /><br /><br /><br /><br />
				<?php endif; ?>
			<?php
		} // endif
			?>
		</td>
	</tr>
	<?php
	include 'partials/footer.php';
	?>
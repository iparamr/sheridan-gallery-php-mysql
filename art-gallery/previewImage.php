<?php
include 'partials/header-light.php';
?>

<tr>
	<td height="50" bgcolor="#01AFC8">
		<?php
		$title = htmlspecialchars($_GET['title'], ENT_QUOTES);
		echo ("<span class=\"tableHead\">$title</span>");
		?>
	</td>
</tr>
<tr>
	<td width="100%" align="center" valign="middle" class="backLink">
		<?php
		$picture = htmlspecialchars($_GET['picture'], ENT_QUOTES);
		$sectionID = htmlspecialchars($_GET['sectionID'], ENT_QUOTES);
		?>
		<br />
		<font style="font-size:10px"><br /></font>
		[ <a href="index.php?sectionID=<?= $sectionID ?>" class="backLink"><?= $translations['back']; ?></a> ]<br />
		<font style="font-size:10px"><br /></font>
		<img src="<?= $picture ?>" alt="" border="0" /><br />
		<font style="font-size:10px"><br /></font>
		[ <a href="index.php?sectionID=<?= $sectionID ?>" class="backLink"><?= $translations['back']; ?></a> ]
		<br /><br />
		<font style="font-size:10px"><br /></font>

	</td>
</tr>
<tr>
	<td width="100%" align="center" valign="middle" style="border:dashed; border-color:#666666; border-width:0px; border-top-width:1px;">
		<form method="post" action="postComment.php">
			<table width="90%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td class="comments">
						<a name="addComments"><br />
							<font style="font-size:10px"><br /></font>
						</a>
						<span class="commentsTitle">Add Comments:</span><br />
						<font style="font-size:6px"><br /></font>
						<textarea name="commentInput" id="textarea" cols="45" rows="5" class="commentInput"></textarea><br />
						<font style="font-size:6px"><br /></font>
						<input type="submit" name="addComment" id="button" value="Submit"><br />
						<font style="font-size:6px"><br /><br /></font>

						<?php
						include 'partials/db-connect.php';

						// Sanitize and escape the imageID from the GET request
						$imageID = $db->real_escape_string(htmlspecialchars($_GET['imageID'], ENT_QUOTES));


						// Fetch comments
						$query = "SELECT comment FROM comments WHERE image_id = '$imageID' ORDER BY comment_id ASC;";
						$result = $db->query($query);

						if (!$result) {
							die('Query failed: ' . $db->error);
						}

						// Increment page view
						$query = "SELECT views FROM image WHERE image_id = '$imageID';";
						$result2 = $db->query($query);

						if (!$result2) {
							die('Query failed: ' . $db->error);
						}

						$row = $result2->fetch_assoc();
						$updateView = $row['views'] + 1;

						$query = "UPDATE image SET views = $updateView WHERE image_id = '$imageID'";
						if (!$db->query($query)) {
							die('Query failed: ' . $db->error);
						}

						$db->close();

						$numRecords = mysqli_num_rows($result);

						if ($numRecords == 0) {
							echo ("<br />");
						}

						for ($i = 0; $i < $numRecords; $i++) {
							$result->data_seek($i);
							$row = $result->fetch_assoc();
							$dbComment = $row['comment'];

							echo "<hr class=\"lineBreak\"/>";
							echo $dbComment;

							if ($i == $numRecords - 1) {
								echo "<br /><font style=\"font-size:6px\"><br /></font>";
								echo "<font style=\"font-size:5px\"><br /><br /><br /></font>";
								echo "<center><span class=\"backLink\">[ <a href=\"index.php?sectionID={$sectionID}\" class=\"backLink\">{$translations['back']}</a> ]</span></center><br />";
							}
						}
						?>
					</td>
				</tr>
			</table>
			<?php
			echo ("<input type=\"hidden\" id=\"imageID\" name=\"imageID\" value=\"$imageID\" />");
			$redirectLink = "previewImage.php?picture=$picture&title=$title&sectionID=$sectionID&imageID=$imageID";
			echo ("<input type=\"hidden\" id=\"redirectLink\" name=\"redirectLink\" value=\"$redirectLink\" />");
			?>
		</form>

	</td>
</tr>
<?php
include 'partials/footer-light.php';
?>
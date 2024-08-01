<?php
ob_start(); // Start output buffering
$isAdmin = true;
include 'partials/header.php';
?>

<?php
if (isset($_POST['submitLogin'])) {

	// Get user input
	$user = $_POST['user'];
	$pass = $_POST['password'];

	// Connect to the database
	include 'partials/db-connect.php';


	// Prepare and bind
	$stmt = $db->prepare("SELECT COUNT(*) FROM user WHERE user_name = ? AND password = ?");
	if (!$stmt) {
		die("Prepare failed: " . $db->error);
	}

	$stmt->bind_param("ss", $user, $pass);

	// Execute the statement
	if (!$stmt->execute()) {
		die("Execute failed: " . $stmt->error);
	}

	// Bind result variables
	$stmt->bind_result($count);

	// Fetch the result
	if (!$stmt->fetch()) {
		die("Fetch failed: " . $stmt->error);
	}

	// Close the statement
	$stmt->close();

	// Close the database connection
	$db->close();

	// Check if the user exists
	if ($count == 1) {
		setcookie("loginGallery", "true", time() + 1800);
		header("Location: admin_index.php");
	} else {
		// Handle login failure
?>

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
							<td valign="middle" align="center"><input name="user" type="text" size="15" maxlength="50">
							</td>
						</tr>
						<tr>
							<td align="left" valign="middle"><span class="updateText">Passsword:</span> </td>
							<td valign="middle" align="center"><input name="password" type="password" size="15" maxlength="50"> </td>
						</tr>
						<tr>
							<td align="left" valign="middle"></td>
							<td valign="middle" align="left"><input type="submit" Value=" Submit " name="submitLogin">
							</td>
						</tr>
					</form>
				</table>
				<br>
				<span class="error">&nbsp;&nbsp;ERROR: Check your Username and Password then try
					again.&nbsp;&nbsp;</span>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
			</td>
		</tr>
		<tr>
			<td width="960" height="40" align="center" valign="middle" bgcolor="#000000" style="height:3px"></td>
		</tr>
<?php
		setcookie("loginGallery", "", time() - 1800);
		ob_end_flush(); // Flush the output buffer
	}
}
?>
<?php include 'partials/footer.php'; ?>
<?php
$isAdmin = true;
include 'partials/header.php';
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
      <form method="post" action="admin_checkLogin.php">
        <tr>
          <td align="left" valign="middle"><span class="updateText">Username:</span> </td>
          <td valign="middle" align="center"><input name="user" type="text" size="15" maxlength="50"> </td>
        </tr>
        <tr>
          <td align="left" valign="middle"><span class="updateText">Password:</span> </td>
          <td valign="middle" align="center"><input name="password" type="password" size="15" maxlength="50"> </td>
        </tr>
        <tr>
          <td align="left" valign="middle"></td>
          <td valign="middle" align="left"><input type="submit" Value=" Submit " name="submitLogin"></td>
        </tr>
      </form>
    </table>
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
<?php include 'partials/footer.php'; ?>
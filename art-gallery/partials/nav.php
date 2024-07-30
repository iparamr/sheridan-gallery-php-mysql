<?php
$indexPage = $isAdmin ?? false ? 'admin_index.php' : 'index.php';
$logInOutPage = $isAdmin ?? false ? 'admin_logout.php' : 'admin.php';
$logInOutText = $isAdmin ?? false ? 'Log Out' : 'Log In';
?>
<td width="960" height="40" align="center" valign="middle" bgcolor="#000000">
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" widht="100%">
        <tr>
            <td width="92%" align="center">
                <a href="<?= $indexPage ?>?sectionID=1" class="links">About</a> <span class="linksDivider">:: </span>
                <a href="<?= $indexPage ?>?sectionID=2" class="links">Digital Art</a> <span class="linksDivider"> :: </span>
                <a href="<?= $indexPage ?>?sectionID=3" class="links">Fine Art</a> <span class="linksDivider"> :: </span>
                <a href="<?= $indexPage ?>?sectionID=4" class="links">Contact</a>
            </td>

            <td width="8%" align="right">
                <span class="logOut">
                    <a href="<?= $logInOutPage ?>" style="color:#FFFFFF; text-decoration:none;">
                        <?= $logInOutText ?>
                    </a>
                </span>&nbsp;&nbsp;&nbsp;
            </td>

        </tr>
    </table>
</td>
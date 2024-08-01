<?php
ob_start(); // Start output buffering
ini_set('display_errors', '1');
error_reporting(E_ALL);
?>

<?php

if (isset($_COOKIE['loginGallery']) && $_COOKIE['loginGallery'] == true) {

?>
    <?php
    $count = isset($_POST['commentSel']) ? count($_POST['commentSel']) : 0;

    if (isset($_POST['commentSel']) && $count != 0) {
        $commentSel = $_POST['commentSel'];
        // Database connection
        include 'partials/db-connect.php';

        // Prepare and execute the delete query for each selected comment
        foreach ($commentSel as $commentIndex) {
            $query = $db->prepare("DELETE FROM comments WHERE comment_id = ?");
            $query->bind_param("i", $commentIndex);
            $query->execute() or die("Could not delete selected comment(s).");
        }

        // Close the connection
        $db->close();

        $redirectLink = $_POST['redirectLink'];
        header("Location: $redirectLink#deleteComments");
    } else {

        //else continued at bottom

    ?>

        <html>

        <head>
            <title>:: DezineWay - Image Gallery Portal ::</title>
            <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
            <link href="style.css" rel="stylesheet" type="text/css">
        </head>

        <body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
            <!-- ImageReady Slices (gallery.psd) -->
            <table width="1000" height="100%" border="0" align="center" cellpadding="0" cellspacing="0" id="Table_01" class="footerBox">

                <tr>
                    <td width="20" background="images/gallery_01.jpg"></td>
                    <td width="960" align="center" valign="top" bgcolor="#E4E4E4">
                        <table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="100%" align="center" valign="middle">
                                    <?php
                                    $redirectLink = $_POST['redirectLink'];
                                    echo ("
                                        <span class=\"error\">&nbsp;&nbsp;ERROR: No comment(s) selected.&nbsp;&nbsp;</span>
                                        <font style=\"font-size:20px\"><br /><br /><br /></font>					
                                        <span class=\"backLink\">[ <a href=\"$redirectLink#deleteComments\" class=\"backLink\"><< back</a> ]</span>
                                        <br /><br /><br /><br /><br /><br />	
                                ");
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td height="50" align="center" valign="middle" bgcolor="#A9AEA2"><span class="footer">::
                                        Copyright � 2007 www.designway.com ::</span></td>
                            </tr>
                        </table>
                    </td>
                    <td width="20" background="images/gallery_03.jpg"></td>
                </tr>
            </table>
            <!-- End ImageReady Slices -->
        </body>

        </html>
    <?php } ?>
<?php
} else {
    header("Location: admin.php");
}
ob_end_flush(); // Flush the output buffer

?>
<form method="post" action="admin_delete.php">
    <tr>
        <td height="30" colspan="5" bgcolor="#01AFC8">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="60%"><span class="tableHead"><?= $pageHeading ?></span></td>
                    <td width="40%" align="right">
                        <input type="submit" name="delImage" id="button" value="Delete">&nbsp;&nbsp;&nbsp;
                    </td>
                </tr>
            </table>
            <input type="hidden" id="redirectLink" name="redirectLink" value="<?= "admin_index.php?sectionID=$sectionID" ?>" />
        </td>
    </tr>
    <?php
    $numRecords = mysqli_num_rows($result);
    $cols = 5;
    $rows = ceil($numRecords / $cols);
    $index = 0;

    for ($i = 1; $i <= $rows; $i++) {
    ?>
        <tr>
            <?php
            for ($j = 1; $j <= $cols; $j++) {
                $row = mysqli_fetch_assoc($result);

                $thumbnail = $row['thumbnail'];
                $picture = $row['picture'];
                $title = $row['title'];
                $views = $row['views'];
                $imageID = $row['image_id'];
            ?>
                <td width="20%" height="135" align="center" valign="middle">
                    <font style="font-size:14px"><br /></font>
                    <a href="admin_editComment.php?sectionID=<?= $sectionID ?>&imageID=<?= $imageID ?>">
                        <img src="<?= $thumbnail ?>" width="65" height="65" alt="Click to edit" border="0" />
                    </a>
                    <br />
                    <font style="font-size:4px"><br /></font>
                    <span class="imgTitle"><?= $title ?></span><br />
                    <span class="views">Views: <?= $views ?></span>
                    <br />
                    <input name="imageSel[]" type="checkbox" value="<?= $imageID ?>" class="checkbox" />
                </td>
            <?php
                if ($index < $numRecords - 1) {
                    $index++;
                } else {
                    break;
                }
            }
            ?>
        </tr>
    <?php
    }
    ?>
</form>
<tr>
    <td height="30" colspan="5" bgcolor="#01AFC8"><span class="tableHead"><?= $pageHeading ?></span></td>
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
                <a href="previewImage.php?picture=<?= $picture ?>&title=<?= $title ?>&sectionID=<?= $sectionID ?>&imageID=<?= $imageID ?>">
                    <img src="<?= $thumbnail ?>" width="65" height="65" alt="" border="0" />
                </a><br />
                <font style="font-size:4px"><br /></font>
                <span class="imgTitle"><?= $title ?></span><br />
                <span class="views">Views: <?= $views ?></span>
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
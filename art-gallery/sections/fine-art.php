<?php
echo ("<tr>");
echo ("<td height=\"30\" colspan=\"5\" bgcolor=\"#01AFC8\"><span class=\"tableHead\">Fine Art</span></td>");
echo ("</tr>");
$numRecords = mysqli_num_rows($result2);
$cols = 5;
$rows = ceil($numRecords / $cols);
$index = 0;

for ($i = 1; $i <= $rows; $i++) {

    echo ("<tr>");

    for ($j = 1; $j <= $cols; $j++) {

        $row = mysqli_fetch_assoc($result2);

        $thumbnail = $row['thumbnail'];
        $picture = $row['picture'];
        $title = $row['title'];
        $views = $row['views'];
        $imageID = $row['image_id'];

        echo ("<td width=\"20%\" height=\"135\" align=\"center\" valign=\"middle\">");
        echo ("<a href=\"previewImage.php?picture=$picture&title=$title&sectionID=$sectionID&imageID=$imageID\"><img src=\"$thumbnail\" width=\"65\" height=\"65\" alt=\"\" border=\"0\" /></a><br />");
        echo ("<font style=\"font-size:4px\"><br /></font>");
        echo ("<span class=\"imgTitle\">$title</span><br />");
        echo ("<span class=\"views\">Views: $views</span>");
        echo ("</td>");

        if ($index < $numRecords - 1) {
            $index++;
        } else {
            break;
        }
    }

    echo ("</tr>");
}
?>
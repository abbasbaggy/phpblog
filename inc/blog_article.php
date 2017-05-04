<?php
/**
 * Created by PhpStorm.
 * User: Abbas
 * Date: 3/18/2017
 * Time: 11:50 PM
 */
include ("scripts/db_connect.php");
include ("scripts/header_12.php");

$articleID = $params['blogID'];
echo "
<main>
";

$sql = "SELECT * FROM blogarticles where articleID = '$articleID'";
$result = $link->query($sql);

while($row = $result->fetch_array())
{
    $articleID = $row['articleID'];
    $articleName = $row['articleName'];
    $articleAuthor = $row['articleAuthor'];
    $articleText = $row['articleText'];

    echo "
    <article>
        <h2>{$articleName}</h2>
        <h3>by {$articleAuthor}</h3>
        {$articleText}
     </article>";
}
echo"
</main>
";
include ("scripts/footer.php");


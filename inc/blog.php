<?php
/**
 * Created by PhpStorm.
 * User: Abbas
 * Date: 3/18/2017
 * Time: 11:50 PM
 */
include ("scripts/db_connect.php");
include ("scripts/header.php");

echo"
<main>
<h2>Blog Article</h2>
<p>Below is a list of all articles</p>
<ul>";

$sql = "SELECT * FROM blogarticles";
$result = $link->query($sql);
while($row = $result->fetch_array())
{
    $articleID = $row['articleID'];
    $articleName = $row['articleName'];
    $articleAuthor = $row['articleAuthor'];

    echo "<li><a href='/blog'/{$articleID}'>{$articleName}</a> by {$articleAuthor}</li>";
}
echo "
</main>";
include("scripts/footer.php");
?>
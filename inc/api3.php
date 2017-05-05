<?php
/**
 * Created by PhpStorm.
 * User: Abbas
 * Date: 5/5/2017
 * Time: 1:41 AM
 */

$articleID = $params['blog3D'];
$sql = "SELECT * FROM blogarticles where articleID = '$articleID'";
$result = $link->query($sql);
$row = mysqli_fetch_assoc($result);

include("scripts/header.php");
?>
<main>
    <script scr="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({selector: 'textarea'});</script>
    <form action="blog" method="PUT">
        <input type="text" name="articleName" placeholder="Article Name"
        required value="<?php echo $row['articleName'];?>" />

        <textarea name="articleText"></textarea>
        <input type="text" name="author" placeholder="Article Author"
               required value="<?php echo $row['articleAuthor'];?>" />
        <input type="submit">
    </form>
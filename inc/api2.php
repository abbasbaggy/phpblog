<?php
/**
 * Created by PhpStorm.
 * User: Abbas
 * Date: 5/5/2017
 * Time: 12:16 AM
 */

$articleID = $params['blog3D'];
include("scripts/header.php");
?>
<main>
    <script scr="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({selector: 'textarea'});</script>
    <form action="blog.php" method="POST">
        <input type="text" name="articleName" placeholder="Article Name">
        <textarea name="articleText"></textarea>
        <input type="text" name="author" placeholder="Article Author">
        <input type="submit">
    </form>

<?php

global $link;
$articleID = str_replace(' ', '-', $_POST["articleName"]);
$articleName = $_POST["articleName"];
$articleText = $_POST["articleText"];
$articleAuthor = $_POST['author'];
$query ="INSERT INTO blogarticles SET articleID='{$articleID}, articleName={$articleName},articleText={$articleText}, articleAuthor={$articleAuthor}'";
if(mysqli_query($link,$query))
{
    $response=array(
        'status' => 1,
        'status_message' => 'article added successfully.'
    );
}
else
{
    $response=array(
        'status' => 0,
        'status_message' =>'product Addition failed.'
    );
}
echo json_encode($response);
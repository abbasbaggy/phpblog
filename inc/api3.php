<?php
/**
 * Created by PhpStorm.
 * User: Abbas
 * Date: 5/5/2017
 * Time: 1:41 AM
 */
include ("scripts/db_connect.php");
$articleID = $params['blog2D'];
$sql = "SELECT * FROM blogarticles where articleID = '$articleID'";
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_assoc($result);

include("scripts/header.php");
?>
<main>
    <script scr="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({selector: 'textarea'});</script>
    <form action="" method="PUT">
        <input type="text" name="articleName" placeholder="Article Name"
        required value="<?php echo $row['articleName'];?>" />

        <textarea name="articleText"></textarea>
        <input type="text" name="author" placeholder="Article Author"
               required value="<?php echo $row['articleAuthor'];?>" />
        <input type="submit">
    </form>


<?

    global $link;

    $articleID=$_POST['articleID'];
    $articleName=$_POST['article_name'];
    $articleText=$_POST['articleText'];
    $articleAuthor=$_POST['articleAuthor'];
    $query = "UPDATE blogarticles SET (articleName, articleText, articleAuthor)
    VALUES ('" . $articleName . "', '" . $articleText . "', '" . $articleAuthor . "')WHERE articleID='".$articleID."'";
    if(mysqli_query($link, $query))
    {
    $response=array(
    'status' => 1,
    'status_message' =>'article Updated Successful'
    );
    }
    else{
    $response=array(
    'status'=> 0,
    'status_message' => 'article update failed'
    );
    }
    echo json_encode($response);
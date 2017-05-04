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

$request_method=$_SERVER["REQUEST_METHOD"];
switch($request_method)
{
    case 'GET':

        if(!empty($_GET["articleID"]))
        {
            $articleID=intval($_GET["articleID"]);
            get_article($articleID);
        }
        else{
            get_article();
        }
        break;
    case 'POST':
        insert_article();
        break;
    default:
        header("HTTP/1.0 405 not allowed");
}


function insert_article()
{
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
}

function get_article($articleID=0)
{
    global $link;
    $query="SELECT * FROM blogarticles";
    if($articleID != 0)
    {
        $query.=" WHERE articleID=".$articleID." LIMIT 1";
    }
    $response=array();
    $result= mysqli_query($link, $query);
    while($row=mysqli_fetch_array($result))
    {
        $response[]=$row;
    }

    echo json_encode($response);
}

echo "
</main>";
include("scripts/footer.php");
?>
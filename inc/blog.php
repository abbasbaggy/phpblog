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
<h2>Data test</h2>
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
    case 'PUT':
        $articleID=intval($_GET["articleID"]);
        update_article($articleID);
        break;
    case 'DELETE':
        $articleID = intval($_GET["articleID"]);
        delete_product($articleID);
    default:
        header("HTTP/1.0 404 not available");
}


function insert_article()
{
    global $link;
    $articleID = str_replace(' ', '-', $_POST["articleName"]);
    $articleName = $_POST["articleName"];
    $articleText = $_POST["articleText"];
    $articleAuthor = $_POST['author'];
    $query = "INSERT INTO blogarticles (articleID, articleName, articleText, articleAuthor) 
        VALUES ('" . $articleID . "', '" . $articleName . "', '" . $articleText . "', '" . $articleAuthor . "')";

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
            'status_message' =>'article Addition failed.'
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
function delete_article($articleID)
{
    global $link;
    $sql = "SELECT * FROM blogarticles where articleID = '$articleID'";

    if(mysqli_query($link,$sql))
    {
        $response=array(
            'status'=> 1,
            'status_message'=>'article deleted successful.'
        );
    }
    else{
        $response=array(
            'status'=> 0,
            'status_message'=>'article deleted failed.'
        );
    }
    echo json_encode($response);
}
function update_article($articleID)
{
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
}

echo "
</main>";
include("scripts/footer.php");
?>
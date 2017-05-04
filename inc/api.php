<?php
/**
 * Created by PhpStorm.
 * User: Abbas
 * Date: 3/18/2017
 * Time: 11:50 PM
 */





include ("scripts/db_connect.php");
include ("scripts/header_12.php");

$articleID = $params['blog2D'];

echo "
<main>
";
$request_method=$_SERVER["REQUEST_METHOD"];
switch($request_method)
{
    case 'GET';

        if(!empty($_GET["articleID"]))
        {
            $articleID=intval($_GET["articleID"]);
            get_article($articleID);
        }
        else{
            get_article();
        }
        break;
    default:
        header("HTTP/1.0 405 not allowed");
}


function get_article($articleID=0)
{
    global $link;
    $query="SELECT * FROM blogarticles WHERE articleID ='$articleID'";

    $response=array();
    $result= mysqli_query($link, $query);
    while($row=mysqli_fetch_array($result))
    {
        $response[]=$row;
    }

    echo json_encode($response);
}

echo"
</main>
";
include ("scripts/footer.php");

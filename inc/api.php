<?php
/**
 * Created by PhpStorm.
 * User: Abbas
 * Date: 3/18/2017
 * Time: 11:50 PM
 */





include ("scripts/db_connect.php");
include ("scripts/header_12.php");

$article_id = $params['blog2D'];

echo "
<main>
";
$request_method=$_SERVER["REQUEST_METHOD"];
switch($request_method)
{
    case 'GET';

        if(!empty($_GET["article_id"]))
        {
            $article_id=intval($_GET["article_id"]);
            get_article($article_id);
        }
        else{
            get_article();
        }
        break;
    default:
        header("HTTP/1.0 405 not allowed");
}


function get_article($article_id=0)
{
    global $link;
    $sql="SELECT * FROM blogarticles";
    if($article_id != 0)
    {
        $sql.=" WHERE articleID=".$article_id." LIMIT 1";
    }
    $response=array();
    $result= $link->query($sql);
    while($row=$result->fetch_array())
    {
        $response[]=$row;
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

echo"
</main>
";
include ("scripts/footer.php");

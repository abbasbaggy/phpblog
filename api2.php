<?php
/**
 * Created by PhpStorm.
 * User: Abbas
 * Date: 5/4/2017
 * Time: 8:20 PM
 */
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

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
$sql = "SELECT * FROM blogarticles where articleID = '$articleID'";
$res=array();
$result = $link->query($sql);

while($row = $result->fetch_array()) {
    $res[]=$row;
}
    echo json_encode($res);

echo"
</main>
";
include ("scripts/footer.php");

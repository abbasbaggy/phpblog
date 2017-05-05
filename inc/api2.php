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
    <form action="api/2" method="POST">
        <input type="text" name="articleName" placeholder="Article Name">
        <textarea name="articleText"></textarea>
        <input type="text" name="author" placeholder="Article Author">
        <input type="submit">
    </form>




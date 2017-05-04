<?php
/**
 * Created by PhpStorm.
 * User: Abbas
 * Date: 3/18/2017
 * Time: 11:51 PM
 */

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        include("scripts/header.php");
        ?>
        <main>
            <script scr="//cdn.tinymce.com/4/tinymce.min.js"></script>
            <script>tinymce.init({selector: 'textarea'});</script>
            <form action="createarticle" method="post">
                <input type="text" name="articleName" placeholder="Article Name">
                <textarea name="articleText"></textarea>
                <input type="submit">
            </form>

        </main>
        <?
        include("scripts/footer.php");
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include('scripts/db_connect.php');
        $articleID = str_replace(' ', '-', $_POST["articleName"]);
        $articleName = $_POST["articleName"];
        $articleText = $_POST["articleText"];
        $articleAuthor = $_SESSION['username'];

        $sql = "INSERT INTO blogArticle (articleID, articleName, articleText, articleAuthor) 
        VALUES ('" . $articleID . "', '" . $articleName . "', '" . $articleText . "', '" . $articleAuthor . "')";
        if (mysqli_query($link, $sql)) {
        } else {
            echo "Error: " . $sql . "<br>Error Message:" . mysqli_error($link);
        }
        header("blog");

    //test
} else {
    header("location:login");
}
?>
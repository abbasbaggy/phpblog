<?php
/**
 * Created by PhpStorm.
 * User: Abbas
 * Date: 3/18/2017
 * Time: 11:49 PM
 */
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The blog of the Chales babbage</title>
</head>
<body>
<header>
    <h1>The blog of chales Babbage</h1>
    <nav>
        <ul>
            <li><a href="./">Home page</a></li>
            <li><a href="blog">My Blog</a></li>
            <li><a href="about">About me</a></li>
            <li><a href="contactus">Contact Me</a></li>
            <?php
            if (isset($_SESSION['username'])) {
                echo "<li><a href='createarticle'>Create Article</a></li>";
                echo "<li><a href='logout'>logout</a></li>";
            } else {
                echo "<li><a href='login'>Login</a></li>";
            }
            ?>
        </ul>
    </nav>
</header>
</body>
</html>

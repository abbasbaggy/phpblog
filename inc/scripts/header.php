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
    <title>The ApI</title>
</head>
<body>
<header>
    <h1>The ApI</h1>
    <nav>
        <ul>
            <li><a href="./">Home page</a></li>
            <li><a href="blog">My Blog</a></li>
            <li><a href="about">About me</a></li>
            <li><a href="contactus">Contact Me</a></li>
            <?php
            echo "<li><a href='api'>api test1</a></li>";
            echo "<li><a href='api2'>api test2</a></li>";

                echo "<li><a href='createarticle'>Create Article</a></li>";
                echo "<li><a href='logout'>logout</a></li>";

                echo "<li><a href='login'>Login</a></li>";

            ?>
        </ul>
    </nav>
</header>
</body>
</html>

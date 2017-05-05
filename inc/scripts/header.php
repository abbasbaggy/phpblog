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
            <li><a href="api">My ApI</a></li>

            <?php
            echo "<li><a href='api'>api test1</a></li>";
            echo "<li><a href='api2'>api test2</a></li>";



            ?>
        </ul>
    </nav>
</header>
</body>
</html>

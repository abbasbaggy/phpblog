<?php
/**
 * Created by PhpStorm.
 * User: Abbas
 * Date: 3/18/2017
 * Time: 11:52 PM
 */
session_start();
if (isset($_SESSION['username']))
{
    unset($_SESSION['username']);
}
header("location:./");

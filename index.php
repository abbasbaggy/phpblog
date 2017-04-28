<?php ini_set('display_errors', 1);

define('INCLUDE_DIR', dirname(__FILE__) . '/inc/');

$rules = array(
    //main pages
    'about'=>"/about",
    'contactus'=>"/contactus",
    'blog'=>"/blog",
    'blog_article'=>"/blog/(?'blogID'[\w\-]+)",

    //Admin pages
    'login'=>"/login",
    'create_article'=>"/createarticle",
    'logout'=>"/logout",

    //Home page
    'home'=>"/"
);

$uri = rtrim(dirname($_SERVER["SCRIPT_NAME"]), '/');
$uri = '/' . trim(str_replace($uri, '', $_SERVER['REQUEST_URI']), '/');
$uri = urldecode($uri);

foreach ($rules as $action => $rule) {
    if (preg_match('~^' . $rule . '$~i', $uri, $params)) {
        include(INCLUDE_DIR. $action . '.php');
        exit();
    }
}
//nothing is found so handle as 404 error
include(INCLUDE_DIR . '404.php');

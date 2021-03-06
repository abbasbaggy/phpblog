<?php ini_set('display_errors', 1);

define('INCLUDE_DIR', dirname(__FILE__) . '/inc/');

$rules = array(
    //main pages
    'about'=>"/about",
    'contactus'=>"/contactus",
    'blog'=>"/api",
    'blog_article'=>"/blog/(?'blogID'[\w\-]+)",
    'blog_article2'=>"/blog/(?'blogUP'[\w\-]+)",


    //Admin pages
    'login'=>"/login",
    'create_article'=>"/createarticle",
    'logout'=>"/logout",
    'api'=>"/api/(?'blog2D'[\w\-]+)",
    'api2'=>"/api2",
    'api3'=>"/api3(?'blog3D'[\w\-]+)",

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

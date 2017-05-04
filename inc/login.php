<?php
/**
 * Created by PhpStorm.
 * User: Abbas
 * Date: 3/18/2017
 * Time: 11:52 PM
 */
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    include("scripts/header.php");
    ?>
    <main>
        <form action="login" method="post">
            <input type="text" name="username" placeholder="username"></br>
            <input type="passowrd" name="password" placeholder="password"><br>
            <p><input type="submit" value="submit"></p>
        </form>
    </main>
<?php
    include("scripts/footer.php");
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

    include("scripts/db_connect.php");
    $username =$_POST["username"];
    $password = $_POST["password"];
    
    function checklogin($username, $password, $link)
    {
        $sql = "SELECT * FROM users WHERE username='" . $username . "' and 
        password='" . $password . ".";
        $result = mysqli_query($link,$sql);
        while ($row = mysqli_fetch_row($result)) {
        return true;
    }
    return false;
    }
    if (checklogin($username, $password, $link)) {
        session_start();
    $_SESSION['username'] = $username;
    header("location:./");
} else {
    header("location:login");
}

} else {
    //impossible
    print('whoops');
}


?>


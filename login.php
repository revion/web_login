<?php
//Session begin
session_start();
require "init.php";

//Initialization of your input
$username = $_POST['username'];
$password = md5($_POST['password']);

//Login required
if(!empty($_POST)) {
    if(isset($username) && isset($password)) {
        $login = "SELECT * FROM login_id WHERE username = '$username' AND password = '$password'";
        //Check of query is valid
        $result = mysqli_query($connection,$login);
        if(mysqli_num_rows($result) != 0) {
            $_SESSION['username'] = $username;
        } else {
            header("Location: index.php");
        }
    } else {
        header("Location: index.php");
    }
}


//When you successfully trigger login form
if(!isset($_SESSION['username'])) {
    header("Location: index.php");
} else {
    echo "Login successfully";
}
//Close connection to database to ensure security of users data
mysqli_close($connection);
?>

<html>
    <body>
        <br />
        <form action="submit.php">
            <input type = "submit" value = "Submit" />
        </form>
        <br />
        <form action="logout.php">
            <input type = "submit" value = "Log Out" />
        </form>
    </body>
</html>
<?php
//Session begin
require "init.php";

//Initialization of your input
$username = $_POST['username'];
$password = md5($_POST['password']);

if(!empty($_POST)){
    //The query
    $reset = "UPDATE login_id SET password='$password' WHERE username='$username'";
    //Run the query
    $result = mysqli_query($connection, $reset);
    if(!$result) {
        echo "Username is not available";
        header("Location:register.php");
    } else {
        header("Location:index.php");
    }
}
//Close connection to database to ensure security of users data
mysqli_close($connection);
?>

<html>
    <body>
        <form method="post">
            Username:<br />
            <input type="text" name="username" value="" /><br />
            Password:<br />
            <input type="password" name="password" value="" /><br />
            <input type="submit" value="Reset" />
        </form>
        <br />
        <a href="index.php">Back</a>
    </body>
</html>
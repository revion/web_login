<?php
//Session begin
require "init.php";

//Initialization of your input
$username = $_POST['username'];
$password = md5($_POST['password']);

if(!empty($_POST)){
    //The query
    $register = "INSERT INTO login_id VALUES('$username','$password')";
    //Let's run the query to database
    $result = mysqli_query($connection, $register);
    if(!$result) {
        echo "Register failed!";
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
            <input type="text" value="" name="username" /><br />
            Password:<br />
            <input type="password" value="" name="password" /><br />
            <br />
            <input type="submit" value="Register" />
        </form>
    </body>
</html>
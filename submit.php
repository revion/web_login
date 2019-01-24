<?php
require "init.php";

//Initialization of your input
$username = $_SESSION['username'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phoneNumber'];
$productSelected = $_POST['productSelect'];
$productQty = $_POST['productQty'];

//Checker
$emailPattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
$phonePattern = "/^[0-9]{10,12}$/";
//Insert data from database
$insertData = "INSERT INTO returnTransaction(username, name, email, phoneNumber, product, qty) VALUES('$username','$name','$email','$phone','$productSelected','$productQty')";
//At least, there's input
if(!empty($_POST)) {
    //Check email pattern
    if(!preg_match($emailPattern,$email)) {
        echo "Invalid email format";
    }
    //Check phone pattern
    else if(!preg_match($phonePattern,$phone)) {
        echo "Invalid phone format";
    } else {
        //Check of query is valid
        if(!mysqli_query($connection,$insertData)) {
            echo "Cannot save the input to database";
        } else {
            echo "Successfully registered";
        }
    }
}
//Close connection to database to ensure security of users data
mysqli_close($connection);
?>

<html>
    <body>
        <form method="post">
            Complete Name:<br />
            <input type="text" value="" name="name" /><br />
            Email:<br />
            <input type="email" value="" name="email" /><br />
            Phone Number:<br />
            <input type="tel" value="" name="phoneNumber" /><br />
            Product:<br />
            <select name="productSelect">
                <option value="">Pilih item</option>
                <option value="Product A">Product A</option>
                <option value="Product B">Product B</option>
                <option value="Product C">Product C</option>
            </select>
            <br />
            Quantity:<br />
            <input type="number" value="" name="productQty" /><br />
            <input type="submit" value="Submit" />
        </form>
        <br />
        <a href="http://127.0.0.1/project/test/login.php">Back</a>
    </body>
</html>
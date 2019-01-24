<?php
//Session begin
session_start();
//Function
function getData() {
    //Make connection to database
    require "init.php";
    //Query
    $progress = "SELECT queueNumber, name, product, qty, status FROM returnTransaction";
    $query = mysqli_query($connection, $progress);
    //Check query
    if(mysqli_num_rows($query) > 0) {
        //Value counter only
        //Print the output one by one
        while($row = mysqli_fetch_assoc($query)) {
            //Easier to remember the initialization instead of print by row
            $uniqueID = $row["queueNumber"];
            $name = $row["name"];
            $product = $row["product"];
            $qty = $row["qty"];
            $status = $row["status"];
            if(!$status) {
                echo "<form method='post'><tr>";
                echo "<td>".$name."</td>";
                echo "<td>".$product."</td>";
                echo "<td>".$qty."</td>";
                echo "<td>".$status."</td>";
                echo "<td><center><input type='checkbox' name='check_list[]' value='".$uniqueID."'/></center></td>";
                echo "</tr>";
            }
        }
    }
    mysqli_close($connection);
}

function updateData() {
    require "init.php";
    //If there's any submit
    if(isset($_POST['submit'])) {
        //If there's any checks
        if(!empty($_POST['check_list'])) {
            //Every selected item will be processed
            foreach($_POST['check_list'] as $selected) {
                //Query
                $doneProgress = "UPDATE returnTransaction SET status = '1' WHERE queueNumber = '$selected'";
                $query = mysqli_query($connection, $doneProgress);
                //If success, will print, if not will not updated
                if(!$query) {
                    echo "Need connection to database";
                } else {
                    echo "<br />".$selected."<br />";
                    echo "Updated!";
                    header("Location:dashboard.php");
                }
            }
        }
    }
    mysqli_close($connection);
}
?>

<html>
    <body>
        <center><h1>Progress Dashboard</h1></center>
        <table border="1" width="100%">
            <tr>
                <td>
                    <center><h3>Name</h3></center>
                </td>
                <td>
                    <center><h3>Product</h3></center>
                </td>
                <td>
                    <center><h3>Quantity</h3></center>
                </td>
                <td>
                    <center><h3>Status</h3></center>
                </td>
            </tr>
            <?php
                getData();
            ?>
        </table>
            <input type="submit" name="submit" value="Progress Done" />
        </form>
        <?php
            updateData();
        ?>
    </body>
</html>
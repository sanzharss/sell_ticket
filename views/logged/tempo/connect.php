<?php
// Put your specific mysql database connection data below
// host, user, password, database name in between the double quotes ---> " here "
$connect = mysqli_connect("localhost", "root", "", "test");
// Evaluate the connection
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
    exit();
}
?>
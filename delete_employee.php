<?php

require "conn.php";

$id = $_GET['u_id'];
$sql = "DELETE FROM employee WHERE u_id='$id'";

if (mysqli_query($conn, $sql) == true) {
    header("Location: dash.php");
} else {
    echo "Error : " . $sql . "</br>" . mysqli_error($conn);
}

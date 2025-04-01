<?php

$server = "localhost";
$db_name = "haggle_db";

$user = "mikko_root";
$password = "";

$conn = new mysqli($server, $user, $password, $db_name);

if ($conn->connect_error) {
    echo "<script>alert(\"First Connection Failed.\")</script>";

    $user = "root";

    $conn = new mysqli($server, $user, $password, $db_name);

    if ($conn->connect_error) {
        echo "<script>alert(\"Second Connection Failed.\")</script>";
        die("Both Connection to the Database Failed: ". $conn->connect_error);
    }
}
?>
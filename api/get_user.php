<?php
session_start();

include "connect_db.php";

if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    $email = $_SESSION["email"];
    $address = $_SESSION["address"];
    $contact_number = $_SESSION["contact_number"];
} else {
    $username = "Guest";
    $email = "Guest";
    $address = "Guest";
    $contact_number = "Guest";
}
?>
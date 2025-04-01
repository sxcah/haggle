<?php
session_start();

include "connect_db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $contact_number = $_POST["contact-number"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm-password"];

    if (empty($username) || empty($email) || empty($address) || empty($contact_number) || empty($password) || empty($confirm_password)) {
        $error_message = "There are missing fields.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
        $error_message = "Username cannot contain special characters.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format.";
    } elseif (strlen($contact_number) != 11) {
        $error_message = "Contact Number can only have 11 numbers";
    } elseif ($password != $confirm_password) {
        $error_message = "Passwords do not match.";
    } else {

        $stmt = $conn->prepare("INSERT INTO user_information(email, address, contact_number) VALUES(?,?,?)");
        if ($stmt) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $stmt->bind_param("ssi", $email, $address, $contact_number);
            if ($stmt->execute()) {
                $userID = $conn->insert_id;
                $stmt2 = $conn->prepare("INSERT INTO user_account(userID, username, password) VALUES(?,?,?)");
                if ($stmt2) {
                    $stmt2->bind_param("iss", $userID, $username, $hashed_password);

                    if ($stmt2->execute()) {
                        header("Location: ../forms/login.php");
                        exit();
                    } else {
                        $error_message = "Error inserting into user_account: " . $stmt2->error;
                        error_log("user_account insert error: " . $stmt2->error);
                    }
                    $stmt2->close();
                } else {
                    $error_message = "Error preparing user_account statement: " . $conn->error;
                    error_log("user_account prepare error: " . $conn->error);
                }
            } else {
                $error_message = "Error inserting into user_information: " . $stmt->error;
                error_log("user_information insert error: " . $stmt->error);
            }
            $stmt->close();
        } else {
            $error_message = "Error preparing user_information statement: " . $conn->error;
            error_log("user_information prepare error: " . $conn->error);
        }
    }
    

    $_SESSION["error_message"] = $error_message;
    header("Location: ../forms/register.php");
    exit();

} $conn->close();
?>
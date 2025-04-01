<?php
session_start();

include "connect_db.php";

// REFERENCING (../FORMS/LOGIN.PHP)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($username)){
        $error_message = "Enter Username.";
    } elseif (empty($password)) {
        $error_message = "Enter Password.";
    } else {
        $stmt = $conn->prepare("SELECT user_account.password, user_information.email, user_information.address, user_information.contact_number, user_information.userID FROM user_account JOIN user_information ON user_account.userID = user_information.userID WHERE user_account.username = ?");

        if ($stmt) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $hashed_password = $row["password"];

                if (password_verify($password, $hashed_password)) {
                    $_SESSION["userID"] = $row["userID"];
                    $_SESSION["username"] = $username;
                    $_SESSION["email"] = $row["email"];
                    $_SESSION["address"] = $row["address"];
                    $_SESSION["contact_number"] = $row["contact_number"];

                    header("Location: ../home.php");
                    exit();
                } else {
                    $error_message = "Wrong password.";
                }
            } else {
                $error_message = "Username not found.";
            }
            $stmt->close();
        } else {
            $error_message = "Database Error: ". $conn->error;
        }
    }
    $conn->close();

    $_SESSION["error_message"] = $error_message;
    header("Location: ../forms/login.php");
    exit();
}
?>
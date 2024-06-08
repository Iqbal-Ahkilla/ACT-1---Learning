<?php

session_start();

include "connection/connection.php";

if(isset($_POST["contact-message"])){

    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    $sql = "INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)";
    $stmt_sql = $conn->prepare($sql);
    $stmt_sql->bind_param("sss", $name, $email, $message);

    if($stmt_sql->execute()){
        $_SESSION["message"] = "Message sended successfully!";
        header("Location: ../index.php");
    } else{
        $_SESSION["message"] = "Sending message failed!";
        header("Location: ../index.php");
    }

$conn->close();

}

?>
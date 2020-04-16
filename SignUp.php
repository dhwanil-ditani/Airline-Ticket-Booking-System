<?php

$username = $_POST["username"];
$password = $_POST["password"];
$email_id = $_POST["email_id"];

$conn = mysqli_connect("localhost:3306", "devuser", "password", "Ticket_Booking");

if (!$conn) {
    die("Connection Failed" . mysqli_connect_error());
}

$sql_query = "INSERT INTO Users (username, password, email_id) VALUES ('$username', '$password', '$email_id');";

if (mysqli_query($conn, $sql_query)) {
    echo "SignUp Successfully";
} else {
    echo "Error: $sql_query <br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>

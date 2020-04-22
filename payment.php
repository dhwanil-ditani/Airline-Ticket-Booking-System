<?php

$mode = $_POST["mode"];
$amount = $_POST["amount"];
$user_id = $_POST["user_id"];

$conn = mysqli_connect("localhost:3306", "devuser", "password", "Ticket_Booking");

if (!$conn) {
    die("Connection Failed" . mysqli_connect_error());
}

$sql_query = "INSERT INTO Payment (mode, amount, user_id) VALUES ('$mode', $amount, $user_id);";

if (mysqli_query($conn, $sql_query)) {
    echo "Payment Successfull";
}
else {
    echo "Payment Failed";
}


mysqli_close($conn);

?>
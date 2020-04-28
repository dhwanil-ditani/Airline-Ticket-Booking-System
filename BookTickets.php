<?php

$passenger_id = $_POST['passenger_id'];
$flight_id = $_POST['flight_id'];
// $seat_no = $_POST['seat_no'];
$payment_id = $_POST['payment_id'];

$conn = mysqli_connect("localhost:3306", "devuser", "password", "Ticket_Booking");

if (!$conn) {
    die("Connectioecho "$sql_query";n Failed" . mysqli_connect_error());
}

// $sql_query = "INSERT INTO Ticket (passenger_id, flight_id, seat_no, payment_id) VALUES ($passenger_id, $flight_id, $seat_no, $payment_id);";
$sql_query = "INSERT INTO Ticket (passenger_id, flight_id, payment_id) VALUES ($passenger_id, $flight_id, $payment_id);";
// echo "$sql_query";
// echo "$sql_query";
if (mysqli_query($conn, $sql_query)) {
echo "<p class='labels' style='text-align: center'>TICKET(S) BOOKED SUCCESSFULLY.</p>";
}
else {
    echo "<p class='labels' style='text-align: center'>BOOKING FAILED.</p>";
}

mysqli_close($conn);

?>
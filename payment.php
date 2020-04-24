<?php

$mode = $_POST["mode"];
$amount = $_POST["amount"];
$user_id = $_POST["user_id"];
$payment_id = 0;

$conn = mysqli_connect("localhost:3306", "devuser", "password", "Ticket_Booking");

if (!$conn) {
    die("Connection Failed" . mysqli_connect_error());
}

$sql_query = "INSERT INTO Payment (mode, amount, user_id) VALUES ('$mode', $amount, $user_id);";

if (mysqli_query($conn, $sql_query)) {
    echo "Payment Successfull";
    $sql_query = "SELECT P_id FROM Payment;";
<<<<<<< HEAD
    $result = mysqli_query($conn, $sql_query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $payment_id = $row["P_id"];
=======
    $result = mysqli_query($sql_query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $payment_id = $row['P_id'];
>>>>>>> 81c59441c24ff043ecaa057b394cad12fa875fa6
            // echo "P = " . $row['P_id'] . "";
        }
    }
    echo "<script>payment_id = " . $payment_id . "</script>";
}
else {
    echo "Payment Failed";
}


mysqli_close($conn);

?>
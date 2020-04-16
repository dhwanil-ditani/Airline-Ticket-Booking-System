<?php

$depart_date = $_POST["depart_date"];
// $return_date = $_POST["return_date"];
$src = $_POST["src"];
$des = $_POST["des"];

$conn = mysqli_connect("localhost:3306", "devuser", "password", "Ticket_Booking");

if (!$conn) {
    die("Connection Failed" . mysqli_connect_error());
}

$sql_query = "SELECT * FROM Flight WHERE depart_date='$depart_date' AND src='$src' AND des='$des';";
$result = mysqli_query($conn, $sql_query);
if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'><tr><th>F_id</th><th>src</th><th>des</th><th>depart_time</th><th>arrive_time</th><th>depart_date</th><th>arrive_date</th><th>airplane_name</th><th>noOfSeats</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row['F_id'] . "</td><td>" . $row['src'] . "</td><td>" . $row['des'] . "</td><td>" . $row['depart_time'] . "</td><td>" . $row['arrive_time'] . "</td><td>" . $row['depart_date'] . "</td><td>" . $row['arrive_date'] . "</td><td>" . $row['airplane_name'] . "</td><td>" . $row['noOfSeats'] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No Flights for the Requested Criteria";
}


mysqli_close($conn);

?>

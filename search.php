<?php

$trip_type = $_POST["trip_type"];
$depart_date = $_POST["depart_date"];
$return_date = $_POST["return_date"];
$src = $_POST["src"];
$des = $_POST["des"];

$conn = mysqli_connect("localhost:3306", "devuser", "password", "Ticket_Booking");

if (!$conn) {
    die("Connection Failed" . mysqli_connect_error());
}

if ($trip_type == "return") {
    $sql_query = "SELECT * FROM Flight WHERE depart_date='$depart_date' AND src='$src' AND des='$des';";
    $result = mysqli_query($conn, $sql_query);
    if (mysqli_num_rows($result) > 0) {
        echo "
        <style> 
        div.ticket { 
            background-color: red; 
            width: 75vw; 
            margin: 0 auto; 
            border-radius: 15px; 
        } </style>";
        
        echo "<h3>flights from $src to $des.</h3>";
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <div id='ticket_go' class='ticket'>
                <p>" . $row['depart_time'] . " -> " . $row['arrive_time'] . "</p>
                <p>" . $row['depart_date'] . " -> " . $row['arrive_date'] . "</p>
                <p>$src -> $des</p>
                <label for='flight_go'><input type='radio' value='" . $row['F_id'] . "' name='flight_go' id='flight_go' required> select</label>
            </div>";
        }
    } else {
        echo "No Flights for the Requested Criteria";
    }
    
    $sql_query = "SELECT * FROM Flight WHERE depart_date='$return_date' AND src='$des' AND des='$src';";
    $result = mysqli_query($conn, $sql_query);
    if (mysqli_num_rows($result) > 0) {
        echo "<h3>flights from $des to $src.</h3>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <div id='ticket_ret' class='ticket'>
                <p>" . $row['depart_time'] . " -> " . $row['arrive_time'] . "</p>
                <p>" . $row['depart_date'] . " -> " . $row['arrive_date'] . "</p>
                <p>$des -> $src</p>
                <label for='flight_ret'><input type='radio' value='" . $row['F_id'] . "' name='flight_ret' id='flight_ret' required> select</label>
            </div>";
        }
    } else {
        echo "No Flights for the Requested Criteria";
    }
} else {
    $sql_query = "SELECT * FROM Flight WHERE depart_date='$depart_date' AND src='$src' AND des='$des';";
    $result = mysqli_query($conn, $sql_query);
    if (mysqli_num_rows($result) > 0) {
        echo "
        <style> 
        div.ticket { 
            background-color: red; 
            width: 75vw; 
            margin: 0 auto; 
            border-radius: 15px; 
        } </style>";
        
        echo "<h3>flights from $src to $des.</h3>";
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <div id='ticket_go' class='ticket'>
                <p>" . $row['depart_time'] . " -> " . $row['arrive_time'] . "</p>
                <p>" . $row['depart_date'] . " -> " . $row['arrive_date'] . "</p>
                <p>$src -> $des</p>
                <label for='flight_go'><input type='radio' value='" . $row['F_id'] . "' name='flight_go' id='flight_go' required> select</label>
            </div>";
        }
    } else {
        echo "No Flights for the Requested Criteria";
    }
}

mysqli_close($conn);

?>

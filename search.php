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
            background-color: #202020; 
            width: 60vw; 
            margin: 7.5px auto; 
            border-radius: 25px;
            padding: 20px;
            background-image: radial-gradient( circle 523px at 7.1% 19.3%,  rgba(147,15,255,1) 2%, rgba(5,49,255,1) 100.7% );
        } </style>";
        
        echo "<h3>flights from $src to $des.</h3>";
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <div id='ticket_go' class='ticket " . $row['F_id'] . "'>
                <input type='radio' value='" . $row['F_id'] . "' name='flight_go' id='flight_go' required>
                <p><span class='depart_time " . $row['F_id'] . "'>" . $row['depart_time'] . "</span> -> <span class='arrive_time " . $row['F_id'] . "'>" . $row['arrive_time'] . "</span></p>
                <p><span class='depart_date " . $row['F_id'] . "'>" . $row['depart_date'] . "</span> -> <span class='arrive_time " . $row['F_id'] . "'>" . $row['arrive_date'] . "</span></p>
                <p><span class='src " . $row['F_id'] . "'>" . $row['src'] . "</span> -> <span class='des " . $row['F_id'] . "'>" . $row['des'] . "</span></p>
                <p><strong>₹. <span class='amount " . $row['F_id'] . "'>". $row['amount'] . "</span></strong></p>
            </div>";
        }
    } else {
        echo "No flights available.";
    }
    
    $sql_query = "SELECT * FROM Flight WHERE depart_date='$return_date' AND src='$des' AND des='$src';";
    $result = mysqli_query($conn, $sql_query);
    if (mysqli_num_rows($result) > 0) {
        echo "<h3>flights from $des to $src.</h3>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <div id='ticket_ret' class='ticket " . $row['F_id'] . "'>
                <input type='radio' value='" . $row['F_id'] . "' name='flight_ret' id='flight_ret' required>
                <p><span class='depart_time " . $row['F_id'] . "'>" . $row['depart_time'] . "</span> -> <span class='arrive_time " . $row['F_id'] . "'>" . $row['arrive_time'] . "</span></p>
                <p><span class='depart_date " . $row['F_id'] . "'>" . $row['depart_date'] . "</span> -> <span class='arrive_time " . $row['F_id'] . "'>" . $row['arrive_date'] . "</span></p>
                <p><span class='src " . $row['F_id'] . "'>" . $row['src'] . "</span> -> <span class='des " . $row['F_id'] . "'>" . $row['des'] . "</span></p>
                <p><strong>₹. <span class='amount " . $row['F_id'] . "'>". $row['amount'] . "</span></strong></p>
            </div>";
        }
    } else {
        echo "No flights available";
    }
} else {
    $sql_query = "SELECT * FROM Flight WHERE depart_date='$depart_date' AND src='$src' AND des='$des';";
    $result = mysqli_query($conn, $sql_query);
    if (mysqli_num_rows($result) > 0) {
        echo "
        <style> 
        div.ticket { 
            background-color: #202020; 
            width: 75vw; 
            margin: 7.5px auto; 
            border-radius: 25px;
            padding: 25px;
            padding-bottom: 15px;
            background-image: radial-gradient( circle 523px at 7.1% 19.3%,  rgba(147,15,255,1) 2%, rgba(5,49,255,1) 100.7% );
        } </style>";
        
        echo "<h3>flights from $src to $des.</h3>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "
            <div id='ticket_go' class='ticket " . $row['F_id'] . "'>
                <input type='radio' value='" . $row['F_id'] . "' name='flight_go' id='flight_go' required>
                <p><span class='depart_time " . $row['F_id'] . "'>" . $row['depart_time'] . "</span> -> <span class='arrive_time " . $row['F_id'] . "'>" . $row['arrive_time'] . "</span></p>
                <p><span class='depart_date " . $row['F_id'] . "'>" . $row['depart_date'] . "</span> -> <span class='arrive_time " . $row['F_id'] . "'>" . $row['arrive_date'] . "</span></p>
                <p><span class='src " . $row['F_id'] . "'>" . $row['src'] . "</span> -> <span class='des " . $row['F_id'] . "'>" . $row['des'] . "</span></p>
                <p><strong>₹. <span class='amount " . $row['F_id'] . "'>". $row['amount'] . "</span></strong></p>
            </div>";
        }
    } else {
        echo "No flights available.";
    }
}

mysqli_close($conn);

?>

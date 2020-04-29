<?php

$user_id = $_POST['user_id'];
$payment_id = "";
$passenger_id = "";
$flight_id = "";
$src = "";
$des = "";
$depart_time = "";
$depart_date = "";
$arrive_time = "";
$arrive_date = "";
$amount = "";
$first_name = "";
$last_name = "";

$conn = mysqli_connect("localhost:3306", "devuser", "password", "Ticket_Booking");

if (!$conn) {
    die("Connectioecho " . $sql_query . ";n Failed" . mysqli_connect_error());
}

$sql_query1 = "SELECT P_id FROM Payment WHERE user_id=" . (int)$user_id . "";
$result1 = mysqli_query($conn, $sql_query1);

echo "
<style> 
div.ticket_container { 
    background-color: #202020; 
    width: 75vw; 
    margin: 15px auto; 
    border-radius: 25px;
    padding: 25px;
    // padding-bottom: 10px;
    background-image: radial-gradient( circle farthest-corner at 3.1% 6.8%,  rgba(199,0,59,1) 0%, rgba(255,88,53,1) 97.7% );
}

#ticket {
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    margin-bottom: 25px;
} 

#depart_from, #arrive_at {
    text-align  : center;
}

.city {
    text-transform: uppercase;
    font-weight: 600;
    font-size: 22.5px;
}

.date {
    text-transform: uppercase;
    font-weight: 600;
    font-size: 20px;
}

.time {
    text-transform: uppercase;
    font-weight: 600;
    font-size: 20px;
}

#cancel_booking {
    margin-top: 15px;
    background-color: transparent;
    border-width: 0px;
    font-weight: 400;
    font-size: 15px;
    transition-duration: 0.2s;
    color: white;
}

#cancel_booking:hover {
    transform: scale(1.05);
    font-weight: 800;
}
</style>";

if (mysqli_num_rows($result1) > 0) {
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $payment_id = $row1['P_id'];

        $sql_query2 = "SELECT * FROM Ticket WHERE payment_id=" . (int)$payment_id . "";
        $result2 = mysqli_query($conn, $sql_query2);

        if (mysqli_num_rows($result2) > 0) {
            while ($row2 = mysqli_fetch_assoc($result2)) {
                $passenger_id = $row2['passenger_id'];
                $flight_id = $row2['flight_id'];
            }
        }
        else {
            // echo mysqli_error($conn);
            // echo $sql_query2;
        }

        $sql_query3 = "SELECT * FROM Flight WHERE F_id=" . (int)$flight_id . "";
        $result3 = mysqli_query($conn, $sql_query3);

        if (mysqli_num_rows($result3) > 0) {
            while ($row3 = mysqli_fetch_assoc($result3)) {
                $src = $row3['src'];
                $des = $row3['des'];
                $depart_date = $row3['depart_date'];
                $depart_time = $row3['depart_time'];
                $arrive_date = $row3['arrive_date'];
                $arrive_time = $row3['arrive_time'];
                $amount = $row3['amount'];
            }
        }
        else {
            // echo mysqli_error($conn);
            // echo $sql_query3;
        }


        $sql_query4 = "SELECT * FROM Passengers WHERE P_id=" . (int)$passenger_id . "";
        $result4 = mysqli_query($conn, $sql_query4);

        if (mysqli_num_rows($result4) > 0) {
            while ($row4 = mysqli_fetch_assoc($result4)) {
                $first_name = $row4['first_name'];
                $last_name = $row4['last_name'];
            }
        }
        else {
            // echo mysqli_error($conn);
            // echo $sql_query4;
        }

        echo "
        <div class='ticket_container'>
            <div id='ticket'>
                <div id='depart_from'>
                    DEPARTING FROM <label class='city'> " . $src . "</label><br>
                    ON <label class='date'> " . $depart_date . "</label><br>
                    AT <label class='time'> " . $depart_time . "</label><br>
                </div>
                
                <div id='arrive_at'>
                    ARRIVING AT <label class='city'> " . $des . "</label><br>
                    ON <label class='date'> " . $arrive_date . "</label><br>
                    AT <label class='time'> " . $arrive_time . "</label><br>
                </div>
            </div>
            <div style='margin-top:15px;text-align:center;'><b>PASSENGER: </b>" . $first_name . " " . $last_name . "</div>
            <div style='text-align:center;' id='cancel_booking_div'><button id='cancel_booking'><b>CANCEL BOOKING</b></button></div>
        </div>  
        ";
    }
}
else {
    echo mysqli_error($conn);
    echo $sql_query;
}


mysqli_close($conn);
//             <div>" . $depart_date . " -> " . $arrive_date . "</div>
//             <div>" . $depart_time . " -> " . $arrive_time . "</div>
//             <div>Name: " . $first_name . " " . $last_name . "</div>
//             <div>Flight ID: " . $flight_id . "</div>

// <div>Amount: " . $amount . "</div>
?>
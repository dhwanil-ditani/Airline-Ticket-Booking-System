<?php

$username = $_POST["username"];
$password = $_POST["password"];

$conn = mysqli_connect("localhost:3306", "devuser", "password", "Ticket_Booking");

if (!$conn) {
    die("Connection Failed" . mysqli_connect_error());
}

$sql_query = "SELECT password FROM Users WHERE username = '$username'";
$result = mysqli_query($conn, $sql_query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row["password"] === $password) {
            echo "<p style='margin-left: 70px; color: white; 
                            position: relative; top: -90px; font-weight: 500;'>LOGIN SUCCESSFUL.</p>";
            // echo "<script>username = '$username'</script>";
        } else {
            echo "<p style='margin-left: 70px; color: white;
                            position: relative; top: -90px; font-weight: 500;'>INVALID PASSWORD.</p>";
        }
    }
} else {
    echo "<p style='margin-left: 70px; color: white;
                    position: relative; top: -90px; font-weight: 500;'>USER DOES NOT EXIST, PLEASE SIGN UP FIRST.</p>";
}

mysqli_close($conn);

?>

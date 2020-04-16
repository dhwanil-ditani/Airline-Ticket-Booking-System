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
            echo "Login Successfull";
            // echo "<script>username = '$username'</script>";
        } else {
            echo "Login Failed<br>Invalid Password";
        }
    }
} else {
    echo "User Does not exists.<br>Please SignUp First.";
}

mysqli_close($conn);

?>

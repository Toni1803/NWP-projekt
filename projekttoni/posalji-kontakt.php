<?php
// Get the form data
$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$email = $_POST['email'];
$country = $_POST['country'];
$subject = $_POST['subject'];

// Connect to the database
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "projekttoni";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert the data into the database
$sql = "INSERT INTO messages (first_name, last_name, email, country, subject) VALUES ('$first_name', '$last_name', '$email', '$country', '$subject')";

if (mysqli_query($conn, $sql)) {
    echo "Message sent successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

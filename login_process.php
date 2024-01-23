<?php

// Database connection details
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "test123";

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form was submitted
    if (isset($_POST['submit'])) {
        // Get form data
        $name = $_POST["username"]; // Corrected: use "username" instead of "name"
        $password = $_POST["password"];

        // SQL query to insert data into the database
        $sql = "INSERT INTO user (username, password) VALUES ('$name', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Output the form data for debugging (you can remove this in production)
    }
}

// Close the database connection
$conn->close();

?>

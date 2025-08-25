<?php
// PHP script to handle the arrival form submission and update the database record.

// Step 1: Database connection credentials
$servername = "localhost";
$username = "root"; // CHANGE THIS to your database username
$password = "";     // CHANGE THIS to your database password
$dbname = "outing_db"; // CHANGE THIS to your database name

// Create a new database connection instance
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection to the database failed
if ($conn->connect_error) {
    // If connection fails, stop the script and display an error message
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Retrieve form data using the POST method
// The 'name' attribute from your HTML form fields corresponds to the keys in the $_POST array
$attendanceNo = $_POST['attendanceNo'];
$arrivalTime = $_POST['arrivalTime'];

// Step 3: Prepare the SQL query to update the arrival time.
// We use a prepared statement with '?' placeholders for security.
// The WHERE clause ensures we update the correct record and only if the arrival time is not already set.
$sql = "UPDATE outing_pass1 SET arrival_time = ? WHERE attendance_no = ? AND arrival_time IS NULL";

// Prepare the statement for execution
$stmt = $conn->prepare($sql);

// Step 4: Bind the parameters to the prepared statement
// "si" indicates the data types of the parameters: s = string, i = integer
$stmt->bind_param("si", $arrivalTime, $attendanceNo);

// Step 5: Execute the statement and check for success
if ($stmt->execute()) {
    // Check if any rows were affected (meaning a record was updated)
    if ($stmt->affected_rows > 0) {
        echo "Arrival time updated successfully.";
    } else {
        echo "No record found or arrival time already submitted for this attendance number.";
    }
} else {
    // If there was an error during the update, display an error message
    echo "Error updating record: " . $stmt->error;
}

// Step 6: Close the statement and the database connection
$stmt->close();
$conn->close();
?>

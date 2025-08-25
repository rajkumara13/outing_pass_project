<?php
// PHP script to handle the outing form submission and store data in a MySQL database.

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
$studentName = $_POST['studentName'];
$department = $_POST['department'];
$year = $_POST['year'];
$attendanceNo = $_POST['attendanceNo'];
$roomNo = $_POST['roomNo'];
$purpose = $_POST['purpose'];
$outingTime = $_POST['outingTime'];

// Step 3: Prepare the SQL query
// We use a prepared statement with '?' placeholders to securely insert the data.
// This prevents malicious code from being executed in the database (SQL injection).
$sql = "INSERT INTO outing_pass1 (student_name, department, year, attendance_no, room_no, purpose, outing_time)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

// Prepare the statement for execution
$stmt = $conn->prepare($sql);

// Step 4: Bind the parameters to the prepared statement
// "sssiiss" indicates the data types of the parameters: s = string, i = integer
$stmt->bind_param("sssiiss", $studentName, $department, $year, $attendanceNo, $roomNo, $purpose, $outingTime);

// Step 5: Execute the statement and check for success
if ($stmt->execute()) {
    echo "New record created successfully. Please submit your arrival time when you return.";
} else {
    echo "Error: " . $stmt->error;
}

// Step 6: Close the statement and the database connection
$stmt->close();
$conn->close();
?>

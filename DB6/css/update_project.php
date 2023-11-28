<?php
// Connecting to MySQL server
$con = new mysqli('localhost', 'root', '', 'business_database');

// Output "Connection Failed" if connection fails
if ($con->connect_error) {
    die('Connection Failed');
}

// Get form data
$projectName = $_POST['projectName'];
$deadline = $_POST['deadline'];
$status = $_POST['status'];

// SQL query to update data in the database
$updateQuery = "UPDATE Project SET Deadline=?, Status=? WHERE Name=?";

// Prepare the statement
$stmt = $con->prepare($updateQuery);

if ($stmt) {
    // Bind the parameters
    $stmt->bind_param('sss', $deadline, $status, $projectName);

    // Execute the statement
    $stmt->execute();

    // Redirect back to the project table or wherever you want to redirect
    header("Location: tables/project_table.php");

    // Close the statement
    $stmt->close();
} else {
    echo "Error in preparing the statement.";
}

// Close the database connection
$con->close();
?>

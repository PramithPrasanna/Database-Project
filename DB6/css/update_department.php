<?php
// Connecting to MySQL server
$con = new mysqli('localhost', 'root', '', 'business_database');

// Output "Connection Failed" if connection fails
if ($con->connect_error) {
    die('Connection Failed');
}

// Get form data
$businessLine = $_POST['businessLine'];
$region = $_POST['region'];

// SQL query to update data in the database
$updateQuery = "UPDATE Department SET Region='$region' WHERE Business_Line=?";

// Prepare the statement
$stmt = $con->prepare($updateQuery);

if ($stmt) {
    // Bind the parameters
    $stmt->bind_param('s', $businessLine);

    // Execute the statement
    $stmt->execute();

    // Redirect back to the department table or wherever you want to redirect
    header("Location: tables/department_table.php");

    // Close the statement
    $stmt->close();
} else {
    echo "Error in preparing the statement.";
}

// Close the database connection
$con->close();
?>


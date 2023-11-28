<?php
// Connecting to MySQL server
$con = new mysqli('localhost', 'root', '', 'business_database');

// Output "Connection Failed" if connection fails
if ($con->connect_error) {
    die('Connection Failed');
}

// Get form data
$teamName = $_POST['teamName'];
$managerID = $_POST['managerID'];

// SQL query to update data in the Team table
$updateQuery = "UPDATE Team SET Manager_ID=? WHERE Team_Name=?";

// Prepare the statement
$stmt = $con->prepare($updateQuery);

if ($stmt) {
    // Bind the parameters
    $stmt->bind_param('is', $managerID, $teamName);

    // Execute the statement
    $stmt->execute();

    // Redirect back to the team table or wherever you want to redirect
    header("Location: tables/team_table.php");

    // Close the statement
    $stmt->close();
} else {
    echo "Error in preparing the statement.";
}

// Close the database connection
$con->close();
?>

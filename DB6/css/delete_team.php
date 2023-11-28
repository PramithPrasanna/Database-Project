<?php
// Connecting to MySQL server
$con = new mysqli('localhost', 'root', '', 'business_database');

// Output "Connection Failed" if connection fails
if ($con->connect_error) {
    die('Connection Failed');
}

// Check if Team Name parameter is set in the URL
if (isset($_GET['Team_Name'])) {
    $teamName = $_GET['Team_Name'];

    // SQL query to delete data from the database
    $deleteQuery = "DELETE FROM Team WHERE Team_Name=?";

    // Prepare the statement
    $stmt = $con->prepare($deleteQuery);

    if ($stmt) {
        // Bind the parameters
        $stmt->bind_param('s', $teamName);

        // Execute the statement
        $stmt->execute();

        // Redirect back to the team table or wherever you want to redirect
        header("Location: tables/team_table.php");

        // Close the statement
        $stmt->close();
    } else {
        echo "Error in preparing the statement.";
    }
} else {
    // Redirect to the team table if Team Name is not set
    header("Location: tables/team_table.php");
}

// Close the database connection
$con->close();
?>

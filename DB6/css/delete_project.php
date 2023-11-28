<?php
// Connecting to MySQL server
$con = new mysqli('localhost', 'root', '', 'business_database');

// Output "Connection Failed" if connection fails
if ($con->connect_error) {
    die('Connection Failed');
}

// Check if Project Name parameter is set in the URL
if (isset($_GET['Name'])) {
    $projectName = $_GET['Name'];

    // SQL query to delete data from the database
    $deleteQuery = "DELETE FROM Project WHERE Name=?";

    // Prepare the statement
    $stmt = $con->prepare($deleteQuery);

    if ($stmt) {
        // Bind the parameters
        $stmt->bind_param('s', $projectName);

        // Execute the statement
        $stmt->execute();

        // Redirect back to the project table or wherever you want to redirect
        header("Location: tables/project_table.php");

        // Close the statement
        $stmt->close();
    } else {
        echo "Error in preparing the statement.";
    }
} else {
    // Redirect to the project table if Project Name is not set
    header("Location: tables/project_table.php");
}

// Close the database connection
$con->close();
?>

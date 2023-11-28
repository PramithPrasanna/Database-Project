<?php
// Connecting to MySQL server
$con = new mysqli('localhost', 'root', '', 'business_database');

// Output "Connection Failed" if connection fails
if ($con->connect_error) {
    die('Connection Failed');
}

// Check if Business Line parameter is set in the URL
if (isset($_GET['business_line'])) {
    $businessLine = $_GET['business_line'];

    // SQL query to delete data from the database
    $deleteQuery = "DELETE FROM Department WHERE Business_Line=?";

    // Prepare the statement
    $stmt = $con->prepare($deleteQuery);

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
} else {
    // Redirect to the department table if Business Line is not set
    header("Location: tables/department_table.php");
}

// Close the database connection
$con->close();
?>
